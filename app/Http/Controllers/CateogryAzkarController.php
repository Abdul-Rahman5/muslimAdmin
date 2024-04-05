<?php

namespace App\Http\Controllers;

use App\Models\Cateogry;
use App\Models\CateogryAzkar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CateogryAzkarController extends Controller
{
    //
    public function index()
    {
        $allAzkar = CateogryAzkar::join('users', 'cateogry_azkars.user_id', '=', 'users.id')
        ->select('cateogry_azkars.*', 'users.name as user_name')
        ->get();
        // dd($allAzkar);
        // $user=User::where("id",$allAzkar->user_id)->get();
        return view("Admin.Azkar.CateogryAzkar",compact("allAzkar"));

    }
    public function addCateogry()
    {
        return view("Admin.Azkar.addCateogry");
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
        CateogryAzkar::create($data);
            //toster
            toastr()->success('Data has been saved successfully!');

        //redirce
        // return redirect(url('AddCateogryAzkar'))->with("success","data inserted successfuly");
        return redirect(url('AddCateogryAzkar'));
    }
    public function edit($id) {
        try {
            $categoryAzkar = CateogryAzkar::findOrFail($id);

            return view("Admin.Azkar.editAzkar", compact("categoryAzkar"));
        } catch (\Throwable $e) {
            toastr()->error('Azkar not found');

            return redirect(url("CateogryAzkar"));
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
        $categoryAzkar = CateogryAzkar::findOrFail($id);

        //update
        $categoryAzkar->update($data);
            //toster
            toastr()->success('Data updated successfuly');

        //redirce
        return redirect(url('CateogryAzkar'));
    }
    public function delete($id)  {
        $category=CateogryAzkar::findOrFail($id);
        $category->delete();
        toastr()->success('Data deleted successfuly');
        return redirect(url('CateogryAzkar'));


    }
}
