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
                        <h4 class="header-title">योजना/कार्यक्रम दर्ता गर्नुहोस </h4>
                        <a href="{{route('admin.plan.project.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> योजना/कार्यक्रम हरू
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.project.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="project_name" class="form-label">योजना/कार्यक्रमको नाम *</label>
                                <input
                                    type="text"
                                    name="project_name"
                                    value="{{old('project_name')}}"
                                    class="form-control @error('project_name') is-invalid @enderror"
                                    id="project_name"
                                    placeholder="योजना/कार्यक्रमको नाम"
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
                                    value="{{old('registration_no')}}"
                                    class="form-control @error('registration_no') is-invalid @enderror"
                                    id="registration_no"
                                    placeholder="दर्ता नं."
                                />
                                @error('registration_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="plan_area_id" class="form-label">योजनाको क्षेत्र *</label>
                                <select
                                    name="plan_area_id"
                                    class="form-control @error('plan_area_id') is-invalid @enderror"
                                    id="plan_area_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($planAreas as $planArea)
                                        @if(count($planArea->planAreas)>0)
                                            <optgroup label="{{$planArea->area_name}}">
                                                @foreach($planArea->planAreas as $plan_sub_area)
                                                    <option
                                                        {{old('plan_area_id')==$plan_sub_area->id ? 'selected' : ''}}
                                                        value="{{$plan_sub_area->id}}">
                                                        {{$plan_sub_area->area_name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{old('plan_area_id')==$planArea->id ? 'selected' : ''}}
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
                                            {{old('project_status')==$projectStatus->value ? 'selected' : ''}}
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
                                <x-date-input-component
                                    nameNe="project_start_date" labelNe="आयोजना सुरु हुने मिति "
                                    nameEn="en_project_start_date" labelEn="Start Date"
                                    :getTodayDate="false"></x-date-input-component>
                            </div>
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    nameNe="project_completion_date" labelNe="आयोजना सम्पन्न हुने मिति"
                                    nameEn="en_project_completion_date" labelEn="Completion Date"
                                    :getTodayDate="false"></x-date-input-component>
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
                                                        {{old('plan_level_id')==$plan_sub_level->id ? 'selected' : ''}}
                                                        value="{{$plan_sub_level->id}}">
                                                        {{$plan_sub_level->level_name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{old('plan_level_id')==$planLevel->id ? 'selected' : ''}}
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
                                    name="ward_no"
                                    class="form-control @error('ward_no') is-invalid @enderror"
                                    id="ward_no" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($officeSetting->localBody->ward_no as $ward)
                                        <option
                                            {{old('ward_no')==$ward ? 'selected' : ''}}
                                            value="{{$ward}}">
                                            {{$ward}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ward_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="budget_source_id" class="form-label"> बजेटको श्रोत *</label>
                                <select
                                    name="budget_source_id"
                                    class="form-control @error('budget_source_id') is-invalid @enderror"
                                    id="budget_source_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($budgetSources as $budgetSource)
                                        <option
                                            {{old('budget_source_id')==$budgetSource ? 'selected' : ''}}
                                            value="{{$budgetSource->id}}">
                                            {{$budgetSource->source_name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('budget_source_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="budget_head_id" class="form-label">बजेट शिर्षक *</label>
                                <select
                                    name="budget_head_id"
                                    class="form-control @error('budget_head_id') is-invalid @enderror"
                                    id="budget_head_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($budgetHeads as $budgetHead)
                                        @if(count($budgetHead->budgetHeads)>0)
                                            <optgroup label="{{$budgetHead->title}}">
                                                @foreach($budgetHead->budgetHeads as $budget_sub_head)
                                                    <option
                                                        {{old('budget_head_id')==$budget_sub_head->id ? 'selected' : ''}}
                                                        value="{{$budget_sub_head->id}}">
                                                        {{$budget_sub_head->title}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option
                                                {{old('budget_head_id')==$budgetHead->id ? 'selected' : ''}}
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
                            <div class="col-md-4 mb-2">
                                <label for="allocated_amount" class="form-label">विनियोजित रकम </label>
                                <input
                                    type="number"
                                    name="allocated_amount"
                                    value="{{old('allocated_amount')}}"
                                    class="form-control @error('allocated_amount') is-invalid @enderror"
                                    id="allocated_amount"
                                    placeholder="विनियोजित रकम"
                                />
                                @error('allocated_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="project_venue" class="form-label">आयोजना स्थल </label>
                                <input
                                    type="text"
                                    name="project_venue"
                                    value="{{old('project_venue')}}"
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
                                    value="{{old('purpose')}}"
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
                                            {{old('operated_through')==$operatedThrough->value ? 'selected' : ''}}
                                            value="{{$operatedThrough->value}}">
                                            {{$operatedThrough->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('operated_through')
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
@endsection
