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
                        <a href="{{route('admin.helpDesk.service.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सेवा सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.helpDesk.service.store')}}" method="post">
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
                                        @foreach($mainBranch->branches as $branch)
                                            <option
                                                {{$branch->id===old('branch_id') ? 'selected' : ''}}
                                                value="{{$branch->id}}">
                                                &nbsp;&nbsp;
                                                - - {{$branch->branch_name}}
                                            </option>
                                        @endforeach
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

                            <div class="col-md-6 mb-2">
                                <label for="photo" class="form-label">फोटो </label>
                                <input
                                    type="file"
                                    name="photo"
                                    class="form-control @error('photo') is-invalid @enderror"
                                    id="photo"
                                />
                                @error('photo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">इमेल *</label>
                                <input
                                    type="text"
                                    name="email"
                                    value="{{old('email')}}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="इमेल"
                                />
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone" class="form-label">फोन नम्बर *</label>
                                <input
                                    type="text"
                                    name="phone"
                                    value="{{old('phone')}}"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone"
                                    placeholder="फोन नम्बर"
                                />
                                @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                @livewire('helpdesk::service-document')
                            </div>

                            <div class="col-md-12 mb-2">
                                @livewire('helpdesk::service-process')
                            </div>

                            <div class="col-md-12 mb-2">
                                @livewire('helpdesk::service-employee')
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
