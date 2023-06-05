<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;

class RecordsController extends Controller
{

    /**
     * @OA\Get (
     *     path="/api/records",
     *      operationId="all_records",
     *     tags={"Records"},
     *     security={{ "apiAuth": {} }},
     *     summary="All records",
     *     description="All records",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="complaint", type="string", example="[]"),
     *              @OA\Property(property="user", type="string", example="[]"),
     *              @OA\Property(property="status", type="string", example="status"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND"
     *      )
     * )
     */
    public function index()
    {
        $record = Records::with('complaint')->get();
        return response()->json(["data"=>$record],200);
    }


     /**
     * @OA\Get (
     *     path="/api/records/{complaint_id}",
     *     operationId="watch_record",
     *     tags={"Records"},
     *     security={{ "apiAuth": {} }},
     *     summary="See record",
     *     description="See record",
     *    @OA\Parameter(
     *         in="path",
     *         name="complaint_id",
     *         required=true,
     *         @OA\Schema(type="string")
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

    public function watch($complaint_id){
        try{
            $record = Records::where("complaint_id", $complaint_id)->with('complaint')->get();
            return response()->json(["data"=>$record],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/records",
     *      operationId="store_record",
     *      tags={"Records"},
     *     security={{ "apiAuth": {} }},
     *      summary="Store record",
     *      description="Store record",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"nacompaint_idme","user_id","status"},
     *            @OA\Property(property="compaint_id", type="string", format="string", example="compaint_id"),
     *            @OA\Property(property="user_id", type="string", format="string", example="user_id"),
     *            @OA\Property(property="status", type="string", format="string", example="status"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */

    public function register(Request $request)
    {
        $record = new Records(request()->all());
        $record->save();
        return response()->json(["data"=>$record],200);
    }

    /**
     * @OA\Delete(
     *      path="/api/records/{id}",
     *      operationId="delete_record",
     *      tags={"Records"},
     *     security={{ "apiAuth": {} }},
     *      summary="Delete record",
     *      description="Delete record",
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
            $record = Records::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
