<?php

namespace App\Http\Controllers;

use App\Models\clint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClintController extends Controller
{

    public function index()  {
        $clint=clint::all();

        return view("Admin.Clint.support",compact("clint"));

    }
    //
    public function store(Request $request)  {

       $validator= Validator::make($request->all(),[
            "name"=>"required|string|max:100|min:2",
            "email"=>"required|email",
            "message"=>"required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "msg"=>$validator->errors()
            ],404);
        }
        clint::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "message"=>$request->message,
        ]);
        return response()->json([
            "msg"=>"The message was sent successfully"
        ],200);
    }


    public function delete($id) {
        try {
             //findOrFail
        $clint = clint::findOrFail($id);

        //delete
        $clint->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('clint'));
        } catch (\Throwable $e) {
            toastr()->error('clint not found');

            return redirect(url("clint"));
        }



    }
}
