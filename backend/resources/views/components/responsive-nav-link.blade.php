@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full rounded-md bg-indigo-600 px-3 py-2 text-base font-semibold text-white shadow-sm transition duration-150 ease-in-out'
            : 'block w-full rounded-md bg-white px-3 py-2 text-base font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
