@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान जारि गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title"> अनुदान जारि गर्नुहोस्</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ कृषक थप्नुहोस्</h4>
                        <a href="{{route('admin.grant.grant.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कृषक सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.grant.grant.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <fieldset>
                            <legend><h4 class="text-info">कार्यक्रम/क्रियाकलाप विवरण</h4></legend>
                            <h6 class="py-2">नोट: कृपया कार्यक्रम/क्रियाकलापको विवरण भर्दा ध्यान दिएर भर्नु होला ।</h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="fiscal_year_id" class="form-label">
                                        आर्थिक बर्ष *
                                    </label>
                                    <select name="fiscal_year_id"
                                            id="fiscal_year_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($fiscalYears as $fiscalYear)
                                            <option
                                                value="{{$fiscalYear->id}}" {{$fiscalYear->id==old('fiscal_year_id') ? 'selected' : ''}}>
                                                {{$fiscalYear->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fiscal_year_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grant_type_id" class="form-label">
                                        अनुदानको प्रकार *
                                    </label>
                                    <select name="grant_type_id"
                                            id="grant_type_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($grantTypes as $grantType)
                                            <option value="{{$grantType->id}}" {{$grantType->id==old('grant_type_id') ? 'selected' : ''}}>
                                                {{$grantType->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grant_type_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grant_program_id" class="form-label">
                                        कार्यक्रमको नाम *
                                    </label>
                                    <select name="grant_program_id"
                                            id="grant_program_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($grantPrograms as $grantProgram)
                                            <option value="{{$grantProgram->id}}" {{$grantProgram->id==old('grant_program_id') ? 'selected' : ''}}>
                                                {{$grantProgram->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grant_program_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grant_office_id" class="form-label">
                                        अनुदान दिने संस्था *
                                    </label>
                                    <select name="grant_office_id"
                                            id="grant_office_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($grantOffices as $grantOffice)
                                            <option value="{{$grantOffice->id}}" {{$grantOffice->id==old('grant_office_id') ? 'selected' : ''}}>
                                                {{$grantOffice->office_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grant_office_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="branch_id" class="form-label">
                                        शाखा *
                                    </label>
                                    <select
                                        name="branch_id"
                                        class="form-select"
                                        id="branch_id">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($branches as $branch)
                                            @if(count($branch->branches)>0)
                                                <optgroup label="{{$branch->branch_name}}">
                                                    @foreach($branch->branches as $sub_branch)
                                                        <option
                                                            {{$sub_branch->id==old('branch_id') ? 'selected' : ''}}
                                                            value="{{$sub_branch->id}}">
                                                            {{$sub_branch->branch_name}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option
                                                    {{$branch->id==old('branch_id') ? 'selected' : ''}}
                                                    value="{{$branch->id}}">
                                                    {{$branch->branch_name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('branch_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grant_amount" class="form-label">अनुदान रकम *</label>
                                    <input
                                        type="number"
                                        name="grant_amount"
                                        value="{{old('grant_amount')}}"
                                        class="form-control @error('grant_amount') is-invalid @enderror"
                                        id="grant_amount"
                                        placeholder="अनुदान रकम"
                                    />
                                    @error('grant_amount')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grant_for" class="form-label">
                                        अनुदानको लागि *
                                    </label>
                                    <select name="grant_for[]" multiple data-toggle="select2"
                                            id="grant_for" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach(\Modules\Grant\Enums\GranteeEnum::cases() as $grantee)
                                            <option
                                                value="{{$grantee->value}}">
                                                {{$grantee->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grant_for')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('grant_for.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="remarks" class="form-label">कैफियत</label>
                                    <input
                                        type="text"
                                        name="remarks"
                                        value="{{old('remarks')}}"
                                        class="form-control @error('remarks') is-invalid @enderror"
                                        id="remarks"
                                        placeholder="कैफियत"
                                    />
                                    @error('remarks')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


