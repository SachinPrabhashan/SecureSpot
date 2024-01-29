<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function sidebar(){
        return view('admin.dashboard');
    }
}
