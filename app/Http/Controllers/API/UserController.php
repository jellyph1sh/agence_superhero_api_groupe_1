<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
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
    public function login()
    {
        validator(request()->all(),  [
            'email' => ['required', 'email'], 
            'password' => ['required']
        ])->validate();
        $user = User::where('email', request('email'))->first();
        if(hash::check(request('password'), $user->getAuthPassword())) {
            return [
                'token' => $use->createToken(time())->plainTextToken
            ];

        }
    }
}
