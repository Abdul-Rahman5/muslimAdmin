<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesIslamicHistoryResource;
use App\Models\CategoryIslamicHistory;
use App\Models\DetailsIslamicHistory;
use Illuminate\Http\Request;

class ApiCategoryIslamicHistoryController extends Controller
{
    //

    public function categoriesislamicHistories()  {
        $CategoryIslamicHistory=  CategoryIslamicHistory::all();
        return CategoriesIslamicHistoryResource::collection($CategoryIslamicHistory);
      }
      public function showislamicHistories($id) {
          $detailsislamicHistories = DetailsIslamicHistory::where("category_islamic_histories_id", $id)->get();
          if ($detailsislamicHistories->isEmpty()) {
              return response()->json([
                  "msg" => "Category not found"
              ], 404);
          }
                  // Extract category name from the first item (assuming all items have the same category)
    $categoryName = CategoryIslamicHistory::where("id", $id)->get();



    // Format the response
    $response = [
       'detailsislamicHistories' => $detailsislamicHistories,
       'category_name' => $categoryName
   ];

   return response()->json($response);

      }
}
