<?php

namespace App\Http\Controllers;

use App\Models\locker;
use App\Models\booking;
use Illuminate\Http\Request;
use App\Models\BookingHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BookingReview;
use App\Models\payments_bookings;
use App\Models\payments_history;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        return view('user.booking');
    }

    public function newbooking()
    {

        $key_manage = DB::table('bookings')
            ->where('user_id', Auth::id())
            ->where('key_management', 'no')
            ->value('key_management');

        return view('user.newbooking', compact('key_manage'));
    }

    public function bookinghistoryuser()
    {
        return view('user.bookinghistory');
    }



    public function newbooking2nd(Request $request)
    {
        $lockers = locker::all();
        return view('user.newbooking2nd', compact('lockers', 'bookedlocker'));
    }

    public function bookinghistory()
    {
        $bookings = bookinghistory::all();

        return view('admin.bookings.bookinghistories', compact('bookings'));
    }

    //Below function take the Date, time range and pass into next view.
    public function handleFormSubmission(Request $request)
    {
        // Assuming you have retrieved the values from the form
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        // Store data in session
        Session::put('date', $date);
        Session::put('start_time', $start_time);
        Session::put('end_time', $end_time);

        // Redirect to another Blade file and pass the values
        return redirect()->route('user.newbooking2nd')/*
            ->with('date', $date)
            ->with('start_time', $start_time)
            ->with('end_time', $end_time) */;
    }


    /* User Booking History */
    public function mybookinghistory()
    {
        $bookinghistorys = BookingHistory::all();
        $rate_star = BookingReview::all()->value('rate');
        return view('user.bookinghistory', compact('bookinghistorys', 'rate_star'));
    }

    //Can fix "Undefine Variable $bookings in @foreach loop
    public function managebooking()
    {
        $bookings = booking::all();
        /* dd($rate_star); */
        return view('user.managebooking', compact('bookings'));
    }


    public function editbookings()
    {
        return view('user.editbookings');
    }

    public function keyreturnconfirm(Request $request, $id)
    {
        $booking = Booking::find($id);
        $user = User::where('id','=', $booking->user_id)->latest()->first();

        $didreturn = $request->input('keyreturn');

        if ($booking) {
            $booking->key_management = $didreturn;
            $booking->save();

            $bookingHistory = BookingHistory::where('bookings_id', $booking->id)->latest()->first();

            $refno = $bookingHistory->reference_no;

            $user->credit -= 50;
            $user->save();
            /* dd($refno); */
            // Check if key return is 'yes' and add extra charge
            if ($didreturn == 'yes') {
                // Add extra charge of 50
                payments_bookings::create([
                    'receipt' => 'ExC' . $refno,
                    'user_id' => $bookingHistory->user_id,
                    'booking_his_id' => $bookingHistory->id,
                    'date' => $booking->updated_at,
                    'charge_amount' => 50,
                    'status' => 'KeyExtraCharge',
                ]);
            }
        }

        return redirect(route('bookingmanage', compact('booking')));
    }

    public function reviewpost(Request $request, $id)
    {

        $booking = booking::find($id);

        $locker = $booking->locker_id;

        $bookingHistory = DB::table('booking_histories')->where('bookings_id', $booking->id)->value('id');

        /* dd($bookingHistory); */

        $user_id = Auth::id();
        $booking_id = $booking->id;
        $rate = $request->input('rate');
        $user_review = $request->input('review-text');
        $locker_id = $locker;

        if ($booking) {
            BookingReview::create([
                'bookings_id' => $bookingHistory,
                'user_id' => $user_id,
                'locker_id' => $locker_id,
                'rate' => $rate,
                'user_review' => $user_review,
                'view_status' => 'unread',
                'status' => 'reviewed'
            ]);

            if ($booking->key_management == 'yes') {
                $booking->delete();
            }

            return redirect(route('user.managebooking', compact('booking')))->with('status', 'Review Post Successful.!!');
        } else {
            return back()->with('error', 'Something Wrong on Review');
        }
    }


    public function store(Request $request)
    {
        $user_id = Auth::id();
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $selectedLockerId = $request->input('selected_locker');

        // Validation
        $request->validate([
            'date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'selected_locker' => 'required|exists:lockers,id',
        ]);

        // Check if the locker is available on the selected date and time period
        $existingBooking = Booking::where('locker_id', $selectedLockerId)
            ->where('date', $date)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('end_time', [$start_time, $end_time])
                    ->orWhereBetween('start_time', [$start_time, $end_time])
                    ->orWhere(function ($query) use ($start_time, $end_time) {
                        $query->where('start_time', '<=', $start_time)
                            ->where('end_time', '>=', $end_time);
                    });
            })
            ->first();

        if ($existingBooking) {
            return back()->with('error', 'This locker is already booked during the selected time period on the specified date.');
        }

        if ($user_id) {

            $start_time = \Carbon\Carbon::createFromFormat('H:i', $request->input('start_time'));
            $end_time = \Carbon\Carbon::createFromFormat('H:i', $request->input('end_time'));

            $bookingusage = $end_time->diffInMinutes($start_time) / 30;

            $unitprice = DB::table('lockers_settings')->value('unitprice');

            $estcharge = $bookingusage * $unitprice;

            $user = Auth::user();

            $bookingCount = Booking::where('user_id', Auth::id())->count();

            $count = DB::table('booking_histories')->orderBy('created_at', 'desc')->value('bookings_id') + 1;
            $refno = 'REF00' . $count;

            if ($bookingCount >= 2) {
                return back()->with('error', 'Oops!! Your bookings limit exceeded..!!');
            }
            // $booking_usage now contains the booking usage in 30-minute intervals
            if (Auth::user()->credit > $estcharge) {
                $booking = booking::create([
                    'user_id' => $user_id,
                    'locker_id' => $selectedLockerId,
                    'date' => $date,
                    'start_time' => $start_time,
                    'end_time' =>  $end_time,
                    'usage' => $bookingusage,
                    'status' => 'active',
                    'reference_no' => $refno,
                ]);

                // Create a booking history record
                $bookinghistory = BookingHistory::create([
                    'bookings_id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'locker_id' => $booking->locker_id,
                    'date' => $booking->date,
                    'start_time' => $booking->start_time,
                    'end_time' => $booking->end_time,
                    'status' => 'ongoing',
                    'reference_no' => $refno,
                ]);

                //Deduct booking charger from user credit
                $user->credit -= $estcharge;
                $user->save(); //this is works

                payments_bookings::create([
                    'receipt' => 'BK0' . $refno,
                    'user_id' => $user_id,
                    'booking_his_id' => $bookinghistory->id,
                    'date' => $bookinghistory->created_at,
                    'charge_amount' => $estcharge,
                    'status' => 'BookingCharge',
                ]);



                return redirect(route('user.bookingsum'))->with('status', 'Booking Complete !!!');
            } else {
                return back()->with('error', 'Account Balance insufficient..! Please TopUp Your Account');
            }
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function bookingsummary()
    {
        $bookingsum = DB::table('bookings')->get();

        return view('user.bookingsummary', compact('bookingsum'));
    }

    public function bookingsummaryforedit()
    {
        $bookings = DB::table('bookings')->get();

        return view('user.editbookings', compact('bookings'));
    }

    public function LoardOldData($Id)
    {
        $bookings = booking::find($Id);

        if (!$bookings) {
            abort(404); // Or handle the not found case as needed
        }

        return view('user.editbookings', compact('bookings'));
    }

    public function edit()
    {
    }

    public function delete($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $user = Auth::user();
        $bookingHistoryID = BookingHistory::where('bookings_id', $booking);

        $bookingHistoryID = $booking->booking_history()->value('id');

        $payments_bookings = DB::table('payments_bookings')->get();
        /* dd($payments_bookings); */
        $bkstatus = DB::table('bookings')
            ->where('id', $bookingId)
            ->pluck('status')
            ->first();

        /* dd($bkstatus); */

        if ($bkstatus !== null && $bkstatus == 'reject') {
            if ($bookingHistoryID) {
                DB::table('booking_histories')
                    ->where('bookings_id', $booking->id)
                    ->update(['status' => 'RejectByAdmin']);
                // Refund the booking charge
                $refundAmount = $booking->usage * DB::table('lockers_settings')->value('unitprice');
                $user->credit += $refundAmount;
                $user->save();

                // Create a refund record
                $payments_bookings = new payments_bookings;
                $payments_bookings->receipt = 'REF' . $booking->reference_no;
                $payments_bookings->user_id = $user->id;
                $payments_bookings->booking_his_id = $bookingHistoryID;
                $payments_bookings->date = now();
                $payments_bookings->refund_amount = $refundAmount;
                $payments_bookings->status = 'CancelRefund';
                $payments_bookings->save();
            }
        } else {
            if ($bookingHistoryID) {
                DB::table('booking_histories')
                    ->where('bookings_id', $booking->id)
                    ->update(['status' => 'DeleteByUser']);

                // Refund the booking charge
                $refundAmount = $booking->usage * DB::table('lockers_settings')->value('unitprice');
                $user->credit += $refundAmount;
                $user->save();

                // Create a refund record
                $payments_bookings = new payments_bookings;
                $payments_bookings->receipt = 'REF' . $booking->reference_no;
                $payments_bookings->user_id = $user->id;
                $payments_bookings->booking_his_id = $bookingHistoryID;
                $payments_bookings->date = now();
                $payments_bookings->refund_amount = $refundAmount;
                $payments_bookings->status = 'CancelRefund';
                $payments_bookings->save();
            }
        }



        $booking->delete();

        return redirect(route('user.managebooking'));
    }


    public function update()
    {
    }
}
