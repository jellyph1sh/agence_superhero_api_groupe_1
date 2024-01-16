<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;


 

class UsersController extends Controller
{

    /**
     * @OA\Get(
     *      path="/users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      summary="get all users",
            tags={"users"},
     *     @OA\PathItem (
     *     ),
     * ),
     
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

    /**
     * @OA\Post(
     *      path="/users/add",
     *      @OA\Response(
     *          response=200,
     *          description="Successful add",
     *      ),
     *           summary="Register a new user",
     * tags={"users"},

     *     @OA\PathItem (
     *     ),
     * ),
     
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
    }

    /**
* @OA\Get(
 *     path="/users/{id}",
 *     summary="Get a list spcefic users",
 *          @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *      ),
 * 
 *      @OA\PathItem(
 *      ),
 *      tags={"users"},
 * ),
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
     * @OA\Post(
     *     path="/users/update/{id}",
     *     summary="Update  a user with an id ",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     * 
     *      @OA\PathItem(
     *      ),
     *      tags={"users"},

     * ),
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
     * @OA\Put(
     *     path="/users/delete/{id}",
     *     summary="delete a  spcefic users",
     *          @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *  
     *      tags={"users"},
     *      @OA\PathItem(
     *      ),
     *    
     * ),
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
