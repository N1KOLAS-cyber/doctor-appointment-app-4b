@php
    $colorClasses = $this->getColorClasses();
    $sizeClasses = $this->getSizeClasses();
    $baseClasses = 'inline-flex items-center justify-center rounded-md font-semibold uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150';
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
