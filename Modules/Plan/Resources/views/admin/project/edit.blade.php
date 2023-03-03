@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">योजनाहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">योजनाहरु</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">आयोजनाको विवरण सम्पादन गर्नुहोस </h4>
                        <a href="{{route('admin.plan.project.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> योजना/कार्यक्रम हरू
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.plan.project.update',$project)}}" method="post">
                        @csrf
                        @method('PUT')
                        <h4 class="header-title border-bottom mb-2">आयोजनाको विवरण</h4>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="project_name" class="form-label">योजना/कार्यक्रमको नाम *</label>
                                <input
                                    type="text"
                                    name="project_name"
                                    value="{{old('project_name',$project->project_name)}}"
                                    class="form-control @error('project_name') is-invalid @enderror"
                                    id="project_name"
                                    placeholder="योजना/कार्यक्रमको नाम"
                                    required
                                />
                                @error('project_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="registration_no" class="form-label">दर्ता नं. *</label>
                                <input
                                    type="text"
                                    name="registration_no"
                                    value="{{old('registration_no',$project->registration_no)}}"
                                    class="form-control @error('registration_no') is-invalid @enderror"
                                    id="registration_no"
                                    placeholder="दर्ता नं."
                                    required
                                />
                                @error('registration_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="expense_head_id" class="form-label">खर्चको किसिम *</label>
                                <select
                                    name="expense_head_id"
                                    class="form-control @error('expense_head_id') is-invalid @enderror"
                                    id="expense_head_id" data-toggle="select2" data-width="100%" required>
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($expenseHeads as $expenseHead)
                                        <option
                                            {{old('expense_head_id',$project->expense_head_id)==$expenseHead->id ? 'selected' : ''}}
                                            value="{{$expenseHead->id}}">
                                            {{$expenseHead->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('expense_head_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="plan_area_id" class="form-label">योजनाको क्षेत्र *</label>
                                <select
                                    name="plan_area_id"
                                    class="form-control @error('plan_area_id') is-invalid @enderror"
                                    id="plan_area_id" data-toggle="select2" data-width="100%" required>
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($planAreas as $planArea)
                                        @if(count($planArea->planAreas)>0)
                                            <optgroup label="{{$planArea->area_name}}">
                                                @foreach($planArea->planAreas as $plan_sub_area)
                                                    <option
                                                        {{old('plan_area_id',$project->plan_area_id)==$plan_sub_area->id ? 'selected' : ''}}
                                                        value="{{$plan_sub_area->id}}">
                                                        {{$plan_sub_area->area_name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{old('plan_area_id',$project->plan_area_id)==$planArea->id ? 'selected' : ''}}
                                                value="{{$planArea->id}}">
                                                {{$planArea->area_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('plan_area_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="project_status" class="form-label">योजनाको अबस्था *</label>
                                <select
                                    name="project_status"
                                    class="form-control @error('project_status') is-invalid @enderror"
                                    id="project_status" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach(\Modules\Plan\Enums\ProjectStatusEnum::cases() as $projectStatus)
                                        <option
                                            {{old('project_status',$project->project_status->value)==$projectStatus->value ? 'selected' : ''}}
                                            value="{{$projectStatus->value}}">
                                            {{$projectStatus->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_status')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="plan_level_id" class="form-label">योजनाको स्तर *</label>
                                <select
                                    name="plan_level_id"
                                    class="form-control @error('plan_level_id') is-invalid @enderror"
                                    id="plan_level_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($planLevels as $planLevel)
                                        @if(count($planLevel->planLevels)>0)
                                            <optgroup label="{{$planLevel->level_name}}">
                                                @foreach($planLevel->planLevels as $plan_sub_level)
                                                    <option
                                                        {{old('plan_level_id',$project->plan_level_id)==$plan_sub_level->id ? 'selected' : ''}}
                                                        value="{{$plan_sub_level->id}}">
                                                        {{$plan_sub_level->level_name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{old('plan_level_id',$project->plan_level_id)==$planLevel->id ? 'selected' : ''}}
                                                value="{{$planLevel->id}}">
                                                {{$planLevel->level_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('plan_level_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="ward_no" class="form-label"> वडा नं.</label>
                                <select
                                    name="ward_no[]"
                                    class="form-control @error('ward_no') is-invalid @enderror"
                                    multiple
                                    id="ward_no" data-toggle="select2" data-width="100%">
                                    <option disabled>--- छान्नुहोस् ---</option>
                                    @foreach($officeSetting->localBody->ward_no as $ward)
                                        <option
                                            {{in_array($ward,$project->ward_no) ? 'selected' : ''}}
                                            value="{{$ward}}">
                                            {{$ward}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ward_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-7 mb-2">
                                <label for="budget_head_id" class="form-label">बजेट शिर्षक *</label>
                                <select
                                    name="budget_head_id[]"
                                    class="form-control @error('budget_head_id') is-invalid @enderror"
                                    id="budget_head_id" data-toggle="select2" data-width="100%" multiple>
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($budgetHeads as $budgetHead)
                                        @if(count($budgetHead->budgetHeads)>0)
                                            <optgroup label="{{$budgetHead->title}}">
                                                @foreach($budgetHead->budgetHeads as $budget_sub_head)
                                                    <option
                                                        {{in_array($budget_sub_head->id,$project->projectAllocatedAmounts->pluck('budget_head_id')->toArray()) ? 'selected' : ''}}
                                                        value="{{$budget_sub_head->id}}">
                                                        {{$budget_sub_head->title}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{in_array($budgetHead->id,$project->projectAllocatedAmounts->pluck('budget_head_id')->toArray()) ? 'selected' : ''}}
                                                value="{{$budgetHead->id}}">
                                                {{$budgetHead->title}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('budget_head_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div id="allocated-amounts" class="row">
                                @foreach($project->projectAllocatedAmounts as $key=>$projectAllocatedAmount)
                                    <div class="col-md-4 mb-2">
                                        <input type="hidden" name="projectAllocatedAmounts[{{$key}}][id]" value="{{$projectAllocatedAmount->id}}">
                                        <input type="hidden" name="projectAllocatedAmounts[{{$key}}][budget_head_id]" value="{{$projectAllocatedAmount->budget_head_id}}">
                                        <label for="projectAllocatedAmounts{{$key}}" class="form-label">{{$projectAllocatedAmount->budgetHead->title??''}} *</label>
                                        <input
                                            type="number"
                                            name="projectAllocatedAmounts[{{$key}}][amount]"
                                            value="{{$projectAllocatedAmount->amount}}"
                                            class="form-control"
                                            id="projectAllocatedAmounts{{$key}}"
                                        />
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="project_venue" class="form-label">आयोजना स्थल </label>
                                <input
                                    type="text"
                                    name="project_venue"
                                    value="{{old('project_venue',$project->project_venue)}}"
                                    class="form-control @error('project_venue') is-invalid @enderror"
                                    id="project_venue"
                                    placeholder="आयोजना स्थल"
                                />
                                @error('project_venue')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="purpose" class="form-label">उद्देश्य</label>
                                <input
                                    type="text"
                                    name="purpose"
                                    value="{{old('purpose',$project->purpose)}}"
                                    class="form-control @error('purpose') is-invalid @enderror"
                                    id="purpose"
                                    placeholder="उद्देश्य"
                                />
                                @error('purpose')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="operated_through" class="form-label">खरिद बिधि *</label>
                                <select
                                    name="operated_through"
                                    class="form-control @error('operated_through') is-invalid @enderror"
                                    id="operated_through" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach(\Modules\Plan\Enums\ProjectOperatedThroughEnum::cases() as $operatedThrough)
                                        <option
                                            {{old('operated_through',$project->operated_through->value)==$operatedThrough->value ? 'selected' : ''}}
                                            value="{{$operatedThrough->value}}">
                                            {{$operatedThrough->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('operated_through')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="first_quarterly_amount" class="form-label">पहिलो चौमासिक आर्थिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="first_quarterly_amount"
                                    value="{{old('first_quarterly_amount', $project->first_quarterly_amount)}}"
                                    class="form-control @error('first_quarterly_amount') is-invalid @enderror"
                                    id="first_quarterly_amount"
                                    placeholder="पहिलो चौमासिक आर्थिक लक्ष्य"
                                />
                                @error('first_quarterly_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="first_quarterly_goal" class="form-label">पहिलो चौमासिक भौतिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="first_quarterly_goal"
                                    value="{{old('first_quarterly_goal', $project->first_quarterly_goal)}}"
                                    class="form-control @error('first_quarterly_goal') is-invalid @enderror"
                                    id="first_quarterly_goal"
                                    placeholder="पहिलो चौमासिक भौतिक लक्ष्य"
                                />
                                @error('first_quarterly_goal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="second_quarterly_amount" class="form-label">दोश्रो चौमासिक आर्थिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="second_quarterly_amount"
                                    value="{{old('second_quarterly_amount', $project->second_quarterly_amount)}}"
                                    class="form-control @error('second_quarterly_amount') is-invalid @enderror"
                                    id="second_quarterly_amount"
                                    placeholder="दोश्रो चौमासिक आर्थिक लक्ष्य"
                                />
                                @error('second_quarterly_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="second_quarterly_goal" class="form-label">दोश्रो चौमासिक भौतिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="second_quarterly_goal"
                                    value="{{old('second_quarterly_goal', $project->second_quarterly_goal)}}"
                                    class="form-control @error('second_quarterly_goal') is-invalid @enderror"
                                    id="second_quarterly_goal"
                                    placeholder="दोश्रो चौमासिक भौतिक लक्ष्य"
                                />
                                @error('second_quarterly_goal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="third_quarterly_amount" class="form-label">तेश्रो चौमासिक आर्थिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="third_quarterly_amount"
                                    value="{{old('third_quarterly_amount', $project->third_quarterly_amount)}}"
                                    class="form-control @error('third_quarterly_amount') is-invalid @enderror"
                                    id="third_quarterly_amount"
                                    placeholder="तेश्रो चौमासिक आर्थिक लक्ष्य"
                                />
                                @error('third_quarterly_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="third_quarterly_goal" class="form-label">तेश्रो चौमासिक भौतिक लक्ष्य</label>
                                <input
                                    type="number"
                                    name="third_quarterly_goal"
                                    value="{{old('third_quarterly_goal', $project->third_quarterly_goal)}}"
                                    class="form-control @error('third_quarterly_goal') is-invalid @enderror"
                                    id="third_quarterly_goal"
                                    placeholder="तेश्रो चौमासिक भौतिक लक्ष्य"
                                />
                                @error('third_quarterly_goal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // $(document).ready(() => {
            //     const budgetHeadSelect = $('#budget_head_id');
            //     const allocatedAmountsContainer = $('#allocated-amounts');
            //     let allocatedAmounts = {}; // store allocated amounts for each option
            //
            //     // loop through existing input fields and store their values in allocatedAmounts
            //     allocatedAmountsContainer.find('input[name^="projectAllocatedAmounts"]').each((index, inputField) => {
            //         const budgetHeadId = $(inputField).siblings('input[name$="[budget_head_id]"]').val();
            //         allocatedAmounts[budgetHeadId] = $(inputField).val();
            //     });
            //
            //     budgetHeadSelect.on('change', setProjectAllocatedAmountInputs);
            //
            //     function setProjectAllocatedAmountInputs() {
            //         const selectedOptions = budgetHeadSelect.find('option:selected');
            //
            //         selectedOptions.each((index, option) => {
            //             const budgetHeadId = $(option).val();
            //
            //             // check if input fields already exist for this option
            //             const existingFields = $(`input[name^="projectAllocatedAmounts"][data-budget-head-id="${budgetHeadId}"]`);
            //
            //             if (existingFields.length) {
            //                 const amountInput = existingFields.filter('[name$="[amount]"]');
            //
            //                 // update existing input field value to stored value (if it exists and input value is empty)
            //                 if (allocatedAmounts.hasOwnProperty(budgetHeadId) && !amountInput.val()) {
            //                     amountInput.val(allocatedAmounts[budgetHeadId]['amount']);
            //                 }
            //             } else {
            //                 // create new input fields
            //                 const div = $('<div>').addClass('col-md-4 mb-2');
            //                 const label = $('<label>').addClass('form-label');
            //                 label.attr('for', `projectAllocatedAmounts${index}`);
            //                 label.text(`${$(option).text()} *`);
            //
            //                 let amount = 0; // default amount is 0
            //
            //                 // check if allocated amount exists for this option
            //                 if (allocatedAmounts.hasOwnProperty(budgetHeadId)) {
            //                     amount = allocatedAmounts[budgetHeadId]['amount'];
            //                 }
            //
            //                 const amountInput = $('<input>').attr({
            //                     type: 'number',
            //                     min: 0,
            //                     placeholder: $.trim($(option).text()),
            //                     id: `projectAllocatedAmounts${index}`,
            //                     name: `projectAllocatedAmounts[${index}][amount]`,
            //                     'data-budget-head-id': budgetHeadId,
            //                     value: amount // set input value to stored amount
            //                 }).addClass('form-control');
            //
            //                 const budgetHeadInput = $('<input>').attr({
            //                     type: 'hidden',
            //                     name: `projectAllocatedAmounts[${index}][budget_head_id]`,
            //                     value: budgetHeadId,
            //                 });
            //
            //                 const idInput = $('<input>').attr({
            //                     type: 'hidden',
            //                     name: `projectAllocatedAmounts[${index}][id]`,
            //                     value: allocatedAmounts[budgetHeadId]['id'] // set ID value to stored ID
            //                 });
            //
            //                 // update stored amount when input value changes
            //                 amountInput.on('input', () => {
            //                     allocatedAmounts[budgetHeadId]['amount'] = amountInput.val();
            //                 });
            //
            //                 div.append(label);
            //                 div.append(amountInput);
            //                 div.append(budgetHeadInput);
            //                 div.append(idInput);
            //
            //                 const existingDiv = allocatedAmountsContainer.find(`div[data-budget-head-id="${budgetHeadId}"]`);
            //                 if (existingDiv.length) {
            //                     existingDiv.replaceWith(div);
            //                 } else {
            //                     allocatedAmountsContainer.append(div);
            //                 }
            //             }
            //         });
            //     }
            // });
            $(document).ready(() => {
                const budgetHeadSelect = $('#budget_head_id');
                const allocatedAmountsContainer = $('#allocated-amounts');
                let allocatedAmounts = {}; // store allocated amounts for each option
                budgetHeadSelect.on('change', () => {
                    setProjectAllocatedAmountInputs();
                });
                function setProjectAllocatedAmountInputs() {
                    const selectedOptions = budgetHeadSelect.find('option:selected').toArray();
                    const existingOptions = allocatedAmountsContainer.children('.dynamic-option').toArray();

                    const newOptions = selectedOptions.filter(option => !existingOptions.some(div => div.querySelector('input[type="hidden"]').value === option.value));

                    allocatedAmountsContainer.append(newOptions.map((option, index) => {
                        const div = $('<div>').addClass('col-md-4 mb-2 dynamic-option');
                        const label = $('<label>').addClass('form-label');
                        label.attr('for', `projectAllocatedAmounts${index}`);
                        label.text(`${$(option).text()} *`);

                        const budgetHeadId = $(option).val();
                        let amount = 0; // default amount is 0

                        // check if allocated amount exists for this option
                        if (allocatedAmounts.hasOwnProperty(budgetHeadId)) {
                            amount = allocatedAmounts[budgetHeadId];
                        }

                        const amountInput = $('<input>').attr({
                            type: 'number',
                            min: 0,
                            placeholder: $.trim($(option).text()),
                            id: `projectAllocatedAmounts${index}`,
                            name: `projectAllocatedAmounts[${index}][amount]`,
                            value: amount // set input value to stored amount
                        }).addClass('form-control');

                        const budgetHeadInput = $('<input>').attr({
                            type: 'hidden',
                            name: `projectAllocatedAmounts[${index}][budget_head_id]`,
                            value: budgetHeadId,
                        });

                        // update stored amount when input value changes
                        amountInput.on('input', () => {
                            allocatedAmounts[budgetHeadId] = amountInput.val();
                        });

                        div.append(label);
                        div.append(amountInput);
                        div.append(budgetHeadInput);

                        return div;
                    }));

                    existingOptions.filter(div => !selectedOptions.some(option => div.querySelector('input[type="hidden"]').value === option.value)).forEach(div => $(div).remove());
                }

            });
        </script>
    @endpush
@endsection
