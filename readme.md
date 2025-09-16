# API ARD Complaints

Sistema de gestión de quejas desarrollado con Laravel 5.8 y JWT Authentication.

## 🚀 Inicio Rápido

### Credenciales de Prueba

**Usuarios Administradores:**
- **Admin**: `admin@test.com` / `admin123`
- **Super Admin**: `superadmin@test.com` / `superadmin123`

**Usuarios Regulares:**
- **Test User**: `user@test.com` / `user123`
- **Demo User**: `demo@test.com` / `demo123`

### Iniciar el Servidor

```bash
# Opción 1: Servidor Laravel (si no hay conflictos de dependencias)
php artisan serve --port=8000

# Opción 2: Servidor PHP integrado (recomendado)
cd public
php -S localhost:8000
```

### Documentación de la API

- **Swagger UI**: http://localhost:8000/docs
- **API JSON**: http://localhost:8000/api/documentation
- **Documentación Completa**: Ver [API_DOCUMENTATION.md](API_DOCUMENTATION.md)

## 📋 Endpoints Principales

### Autenticación
- `POST /api/login/` - Iniciar sesión
- `POST /api/register/` - Registro de usuario
- `POST /api/logout/` - Cerrar sesión
- `POST /api/refresh/` - Renovar token

### Gestión de Quejas (Protegido)
- `GET /api/auth/complaints/` - Listar quejas
- `POST /api/auth/complaint/` - Crear queja
- `GET /api/auth/complaint/{code}/` - Ver queja específica
- `PUT /api/auth/complaint/update/{id}/` - Actualizar queja
- `DELETE /api/auth/complaint/delete/{id}/` - Eliminar queja

### Gestión de Tipos (Protegido)
- `GET /api/auth/types/` - Listar tipos
- `POST /api/auth/type/` - Crear tipo
- `PUT /api/auth/type/update/{id}/` - Actualizar tipo
- `DELETE /api/auth/type/delete/{id}/` - Eliminar tipo

### Gestión de Departamentos (Protegido)
- `GET /api/auth/departaments/` - Listar departamentos
- `POST /api/auth/departament/` - Crear departamento
- `PUT /api/auth/departament/update/{id}/` - Actualizar departamento
- `DELETE /api/auth/departament/delete/{id}/` - Eliminar departamento

### Gestión de Usuarios (Protegido)
- `GET /api/auth/users/` - Listar usuarios
- `GET /api/auth/user/{id}/` - Ver usuario específico
- `PUT /api/auth/user/update/{id}/` - Actualizar usuario
- `DELETE /api/auth/user/delete/{id}/` - Eliminar usuario

## 🔐 Autenticación JWT

Todas las rutas protegidas requieren el header:
```
Authorization: Bearer {token}
```

## 📊 Datos de Prueba Incluidos

**Tipos de Quejas:**
- Corrupción, Maltrato, Negligencia, Discriminación, Abuso de poder, Violación de derechos, Otros

**Departamentos:**
- Recursos Humanos, Administración, Finanzas, Tecnología, Servicios Generales, Atención al Cliente, Legal

## 🛠️ Instalación

1. `composer install`
2. Copiar `.env.example` a `.env`
3. `php artisan key:generate`
4. Configurar base de datos en `.env`
5. `php artisan migrate:fresh`
6. Los datos de prueba ya están incluidos

## 📚 Documentación Completa

Para información detallada sobre todos los endpoints, estructura de datos y ejemplos de uso, consulta [API_DOCUMENTATION.md](API_DOCUMENTATION.md).

## ⚠️ Notas Importantes

- El sistema está configurado con SQLite por defecto
- La documentación Swagger se genera automáticamente
- Todos los endpoints incluyen validación de datos
- El sistema soporta archivos adjuntos en las quejas