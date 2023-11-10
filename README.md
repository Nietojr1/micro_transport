# Project README

  micro_transport

## Description

- PHP >= 8.1
- Vue >= 3.2.37
- Laravel >= 10.10
- Composer
- Node.js y npm
- MySQL

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Installation
1. **Clonar el Repositorio:**
   ```bash
   git clone https://github.com/Nietojr1/micro_transport.git
   cd tu-proyecto
   composer install

   Configurar .env
   la Base de Datos:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=acme
        DB_USERNAME=root
        DB_PASSWORD=
    El correo:
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525

   Ejecutar migracion de laravel:
   php artisan migrate --seed
   php artisan serve
   npm run dev

Note: Check the seeder created by the users accessing the app.

## Usage

La aplicación estará disponible en http://localhost:8000.

Estructura del Proyecto
app: Contiene los archivos de la aplicación.
config: Archivos de configuración de Laravel.
database: Migraciones y semillas de la base de datos.
public: Archivos públicos accesibles desde el navegador.
resources: Vistas, activos, y otros recursos.
routes: Definiciones de rutas de la aplicación.
vendor: Dependencias de Composer.
.env: Archivo de configuración del entorno.

## Contributing



## License

Este proyecto está licenciado bajo la Licencia MIT
Este README proporciona una guía básica sobre cómo configurar el proyecto y ejecutarlo.

