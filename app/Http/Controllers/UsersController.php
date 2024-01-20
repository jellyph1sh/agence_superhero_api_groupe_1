<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class UsersController extends Controller
{
    /**
     * @OA\Get(
     *      path="/users",
     *      summary="Get all users",
     *      @OA\Response(
     * response=200,
     *          description="get all users",
     *      ),
     *      tags={"users"},
     * )
     */
    public function index()
    {
        $newUsers = Users::all();

        return response()->json($newUsers);    
    }

    
    public function create()
    {
        // On récupère
    }
    /**
     * @OA\Post(
     *      path="/users",
     *      summary="Register a new user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful user add",
     *      ),
     *      tags={"users"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="lastname", type="string"),
     *              @OA\Property(property="firstname", type="string"),
     *              @OA\Property(property="alias", type="string"),
     *              @OA\Property(property="mail", type="string"),
     *              @OA\Property(property="password", type="string"),
     *              @OA\Property(property="role", type="string"),
     *              @OA\Property(property="profile_picture", type="string"),
     *          ),
     *      ),
     * )
     */
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
        return response()->json(['message' => 'new user create succefully'], 200);

    }

    /**
     * @OA\Get(
     *      path="/users/{id}",
     *      summary="Get a specific user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the user to be retrieved",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      tags={"users"},
     * )
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
 * @OA\Put(
 *      path="/users/{id}",
 *      summary="Update a user with an id",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 *   @OA\Response(
 *          response=404,
 *          description="bad request,user not found",
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the user to be updated",
 *          required=true,
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="lastname", type="string"),
 *              @OA\Property(property="firstname", type="string"),
 *              @OA\Property(property="alias", type="string"),
 *              @OA\Property(property="mail", type="string"),
 *              @OA\Property(property="password", type="string"),
 *              @OA\Property(property="role", type="string"),
 *              @OA\Property(property="profile_picture", type="string"),
 *          ),
 *      ),
 *      tags={"users"},
 * )
 */
    /**
     * @OA\Get(
     *     path="/",
     *     summary="Show all route api",
     *     @OA\Response(
     *         response=200,
     * description="get all api route in json file and order by request type",
     *     ),
     *     tags={"api"},
     * )
     */
    public function update(Request $request, $id)
    {
        $userUpdate = Users::find($id);

        if (!$userUpdate) {
            return response()->json(["error" => "User not found"], 404);
        }

        $userUpdate->lastname = $request->input('lastname');
        $userUpdate->firstname = $request->input('firstname');
        $userUpdate->alias = $request->input('alias');
        $userUpdate->mail = $request->input('mail');
        $userUpdate->role = $request->input('role');
        $userUpdate->profile_picture = $request->input('profile_picture');

        if ($request->filled('password')) {
            $userUpdate->password = Hash::make($request->input('password'));
        }

        $userUpdate->save();

        return response()->json(["message" => "User updated successfully"], 200);
    }



    /**
     * @OA\Delete(
     *      path="/users/{id}",
     *      summary="Delete a specific user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of the user to be deleted",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      tags={"users"},
     * )
     */
    public function destroy($id)
    {
            $newUser = Users::find($id);
            $newUser->delete();
            return response()->json([
                "message" => "user $id deleted successfully"
            ], 202);
        
    }
}
