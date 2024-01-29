<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\payments_bookings;
use App\Models\payments_history;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.newpayment');
    }

    public function index2()
    {
        $topupcharges = payments_history::all();
        return view('admin.payments.paymenthistory', compact('topupcharges'));
    }

    public function topuphisview()
    {
        $bookingcharges = payments_bookings::all();
        return view('admin.payments.paymenthistorybookingcharge', compact('bookingcharges'));
    }

    public function paymentproceed($id)
    {
        $users = User::find($id);
        return view('admin.payments.paymentproceed', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $user = User::all($id);

        return view('admin.payments.newpayment', compact('user'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = User::where('fname', 'LIKE', "%{$searchTerm}%")
            /* ->orWhere('regno', $searchTerm) */
            ->get();

        return view('admin.payments.newpayment', compact('results'));
    }

    // public function search_payment_history(Request $request)
    // {
    //     $searchTerm = $request->input('search');

    //     $results = payments_history::where('receipt', 'LIKE', "%{$searchTerm}%")
    //         /* ->orWhere('regno', $searchTerm) */
    //         ->get();

    //     return view('admin.payments.paymenthistory', compact('results'));
    // }

    public function NewTopup(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect(route('admin.paymentusersearch'))->with('error', 'User not found');
        }
        $topupamount = $request->input('cashpayment');
        $user->credit += $topupamount;
        $user->update();

        $count = DB::table('payments_histories')->count() + 1;
        $receiptno = 'SSRCP' . $count;

        payments_history::create([
            'receipt' => $receiptno,
            'amount' => $request->input('cashpayment'),
            'payment_method' => 'cash',
            'user_id' => $user->id,
            'created_by' => Auth::id(),
            'created_by_name' => Auth::user()->fname
        ]);

        return redirect(route('admin.paymentusersearch', compact('user')))->with('status', 'Payment Successfull...!' . ' Receipt No: ' . $receiptno);
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //Variable Pass
    public function passresults()
    {

        $result = payments_history::all();
        return view('admin.payments.paymenthistory', compact('result'));
    }
}
