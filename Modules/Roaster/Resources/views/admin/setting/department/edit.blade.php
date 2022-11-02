@extends('admin.layouts.master')
@section('content')
    <div class=""
        <div class="page-title d-flex justify-content-between">
            <h5>बिभागहरु</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.roaster.setting.department.index')}}">बिभागहरु</a></li>
                    <li class="breadcrumb-item active" aria-current="page">भूमिकाहरु थप्नुहोस्</li>
                </ol>
            </nav>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h6>बिभागहरुको विवरण</h6>
            </div>
            <form action="{{route('admin.roaster.setting.department.update',$department)}}" method="post">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 col-sm-12 form-group">
                        <label for="title">बिभाग * </label>
                        <input id="title" type="text" name="title" placeholder="बिभाग"
                               class="form-control @error('title') is-invalid @enderror" value="{{old('title', $department->title)}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
