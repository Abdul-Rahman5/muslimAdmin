<?php

namespace App\Http\Controllers;

use App\Models\Category_story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $allStory = Category_story::join('users', 'category_stories.user_id', '=', 'users.id')
        ->select('category_stories.*', 'users.name as user_name')
        ->get();
        return view("Admin.Story.CateogryStory",compact("allStory"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryStory"));
        }
    }

    public function create()
    {
        try {
            return view("Admin.Story.addCateogryStory");
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryStory"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //validation
      $data=$request->validate([
        "name_ar"=>"required|string|max:255",
        "name_en"=>"required|string|max:255",
    ]);
    $data['user_id']= Auth::user()->id;
    //store
    Category_story::create($data);
        //toster
        toastr()->success('Data has been saved successfully!');

    //redirce
    return redirect(url('AddCateogryStory'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category_story $category_story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        try {
            $categoryStory = Category_story::findOrFail($id);
            return view("Admin.Story.editStory", compact("categoryStory"));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryStory"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data=$request->validate([
           "name_ar"=>"required|string|max:255",
           "name_en"=>"required|string|max:255",
       ]);
       $data['user_id']= Auth::user()->id;
       //findOrFail
       $categoryStory = Category_story::findOrFail($id);

       //update
       $categoryStory->update($data);
           //toster
           toastr()->success('Data updated successfuly');

       //redirce
       return redirect(url('CateogryStory'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categorystory= Category_story::findOrFail($id);
            $categorystory->delete();
            toastr()->success('Data deleted successfuly');
            return redirect(url('CateogryStory'));
        } catch (\Throwable $e) {
            toastr()->error('Error');

            return redirect(url("CateogryStory"));
        }
    }
}
