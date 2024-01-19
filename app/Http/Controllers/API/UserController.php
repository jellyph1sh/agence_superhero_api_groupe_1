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
     * ...

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $user)
    {
        //
    }

    /**
     * User login.
     */
    public function login()
    {
        validator(request()->all(), [
            'mail' => ['required', 'email'],
            'password' => ['required']
        ])->validate();
    
        $user = Users::where('mail', request('mail'))->first();
        if ($user && Hash::check(request('password'), $user->password)) {
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
        return response()->json(['error' => false], 401);
    }
    
}
