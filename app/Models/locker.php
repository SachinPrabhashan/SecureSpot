<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class locker extends Model
{
    use HasFactory;

    protected $fillable = [
        'locker_type',
        'status',
        'position_x',
        'position_y',
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
