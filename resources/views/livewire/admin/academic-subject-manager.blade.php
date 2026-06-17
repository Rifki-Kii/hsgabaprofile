<div>
    @section('header_title', 'Kelola Pelajaran Akademik')

    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-slate-500 text-xs">Atur mata pelajaran utama yang diajarkan beserta fokus kompetensi dan penjelasannya.</p>
        <button wire:click="openCreateModal" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-3.5 py-2 rounded-lg shadow-sm text-xs flex items-center gap-1.5 transition-all hover:scale-105 active:scale-95">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Pelajaran</span>
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-[10px] font-bold uppercase border-b border-slate-200">
                        <th class="px-4 py-2.5 w-16 text-center">Urutan</th>
                        <th class="px-4 py-2.5 w-16 text-center">Ikon</th>
                        <th class="px-4 py-2.5">Nama Pelajaran</th>
                        <th class="px-4 py-2.5">Fokus Kompetensi</th>
                        <th class="px-4 py-2.5">Deskripsi</th>
                        <th class="px-4 py-2.5 w-24 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                    @forelse ($subjects as $subject)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-4 py-2.5 text-center font-semibold text-slate-400">{{ $subject->sort_order }}</td>
                            <td class="px-4 py-2.5 text-center">
                                <span class="inline-flex w-8 h-8 rounded-lg bg-blue-50 text-blue-600 items-center justify-center text-sm border border-blue-100">
                                    <i class="{{ $subject->icon }}"></i>
                                </span>
                            </td>
                            <td class="px-4 py-2.5 font-bold text-slate-800">{{ $subject->name }}</td>
                            <td class="px-4 py-2.5">
                                <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 px-2 py-0.5 rounded-md">
                                    {{ $subject->focus }}
                                </span>
                            </td>
                            <td class="px-4 py-2.5">
                                <div class="max-w-md truncate text-slate-500" title="{{ $subject->description }}">
                                    {{ $subject->description }}
                                </div>
                            </td>
                            <td class="px-4 py-2.5">
                                <div class="flex items-center justify-center gap-1">
                                    <button wire:click="edit({{ $subject->id }})" 
                                            class="w-7 h-7 bg-yellow-50 hover:bg-yellow-400 text-yellow-600 hover:text-slate-900 rounded-lg flex items-center justify-center transition-colors text-xs"
                                            title="Ubah">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="confirm('Apakah Anda yakin ingin menghapus pelajaran ini?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $subject->id }})" 
                                            class="w-7 h-7 bg-red-50 hover:bg-red-600 text-red-500 hover:text-white rounded-lg flex items-center justify-center transition-colors text-xs"
                                            title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-400">
                                <div class="flex flex-col items-center gap-2">
                                    <i class="fa-solid fa-book-open text-3xl text-slate-300"></i>
                                    <span class="text-xs">Belum ada data pelajaran akademik yang disimpan.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form (Create / Edit) -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="bg-white rounded-2xl w-full max-w-lg shadow-xl overflow-hidden border border-slate-100">
                
                <!-- Modal Header -->
                <div class="px-5 py-3 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                    <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                        {{ $isEditMode ? 'Ubah Pelajaran Akademik' : 'Tambah Pelajaran Baru' }}
                    </h3>
                    <button wire:click="resetFields" class="text-slate-400 hover:text-slate-600">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="p-5 space-y-4">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="name" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nama Pelajaran</label>
                                <input type="text" id="name" wire:model="name" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-400"
                                       placeholder="Contoh: Matematika">
                                @error('name') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="focus" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Fokus Kompetensi</label>
                                <input type="text" id="focus" wire:model="focus" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-400"
                                       placeholder="Contoh: Logika & Analisis">
                                @error('focus') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="icon" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Ikon FontAwesome</label>
                                <input type="text" id="icon" wire:model="icon" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-400"
                                       placeholder="Contoh: fas fa-calculator">
                                @error('icon') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="sort_order" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Urutan Tampilan</label>
                                <input type="number" id="sort_order" wire:model="sort_order" 
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-400"
                                       placeholder="0">
                                @error('sort_order') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Deskripsi Singkat</label>
                            <textarea id="description" wire:model="description" rows="3"
                                      class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors placeholder-slate-400"
                                      placeholder="Tuliskan keterangan mengenai apa yang dipelajari dan metodenya..."></textarea>
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
                            {{ $isEditMode ? 'Simpan Perubahan' : 'Tambah Pelajaran' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
</div>
