@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">हस्ताक्षर गर्ने व्यक्ति </h4>
                <div class="">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                    alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">हस्ताक्षर गर्ने व्यक्ति</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-3 p-0">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">हस्ताक्षर गर्ने व्यक्ति</h4>
                        <a href="{{ route('admin.recommendation.setting.signaturePerson.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> हस्ताक्षर गर्ने व्यक्तिहरुको सूची
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('admin.recommendation.setting.signaturePerson.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="name" class="form-label">नाम*</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="नाम" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="signature_image" class="form-label">सही </label>
                            <input type="file" name="signature_image" class="form-control @error('signature_image') is-invalid @enderror"
                                id="signature_image" />
                            @error('signature_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="image" class="form-label">फोटो  </label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                id="image" multiple />
                            @error('image')
                            
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
