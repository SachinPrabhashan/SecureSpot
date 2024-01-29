<?php

namespace App\Http\Controllers;

use App\Models\payments_bookings;
use App\Models\payments_history;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('user.newpayment');
    }

    public function index2()
    {

        $payments_bookings = payments_bookings::all();
        return view('user.paymenthistory', compact('payments_bookings'));
    }

    public function topupdis()
    {

        $payments_topups = payments_history::all();
        return view('user.paymenthistorytopup', compact('payments_topups'));
    }
}
