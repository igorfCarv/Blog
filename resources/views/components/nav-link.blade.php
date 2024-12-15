@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center hover:text-emerald-900 text-sm text-emerald-500'
            : 'inline-flex items-center hover:text-emerald-900 text-sm text-gray-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
