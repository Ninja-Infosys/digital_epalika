@extends('admin.layouts.master')
@section('content')
    <div class="row" xmlns:livewire="http://www.w3.org/1999/html">
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
                            <a href="{{route('admin.grant.cooperative.index')}}">सहकारी</a>
                        </li>
                        <li class="breadcrumb-item active">सहकारी थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">सहकारी थप्नुहोस्</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सहकारी थप्नुहोस्</h4>
                        <a href="{{route('admin.grant.cooperative.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सहकारी सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.cooperative.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <fieldset>
                                    <legend><h4 class="text-info"> सहकारीको विवरण </h4></legend>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="name" class="form-label">सहकारी नाम</label>
                                            <input
                                                type="text"
                                                name="name"
                                                value="{{old('name')}}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                placeholder="सहकारी नाम"
                                            />
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="name" class="form-label">सहकारी प्रकार</label>
                                            <select name="cooperative_type_id" id="cooperative_type_id" class="form-control @error('cooperative_type_id') is-invalid @enderror">
                                                <option value="">सहकारी प्रकार छान्नुहोस्</option>
                                                @foreach($cooperativeTypes as $cooperativeType)
                                                    <option
                                                        value="{{$cooperativeType->id}}">{{$cooperativeType->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('cooperative_type_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="registration_no" class="form-label">दर्ता नं</label>
                                            <input
                                                type="text"
                                                name="registration_no"
                                                value="{{old('registration_no')}}"
                                                class="form-control @error('registration_no') is-invalid @enderror"
                                                id="registration_no"
                                                placeholder="दर्ता नं"
                                            />
                                            @error('registration_no')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <x-date-input-component
                                                nameNe="registration_date" labelNe="दर्ता मिति *"
                                                nameEn="en_registration_date" labelEn="Registration Date"
                                                :getTodayDate="false"
                                            />
                                            @error('registration_date')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="vat_pan" class="form-label">प्यान भ्याट</label>
                                            <input
                                                type="text"
                                                name="vat_pan"
                                                value="{{old('vat_pan')}}"
                                                class="form-control @error('vat_pan') is-invalid @enderror"
                                                id="vat_pan"
                                                placeholder="प्यान भ्याट"
                                            />
                                            @error('vat_pan')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="affiliation_id" class="form-label">आवध्ता </label>
                                            <select name="affiliation_id" id="affiliation_id" class="form-control @error('affiliation_id') is-invalid @enderror">
                                                <option value="">आवध्ता छान्नुहोस्</option>
                                                @foreach($affiliations as $affiliation)
                                                    <option
                                                        value="{{$affiliation->id}}">{{$affiliation->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('affiliation_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="objective" class="form-label">उद्देश्य</label>
                                            <textarea name="objective" id="objective" placeholder="objective.." cols="60" rows="3"></textarea>
                                            @error('objective')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <fieldset>
                                <legend><h4 class="text-info"> स्थायी ठेगाना </h4></legend>
                                <p>नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड नं., गाउँ र टोल छनौट गर्नुहोस् ।</p>
                                <livewire:address/>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="village" class="form-label">गाउँ</label>
                                        <input
                                            type="text"
                                            name="village"
                                            id="village"
                                            class="form-control @error('village') is-invalid @enderror"
                                            value="{{old('village')}}"
                                            placeholder="गाउँ"
                                        >
                                    </div>
                                    @error('village')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <div class="col-md-6 mb-2">
                                        <label for="tole" class="form-label">टोल</label>
                                        <input
                                            type="text"
                                            name="tole"
                                            id="tole"
                                            class="form-control @error('tole') is-invalid @enderror"
                                            value="{{old('tole')}}"
                                            placeholder="टोल"
                                        >
                                    </div>
                                    @error('tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <hr class="dotted" style="border-top: 3px dotted #bbb;">
                        <div class="row my-2">
                            <fieldset>
                                <legend>
                                    <h4 class="text-info">संलग्न कृषकहरू</h4>
                                </legend>
                                <p>सहकारीमा संलग्न कृषकहरू छान्नुहोस् </p>
                                <div class="col-md-4 mb-2">
                                    <label for="farmers" class="form-label">
                                        कृषक</label>
                                    <select name="farmers[]" multiple data-toggle="select2"
                                            id="farmers" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($farmers as $farmer)
                                            <option value="{{$farmer->id}}">{{$farmer->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('farmers')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </fieldset>
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
