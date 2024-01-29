<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'locker_id',
        'user_id',
        'usage',
        'unit_amount',
        'status',
        'reference_no'
    ];

    public function locker()
    {
        return $this->belongsTo(Locker::class, 'locker_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Inside the Booking model
    public function booking_history()
    {
        return $this->hasOne(BookingHistory::class, 'bookings_id');
    }
}
