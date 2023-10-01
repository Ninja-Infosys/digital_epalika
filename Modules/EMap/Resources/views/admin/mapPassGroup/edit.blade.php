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
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा दस्तुर</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्शा दस्तुर </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्शा पास समूह थप्नुहोस्</h4>
                        <a href="{{route('emap.admin.mapPassGroup.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> नक्शा पास समूह सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('emap.admin.mapPassGroup.update',$mapPassGroup)}}" method="post">
                    @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title',$mapPassGroup->title)}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="शिर्षक"
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">प्रयोगकर्ता *</label>
                                <div class="row">
                                    @foreach($users as $index=>$user)
                                        <div class="col-md-3 d-flex">
                                            <input
                                                type="checkbox"
                                                name="users[]"
                                                value="{{$user->id}}"
                                                class="form-check @error('title') is-invalid @enderror"
                                                {{in_array($user->id, old('users',$mapPassGroup->users->pluck('id')->toArray() ?? [])) ? 'checked' : ''}}
                                                id="users.{{$index}}"
                                            />
                                            <label for="users.{{$index}}">{{$user->name}}</label>
                                        </div>
                                        @error('users.'.$index)
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    @endforeach
                                </div>
                                @error('users')
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
