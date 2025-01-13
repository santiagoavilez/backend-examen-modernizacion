<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

1. Clone the repository

    ```sh
    git clone

    ```

2. Crear una base de datos mysql en local

3. Crear una copia del archivo .env

    ```sh
     cp .env.example .env
    ```

4. Configura la base de datos. Para esto primero crea una base de datos Vacia y edita las siguientes variables de entorno en el archivo .env

    ```sh
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    ```

5. Cambia el FRONTEND_URL en el archivo .env a (http://localhost:5173)

6. Install Composer dependencies

    ```sh
    se debe tener php >= 8.2.1
    composer install
    ```

7. Genera una nueva clave de aplicación

    ```sh
    php artisan key:generate
    ```

8. Migra la base de datos y agrega datos de prueba

    ```sh
    php artisan migrate:fresh --seed
    ```

9. Inicia el servidor
    ```sh
    php artisan serve
    ```
10. Inicia el servidor de node
    ```sh
    npm run dev
    ```
11. Para logearse en la aplicacion se puede usar el usuario admin@example y la contraseña esta en el archivo de seeders
