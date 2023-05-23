<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        $types = Types::all();
        return response()->json(["data"=>$types],200);
    }

    public function watch($id){
        try{
            $types = Types::find($id);
            return response()->json(["data"=>$types],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        $types = new Types(request()->all());
        $types->save();
        return response()->json(["data"=>$types],200);
    }

    public function update(Request $request, $id){
        try{
            $orders = Types::find($id);
            $orders->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Types::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
