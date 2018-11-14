<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
Use Validator;
use Response;

class APIRegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'name'=> 'required',
            'email'=> 'requierd|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|max:10',
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json($validator->errors());
        }

      $user = User::create([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> bcrypt($request->get('password')),
        ]);
        // $user = User::first();
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}
