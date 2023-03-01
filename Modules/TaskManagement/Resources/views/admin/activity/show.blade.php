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
                        <li class="breadcrumb-item active">कार्य</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्य</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">कार्य</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            <a href="{{route('admin.taskManagement.activity.index')}}"
                               class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list"></i> कार्यहरूको सुची</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
