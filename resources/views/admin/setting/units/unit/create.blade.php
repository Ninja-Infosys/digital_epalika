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
                            <a href="{{route('admin.units.unit.index')}}">मापन एकाइ</a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ मापन एकाइ थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">मापन एकाइ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ मापन एकाइ थप्नुहोस्</h4>
                        <a href="{{route('admin.units.unit.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> मापन एकाइ सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.units.unit.store')}}" method="post">
                        @csrf
                        @livewire('setting.measurement-unit')

                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">मापन एकाइ *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title')}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="मापन एकाइ "
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="position" class="form-label">Position *</label>
                                <input
                                    type="text"
                                    name="position"
                                    value="{{old('position')}}"
                                    class="form-control @error('position') is-invalid @enderror"
                                    id="position"
                                    placeholder="मापन एकाइ "
                                />
                                @error('position')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">

                                <input
                                    type="checkbox"
                                    name="is_smallest"
                                    value="1"
                                    class="@error('is_smallest') is-invalid @enderror"
                                    id="is_smallest"
                                    {{old('is_smallest')==1?'checked':''}}
                                />
                                <label for="is_smallest" class="form-label">is smallest *</label>

                                @error('is_smallest')
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
