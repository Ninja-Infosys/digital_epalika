<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\Organization;

class OrganizationAuthController extends Controller
{

    public function showOrganizationLoginForm()
    {
        return view('emap::organization.auth.login');
    }

    public function organizationLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

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

    protected function registerOrganization(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('organizations', 'email')],
            'password' => ['required', 'confirmed']
        ]);
        $admin = Organization::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        return redirect()->route('organization.admin.dashboard');
    }
}
