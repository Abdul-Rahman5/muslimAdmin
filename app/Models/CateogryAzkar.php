<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateogryAzkar extends Model
{
    use HasFactory;
    protected $fillable = [
        "name_ar",
        "name_en",
        "user_id",
    ];
}
