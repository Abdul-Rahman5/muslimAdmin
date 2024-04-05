<?php

namespace App\Http\Controllers;

use App\Models\CateogryAzkar;
use App\Models\DetailsAzkar;
use Illuminate\Http\Request;

class DetailsAzkarController extends Controller
{
    //
    public function index()  {
        $allDetailsAzkar=DetailsAzkar::join('cateogry_azkars', 'details_azkars.cateogry_azkars_id', '=', 'cateogry_azkars.id')
        ->select('details_azkars.*', 'cateogry_azkars.name_en')
        ->get();
        // dd($allDetailsAzkar);
        return view("Admin.Azkar.Details.DetailsAzkar",compact("allDetailsAzkar"));

    }
    public function create()  {
        $categories=CateogryAzkar::all();
        // dd($categories);
        return view("Admin.Azkar.Details.addDetailsAzkar",compact("categories"));

    }
    public function store(Request $request)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "reward_ar"=>"required |string ",
            "reward_en"=>"required |string ",
            "repeat"=>"required |numeric ",
            "cateogry_azkars_id"=>"required |numeric ",
        ]);
        //create
        DetailsAzkar::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailsAzkar"));
    }
    public function edit($id) {
        try {
            $detailsAzkar=DetailsAzkar::findOrFail($id);
        $categories=CateogryAzkar::all();
        return view("Admin.Azkar.Details.editDetailsAzkar",compact("detailsAzkar","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("DetailsAzkar"));
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
            "cateogry_azkars_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsAzkar = DetailsAzkar::findOrFail($id);

        //update
        $detailsAzkar->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsAzkar"));



    }
    public function delete($id) {
        //findOrFail
        $detailsAzkar = DetailsAzkar::findOrFail($id);

        //delete
        $detailsAzkar->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('DetailsAzkar'));

    }
}
