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
                        <li class="breadcrumb-item active">Update User</li>
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
                        <h4 class="header-title">Update User</h4>
                        <a href="{{route('admin.userManagement.user.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.userManagement.user.update',$user)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">User Name *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{old('name',$user->name)}}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="User Name"
                                />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">Email *</label>
                                <input
                                    type="text"
                                    name="email"
                                    value="{{old('email',$user->email)}}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Email"
                                />
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone" class="form-label">Phone *</label>
                                <input
                                    type="text"
                                    name="phone"
                                    value="{{old('phone',$user->phone)}}"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone"
                                    placeholder="Phone"
                                />
                                @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="role_id" class="form-label">Role *</label>
                                <select name="role_id"
                                        class="form-select @error('role_id') is-invalid @enderror"
                                        id="role_id">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$user->role_id==old('role_id',$role->id) ? 'selected' : ''}}>
                                            {{$role->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
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
