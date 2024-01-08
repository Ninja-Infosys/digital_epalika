@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">सामग्री संग्रह</li>
                    </ol>
                </div>
                <h4 class="page-title">सामग्री संग्रह</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सामग्री संग्रह </h4>
                        <a href="{{route('admin.plan.materialCollection.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i>सामग्री संग्रह सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.materialCollection.update',$materialCollection)}}" method="post">
                        @csrf
                        @method('put')

                        <fieldset class="mb-2">
                            <legend> विवरण</legend>
                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="fiscal_year_id" class="form-label">आर्थिक वर्ष </label>
                                    <select
                                        name="fiscal_year_id"
                                        class="form-control @error('fiscal_year_id') is-invalid @enderror"
                                        id="fiscal_year_id" data-toggle="select2" data-width="100%" required>
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($fiscalYears as $fiscalYear)
                                            <option
                                                {{old('fiscal_year_id',$fiscalYear->id)==$materialCollection->fiscal_year_id ? 'selected' : ''}}
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
                                    <label for="material_rate_id" class="form-label">सामग्री दर </label>
                                    <select
                                        name="material_rate_id"
                                        class="form-control @error('material_rate_id') is-invalid @enderror"
                                        id="material_rate_id" data-toggle="select2" data-width="100%" required>
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($materialRates as $materialRate)
                                            <option
                                                {{old('material_rate_id',$materialRate->id)==$materialCollection->material_rate_id ? 'selected' : ''}}
                                                value="{{$materialRate->id}}">
                                                {{$materialRate->referance_no}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('material_rate_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="unit_id" class="form-label">एकाई </label>
                                    <select
                                        name="unit_id"
                                        class="form-control @error('unit_id') is-invalid @enderror"
                                        id="unit_id" data-toggle="select2" data-width="100%" required>
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($units as $unit)
                                            <option
                                                {{old('unit_id',$unit->id)== $materialCollection->unit_id? 'selected' : ''}}
                                                value="{{$unit->id}}">
                                                {{$unit->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="activity_no" class="form-label">गतिविधि नं</label>
                                    <input
                                        type="text"
                                        name="activity_no"
                                        value="{{old('activity_no',$materialCollection->activity_no)}}"
                                        class="form-control @error('activity_no') is-invalid @enderror"
                                        id="activity_no"
                                        placeholder="गतिविधि नं"
                                    />
                                    @error('activity_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="remarks" class="form-label">टिप्पणी</label>
                                    <input
                                        type="text"
                                        name="remarks"
                                        value="{{old('remarks',$materialCollection->remarks)}}"
                                        class="form-control @error('remarks') is-invalid @enderror"
                                        id="remarks"
                                        placeholder="टिप्पणी"
                                    />
                                    @error('remarks')
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
