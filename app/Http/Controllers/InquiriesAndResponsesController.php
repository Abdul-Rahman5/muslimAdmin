<?php

namespace App\Http\Controllers;

use App\Models\inquiries_and_responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiriesAndResponsesController extends Controller
{
    public function index()
    {


        try {
            $InquiriesAndResponses = inquiries_and_responses::join('users', 'inquiries_and_responses.user_id', '=', 'users.id')
            ->select('inquiries_and_responses.*', 'users.name as user_name')
            ->get();
        return view("Admin.Askme.showInq" ,compact("InquiriesAndResponses"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("AddInquiriesAndResponses"));
        }
    }

    public function create()
    {
        try {
                $InquiriesAndResponses=inquiries_and_responses::all();
            return view("Admin.Askme.askme",compact("InquiriesAndResponses"));
            } catch (\Throwable $e) {
                toastr()->error('Error');

                return redirect(url("InquiriesAndResponses"));
            }

    }
    public function update(Request $request ,$id)
    {
         //validation
         $data=$request->validate([
            "response"=>"required|string",
        ]);
        $data['user_id']= Auth::user()->id;
        //findOrFail
        $inquiries_and_responses = inquiries_and_responses::findOrFail($id);

        //update
        $inquiries_and_responses->update($data);
            //toster
            toastr()->success('The inquiry was answered successfully');

        //redirce
        return redirect(url('InquiriesAndResponses'));

    }
    public function destroy($id)  {
        try {
            $inquiries_and_responses= inquiries_and_responses::findOrFail($id);
            $inquiries_and_responses->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('InquiriesAndResponses'));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("InquiriesAndResponses"));
        }



    }

    


}
