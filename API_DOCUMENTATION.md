# API ARD Complaints - Documentación Completa

## Descripción del Proyecto

Este es un sistema de gestión de quejas desarrollado con Laravel 5.8 y JWT Authentication. El sistema permite a los usuarios registrar, consultar y gestionar quejas de manera organizada.

## Credenciales de Prueba

Se han creado los siguientes usuarios de prueba en el sistema:

### Usuarios Administradores
- **Admin User**
  - Email: `admin@test.com`
  - Password: `admin123`
  - Role: `admin`
  - Identificación: `12345678`

- **Super Admin**
  - Email: `superadmin@test.com`
  - Password: `superadmin123`
  - Role: `super_admin`
  - Identificación: `87654321`

### Usuarios Regulares
- **Test User**
  - Email: `user@test.com`
  - Password: `user123`
  - Role: `user`
  - Identificación: `11223344`

- **Demo User**
  - Email: `demo@test.com`
  - Password: `demo123`
  - Role: `user`
  - Identificación: `99887766`

## Endpoints de Autenticación

### 1. Registro de Usuario
```http
POST /api/register/
Content-Type: application/json

{
    "identification": "12345678",
    "name": "Nombre Usuario",
    "email": "usuario@ejemplo.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

### 2. Login
```http
POST /api/login/
Content-Type: application/json

{
    "email": "admin@test.com",
    "password": "admin123"
}
```

**Respuesta exitosa:**
```json
{
    "status": "success",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "user": {
        "id": 1,
        "identification": "12345678",
        "name": "Admin User",
        "email": "admin@test.com",
        "role": "admin",
        "created_at": "2025-09-16T20:00:00.000000Z",
        "updated_at": "2025-09-16T20:00:00.000000Z"
    }
}
```

### 3. Logout
```http
POST /api/logout/
Authorization: Bearer {token}
```

### 4. Refresh Token
```http
POST /api/refresh/
Authorization: Bearer {token}
```

## Endpoints Protegidos (Requieren JWT Token)

Todas las siguientes rutas requieren autenticación JWT. Incluye el header:
```
Authorization: Bearer {token}
```

### Gestión de Tipos de Quejas

#### Listar Tipos
```http
GET /api/auth/types/
Authorization: Bearer {token}
```

#### Ver Tipo Específico
```http
GET /api/auth/type/{id}/
Authorization: Bearer {token}
```

#### Crear Tipo
```http
POST /api/auth/type/
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Nuevo Tipo",
    "status": "active"
}
```

#### Actualizar Tipo
```http
PUT /api/auth/type/update/{id}/
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Tipo Actualizado",
    "status": "active"
}
```

#### Eliminar Tipo
```http
DELETE /api/auth/type/delete/{id}/
Authorization: Bearer {token}
```

### Gestión de Departamentos

#### Listar Departamentos
```http
GET /api/auth/departaments/
Authorization: Bearer {token}
```

#### Ver Departamento Específico
```http
GET /api/auth/departament/{id}/
Authorization: Bearer {token}
```

#### Crear Departamento
```http
POST /api/auth/departament/
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Nuevo Departamento",
    "status": "active"
}
```

#### Actualizar Departamento
```http
PUT /api/auth/departament/update/{id}/
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Departamento Actualizado",
    "status": "active"
}
```

#### Eliminar Departamento
```http
DELETE /api/auth/departament/delete/{id}/
Authorization: Bearer {token}
```

### Gestión de Quejas

#### Listar Todas las Quejas
```http
GET /api/auth/complaints/
Authorization: Bearer {token}
```

#### Ver Quejas por Identificación
```http
GET /api/auth/complaints/person/{identification}/
Authorization: Bearer {token}
```

#### Ver Quejas por Usuario
```http
GET /api/auth/complaints/user/{user_id}/
Authorization: Bearer {token}
```

#### Ver Queja Específica
```http
GET /api/auth/complaint/{code}/
Authorization: Bearer {token}
```

#### Crear Queja
```http
POST /api/auth/complaint/
Authorization: Bearer {token}
Content-Type: application/json

