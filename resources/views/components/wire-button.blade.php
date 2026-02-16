@props(['color' => 'primary', 'size' => 'md', 'href' => null, 'type' => 'button', 'outline' => false, 'gray' => false])

@php
    // Si se pasa el atributo 'gray', establecer color a gray
    if ($gray) {
        $color = 'gray';
    }
    
    // Clases de color
    if ($outline) {
        $colorClasses = match($color) {
            'primary' => 'border-2 border-blue-600 text-blue-600 hover:bg-blue-50',
            'secondary' => 'border-2 border-gray-600 text-gray-600 hover:bg-gray-50',
            'success' => 'border-2 border-green-600 text-green-600 hover:bg-green-50',
            'danger' => 'border-2 border-red-600 text-red-600 hover:bg-red-50',
            'warning' => 'border-2 border-yellow-600 text-yellow-600 hover:bg-yellow-50',
            'gray' => 'border-2 border-gray-400 text-gray-700 hover:bg-gray-50',
            default => 'border-2 border-gray-400 text-gray-700 hover:bg-gray-50',
        };
    } else {
        $colorClasses = match($color) {
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
            'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white focus:ring-gray-500',
            'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
            'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white focus:ring-yellow-500',
            'gray' => 'bg-gray-200 hover:bg-gray-300 text-gray-800 focus:ring-gray-400',
            default => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
        };
    }
    
    // Clases de tamaño
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
