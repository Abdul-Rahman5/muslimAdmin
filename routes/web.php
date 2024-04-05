<?php

use App\Http\Controllers\AskMeController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\CategoryCompanionController;
use App\Http\Controllers\CategoryDoaaController;
use App\Http\Controllers\CategoryIntonationController;
use App\Http\Controllers\CategoryIslamicHistoryController;
use App\Http\Controllers\CategoryStoryController;
use App\Http\Controllers\CateogryAzkarController;
use App\Http\Controllers\ClintController;
use App\Http\Controllers\DetailsAzkarController;
use App\Http\Controllers\DetailsCompanionController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DetailsDoaaController;
use App\Http\Controllers\DetailsIntonationController;
use App\Http\Controllers\DetailsIslamicHistoryController;
use App\Http\Controllers\DetailsStoryController;
use App\Http\Controllers\FatwaController;
use App\Http\Controllers\HadithController;
use App\Http\Controllers\HadithDetailsController;
use App\Http\Controllers\InquiriesAndResponsesController;
use App\Http\Middleware\IsAdmin;
use App\Models\CategoryDoaa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('Admin.home');
    })->name('dashboard');
});

// Route::middleware(IsAdmin::class)->group(function () {
//     // register
//     Route::get('/register', function () {
//         return view('auth.register');
//     });
// });
//azkar

// Route::get('register',[DetailsController::class,"register"]);
//Cateogry azkar
Route::controller(CateogryAzkarController::class)->group(function () {
    //show
    Route::get("CateogryAzkar", "index")->name("CateogryAzkar");
    //add
    Route::get("AddCateogryAzkar", "addCateogry")->name("AddCateogryAzkar");
    //create
    Route::POST("storeCateogryAzkar", "store")->name("storeCateogryAzkar");
    //edit
    Route::get("editAzkar/{id}", "edit")->name("editAzkar");
    Route::put("update/{id}", "update")->name("update");
    //delete
    Route::delete("delete/{id}", "delete")->name("delete");
});
//Details azkar
Route::controller(DetailsAzkarController::class)->group(function () {
    //show
    Route::get("DetailsAzkar", "index")->name("DetailsAzkar");
    //add
    Route::get("AddDetailsAzkar", "create")->name("AddDetailsAzkar");
    //create
    Route::POST("storeDetailsAzkar", "store")->name("DetailsAzkar");
    // //edit
    Route::get("editDetailsAzkar/{id}", "edit")->name("editDetailsAzkar");
    Route::put("updateDetails/{id}", "update")->name("updateDetails");
    // //delete
    Route::delete("detailsAzkardelete/{id}", "delete")->name("detailsAzkardelete");
});
//Cateogry Doaa
Route::controller(CategoryDoaaController::class)->group(function () {
    //show
    Route::get("CateogryDoaa", "index")->name("CateogryDoaa");
    //add
    Route::get("AddCateogryDoaa", "addCateogry")->name("AddCateogryDoaa");
    //create
    Route::POST("storeCateogryDoaa", "store")->name("storeCateogryDoaa");
    //edit
    Route::get("editDoaa/{id}", "edit")->name("editDoaa");
    Route::put("updateDoaa/{id}", "update")->name("updateDoaa");
    //delete
    Route::delete("deleteDoaa/{id}", "delete")->name("deleteDoaa");
});
//Details Doaa
Route::controller(DetailsDoaaController::class)->group(function () {
    //show
    Route::get("DetailsDoaa", "index")->name("DetailsDoaa");
    //add
    Route::get("AddDetailsDoaa", "create")->name("AddDetailsDoaa");
    //create
    Route::POST("storeDetailsDoaa", "store")->name("storeDetailsDoaa");
    // //edit
    Route::get("editDetailsDoaa/{id}", "edit")->name("editDetailsDoaa");
    Route::put("updateDetailsDoaa/{id}", "update")->name("updateDetailsDoaa");
    // //delete
    Route::delete("detailsDoaadelete/{id}", "delete")->name("detailsDoaadelete");
});

