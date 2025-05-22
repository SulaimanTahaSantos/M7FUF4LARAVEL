<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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





}
