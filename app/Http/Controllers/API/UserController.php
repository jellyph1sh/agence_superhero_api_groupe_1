<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;

use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserStoreRequest $request, User $user)
    {
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return response()->json();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }
}