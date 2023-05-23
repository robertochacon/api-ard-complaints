<?php

namespace App\Http\Controllers;

use App\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintsController extends Controller
{
    /**
     * @OA\Get (
     *     path="/api/complaints",
     *      operationId="all",
     *     tags={"Complaints"},
     *     summary="All complaints",
     *     description="All complaints",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="string", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="codmunicipalitye", type="string", example=""),
     *              @OA\Property(property="address", type="string", example=""),
     *              @OA\Property(property="priority", type="string", example=""),
     *              @OA\Property(property="status", type="string", example=""),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function index()
    {
        $complaints = Complaints::all();
        return response()->json(["data"=>$complaints],200);
    }

    /**
     * @OA\Get (
     *     path="/api/complaints/person/{identification}",
     *      operationId="complaints_person",
     *     tags={"Complaints"},
     *     summary="All complaints of person",
     *     description="All complaints of person",
     *     @OA\Parameter(
     *         in="path",
     *         name="identification",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="string", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="codmunicipalitye", type="string", example=""),
     *              @OA\Property(property="address", type="string", example=""),
     *              @OA\Property(property="priority", type="string", example=""),
     *              @OA\Property(property="status", type="string", example=""),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */

    public function all_by_identification($identification)
    {
        $complaints = Complaints::where("identification", $identification)->get();
        return response()->json(["data"=>$complaints],200);
    }

    /**
     * @OA\Get (
     *     path="/api/complaints/user/{user_id}",
     *      operationId="complaints_user",
     *     tags={"Complaints"},
     *     summary="All complaints of user",
     *     description="All complaints of user",
     *     @OA\Parameter(
     *         in="path",
     *         name="user_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="string", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="codmunicipalitye", type="string", example=""),
     *              @OA\Property(property="address", type="string", example=""),
     *              @OA\Property(property="priority", type="string", example=""),
     *              @OA\Property(property="status", type="string", example=""),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */

    public function all_by_user($user_id)
    {
        $complaints = Complaints::where("user_id", $user_id)->get();
        return response()->json(["data"=>$complaints],200);
    }

    /**
     * @OA\Get (
     *     path="/api/complaint/{code}",
     *     operationId="complaints_code",
     *     tags={"Complaints"},
     *     summary="Get complaints of code",
     *     description="Get complaints of code",
     *     @OA\Parameter(
     *         in="path",
     *         name="code",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="string", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="codmunicipalitye", type="string", example=""),
     *              @OA\Property(property="address", type="string", example=""),
     *              @OA\Property(property="priority", type="string", example=""),
     *              @OA\Property(property="status", type="string", example=""),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */

    public function watch($code){
        try{
            $document = Complaints::where('code','=',$code)->get();
            return response()->json(["data"=>$document],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    /**
     * @OA\Post (
     *     path="/api/complaint",
     *     operationId="complaints_register",
     *     tags={"Complaints"},
     *     summary="Register complaint",
     *     description="Register complaint",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="identification", type="string", example="00000000000"),
     *              @OA\Property(property="user_id", type="number", example="1"),
     *              @OA\Property(property="type", type="string", example="type"),
     *              @OA\Property(property="departments", type="string", example="departments,m2"),
     *              @OA\Property(property="anonymous", type="string", example="true"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="region", type="string", example="region"),
     *              @OA\Property(property="province", type="string", example="province"),
     *              @OA\Property(property="municipality", type="string", example="municipality"),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="priority", type="string", example="priority"),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */

    public function register(Request $request)
    {
        $complaints = new Complaints(request()->all());
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time()."-".$file->getClientOriginalName();
            $path = "all/{$request->entity_id}/complaints/".$filename;
            Storage::disk('local')->put("public/{$path}", file_get_contents($request->file));
            $complaints->file = $path;
         }
        // if ($request->hasFile('file')) {
        //     $temp = file_get_contents($request->file('file'));
        //     $complaints->file = base64_encode($temp);
        //     // $path = $request->file('file')->store('/public/complaints');
        //     // $complaints->file = $path;
        //  }
        $complaints->save();
        return response()->json(["data"=>$complaints],200);
    }

    /**
     * @OA\Put (
     *     path="/api/complaint/update/{id}",
     *     operationId="complaints_register",
     *     tags={"Complaints"},
     *     summary="Update complaint",
     *     description="Update complaint",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="string", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="codmunicipalitye", type="string", example=""),
     *              @OA\Property(property="address", type="string", example=""),
     *              @OA\Property(property="priority", type="string", example=""),
     *              @OA\Property(property="status", type="string", example=""),
     *              @OA\Property(property="file", type="file", example=""),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */

    public function update(Request $request, $id){
        try{
            $document = Complaints::find($id);
            $document->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/complaint/delete/{id}",
     *      operationId="complaint_delete",
     *      tags={"Complaints"},
     *      summary="Delete complaints",
     *      description="Delete complaints",
     *    @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */

    public function delete($id){
        try{
            $docuemnts = Complaints::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
