@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grant.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">समूह थप</li>
                    </ol>
                </div>
                <h4 class="page-title"> समूहहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">समूह सूचीकरण विवरण फारम</h4>
                        <a href="{{ route('admin.grant.group.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> समूह सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.grant.group.store') }}" method="post">
                        @csrf
                        <fieldset>
                            <legend>
                                <h4 class="text-info">समूहको विवरण</h4>
                            </legend>
                            <h5 class="mt-1 text-black">नोट: कृपया समुहको विवरण भर्दा ध्यान दिएर भर्नु होला । </h5>
                            <div class="row mt-2">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="form-label">समूहको नाम <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="समूह नाम" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="registered_office" class="form-label">दर्ता भएको कार्यालय <span class="text-danger">*</span></label>
                                    <input type="text" name="registered_office" value="{{ old('registered_office') }}"
                                        class="form-control @error('registered_office') is-invalid @enderror"
                                        id="registered_office" placeholder="दर्ता भएको कार्यालय" />
                                    @error('registered_office')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="monthly_meeting" class="form-label">मासिक वैठक हुने गते </label>
                                    <input type="text" name="monthly_meeting" value="{{ old('monthly_meeting') }}"
                                        class="form-control @error('monthly_meeting') is-invalid @enderror"
                                        id="monthly_meeting" placeholder="मासिक वैठक हुने गते" />
                                    @error('monthly_meeting')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <x-date-input-component
                                        nameNe="registration_date" labelNe="दर्ता मिति *"
                                        nameEn="en_registration_date" labelEn="Registration Date"
                                        :getTodayDate="false"
                                    />
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="vat_pan" class="form-label">पाना/भ्याट </label>
                                    <input type="text" name="vat_pan" value="{{ old('vat_pan') }}"
                                        class="form-control @error('vat_pan') is-invalid @enderror" id="vat_pan"
                                        placeholder="पाना/भ्याट" />
                                    @error('vat_pan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="mt-3">
                            <legend>
                                <h4 class="text-info">स्थानीय ठेगाना</h4>
                            </legend>
                            <h5 class="my-1 text-black">नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड नं., गाउँ र
                                टोल छनौट गर्नुहोस् ।</h5>
                            @livewire('address', [
                            'province_id' =>$officeSetting->province_id,
                            'district_id' => $officeSetting->district_id,
                            'local_body_id' => $officeSetting->local_body_id
                            ])
                            <div class="row ">
                                <div class="col-md-6 mb-2">
                                    <label for="village" class="form-label">गाउँ</label>
                                    <input type="text" name="village" value="{{ old('village') }}"
                                        class="form-control @error('village') is-invalid @enderror" id="village"
                                        placeholder="गाउँ" />
                                    @error('village')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="tole" class="form-label">टोल</label>
                                    <input type="text" name="tole" value="{{ old('tole') }}"
                                        class="form-control @error('tole') is-invalid @enderror" id="tole"
                                        placeholder="टोल" />
                                    @error('tole')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-2">
                            <legend>
                                <h4 class="text-info">संलग्न कृषकहरू</h4>
                            </legend>
                            <h5 class="mt-1 text-black">समूहमा संलग्न कृषकहरू छान्नुहोस् </h5>
                            <div class="row mt-2">
                                <div class="col-md-6 mb-2">
                                    <label for="farmers" class="fs-5">कृषकहरू </label>
                                    <select name="farmers[]" multiple data-toggle="select2" id="farmers"
                                        class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($farmers as $farmer)
                                            <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('farmers')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
