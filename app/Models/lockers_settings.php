<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lockers_settings extends Model
{
    use HasFactory;

    protected $fillable =[
        'unitprice',
        'unitsize'
    ];
}
