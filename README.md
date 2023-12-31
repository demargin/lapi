## Introduccion
Este proyecto es un ejemplo de un CRUD básico hecho en Laravel. El proyecto permite crear, leer, actualizar y eliminar usuarios.

Proporciona una API RESTful para gestionar los datos de estudiantes. Permite crear, leer, actualizar y eliminar estudiantes, así como obtener listados de estudiantes.

## Estructura del proyecto:

    ** app/Http/Controllers/api: Contiene los controladores API, incluyendo el controlador StudentController para gestionar las operaciones con los estudiantes.

    ** app/Models: Contiene los modelos Eloquent, incluyendo el modelo Student_Model para interactuar con la tabla students de la base de datos.

    ** routes/api.php: Define las rutas API para el proyecto.

    ** database/migrations: Contiene las migraciones de la base de datos, incluyendo la migración 2023_12_23_150331_create_students_table.php que crea la tabla students.

    ** database/seeders/DatabaseSeeder.php : Contiene los datos de prueba que se generaran para las tablas de users y student de la base de datos.

## Características

    API RESTful: Proporciona una interfaz RESTful para interactuar con los datos de estudiantes.
    CRUD completo: Permite crear, leer, actualizar y eliminar estudiantes.
    Validación de datos: Valida los datos de entrada para asegurar la integridad de la información.
    Respuestas JSON: Devuelve respuestas en formato JSON para facilitar la integración con otras aplicaciones.
    Modelos Eloquent: Utiliza modelos Eloquent para interactuar con la base de datos de forma fluida.

## Pre-requisitos

    PHP 8.2 o superior
    Laravel 10.38 o superior
    Composer 2.6.6 o superior


## Instalación

1. Clona el repositorio:

git clone https://github.com/demargin/lapi.git


2. Instala las dependencias:

composer install


3. Crea una base de datos con mariadb o mysql.

4. Crea tu archivo .env donde deberas configurar las variables de entorno

cp .env.example .env

5. Genera la Key para tu proyecto:

php artisan key:generate

6. Migra la base de datos:

php artisan migrate


7. Genera los datos de prueba para las tablas users y students (/database/seeders/DatabaseSeeder.php):

php artisan db:seed


## Uso

Para iniciar el servidor local, ejecuta el siguiente comando:

php artisan serve --port=8000


El servidor se iniciará en el puerto 8000. Puedes acceder al proyecto en la siguiente dirección:

http://localhost:8000

Para acceder a la API, se debe hacer a traves de la siguiente direccion:

http://localhost:8000/api/students

## Licencia

Este proyecto está licenciado bajo la licencia MIT.

## Modelos y controladores
Modelo Student_Model

El modelo Student_Model representa la tabla students de la base de datos y contiene los siguientes atributos:

    name: Nombre del estudiante
    course: Curso del estudiante
    email: Correo electrónico del estudiante
    phone: Teléfono del estudiante

Controlador StudentController

El controlador StudentController proporciona los siguientes métodos para gestionar los estudiantes:

    index: Devuelve un listado de todos los estudiantes.
    store: Crea un nuevo estudiante.
    show: Devuelve un estudiante específico por su ID.
    edit: Devuelve un estudiante específico para su edición.
    update: Actualiza un estudiante existente.
    delete: Elimina un estudiante existente.
