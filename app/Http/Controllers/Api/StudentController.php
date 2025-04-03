<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return response()->json(['students'=>$students], 200);
    }

    public function show($id){
        $student = Student::find($id);
        if(!$student){
            return response()->json(['message'=>'Estudiante no encontrado'], 404);
        }
        return response()->json(['student'=>$student], 200);
    }
    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:student',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $student = Student::create($request->all());
        return response()->json(['student'=>$student], 201);
    }
    public function update($id, Request $request){
        $student = Student::find($id);
        if(!$student){
            return response()->json(['message'=>'Estudiante no encontrado'], 404);
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('student')->ignore($student->id),
            ],
            'phone' => 'sometimes|nullable|string|max:15',
            'address' => 'sometimes|nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $student->update($request->all());
        return response()->json(['student'=>$student], 200);
    }

    // Actualizar parcialmente

    public function patch($id, Request $request){
        $student = Student::find($id);
        if(!$student){
            return response()->json(['message'=>'Estudiante no encontrado'], 404);
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('student')->ignore($student->id),
            ],
            'phone' => 'sometimes|nullable|string|max:15',
            'address' => 'sometimes|nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $student->update($request->all());
        return response()->json(['student'=>$student], 200);
    }
    public function destroy($id){
        $student = Student::find($id);
        if(!$student){
            return response()->json(['message'=>'Estudiante no encontrado'], 404);
        }
        $student->delete();
        return response()->json(['message'=>'Estudiante eliminado'], 200);
    }

}
