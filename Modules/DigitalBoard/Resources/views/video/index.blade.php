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
                        <li class="breadcrumb-item active">Video</li>
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
                        <h4 class="header-title">Video List</h4>
                        @can('user_create')
                            <a href="{{route('admin.digitalBoard.video.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> Add New
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($videos as $video)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$video->title}}</td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.video.edit',$video)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i> EDIT
                                        </a>
                                        <form action="{{route('admin.digitalBoard.video.destroy',$video)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">No Result Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
