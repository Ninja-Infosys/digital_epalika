@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">दरखस्त कागजातहरू </h4>
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
                        <li class="breadcrumb-item active">दरखस्त कागजातहरू</li>
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
                        <h4 class="header-title">दरखस्त कागजातहरू</h4>
                        <a href="{{ route('emap.admin.registrationDocument.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दरखस्त कागजात सूची
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('emap.admin.registrationDocument.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="data" class="form-label">डाटा *</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control ckEditor @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
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
    @push('scripts')
        <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/ckeditor/editor.js') }}"></script>
      
    @endpush
@endsection
