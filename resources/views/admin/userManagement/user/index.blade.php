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
                            <a href="{{route('admin.userManagement.user.index')}}">User Management</a>
                        </li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <h4 class="page-title">User</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">User List</h4>
                        @can('user_create')
                            <a href="{{route('admin.userManagement.user.create')}}"
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
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="table-user">
                                        <img src="{{$user->profile_photo_url}}" class="me-2 rounded-circle" alt="">
                                        {{$user->name}}
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <span class="badge bg-info">{{$user->role->title??''}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.userManagement.user.updateStatus',$user)}}">
                                            <i class="fa fa-2x {{$user->is_active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.userManagement.user.edit',$user)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i> EDIT
                                        </a>
                                        <form action="{{route('admin.userManagement.user.destroy',$user)}}"
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
                                    <td class="text-center" colspan="3">No Result Found</td>
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
