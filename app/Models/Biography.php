<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;
    protected $fillable = [
        "biographie_ar",
        "biographie_en",
        "user_id",
    ];
}
