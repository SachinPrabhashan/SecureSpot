<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments_bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt',
        'user_id',
        'booking_his_id',
        'date',
        'charge_amount',
        'status',
        'refund_amount',
        'refund_note'
    ];

    public function bookingshistory()
    {
        return $this->belongsTo(BookingHistory::class, 'booking_his_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
