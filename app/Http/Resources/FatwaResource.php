<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FatwaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "question_ar"=>$this->question_ar,
            "question_en"=>$this->question_en,
            "response_ar"=>$this->response_ar,
            "response_en"=>$this->response_en,
        ];
    }
}
