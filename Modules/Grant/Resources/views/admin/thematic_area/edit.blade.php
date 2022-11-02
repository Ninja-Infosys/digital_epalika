@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">विषयगत क्षेत्र </li>
                    </ol>
                </div>
                <h4 class="page-title">विषयगत क्षेत्र </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">विषयगत क्षेत्र थप्नुहोस </h4>
                        <a href="{{route('admin.grant.thematicArea.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> पूर्वाधार शीर्षक सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.thematicArea.update',$thematicArea)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">विषयगत क्षेत्र *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title',$thematicArea->title)}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="विषयगत क्षेत्र"
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
