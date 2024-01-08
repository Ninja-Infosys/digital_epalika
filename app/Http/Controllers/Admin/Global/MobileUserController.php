<?php

namespace App\Http\Controllers\Admin\Global;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Http\Request;

class MobileUserController extends Controller
{
    public function index()
    {

        $mobileUsers = MobileUser::latest()->get();

        return view('admin.global.mobileUser.index', compact('mobileUsers'));
    }
}
