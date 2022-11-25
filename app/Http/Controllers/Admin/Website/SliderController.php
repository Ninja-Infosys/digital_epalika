<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Slider\StoreSliderRequest;
use App\Http\Requests\Website\Slider\UpdateSliderRequest;
use App\Models\Website\Slider;

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
        Slider::create($request->validated());

        toast('स्लाइडर सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(Slider $slider)
    {
        return view('admin.website.slider.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($request->hasFile('image') && $slider->image) {
            $this->deleteFile($slider->image);
        }

        $slider->update($request->validated());

        toast('स्लाइडर सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.website.slider.index'));
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            $this->deleteFile($slider->image);
        }
        $slider->delete();
        toast('स्लाइडर सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
