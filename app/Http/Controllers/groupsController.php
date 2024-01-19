<?php

namespace App\Http\Controllers;

use App\Models\groupsModel;
use Illuminate\Http\Request;

class groupsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/groups",
     *     summary="Show all groups",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     tags={"groups"},
     * )
     */
    public function index()
    {
        $allGroup = groupsModel::all();
        return response()->json($allGroup);
    }


    /**
     * @OA\Post(
     *     path="/groups",
     *     summary="Store new group",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="group_name",
     *         in="query",
     *         description="Name of the group to be stored",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="hq_city",
     *         in="query",
     *         description="Headquarter city of the group",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="id_chief",
     *         in="query",
     *         description="ID of the chief of the group",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     tags={"groups"},
     * )
     */
    public function store(Request $request)
    {
        $group_name = $request->input("group_names");
        $hq_city = $request->input("hq_city");
        $id_chief = $request->input("id_chief");
        $newGroup = new groupsModel;
        $newGroup->group_names = $group_name;
        $newGroup->hq_city = $hq_city;
        $newGroup->id_chief = $id_chief;
        $newGroup->save();
        
    }
    /**
     * @OA\Get(
     *     path="/groups/{id}",
     *     summary="Show specific group",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the group to be retrieved",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"groups"},
     * )
     */
    public function show(string $id)
    {
        $showSroups = groupsModel::find($id);
        return response()->json($showSroups);
    }


    /**
     * @OA\Put(
     *     path="/groups/{id}",
     *     summary="Update specific group",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the group to be updated",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="group_name",
     *         in="query",
     *         description="New name of the group (optional)",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="hq_city",
     *         in="query",
     *         description="New headquarter city of the group (optional)",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="id_chief",
     *         in="query",
     *         description="New ID of the chief of the group (optional)",
     *         required=false,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     tags={"groups"},
     * )
     */

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
     *     path="/groups/{id}",
     *     summary="Delete specific group",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the group to be deleted",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     tags={"groups"},
     * )
     */
    public function destroy(string $id)
    {
        $destroyGroup = groupsModel::find($id);
        $destroyGroup->delete();

        return response()->json([
            "message" => "group $id deleted successfully"
        ], 202);
    }

}
