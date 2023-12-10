<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TraineeUserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('roaster::traineeUser.auth.login');
    }

    public function Login(Request $request): RedirectResponse
    {
        if (config('app.env') === 'production') {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                    'g-recaptcha-response' => ['recaptcha'],
                ],
                ['g-recaptcha-response.recaptcha' => 'Please verify captcha']
            );
        } else {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                ]
            );
        }

        if (Auth::guard('traineeUser')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->get('remember'))) {
            return redirect()->route('traineeOrganization.admin.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('traineeUser')->logout();

        return redirect('/');
    }

    public function profile()
    {
        $traineeUser = \auth('traineeUser')->user();

        return view('roaster::traineeUser.profile', compact('traineeUser'));
    }
}
