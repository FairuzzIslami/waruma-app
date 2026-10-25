@props(['paginator'])

@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs font-body font-bold">
        <!-- TEKS KETERANGAN SIMPEL -->
        <p class="text-gray-600 font-medium">
            Menampilkan <span class="font-bold text-secondary">{{ $paginator->count() }}</span> dari <span class="font-bold text-secondary">{{ $paginator->total() }}</span> produk
        </p>

        <!-- TOMBOL PAGINASI NEO-BRUTALIST -->
        <div class="flex items-center gap-1.5">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <span class="w-8 h-8 rounded-xl border-2 border-secondary bg-gray-100 text-gray-400 grid place-items-center shadow-[2px_2px_0px_#232323] cursor-not-allowed">
                    ‹
                </span>
            @else
                <button type="button" wire:click="previousPage" wire:loading.attr="disabled" class="w-8 h-8 rounded-xl border-2 border-secondary bg-white text-secondary grid place-items-center shadow-[2px_2px_0px_#232323] hover:bg-amber-100 active:translate-x-[1px] active:translate-y-[1px] transition-all cursor-pointer">
                    ‹
                </button>
            @endif

            {{-- Angka-angka Halaman --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="w-8 h-8 rounded-xl border-2 border-secondary bg-primary text-secondary font-black grid place-items-center shadow-[2px_2px_0px_#232323]">
                                {{ $page }}
                            </span>
                        @else
                            <button type="button" wire:click="gotoPage({{ $page }})" class="w-8 h-8 rounded-xl border-2 border-secondary bg-white text-secondary font-bold grid place-items-center shadow-[2px_2px_0px_#232323] hover:bg-amber-100 active:translate-x-[1px] active:translate-y-[1px] transition-all cursor-pointer">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage" wire:loading.attr="disabled" class="w-8 h-8 rounded-xl border-2 border-secondary bg-white text-secondary grid place-items-center shadow-[2px_2px_0px_#232323] hover:bg-amber-100 active:translate-x-[1px] active:translate-y-[1px] transition-all cursor-pointer">
                    ›
                </button>
            @else
                <span class="w-8 h-8 rounded-xl border-2 border-secondary bg-gray-100 text-gray-400 grid place-items-center shadow-[2px_2px_0px_#232323] cursor-not-allowed">
                    ›
                </span>
            @endif
        </div>
    </div>
@endif
