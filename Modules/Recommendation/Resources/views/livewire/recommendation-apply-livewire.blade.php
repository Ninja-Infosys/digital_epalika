<form action="">
    <fieldset class="mb-3">
        <legend>सिफारिस विवरण</legend>
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="form.mobile_user_id">सेवाग्राहीको विवरण</label>
                <select name="mobile_user_id" class="form-select select2" id="form.mobile_user_id" wire:model="form.mobile_user_id" data-wireModel="form.mobile_user_id">
                    <option value="">-- सेवाग्राही छान्नुहोस् --</option>
                    @foreach($mobileUsers as $mobileUser)
                        <option value="{{$mobileUser->id}}">{{$mobileUser->tax_payer_id}} {{$mobileUser->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-success btn-sm">पेश गर्नुहोस</button>

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            const selector = $(".select2");
            selector.select2({
                theme: "classic",
                allowClear: true
            })
                .on('change', function (e) {
                    Livewire.emit('changeFormData', e.target.id, e.target.value)
            })
        </script>
    @endpush
</form>
