<?php

namespace App\Http\Controllers;

use App\Models\CategoryDoaa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryDoaaController extends Controller
{
    public function index(){
        try {
            $allDoaa = CategoryDoaa::join('users', 'category_doaas.user_id', '=', 'users.id')
        ->select('category_doaas.*', 'users.name as user_name')
        ->get();
        // dd($allAzkar);
        // $user=User::where("id",$allAzkar->user_id)->get();
        return view("Admin.Doaa.CateogryDoaa",compact("allDoaa"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryDoaa"));
        }

    }


    public function addCateogry()
    {
        try {
            return view("Admin.Doaa.addCateogryDoaa");
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryDoaa"));
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
        CategoryDoaa::create($data);
            //toster
            toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddCateogryDoaa'));

    }
    public function edit($id) {
        try {
            $categoryDoaa = CategoryDoaa::findOrFail($id);
            return view("Admin.Doaa.editDoaa", compact("categoryDoaa"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryDoaa"));
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
        $categoryDoaa = CategoryDoaa::findOrFail($id);

        //update
        $categoryDoaa->update($data);
            //toster
            toastr()->success('Data updated successfuly');

        //redirce
        return redirect(url('CateogryDoaa'));

    }
    public function delete($id)  {
        try {
            $categoryDoaa= CategoryDoaa::findOrFail($id);
            $categoryDoaa->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('CateogryDoaa'));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryDoaa"));
        }



    }
}
