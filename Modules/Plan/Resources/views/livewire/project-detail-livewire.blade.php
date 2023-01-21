<form wire:submit.prevent="submitFormData">
    <h4 class="header-title border-bottom mb-2">आयोजनाको विवरण</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="project_name" class="form-label">योजना/कार्यक्रमको नाम *</label>
            <input
                type="text"
                wire:model="form.project_name"
                class="form-control @error('form.project_name') is-invalid @enderror"
                id="project_name"
                placeholder="योजना/कार्यक्रमको नाम"
            />
            @error('form.project_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="registration_no" class="form-label">दर्ता नं. *</label>
            <input
                type="text"
                wire:model="form.registration_no"
                class="form-control @error('form.registration_no') is-invalid @enderror"
                id="registration_no"
                placeholder="दर्ता नं."
            />
            @error('form.registration_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="plan_area_id" class="form-label">योजनाको क्षेत्र *</label>
            <select
                wire:model="form.plan_area_id"
                class="form-select @error('form.plan_area_id') is-invalid @enderror"
                id="plan_area_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($planAreas as $planArea)
                    @if(count($planArea->planAreas)>0)
                        <optgroup label="{{$planArea->area_name}}">
                            @foreach($planArea->planAreas as $plan_sub_area)
                                <option
                                    value="{{$plan_sub_area->id}}">
                                    {{$plan_sub_area->area_name}}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option
                            value="{{$planArea->id}}">
                            {{$planArea->area_name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('form.plan_area_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="project_status" class="form-label">योजनाको अबस्था *</label>
            <select
                wire:model="form.project_status"
                class="form-select @error('form.project_status') is-invalid @enderror"
                id="project_status">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach(\Modules\Plan\Enums\ProjectStatusEnum::cases() as $projectStatus)
                    <option
                        value="{{$projectStatus->value}}">
                        {{$projectStatus->label()}}
                    </option>
                @endforeach
            </select>
            @error('form.project_status')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="project_start_date" class="form-label">आयोजना सुरु हुने मिति *</label>
            <input
                type="text"
                wire:model="form.project_start_date"
                class="form-control @error('form.project_start_date') is-invalid @enderror"
                id="project_start_date"
                placeholder="आयोजना सुरु हुने मिति"
            />
            @error('form.project_start_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="project_completion_date" class="form-label">आयोजना सम्पन्न हुने मिति *</label>
            <input
                type="text"
                wire:model="form.project_completion_date"
                class="form-control @error('form.project_completion_date') is-invalid @enderror"
                id="project_completion_date"
                placeholder="आयोजना सम्पन्न हुने मिति"
            />
            @error('form.project_completion_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="plan_level_id" class="form-label">योजनाको स्तर *</label>
            <select
                wire:model="form.plan_level_id"
                class="form-select @error('form.plan_level_id') is-invalid @enderror"
                id="plan_level_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($planLevels as $planLevel)
                    @if(count($planLevel->planLevels)>0)
                        <optgroup label="{{$planLevel->level_name}}">
                            @foreach($planLevel->planLevels as $plan_sub_level)
                                <option
                                    value="{{$plan_sub_level->id}}">
                                    {{$plan_sub_level->level_name}}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option
                            value="{{$planLevel->id}}">
                            {{$planLevel->level_name}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('form.plan_level_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="ward_no" class="form-label"> वडा नं.</label>
            <select
                wire:model="form.ward_no"
                class="form-select @error('form.ward_no') is-invalid @enderror"
                multiple
                id="ward_no">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($officeSetting->localBody->ward_no as $ward)
                    <option
                        value="{{$ward}}">
                        {{$ward}}
                    </option>
                @endforeach
            </select>
            @error('form.ward_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="budget_source_id" class="form-label"> बजेटको श्रोत *</label>
            <select
                wire:model="form.budget_source_id"
                class="form-select @error('form.budget_source_id') is-invalid @enderror"
                id="budget_source_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($budgetSources as $budgetSource)
                    <option
                        value="{{$budgetSource->id}}">
                        {{$budgetSource->source_name}}
                    </option>
                @endforeach
            </select>
            @error('form.budget_source_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="budget_head_id" class="form-label">बजेट शिर्षक *</label>
            <select
                wire:model="form.budget_head_id"
                class="form-select @error('form.budget_head_id') is-invalid @enderror"
                id="budget_head_id">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach($budgetHeads as $budgetHead)
                    @if(count($budgetHead->budgetHeads)>0)
                        <optgroup label="{{$budgetHead->title}}">
                            @foreach($budgetHead->budgetHeads as $budget_sub_head)
                                <option
                                    value="{{$budget_sub_head->id}}">
                                    {{$budget_sub_head->title}}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option
                            value="{{$budgetHead->id}}">
                            {{$budgetHead->title}}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('form.budget_head_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="allocated_amount" class="form-label">विनियोजित रकम </label>
            <input
                type="number"
                wire:model="form.allocated_amount"
                class="form-control @error('form.allocated_amount') is-invalid @enderror"
                id="allocated_amount"
                placeholder="विनियोजित रकम"
            />
            @error('form.allocated_amount')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="project_venue" class="form-label">आयोजना स्थल </label>
            <input
                type="text"
                wire:model="form.project_venue"
                class="form-control @error('form.project_venue') is-invalid @enderror"
                id="project_venue"
                placeholder="आयोजना स्थल"
            />
            @error('form.project_venue')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="purpose" class="form-label">उद्देश्य</label>
            <input
                type="text"
                wire:model="form.purpose"
                class="form-control @error('form.purpose') is-invalid @enderror"
                id="purpose"
                placeholder="उद्देश्य"
            />
            @error('form.purpose')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="operated_through" class="form-label">खरिद बिधि *</label>
            <select
                wire:model="form.operated_through"
                class="form-select @error('form.operated_through') is-invalid @enderror"
                id="operated_through">
                <option value="">--- छान्नुहोस् ---</option>
                @foreach(\Modules\Plan\Enums\ProjectOperatedThroughEnum::cases() as $operatedThrough)
                    <option
                        value="{{$operatedThrough->value}}">
                        {{$operatedThrough->label()}}
                    </option>
                @endforeach
            </select>
            @error('form.operated_through')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="is_deadline_extended" class="form-label">आयोजनाको म्याद थप भएको ?</label>
            <select
                wire:model="form.is_deadline_extended"
                class="form-select @error('form.is_deadline_extended') is-invalid @enderror"
                id="is_deadline_extended">
                <option value="0"> नभएको</option>
                <option value="1"> भएको</option>
            </select>
            @error('form.is_deadline_extended')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2 {{!$form['is_deadline_extended'] ? 'd-none' : ''}}">
            <label for="extended_date" class="form-label">म्याद थप मिति </label>
            <input
                type="text"
                wire:model="form.extended_date"
                class="form-control @error('form.extended_date') is-invalid @enderror"
                id="extended_date"
                placeholder="म्याद थप मिति"
            />
            @error('form.extended_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <h4 class="header-title border-bottom mb-2">भौतिक तथा वित्तीय प्रगतिको विवरण</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="progress_spent_amount" class="form-label">वित्तीय प्रगति खर्च रकम *</label>
            <input
                type="number"
                wire:model="form.progress_spent_amount"
                class="form-control @error('form.progress_spent_amount') is-invalid @enderror"
                id="progress_spent_amount"
                placeholder="वित्तीय प्रगति खर्च रकम"
            />
            @error('form.progress_spent_amount')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_target" class="form-label">भौतिक प्रगति लक्ष्य परिमाण *</label>
            <input
                type="number"
                wire:model="form.physical_progress_target"
                class="form-control @error('form.physical_progress_target') is-invalid @enderror"
                id="physical_progress_target"
                placeholder="भौतिक प्रगति लक्ष्य परिमाण"
            />
            @error('form.physical_progress_target')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_completed" class="form-label">भौतिक प्रगति सम्पन्न परिमाण *</label>
            <input
                type="number"
                wire:model="form.physical_progress_completed"
                class="form-control @error('form.physical_progress_completed') is-invalid @enderror"
                id="physical_progress_completed"
                placeholder="भौतिक प्रगति सम्पन्न परिमाण"
            />
            @error('form.physical_progress_completed')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_unit" class="form-label">भौतिक प्रगति एकाइ *</label>
            <input
                type="text"
                wire:model="form.physical_progress_unit"
                class="form-control @error('form.physical_progress_unit') is-invalid @enderror"
                id="physical_progress_unit"
                placeholder="भौतिक प्रगति एकाइ"
            />
            @error('form.physical_progress_unit')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#project_start_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#project_start_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);

                        Livewire.emit('projectStartDateChanged', inputFieldDate, formattedDate);
                    }
                });

                $("#project_completion_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#project_completion_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_to_date").val(formattedDate);

                        Livewire.emit('projectCompletionDateChanged', inputFieldDate, formattedDate);
                    }
                });

                $("#extended_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#extended_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_to_date").val(formattedDate);

                        Livewire.emit('extendedDateChanged', inputFieldDate, formattedDate);
                    }
                });

                // let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                // let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                // Livewire.emit('fromDateChanged', todayBsDate, todayAdDate);
                // Livewire.emit('toDateChanged', todayBsDate, todayAdDate);
            });
        </script>
    @endpush
@endonce
