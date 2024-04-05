<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesAzkarResource;
use App\Models\CateogryAzkar;
use App\Models\DetailsAzkar;
use Illuminate\Http\Request;

class ApiCategoryAzkarController extends Controller
{
    //
    public function getCategoryAzkar()  {
      $CategoryAzkar=  CateogryAzkar::all();
      return CategoriesAzkarResource::collection($CategoryAzkar);


    }
    public function showAzkar($id) {
        $detailsAzkars = DetailsAzkar::where("cateogry_azkars_id", $id)->get();
        if ($detailsAzkars->isEmpty()) {
            return response()->json([
                "msg" => "Category not found"
            ], 404);
        }
        return $detailsAzkars;
    }
}
