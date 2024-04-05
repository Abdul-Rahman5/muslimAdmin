<?php

namespace App\Http\Controllers;

use App\Models\CategoryDoaa;
use App\Models\DetailsDoaa;
use Illuminate\Http\Request;

class DetailsDoaaController extends Controller
{
    public function index()  {


        $allDetailsDoaa=DetailsDoaa::join('category_doaas', 'details_doaas.category_doaas_id', '='
        , 'category_doaas.id')
        ->select('details_doaas.*', 'category_doaas.name_en')
        ->get();


        // dd($allDetailsAzkar);
        return view("Admin.Doaa.Details.DetailsDoaa",compact("allDetailsDoaa"));

    }
    public function create()  {
        $categories=CategoryDoaa::all();
        // dd($categories);
        return view("Admin.Doaa.Details.addDetailsDoaa",compact("categories"));

    }
    public function store(Request $request)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_doaas_id"=>"required |numeric ",
        ]);
        //create
        DetailsDoaa::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailsDoaa"));
    }
    public function edit($id) {
        try {
            $detailsDoaa=DetailsDoaa::findOrFail($id);
            $categories=CategoryDoaa::all();
            return view("Admin.Doaa.Details.editDetailsDoaa",compact("detailsDoaa","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Doaa not found');

            return redirect(url("DetailsDoaa"));
        }

    }
    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "reward_ar"=>"required |string ",
            "reward_en"=>"required |string ",
            "repeat"=>"required |numeric ",
            "category_doaas_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsAzkar = DetailsDoaa::findOrFail($id);

        //update
        $detailsAzkar->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsDoaa"));



    }
    public function delete($id) {
        //findOrFail
        $detailsAzkar = DetailsDoaa::findOrFail($id);

        //delete
        $detailsAzkar->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('DetailsDoaa'));

    }
}
