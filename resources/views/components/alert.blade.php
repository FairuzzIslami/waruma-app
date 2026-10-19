@props([
    'type' => 'success',
    'title' => '',
    'message' => '',
    'timeout' => 4000 // Waktu hilangnya alert dalam milidetik (4000ms = 4 detik)
])

@php
    $isError = in_array($type, ['error', 'danger']);

    $bgColor = $isError
        ? 'bg-red-100 border-red-500 text-red-800'
        : 'bg-emerald-100 border-emerald-500 text-emerald-800';

    $shadowColor = $isError
        ? 'shadow-[3px_3px_0px_0px_rgba(239,68,68,1)]'
        : 'shadow-[3px_3px_0px_0px_rgba(16,185,129,1)]';

    $iconBg = $isError ? 'bg-red-500' : 'bg-emerald-500';

    $defaultTitle = $title ?: ($isError ? 'Terjadi Kesalahan!' : 'Berhasil!');
@endphp

<!-- ALERT AUTO-DISMISS DENGAN ALPINE JS -->
<div x-data="{ show: true }"
     x-init="setTimeout(() => show = false, {{ $timeout }})"
     x-show="show"
     x-transition:leave="transition ease-in duration-300 transform"
     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
     x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
     class="{{ $bgColor }} {{ $shadowColor }} border-2 p-4 rounded-xl flex items-start justify-between gap-3 transition-all mb-4">

    <div class="flex items-start gap-3">
        <div class="{{ $iconBg }} text-white rounded-full w-6 h-6 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">
            {{ $isError ? '!' : '✓' }}
        </div>
        <div>
            <h4 class="font-headline font-bold text-sm">
                {{ $defaultTitle }}
            </h4>
            @if ($message)
                <p class="text-xs font-medium mt-0.5 opacity-90">
                    {{ $message }}
                </p>
            @endif
        </div>
    </div>

    <!-- Tombol Silang (Close Manual) -->
    <button type="button"
            @click="show = false"
            class="text-xs font-bold opacity-60 hover:opacity-100 cursor-pointer p-1">
        ✕
    </button>
</div>
