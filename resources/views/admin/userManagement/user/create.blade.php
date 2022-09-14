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
                        <li class="breadcrumb-item active">Add New User</li>
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
                        <h4 class="header-title">Add New User</h4>
                        <a href="{{route('admin.userManagement.user.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.userManagement.user.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">User Name *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{old('name')}}"
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
                                    value="{{old('email')}}"
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
                                    value="{{old('phone')}}"
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
                                        <option value="{{$role->id}}" {{$role->id==old('role_id') ? 'selected' : ''}}>
                                            {{$role->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="password" class="form-label">Password *</label>
                                <input
                                    type="password"
                                    name="password"
                                    value="{{old('password')}}"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    placeholder="Password"
                                />
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="password_confirmation" class="form-label">Confirm Password *</label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    value="{{old('password_confirmation')}}"
                                    class="form-control"
                                    id="password_confirmation"
                                    placeholder="Password"
                                />
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
