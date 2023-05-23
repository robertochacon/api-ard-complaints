<?php

namespace App\Http\Controllers;

use App\User;
use App\Entitys;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login','register']]);
    }

    public function register()
    {
        $user = new User(request()->all());
        $user->password = bcrypt($user->password);
        $user->save();
        return response()->json(["data"=>$user],200);
    }

    public function login()
    {
        $credentials = request(['identification', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = auth()->user();
        $entity = Entitys::find($user->entity_id);

        // return $this->respondWithToken($token);
        return response()->json(['token' => $token, 'user' => $user, 'entity' => $entity]);

    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


}
