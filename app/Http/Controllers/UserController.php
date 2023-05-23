<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('entity')->get();
        return response()->json(["data"=>$users],200);
    }

    public function register()
    {
        $user = new User(request()->all());
        $user->password = bcrypt("12345");
        $user->save();
        return response()->json(["data"=>$user],200);
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function update(Request $request, $id){
        try{
            $user = User::find($id);
            $user->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $user = User::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }
}
