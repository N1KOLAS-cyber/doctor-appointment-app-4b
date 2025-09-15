<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# doctor-appointment-app-4b
>>>>>>> 4052f51e81311893023008fe90f7d8914d5dc269
>>>>
>>>>Perfecto, Nicolás, te lo dejo ahora completo en formato README.md, listo para copiar y pegar en tu repositorio de GitHub.


---

# Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: **MySQL, idioma, zona horaria y foto de perfil**.

---

## 🚀 1. Configuración de MySQL
1. Asegúrate de tener instalado y en ejecución **MySQL**.  
2. Si usas **XAMPP**, también debes iniciar **Apache** junto con MySQL.  
3. Levanta el servidor de Laravel con:  
   ```bash
   php artisan serve

4. En caso de error de conexión, revisa el archivo .env del proyecto y corrige las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña




---

🌐 2. Configuración de Idioma

1. Abre el archivo config/app.php.


2. Busca la clave:

'locale' => 'en',


3. Sustitúyela por el idioma deseado, por ejemplo para español:

'locale' => 'es',


4. Con esto los mensajes de validación y textos del framework estarán en español (si tienes instalados los archivos de traducción).




---

🕒 3. Configuración de Zona Horaria

1. En el mismo archivo config/app.php, ubica la clave:

'timezone' => 'UTC',


2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:

'timezone' => 'America/Mexico_City',


3. De esta forma, todas las fechas y horas gestionadas por Laravel estarán alineadas con tu región.




---

🖼️ 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta storage/app/public para almacenar archivos.
Para exponerla en public/storage, crea el enlace simbólico con:

php artisan storage:link


2. Al subir la foto de perfil:

El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB).

La imagen se guarda en public/storage con un nombre aleatorio.

En la base de datos se almacena solo la referencia del archivo.



3. Desde la interfaz, podrás:

Subir una nueva foto.

Eliminar la foto existente.

Reemplazarla por otra.





---

✅ Resumen

Con estos pasos tendrás configurado:

Base de datos MySQL.

Idioma de la aplicación.

Zona horaria correcta.

Subida y gestión de foto de perfil.


---

¿Quieres que también le agregue una **sección de requisitos previos** (PHP, Composer, Laravel, MySQL instalados) para que quede aún más completo como guía en tu GitHub?

Perfecto, Nicolás, te lo dejo ahora completo en formato README.md, listo para copiar y pegar en tu repositorio de GitHub.


---

# Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: **MySQL, idioma, zona horaria y foto de perfil**.

---

## 🚀 1. Configuración de MySQL
1. Asegúrate de tener instalado y en ejecución **MySQL**.  
2. Si usas **XAMPP**, también debes iniciar **Apache** junto con MySQL.  
3. Levanta el servidor de Laravel con:  
   ```bash
   php artisan serve

4. En caso de error de conexión, revisa el archivo .env del proyecto y corrige las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña




---

🌐 2. Configuración de Idioma

1. Abre el archivo config/app.php.


2. Busca la clave:

'locale' => 'en',


3. Sustitúyela por el idioma deseado, por ejemplo para español:

'locale' => 'es',


4. Con esto los mensajes de validación y textos del framework estarán en español (si tienes instalados los archivos de traducción).




---

🕒 3. Configuración de Zona Horaria

1. En el mismo archivo config/app.php, ubica la clave:

'timezone' => 'UTC',


2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:

'timezone' => 'America/Mexico_City',


3. De esta forma, todas las fechas y horas gestionadas por Laravel estarán alineadas con tu región.




---

🖼️ 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta storage/app/public para almacenar archivos.
Para exponerla en public/storage, crea el enlace simbólico con:

php artisan storage:link


2. Al subir la foto de perfil:

El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB).

La imagen se guarda en public/storage con un nombre aleatorio.

En la base de datos se almacena solo la referencia del archivo.



3. Desde la interfaz, podrás:

Subir una nueva foto.

Eliminar la foto existente.

Reemplazarla por otra.





---

✅ Resumen

Con estos pasos tendrás configurado:

Base de datos MySQL.

Idioma de la aplicación.

Zona horaria correcta.

Subida y gestión de foto de perfil.


---

¿Quieres que también le agregue una **sección de requisitos previos** (PHP, Composer, Laravel, MySQL instalados) para que quede aún más completo como guía en tu GitHub?
Perfecto, Nicolás, te lo dejo ahora completo en formato README.md, listo para copiar y pegar en tu repositorio de GitHub.


---

# Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: **MySQL, idioma, zona horaria y foto de perfil**.

---

