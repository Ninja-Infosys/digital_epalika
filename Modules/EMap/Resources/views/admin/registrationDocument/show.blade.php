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
                            <a href="{{ route('emap.admin.registrationDocument.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> दरखस्त कागजात सूची
                            </a>
                        </li>
                        <li class="breadcrumb-item active">दरखस्त कागजातहरु  </li>
                    </ol>
                </div>
                <h4 class="page-title">दरखस्त कागजातहरु  </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> दरखस्त कागजात विवरण</h4>

                        <a href="{{ route('emap.admin.registrationDocument.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दरखस्त कागजात सूची 
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">

                                    <tbody>
                                    <tr>
                                        <p>{!! $registrationDocument->description !!}</p>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
