<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function animal_types()
    {
        return $this->belongsToMany(AnimalType::class, 'client_animal_types');
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
