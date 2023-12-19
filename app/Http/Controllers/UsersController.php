<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $newUsers = Users::all();

        return response()->json($newUsers);    
    }

    
    public function create()
    {
        // On récupère
    }

    public function store(Request $request)
    {
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $alias = $request->input('alias');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $role = $request->input('role');
        $profile_picture = $request->input('profile_picture');
        $newUser = new Users;
        $newUser->firstname = $firstname;
        $newUser->lastname = $lastname;
        $newUser->alias = $alias;
        $newUser->mail = $mail;
        $newUser->password = $password;
        $newUser->role = $role;
        $newUser->profile_picture = $profile_picture;


        $newUser->save();
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $newUser = Users::find($id);
        if (!empty($newUser)) 
        {
        return response()->json($newUser);
        }else{
            return response()->json(["message" => " User $id not foud"], 404);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $newUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $userUpdate = Users::find($id);
        $userUpdate -> lastname = $request->input('lastname');
        $userUpdate-> firstname = $request->input('firstname');
        $userUpdate-> alias = $request->input('alias');
        $userUpdate-> mail = $request->input('mail');
        $userUpdate-> password = $request->input('password');
        $userUpdate-> role = $request->input('role');
        $userUpdate-> profile_picture = $request->input('profile_picture');
        $userUpdate->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Users::where('id', $id)->exists()){
            $newUser = Users::find($id);
            $newUser->delete();
            return response()->json([
                "message" => "user $id deleted successfully"
            ], 202);
        }else{
            return response()->json(["message" => "user $id not found"], 404);
        }
    }
}
