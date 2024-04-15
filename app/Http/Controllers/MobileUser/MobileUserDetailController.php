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

        return view('mobileUser.mobileUserDetail', compact('mobileUser'));
    }


    public function store(StoreMobileDetailUserRequest $request, MobileUser $mobileUser)
    {
      if($mobileUser)

            if ($request->hasFile('citizenship_front') && $mobileUser->citizenship_front) {
                $this->deleteFile($mobileUser->citizenship_front);
            }
            if ($request->hasFile('citizenship_back') && $mobileUser->citizenship_back) {
                $this->deleteFile($mobileUser->citizenship_back);
            }
            if ($request->hasFile('nec_certificate') && $mobileUser->nec_certificate) {
                $this->deleteFile($mobileUser->nec_certificate);
            }

            $mobileUser->mobileUser?->updateOrCreate($request->validated()+ [
            // MobileUserDetail::updateOrCreate($request->validated() + [
                'mobile_user_id' => Auth::guard('mobile-user')->user()->id,
            ]);

        } else {
            MobileUserDetail::updateOrCreate($request->validated() + [
                'mobile_user_id' => Auth::guard('mobile-user')->user()->id,
            ]);
        }
        MobileUserDetail::updateOrCreate([
            'mobile_user_id' => $mobileUser->id,
        ] + $request->validated());

        return redirect()->route('digital-service');
    }
}
