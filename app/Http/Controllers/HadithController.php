<?php

namespace App\Http\Controllers;

use App\Models\Hadith;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HadithController extends Controller
{
    //
    public function index()
    {
        $allHadith = Hadith::join('users', 'hadiths.user_id', '=', 'users.id')
            ->select('hadiths.*', 'users.name as user_name')
            ->get();

        return view("Admin.Hadith.CateogryHadith", compact("allHadith"));
    }
    public function addCateogry()
    {
        return view("Admin.Hadith.addCateogryHadith");
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
        Hadith::create($data);
        //toster
        toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddCateogryhadiths'));
    }
    public function edit($id)
    {
        try {
            $categoryHadith = Hadith::findOrFail($id);
            return view("Admin.Hadith.editHadith", compact("categoryHadith"));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Cateogryhadiths"));
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
            $categoryHadith = Hadith::findOrFail($id);

            //update
            $categoryHadith->update($data);
            //toster
            toastr()->success('Data updated successfuly');

            //redirce
            return redirect(url('Cateogryhadiths'));
      
    }
    public function delete($id)  {
        try {
            $categoryHadith= Hadith::findOrFail($id);
            $categoryHadith->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('Cateogryhadiths'));
        } catch (\Throwable $e) {
            toastr()->error('Hadith not found');

            return redirect(url("Cateogryhadiths"));
        }



    }
}