## 🚀 1. Configuración de MySQL
1. Asegúrate de tener instalado y en ejecución **MySQL**.  
2. Si usas **XAMPP**, también debes iniciar **Apache** junto con MySQL.  
3. Levanta el servidor de Laravel con:  
   ```bash
   php artisan serve

4. En caso de error de conexión, revisa el archivo .env del proyecto y corrige las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña




---

🌐 2. Configuración de Idioma

1. Abre el archivo config/app.php.


2. Busca la clave:

'locale' => 'en',


3. Sustitúyela por el idioma deseado, por ejemplo para español:

'locale' => 'es',


4. Con esto los mensajes de validación y textos del framework estarán en español (si tienes instalados los archivos de traducción).




---

🕒 3. Configuración de Zona Horaria

1. En el mismo archivo config/app.php, ubica la clave:

'timezone' => 'UTC',


2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:

'timezone' => 'America/Mexico_City',


3. De esta forma, todas las fechas y horas gestionadas por Laravel estarán alineadas con tu región.




---

🖼️ 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta storage/app/public para almacenar archivos.
Para exponerla en public/storage, crea el enlace simbólico con:

php artisan storage:link


2. Al subir la foto de perfil:

El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB).

La imagen se guarda en public/storage con un nombre aleatorio.

En la base de datos se almacena solo la referencia del archivo.



3. Desde la interfaz, podrás:

Subir una nueva foto.

Eliminar la foto existente.

Reemplazarla por otra.





---

✅ Resumen

Con estos pasos tendrás configurado:

Base de datos MySQL.

Idioma de la aplicación.

Zona horaria correcta.

Subida y gestión de foto de perfil.



# Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: **MySQL, idioma, zona horaria y foto de perfil**.

---

## 🚀 1. Configuración de MySQL
1. Asegúrate de tener instalado y en ejecución **MySQL**.  
2. Si usas **XAMPP**, también debes iniciar **Apache** junto con MySQL.  
3. Levanta el servidor de Laravel con:  
   ```bash
   php artisan serve

4. En caso de error de conexión, revisa el archivo .env del proyecto y corrige las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña




---

🌐 2. Configuración de Idioma

1. Abre el archivo config/app.php.


2. Busca la clave:

'locale' => 'en',


3. Sustitúyela por el idioma deseado, por ejemplo para español:

'locale' => 'es',


4. Con esto los mensajes de validación y textos del framework estarán en español (si tienes instalados los archivos de traducción).




---

 3. Configuración de Zona Horaria

1. En el mismo archivo config/app.php, ubica la clave:

'timezone' => 'UTC',


2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:

'timezone' => 'America/Mexico_City',


3. De esta forma, todas las fechas y horas gestionadas por Laravel estarán alineadas con tu región.




---
 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta storage/app/public para almacenar archivos.
Para exponerla en public/storage, crea el enlace simbólico con:

php artisan storage:link


2. Al subir la foto de perfil:

El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB).

La imagen se guarda en public/storage con un nombre aleatorio.

En la base de datos se almacena solo la referencia del archivo.



3. Desde la interfaz, podrás:

Subir una nueva foto.

Eliminar la foto existente.

Reemplazarla por otra.
.


---

¿Quieres que también le agregue una **sección de requisitos previos** (PHP, Composer, Laravel, MySQL instalados) para que quede aún más completo como guía en tu GitHub?

Perfecto, Nicolás, te lo dejo ahora completo en formato README.md, listo para copiar y pegar en tu repositorio de GitHub.


---

# Guía de Configuración del Proyecto

Este documento explica cómo configurar los principales aspectos del proyecto en Laravel: **MySQL, idioma, zona horaria y foto de perfil**.

---

## 🚀 1. Configuración de MySQL
1. Asegúrate de tener instalado y en ejecución **MySQL**.  
2. Si usas **XAMPP**, también debes iniciar **Apache** junto con MySQL.  
3. Levanta el servidor de Laravel con:  
   ```bash
   php artisan serve

4. En caso de error de conexión, revisa el archivo .env del proyecto y corrige las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña




---

🌐 2. Configuración de Idioma

1. Abre el archivo config/app.php.


2. Busca la clave:

'locale' => 'en',


3. Sustitúyela por el idioma deseado, por ejemplo para español:

'locale' => 'es',


4. Con esto los mensajes de validación y textos del framework estarán en español (si tienes instalados los archivos de traducción).




---

🕒 3. Configuración de Zona Horaria

1. En el mismo archivo config/app.php, ubica la clave:

'timezone' => 'UTC',


2. Sustitúyela por tu zona horaria. Ejemplo para Ciudad de México:

'timezone' => 'America/Mexico_City',


3. De esta forma, todas las fechas y horas gestionadas por Laravel estarán alineadas con tu región.




---

🖼️ 4. Configuración de Foto de Perfil

1. Laravel utiliza la carpeta storage/app/public para almacenar archivos.
Para exponerla en public/storage, crea el enlace simbólico con:

php artisan storage:link


2. Al subir la foto de perfil:

El sistema valida que no supere un tamaño máximo (ejemplo: 35 KB).

La imagen se guarda en public/storage con un nombre aleatorio.

En la base de datos se almacena solo la referencia del archivo.



3. Desde la interfaz, podrás:

Subir una nueva foto.

Eliminar la foto existente.

Reemplazarla por otra.





---

✅ Resumen

Con estos pasos tendrás configurado:

Base de datos MySQL.

Idioma de la aplicación.

Zona horaria correcta.

Subida y gestión de foto de perfil.


