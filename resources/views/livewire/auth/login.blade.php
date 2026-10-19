<div class="min-h-screen bg-neutral-custom font-body flex items-center justify-center p-4 sm:p-6 lg:p-8">
    <div class="w-full max-w-5xl bg-white border-2 border-secondary rounded-3xl shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[600px]">

        {{-- Section Kiri --}}
        <div class="hidden lg:flex lg:col-span-5 bg-primary p-8 lg:p-12 flex-col justify-between relative overflow-hidden border-b-2 lg:border-b-0 lg:border-r-2 border-secondary">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-yellow-400/50 rounded-full pointer-events-none"></div>

            <div class="relative z-10 flex items-center gap-3">
                <img src="{{ asset('assets/images/logoWaruma.svg') }}" alt="Logo WaruMa" class="h-10 w-auto object-contain">
                <span class="font-headline font-bold text-2xl text-secondary flex items-center gap-1">
                    WaruMa<span class="w-2.5 h-2.5 bg-teal-400 rounded-full inline-block"></span>
                </span>
            </div>

            <div class="relative z-10 my-10 lg:my-0 space-y-6">
                <div class="inline-flex items-center gap-2 bg-white border-2 border-secondary px-3 py-1.5 rounded-full shadow-[2px_2px_0px_0px_rgba(35,35,35,1)]">
                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="font-headline text-xs font-bold tracking-wider text-secondary uppercase">ADMIN PORTAL POS & STOK</span>
                </div>

                <h1 class="font-headline font-black text-3xl lg:text-4xl text-secondary leading-tight">
                    Kelola warung, praktis dari satu layar.
                </h1>

                <p class="text-secondary/80 font-medium text-sm lg:text-base leading-relaxed">
                    Catat stok, transaksi, dan laba-rugi warung tanpa buku catatan manual lagi.
                </p>

                <div class="inline-flex items-center gap-2 bg-yellow-400/60 border border-secondary/30 px-3 py-1.5 rounded-lg text-xs font-semibold text-secondary">
                    <span>Cepat, ringan & bisa offline!</span>
                </div>
            </div>

            <div class="relative z-10 pt-4 text-xs font-semibold text-secondary/80 flex items-center gap-1">
                <span>Aplikasi Pengelolaan Warung —</span>
                <span class="font-bold text-secondary">WaruMa</span>
                <span class="ml-auto font-mono text-xs">v1.1</span>
            </div>
        </div>

        {{-- Section Kanan --}}
        <div class="lg:col-span-7 bg-neutral-custom p-8 lg:p-12 flex flex-col justify-center">
            <div class="max-w-md w-full mx-auto space-y-6">

                <div>
                    <h2 class="font-headline font-black text-3xl text-secondary tracking-tight">
                        Masuk ke Dashboard
                    </h2>
                    <p class="text-gray-500 text-sm mt-1 font-medium">
                        Khusus admin / pemilik warung.
                    </p>
                </div>

                {{-- Alert Berhasil Logout --}}
                @if (session()->has('success'))
                    <x-alert type="success" title="Berhasil Logout!" :message="session('success')" />
                @endif

                {{-- Alert Ditolak / Belum Login --}}
                @if (session()->has('error'))
                    <x-alert type="error" title="Akses Ditolak!" :message="session('error')" />
                @endif

                {{-- Alert Gagal Login (Kredensial Salah) --}}
                @if (session()->has('auth_error'))
                    <x-alert type="error" title="Login Gagal!" :message="session('auth_error')" />
                @endif

                <form wire:submit="login" class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="block font-label font-bold text-xs text-secondary tracking-wider">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <img src="{{ asset('assets/icons/user.svg') }}" alt="User Icon" class="w-5 h-5 opacity-60">
                            </div>
                            <input type="text" wire:model="username" placeholder="masukkan username"
                                class="w-full pl-10 pr-4 py-3 bg-white border-2 @error('username') border-red-500 @else border-secondary @enderror text-secondary rounded-xl font-medium placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all">
                        </div>
                        @error('username')
                            <span class="text-red-500 text-xs font-semibold block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="block font-label font-bold text-xs text-secondary tracking-wider">
                            Password
                        </label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <img src="{{ asset('assets/icons/lock.svg') }}" alt="Lock Icon" class="w-5 h-5 opacity-60">
                            </div>

                            <input :type="show ? 'text' : 'password'" wire:model="password"
                                placeholder="masukkan password"
                                class="w-full pl-10 pr-10 py-3 bg-white border-2 @error('password') border-red-500 @else border-secondary @enderror text-secondary rounded-xl font-medium placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-secondary shadow-[2px_2px_0px_0px_rgba(35,35,35,1)] transition-all">

                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-secondary focus:outline-none">
                                <img src="{{ asset('assets/icons/eye.svg') }}" alt="Show Password" class="w-5 h-5 opacity-60" x-show="!show">
                                <img src="{{ asset('assets/icons/eye-off.svg') }}" alt="Hide Password" class="w-5 h-5 opacity-60" x-show="show" x-cloak>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-xs font-semibold block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-button type="submit" variant="primary" size="lg" class="w-full" wire:loading.attr="disabled">
                        <span>Masuk</span>
                    </x-button>
                </form>

                <div class="relative flex py-1 items-center">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink font-label text-xs font-bold text-gray-400 px-4 uppercase tracking-widest">ATAU</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <x-button tag="a" href="/" wire:navigate variant="secondary" size="lg" class="w-full text-sm">
                    <span>Lihat info & stok tanpa login</span>
                </x-button>
            </div>
        </div>

    </div>
</div>
