@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digitalBoard.video.index')}}">Digital Board</a>
                        </li>
                        <li class="breadcrumb-item active">Add New Video</li>
                    </ol>
                </div>
                <h4 class="page-title">Video</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">Add New Video</h4>
                        <a href="{{route('admin.digitalBoard.video.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.digitalBoard.video.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">Video Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title')}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="Video Title"
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
