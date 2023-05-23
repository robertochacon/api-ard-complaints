<?php

namespace App\Http\Controllers;

use App\Departaments;
use Illuminate\Http\Request;

class DepartamentsController extends Controller
{
    public function index()
    {
        $departaments = Departaments::all();
        return response()->json(["data"=>$departaments],200);
    }

    public function watch($id){
        try{
            $entity = Departaments::find($id);
            return response()->json(["data"=>entity],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        $departaments = new Departaments(request()->all());
        $departaments->save();
        return response()->json(["data"=>$departaments],200);
    }

    public function update(Request $request, $id){
        try{
            $orders = Departaments::find($id);
            $orders->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Departaments::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
