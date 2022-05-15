<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function user($id){
        try {
            $user = User::find($id);
            if ($user) {
                return response()->json($user, 200);
            }
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function handle(Request $request){
        try {
            $users = User::orderByDesc('id');

            return response()->json($users->paginate(15), 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            User::create($request->all());
            return response()->json([], 201);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
    public function update($id, Request $request)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->update($request->all());
                return response()->json($user, 200);
            }
            return response()->json([], 404);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    "message" => 'User deleted'
                ], 200);
            }
            return response()->json([], 404);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
