<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments_history extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt',
        'amount',
        'payment_method',
        'user_id',
        'created_by',
        'created_by_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
