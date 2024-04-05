<?php

namespace App\Http\Controllers;

use App\Http\Resources\FatwaResource;
use App\Models\Fatwa;
use Illuminate\Http\Request;

class ApiFatwaController extends Controller
{
    //
    public function all()  {
        $fatwa =Fatwa::all();
       return FatwaResource::collection($fatwa);
    }
}
