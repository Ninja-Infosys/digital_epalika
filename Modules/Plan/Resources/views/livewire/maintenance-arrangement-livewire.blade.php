<form wire:submit.prevent="submitFormData">
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="office_name" class="form-label">जिम्मा लिने समिती संस्थाको नाम *</label>
            <input
                type="text"
                wire:model="form.office_name"
                class="form-control @error('form.office_name') is-invalid @enderror"
                id="office_name"
                placeholder="जिम्मा लिने समिती संस्थाको नाम"
            />
            @error('form.office_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="public_service" class="form-label">जनश्रमदान</label>
            <input
                type="number"
                wire:model="form.public_service"
                class="form-control @error('form.public_service') is-invalid @enderror"
                id="public_service"
                placeholder="जनश्रमदान"
            />
            @error('form.public_service')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="service_fee" class="form-label">सेवा शुल्क</label>
            <input
                type="number"
                wire:model="form.service_fee"
                class="form-control @error('form.service_fee') is-invalid @enderror"
                id="service_fee"
                placeholder="सेवा शुल्क"
            />
            @error('form.service_fee')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="from_fee_donation" class="form-label">दस्तुर, चन्दाबाट</label>
            <input
                type="number"
                wire:model="form.from_fee_donation"
                class="form-control @error('form.from_fee_donation') is-invalid @enderror"
                id="from_fee_donation"
                placeholder="दस्तुर, चन्दाबाट"
            />
            @error('form.from_fee_donation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="others" class="form-label">अन्य केहि भए</label>
            <input
                type="number"
                wire:model="form.others"
                class="form-control @error('form.others') is-invalid @enderror"
                id="others"
                placeholder="अन्य केहि भए"
            />
            @error('form.others')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
