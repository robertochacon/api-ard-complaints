<?php

namespace App\Http\Controllers;

use App\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintsController extends Controller
{
    public function index()
    {
        $complaints = Complaints::all();
        return response()->json(["data"=>$complaints],200);
    }

    public function all_by_identification($identification)
    {
        $complaints = Complaints::where("identification", $identification)->get();
        return response()->json(["data"=>$complaints],200);
    }

    public function all_by_user($user_id)
    {
        $complaints = Complaints::where("user_id", $user_id)->get();
        return response()->json(["data"=>$complaints],200);
    }

    public function watch($code){
        try{
            $document = Complaints::where('code','=',$code)->get();
            return response()->json(["data"=>$document],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

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

    public function update(Request $request, $id){
        try{
            $document = Complaints::find($id);
            $document->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Complaints::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
