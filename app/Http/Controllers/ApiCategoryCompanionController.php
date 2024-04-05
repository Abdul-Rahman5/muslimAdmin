<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesCompanionResource;
use App\Models\CategoryCompanion;
use App\Models\DetailsCompanion;
use Illuminate\Http\Request;

class ApiCategoryCompanionController extends Controller
{
   //

   public function categoriescompanion()  {
    $CategoryCompanion=  CategoryCompanion::all();
    return CategoriesCompanionResource::collection($CategoryCompanion);
  }
  public function showcompanion($id) {
      $detailsCompanion = DetailsCompanion::where("category_companions_id", $id)->get();
      if ($detailsCompanion->isEmpty()) {
          return response()->json([
              "msg" => "Category not found"
          ], 404);
      }
            // Extract category name from the first item (assuming all items have the same category)
    $categoryName = CategoryCompanion::where("id", $id)->get();



    // Format the response
    $response = [
       'details_companion' => $detailsCompanion,
       'category_name' => $categoryName
   ];

   return response()->json($response);

  }
}
