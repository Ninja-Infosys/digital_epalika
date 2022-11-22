@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.mapSetting.index')}}">कार्यालय सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">नक्सा सेटिङ सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्यालय सेटिङ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्सा सेटिङ सम्पादन गर्नुहोस्</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('emap.admin.mapSetting.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>नक्सा दरखास्त फारम </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="land_measurement_id" class="form-label">भूमि मापन एकाइ</label>
                                    <select name="land_measurement_id" id="land_measurement_id"
                                            class="form-control @error('land_measurement_id') is-invalid @enderror">
                                        <option value="">भूमि मापन एकाइ छान्नुहोस्</option>
                                        @foreach($unitTypes as $unitType)
                                            <option
                                                value="{{$unitType->id}}" {{$unitType->id == old('land_measurement_id',$mapSetting->land_measurement_id ?? '') ? 'selected' : ''}}>{{$unitType->title}}</option>
                                        @endforeach

                                    </select>
                                    @error('land_measurement_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="land_measurement_standard_id" class="form-label">भूमि मापन मानक
                                        एकाइ</label>
                                    <select name="land_measurement_standard_id" id="land_measurement_standard_id"
                                            class="form-control @error('land_measurement_standard_id') is-invalid @enderror">
                                        <option value="">भूमि मापन मानक एकाइ छान्नुहोस्</option>
                                        @foreach($units as $unit)
                                            <option
                                                value="{{$unit->id}}" {{$unit->id == old('land_measurement_standard_id',$mapSetting->land_measurement_standard_id ?? '') ? 'selected' : ''}}>{{$unit->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('land_measurement_standard_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
