<?php

namespace App\Http\Controllers;

use App\Models\CategoryCompanion;
use App\Models\DetailsCompanion;
use Illuminate\Http\Request;

class DetailsCompanionController extends Controller
{
    //
    public function index()  {

        $allCompanionDetails=DetailsCompanion::join('category_companions', 'details_companions.category_companions_id', '='
        , 'category_companions.id')
        ->select('details_companions.*', 'category_companions.name_en')
        ->get();
        return view("Admin.companion.Details.DetailsCompanion",compact("allCompanionDetails"));



    }
    public function create()  {
        try {
            $Companions=CategoryCompanion::all();
            // dd($Hadith);
            return view("Admin.companion.Details.addDetailsCompanion",compact("Companions"));
        } catch (\Throwable $e) {
            toastr()->error('Companion not found');

            return redirect(url("DetailsCompanion"));
        }

    }
    public function store(Request $request)  {
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "desc_ar"=>"required |string ",
            "desc_en"=>"required |string ",
            "category_companions_id"=>"required |numeric ",
        ]);
        //create
        DetailsCompanion::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailsCompanion"));


    }
    public function edit($id) {
        try {
            $detailsCompanion=DetailsCompanion::findOrFail($id);
            $categories=CategoryCompanion::all();
            return view("Admin.companion.Details.editDetailsCompanion",compact("detailsCompanion","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Companion not found');

            return redirect(url("DetailsCompanion"));
        }

    }
    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "desc_ar"=>"required |string ",
            "desc_en"=>"required |string ",
            "category_companions_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsCompanion = DetailsCompanion::findOrFail($id);

        //update
        $detailsCompanion->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsCompanion"));



    }
    public function delete($id) {
        try {
             //findOrFail
        $detailsCompanion = DetailsCompanion::findOrFail($id);

        //delete
        $detailsCompanion->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('DetailsCompanion'));
        } catch (\Throwable $e) {
            toastr()->error('Companion not found');

            return redirect(url("DetailsCompanion"));
        }



    }

}
