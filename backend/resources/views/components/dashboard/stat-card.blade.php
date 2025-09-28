@props([
    'title' => '',
    'value' => 0,
    'color' => 'indigo',
])

@php
    $palettes = [
        'indigo' => ['border' => 'border-indigo-200', 'bg' => 'bg-indigo-50', 'text' => 'text-indigo-700'],
        'emerald' => ['border' => 'border-emerald-200', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-700'],
        'sky' => ['border' => 'border-sky-200', 'bg' => 'bg-sky-50', 'text' => 'text-sky-700'],
        'amber' => ['border' => 'border-amber-200', 'bg' => 'bg-amber-50', 'text' => 'text-amber-700'],
        'rose' => ['border' => 'border-rose-200', 'bg' => 'bg-rose-50', 'text' => 'text-rose-700'],
        'purple' => ['border' => 'border-purple-200', 'bg' => 'bg-purple-50', 'text' => 'text-purple-700'],
    ];
    $palette = $palettes[$color] ?? $palettes['indigo'];
@endphp

<div {{ $attributes->merge(['class' => "rounded-2xl border {$palette['border']} {$palette['bg']} p-5 shadow-sm"]) }}>
    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ $title }}</p>
    <p class="mt-2 text-3xl font-bold {{ $palette['text'] }}">
        {{ number_format($value) }}
    </p>
</div>
