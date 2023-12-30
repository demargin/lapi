<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Model extends Model
{
    // Se utiliza el trait HasFactory en la clase Student_Model. Esto proporcionará métodos
    // relacionados con la creación de factorías de modelos.

    use HasFactory;

    // Se establece el nombre de la tabla de la base de datos asociada con este modelo.
    // El nombre de la tabla es 'students'

    protected $table = 'students';

    // Se define la propiedad '$fillable', que es un array que contiene los nombres de las columnas
    // de la base de datos que se pueden asignar de forma masiva ( mass assignable)

    protected $fillable = [
        'name',
        'course',
        'email',
        'phone'
    ];
}
