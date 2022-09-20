<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class OrganizationAuthController extends Controller
{

    public function showOrganizationLoginForm()
    {
        return view('organization.auth.login', ['url' => 'admin']);
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
        return view('organization.auth.register', ['url' => 'admin']);
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
