<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesDoaaResource;
use App\Models\CategoryDoaa;
use App\Models\DetailsDoaa;
use Illuminate\Http\Request;

class ApiCategoryDoaaController extends Controller
{
    //
    public function categoriesDoaa()  {
        $CategoryDoaa=  CategoryDoaa::all();
        return CategoriesDoaaResource::collection($CategoryDoaa);


      }
      public function showDoaa($id) {
          $detailsDoaa = DetailsDoaa::where("category_doaas_id", $id)->get();
          if ($detailsDoaa->isEmpty()) {
              return response()->json([
                  "msg" => "Category not found"
              ], 404);
          }
          return $detailsDoaa;
      }
}
