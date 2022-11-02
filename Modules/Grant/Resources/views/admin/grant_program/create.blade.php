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
                        <li class="breadcrumb-item active">कार्यक्रमहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्यक्रमहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्यक्रम थप्नुहोस </h4>
                        <a href="{{route('admin.grant.grantProgram.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कार्यक्रम सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.grantProgram.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="fiscal_year_id" class="form-label">आर्थिक वर्ष *</label>
                                <select
                                    name="fiscal_year_id"
                                    class="form-control @error('fiscal_year_id') is-invalid @enderror"
                                    id="fiscal_year_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($fiscalYears as $fiscalYear)
                                        <option {{$fiscalYear->id==old('fiscal_year_id') ? 'selected' : ''}}
                                                value="{{$fiscalYear->id}}">
                                            {{$fiscalYear->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fiscal_year_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="program_name" class="form-label">कार्यक्रम शीर्षक *</label>
                                <input
                                    type="text"
                                    name="program_name"
                                    value="{{old('program_name')}}"
                                    class="form-control @error('program_name') is-invalid @enderror"
                                    id="program_name"
                                    placeholder="कार्यक्रम शीर्षक"
                                />
                                @error('program_name')
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
