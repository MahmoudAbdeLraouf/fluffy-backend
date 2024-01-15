<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'datetime'
    ];
    function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    function client() {
        return $this->belongsTo(Client::class);
    }

    function region()
    {
        return $this->belongsTo(Region::class);
    }

    function invitations()
    {
        return $this->hasMany(OrderInvitation::class);
    }
}
