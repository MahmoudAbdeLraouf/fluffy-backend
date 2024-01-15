<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
class Region extends Model
{
    use HasFactory;

    // city function
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
