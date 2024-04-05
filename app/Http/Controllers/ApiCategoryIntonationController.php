<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesIntonationResource;
use App\Models\CategoryIntonation;
use App\Models\DetailsIntonation;
use Illuminate\Http\Request;

class ApiCategoryIntonationController extends Controller
{
    //
    public function categoriesIntonation()  {
        $CategoryIntonation=  CategoryIntonation::all();
        return CategoriesIntonationResource::collection($CategoryIntonation);
      }
      public function showIntonation($id) {
          $detailsIntonation = DetailsIntonation::where("category_intonations_id", $id)->get();
          if ($detailsIntonation->isEmpty()) {
              return response()->json([
                  "msg" => "Category not found"
              ], 404);
          }
           // Extract category name from the first item (assuming all items have the same category)
    $categoryName = CategoryIntonation::where("id", $id)->get();



     // Format the response
     $response = [
        'details_intonation' => $detailsIntonation,
        'category_name' => $categoryName
    ];

    return response()->json($response);
      }
}
