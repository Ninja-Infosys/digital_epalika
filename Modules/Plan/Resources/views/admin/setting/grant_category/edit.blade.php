@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.grantCategory.index') }}">
                                अनुदान प्रकार
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान प्रकार सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">अनुदान प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अनुदान प्रकार सम्पादन गर्नुहोस्</h4>
                        <a href="{{ route('admin.plan.grantCategory.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> अनुदान प्रकार सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.plan.grantCategory.update',$grantCategory) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input type="text" name="title" value="{{ old('title',$grantCategory->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="अनुदान प्रकार " />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
