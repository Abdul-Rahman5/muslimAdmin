<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatwa extends Model
{
    use HasFactory;

    protected $fillable=[
        "question_ar",
        "question_en",
        "response_ar",
        "response_en",
        "user_id",
    ];
}
