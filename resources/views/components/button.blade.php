@php
    $colorClasses = match($color) {
        'blue' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'red' => 'bg-red-600 hover:bg-red-700 text-white',
        'green' => 'bg-green-600 hover:bg-green-700 text-white',
        'yellow' => 'bg-yellow-600 hover:bg-yellow-700 text-white',
        default => 'bg-gray-800 hover:bg-gray-700 text-white',
    };

    $sizeClasses = match($size) {
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-6 py-3 text-lg',
        default => 'px-4 py-2 text-sm',
    };

    $baseClasses = 'inline-flex items-center justify-center rounded-md font-semibold tracking-wide focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150';
    $classes = "$baseClasses $colorClasses $sizeClasses";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
