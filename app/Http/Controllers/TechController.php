<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function index()
    {
        return view('admin.tech_support.index');
    }
}
