<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'specialist_regions');
    }
}
