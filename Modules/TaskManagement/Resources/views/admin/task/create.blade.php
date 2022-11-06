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
                        <li class="breadcrumb-item active">दैनिक कार्य</li>
                    </ol>
                </div>
                <h4 class="page-title">दैनिक कार्य थप्नुहोस्</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दैनिक कार्य थप्नुहोस्</h4>
                        <a href="{{route('admin.taskManagement.task.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> विवरण हेर्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="date" class="form-label">मिति *</label>
                                <input class="form-control" id="date" type="date" name="date">
                                @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">शीर्षक *</label>
                                <input type="text" id="title" class="form-control" placeholder="शीर्षक">
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="branch_id" class="form-label">शाखा *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="1">Test</option>
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="branch_id" class="form-label">वर्ग *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="1">Test</option>
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
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

                            <div class="col-md-6 mb-2">
                                <label for="time_taken" class="form-label">लाग्ने समय *</label>
                                <input
                                    type="text"
                                    name="time_taken"
                                    value="{{old('time_taken')}}"
                                    class="form-control @error('time_taken') is-invalid @enderror"
                                    id="time_taken"
                                    placeholder="लाग्ने समय "
                                />
                                @error('time_taken')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="responsible_officer" class="form-label">जिम्मेवार अधिकारी *</label>
                                <input
                                    type="text"
                                    name="responsible_officer"
                                    value="{{old('responsible_officer')}}"
                                    class="form-control @error('responsible_officer') is-invalid @enderror"
                                    id="responsible_officer"
                                    placeholder="लाग्ने समय "
                                />
                                @error('responsible_officer')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="office" class="form-label">कोठा नम्बर /कार्यालय *</label>
                                <input
                                    type="text"
                                    name="office"
                                    value="{{old('office')}}"
                                    class="form-control @error('office') is-invalid @enderror"
                                    id="office"
                                    placeholder="नम्बर /कार्यालय"
                                />
                                @error('office')
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
