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
                            <a href="{{route('admin.circular.files.dispatch-file')}}">चलानी फाईल</a>
                        </li>
                        <li class="breadcrumb-item active">फाईल</li>
                    </ol>
                </div>
                <h4 class="page-title">चलानी फाईल</h4>
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
            <div class="mt-3">
                @foreach(getAllFilesAndFolders('dispatch') as $file)
                    @include('admin.inc.file', ['file' => $file])
                @endforeach
            </div> <!-- end .mt-3-->
        </div>
    </div>
@endsection
