<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\locker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LockerController;
use App\Models\booking;
use App\Models\BookingReview;
use App\Models\lockers_settings;

class AdminLockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.lockers.addlocker');
    }

    public function index2()
    {
        return view('admin.lockers.viewlocker');
    }

    public function index3()
    {
        return view('admin.lockers.managelocker');
    }

    public function displaylocker()
    {
        $lockers = locker::all();
        return view('admin.lockers.viewlocker', compact('lockers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $locker_type = $request->input('lockername');
        $status = $request->input('status');
        $pos_x = $request->input('pos-x');
        $pos_y = $request->input('pos-y');

        locker::create([
            'locker_type' => $locker_type,
            'status' => $status,
            'position_x' => $pos_x,
            'position_y' => $pos_y
        ]);

        return redirect(route('admin.addlocker'))->with('status', 'Successfully Locker Created !!!');
    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        $locker = locker::all();
        return view('admin.lockers.managelocker')->with('locker', $locker);
    } */

    public function lockerAll()
    {
        $lockers = DB::table('lockers')->get();
        $unitprice = lockers_settings::all();

        return view('admin.lockers.managelocker', compact('lockers', 'unitprice'));
    }

    public function updatelockerprice(Request $request){

        $unitprice = $request->input('unitprice');
        $unitsize = $request->input('unitsize');

        $lockers_settings = lockers_settings::find(1);

        $lockers_settings->unitprice = $unitprice;
        $lockers_settings->unitsize = $unitsize;

        $lockers_settings->update();


        return redirect()->route('admin.managelocker')->with('status', 'Locker Settings Change.!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function viewUserReview(){

        $reviews = BookingReview::all();
        /* dd($reviews); */
        return view('admin.feedbacks.userreview',compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $lockerId)
    {

        $this->validate($request, [
            'lockername' => 'required',
            'status' => 'required',
            'pos-x' => 'required',
            'pos-y' => 'required',
        ]);

        $locker = Locker::find($lockerId);

        if (!$locker) {
            return redirect()->route('admin.managelocker')->with('error', 'Locker not found!');
        }

            $locker->locker_type = $request->input('lockername');
            $locker->status = $request->input('status');
            $locker->position_x = $request->input('pos-x');
            $locker->position_y = $request->input('pos-y');

            $locker->save();


        return redirect()->route('admin.managelocker', ['lockerId' => $lockerId])->with('status', 'Locker Update Successful!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $lockerId)
    {
        locker::findOrFail($lockerId)->delete();

        return redirect()->route('admin.managelocker', ['lockerId' => $lockerId])->with('status', 'Locker Deleted!');
    }
}
