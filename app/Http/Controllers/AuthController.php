<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email|max:191',
            'password' => 'required|string|confirmed|min:8'
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }
        else
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
    
    
            return response()->json([
                'status' => 201,
                'name' => $user->name,
                'message' => "Registered Successfully"
            ]);
        }

        

        

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|max:191',
            'password' => 'required|string'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }
       
        $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password))
            {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid Credentials'
                ]);
            }
        $token = $user->createToken('resumetoken')->plainTextToken;
        return response()->json([
            'status' => 200,
            'name' => $user->name,
            'token' => $token,
            'message' => "Logged In Successfully"
        ]);
        

    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'Response' => 'Logged out Successfully'
        ]);
    }
}
