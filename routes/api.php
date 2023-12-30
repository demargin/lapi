<?php

use App\Http\Controllers\api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Ejemplo para ver si funciona la ruta api/students que retorne un mensaje 'This is a return message'

/* Route::get('students', function (){
    return 'This is a return message';
});
 */

//Esta ruta devolvera el listado de los registros (Read)
Route::get('students', [StudentController::class, 'index']);

// Esta ruta ejecutara una funcion para insertar registros (Create)
Route::post('students', [StudentController::class, 'store']);

//Esta ruta devolvera un unico registro igual al Id que se indique en la url (Read)
Route::get('students/{id}', [StudentController::class, 'show']);

Route::get('students/{id}/edit', [StudentController::class, 'edit']);

Route::put('students/{id}/edit', [StudentController::class, 'update']);

Route::delete('students/{id}/delete', [StudentController::class, 'delete']);



