<?php

namespace App\Http\Controllers;

use App\Models\CategoryIslamicHistory;
use App\Models\DetailsIslamicHistory;
use Illuminate\Http\Request;

class DetailsIslamicHistoryController extends Controller
{
    //
    public function index()  {


        $allDetailsIslamicHistory=DetailsIslamicHistory::join('category_islamic_histories', 'details_islamic_histories.category_islamic_histories_id', '='
        , 'category_islamic_histories.id')
        ->select('details_islamic_histories.*', 'category_islamic_histories.name_en')
        ->get();


        // dd($allDetailsAzkar);
        return view("Admin.IslamicHistory.Details.DetailsIslamicHistory",compact("allDetailsIslamicHistory"));

    }
    public function create()  {
        $categories=CategoryIslamicHistory::all();
        // dd($categories);
        return view("Admin.IslamicHistory.Details.addDetailsIslamicHistory",compact("categories"));
    }
    public function store(Request $request)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_islamic_histories_id"=>"required |numeric ",
        ]);
        //create
        DetailsIslamicHistory::create($data);
        //message
        toastr()->success('Data has been saved successfully!');
        //redirct
        return redirect(url("AddDetailsIslamicHistory"));
    }
    public function edit($id) {
        try {
            $detailsIslamicHistory=DetailsIslamicHistory::findOrFail($id);
            $categories=CategoryIslamicHistory::all();
            return view("Admin.IslamicHistory.Details.editDetailsIslamicHistory",compact("detailsIslamicHistory","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Islamic History not found');

            return redirect(url("DetailsIslamicHistory"));
        }

    }
    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_islamic_histories_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsIslamicHistory = DetailsIslamicHistory::findOrFail($id);

        //update
        $detailsIslamicHistory->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsIslamicHistory"));



    }
    public function delete($id) {
        try {
           //findOrFail
        $IslamicHistory = DetailsIslamicHistory::findOrFail($id);

        //delete
        $IslamicHistory->delete();
        //message
        toastr()->success('Data deleted successfuly');

        //return
        return redirect(url('DetailsIslamicHistory'));
        } catch (\Throwable $e) {
            toastr()->error('Islamic History not found');

            return redirect(url("DetailsIslamicHistory"));
        }


    }
}