// hadiths
Route::controller(HadithController::class)->group(function ()  {
//show
Route::get("Cateogryhadiths", "index")->name("Cateogryhadiths");
//add
Route::get("AddCateogryhadiths", "addCateogry")->name("AddCateogryhadiths");
// //create
Route::POST("storeCateogryhadiths", "store")->name("storeCateogryhadiths");
// //edit
Route::get("edithadiths/{id}", "edit")->name("edithadiths");
Route::put("updatehadiths/{id}", "update")->name("updatehadiths");
// //delete
Route::delete("deletehadiths/{id}", "delete")->name("deletehadiths");
});
// Details hadiths
Route::controller(HadithDetailsController::class)->group(function ()  {
  //show
  Route::get("Detailshadiths", "index")->name("Detailshadiths");
//   //add
  Route::get("AddDetailshadiths", "create")->name("AddDetailshadiths");
//   //create
  Route::POST("storeDetailshadiths", "store")->name("storeDetailshadiths");
//   // //edit
  Route::get("editDetailshadiths/{id}", "edit")->name("editDetailshadiths");
  Route::put("updateDetailshadiths/{id}", "update")->name("updateDetailshadiths");
//   // //delete
  Route::delete("detailshadithsdelete/{id}", "delete")->name("detailshadithsdelete");
});
// Intonation
Route::controller(CategoryIntonationController::class)->group(function ()  {

//show
Route::get("CateogryIntonation", "index")->name("CateogryIntonation");
// //add
Route::get("AddCateogryIntonation", "addCateogry")->name("AddCateogryIntonation");
// //create
Route::POST("storeCateogryIntonation", "store")->name("storeCateogryIntonation");
// //edit
Route::get("editIntonation/{id}", "edit")->name("editIntonation");
Route::put("updateIntonation/{id}", "update")->name("updateIntonation");
// //delete
Route::delete("deleteIntonation/{id}", "delete")->name("deleteIntonation");

});
Route::controller(DetailsIntonationController::class)->group(function ()  {
    //show
    Route::get("DetailsIntonation", "index")->name("DetailsIntonation");
  //   //add
    Route::get("AddDetailsIntonation", "create")->name("AddDetailsIntonation");
  //   //create
    Route::POST("storeDetailsIntonation", "store")->name("storeDetailsIntonation");
//   //   // //edit
    Route::get("editDetailsIntonation/{id}", "edit")->name("editDetailsIntonation");
    Route::put("updateDetailsIntonation/{id}", "update")->name("updateDetailsIntonation");
//   //   // //delete
    Route::delete("detailsIntonationdelete/{id}", "delete")->name("detailsIntonationdelete");
  });
//  IslamicHistory
Route::controller(CategoryIslamicHistoryController::class)->group(function ()  {

//show
Route::get("CateogryIslamicHistory", "index")->name("CateogryIslamicHistory");
// //add
Route::get("AddCateogryIslamicHistory", "addCateogry")->name("AddCateogryIslamicHistory");
// //create
Route::POST("storeCateogryIslamicHistory", "store")->name("storeCateogryIslamicHistory");
// // //edit
Route::get("editCateogryIslamicHistory/{id}", "edit")->name("editCateogryIslamicHistory");
Route::put("updateCateogryIslamicHistory/{id}", "update")->name("updateCateogryIslamicHistory");
// // //delete
Route::delete("deleteCateogryIslamicHistory/{id}", "delete")->name("deleteCateogryIslamicHistory");

});
Route::controller(DetailsIslamicHistoryController::class)->group(function ()  {
    //show
    Route::get("DetailsIslamicHistory", "index")->name("DetailsIslamicHistory");
  //   //add
    Route::get("AddDetailsIslamicHistory", "create")->name("AddDetailsIslamicHistory");
  //   //create
    Route::POST("storeDetailsIslamicHistory", "store")->name("storeDetailsIslamicHistory");
//   //   // //edit
    Route::get("editDetailsIslamicHistory/{id}", "edit")->name("editDetailsIslamicHistory");
    Route::put("updateDetailsIslamicHistory/{id}", "update")->name("updateDetailsIslamicHistory");
//   //   // //delete
    Route::delete("detailsIslamicHistorydelete/{id}", "delete")->name("detailsIslamicHistorydelete");
  });
