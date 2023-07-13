<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintsController extends Controller
{
    /**
     * @OA\Get (
     *     path="/api/complaints",
     *      operationId="all",
     *     tags={"Complaints"},
     *     security={{ "apiAuth": {} }},
     *     summary="All complaints",
     *     description="All complaints",
     *     @OA\Parameter(
     *          in="query",
     *          name="history",
     *          @OA\Schema(type="boolean")
     *     ),
     *     @OA\Parameter(
     *          in="query",
     *          name="departament",
     *          @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *          in="query",
     *          name="person",
     *          @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *          in="query",
     *          name="user",
     *          @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type_id", type="string", example=""),
     *              @OA\Property(property="department_id", type="string", example=""),
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
    *          response=401,
    *          description="Unauthorized",
    *          @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *           )
    *       ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $history = $request->history;
        $byDepartament = $request->departament;
        $byPerson = $request->person;
        $byUser = $request->user;


        if ($history==true) {
            $complaints = Complaints::where('status',['Finalizada','Rechazada'])->with(['department','type','user.departaments'])->paginate(10);
            $complaints->makeHidden(['file']);
            return response()->json(["data"=>$complaints],200);
        }
        

        if ($byDepartament!==null) {
            $complaints = Complaints::where('status',['Enviada','Recibida','Procesando'])->where('department_id',$byDepartament)->with(['department','type','user.departaments'])->paginate(10);
            $complaints->makeHidden(['file']);
            return response()->json(["data"=>$complaints],200);
        }


        if ($byPerson!==null) {
            $complaints = Complaints::where("identification", $byPerson)->with(['department','type','user.departaments'])->paginate(10);
            $complaints->makeHidden(['file']);
            return response()->json(["data"=>$complaints],200);
        }

        if ($byUser!==null) {
            $complaints = Complaints::where("user_id", $byUser)->with(['department','type','user.departaments'])->paginate(10);
            $complaints->makeHidden(['file']);
            return response()->json(["data"=>$complaints],200);
        }

        $complaints = Complaints::with(['department','type','user.departaments'])->paginate(10);
        $complaints->makeHidden(['file']);
        return response()->json(["data"=>$complaints],200);
    }


    /**
     * @OA\Get (
     *     path="/api/complaints/{id}",
     *     operationId="complaints_id",
     *     tags={"Complaints"},
     *     security={{ "apiAuth": {} }},
     *     summary="Get complaints of id",
     *     description="Get complaints of id",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
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
     *              @OA\Property(property="type_id", type="string", example=""),
     *              @OA\Property(property="department_id", type="string", example=""),
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

    public function watch($id){
        try{
            $document = Complaints::where('id',$id)->with(['department','type','user.departaments'])->first();
            return response()->json(["data"=>$document],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    /**
     * @OA\Post (
     *     path="/api/complaints",
     *     operationId="complaints_register",
     *     tags={"Complaints"},
     *     security={{ "apiAuth": {} }},
     *     summary="Register complaint",
     *     description="Register complaint",
    *      @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *               required={"description","departments", "type"},
     *              @OA\Property(property="identification", type="string", example="00000000000"),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="phone", type="string", example="phone"),
     *              @OA\Property(property="user_id", type="number", example="1"),
     *              @OA\Property(property="type_id", type="number", example="1"),
     *              @OA\Property(property="anonymous", type="boolean", example="true"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="region", type="string", example="region"),
     *              @OA\Property(property="province", type="string", example="province"),
     *              @OA\Property(property="municipality", type="string", example="municipality"),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="priority", type="string", example="media"),
     *              @OA\Property(property="reason", type="string", example="reason"),
     *              @OA\Property(property="file", type="file", example=""),
    *         ),
    *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="identification", type="string", example="00000000000"),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="phone", type="string", example="phone"),     
     *              @OA\Property(property="user_id", type="number", example="1"),
     *              @OA\Property(property="type_id", type="boolean", example="[]"),
     *              @OA\Property(property="department_id", type="string", example=""),
     *              @OA\Property(property="anonymous", type="boolean", example="true"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="region", type="string", example="region"),
     *              @OA\Property(property="province", type="string", example="province"),
     *              @OA\Property(property="municipality", type="string", example="municipality"),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="priority", type="string", example="media"),
     *              @OA\Property(property="reason", type="string", example="reason"),
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
        try {

            $complaints = new Complaints(request()->all());
            $complaints->department_id = Types::where('id',$request->type_id)->first()->department_id;
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
            return response()->json(["msg"=>"success","data"=>$complaints], 200);

        } catch (\Throwable $th) {
            return response()->json(["msg"=>"error","data"=>$th], 500);
        }
    }

    /**
     * @OA\Put (
     *     path="/api/complaints/{id}",
     *     operationId="complaints_update",
     *     tags={"Complaints"},
     *     security={{ "apiAuth": {} }},
     *     summary="Update complaint",
     *     description="Update complaint",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *               required={"description","departments", "type"},
     *              @OA\Property(property="identification", type="string", example="00000000000"),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="phone", type="string", example="phone"),     
     *              @OA\Property(property="user_id", type="number", example="1"),
     *              @OA\Property(property="type_id", type="number", example="1"),
     *              @OA\Property(property="anonymous", type="boolean", example="true"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="region", type="string", example="region"),
     *              @OA\Property(property="province", type="string", example="province"),
     *              @OA\Property(property="municipality", type="string", example="municipality"),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="priority", type="string", example="media"),
     *              @OA\Property(property="reason", type="string", example="reason"),
     *              @OA\Property(property="status", type="string", example="proceso"),
     *              @OA\Property(property="file", type="file", example=""),
    *         ),
    *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="code", type="string", example=""),
     *              @OA\Property(property="identification", type="string", example=""),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="phone", type="string", example="phone"),
     *              @OA\Property(property="user_id", type="number", example=""),
     *              @OA\Property(property="type", type="string", example=""),
     *              @OA\Property(property="departments", type="string", example=""),
     *              @OA\Property(property="anonymous", type="boolean", example=""),
     *              @OA\Property(property="description", type="string", example=""),
     *              @OA\Property(property="region", type="string", example=""),
     *              @OA\Property(property="province", type="string", example=""),
     *              @OA\Property(property="municipality", type="string", example=""),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="priority", type="string", example="media"),
     *              @OA\Property(property="status", type="string", example="proceso"),
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
            return response()->json(["msg"=>"success","data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["msg"=>"error","data"=>$e],500);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/complaints/{id}",
     *      operationId="complaint_delete",
     *      tags={"Complaints"},
     *     security={{ "apiAuth": {} }},
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
