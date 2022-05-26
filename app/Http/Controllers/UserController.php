<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{   
    
    public function login()
    {
        if (auth()->attempt(request()->input())) {
            $user = auth()->user();
            $success['access_token'] = $user
                ->createToken('Passport Api')
                ->accessToken;
            return response()->json($success, 200);

        } else {
            return response()->json(['error' => 'Sus credenciales de acceso no coinciden con nuestros registros.'], 401);
        }
    }

    public function register()
    {

        $validator = Validator::make(request()->input(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        request()->merge(['password' => bcrypt(request('password'))]);
        $user = User::create(request()->input());
        $success['access_token'] = $user
            ->createToken('tasks api')
            ->accessToken;


        return response()->json($success);
    }

    public function detail()
    {
        
        $accessToken = Auth::user()->createToken('authTestToken');

        return response([
            'user' => Auth::user(),
            'access_token' => $accessToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Se ha cerrado la sesión.', 200);
    }


}
