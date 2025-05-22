# Despliegue en Railway - Solución a problemas

Este documento contiene instrucciones para solucionar problemas comunes al desplegar este proyecto Laravel en Railway.

## Solución al problema de colisión de archivos LICENSE

Si al hacer un despliegue en Railway encuentras este error:

```
error: collision between /nix/store/qn1wvz93s3c4f9c74qzb0rpgyrwip6kn-yarn/LICENSE' and /nix/store/rbbaws9k85zah0d77ggsf3hnsd8cavdd-composer-2.8.4/LICENSE'
```

Sigue estos pasos para solucionarlo:

1. **Usa los archivos de configuración proporcionados**:
   - `nixpacks.toml`
   - `railway.toml`
   - `Procfile`
   - `.env.production`

2. **Ejecuta el script de solución** (si es necesario):
   ```bash
   ./fix-license-collision.sh
   ```

3. **Asegúrate de que las variables de entorno están correctamente configuradas en Railway**:
   ```
   APP_DEBUG="true"
   APP_ENV="local"
   APP_KEY="base64:U6anFd8ZjXbcMTW1jUQMnpg8yUZ7gx9vJMabqYAkBLA="
   APP_NAME="Laravel"
   APP_URL="https://m7fuf4laravel-production.up.railway.app"
   BROADCAST_DRIVER="log"
   CACHE_DRIVER="file"
   DB_CONNECTION="mysql"
   DB_DATABASE="sulaiman_uf4examen"
   DB_HOST="mysql-sulaiman.alwaysdata.net"
   DB_PASSWORD="APTItude01"
   DB_PORT="3306"
   DB_USERNAME="sulaiman_"
   LOG_CHANNEL="stack"
   MAIL_ENCRYPTION="null"
   MAIL_FROM_ADDRESS="hello@example.com"
   MAIL_FROM_NAME="${APP_NAME}"
   MAIL_HOST="smtp.mailtrap.io"
   MAIL_MAILER="smtp"
   MAIL_PASSWORD="null"
   MAIL_PORT="2525"
   MAIL_USERNAME="null"
   QUEUE_CONNECTION="sync"
   SESSION_DRIVER="file"
   NIXPACKS_BUILD_CMD="composer install && php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force && php artisan storage:link"
   ```

## Proceso de despliegue

1. **Sube tus cambios a GitHub**:
   ```bash
   git add .
   git commit -m "Configuración para despliegue en Railway"
   git push
   ```

2. **Conecta tu repositorio en Railway**:
   - Crea un nuevo proyecto en Railway
   - Selecciona "Deploy from GitHub"
   - Elige tu repositorio
   - Configura las variables de entorno mencionadas anteriormente
   - Railway usará automáticamente la configuración en `railway.toml` y `nixpacks.toml`

3. **Si el problema persiste**:
   - Verifica que tienes la última versión de la configuración
   - Prueba forzando un nuevo despliegue desde el panel de Railway
   - Revisa los logs para ver mensajes de error adicionales
