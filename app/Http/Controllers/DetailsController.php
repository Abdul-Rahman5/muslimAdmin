<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    //
   public function register()  {
    if (Auth::user()->role == '1') {
        return view("auth.register");
    }else{
        return redirect(url("login"));
    }

    }

}
