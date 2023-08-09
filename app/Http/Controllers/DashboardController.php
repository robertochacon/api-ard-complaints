<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

     /**
     * @OA\Get (
     *     path="/api/dashboard",
     *      operationId="dashboard",
     *     tags={"Dashboard"},
     *     security={{ "apiAuth": {} }},
     *     summary="All dashboard",
     *     description="All dashboard",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent()
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
        try{
            //totales
            $data['totales'][] = DB::select("SELECT COUNT(id) as enviadas FROM complaints WHERE status = 'Enviada'")[0];
            $data['totales'][] = DB::select("SELECT COUNT(id) as recibidas FROM complaints WHERE status = 'Recibida'")[0];
            $data['totales'][] = DB::select("SELECT COUNT(id) as procesando FROM complaints WHERE status = 'Procesando'")[0];
            $data['totales'][] = DB::select("SELECT COUNT(id) as finalizada FROM complaints WHERE status = 'Finalizada'")[0];
            $data['totales'][] = DB::select("SELECT COUNT(id) as rechazada FROM complaints WHERE status = 'Rechazada'")[0];

            return response()->json(["data"=>$data],200);
        }catch (Exception $e) {
            return response()->json(["data"=>[]],200);
        }

    }


}
