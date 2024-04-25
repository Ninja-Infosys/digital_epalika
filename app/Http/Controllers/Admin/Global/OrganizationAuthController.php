<?php

namespace App\Http\Controllers\Admin\Global;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\OrganizationDetail;
use Modules\EMap\Http\Requests\StorePasswordRequest;

class OrganizationAuthController extends Controller
{
    public function showOrganizationLoginForm()
    {

        return view('admin.global.organization.auth.login');
    }

    public function organizationLogin(Request $request): RedirectResponse
    {
        if (config('app.env') === 'production') {
            $request->validate(
                [
                'email' => 'required|email',
                'password' => 'required|min:6',
                // 'g-recaptcha-response' => ['recaptcha'],
            ],
                // ['g-recaptcha-response.recaptcha' => 'Please verify captcha']
            );
        } else {
            $request->validate(
                [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
            );
        }

        if (Auth::guard('organization')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
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
        $officeheaders= OfficeHeader::orderBy('position')->get();
        return view('admin.global.organization.auth.register',compact('officeheaders'));
    }

    public function showOrganizationRegisterFormPerson()
    {
        return view('admin.global.auth.register_person');
    }

    public function invitation(Organization $organization)
    {
        if (!request()->hasValidSignature() || $organization->password) {
            abort(401);
        }

        auth('organization')->login($organization);

        return redirect()->route('dashboard');
    }

    public function create()
    {
        if (auth('organization')->user()->password) {
            return redirect()->route('dashboard');
        }

        return view('admin.global.organization.auth.password');
    }

    public function store(StorePasswordRequest $request)
    {
        $redirect = redirect()->route('dashboard');
        $user = auth('organization')->user();

        if (!$user?->password) {
            $user?->update([
                'password' => $request->input('password'),
            ]);

            toast('पासवर्ड सफलतापुर्वक राखियो', 'success');
        }

        return $redirect;
    }

    public function profile()
    {
        $organization = \auth('organization')->user();

        return view('admin.global.organization.profile', compact('organization'));
    }

    public function profileDetail(Organization $organization)
    {
        return view('admin.global.organization.edit', compact('organization'));
    }

    public function updateOrganization(Request $request,Organization $organization)
    {
       $data =  $request->validate([
            'org_name_ne'=>['required'],
            'org_name_en'=>['required'],
            'org_email'=>['required','email'],
            'org_contact'=>['required'],
            'org_pan_no'=>['required'],
            'org_registration_no'=>['required'],
            'name'=>['required','string', 'max:255'],
            'email'=>['required','email'],
            'phone'=>['required'],
            'logo'=>['nullable','file'],
            'org_registration_document'=>['nullable','file'],
            'org_pan_document'=>['nullable','file'],
        ]);
        unset($data['name']);
        unset($data['email']);
        unset($data['phone']);
        DB::transaction(function () use ($request,$organization,$data){
            $organization->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'comment'=>null,
                'status'=>'pending'
            ]);
            $organizationDetail = OrganizationDetail::find($organization->id);
            $organizationDetail->update($data);
        });
        toast('संगठन सफलतापूर्वक अद्यावधिक गरियो' ,'success');
        return back();
    }
}
