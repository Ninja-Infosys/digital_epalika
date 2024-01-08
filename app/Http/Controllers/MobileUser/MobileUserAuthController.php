<?php

namespace App\Http\Controllers\MobileUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\MobileUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MobileUserAuthController extends Controller
{


    public function showMobileUserRegisterForm()
    {
        return view('mobileUser.auth.register');
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:mobile_users,email'],
            'phone' => ['required'],
            'password' => ['required', 'min:7'],
        ]);
        MobileUser::create($validated);
        toast('सफलतापुर्बक सेवाग्राही रेजिस्टर हुनु भयो !!', 'success');
        return back();
    }

    public function showMobileUserLoginForm()
    {
        return view('mobileUser.auth.login');
    }

    public function mobileUserLogin(Request $request): RedirectResponse|string
    {
        if (config('app.env') === 'production') {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
                'g-recaptcha-response' => ['recaptcha'],
            ], ['g-recaptcha-response.recaptcha' => 'Please verify captcha']);
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
        }

        if (Auth::guard('mobile-user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->get('remember'))) {
            return redirect()->route('digital-service');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('mobile-user')->logout();

        return redirect('/');
    }

    public function profile()
    {
        $mobileUser = \auth('mobile-user')->user();

        return view('mobileUser.profile', compact('mobileUser'));
    }
}
