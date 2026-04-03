@props([
    'variant' => 'primary',
    'size' => 'md',
    'block' => false,
    'tag' => 'button',
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-full border font-medium tracking-[0.01em] transition duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-[#fffdf7] disabled:cursor-not-allowed disabled:opacity-60';

    $sizeClasses = [
        'sm' => 'px-3.5 py-1.5 text-xs',
        'md' => 'px-5 py-2 text-sm',
        'lg' => 'px-6 py-2.5 text-sm',
    ];

    $variantClasses = [
        'primary' => 'border-[#1D9E75] bg-[#1D9E75] text-white shadow-[0_6px_20px_rgba(29,158,117,0.22)] hover:brightness-105 focus-visible:ring-[#1D9E75]/40',
        'secondary' => 'border-[#d7d1c6] bg-[#fffdf7] text-[#1f2b26] hover:-translate-y-px hover:border-[#adb5aa] focus-visible:ring-[#1D9E75]/25',
        'ghost' => 'border-transparent bg-transparent text-[#1f2b26] hover:bg-[#f2eee5] focus-visible:ring-[#1D9E75]/25',
        'danger' => 'border-[#c85d4a] bg-[#c85d4a] text-white shadow-[0_6px_20px_rgba(200,93,74,0.2)] hover:brightness-105 focus-visible:ring-[#c85d4a]/40',
    ];

    $classes = implode(' ', array_filter([
        $baseClasses,
        $sizeClasses[$size] ?? $sizeClasses['md'],
        $variantClasses[$variant] ?? $variantClasses['primary'],
        $block ? 'w-full' : null,
    ]));
@endphp

@if ($tag === 'a')
    <a {{ $attributes->class($classes) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>
        {{ $slot }}
    </button>
@endif
