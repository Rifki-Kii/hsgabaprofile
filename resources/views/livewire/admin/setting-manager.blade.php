<div>
    @section('header_title', 'Pengaturan Website & Kontak')

    <form wire:submit.prevent="save" class="space-y-4">
        
        <!-- Info Umum & Jam Kerja -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-2 flex items-center gap-1.5">
                <i class="fa-solid fa-circle-info text-blue-600"></i>
                <span>Informasi Umum</span>
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="site_name" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nama Website/Sekolah</label>
                    <input type="text" id="site_name" wire:model="site_name" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    @error('site_name') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="whatsapp_number" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">No. WhatsApp (e.g. 628121496464)</label>
                    <input type="text" id="whatsapp_number" wire:model="whatsapp_number" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    <span class="text-[9px] text-slate-400 mt-0.5 block">💡 Awali dengan kode negara 62. Contoh: 628121496464</span>
                    @error('whatsapp_number') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="address" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Alamat Lengkap</label>
                <textarea id="address" wire:model="address" rows="2"
                          class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"></textarea>
                @error('address') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="operational_mon_fri" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Kerja (Senin - Jumat)</label>
                    <input type="text" id="operational_mon_fri" wire:model="operational_mon_fri" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    @error('operational_mon_fri') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="operational_sat" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Kerja (Sabtu)</label>
                    <input type="text" id="operational_sat" wire:model="operational_sat" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    @error('operational_sat') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="operational_sun" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Kerja (Minggu / Libur)</label>
                    <input type="text" id="operational_sun" wire:model="operational_sun" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    @error('operational_sun') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Media Sosial & Google Maps -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-2 flex items-center gap-1.5">
                <i class="fa-solid fa-share-nodes text-blue-600"></i>
                <span>Media Sosial & Google Maps</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="instagram_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Link Instagram</label>
                    <input type="text" id="instagram_url" wire:model="instagram_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://instagram.com/...">
                    @error('instagram_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="facebook_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Link Facebook</label>
                    <input type="text" id="facebook_url" wire:model="facebook_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://facebook.com/...">
                    @error('facebook_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="youtube_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Link YouTube</label>
                    <input type="text" id="youtube_url" wire:model="youtube_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://youtube.com/...">
                    @error('youtube_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="google_maps_embed_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Peta Embed URL (Link src Iframe)</label>
                    <textarea id="google_maps_embed_url" wire:model="google_maps_embed_url" rows="2"
                              class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://www.google.com/maps/embed?..."></textarea>
                    @error('google_maps_embed_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="google_maps_large_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Peta Tombol Detail URL</label>
                    <textarea id="google_maps_large_url" wire:model="google_maps_large_url" rows="2"
                              class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://google.com/maps?..."></textarea>
                    @error('google_maps_large_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Profil Sekolah -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-2 flex items-center gap-1.5">
                <i class="fa-solid fa-school text-blue-600"></i>
                <span>Profil Sekolah (Tentang Kami)</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label for="profile_title" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Judul Profil</label>
                        <input type="text" id="profile_title" wire:model="profile_title" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_title') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="profile_image_caption" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Keterangan Gambar (Caption)</label>
                        <input type="text" id="profile_image_caption" wire:model="profile_image_caption" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_image_caption') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Foto Gedung Sekolah -->
                <div class="flex flex-col">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Foto Profil / Gedung</label>
                    <div class="flex flex-col items-center border border-dashed border-slate-200 p-2.5 rounded-lg bg-slate-50 gap-2 flex-1 justify-center">
                        @if ($new_profile_image)
                            <img src="{{ $new_profile_image->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg shadow-xs">
                        @elseif ($profile_image_path)
                            @if(str_starts_with($profile_image_path, 'http'))
                                <img src="{{ $profile_image_path }}" class="w-20 h-20 object-cover rounded-lg shadow-xs">
                            @else
                                <img src="{{ asset($profile_image_path) }}" class="w-20 h-20 object-cover rounded-lg shadow-xs">
                            @endif
                        @else
                            <div class="w-20 h-20 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400">
                                <i class="fa-solid fa-image text-xl"></i>
                            </div>
                        @endif

                        <label class="cursor-pointer bg-blue-50 hover:bg-blue-100 text-blue-600 text-[9px] font-bold px-3 py-1 rounded-md transition-all">
                            <span>Pilih Foto</span>
                            <input type="file" wire:model="new_profile_image" class="hidden" accept="image/*">
                        </label>
                        @error('new_profile_image') <span class="text-red-500 text-[9px] block text-center mt-0.5">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="profile_description_1" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Deskripsi Paragraf 1</label>
                    <textarea id="profile_description_1" wire:model="profile_description_1" rows="3"
                              class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"></textarea>
                    @error('profile_description_1') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="profile_description_2" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Deskripsi Paragraf 2</label>
                    <textarea id="profile_description_2" wire:model="profile_description_2" rows="3"
                              class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"></textarea>
                    @error('profile_description_2') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Checklist Poin -->
            <div class="border-t border-slate-100 pt-4">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-2">Checklist Keunggulan (Poin Checklist)</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="profile_feature_1" class="block text-[9px] text-slate-400 font-semibold mb-0.5">Poin 1</label>
                        <input type="text" id="profile_feature_1" wire:model="profile_feature_1" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_feature_1') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="profile_feature_2" class="block text-[9px] text-slate-400 font-semibold mb-0.5">Poin 2</label>
                        <input type="text" id="profile_feature_2" wire:model="profile_feature_2" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_feature_2') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="profile_feature_3" class="block text-[9px] text-slate-400 font-semibold mb-0.5">Poin 3</label>
                        <input type="text" id="profile_feature_3" wire:model="profile_feature_3" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_feature_3') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="profile_feature_4" class="block text-[9px] text-slate-400 font-semibold mb-0.5">Poin 4</label>
                        <input type="text" id="profile_feature_4" wire:model="profile_feature_4" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('profile_feature_4') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Profil Pendiri / Founder -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs space-y-4">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-2 flex items-center gap-1.5">
                <i class="fa-solid fa-user-tie text-blue-600"></i>
                <span>Profil Pendiri / Founder</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label for="founder_name" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nama Pendiri</label>
                        <input type="text" id="founder_name" wire:model="founder_name" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('founder_name') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="founder_quote" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Kutipan / Quote Pendiri</label>
                        <input type="text" id="founder_quote" wire:model="founder_quote" 
                               class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                        @error('founder_quote') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Foto Pendiri -->
                <div class="flex flex-col">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Foto Pendiri</label>
                    <div class="flex flex-col items-center border border-dashed border-slate-200 p-2.5 rounded-lg bg-slate-50 gap-2 flex-1 justify-center">
                        @if ($new_founder_image)
                            <img src="{{ $new_founder_image->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg shadow-xs">
                        @elseif ($founder_image_path)
                            <img src="{{ asset($founder_image_path) }}" class="w-20 h-20 object-cover rounded-lg shadow-xs">
                        @else
                            <div class="w-20 h-20 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400">
                                <i class="fa-solid fa-image text-xl"></i>
                            </div>
                        @endif

                        <label class="cursor-pointer bg-blue-50 hover:bg-blue-100 text-blue-600 text-[9px] font-bold px-3 py-1 rounded-md transition-all">
                            <span>Pilih Foto</span>
                            <input type="file" wire:model="new_founder_image" class="hidden" accept="image/*">
                        </label>
                        @error('new_founder_image') <span class="text-red-500 text-[9px] block text-center mt-0.5">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="founder_bio" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Biografi Pendiri</label>
                <textarea id="founder_bio" wire:model="founder_bio" rows="3"
                          class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"></textarea>
                @error('founder_bio') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-t border-slate-100 pt-4">
                <div>
                    <label for="founder_facebook_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Facebook Pendiri</label>
                    <input type="text" id="founder_facebook_url" wire:model="founder_facebook_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://facebook.com/...">
                    @error('founder_facebook_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="founder_instagram_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Instagram Pendiri</label>
                    <input type="text" id="founder_instagram_url" wire:model="founder_instagram_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://instagram.com/...">
                    @error('founder_instagram_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="founder_youtube_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">YouTube Pendiri</label>
                    <input type="text" id="founder_youtube_url" wire:model="founder_youtube_url" 
                           class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors" placeholder="https://youtube.com/...">
                    @error('founder_youtube_url') <span class="text-red-500 text-[10px] mt-0.5 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Form Submit Button -->
        <div class="flex justify-end pt-2">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-md shadow-blue-600/10 text-xs transition-all hover:scale-102 active:scale-98">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>
