@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">आवश्यक कागजातहरु </h4>
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
                        <li class="breadcrumb-item active">आवश्यक कागजातहरु</li>
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
                        <h4 class="header-title">आवश्यक कागजातहरु</h4>
                        <a href="{{ route('emap.admin.necessaryDocument.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> आवश्यक कागजात सूची
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('emap.admin.necessaryDocument.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="title" class="form-label">शीर्षक*</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                placeholder="शीर्षक" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="file" class="form-label">फाईल </label>
                            <input type="file" name="files[]" class="form-control @error('files') is-invalid @enderror"
                                id="files" multiple />
                            @error('files')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('files.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">विवरण </label>
                            <textarea style="height: 200px;" type="text" name="description" id="description"  value="{{ old('decscription') }}" class="form-control  @error('description') is-invalid @enderror">
                            </textarea>
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
@endsection
