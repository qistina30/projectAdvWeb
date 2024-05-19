<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the user is approved
            $user = Auth::user();
            if ($user->approval_status === 'approved') {
                // Authentication passed and user is approved
                return redirect()->intended('home');
            } else {
                // User is not approved
                Auth::logout(); // Logout the user
                return redirect()->back()->withErrors(['email' => 'Your account has not been approved yet.']);
            }
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }


}
