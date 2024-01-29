<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    public function bookingmanage()
    {

        $bookings = booking::all();

        /* dd($bookings); */
        return view('admin.bookings.bookingmanage', compact('bookings'));
    }

    public function UpdateBookingStatus(Request $request, $id)
    {

        $selected = $request->input('booking-status');

        $booking = booking::findOrFail($id);

        if ($booking) {
            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['status' => $selected]);

            return redirect(route('bookingmanage', compact('booking')))->with('status', 'Status Update!!');
        } else {
            return redirect(route('bookingmanage'))->with('error', 'Error!! Please Try Again.');
        }
    }

    public function CompleteBooking(Request $request, $id)
    {
        $KeyManageStatus = $request->input('keyreturn');

        $booking = booking::findOrFail($id);

        if ($booking) {
            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['status' => 'complete']);

            DB::table('booking_histories')
                ->where('bookings_id', $booking->id)
                ->update(['status' => 'complete']);

            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['key_management' => $KeyManageStatus]);

            return redirect(route('bookingmanage', compact('booking')))->with('status', 'Completion Process Done!');
        } else {
            return redirect(route('bookingmanage'))->with('error', 'Error!! Please Try Again.');
        }
    }
}
