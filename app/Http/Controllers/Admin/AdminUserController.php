<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function alluserview()
    {

        $users = User::all();
        return view('admin.users.allusermanage', compact('users'));
    }

    public function credentialupdate(Request $request, $id)
    {
        $user = User::find($id);

        $selectedValue = $request->input('credentials');

        // Check the selected value and update is_disabled accordingly
        if ($selectedValue === 'activate') {
            $user->is_disabled = false; // Activate the user
        } elseif ($selectedValue === 'deactivate') {
            $user->is_disabled = true; // Deactivate the user
        } else {
            // Handle the case where no valid option is selected
            return redirect()->back()->with('error', 'Invalid option selected.');
        }

        $user->save();

        return redirect(route('admin.alluserview', compact('user')))->with('status', 'Credential Update Successful!');
    }
}
