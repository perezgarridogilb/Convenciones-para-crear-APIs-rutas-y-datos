# Convenciones-para-crear-APIs-rutas-y-datos
Convenciones para crear APIs: rutas y datos

## Rutas
- Llamar a las rutas como sustantivo y no como verbo
- Ejemplo: `http:laravel-api.test/api/categories`
- Api para un entorno web: RestFull, nuestro proyecto web cuenta con todas las cualidades y características profesionales del estandar Rest

- Respuestas estándar:
No importa que el recurso donde lo estés utilizando, la respuesta debe ser la misma debe ser la misma estructura, debe ser de forma coherente.
- Versionado API:
Este código no afecte a los clientes anteriores

## Status code
200 - bien
300 - redirect
400 - no encontrado
500 - falló el servidor


php artisan make:migration create_recipe_tag_table
