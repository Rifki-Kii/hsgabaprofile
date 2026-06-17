<div>
    @section('header_title', 'Kelola Hero Slider Utama')

    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-slate-500 text-xs">Sesuaikan gambar, slogan, dan tombol CTA pada carousel slide utama website Anda.</p>
        <button wire:click="openCreateModal" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-3.5 py-2 rounded-lg shadow-sm text-xs flex items-center gap-1.5 transition-all hover:scale-105 active:scale-95">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Slide</span>
        </button>
    </div>

    <!-- Grid Layout Slides -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($slides as $slide)
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden flex flex-col group">
                <!-- Image Preview -->
                <div class="relative h-36 bg-slate-900 overflow-hidden">
                    <img src="{{ asset($slide->image_path) }}" alt="{{ $slide->title }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/20 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 right-3 text-white">
                        @if($slide->welcome_tag)
                            <span class="text-[9px] uppercase tracking-widest text-yellow-400 font-semibold block mb-0.5">{{ $slide->welcome_tag }}</span>
                        @endif
                        <h4 class="text-sm font-bold leading-tight">{{ $slide->title }}</h4>
                        @if($slide->subtitle)
                            <p class="text-[10px] text-slate-300 mt-0.5 leading-snug truncate">{{ $slide->subtitle }}</p>
                        @endif
                    </div>
                    
                    <!-- Sorting badge -->
                    <span class="absolute top-3 left-3 bg-slate-900/80 text-white text-[10px] font-bold px-2 py-0.5 rounded-md backdrop-blur-sm">
                        Slide {{ $slide->sort_order }}
                    </span>
                </div>

                <!-- Footer details & actions -->
                <div class="p-3 flex items-center justify-between bg-white border-t border-slate-100 flex-1">
                    <div class="text-[10px] text-slate-400">
                        @if($slide->button_text)
                            <span class="inline-block bg-slate-100 text-slate-600 px-2 py-0.5 rounded-md font-medium">Button: {{ $slide->button_text }}</span>
                        @else
                            <span class="text-slate-300">Tidak ada tombol</span>
                        @endif
                    </div>
                    
                    <div class="flex items-center gap-1.5">
                        <button wire:click="edit({{ $slide->id }})" 
                                class="w-7 h-7 bg-yellow-50 hover:bg-yellow-400 text-yellow-600 hover:text-slate-900 rounded-lg flex items-center justify-center transition-colors text-xs"
                                title="Ubah">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button onclick="confirm('Apakah Anda yakin ingin menghapus slide ini?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $slide->id }})" 
                                class="w-7 h-7 bg-red-50 hover:bg-red-600 text-red-500 hover:text-white rounded-lg flex items-center justify-center transition-colors text-xs"
                                title="Hapus">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2 bg-white rounded-xl border border-slate-200 p-8 text-center text-slate-400 shadow-xs">
                <div class="flex flex-col items-center gap-2">
                    <i class="fa-solid fa-images text-3xl text-slate-300"></i>
                    <span class="text-xs">Belum ada slide hero yang terpasang.</span>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Modal Form (Create / Edit) -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="bg-white rounded-2xl w-full max-w-lg shadow-xl overflow-hidden border border-slate-100">
                
                <!-- Modal Header -->
                <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                    <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                        {{ $isEditMode ? 'Ubah Slide Hero' : 'Tambah Slide Hero Baru' }}
                    </h3>
                    <button wire:click="resetFields" class="text-slate-400 hover:text-slate-600">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="p-5 space-y-4 max-h-[70vh] overflow-y-auto">
                        <!-- Image Upload -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Gambar Background Slide</label>
                            <div class="flex flex-col items-center border border-dashed border-slate-200 p-3 rounded-xl bg-slate-50 gap-2">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="w-full h-28 object-cover rounded-lg shadow-xs">
                                @elseif ($existing_image_path)
                                    <img src="{{ asset($existing_image_path) }}" class="w-full h-28 object-cover rounded-lg shadow-xs">
                                @else
                                    <div class="w-full h-28 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400">
                                        <i class="fa-solid fa-image text-2xl"></i>
                                    </div>
                                @endif

                                <label class="cursor-pointer bg-blue-50 hover:bg-blue-100 text-blue-600 text-[10px] font-semibold px-3 py-1.5 rounded-lg transition-all">
                                    <span>Pilih Gambar</span>
                                    <input type="file" wire:model="image" class="hidden" accept="image/*">
                                </label>
                                <span class="text-[9px] text-slate-400">Format: JPG, PNG, WEBP (Maks. 2MB)</span>
                                @error('image') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="welcome_tag" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Welcome Tag (Optional)</label>
                                <input type="text" id="welcome_tag" wire:model="welcome_tag" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="e.g. Welcome To">
                                @error('welcome_tag') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label for="sort_order" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Urutan Tampilan</label>
                                <input type="number" id="sort_order" wire:model="sort_order" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                                @error('sort_order') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="title" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Judul Utama</label>
                            <input type="text" id="title" wire:model="title" 
                                   class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="Tulis judul slide...">
                            @error('title') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="subtitle" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Sub-Judul / Deskripsi</label>
                            <input type="text" id="subtitle" wire:model="subtitle" 
                                   class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="Tulis keterangan singkat...">
                            @error('subtitle') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="button_text" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Teks Tombol (Optional)</label>
                                <input type="text" id="button_text" wire:model="button_text" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="e.g. Pelajari Selengkapnya">
                                @error('button_text') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="button_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Tujuan Link Tombol (Optional)</label>
                                <input type="text" id="button_url" wire:model="button_url" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="e.g. #about atau https://...">
                                @error('button_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="px-5 py-3 border-t border-slate-100 bg-slate-50 flex justify-end gap-2">
                        <button type="button" wire:click="resetFields" 
                                class="border border-slate-200 hover:bg-slate-100 text-slate-600 font-semibold px-4 py-1.5 rounded-lg text-xs transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-1.5 rounded-lg text-xs shadow-xs transition-colors">
                            {{ $isEditMode ? 'Simpan Perubahan' : 'Tambah Slide' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
</div>
