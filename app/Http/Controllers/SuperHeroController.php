<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperHeroModel;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $alias = $request->input('alias');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $role = $request->input('role');
        $profile_picture = $request->input('profile_picture');
        $newUser = new SuperHeroModel;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
