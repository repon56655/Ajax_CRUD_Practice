<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudModel;

class CrudController extends Controller
{
    public function index(){
        return view('crud.index');
    }
    public function add_view(){
        
        return view('crud.add_user');
    }
    public function add_user(Request $request){
        
        $user = new CrudModel;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        
        if($user){
            return response()->json([
                "msg" => 'success'
            ]);
       }
       else{
        return response()->json([
            "msg" => '104'
        ]);
       }
       return redirect()->back();

    }

    public function store_user()
    {
       $allData = CrudModel::all();
       if($allData){
        return response()->json([
            "status" => 'success',
            "alldata" => $allData
        ]);
       }
       else{
        return response()->json([
            "status" => '404',
        ]);
       }
    }
}
