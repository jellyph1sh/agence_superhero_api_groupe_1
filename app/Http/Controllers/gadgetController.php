<?php

namespace App\Http\Controllers;

use App\Models\gadgetModel;
use Illuminate\Http\Request;

class gadgetController extends Controller
{
    public function store(Request $request)
    {
        $gadget_name = $request->input("gadget_name");
        $gadget_description = $request->input("gadget_description");
        $newGadget = new gadgetModel();
        $newGadget->gadget_name = $gadget_name;
        $newGadget->gadget_description = $gadget_description;
        $newGadget->save();
    }
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
    public function destroy($id)
    {
        $destroyGadget = gadgetModel::find($id);
        $destroyGadget -> delete();
    }

}
