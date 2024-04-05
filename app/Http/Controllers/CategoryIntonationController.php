<?php

namespace App\Http\Controllers;

use App\Models\CategoryIntonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryIntonationController extends Controller
{
    //
    public function index(){
        try {
            $allIntonation = CategoryIntonation::join('users', 'category_intonations.user_id', '=', 'users.id')
        ->select('category_intonations.*', 'users.name as user_name')
        ->get();
        return view("Admin.Intonation.Cateogryintonation",compact("allIntonation"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryIntonation"));
        }

    }

    public function addCateogry()
    {
        try {
            return view("Admin.Intonation.addCateogryintonation");
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryIntonation"));
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
        CategoryIntonation::create($data);
            //toster
            toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddCateogryIntonation'));

    }
    public function edit($id) {
        try {
            $categoryIntonation = CategoryIntonation::findOrFail($id);
            return view("Admin.Intonation.editintonation", compact("categoryIntonation"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryIntonation"));
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
        $categoryIntonation = CategoryIntonation::findOrFail($id);

        //update
        $categoryIntonation->update($data);
            //toster
            toastr()->success('Data updated successfuly');

        //redirce
        return redirect(url('CateogryIntonation'));

    }
    public function delete($id)  {
        try {
            $categoryIntonation= CategoryIntonation::findOrFail($id);
            $categoryIntonation->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('CateogryIntonation'));
        } catch (\Throwable $e) {
            toastr()->error('Error');
            return redirect(url("CateogryIntonation"));
        }



    }
}
