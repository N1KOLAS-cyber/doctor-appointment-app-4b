<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-lg overflow-hidden']) }}>
    <div class="p-6">
        {{ $slot }}
    </div>
</div>
