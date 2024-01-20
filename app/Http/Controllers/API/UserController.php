<?php

namespace App\Http\Controllers\API;

use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    
    /**
     * @OA\Post(
     *     path="/login",
     *     tags={"Authentication"},
     *     summary="User login",
     *     description="Login with email and password",
     *     operationId="userLogin",
     *     @OA\RequestBody(
     *         required=true,
     *         description="User credentials",
     *         @OA\JsonContent(
     *             @OA\Property(property="mail", type="string", format="email"),
     *             @OA\Property(property="password", type="string", example="user_password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="token", type="string", example="your_access_token"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="boolean", example=true),
     *         ),
     *     ),
     * )
     */


    public function login()
    {
        validator(request()->all(), [
            'mail' => ['required', 'email'],
            'password' => ['required']
        ])->validate();
    
        $user = Users::where('mail', request('mail'))->first();
        if ($user && Hash::check(request('password'), $user->password)) {
            $token = $user->createToken(time())->plainTextToken;

            return response()->json(['status' => 'success', 'token' => $token], 200);
        }
        return response()->json(['error' => false], 401);
    }
    
}
