<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About project

Proyecto Laravel - PetApp
Requisitos
PHP >= 8.x

Composer

Node.js & npm

Base de datos (MySQL, PostgreSQL, etc.)

Instalación
Clona el repositorio:
git clone https://github.com/msiAriel/petApp.git
cd petApp

Copia el archivo .env.example para crear el archivo .env:
cp .env.example .env

Configura el archivo .env con los datos de tu base de datos y otros ajustes necesarios.

Instala las dependencias de PHP con Composer:
composer install

Instala las dependencias de JavaScript y construye los assets:
npm install
npm run build

Ejecuta las migraciones y carga los datos iniciales (seeders):
php artisan migrate:fresh --seed

Levanta el servidor de desarrollo de Laravel:
php artisan serve

El proyecto estará disponible en http://127.0.0.1:8000.

Documentación de la API
La documentación está disponible en la siguiente ruta:
http://127.0.0.1:8000/docs

Uso básico
Primero debes registrar un usuario.

Al registrarte, quedas autenticado automáticamente y recibirás un token de acceso.

Usa este token para hacer solicitudes autenticadas a la API.

Pruebas unitarias
dentro de test/Unit/ 
esta un archivo llamado ExampleTest que hace prueba a una endPoint 

Nota importante: Para programar, escribo todo en inglés y utilizo convenciones de nomenclatura en inglés.

Si tienes alguna duda, abre un issue para soporte.