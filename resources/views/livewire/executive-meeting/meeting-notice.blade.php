<div class="row">
    @foreach(config('defaults.meeting_types') as $key=>$meeting_type)
        <div class="col-sm-3">
            <div class="form-check">
                <input type="radio"
                       class="form-check-input"
                       name="type"
                       wire:model="type"
                       value="{{$meeting_type}}"
                       id="meeting_type{{$meeting_type}}">
                <label class="form-check-label mb-2"
                       for="meeting_type{{$meeting_type}}">{{$key}}</label>
            </div>
        </div>
    @endforeach
    <div class="col-sm-6">
        @switch($type)
            @case('Random')
                <input type="text" name="meeting_at" wire:model="meeting_at" class="form-control form-control-sm"
                       placeholder="मिति">
                @break
            @case('Weekly')
                <select name="meeting_at" wire:model="meeting_at" id="meeting_at" class="form-control form-control-sm">
                    <option value="">बार छान्नुहोस्</option>
                    @foreach(config('defaults.days') as $key=>$day)
                        <option value="{{$day}}">{{$key}}</option>
                    @endforeach
                </select>
                @break
            @case('Monthly')
                <input type="number" name="meeting_at" wire:model="meeting_at" class="form-control form-control-sm"
                       placeholder="मासिक">
                @break
            @case('Yearly')
                <input type="text" name="meeting_at" wire:model="meeting_at" class="form-control form-control-sm"
                       placeholder="बार्षिक">
                @break
            @default
        @endswitch
    </div>
</div>
