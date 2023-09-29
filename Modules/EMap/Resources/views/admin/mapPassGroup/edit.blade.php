@extends('admin.layouts.master')
@section('content')
    <div class="row">
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
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा दस्तुर</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्शा दस्तुर </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्शा पास समूह थप्नुहोस्</h4>
                        <a href="{{route('emap.admin.enaksa.naksaPassGroup.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> नक्शा पास समूह सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('emap.admin.enaksa.naksaPassGroup.update',$naksaPassGroup)}}" method="post">
                    @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="storey" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title',$naksaPassGroup->title)}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="तल्ला"
                                />
                                @error('title')
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
