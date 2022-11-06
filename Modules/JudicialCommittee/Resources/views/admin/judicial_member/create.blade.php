@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.judicialMember.index')}}">
                                न्यायिक समिति विवरण
                            </a>
                        </li>
                        <li class="breadcrumb-item active">न्यायिक समिति विवरण थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">न्यायिक समिति विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">न्यायिक समिति विवरण थप्नुहोस्</h4>
                        <a href="{{route('admin.judicialCommittee.judicialMember.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> न्यायिक समिति विवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.judicialCommittee.judicialMember.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">नाम *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{old('name')}}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="नाम"
                                />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="designation_id" class="form-label">पद *</label>
                                <select
                                    name="designation_id"
                                    class="form-control @error('designation_id') is-invalid @enderror"
                                    id="designation_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($designations as $designation)
                                        <option {{$designation->id==old('designation_id') ? 'selected' : ''}}
                                                value="{{$designation->id}}">
                                            {{$designation->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('designation_id')
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
