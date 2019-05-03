<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request, User $user) 
    {

        // Get the value from the form
        $input['email'] = $request->email;

        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['message' => 'That email address is already registered. You sure you don\'t have an account?']);
        }
        else {
            $user = $user->create([
             'name' => $request->name,
             'email' => $request->email,
             'password' =>  bcrypt($request->password),
             'api_token' => bcrypt($request->email),
            ]);

            $response = $user;

            return response()->json($response, 201);
        }

    	// $this->validate($request, [
    	// 	'name' => 'required',
    	// 	'email' => 'required|email|unique:users',
    	// 	'password' => 'required|min:6'
    	// ]);

    	// $user = $user->create([
    	// 	'name' => $request->name,
    	// 	'email' => $request->email,
    	// 	'password' =>  bcrypt($request->password),
    	// 	'api_token' => bcrypt($request->email),
    	// ]);

    	// $response = $user;

    	// return response()->json($response, 201);
    }

    public function login(Request $request, User $user) 
    {
    	// if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    	// 	return response()->json(['error' => 'Your credential is wrong'], 401);
    	// }

    	// $user = $user->find(Auth::user()->id);

    	// return response()->json($user);
        
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($check) {
            return response()->json(Auth::user());
        } else {
            return response()->json(['message' => 'Username atau Password salah! ']);
        }
    }
}
