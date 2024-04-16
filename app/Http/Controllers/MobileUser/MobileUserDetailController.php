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


    public function store(StoreMobileDetailUserRequest $request)
{
$mobileUser = Auth::guard('mobile-user')->user()->load('mobileUserDetail');

    if ($mobileUser) {
        if ($request->hasFile('citizenship_front') && $mobileUser->mobileUserDetail->citizenship_front) {
            $this->deleteFile($mobileUser->mobileUserDetail->citizenship_front);
        }
        if ($request->hasFile('citizenship_back') && $mobileUser->mobileUserDetail->citizenship_back) {
            $this->deleteFile($mobileUser->mobileUserDetail->citizenship_back);
        }
        if ($request->hasFile('nec_certificate') && $mobileUser->mobileUserDetail->nec_certificate) {
            $this->deleteFile($mobileUser->mobileUserDetail->nec_certificate);
        }
        $mobileUserDetail = MobileUserDetail::updateOrCreate(
            ['mobile_user_id' => $mobileUser->mobileUserDetail->id],
            $request->validated()
        );
$mobileUserUpdatedData = [
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'phone' => $request->input('phone'),
    
];

if($request->hasFile('avatar')){
    $mobileUserUpdatedData['avatar'] = $request->file('avatar');
}
        $mobileUser->update($mobileUserUpdatedData);

        return back()->with('success', 'Mobile user details updated successfully.');
    } else {
        return "not found";
    }
}

}
