<?php

namespace App\Http\Controllers;

use App\Models\CategoryIntonation;
use App\Models\DetailsIntonation;
use Illuminate\Http\Request;

class DetailsIntonationController extends Controller
{
    //
    public function index()  {


        $allDetailsIntonation=DetailsIntonation::join('category_intonations', 'details_intonations.category_intonations_id', '='
        , 'category_intonations.id')
        ->select('details_intonations.*', 'category_intonations.name_en')
        ->get();


        // dd($allDetailsAzkar);
        return view("Admin.Intonation.Details.DetailsIntonation",compact("allDetailsIntonation"));

    }
    public function create()  {
        $categories=CategoryIntonation::all();
        // dd($categories);
        return view("Admin.Intonation.Details.addDetailsIntonation",compact("categories"));
    }
    public function store(Request $request)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_intonations_id"=>"required |numeric ",
        ]);
        //create
        DetailsIntonation::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailsIntonation"));
    }
    public function edit($id) {
        try {
            $detailsIntonation=DetailsIntonation::findOrFail($id);
            $categories=CategoryIntonation::all();
            return view("Admin.Intonation.Details.editDetailsIntonation",compact("detailsIntonation","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Doaa not found');

            return redirect(url("DetailsIntonation"));
        }

    }
    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_intonations_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsIntonation = DetailsIntonation::findOrFail($id);

        //update
        $detailsIntonation->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsIntonation"));



    }
    public function delete($id) {
        //findOrFail
        $detailsIntonation = DetailsIntonation::findOrFail($id);

        //delete
        $detailsIntonation->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('DetailsIntonation'));

    }
}
