<?php

namespace App\Http\Controllers;

use App\Http\Resources\InquiriesAndResponsesResource;
use App\Models\inquiries_and_responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiInquiriesAndResponsesController extends Controller
{
    //
    public function all()
    {

        $allInquiriesAndResponses = inquiries_and_responses::all();
        return InquiriesAndResponsesResource::collection($allInquiriesAndResponses);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "question" => "required|string"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 301);
        }
        inquiries_and_responses::create([
            "question" => $request->question
        ]);
        return response()->json([
            "message" => "successfuly"
        ], 301);
    }
}
