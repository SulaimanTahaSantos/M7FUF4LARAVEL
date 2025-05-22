# API Backend - Gestión de Usuarios y Mascotas

Este proyecto es una API RESTful desarrollada en Laravel para la gestión de usuarios y mascotas, con autenticación JWT y control de acceso mediante middlewares personalizados. A continuación se describen los endpoints, middlewares, autenticación y detalles relevantes para el equipo frontend.

## Autenticación JWT

La API utiliza JWT (JSON Web Token) para la autenticación de usuarios. Los tokens se generan al iniciar sesión y deben ser enviados en la cabecera `Authorization: Bearer <token>` en cada petición protegida.

- Registro: `POST /api/registro`
- Login: `POST /api/login`
- Logout: `POST /api/logout` (requiere token)

Al iniciar sesión correctamente, se devuelve un token JWT que debe usarse en las siguientes peticiones.

## Middlewares Personalizados

### 1. IsAuthenticated
- Ubicación: `app/Http/Middleware/IsAuthenticated.php`
- Función: Protege rutas que requieren usuario autenticado. Verifica que el token JWT sea válido y que el usuario exista.
- Respuesta en caso de fallo:** 401 Unauthorized, mensaje: `Unauthorized invalid token`.

### 2. IsUserAdmin
- Ubicación: `app/Http/Middleware/IsUserAdmin.php`
- Función: Permite el acceso solo a usuarios con rol `admin`.
- Respuesta en caso de fallo: 403 Forbidden, mensaje: `Unauthorized, you are not an admin`.

## Endpoints Disponibles

### Usuarios (solo admin)
- GET /api/users - Listar todos los usuarios
- GET /api/users/{id} - Ver detalles de un usuario
- PUT /api/users/{id} - Editar usuario
- DELETE /api/users/{id} - Eliminar usuario
- `GET /api/users/{id}/pets` - Listar mascotas de un usuario

### Mascotas (usuario autenticado)
- GET /api/pets - Listar mascotas del usuario autenticado
- POST /api/pets - Crear nueva mascota
- PUT /api/pets/{id} - Editar mascota (solo si es propietario)
- PATCH /api/pets/{id} - Modificar parcialmente mascota (solo si es propietario)
- DELETE /api/pets/{id} - Eliminar mascota (solo si es propietario)

#### Notas de Seguridad:
- Un usuario solo puede editar o eliminar sus propias mascotas. Si intenta modificar una mascota de otro usuario, recibirá un error 403.
- Los endpoints de usuario solo pueden ser accedidos por administradores.

## Ejemplo de uso de JWT
1. Registrar usuario:
   POST /api/registro
   {
     "name": "Juan",
     "email": "juan@ejemplo.com",
     "password": "123456",
     "rol": "user"
   }
2. Login:
    http
   POST /api/login
   {
     "email": "juan@ejemplo.com",
     "password": "123456"
   }
   
   Respuesta:
   json
   {
     "message": "Inicio de sesión exitoso",
     "token": "<JWT_TOKEN>"
   }
   
3. Usar el token en peticiones protegidas:
   http
   GET /api/pets
   Authorization: Bearer <JWT_TOKEN>
   

## Estructura de Roles
- user: Acceso a sus propias mascotas.
- admin: Acceso total a usuarios y mascotas de cualquier usuario.

## Migraciones y Modelos
- User: Incluye campos name, email, password, rol.
- Mascota: Incluye campos name, url, description, user_id (relación con usuario).

## Respuestas de Error
- 401: Token inválido o no enviado.
- 403: Acceso denegado por permisos o rol.
- 404: Recurso no encontrado.

## Usuario autorizado y Usuario admin

Usuario autorizado -> email: sula@gmail.com, password: Aptitude01
Usuario admin -> email: admiin@gmail.com, password: APTItude01

## Contacto
Para dudas técnicas, contactar a mi email: sulat3821@gmail.com.
