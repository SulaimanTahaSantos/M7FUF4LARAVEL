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
        'message' => 'Llistat de partides',
        'data' => $games
    ], 200);

    }

    public function store(){
        $mascota = new Mascota();
        $mascota->name = $request->input('name');
        $mascota->url = $request->input('url');
        $mascota->description = $request->input('description');
        $mascota->user_id = Auth::id();
        $mascota->save();
        return response()->json($mascota, 201);
    }

    public function update(){
        $mascota = Mascota::find($id);
        if ($mascota) {
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

    public function destroy($id){
        $mascota = Mascota::find($id);
        if ($mascota) {
            $mascota->delete();
            return response()->json(['message' => 'Mascota deleted successfully']);
        } else {
            return response()->json(['message' => 'Mascota not found'], 404);
        }
    }
}
