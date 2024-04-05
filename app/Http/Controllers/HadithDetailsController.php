<?php

namespace App\Http\Controllers;

use App\Models\Hadith;
use App\Models\HadithDetails;
use Illuminate\Http\Request;

class HadithDetailsController extends Controller
{
    //
    public function index()  {

        $allHadithDetails=HadithDetails::join('hadiths', 'hadith_details.hadiths_id', '='
        , 'hadiths.id')
        ->select('hadith_details.*', 'hadiths.name_en')
        ->get();
        return view("Admin.Hadith.Details.DetailsHadith",compact("allHadithDetails"));



    }
    public function create()  {
        try {
            $Hadith=Hadith::all();
            // dd($Hadith);
            return view("Admin.Hadith.Details.addDetailsHadith",compact("Hadith"));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Detailshadiths"));
        }

    }
    public function store(Request $request)  {
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "desc_ar"=>"required |string ",
            "desc_en"=>"required |string ",
            "hadiths_id"=>"required |numeric ",
        ]);
        //create
        HadithDetails::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailshadiths"));


    }
    public function edit($id) {
        try {
            $detailsHadith=HadithDetails::findOrFail($id);
            $categories=Hadith::all();
            return view("Admin.Hadith.Details.editDetailsHadith",compact("detailsHadith","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Detailshadiths"));
        }

    }
    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "desc_ar"=>"required |string ",
            "desc_en"=>"required |string ",
            "hadiths_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsAzkar = HadithDetails::findOrFail($id);

        //update
        $detailsAzkar->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("Detailshadiths"));



    }
    public function delete($id) {
        try {
             //findOrFail
        $detailsAzkar = HadithDetails::findOrFail($id);

        //delete
        $detailsAzkar->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('Detailshadiths'));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Detailshadiths"));
        }



    }


}