//  Companion
Route::controller(CategoryCompanionController::class)->group(function ()  {

//show
Route::get("Cateogrycompanion", "index")->name("Cateogrycompanion");
// //add
Route::get("AddCateogrycompanion", "addCateogry")->name("AddCateogrycompanion");
// //create
Route::POST("storeCateogrycompanion", "store")->name("storeCateogrycompanion");
// // //edit
Route::get("editCateogrycompanion/{id}", "edit")->name("editCateogrycompanion");
Route::put("updateCateogrycompanion/{id}", "update")->name("updateCateogrycompanion");
// // //delete
Route::delete("deleteCateogrycompanion/{id}", "delete")->name("deleteCateogrycompanion");

});
Route::controller(DetailsCompanionController::class)->group(function ()  {
    //show
    Route::get("DetailsCompanion", "index")->name("DetailsCompanion");
  //   //add
    Route::get("AddDetailsCompanion", "create")->name("AddDetailsCompanion");
  //   //create
    Route::POST("storeDetailsCompanion", "store")->name("storeDetailsCompanion");
//   //   // //edit
    Route::get("editDetailsCompanion/{id}", "edit")->name("editDetailsCompanion");
    Route::put("updateDetailsCompanion/{id}", "update")->name("updateDetailsCompanion");
//   //   // //delete
    Route::delete("detailsCompaniondelete/{id}", "delete")->name("detailsCompaniondelete");
  });
  //Biography of the Prophet
  Route::controller(BiographyController::class)->group(function ()  {
    //show
    Route::get("Biography", "index")->name("Biography");
  //   //add
    Route::get("AddBiography", "create")->name("AddBiography");
  //   //create
    Route::POST("storeBiography", "store")->name("storeBiography");
//   //   // //edit
    Route::get("editBiography/{id}", "edit")->name("editBiography");
    Route::put("updateBiography/{id}", "update")->name("updateBiography");
//   //   // //delete
    Route::delete("Biographydelete/{id}", "delete")->name("Biographydelete");
  });
  //Clint
  Route::controller(ClintController::class)->group(function ()  {
    //show
    Route::get("clint", "index")->name("Clint");

//   //   // //delete
    Route::delete("Clintdelete/{id}", "delete")->name("Clintdelete");

  });

  //  Story
Route::controller(CategoryStoryController::class)->group(function ()  {

    //show
    Route::get("CateogryStory", "index")->name("CateogryStory");
    // //add
    Route::get("AddCateogryStory", "create")->name("AddCateogryStory");
    // //create
    Route::POST("storeCateogryStory", "store")->name("storeCateogryStory");
    // // //edit
    Route::get("editCateogryStory/{id}", "edit")->name("editCateogryStory");
    Route::put("updateCateogryStory/{id}", "update")->name("updateCateogryStory");
    // // //delete
    Route::delete("deleteCateogryStory/{id}", "destroy")->name("deleteCateogryStory");

    });
    Route::controller(DetailsStoryController::class)->group(function ()  {
        //show
        Route::get("DetailsStory", "index")->name("DetailsStory");
      //   //add
        Route::get("AddDetailsStory", "create")->name("AddDetailsStory");
      //   //create
        Route::POST("storeDetailsStory", "store")->name("storeDetailsStory");
    //   //   // //edit
        Route::get("editDetailsStory/{id}", "edit")->name("editDetailsStory");
        Route::put("updateDetailsStory/{id}", "update")->name("updateDetailsStory");
    //   //   // //delete
        Route::delete("detailsStorydelete/{id}", "destroy")->name("detailsStorydelete");
      });
        //  Fatwa
Route::controller(FatwaController::class)->group(function ()  {

    //show
    Route::get("Fatwa", "index")->name("Fatwa");
    // //add
    Route::get("AddFatwa", "create")->name("AddFatwa");
    // //create
    Route::POST("storeFatwa", "store")->name("storeFatwa");
    // // //edit
    Route::get("editFatwa/{id}", "edit")->name("editFatwa");
    Route::put("updateFatwa/{id}", "update")->name("updateFatwa");
    // // //delete
    Route::delete("deleteFatwa/{id}", "destroy")->name("deleteFatwa");

    });
        //  Ask ME
Route::controller(InquiriesAndResponsesController::class)->group(function ()  {

    //show
    Route::get("InquiriesAndResponses", "index")->name("InquiriesAndResponses");
    // //add
    Route::get("AddInquiriesAndResponses", "create")->name("AddInquiriesAndResponses");

    Route::put("updateInquiriesAndResponses/{id}", "update")->name("updateInquiriesAndResponses");
    // // //delete
    Route::delete("deleteInquiriesAndResponses/{id}", "destroy")->name("deleteInquiriesAndResponses");

    });