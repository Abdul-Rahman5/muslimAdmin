<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsAzkar extends Model
{
    use HasFactory;
    protected $fillable=[
        "title_ar",
        "title_en",
        "reward_ar",
        "reward_en",
        "repeat",
        "cateogry_azkars_id",
    ];
}
