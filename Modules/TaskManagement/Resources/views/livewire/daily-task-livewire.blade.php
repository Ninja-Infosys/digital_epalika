<form wire:submit.prevent="submitFormData">
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="date">मिति *</label>
            <input type="text"
                   wire:model="form.date" class="form-control" id="date" placeholder="मिति">
            @error('form.date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="branch_id" class="form-label">शाखा *</label>
            <select
                wire:model="form.branch_id"
                class="form-select @error('branch_id') is-invalid @enderror"
                id="branch_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($branches as $branch)
                    @if(count($branch->branches)>0)
                        <optgroup label="{{$branch->branch_name}}">
                            @foreach($branch->branches as $sub_branch)
                                <option
                                        value="{{$sub_branch->id}}">
                                    {{$sub_branch->branch_name}}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option
                                value="{{$branch->id}}">
                            {{$branch->branch_name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('form.branch_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="branch_id" class="form-label">शाखाहरु अनुसार कार्यहरू  *</label>
            <select
                wire:model="form.task_category_id"
                class="form-select @error('task_category_id') is-invalid @enderror"
                id="branch_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($taskCategories as $taskCategory)
                <option value="{{$taskCategory->id}}">
                    {{$taskCategory->title}}
                </option>
                @endforeach
            </select>
            @error('form.task_category_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="branch_id" class="form-label">कार्य विभाजन  *</label>
            <select
                wire:model="form.task_division_id"
                class="form-select @error('branch_id') is-invalid @enderror"
                id="branch_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($taskDivisions as $taskDivision)
                <option value="{{$taskDivision->id}}">
                    {{$taskDivision->title}}
                </option>
                @endforeach
            </select>
            @error('form.task_division_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="documents" class="form-label">कागजातहरू (Multiple)</label>
            <input type="file" wire:model="form.documents" id="documents" multiple class="form-control">
            @error('form.documents')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            @error('form.documents*')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="remarks" class="form-label">कैफियत</label>
            <textarea class="form-control" wire:model="form.remarks" id="remarks" rows="5"></textarea>
            @error('form.remarks')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        पेश गर्नुहोस्
    </button>
</form>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
    @endpush
@endonce
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#date").nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                onChange: function () {
                    let inputFieldDate = $("#date").val();
                    let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                    let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                    $("#en_date").val(formattedDate);

                    Livewire.emit('postAdded', inputFieldDate, formattedDate);
                }
            });

            let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
            let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
            Livewire.emit('postAdded', todayBsDate, todayAdDate);
        });
    </script>
@endpush
