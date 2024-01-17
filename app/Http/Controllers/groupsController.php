<?php

namespace App\Http\Controllers;

use App\Models\groupsModel;
use Illuminate\Http\Request;

class groupsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/groups}",
     *     summary="show all groups",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"groups"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     */
    public function index()
    {
        $allGroup = groupsModel::all();
        return response()->json($allGroup);
    }


    /**
     * @OA\Post(
     *     path="/groups",
     *     summary="stor new groups",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"groups"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function store(Request $request)
    {
        $group_name = $request->input("group_name");
        $hq_city = $request->input("hq_city");
        $id_chief = $request->input("id_chief");
        $newGroup = new groupsModel;
        $newGroup->group_name = $group_name;
        $newGroup->hq_city = $hq_city;
        $newGroup->id_chief = $id_chief;
        $newGroup->save();
    }
    /**
     * @OA\Get(
     *     path="/groups/{id}",
     *     summary="update specific groups",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"groups"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     */
    public function show(string $id)
    {
        $showSroups = groupsModel::find($id);
        return response()->json($showSroups);
    }



    /**
     * @OA\Put(
     *     path="/groups/{id}",
     *     summary="update specific véhicule ",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"groups"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function update(Request $request, string $id)
    {
        $updateGroup = GroupsModel::find($id);

        if (!$updateGroup) {
            return response()->json([
                "error" => "Group not found"
            ], 404);
        }

        $group_names = $request->input('group_names');
        $id_chief = $request->input('id_chief');
        $hq_city = $request->input('hq_city');

        $updateGroup->group_names = $group_names;
        $updateGroup->id_chief = $id_chief;
        $updateGroup->hq_city = $hq_city;

        $updateGroup->save();

        return response()->json([
            "message" => "Group $id updated successfully"
        ], 200);
    }
    /**
     * @OA\Delete(
     *     path="/groups/delete{id}",
     *     summary="delete specific groups",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"groups"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
     * */
    public function destroy(string $id)
    {
        $destroyGroup = groupsModel::find($id);
        $destroyGroup->delete();

        return response()->json([
            "message" => "group $id deleted successfully"
        ], 202);
    }

}
