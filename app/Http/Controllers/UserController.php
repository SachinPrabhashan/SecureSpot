<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = User::all();
        return view('user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        /* dd($request->all()); */

        // Check if the required fields are not null
        if (
            is_null($request->input('fname')) ||
            is_null($request->input('lname')) ||
            is_null($request->input('faculty')) ||
            is_null($request->input('regno')) ||
            is_null($request->input('phone')) ||
            is_null($request->input('email'))
        ) {
            return redirect()->route('user.profile', ['id' => $id])->with('error', 'All fields are required. Please fill out all the details.');
        }

        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'faculty' => 'required',
            'regno' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.profile', ['id' => $id])->with('error', 'Something gone wrong.!!');
        }

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->faculty = $request->input('faculty');
        $user->regno = $request->input('regno');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        $user->save();


        return redirect()->route('user.profile', ['id' => $id])->with('status', 'Profile Update Successful!');
    }
}
