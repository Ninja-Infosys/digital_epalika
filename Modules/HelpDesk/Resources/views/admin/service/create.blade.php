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
                            <a href="{{route('admin.helpDesk.branch.index')}}">हेल्प डेस्क </a>
                        </li>
                        <li class="breadcrumb-item active">सेवा</li>
                    </ol>
                </div>
                <h4 class="page-title">सेवा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सेवा थप्नुहोस्</h4>
                        <a href="{{route('admin.helpDesk.branch.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सेवा सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.helpDesk.branch.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="branch_id" class="form-label">शाखा *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach($mainBranches as $mainBranch)
                                        <option {{$mainBranch->id===old('branch_id') ? 'selected' : ''}}
                                                value="{{$mainBranch->id}}">
                                            {{$mainBranch->branch_name}}
                                        </option>
                                    @endforeach
                                    @foreach($mainBranch->branches as $branch)
                                        <option
                                            {{$branch->id===old('branch_id') ? 'selected' : ''}}
                                            value="{{$branch->id}}">
                                            &nbsp;&nbsp;
                                            - - {{$branch->branch_name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="service_name" class="form-label">सेवा नाम *</label>
                                <input
                                    type="text"
                                    name="service_name"
                                    value="{{old('service_name')}}"
                                    class="form-control @error('service_name') is-invalid @enderror"
                                    id="service_name"
                                    placeholder="सेवा नाम"
                                />
                                @error('service_name')
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
