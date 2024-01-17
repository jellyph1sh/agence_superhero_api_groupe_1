<?php

namespace App\Http\Controllers;

use App\Models\gadgetModel;
use Illuminate\Http\Request;

class gadgetController extends Controller
{
    /**
     * @OA\Get(
     *     path="/gadget}",
     *     summary="show all gadget",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"gadget"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     */
    public function index()
    {
        $allGadget = gadgetModel::all();
        return response()->json($allGadget);
    }
    /**
     * @OA\Post(
     *     path="/gadget",
     *     summary="Store a new gadget",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="gadget_name",
     *         in="query",
     *         description="Name of the gadget to be stored",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="gadget_description",
     *         in="query",
     *         description="Description of the gadget to be stored",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"gadget"},
     * )
     */
    public function store(Request $request)
    {
        $gadget_name = $request->input("gadget_name");
        $gadget_description = $request->input("gadget_description");
        $newGadget = new gadgetModel;
        $newGadget->gadget_name = $gadget_name;
        $newGadget->gadget_description = $gadget_description;
        $newGadget->save();
    }
    /**
     * @OA\Put(
     *     path="/gadget/{id}",
     *     summary="Update specific gadget",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the gadget to be updated",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="gadget_name",
     *         in="query",
     *         description="New name of the gadget (optional)",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="gadget_description",
     *         in="query",
     *         description="New description of the gadget (optional)",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"gadget"},
     * )
     */
    function update(Request $request, string $id)
    {
        $gadgetToUpdate = gadgetController::find($id);
    if (!empty($request->input("gadget_name"))) {
        $gadgetToUpdate->gadget_name = $request->input('gadget_name');
        $gadgetToUpdate->save();
        return redirect()->back()->with('status', "gadget update succefully");

    }elseif(!empty($request->input("gadget_description"))){
        $gadgetToUpdate->gadget_description = $request->input('gadget_description');
        $gadgetToUpdate->save();
        return redirect()->back()->with('status', "gadget update succefully");

    }else{
        return redirect()->back()->with('status', "fail to update");

    }
}
    /**
     * @OA\Get(
     *     path="/gadget/{id}",
     *     summary="Show specific gadget",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the gadget to be retrieved",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"gadget"},
     * )
     */
    public function show(string $id)
    {
        $showGadget = gadgetModel::find($id);
        return response()->json($showGadget);
    }

    /**
     * @OA\Delete(
     *     path="/gadget/{id}",
     *     summary="Delete specific gadget",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the gadget to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"gadget"},
     * )
     */

    public function destroy($id)
    {
        $destroyGadget = gadgetModel::find($id);
        $destroyGadget -> delete();
        return response()->json([
            "message" => "gadget $id deleted successfully"
        ], 202);
    }

}
