<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Validator;

// Importa la clase 'Student_Model' desde el namespace 'App/Models'
// Esta clase representa el modelo Eloquent asociada a la tabla de de 'students' de la DB
use App\Models\Student_Model;

// Clase base para controladores en Laravel
use App\Http\Controllers\Controller;

// Clase que proporciona metodos para interactuar con las solicitudes HTTP
use Illuminate\Http\Request;

// Se define la clase StudentController que extiende a la clase 'Controller'
class StudentController extends Controller
{
    //Se define un metodo llamado 'index', este metodo se llama cuando se realiza una
    // solicitud HTTP GET a la ruta asociada al controlador
    public function index()
    {
        //Se usa el modelo 'Student_Model' para recuperar todos los registros de la tabla 'students'
        // y los asigna a la variable $students
        $students = Student_Model::all();

        // Verifica si hay registros en la variable $students
        if($students->count() > 0){

            // Devuelve un request json con codigo de estado 200(success) y la lista de registros
            // de la tabla 'students'
            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        }else{
            //devuelve un request json con un codigo de estado 404(Not found)
            // y un mensaje 'No records found'
            return response()->json([
                'status' => 404,
                'status_message' => 'No records found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:80',
            'course' => 'required|string|max:190',
            'email' => 'required|email|max:80',
            'phone' => 'required|digits:10'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $student = Student_Model::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            if($student){

                return response()->json([
                    'status' => 200,
                    'message' => "Student Created Successfully"
                ],200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong"
                ],500);
            }
        }
    }

    public function show($id){

        $student = Student_Model::find($id);
        if($student){

            return response()->json([
                'status' => 200,
                'student' => $student
            ],200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "Not such a student found"
            ],404);
        }
    }

    public function edit($id){

        $student = Student_Model::find($id);
        if($student){

            return response()->json([
                'status' => 200,
                'student' => $student
            ],200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "Not such a student found"
            ],404);
        }
    }

    public function update(Request $request, int $id){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:80',
            'course' => 'required|string|max:190',
            'email' => 'required|email|max:80',
            'phone' => 'required|digits:10'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $student = Student_Model::find($id);



            if($student){

                $student->update([
                    'name' => $request->name,
                    'course' => $request->course,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
                ],200);
            }else{

                return response()->json([
                    'status' => 404,
                    'message' => "Not such a student found for updating"
                ],404);
            }
        }
    }

    public function delete($id){

        $student = Student_Model::find($id);

        if($student){

            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => "the student record was deleted successfully"
            ],200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => "Not such a student found for updating"
            ],404);
        }
    }

}
