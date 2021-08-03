@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md'
            : 'text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
