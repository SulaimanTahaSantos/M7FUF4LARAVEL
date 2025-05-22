# Guía de Despliegue en Railway

Este documento describe cómo desplegar esta aplicación Laravel en Railway.

## Archivos de configuración

El proyecto incluye los siguientes archivos para facilitar el despliegue en Railway:

- `nixpacks.toml`: Configura la construcción de la aplicación con Nixpacks
- `railway.toml`: Configuración específica para Railway
- `Procfile`: Definición de procesos para Railway
- `.env.production`: Variables de entorno para producción

## Pasos para el despliegue

1. Asegúrate de haber creado un proyecto en Railway y conectado tu repositorio de GitHub.
2. En el panel de Railway, establece las siguientes variables de entorno:
   - `APP_KEY`: Puedes generarla con `php artisan key:generate --show`
   - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: Configura la conexión a la base de datos
   - Otras variables específicas de tu aplicación

3. Railway detectará automáticamente los archivos de configuración y construirá la aplicación.

## Solución de problemas comunes

### Error de colisión de archivos LICENSE

Si encuentras un error de colisión entre archivos LICENSE durante el despliegue, el archivo `nixpacks.toml` ya está configurado para evitar este problema.

### Error de base de datos

Asegúrate de que las credenciales de la base de datos están correctamente configuradas en las variables de entorno de Railway.

### Cambios en la configuración

Si necesitas cambiar la configuración de despliegue, modifica los archivos `nixpacks.toml` y `railway.toml` según sea necesario.

## Comandos útiles

- Ejecutar migraciones en Railway: `railway run php artisan migrate`
- Ver logs de la aplicación: `railway logs`
- Acceder a un terminal en la aplicación: `railway shell`
