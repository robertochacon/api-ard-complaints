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
            $data['enviadas']['name'] = 'enviadas';
            $data['enviadas']['quantity'] = COUNT(DB::select("SELECT id FROM complaints WHERE status = 'Enviada'"));
            $data['recibidas']['name'] = 'recibidas';
            $data['recibidas']['quantity'] = COUNT(DB::select("SELECT id FROM complaints WHERE status = 'Recibida'"));
            $data['procesando']['name'] = 'procesando';
            $data['procesando']['quantity'] = COUNT(DB::select("SELECT id FROM complaints WHERE status = 'Procesando'"));
            $data['finalizada']['name'] = 'finalizada';
            $data['finalizada']['quantity'] = COUNT(DB::select("SELECT id FROM complaints WHERE status = 'Finalizada'"));
            $data['rechazada']['name'] = 'rechazada';
            $data['rechazada']['quantity'] = COUNT(DB::select("SELECT id FROM complaints WHERE status = 'Rechazada'"));

            return response()->json(["data"=>$data],200);
        }catch (Exception $e) {
            return response()->json(["data"=>[]],200);
        }

    }


}
