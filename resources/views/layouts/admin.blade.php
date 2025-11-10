@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => []
])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/9161014f5f.js" crossorigin="anonymous" defer></script>

    {{--sweet alert 2--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- WireUI -->
    <wireui:scripts/>

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
@include('layouts.includes.admin.navigation')
@include('layouts.includes.admin.sidebar')

<div class="p-4 sm:ml-64">
    {{-- añadiendo margen superior --}}
    <div class="mt-14 flex items-center justify-between w-full mb-4">
        <div class="flex-1">
            @include('layouts.includes.admin.breadcrumb')
        </div>
        @isset($action)
            <div class="ml-4">
                {{ $action }}
            </div>
        @endisset
    </div>
    {{ $slot }}
</div>

@stack('modals')

<!-- Livewire Scripts - Debe ir primero -->
@livewireScripts

<!-- Alpine.js - WireUI ya incluye Alpine, pero si necesitas una versión específica descomenta -->
<!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

<!-- Flowbite - Debe ir al final -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js" defer></script>
{{--mostrar sweet alert--}}
@if (session('swal'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swal !== 'undefined') {
                Swal.fire(@json(session('swal')));
            }
        });
    </script>
@endif

@stack('scripts')
<script>
    //Buscar todos los elementos de una clase especifica
    forms = document.querySelectorAll('.delete-form')
    forms.forEach(form => {
        //activa el modo chismoso
        form.addEventListener('submit', function (e) {
            //evita que se envie
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, enviar el formulario
                    form.submit();
                }
            });
        });
    });
</script>
</body>
</html>
