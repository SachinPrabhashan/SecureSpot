<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookings_id',
        'user_id',
        'locker_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'reference_no'
    ];

    public function bookings()
    {
        return $this->belongsTo(booking::class, 'bookings_id');
    }
}
