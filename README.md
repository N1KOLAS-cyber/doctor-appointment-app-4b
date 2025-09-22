# doctor-appointment-app-4b

Proyecto en **Laravel** que implementa un sistema de citas médicas con configuración personalizada y un panel administrativo usando **Flowbite + Blade**.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requisitos Previos

Antes de instalar y configurar el proyecto, asegúrate de tener lo siguiente:

- PHP 8.1 o superior
- Composer
- Node.js y NPM
- MySQL o MariaDB
- Laravel 10+
- Un servidor web como Apache o Nginx

## Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: MySQL, idioma, zona horaria, foto de perfil y panel administrativo con Flowbite.

### 1. Configuración de MySQL

1. Asegúrate de tener instalado y en ejecución MySQL
2. Si usas XAMPP, también debes iniciar Apache junto con MySQL
3. Levanta el servidor de Laravel con:
   ```bash
   php artisan serve
   ```

4. En caso de error de conexión, revisa el archivo `.env` del proyecto y corrige las credenciales:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_base
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

### 2. Configuración de Idioma

1. Abre el archivo `config/app.php`
2. Busca la clave:
   ```php
   'locale' => 'en',
   ```
3. Sustitúyela por el idioma deseado, por ejemplo para español:
   ```php
   'locale' => 'es',
   ```
4. Con esto los mensajes de validación y textos del framework estarán en español

### 3. Configuración de Zona Horaria

1. En el mismo archivo `config/app.php`, ubica la clave:
   ```php
   'timezone' => 'UTC',
   ```
2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:
   ```php
   'timezone' => 'America/Mexico_City',
   ```

### 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta `storage/app/public` para almacenar archivos
   Para exponerla en `public/storage`, crea el enlace simbólico con:
   ```bash
   php artisan storage:link
   ```
2. Al subir la foto de perfil:
    - El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB)
    - La imagen se guarda en `public/storage` con un nombre aleatorio
    - En la base de datos se almacena solo la referencia del archivo
3. Desde la interfaz podrás:
    - Subir una nueva foto
    - Eliminar la foto existente
    - Reemplazarla por otra

## Panel Administrativo con Flowbite

### Estructura de vistas

```
resources/views/
 ├── layouts/
 │   ├── admin.blade.php
 │   └── includes/
 │       └── admin/
 │           ├── navigation.blade.php
 │           └── sidebar.blade.php
 ├── admin/
 │   └── dashboard.blade.php
 └── profile/
     └── show.blade.php
```

### Sidebar + Navbar

En `admin.blade.php` se integró el sidebar y la navegación principal:

```blade
<body class="bg-gray-50 dark:bg-gray-900">
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
    @include('layouts.includes.admin.navigation')
    @include('layouts.includes.admin.sidebar')

    <div class="p-4 sm:ml-64">
      <div class="p-4 rounded-lg mt-14">
        {{$slot}}
      </div>
    </div>
  </div>
</body>
```

### Dropdown de Perfil

El menú desplegable de usuario se añadió en `navigation.blade.php`:

```blade
<button type="button" data-dropdown-toggle="user-dropdown">
  <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="Foto de perfil">
</button>
<div id="user-dropdown" class="hidden">
  <a href="{{ route('profile.show') }}">Perfil</a>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
  </form>
</div>
```

### Perfil incrustado

En `profile/show.blade.php` se adaptó para usar la plantilla admin:

```blade
<x-admin>
  @include('profile.partials.update-profile-information-form')
  @include('profile.partials.update-password-form')
  @include('profile.partials.delete-user-form')
</x-admin>
```

### Uso de `{{$slot}}`

Ejemplo en `dashboard.blade.php`:

```blade
<x-admin>
  Hola desde admin
</x-admin>
```

### Logo personalizado

En `navigation.blade.php` se sustituyó el logo de Flowbite:

```blade
<a href="/" class="flex items-center">
  <img src="{{ asset('images/logo.png') }}" class="h-8 mr-3" alt="Logo del proyecto">
  <span class="text-2xl font-semibold dark:text-white">Mi Proyecto</span>
</a>
```

## Instalación Paso a Paso

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd doctor-appointment-app-4b
   ```

2. Instala las dependencias de Composer:
   ```bash
   composer install
   ```

3. Instala las dependencias de NPM:
   ```bash
   npm install
   ```

4. Copia el archivo de entorno:
   ```bash
   cp .env.example .env
   ```

5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

6. Configura la base de datos en el archivo `.env`

7. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

8. Compila los assets:
   ```bash
   npm run build
   ```

9. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

## License

The Laravel framework is open-sourced software licensed under the MIT license.
