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

<!-- Livewire Scripts -->
@livewireScripts

<!-- WireUI - Incluye Alpine.js (después de Livewire para que funcione el dropdown) -->
<wireui:scripts/>

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
            
            // Verificar si es un usuario protegido
            if (form.classList.contains('protected-user')) {
                Swal.fire({
                    title: "¡Acción no permitida!",
                    text: "No tienes permiso para eliminar este usuario.",
                    icon: "error",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Entendido"
                });
                return;
            }
            
            // Verificar si es un rol protegido
            if (form.classList.contains('protected-role')) {
                Swal.fire({
                    title: "¡Acción no permitida!",
                    text: "No tienes permiso para eliminar este rol.",
                    icon: "error",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Entendido"
                });
                return;
            }
            
            // Para usuarios normales, mostrar confirmación
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí eliminar",
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

<!-- Script para el dropdown del usuario -->
<script>
    (function() {
        function initDropdowns() {
            document.querySelectorAll('.custom-dropdown').forEach(function(container) {
                if (container.dataset.initialized === 'true') return;
                container.dataset.initialized = 'true';
                
                const trigger = container.querySelector('.custom-dropdown-trigger');
                const menu = container.querySelector('.custom-dropdown-menu');
                
                if (!trigger || !menu) return;
                
                let isOpen = false;
                
                function toggleMenu(e) {
                    if (e) {
                        e.stopPropagation();
                        e.preventDefault();
                    }
                    isOpen = !isOpen;
                    if (isOpen) {
                        menu.style.display = 'block';
                        menu.style.opacity = '0';
                        menu.style.transform = 'scale(0.95)';
                        setTimeout(function() {
                            menu.style.transition = 'opacity 200ms ease-out, transform 200ms ease-out';
                            menu.style.opacity = '1';
                            menu.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        menu.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                        menu.style.opacity = '0';
                        menu.style.transform = 'scale(0.95)';
                        setTimeout(function() {
                            menu.style.display = 'none';
                        }, 75);
                    }
                }
                
                function closeMenu() {
                    if (isOpen) {
                        isOpen = false;
                        menu.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                        menu.style.opacity = '0';
                        menu.style.transform = 'scale(0.95)';
                        setTimeout(function() {
                            menu.style.display = 'none';
                        }, 75);
                    }
                }
                
                // Agregar listener al trigger y a todos los elementos clickeables dentro
                trigger.addEventListener('click', toggleMenu, true);
                
                const clickables = trigger.querySelectorAll('button, img, span');
                clickables.forEach(function(el) {
                    el.style.cursor = 'pointer';
                    el.addEventListener('click', toggleMenu, true);
                });
                
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
                
                // Cerrar al hacer clic fuera
                document.addEventListener('click', function(e) {
                    if (isOpen && !container.contains(e.target)) {
                        closeMenu();
                    }
                });
                
                // Cerrar al hacer clic en un enlace
                const links = menu.querySelectorAll('a');
                links.forEach(function(link) {
                    link.addEventListener('click', function() {
                        closeMenu();
                    });
                });
            });
        }
        
        // Inicializar cuando el DOM esté listo
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initDropdowns);
        } else {
            initDropdowns();
        }
        
        // También inicializar después de Livewire
        if (typeof Livewire !== 'undefined') {
            Livewire.hook('morph.updated', function() {
                setTimeout(initDropdowns, 100);
            });
        }
        
        // Reintentar después de un tiempo
        setTimeout(initDropdowns, 500);
        setTimeout(initDropdowns, 1500);
    })();
</script>
</body>
</html>
