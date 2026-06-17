<div class="w-full max-w-md bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl shadow-2xl">
    <div class="text-center mb-8">
        <img src="{{ asset('assets/logo-aba.png') }}" alt="Logo HSG ABA" class="w-16 h-16 mx-auto mb-4 object-contain">
        <h2 class="text-2xl font-bold text-white tracking-tight">Admin HSG ABA</h2>
        <p class="text-blue-200 text-sm mt-1">Masuk untuk mengelola konten website</p>
    </div>

    <form wire:submit.prevent="login" class="space-y-6">
        <div>
            <label for="email" class="block text-xs font-semibold text-blue-100 uppercase tracking-wider mb-2">Email Address</label>
            <input type="email" id="email" wire:model="email" 
                   class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-yellow-400 transition-colors placeholder-white/30"
                   placeholder="admin@hsgaba.com">
            @error('email') 
                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label for="password" class="block text-xs font-semibold text-blue-100 uppercase tracking-wider mb-2">Password</label>
            <input type="password" id="password" wire:model="password" 
                   class="w-full bg-white/5 border border-white/10 text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-yellow-400 transition-colors placeholder-white/30"
                   placeholder="••••••••">
            @error('password') 
                <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <button type="submit" 
                class="w-full bg-yellow-400 hover:bg-yellow-500 text-slate-900 font-bold py-3.5 rounded-xl transition-all duration-300 transform active:scale-[0.98] shadow-lg hover:shadow-yellow-400/20 text-sm flex items-center justify-center gap-2">
            <span>Masuk ke Panel</span>
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </form>
</div>
