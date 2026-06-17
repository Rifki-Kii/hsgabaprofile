<div>
    @section('header_title', 'Kelola Program Unggulan')

    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-slate-500 text-xs">Kelola program sekolah, materi, ekstrakurikuler, dan kegiatan pendukung.</p>
        <button wire:click="openCreateModal" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-3.5 py-2 rounded-lg shadow-sm text-xs flex items-center gap-1.5 transition-all hover:scale-105 active:scale-95">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Program</span>
        </button>
    </div>

    <!-- Programs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse ($programs as $prog)
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden flex flex-col group">
                <!-- Background image preview -->
                <div class="relative h-28 bg-slate-900 overflow-hidden flex items-center justify-center">
                    @if(str_starts_with($prog->image_path, 'http'))
                        <img src="{{ $prog->image_path }}" class="w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-500">
                    @else
                        <img src="{{ asset($prog->image_path) }}" class="w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-500">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/20 to-transparent"></div>
                    
                    <!-- Icon overlay -->
                    <div class="absolute w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/25 rounded-full flex items-center justify-center text-xl">
                        {{ $prog->icon }}
                    </div>

                    <!-- Sort Badge -->
                    <span class="absolute top-3 left-3 bg-slate-900/80 text-white text-[9px] font-bold px-2 py-0.5 rounded-md backdrop-blur-sm">
                        Posisi {{ $prog->sort_order }}
                    </span>
                </div>

                <!-- Body details -->
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-slate-800 text-xs mb-1 truncate">{{ $prog->title }}</h4>
                        <p class="text-[11px] text-slate-500 leading-relaxed truncate-2-lines mb-3" title="{{ $prog->description }}">{{ $prog->description }}</p>
                    </div>

                    <div class="flex justify-between items-center border-t border-slate-100 pt-2.5">
                        <span class="inline-block text-[9px] font-bold uppercase tracking-wider bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md">
                            {{ $prog->badge_color }}
                        </span>
                        
                        <div class="flex items-center gap-1">
                            <button wire:click="edit({{ $prog->id }})" 
                                    class="w-7 h-7 bg-yellow-50 hover:bg-yellow-400 text-yellow-600 hover:text-slate-900 rounded-lg flex items-center justify-center transition-colors text-xs"
                                    title="Ubah">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button onclick="confirm('Apakah Anda yakin ingin menghapus program ini?') || event.stopImmediatePropagation()"
                                    wire:click="delete({{ $prog->id }})" 
                                    class="w-7 h-7 bg-red-50 hover:bg-red-600 text-red-500 hover:text-white rounded-lg flex items-center justify-center transition-colors text-xs"
                                    title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-4 bg-white rounded-xl border border-slate-200 p-8 text-center text-slate-400 shadow-xs">
                <div class="flex flex-col items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-3xl text-slate-300"></i>
                    <span class="text-xs">Belum ada data program yang terdaftar.</span>
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
                        {{ $isEditMode ? 'Ubah Program Sekolah' : 'Tambah Program Baru' }}
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
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Gambar Background Card (Optional)</label>
                            <div class="flex flex-col items-center border border-dashed border-slate-200 p-3 rounded-xl bg-slate-50 gap-2">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="w-full h-28 object-cover rounded-lg shadow-xs">
                                @elseif ($existing_image_path)
                                    @if(str_starts_with($existing_image_path, 'http'))
                                        <img src="{{ $existing_image_path }}" class="w-full h-28 object-cover rounded-lg shadow-xs">
                                    @else
                                        <img src="{{ asset($existing_image_path) }}" class="w-full h-28 object-cover rounded-lg shadow-xs">
                                    @endif
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

                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label for="title" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nama Program</label>
                                <input type="text" id="title" wire:model="title" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="e.g. Siroh Nabawiyah">
                                @error('title') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label for="icon" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Ikon Emoji</label>
                                <input type="text" id="icon" wire:model="icon" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors text-center" placeholder="📜">
                                @error('icon') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="badge_color" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Warna Label</label>
                                <select id="badge_color" wire:model="badge_color" 
                                        class="w-full border border-slate-200 bg-white rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                                    <option value="blue">Biru (Blue)</option>
                                    <option value="yellow">Kuning (Yellow)</option>
                                    <option value="green">Hijau (Green)</option>
                                    <option value="purple">Ungu (Purple)</option>
                                    <option value="pink">Merah Muda (Pink)</option>
                                    <option value="orange">Oranye (Orange)</option>
                                </select>
                                @error('badge_color') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="sort_order" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Urutan Tampilan</label>
                                <input type="number" id="sort_order" wire:model="sort_order" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                                @error('sort_order') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Keterangan / Deskripsi Program</label>
                            <textarea id="description" wire:model="description" rows="3"
                                      class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="Jelaskan ringkasan materi/tujuan program..."></textarea>
                            @error('description') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
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
                            {{ $isEditMode ? 'Simpan Perubahan' : 'Tambah Program' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
</div>
