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
                            <a href="{{route('admin.circular.files.registration-file')}}">दर्ता फाईल </a>
                        </li>
                        <li class="breadcrumb-item active">फाईल</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता फाईल</h4>
            </div>
        </div>
        <div class="card">
            <div class="d-md-flex justify-content-between ">
                <form class="search-bar pt-2">
                    <div class="position-relative">
                        <input type="text" class="form-control form-control-light" placeholder="फाईल खोज्नुहोस्...">
                        <span class="mdi mdi-magnify"></span>
                    </div>
                </form>
                <div class="pt-2 mt-md-0">
                    <button type="submit" class="btn btn-sm btn-white border-white"><i class="fa fa-list"></i>
                    </button>
                    <button type="submit" class="btn btn-sm btn-white border-white"><i class="fa fa-list-alt"></i>
                    </button>
                    <button type="submit" class="btn btn-sm btn-white border-white"><i class="fa fa-info"></i>
                    </button>
                </div>
            </div>
            <div class="my-3">
                <div class="row mx-n1 g-0">
                    <div class="border-bottom d-flex justify-content-between">
                        <p class="text-primary fw-semibold fs-5">आर्थिक वर्ष : 2079</p>
{{--                        {{getAllFilesAndFolders('registration')}}--}}
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card m-1 shadow border rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                             title="फाईल को शिर्षक फाईल को शिर्षक फाईल फाईल को शिर्षक फाईल को शिर्षक फाईल">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto pe-0">
                                        <div class="avatar-sm">
                                           <span class="avatar-title text-primary rounded">
                                                <i class="fa fa-file-pdf fs-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-muted fw-bold text-truncate">
                                        <p class="text-muted fw-bold">दर्ता न:२३०७६५४६</p>
                                        फाईल को शिर्षक फाईल को शिर्षक फाईल
                                    </div>
                                    <div class="col d-flex justify-content-between">
                                        <p class="mb-0 font-13">2.3 MB</p>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fa fa-download text-white"></i></button>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end .p-2-->
                        </div> <!-- end col -->
                    </div> <!-- end col-->
                </div> <!-- end row-->
            </div> <!-- end .mt-3-->

        </div>
    </div>
@endsection
