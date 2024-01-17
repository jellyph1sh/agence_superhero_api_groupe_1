<?php

namespace App\Http\Controllers;

use App\Models\PowersModel;
use Illuminate\Http\Request;

class PoweersControllers extends Controller
{
    /**
     * @OA\Get(
     *     path="/power",
     *     summary="delete specific powers",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"powers"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function index()
    {
        $getAllPower = PowersModel::all();
        return response()->json($getAllPower);
    }

    /**
     * @OA\Post(
     *     path="/powers/{id}",
     *     summary="delete specific powers",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"powers"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function store(Request $request)
    {
        $power_name = $request->input("power_name");
        $power_description = $request->input("power_description");
        $newPower = new PowersModel;
        $newPower->power_name = $power_name;
        $newPower->power_description = $power_description;
        $newPower->save();
    }
    /**
     * @OA\Get(
     *     path="/powers/{id}",
     *     summary="show specif powers",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"powers"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function show(string $id)
    {
        $powers = PowersModel::find($id);
        if (!empty($powers)) {
            return response()->json($powers);
        } else {
            return response()->json(["message : " => "power $id not found"]);
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
     * @OA\Delete(
     *     path="/powers/{id}",
     *     summary="delete specific powers",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"powers"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function destroy(string $id)
    {
        $deletPower = PowersModel::find($id);
        $deletPower -> delete();
        return response()->json([
            "message" => "delete $id deleted successfully"
        ], 202);
    }
}
