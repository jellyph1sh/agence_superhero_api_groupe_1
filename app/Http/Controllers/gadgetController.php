<?php

namespace App\Http\Controllers;

use App\Models\gadgetModel;
use Illuminate\Http\Request;

class gadgetController extends Controller
{
    /**
     * @OA\Post(
     *     path="/gadget",
     *     summary="stor new gadget",
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
     * */
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
 *     summary="update specific gadget",
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
 * */
function update(Request $request, string $id){
    $gadgetToUpdate = gadgetController::find($id);
    if (!empty($request->input("gadget_name"))) {
        $gadgetToUpdate->gadget_name = $request->input('gadget_name');
        $gadgetToUpdate->update();
        return redirect()->back()->with('status', "gadget update succefully");

    }elseif(!empty($request->input("gadget_description"))){
        $gadgetToUpdate->gadget_description = $request->input('gadget_description');
        $gadgetToUpdate->update();
        return redirect()->back()->with('status', "gadget update succefully");

    }else{
        return redirect()->back()->with('status', "fail to update");

    }
}
    /**
 * @OA\Delete(
 *     path="/gadget/delete/{id}",
 *     summary="delete specific gadget",
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
 **/
    public function destroy($id)
    {
        $destroyGadget = gadgetModel::find($id);
        $destroyGadget -> delete();
        return response()->json([
            "message" => "gadget $id deleted successfully"
        ], 202);
    }

}
