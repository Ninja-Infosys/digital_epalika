@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">बजेट श्रोत हरू</li>
                    </ol>
                </div>
                <h4 class="page-title">बजेट श्रोत हरू</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ बजेट श्रोत थप्नुहोस्</h4>
                        <a href="{{route('admin.plan.budgetSource.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> बजेट श्रोत हरू
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.budgetSource.update',$budgetSource)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="source_name" class="form-label">बजेट श्रोत  *</label>
                                <input
                                    type="text"
                                    name="source_name"
                                    value="{{old('source_name',$budgetSource->source_name)}}"
                                    class="form-control @error('source_name') is-invalid @enderror"
                                    id="source_name"
                                    placeholder="बजेट श्रोत "
                                />
                                @error('source_name')
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
