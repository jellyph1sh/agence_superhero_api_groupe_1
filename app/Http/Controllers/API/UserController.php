<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
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
    
        $user = User::where('mail', request('mail'))->first();
    
        if ($user) {
            if (Hash::check(request('password'), $user->getAuthPassword())) {
                return [
                    'token' => $user->createToken(time())->plainTextToken
                ];
            }
        }
    
        // Authentication failed
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    
}
