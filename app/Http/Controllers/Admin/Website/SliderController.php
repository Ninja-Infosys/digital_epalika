<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Slider\StoreSliderRequest;
use App\Models\Website\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.website.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.website.slider.create');
    }

    public function store(StoreSliderRequest $request)
    {
        //
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider)
    {
        //
    }

    public function update(Request $request, Slider $slider)
    {
        //
    }

    public function destroy(Slider $slider)
    {
        //
    }
}
