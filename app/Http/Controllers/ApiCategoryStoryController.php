<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesStoryResource;
use App\Models\Category_story;
use App\Models\DetailsStory;
use Illuminate\Http\Request;

class ApiCategoryStoryController extends Controller
{
    public function categoriesStory()  {
        $Categorystory=  Category_story::all();
        return CategoriesStoryResource::collection($Categorystory);
      }
      public function showStory($id) {
          $detailsStory = DetailsStory::where("category_stories_id", $id)->get();
          if ($detailsStory->isEmpty()) {
              return response()->json([
                  "msg" => "stories not found"
              ], 404);
          }
                  // Extract category name from the first item (assuming all items have the same category)
    $categoryName = Category_story::where("id", $id)->get();
    if ($categoryName->isEmpty()) {
        return response()->json([
            "msg" => "category not found"
        ], 404);
    }


    // Format the response
    $response = [
       'detailsStory' => $detailsStory,
       'category_name' => $categoryName
   ];

   return response()->json($response);

      }
}
