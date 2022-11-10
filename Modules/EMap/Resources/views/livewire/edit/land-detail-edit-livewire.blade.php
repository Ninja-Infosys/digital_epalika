<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <div class="d-flex justify-content-end">
        <button class="btn btn-sm btn-primary rounded-pill waves-effect waves-light" wire:click.prevent="setEditForm"><i
                class="fa fa-pen px-2"></i>सम्पादन
        </button>
    </div>
    <fieldset>
        <legend>२. जग्गाको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.land_use_area"><b>२.१ भू-उपयोग्य क्षेत्र: </b></label>
                        <input type="text"
                               id="landDescription.land_use_area"
                               wire:model="landDescription.land_use_area"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.land_use_area')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.ward_no"><b>२.२ वडा नं: </b></label>
                        <input type="text"
                               id="landDescription.ward_no"
                               wire:model="landDescription.ward_no"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.ward_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.former_ward_no"><b>२.३ साविक वडा नं: </b></label>
                        <input type="text"
                               id="landDescription.former_ward_no"
                               wire:model="landDescription.former_ward_no"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.former_ward_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.tole"><b>२.४ टोलको नाम: </b></label>
                        <input type="text"
                               id="landDescription.tole"
                               wire:model="landDescription.tole"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.tole')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.street_code_no"><b>२.५ सडक कोड नं: </b></label>
                        <input type="text"
                               id="landDescription.street_code_no"
                               wire:model="landDescription.street_code_no"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.street_code_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="landDescription.plot_no"><b>२.६ जग्गा कित्ता नं: </b></label>
                        <input type="text"
                               id="landDescription.plot_no"
                               wire:model="landDescription.plot_no"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.plot_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>२.७ क्षेत्रफल </b>

                        {{'('}}
                        <input type="text"
                               id="landDescription.unit_value"
                               wire:model="landDescription.unit_value"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        <label
                            for="landDescription.unit_value">{{$setting->standardLandMeasurement->title ?? ''}}</label>
                        @error('landDescription.unit_value')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        {{')'}}
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="landDescription.percentage_of_area_covered_by_building">
                            <b>२.८ भवनले ढाक्ने
                                क्षेत्रफलको प्रतिशत (GCR): </b>
                        </label>
                        <input type="text"
                               id="landDescription.percentage_of_area_covered_by_building"
                               wire:model="landDescription.percentage_of_area_covered_by_building"
                               {{$editForm ? '' : 'disabled'}}
                        >
                        @error('landDescription.percentage_of_area_covered_by_building')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    @if($editForm)
        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary    ">Save</button>
        </div>
    @endif
</form>
