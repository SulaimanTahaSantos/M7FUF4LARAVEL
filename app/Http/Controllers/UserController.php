<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;



class UserController extends Controller
{
     public function index(){
        $users = User::all();
        if($users){
            return response()->json($users);
        } else {
            return response()->json(['message' => 'No users found'], 404);
        }
    }

    public function show($id){
        $user = User::find($id);
        if($user){
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

        public function store(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->rol = $request->input('rol');
        $user->save();
        return response()->json($user, 201);
    }

     public function update(Request $request, $id){
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function destroy($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
public function inicioSesion(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->input('email'))->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    $credentials = $request->only('email', 'password');
    try{
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
        ],200);
    }catch (JWTException $e){
        return response()->json([
            'error' => 'could_not_create_token',
            'message'=> $e->getMessage(),

        ], 500);
    }
}
public function logout(){
    try {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logout exitoso'], 200);
    } catch (JWTException $e) {
        return response()->json(['error' => 'No se pudo cerrar sesión'], 500);
    }
}

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }







}
