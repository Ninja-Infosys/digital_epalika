<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\PhotoGallery;
use Modules\DigitalBoard\Http\Requests\PhotoGallery\StorePhotoGalleryRequest;
use Modules\DigitalBoard\Http\Requests\PhotoGallery\UpdatePhotoGalleryRequest;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photoGalleries = PhotoGallery::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }

            if (!empty(auth()->user()->ward_no)) {
                $authWardNo = auth()->user()->ward_no;

                // Check if $authWardNo is an array
                if (is_array($authWardNo)) {
                    foreach ($authWardNo as $ward) {
                        $q->orWhereRaw("FIND_IN_SET('$ward', ward) > 0");
                    }
                } else {
                    // If it's not an array, use it directly
                    $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
                }
            }
        })->get();

        return view('digitalboard::admin.photoGallery.index', compact('photoGalleries'));
    }

    public function create()
    {
        return view('digitalboard::admin.photoGallery.create');
    }

    public function store(StorePhotoGalleryRequest $request)
    {

        PhotoGallery::create($request->validated()+['ward'=>auth()->user()->ward_no,'user_id'=>auth()->id()]);
        toast('फोटो ग्यालरी सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        // return view('digitalboard::show');
    }

    public function edit(PhotoGallery $photoGallery)
    {
        return view('digitalboard::admin.photoGallery.edit', compact('photoGallery'));
    }

    public function update(UpdatePhotoGalleryRequest $request, PhotoGallery $photoGallery)
    {
        $photoGallery->update($request->validated()+['ward'=>auth()->user()->ward_no,'user_id'=>auth()->id()]);

        toast('फोटो ग्यालरी सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.digitalBoard.photoGallery.index'));
    }

    public function destroy(PhotoGallery $photoGallery)
    {
        $photoGallery->delete();

        toast('फोटो ग्यालरी सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
