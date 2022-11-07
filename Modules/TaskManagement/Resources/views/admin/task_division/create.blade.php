@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कार्य विभाजन </li>
                    </ol>
                </div>
                <h4 class="page-title">कार्य विभाजन थप्नुहोस्</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्य विभाजन </h4>
                        <a href="{{route('admin.taskManagement.subCategory.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> विवरण हेर्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="branch_id" class="form-label">शाखाहरु अनुसार कार्यहरू *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($taskCategories as $taskCategory)
                                    <option value="1">Test</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">कार्यको शीर्षक *</label>
                                <input type="text" id="title" class="form-control" placeholder="कार्यको शीर्षक">
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
