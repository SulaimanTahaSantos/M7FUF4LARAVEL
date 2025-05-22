<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;



class MascotaController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $mascotas = Mascota::where('user_id', $user_id)->get();
        return response()->json([
        'message' => 'Lista de mis mascotas',
        'data' => $mascotas
    ], 200);

    }

    public function show($id){
        $mascota = Mascota::find($id);
        if($mascota){
            return response()->json($mascota);
        } else {
            return response()->json(['message' => 'Mascota not found'], 404);
        }
    }

    public function showByUser($user_id){
        $mascotas = Mascota::where('user_id', $user_id)->get();
        if($mascotas){
            return response()->json($mascotas);
        } else {
            return response()->json(['message' => 'Mascotas not found'], 404);
        }
    }

    public function store(Request $request){
        $mascota = new Mascota();
        $mascota->name = $request->input('name');
        $mascota->url = $request->input('url');
        $mascota->description = $request->input('description');
        $mascota->user_id = Auth::id();
        $mascota->save();
        return response()->json($mascota, 201);
    }


    public function update(Request $request, $id){
        $mascota = Mascota::find($id);
        if ($mascota) {
            if ($mascota->user_id !== Auth::id()) {
                return response()->json(['message' => 'No tienes permiso para editar esta mascota'], 403);
            }
            $mascota->name = $request->input('name');
            $mascota->url = $request->input('url');
            $mascota->description = $request->input('description');
            $mascota->user_id = Auth::id();
            $mascota->save();
            return response()->json($mascota);
        } else {
            return response()->json(['message' => 'Mascota not found'], 404);
        }
    }


    public function patch(Request $request, $id){
        $mascota = Mascota::find($id);
        if ($mascota) {
            if ($mascota->user_id !== Auth::id()) {
                return response()->json(['message' => 'No tienes permiso para editar esta mascota'], 403);
            }
            $mascota->update($request->all());
            return response()->json($mascota);
        } else {
            return response()->json(['message' => 'Mascota not found'], 404);
        }
    }

    public function destroy($id){
        $mascota = Mascota::find($id);
        if ($mascota) {
            if ($mascota->user_id !== Auth::id()) {
                return response()->json(['message' => 'No tienes permiso para eliminar esta mascota'], 403);
            }
            $mascota->delete();
            return response()->json(['message' => 'Mascota deleted successfully']);
        } else {
            return response()->json(['message' => 'Mascota not found'], 404);
        }
    }
}
