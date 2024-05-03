@props(['active'])

@php
$classes = ($active ?? false)
            ? 'rounded-md p-2 text-lg font-semibold outline-none ring-2 ring-white text-white'
            : 'rounded-md p-2 text-lg font-semibold ring-1 ring-dark-400 text-dark-400 hover:text-white hover:outline-none hover:ring-2 hover:ring-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
