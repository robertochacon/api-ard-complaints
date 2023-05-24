<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth:api', ['except' => ['login','register']]
        );
    }

    /**
        * @OA\Post(
        * path="/api/register",
        * operationId="Register",
        * tags={"Register"},
        * summary="User Register",
        * description="User Register here",
        *      @OA\RequestBody(
        *         required=true,
        *         @OA\JsonContent(
        *               required={"name","email", "password", "password_confirmation"},
        *               @OA\Property(property="identification", type="string"),
        *               @OA\Property(property="name", type="string"),
        *               @OA\Property(property="email", type="string"),
        *               @OA\Property(property="password", type="string"),
        *               @OA\Property(property="password_confirmation", type="string")
        *         ),
        *      ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */

    public function register()
    {
        $user = new User(request()->all());
        $user->password = bcrypt($user->password);
        $user->save();
        return response()->json(["data"=>$user],200);
    }

    /**
     * @OA\Post(
     * path="/api/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"Login"},
     * @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="admin@gmail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="admin"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['status' => 'error', 'error' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        // return $this->respondWithToken($token);
        return response()->json(['status' => 'success', 'token' => $token, 'user' => $user]);

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
