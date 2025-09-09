# Solucion en Vue.js

**Premisa:** Desarrollar una interfaz para la consulta de cursos, lecciones y preguntas.

## Stack

- Vue.js 3 usando composition API
- Axios
- Tailwindcss
- DaisyUI

## Arquitectura de la solución

En **/src/api** se estructuran los tipos y la comunicación con la API, en **/src/components** se crean todos los elementos reutilizables en las vistas de cada contexto y en **/src/views** se guardan todas las vistas del sistema.

A continuación parte de la estructura de carpetas de:

```
src/
├── api
├── components
│   ├── courses
│   └── lessons
├── router
└── views
    ├── courses
    └── lessons
```

## Cumplimiento de requisitos

### Obligatorios

- [x] Requerimientos funcionales de la prueba

## Como ejecutarlo

### Paso a paso

- Instalar Node.js 18 o superior.
- Copiar el archivo .env.example a .env

Ejecutar el proyecto en modo desarrollo

```
npm run dev
```

Para el crear el build de produccion en /dist

```
npm run build
```
