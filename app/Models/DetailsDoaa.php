<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsDoaa extends Model
{
    use HasFactory;
    protected $fillable=[
        "title_ar",
        "title_en",
        "category_doaas_id",
    ];
}
