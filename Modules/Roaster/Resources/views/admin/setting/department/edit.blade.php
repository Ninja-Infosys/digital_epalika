@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.roaster.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.roaster.setting.department.index')}}">बिभाग</a>
                        </li>
                        <li class="breadcrumb-item active">बिभाग सम्पादन</li>
                    </ol>
                </div>
                <h4 class="page-title">बिभाग सम्पादन</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">विभाग सम्पादन</h4>
                        <a href="{{route('admin.roaster.setting.department.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> विभाग सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.roaster.setting.department.update',$department)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 p-2 mb-2">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="form-label">विभाग *</label>
                                    <input id="title" type="text" name="title" placeholder="बिभाग"
                                           class="form-control @error('title') is-invalid @enderror" value="{{old('title', $department->title)}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
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
