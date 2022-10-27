<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $primaryKey = "uuid";
    public $incrementing = false;
    public $keyType = "string";

    public function station()
    {
        return $this->belongsTo(Station::class, "ticket_station");
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, "ship");
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class, "seat_class");
    }
}
