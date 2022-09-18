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
                            <a href="">सूचना प्रशारण</a>
                        </li>
                        <li class="breadcrumb-item active"> नयाँ सूचना प्रशारण थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">सूचना प्रशारण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सूचना प्रशारण थप्नुहोस्</h4>
                        <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सूचना प्रशारण बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.executiveMeeting.municipalCommittee.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>व्यक्तिगत विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="broadcast_date" class="form-label">broadcast_date  *</label>
                                    <input
                                        type="text"
                                        name="broadcast_date"
                                        value="{{old('broadcast_date')}}"
                                        class="form-control @error('broadcast_date') is-invalid @enderror"
                                        id="broadcast_date"
                                        placeholder="broadcast_date"
                                    />
                                    @error('broadcast_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="designation" class="form-label">पद  *</label>
                                    <input
                                        type="text"
                                        name="designation"
                                        value="{{old('designation')}}"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        id="designation"
                                        placeholder="पद"
                                    />
                                    @error('designation')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="meeting_subject" class="form-label">meeting_subject  </label>
                                    <input
                                        type="text"
                                        name="meeting_subject"
                                        value="{{old('meeting_subject')}}"
                                        class="form-control @error('meeting_subject') is-invalid @enderror"
                                        id="meeting_subject"
                                        placeholder="meeting_subject"
                                    />
                                    @error('meeting_subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="description" class="form-label">description  </label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>ठेगाना</strong>
                            </legend>
                            @livewire('address',['address'=>$officeSetting->address])
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="village" class="form-label"> गाउ </label>
                                    <input
                                        type="text"
                                        name="village"
                                        value="{{old('village')}}"
                                        class="form-control @error('village') is-invalid @enderror"
                                        id="village"
                                        placeholder="गाउ"
                                    />
                                    @error('village')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="tole" class="form-label">टोल </label>
                                    <input
                                        type="text"
                                        name="tole"
                                        value="{{old('tole')}}"
                                        class="form-control @error('tole') is-invalid @enderror"
                                        id="tole"
                                        placeholder="टोल"
                                    />
                                    @error('tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </fieldset>


                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
