<?php

namespace App\Http\Controllers;

use App\Models\Power_users_model;
use Illuminate\Http\Request;

class Powers_users_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_power_users = Power_users_model::all();
        return response()->json($all_power_users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $power_usersWithId = Power_users_model::find($id);
        if (!empty($power_usersWithId)) {
            return response()->json($power_usersWithId);
        } else {
            return response()->json(["message : " => "user $id not found"]);
        }
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
