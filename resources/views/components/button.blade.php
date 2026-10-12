@props([
    'variant' => 'primary', // 'primary', 'secondary', 'danger'
    'size'    => 'md',      // 'sm', 'md', 'lg'
    'type'    => 'button',
    'tag'     => 'button',  // 'button' atau 'a'
])

@php
    // Variabel warna disesuaikan dengan tailwind.config.js
    $variantClasses = [
        'primary'   => 'bg-primary hover:bg-yellow-400 text-secondary border-secondary shadow-[3px_3px_0px_0px_var(--tw-shadow-color)] shadow-secondary',
        'secondary' => 'bg-white hover:bg-neutral-custom text-secondary border-secondary shadow-[3px_3px_0px_0px_var(--tw-shadow-color)] shadow-secondary',
        'danger'    => 'bg-red-500 hover:bg-red-600 text-white border-secondary shadow-[3px_3px_0px_0px_rgba(239,68,68,1)]',
    ][$variant] ?? 'bg-primary hover:bg-yellow-400 text-secondary border-secondary shadow-[3px_3px_0px_0px_var(--tw-shadow-color)] shadow-secondary';

    // Ukuran tombol
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-xs rounded-lg',
        'md' => 'px-4 py-2.5 text-sm rounded-xl',
        'lg' => 'px-6 py-3.5 text-base rounded-xl',
    ][$size] ?? 'px-4 py-2.5 text-sm rounded-xl';

    $classes = "font-headline font-bold border-2 transition-all active:translate-x-[2px] active:translate-y-[2px] active:shadow-none inline-flex items-center justify-center gap-2 {$variantClasses} {$sizeClasses}";
@endphp

@if ($tag === 'a')
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
