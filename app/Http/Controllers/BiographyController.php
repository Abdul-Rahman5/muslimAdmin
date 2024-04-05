<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiographyController extends Controller
{
    //
    public function index()  {


        $Biography=Biography::join('users', 'biographies.user_id', '=', 'users.id')
        ->select('biographies.*', 'users.name as user_name')
        ->get();

        return view("Admin.Biography.Biography",compact("Biography"));

    }
    public function create()  {
        return view("Admin.Biography.addBiographyy");
    }
    public function store(Request $request)
    {

        //validation
        $data = $request->validate([
            "biographie_ar"=>"required |string ",
            "biographie_en"=>"required |string ",
        ]);
        $data['user_id'] = Auth::user()->id;
        //store
        Biography::create($data);
        //toster
        toastr()->success('Data has been saved successfully!');

        //redirce
        return redirect(url('AddBiography'));
    }
    public function edit($id)
    {
        try {
            $Biography = Biography::findOrFail($id);
            return view("Admin.Biography.editBiography", compact("Biography"));
        } catch (\Throwable $e) {
            toastr()->error('Biography not found');

            return redirect(url("Biography"));
        }
    }
    public function update(Request $request, $id)
    {

            //validation
            $data = $request->validate([
                "biographie_ar"=>"required |string ",
                "biographie_en"=>"required |string ",
            ]);
            $data['user_id'] = Auth::user()->id;
            //findOrFail
            $Biography = Biography::findOrFail($id);

            //update
            $Biography->update($data);
            //toster
            toastr()->success('Data updated successfuly');

            //redirce
            return redirect(url('Biography'));

    }
    public function delete($id)  {
        try {
            $Biography= Biography::findOrFail($id);
            $Biography->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('Biography'));
        } catch (\Throwable $e) {
            toastr()->error('Biography not found');

            return redirect(url("Biography"));
        }



    }
    public function ApicategoriesBiography()  {
        $CategoryIntonation=  Biography::all();
        return $CategoryIntonation ;
      }



}
