<form  method="post">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="complainant_province_id" class="form-label">Province *</label>
                    <select wire:model="form.complainant_province_id" class="form-control" id="complainant_province_id">
                        <option value="">select Province</option>
                        @foreach($provinces as $province)
                            <option
                                value="{{$province->id}}">{{$province->province}}</option>
                        @endforeach
                    </select>
                    @error('form.complainant_province_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="photo" class="form-label">फोटो </label>
                    <input type="file"
                           name="photo"
                           class="form-control @error('photo') is-invalid @enderror"
                           id="photo"
                           alt="hello"/>
                    @error('photo')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