{
    "identification": "12345678",
    "name": "Juan Pérez",
    "phone": "555-1234",
    "type": "Corrupción",
    "departments": "Recursos Humanos",
    "anonymous": "no",
    "description": "Descripción de la queja",
    "region": "Región Central",
    "province": "Provincia Test",
    "municipality": "Municipio Test",
    "address": "Dirección específica",
    "priority": "medium",
    "status": "sent"
}
```

#### Actualizar Queja
```http
PUT /api/auth/complaint/update/{id}/
Authorization: Bearer {token}
Content-Type: application/json

{
    "status": "process",
    "priority": "high"
}
```

#### Eliminar Queja
```http
DELETE /api/auth/complaint/delete/{id}/
Authorization: Bearer {token}
```

### Gestión de Usuarios

#### Listar Usuarios
```http
GET /api/auth/users/
Authorization: Bearer {token}
```

#### Ver Usuario Específico
```http
GET /api/auth/user/{id}/
Authorization: Bearer {token}
```

#### Actualizar Usuario
```http
PUT /api/auth/user/update/{id}/
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "Nombre Actualizado",
    "email": "nuevo@email.com",
    "role": "admin"
}
```

#### Eliminar Usuario
```http
DELETE /api/auth/user/delete/{id}/
Authorization: Bearer {token}
```

## Datos de Prueba Incluidos

### Tipos de Quejas Disponibles
- Corrupción
- Maltrato
- Negligencia
- Discriminación
- Abuso de poder
- Violación de derechos
- Otros

### Departamentos Disponibles
- Recursos Humanos
- Administración
- Finanzas
- Tecnología
- Servicios Generales
- Atención al Cliente
- Legal

## Documentación Swagger

La documentación interactiva de la API está disponible en:
- **URL**: `http://localhost:8000/docs`
- **API JSON**: `http://localhost:8000/api/documentation`

## Estructura de la Base de Datos

### Tabla: users
- `id` (bigint, primary key)
- `identification` (string)
- `name` (string)
- `email` (string, unique)
- `password` (string, hashed)
- `role` (enum: 'user', 'admin', 'super_admin')
- `created_at`, `updated_at`

### Tabla: types
- `id` (bigint, primary key)
- `name` (string)
- `status` (enum: 'active', 'inactive')
- `created_at`, `updated_at`

### Tabla: departments
- `id` (bigint, primary key)
- `name` (string)
- `status` (enum: 'active', 'inactive')
- `created_at`, `updated_at`

### Tabla: complaints
- `id` (bigint, primary key)
- `code` (uuid, unique)
- `identification` (string)
- `name` (string)
- `phone` (string)
- `user_id` (bigint, foreign key)
- `type` (string)
- `departments` (string)
- `anonymous` (string)
- `description` (string)
- `region` (string)
- `province` (string)
- `municipality` (string)
- `address` (string)
- `file` (longtext)
- `priority` (enum: 'low', 'medium', 'high')
- `status` (enum: 'sent', 'received', 'process')
- `created_at`, `updated_at`

## Instalación y Configuración

1. **Clonar el repositorio**
2. **Instalar dependencias**: `composer install`
3. **Configurar variables de entorno**: Copiar `.env.example` a `.env`
4. **Generar clave de aplicación**: `php artisan key:generate`
5. **Configurar base de datos**: Actualizar configuración en `.env`
6. **Ejecutar migraciones**: `php artisan migrate:fresh`
7. **Poblar base de datos**: Los datos de prueba ya están incluidos

## Notas Importantes

- Todas las rutas protegidas requieren autenticación JWT
- Los tokens JWT tienen un tiempo de expiración configurable
- El sistema incluye validación de datos en todos los endpoints
- La documentación Swagger se genera automáticamente desde las anotaciones en los controladores
- El sistema está preparado para manejar archivos adjuntos en las quejas

## Solución de Problemas

Si encuentras problemas con el servidor de desarrollo debido a conflictos de dependencias, puedes usar el servidor PHP integrado:

```bash
cd public
php -S localhost:8000
```

Esto iniciará el servidor en `http://localhost:8000` y todas las rutas de la API estarán disponibles.