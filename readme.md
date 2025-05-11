# Proyecto de Documentación de Comunidades NARP de Colombia

Plataforma para preservar y difundir el patrimonio cultural de comunidades negras, afrocolombianas, raizales y palenqueras (NARP).

## Requisitos del Sistema

Asegúrate de que tu entorno cumpla con estos requisitos:

- **PHP**: ^8.1 (Recomendado 8.2+)
- **Composer**: ^2.5 (Última versión estable)
- **Node.js**: ^18.0 (LTS recomendada)
- **NPM**: ^9.0+ (o Yarn ^1.22+)
- **Base de datos**: MySQL 8.0+ / MariaDB 10.5+ / PostgreSQL 14+
- **Servidor web**: Apache con mod_rewrite o Nginx

## Tecnologías Utilizadas

### Backend
- **Laravel**: ^10.10 (Framework principal)
- **Eloquent ORM**: Para modelos de base de datos
- **Sanctum**: ^3.2 (Autenticación API)
- **Spatie Laravel-Permission**: ^5.10 (Gestión de roles)

### Frontend
- **Vite**: ^4.0 (Bundler de assets)
- **TailwindCSS**: ^3.3 (Utilidades CSS)
- **Alpine.js**: ^3.12 (Interactividad)
- **TinyMCE**: ^6.8 (Editor de texto enriquecido)

### Base de Datos
- Migraciones para comunidades, usuarios, posts y categorías

## Instalación

1. **Clonar el repositorio**

    ```bash
    git clone https://github.com/HandyXD/triraiz.git
    cd triraiz
    ```

2. **Instalar dependencias de PHP**

    Tener Composer instalado. Luego ejecuta:
    ```bash
    composer install --optimize-autoloader
    ```

3. **Instalar dependencias de Node.js**

    Si usas npm o yarn:
    ```bash
    npm install && npm run build
    # o usando yarn
    yarn install && yarn build
    ```

4. **Configurar el archivo .env**

    Crea una copia del archivo .env.example y modifícalo según tu entorno:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Configurar la Base de Datos**

    Modifica las configuraciones de la base de datos en el archivo .env:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=psymente
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

6. **Ejecutar Migraciones y Seeders**

    Asegúrate de que las migraciones se ejecuten correctamente para crear las tablas y poblar datos iniciales:
    ```bash
    php artisan migrate --seed
    ```

7. **Inicia el entorno de desarrollo**

    Para compilar los archivos estáticos:
    ```bash
    php artisan serve
    npm run dev
    yarn dev
    ```
    
## Datos de acceso a la aplicación

Una vez se ejecuten las migraciones y seeders, los datos para acceder son los siguientes:

- **Usuario**: user@user.com / password