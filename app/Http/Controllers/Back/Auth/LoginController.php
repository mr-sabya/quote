<?php

namespace App\Http\Controllers\Back\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
    	return view('back.auth.login');
    }


    /**
     * login admin
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        // Validate Login Data
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect to dashboard
            session()->flash('success', 'Successully Logged in !');
            return redirect()->intended(route('admin.dashboard'));
        } else {
            session()->flash('error', 'Invalid email and password');
            return back();
        }
    }

    /**
     * logout admin guard
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
