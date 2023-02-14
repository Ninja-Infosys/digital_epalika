<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PinController extends Controller
{
    public function create()
    {
        return view('admin.pin');
    }
    public function store(StorePinRequest $request)
    {
        if (is_null(auth()->user()->pin )) {
            auth()->user()->update([
                'pin' => $request->input('pin')
            ]);
            return response()->json([
                'success' => true,
                'message' => 'कोड सफलतापूर्वक सेट गरियो'
            ]);
        } else {
            if (Hash::check($request->input('pin'),auth()->user()->pin)) {
                return response()->json([
                    'success' => true,
                    'message' => 'कोड सफलतापूर्वक अपडेट गरियो'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'कोड मिलेन'
            ]);
        }
    }

    public function checkPin(Request $request)
    {
        $request->validate([
            'pin'=>['required','integer']
        ]);
        return Hash::check($request->input('pin'),auth()->user()->pin);

    }

}
