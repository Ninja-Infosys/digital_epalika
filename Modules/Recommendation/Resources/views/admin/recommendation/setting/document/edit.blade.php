@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कागजात</li>
                    </ol>
                </div>
                <h4 class="page-title">कागजात</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title"> कागजात अद्यावधिक गर्नुहोस</h4>
                        <a href="{{ route('admin.recommendation.setting.recommendationDocument.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कागजात सुची
                        </a>
                    </div>
                </div>
                <div class="card-body px-0">
                    <form action="{{ route('admin.recommendation.setting.recommendationDocument.update',$recommendationDocument) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="form-label">शिर्षक *</label>
                                    <input type="text" name="title" value="{{ old('title',$recommendationDocument->title) }}"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="शिर्षक" required />
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
