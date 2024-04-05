<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiries_and_responses extends Model
{
    use HasFactory;
    protected $fillable=[
        "question",
        "response",
        "user_id",
    ];
}
