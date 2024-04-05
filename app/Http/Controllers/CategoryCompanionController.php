<?php

namespace App\Http\Controllers;

use App\Models\CategoryCompanion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryCompanionController extends Controller
{
    //
    public function index()
    {
        $allcompanions = CategoryCompanion::join('users', 'category_companions.user_id', '=', 'users.id')
            ->select('category_companions.*', 'users.name as user_name')
            ->get();

        return view("Admin.companion.CateogryCompanion", compact("allcompanions"));
    }
    public function addCateogry()
    {
        return view("Admin.companion.addCateogryCompanion");
    }
    public function store(Request $request)
    {

        //validation
        $data = $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
        ]);
        $data['user_id'] = Auth::user()->id;
        //store
        CategoryCompanion::create($data);
        //toster
        toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddCateogrycompanion'));
    }
    public function edit($id)
    {
        try {
            $CategoryCompanion = CategoryCompanion::findOrFail($id);
            return view("Admin.companion.editCompanion", compact("CategoryCompanion"));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Cateogrycompanion"));
        }
    }
    public function update(Request $request, $id)
    {

            //validation
            $data = $request->validate([
                "name_ar" => "required|string|max:255",
                "name_en" => "required|string|max:255",
            ]);
            $data['user_id'] = Auth::user()->id;
            //findOrFail
            $categoryHadith = CategoryCompanion::findOrFail($id);

            //update
            $categoryHadith->update($data);
            //toster
            toastr()->success('Data updated successfuly');

            //redirce
            return redirect(url('Cateogrycompanion'));

    }
    public function delete($id)  {
        try {
            $categoryHadith= CategoryCompanion::findOrFail($id);
            $categoryHadith->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('Cateogrycompanion'));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Cateogrycompanion"));
        }



    }
}
