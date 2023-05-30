<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Controllers\MahasiswaController;
use App\Http\Requests\RegisterRequest;

class ApiAuthController extends Controller
{
    Public function login(LoginRequest $request){

        //check apakah data user yang diinput ada
        $user= User::where('username', $request->username)->first();

        //check password
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'massage' => 'user atau password salah'
            ],401);
        }

        //generate token
        $token =$user->createToken('token')->plainTextToken;

        return new LoginResource([
            'massage' => 'success login',
            'user' => $user,
            'token' => $token,
        ],200);
    }

    public function logout(Request $request){
        #hapus
        $request->user()->tokens()->delete();

        #response
        return response()->noContent();
    }

    public function register(RegisterRequest $request){

        $user=User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token=$user->createToken('token')->plainTextToken;

        return new LoginResource([
            'massage'=>'success login',
            'user'=>$user,
            'token'=>$token,
        ],200);
    }
}
