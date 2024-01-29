<?php

namespace App\Http\Controllers;

use App\Models\locker;
use App\Models\booking;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LockerController extends Controller
{
    public function showLockerGrid(Request $request)
    {
        /* $date = request('date');
        $start_time = request('start_time');
        $end_time = request('end_time'); */

        /* $date = '2023-12-16';
        $start_time = '08:00';
        $end_time = '18:00'; */

        // Retrieve data from session
        $date = Session::get('date');
        $start_time = Session::get('start_time');
        $end_time = Session::get('end_time');

        /* $bookedlocker = Booking::where('date', $date)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->value('locker_id'); */

        $bookedlocker = Booking::where('date', $date)
            ->where('start_time', '<=', $end_time)
            ->where('end_time', '>=' , $start_time)
            ->value('locker_id');


        $locker = Locker::all();

        return view('user.newbooking2nd', compact('locker', 'bookedlocker'))->with('lockers', $locker);
    }

    public function showLockerGrid2($Id)
    {
        booking::findOrFail($Id);
        $locker = Locker::all();
        return view('user.editbookings', compact('locker'))->with('lockers', $locker);
    }
}
