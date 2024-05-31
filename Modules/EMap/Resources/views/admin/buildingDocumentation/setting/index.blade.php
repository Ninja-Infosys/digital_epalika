@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">सेटिङ</li>
                    </ol>
                </div>
                <h4 class="page-title">सेटिङ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-body px-0">
                    <form action="{{ route('emap.admin.buildingDocumentationSetting.store', $buildingDocumentationSetting) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-primary">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <h5>
                                        <label for="is_building_documentation" class="form-label">
                                            घर अभिलेखिकरण गर्न मिल्ने कि नमिल्ने ? *
                                        </label>
                                    </h5>

                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="is_building_documentation"
                                                id="is_building_documentation1" value="1"
                                                {{ $buildingDocumentationSetting->is_building_documentation == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_building_documentation1">मिल्ने
                                                &nbsp;</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="is_building_documentation"
                                                id="is_building_documentation2" value="0"
                                                {{ $buildingDocumentationSetting->is_building_documentation == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_building_documentation2">नमिल्ने
                                                &nbsp;</label>
                                        </div>
                                    </div>

                                    @error('is_building_documentation')
                                        <div class="text-danger">{{ $message }}</div>
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
