<?php

namespace App\Http\Controllers\Admin\Global;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MobileUser\StoreMobileUserRequest;
use App\Models\MobileUser;
use Illuminate\Support\Facades\DB;

class MobileUserController extends Controller
{
    public function index()
    {

        $mobileUsers = MobileUser::latest()->get();

        return view('admin.global.mobileUser.index', compact('mobileUsers'));
    }

    public function create()
    {
        return view('admin.global.mobileUser.create');

    }

    public function store(StoreMobileUserRequest $request)
    {
        $mobileUser = DB::transaction(function () use ($request) {
            $mobileUser = MobileUser::create($request->validated());

            $mobileUser->mobileUserDetail()->create($request->validated());

            return $mobileUser;
        });
        if ($request->ajax()) {
            return response()->json([
                'data' => [
                    'personal_detail_id' => $mobileUser->id,
                    'name' => $mobileUser->name,
                ],
                'message' => 'व्यक्तिगत विवरण सफलतापूर्वक थपियो !',
            ]);
        }
        toast('सेवाग्राही सफलतापूर्वक थपियो', 'success');

        return $mobileUser;
    }

    public function updateLoginStatus(MobileUser $mobileUser)
    {
        DB::transaction(function () use ($mobileUser) {
            $mobileUser->update([
                'is_active' => ! $mobileUser->is_active,
            ]);
        });
        toast('सेवाग्राहीलाइ लाग-इन गर्न दिने', 'success');

        return back();
    }

    public function show(MobileUser $mobileUser)
    {
        $mobileUser->load('mobileUserDetail');

        return view('admin.global.mobileUser.show', compact('mobileUser'));
    }

    public function destroy(MobileUser $mobileUser)
    {
        $mobileUser->delete();
        toast('सेवाग्राही सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
