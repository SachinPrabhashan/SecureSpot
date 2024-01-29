<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('user.contact');
    }

    public function store(Request $request){

        $user_id = auth()->id();
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

        contact::create([
            'user_id' => $user_id,
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'status' => 'Unread'
        ]);

        return redirect(route('user.contact'))->with('status', 'Message Sent Successfully!');
    }

    public function displaymessage(){
        $contacts = contact::all();
        return view('admin.feedbacks.usermessages', compact('contacts'));
    }

    public function updateStatus($id)
    {
        // Find the contact by ID and update the status
        $contact = DB::table('contacts')->findOrFail($id);
        if ($contact) {
            $contact->status = 'read';
            $contact->save();
        }

        return response()->json(['status' => 'success']);
    }
}
