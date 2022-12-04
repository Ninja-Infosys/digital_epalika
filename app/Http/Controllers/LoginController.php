<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest')->except([
            'locked',
            'unlock',
        ]);
    }

    public function locked()
    {
        if (!session('lock-expires-at')) {
            return redirect('/');
        }

        if (session('lock-expires-at') > now()) {
            return redirect('/');
        }

        return view('admin.lock_screen.lock_screen');
    }

    public function unlock(Request $request)
    {
        $check = Hash::check($request->input('password'), $request->user()->password);

        if (!$check) {
            return redirect()->route('login.locked')->withErrors([
                'Your password does not match your profile.',
            ]);
        }
        $redirectTo = session()->exists('route_to_redirect') ? session('route_to_redirect') : route('admin.dashboard');

        session()->forget('route_to_redirect');

        session(['lock-expires-at' => now()->addMinutes($request->user()->getLockoutTime())]);

        return redirect($redirectTo);
    }
}
