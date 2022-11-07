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
                        <li class="breadcrumb-item active">शाखाहरु अनुसार कार्यहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">शाखाहरु अनुसार कार्यहरू थप्नुहोस्</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">शाखाहरु अनुसार कार्यहरू </h4>
                        <a href="{{route('admin.taskManagement.taskCategory.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> विवरण हेर्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.taskManagement.taskCategory.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="branch_id" class="form-label">शाखा *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach($branches as $branch)
                                        @if(count($branch->branches)>0)
                                            <optgroup label="{{$branch->branch_name}}">
                                                @foreach($branch->branches as $sub_branch)
                                                    <option {{$sub_branch->id==old('branch_id') ? 'selected' : ''}}
                                                        value="{{$sub_branch->id}}">
                                                        {{$sub_branch->branch_name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <option {{$branch->id==old('branch_id') ? 'selected' : ''}}
                                                value="{{$branch->id}}">
                                                {{$branch->branch_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">शीर्षक *</label>
                                <input type="text" id="title" value="{{old('title')}}" class="form-control" placeholder="शीर्षक">
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
