<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Http\Requests\StorePasswordRequest;

class OrganizationAuthController extends Controller
{

    public function showOrganizationLoginForm()
    {
        return view('emap::organization.auth.login');
    }

    public function organizationLogin(Request $request)
    {
        $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
                'g-recaptcha-response' => ['recaptcha'],
            ],
            ['g-recaptcha-response.recaptcha' =>'Please verify captcha']
        );

        if (Auth::guard('organization')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('organization.admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('organization')->logout();
        return redirect('/');
    }


    public function showOrganizationRegisterForm()
    {
        return view('emap::organization.auth.register');
    }


    public function invitation(Organization $organization)
    {
        if (!request()->hasValidSignature() || $organization->password) {
            abort(401);
        }

        auth('organization')->login($organization);

        return redirect()->route('organization.admin.dashboard');
    }

    public function create()
    {
        if (auth('organization')->user()->password) {
            return redirect()->route('organization.admin.dashboard');
        }

        return view('emap::organization.auth.password');
    }

    public function store(StorePasswordRequest $request)
    {
//        dd($request->validated());
        $redirect = redirect()->route('organization.admin.dashboard');
        $user = auth('organization')->user();

        if (!$user->password) {
            $user->update([
                'password' => $request->input('password')
            ]);

            toast('पासवर्ड सफलतापुर्वक राखियो', 'success');
        }

        return $redirect;
    }

    public function profile()
    {
        $organization = \auth('organization')->user();

        return view('emap::organization.profile', compact('organization'));
    }
}
