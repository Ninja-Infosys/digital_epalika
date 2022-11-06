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
                        <li class="breadcrumb-item active">प्रशासन सदस्य</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रशासन सदस्य</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मुख्य न्यायिक सदस्य थप्नुहोस </h4>
                        <a href="{{route('admin.judicialCommittee.chiefJudicialMember.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> मुख्य न्यायिक सदस्य सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.judicialCommittee.chiefJudicialMember.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="name" class="form-label">मुख्य न्यायिक सदस्य नाम *</label>
                                        <input
                                            type="text"
                                            name="name"
                                            value="{{old('name')}}"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            id="name"
                                            placeholder="मुख्य न्यायिक सदस्य नाम"
                                        />
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="photo" class="form-label">फोटो </label>
                                        <input type="file"
                                               name="photo"
                                               class="form-control @error('photo') is-invalid @enderror"
                                               id="photo"
                                               alt="hello"/>
                                        @error('photo')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="designation_id" class="form-label">पद</label>
                                                <select name="designation_id" class="form-control" id="designation_id">
                                                    <option value="#">select Designation</option>
                                                    @foreach($designations as $designation)
                                                        <option
                                                            value="{{$designation->id}}">{{$designation->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('designation_id')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="phone" class="form-label">फोन </label>
                                                <input type="number"
                                                       name="phone"
                                                       value="{{old('phone')}}"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       id="phone"
                                                       placeholder="फोन"
                                                />
                                                @error('phone')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="position" class="form-label">स्थिति </label>
                                            <input type="number"
                                                   name="position"
                                                   value="{{old('position')}}"
                                                   class="form-control @error('position') is-invalid @enderror"
                                                   id="position"
                                                   placeholder="स्थिति"
                                            />
                                            @error('position')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
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
