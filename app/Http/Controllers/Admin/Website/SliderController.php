<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Slider\StoreSliderRequest;
use App\Http\Requests\Website\Slider\UpdateSliderRequest;
use App\Models\Website\Slider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class SliderController extends Controller
{
    public function index(): Factory|View|Application
    {

        abort_if(
            Gate::denies('slider_access'),
            403,
            'You are not allowed to access this resource'
        );

        $sliders = Slider::all();
        return view('admin.website.slider.index', compact('sliders'));
    }

    public function create(): Factory|View|Application
    {
        abort_if(
            Gate::denies('slider_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.slider.create');
    }

    public function store(StoreSliderRequest $request): RedirectResponse
    {

        abort_if(
            Gate::denies('slider_create'),
            403,
            'You are not allowed to access this resource'
        );
        Slider::create($request->validated());

        toast('स्लाइडर सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(Slider $slider): Factory|View|Application
    {

        abort_if(
            Gate::denies('slider_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.slider.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider): Redirector|Application|RedirectResponse
    {
        abort_if(
            Gate::denies('slider_edit'),
            403,
            'You are not allowed to access this resource'
        );

        if ($request->hasFile('image') && $slider->image) {
            $this->deleteFile($slider->image);
        }

        $slider->update($request->validated());

        toast('स्लाइडर सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.website.slider.index'));
    }

    public function destroy(Slider $slider): RedirectResponse
    {

        abort_if(
            Gate::denies('slider_delete'),
            403,
            'You are not allowed to access this resource'
        );
        if ($slider->image) {
            $this->deleteFile($slider->image);
        }
        $slider->delete();
        toast('स्लाइडर सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
