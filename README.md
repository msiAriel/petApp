<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About project

 <h2>Requisitos</h2>
  <ul>
    <li>PHP >= 8.x</li>
    <li>Composer</li>
    <li>Node.js & npm</li>
    <li>Base de datos (MySQL, PostgreSQL, etc.)</li>
  </ul>

  <h2>Instalación</h2>
  <ol>
    <li>Clona el repositorio:<br>
      <code>git clone https://github.com/msiAriel/petApp.git</code><br>
      <code>cd petApp</code>
    </li>

    <li>Copia el archivo <code>.env.example</code> para crear el archivo <code>.env</code>:<br>
      <code>cp .env.example .env</code>
    </li>

    <li>Configura el archivo <code>.env</code> con los datos de tu base de datos y otros ajustes necesarios.</li>

    <li>Instala las dependencias de PHP con Composer:<br>
      <code>composer install</code>
    </li>

    <li>Instala las dependencias de JavaScript y construye los assets:<br>
      <code>npm install</code><br>
      <code>npm run build</code>
    </li>

    <li>Ejecuta las migraciones y carga los datos iniciales (seeders):<br>
      <code>php artisan migrate:fresh --seed</code>
    </li>

    <li>Genera la clave JWT para autenticación:<br>
      <code>php artisan jwt:secret</code>
    </li>

    <li>Levanta el servidor de desarrollo de Laravel:<br>
      <code>php artisan serve</code><br>
      El proyecto estará disponible en: <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a>
    </li>

  </ol>

  <h2>Documentación de la API</h2>
  <p>La documentación está disponible en la siguiente ruta:</p>
  <p><a href="http://127.0.0.1:8000/docs" target="_blank">http://127.0.0.1:8000/docs</a></p>

  <h2>Uso básico</h2>
  <ul>
    <li>Primero debes registrar un usuario.</li>
    <li>Al registrarte, quedas autenticado automáticamente y recibirás un token de acceso.</li>
    <li>Usa este token para hacer solicitudes autenticadas a la API.</li>
  </ul>

  <h2>Pruebas unitarias</h2>
  <p>Dentro de <code>tests/Unit/</code> hay un archivo llamado <code>ExampleTest.php</code> que realiza pruebas a un endpoint de la API.</p>

  <h3>Nota importante</h3>
  <p>Para programar, escribo todo en inglés y utilizo convenciones de nomenclatura en inglés.</p>

  <h3>Soporte</h3>
  <p>Si tienes alguna duda, abre un issue para soporte.</p>
