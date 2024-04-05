<?php

namespace App\Http\Controllers;

use App\Models\Fatwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FatwaController extends Controller
{
    public function index()
    {
        try {
            $allfatwa = Fatwa::join('users', 'fatwas.user_id', '=', 'users.id')
        ->select('fatwas.*', 'users.name as user_name')
        ->get();
        return view("Admin.Fatwa.Fatwa",compact("allfatwa"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("AddFatwa"));
        }
    }

    public function create()
    {
        try {
            return view("Admin.Fatwa.addFartwa");
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("Fatwa"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //validation
      $data=$request->validate([
        "question_ar"=>"required|string ",
        "question_en"=>"required|string ",
        "response_ar"=>"required|string ",
        "response_en"=>"required|string ",
    ]);
    $data['user_id']= Auth::user()->id;
    //store
    Fatwa::create($data);
        //toster
        toastr()->success('Data has been saved successfully!');

    //redirce
    return redirect(url('AddFatwa'));
    }

    public function edit( $id)
    {
        try {
            $Fatwa = Fatwa::findOrFail($id);
            return view("Admin.Fatwa.editFatwa", compact("Fatwa"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("AddFatwa"));
        }
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, $id)
    {

        $data=$request->validate([
            "question_ar"=>"required|string ",
            "question_en"=>"required|string ",
            "response_ar"=>"required|string ",
            "response_en"=>"required|string ",
       ]);
       $data['user_id']= Auth::user()->id;
       //findOrFail
       $fatwa = Fatwa::findOrFail($id);

       //update
       $fatwa->update($data);
           //toster
           toastr()->success('Data updated successfuly');

       //redirce
       return redirect(url('Fatwa'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($id)
    {
        try {
            $Fatwa= Fatwa::findOrFail($id);
            $Fatwa->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('Fatwa'));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("Fatwa"));
        }
    }
}
