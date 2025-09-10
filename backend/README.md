# Prueba técnica en Laravel

**Premisa:** Desarrollar una API para la consulta de cursos, lecciones y preguntas usando Laravel.

## Stack

-   PHP 8.4
-   Laravel 12
-   PostgreSQL 15
-   Redis
-   MeiliSearch
-   Docker

## Arquitectura de la solución

Principalmente se plantea el uso de servicios bien definidos, minimamente acomplados y orientados a una sola labor, haciendo uso del patrón repositorio para la abstracción de la capa de datos, permitiendo un mayor desacoplamiento de estos componentes y aumentando su mantenibilidad.

En **/app** existe entonces **/app/Services** con los servicios del negocio como lo relacionado para cursos, lecciones y preguntas, y en **/app/Repositories** para las implementaciones de acceso a datos, como interfaces a Eloquent.

A continuación parte de la estructura de carpetas de **/app**:

```
├── app
│   ├── Http
│   │   ├── Controllers
│   │   └── Resources
│   ├── Models
│   ├── Providers
│   ├── Repositories -> (Implementación de capa de datos)
│   │   ├── Courses
│   │   ├── Lessons
│   │   └── Questions
│   └── Services  -> (Acciones del sistema)
│       ├── Courses
│       ├── Lessons
│       └── Questions
```

## Cumplimiento de requisitos

### Obligatorios

-   [x] Requerimientos funcionales de la prueba

### Personales

Aqui se plantean mejoras y características adicionales para aportar valor a la solución.

-   [x] Tests de integración
-   [x] El uso de capas/responsabilidades bien marcadas
-   [x] Documentación tecnica de la API autogenerada en **http://localhost:8080/docs/api** y que permite exportar en formato OpenAPI (json) en **http://localhost:8080/docs/api.json**
-   [x] Uso de un sistema de busqueda basado en indices.
-   [x] Caching distribuido

## Como ejecutarlo

### Paso a paso

-   Deberias arrancar el proyecto usando docker
-   Debes configurar las variables de entorno usando el archivo .env.example
-   Debes ejecutar migraciones y los seeders

Este proyecto hace uso de Docker para facilitar la ejecución de las dependencias necesarias, los comandos para son:

Arrancar el proyecto usando docker compose (Por defecto composer al instalar las dependencias de Laravel copia el archivo .env.example a .env)

```
docker compose up --build -d
```

Ejecutar las migraciones y los seeders

```
docker compose exec -it app php artisan migrate --seed
```

Para ejecutar los test

```
docker compose exec -it app php artisan test
```

Si todo sale bien podremos visitar el proyecto en **http://localhost:8080**
