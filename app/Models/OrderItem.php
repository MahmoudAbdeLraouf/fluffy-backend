<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function itemVaccination()
    {
        return $this->hasMany(OrderItemVaccination::class);
    }
    function vaccination()
    {
        return $this->hasManyThrough(Vaccination::class, OrderItemVaccination::class,'order_id', 'order_item_id');
    }

    function animalType() {
        return $this->belongsTo(AnimalType::class);
    }
}
