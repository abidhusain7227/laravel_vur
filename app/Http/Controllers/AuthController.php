<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function Getlogin(){
        dd('login view page');
    }
    public function Register(Request $request)
    {
        try {
            // dd($request->all(),'abid');
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function Login(Request $request)
    {
        // dd($request->all());
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                // return response()->json($validateUser->messages(), 401);
                // return response()->json([
                //     'status' => false,
                //     'message' => $validateUser->messages(),
                // ], 401);
                return response()->json(['errors'=>$validateUser->errors()->all()]);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                // return response()->json([
                //     'status' => false,
                //     'message' => array(['Email & Password does not match with our record.']),
                // ], 401);
                // dd('hello');
                // return 'abid';
                // return response()->json(['errors' => 'Email & Password does not match with our record.'], 101);
                return response()->json(['errors' => 'Email & Password does not match with our record.']);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'user' => $user,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("Abidhusain API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function Logout(Request $request)
    {
        // dd($request->user());
        // dd($request->user()->toArray());
        $user = $request->user();
        // Revoke all tokens...
        $user->tokens()->delete();

        return response()->json(['message' => 'User logout Successfully'], 200);

        // Revoke the token that was used to authenticate the current request...
        // $request->user()->currentAccessToken()->delete();
    }
}
