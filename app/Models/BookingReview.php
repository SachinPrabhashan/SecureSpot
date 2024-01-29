<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookings_id',
        'user_id',
        'locker_id',
        'rate',
        'user_review',
        'view_status',
        'status'
    ];

    public function BookingHistory()
    {
        return $this->belongsTo(BookingHistory::class, 'bookings_id');
    }

    public function locker(){
        return $this->belongsTo(locker::class, 'locker_id');
    }

    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
