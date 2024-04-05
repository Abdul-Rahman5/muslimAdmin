<?php

namespace App\Http\Controllers;

use App\Models\Category_story;
use App\Models\DetailsStory;
use Illuminate\Http\Request;

class DetailsStoryController extends Controller
{


    public function index()  {


        $allDetailsStory=DetailsStory::join('category_stories', 'details_stories.category_stories_id', '='
        , 'category_stories.id')
        ->select('details_stories.*', 'category_stories.name_en')
        ->get();


        // dd($allDetailsAzkar);
        return view("Admin.Story.Details.DetailsStory",compact("allDetailsStory"));

    }
    public function create()
    {
        $categories=Category_story::all();
        // dd($categories);
        return view("Admin.Story.Details.addDetailStory",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //validation
       $data=$request->validate([
        "title_ar"=>"required |string ",
        "title_en"=>"required |string ",
        "category_stories_id"=>"required |numeric ",
    ]);
    //create
    DetailsStory::create($data);
    //message
    toastr()->success('Data has been saved successfully!');
    //redirct
    return redirect(url("AddDetailsStory"));
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailsStory $detailsStory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        try {
            $detailsStory=DetailsStory::findOrFail($id);
            $categories=Category_story::all();
            return view("Admin.Story.Details.editDetailsStory",compact("detailsStory","categories"));
        } catch (\Throwable $e) {
            toastr()->error('Story not found');

            return redirect(url("DetailsStory"));
        }

    }

    public function update(Request $request ,$id)  {
        //validation
        $data=$request->validate([
            "title_ar"=>"required |string ",
            "title_en"=>"required |string ",
            "category_stories_id"=>"required |numeric ",
        ]);
         //findOrFail
         $detailsStory = DetailsStory::findOrFail($id);

        //update
        $detailsStory->update($data);
        //message
        //toster
        toastr()->success('Data updated successfuly');
        //return
        return redirect(url("DetailsStory"));



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            //findOrFail
         $detailsStory = DetailsStory::findOrFail($id);

         //delete
         $detailsStory->delete();
         //message
         toastr()->success('Data deleted successfuly');

         //return
         return redirect(url('DetailsStory'));
         } catch (\Throwable $e) {
             toastr()->error('Details story not found');

             return redirect(url("DetailsStory"));
         }

    }
}
