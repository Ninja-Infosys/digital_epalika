<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="submitFormData">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="date">मिति</label>
                            <input type="text"
                                   wire:model="form.date" class="form-control" id="date" placeholder="मिति">
                            @error('form.date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="branch_id" class="form-label">शाखा</label>
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
                        <div class="col-md-3 mb-2">
                            <label for="branch_id" class="form-label">शाखाहरु अनुसार कार्यहरू</label>
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
                        <div class="col-md-3 mb-2">
                            <label for="branch_id" class="form-label">कार्य विभाजन *</label>
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
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>मिति</th>
                            <th>मुख्य कार्य</th>
                            <th>कार्य</th>
                            <th>कैफियत</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>gdfsg</td>
                            <td>gdsfg</td>
                            <td>gsdfg</td>
                            <td>gdsfg</td>
                            <td>gsdfg</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
