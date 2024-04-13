<?php

namespace App\Http\Controllers\MobileUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileUser\StoreMobileUserRequest;
use App\Http\Requests\MobileUserDetail\StoreMobileDetailUserRequest;
use App\Models\MobileUser;
use App\Models\MobileUserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileUserDetailController extends Controller
{

    public function index()
    {
        $mobileUser = Auth::guard('mobile-user')->user();
        return view('mobileUser.mobileUserDetail', 'mobileUser');
    }

    //     public function store(StoreMobileDetailUserRequest $request)
    // {
    //     if ($mobileUser = Auth::guard('mobile-user')->user()) {
    //         if ($request->hasFile('citizenship_front') && $mobileUser->citizenship_front) {
    //             $this->deleteFile($mobileUser->citizenship_front);
    //         }
    //         if ($request->hasFile('citizenship_back') && $mobileUser->citizenship_back) {
    //             $this->deleteFile($mobileUser->citizenship_back);
    //         }
    //         if ($request->hasFile('nec_certificate') && $mobileUser->nec_certificate) {
    //             $this->deleteFile($mobileUser->nec_certificate);
    //         }

    //         $mobileUser->update($request->validated());
    //     } else {
    //         $mobileUser = MobileUser::create($request->validated());
    //     }


    //     return back();
    // }
    public function store(StoreMobileDetailUserRequest $request)
    {
        if ($mobileUser = Auth::guard('mobile-user')->user()) {
            if ($request->hasFile('citizenship_front') && $mobileUser->citizenship_front) {
                $this->deleteFile($mobileUser->citizenship_front);
            }
            if ($request->hasFile('citizenship_back') && $mobileUser->citizenship_back) {
                $this->deleteFile($mobileUser->citizenship_back);
            }
            if ($request->hasFile('nec_certificate') && $mobileUser->nec_certificate) {
                $this->deleteFile($mobileUser->nec_certificate);
            }
            $mobileUser->update($request->validated());
        } else {
            MobileUserDetail::create($request->validated() + [
                'mobile_user_id' => Auth::guard('mobile-user')->user()->id,
            ]);
        }
        return redirect(route('digital-service'));
    }
}
