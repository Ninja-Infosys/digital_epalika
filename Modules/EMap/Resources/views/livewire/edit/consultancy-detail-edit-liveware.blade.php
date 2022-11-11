<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <div class="d-flex justify-content-end my-2">

        <div>
            <button class="btn btn-sm btn-primary rounded-pill waves-effect waves-light" wire:click.prevent="setEditForm"><i class="fa fa-pen px-2"></i>सम्पादन</button>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div>

            <div>
                @if($signatureUrl || $applyMap['consultant_signature'])
                    <div>
                        <img src="{{ $applyMap['consultant_signature']?->temporaryUrl() ??$signatureUrl ?? ''}}" alt="" width="100">
                    </div>
                @endif
                <input type="file"
                       wire:model="applyMap.consultant_signature"
                       id="applyMap.consultant_signature"
                    {{$editForm ? '' : 'disabled'}}
                >
            </div>
            <div class="px-5">
                <label
                    for="applyMap.consultant_signature">
                    <b>(कन्सल्टेन्ट इंन्जिनियरको सहि): </b>
                </label>
            </div>
            @error('applyMap.consultant_signature')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_name">
                    <b>नाम: </b>
                </label>
                <input type="text"
                       wire:model="applyMap.consultant_name"
                        {{$editForm ? '' : 'disabled'}}
                       id="applyMap.consultant_name">
            </div>
            @error('applyMap.consultant_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_mobile_no"><b>मोबाइल नं.: </b></label>
                <input type="text"
                       wire:model="applyMap.consultant_mobile_no"
                       id="applyMap.consultant_mobile_no"
                        {{$editForm ? '' : 'disabled'}}
                >
            </div>
            @error('applyMap.consultant_mobile_no')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_nec_no"><b>एन. ई. सी. नं: </b></label>
                <input type="text"
                       wire:model="applyMap.consultant_nec_no"
                       id="applyMap.consultant_nec_no"
                        {{$editForm ? '' : 'disabled'}}
                >
            </div>
            @error('applyMap.consultant_nec_no')
            <p class="text-danger">{{$message}}</p>
            @enderror

        </div>
    </div>
    @if($editForm)
        <div class="my-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary rounded-pill waves-effect waves-light "><i
                    class="fa fa-save px-1"></i>पेश गर्नुहोस्
            </button>
        </div>
    @endif
</form>
