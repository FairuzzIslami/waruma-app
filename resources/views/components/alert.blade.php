@props([
    'type' => 'error',
    'title' => 'Terjadi Kesalahan!',
    'message' => ''
])

@php
    $bgColor = $type === 'error' ? 'bg-red-100 border-red-500 text-red-800' : 'bg-emerald-100 border-emerald-500 text-emerald-800';
    $shadowColor = $type === 'error' ? 'shadow-[3px_3px_0px_0px_rgba(239,68,68,1)]' : 'shadow-[3px_3px_0px_0px_rgba(16,185,129,1)]';
    $iconBg = $type === 'error' ? 'bg-red-500' : 'bg-emerald-500';
@endphp

<div class="{{ $bgColor }} {{ $shadowColor }} border-2 p-4 rounded-xl flex items-start gap-3 transition-all mb-4">
    <div class="{{ $iconBg }} text-white rounded-full w-6 h-6 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">
        {{ $type === 'error' ? '!' : '✓' }}
    </div>
    <div>
        <h4 class="font-headline font-bold text-sm">
            {{ $title }}
        </h4>
        @if ($message)
            <p class="text-xs font-medium mt-0.5 opacity-90">
                {{ $message }}
            </p>
        @endif
    </div>
</div>
