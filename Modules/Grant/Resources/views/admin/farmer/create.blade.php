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
                        <li class="breadcrumb-item active">कृषक थप</li>
                    </ol>
                </div>
                <h4 class="page-title"> कृषकहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ कृषक थप्नुहोस्</h4>
                        <a href="{{route('admin.grant.farmer.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कृषक सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.farmer.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">आव्धता *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{old('name')}}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="आव्धता"
                                />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
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


