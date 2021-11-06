@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-custom-pink text-white group flex items-center px-3 py-2 text-sm font-bold rounded-md'
            : 'text-gray-600 hover-bg-custom-pink flex items-center px-3 py-2 text-sm font-medium rounded-md hover:text-white hover:font-bold';

$svgclass = ($active ?? false)
            ? 'text-white flex-shrink-0 -ml-1 mr-3 h-6 w-6'
            : 'hover:text-white flex-shrink-0 -ml-1 mr-3 h-6 w-6';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
	  <svg {{ $attributes->merge(['class' => $svgclass]) }} >
	  	{{ $slot }}
	  </svg>
</a>
