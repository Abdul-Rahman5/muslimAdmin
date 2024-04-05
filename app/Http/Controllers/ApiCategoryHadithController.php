<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesHadithResource;
use App\Models\Hadith;
use App\Models\HadithDetails;
use Illuminate\Http\Request;

class ApiCategoryHadithController extends Controller
{
    //
     //
     public function categoriesHadith()  {
        $CategoryHadith=  Hadith::all();
        return CategoriesHadithResource::collection($CategoryHadith);


      }
      public function showHadith($id) {
          $detailsHadith = HadithDetails::where("hadiths_id", $id)->get();
          if ($detailsHadith->isEmpty()) {
              return response()->json([
                  "msg" => "Category not found"
              ], 404);
          }
          return $detailsHadith;
      }
}
