<?php

use App\Http\Controllers\ApiCategoryAzkarController;
use App\Http\Controllers\ApiCategoryCompanionController;
use App\Http\Controllers\ApiCategoryDoaaController;
use App\Http\Controllers\ApiCategoryHadithController;
use App\Http\Controllers\ApiCategoryIntonationController;
use App\Http\Controllers\ApiCategoryIslamicHistoryController;
use App\Http\Controllers\ApiCategoryStoryController;
use App\Http\Controllers\ApiFatwaController;
use App\Http\Controllers\ApiInquiriesAndResponsesController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ClintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(ApiCategoryAzkarController::class)->group(function ()  {

    Route::get("categoriesAzkar","getCategoryAzkar");
    Route::get("detailsAzkars/{id}","showAzkar");
});
Route::controller(ApiCategoryDoaaController::class)->group(function ()  {

    Route::get("categoriesDoaa","categoriesDoaa");
    Route::get("detailsDoaa/{id}","showDoaa");
});
Route::controller(ApiCategoryHadithController::class)->group(function ()  {

    Route::get("categoriesHadith","categoriesHadith");
    Route::get("detailsHadith/{id}","showHadith");
});
Route::controller(ApiCategoryIntonationController::class)->group(function ()  {

    Route::get("categoriesIntonation","categoriesIntonation");
    Route::get("detailsIntonation/{id}","showIntonation");
});
Route::controller(ApiCategoryCompanionController::class)->group(function ()  {

    Route::get("categoriescompanion","categoriescompanion");
    Route::get("detailscompanion/{id}","showcompanion");
});
Route::controller(ApiCategoryIslamicHistoryController::class)->group(function ()  {

    Route::get("categoriesislamicHistories","categoriesislamicHistories");
    Route::get("detailsislamicHistories/{id}","showislamicHistories");
});
Route::controller(BiographyController::class)->group(function ()  {

    Route::get("categoriesBiography","ApicategoriesBiography");
});
Route::controller(ClintController::class)->group(function ()  {

    Route::post("newClint","store");
});
Route::controller(ApiCategoryStoryController::class)->group(function ()  {

    Route::get("categoriesStory","categoriesStory");
    Route::get("detailsStory/{id}","showStory");
});
Route::controller(ApiInquiriesAndResponsesController::class)->group(function ()  {

    Route::get("InquiriesAndResponses","all");
    Route::post("InquiriesAndResponsesStore","store");
});
Route::controller(ApiFatwaController::class)->group(function ()  {

    Route::get("fatwa","all");
});