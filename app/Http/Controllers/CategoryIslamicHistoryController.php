<?php

namespace App\Http\Controllers;

use App\Models\CategoryIslamicHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryIslamicHistoryController extends Controller
{
    //
    public function index(){
        try {
            $allIslamicHistory = CategoryIslamicHistory::join('users', 'category_islamic_histories.user_id', '=', 'users.id')
        ->select('category_islamic_histories.*', 'users.name as user_name')
        ->get();
        return view("Admin.IslamicHistory.CateogryIslamicHistory",compact("allIslamicHistory"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryIslamicHistory"));
        }

    }

    public function addCateogry()
    {
        try {
            return view("Admin.IslamicHistory.addCateogryIslamicHistory");
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryIslamicHistory"));
        }


    }
    public function store(Request $request)
    {
         //validation
         $data=$request->validate([
            "name_ar"=>"required|string|max:255",
            "name_en"=>"required|string|max:255",
        ]);
        $data['user_id']= Auth::user()->id;
        //store
        CategoryIslamicHistory::create($data);
            //toster
            toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddCateogryIslamicHistory'));

    }
    public function edit($id) {
        try {
            $categoryIslamicHistory = CategoryIslamicHistory::findOrFail($id);
            return view("Admin.IslamicHistory.editIslamicHistory", compact("categoryIslamicHistory"));
        } catch (\Throwable $e) {
            toastr()->error('Islamic History not found');

            return redirect(url("CateogryIslamicHistory"));
        }

    }
    public function update(Request $request ,$id)
    {
         //validation
         $data=$request->validate([
            "name_ar"=>"required|string|max:255",
            "name_en"=>"required|string|max:255",
        ]);
        $data['user_id']= Auth::user()->id;
        //findOrFail
        $categoryIntonation = CategoryIslamicHistory::findOrFail($id);

        //update
        $categoryIntonation->update($data);
            //toster
            toastr()->success('Data updated successfuly');

        //redirce
        return redirect(url('CateogryIslamicHistory'));

    }
    public function delete($id)  {
        try {
            $categoryIntonation= CategoryIslamicHistory::findOrFail($id);
            $categoryIntonation->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('CateogryIslamicHistory'));
        } catch (\Throwable $e) {
            toastr()->error('Error');
            return redirect(url("CateogryIslamicHistory"));
        }



    }
}
