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
                        <a href="{{route('admin.executiveMeeting.wardMeetingNotice.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सूचना प्रशारण बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.executiveMeeting.wardMeetingNotice.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="broadcast_date" class="form-label">सूचना प्रसारण  *</label>
                                    <input
                                        type="text"
                                        name="broadcast_date"
                                        value="{{old('broadcast_date')}}"
                                        class="form-control @error('broadcast_date') is-invalid @enderror"
                                        id="broadcast_date"
                                        placeholder="सूचना प्रसारण"
                                    />
                                    @error('broadcast_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="type" class="form-label">प्रकार *</label>
                                    <select name="type"
                                            class="form-select @error('type') is-invalid @enderror"
                                            id="type">
                                        <option value=""> छान्नुहोस्</option>
                                        @foreach(config('meetingType') as $key=>$metting)
                                            <option value="{{$key}}">
                                                {{$metting}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="meeting_subject" class="form-label">बैठकको विषय *  </label>
                                    <input
                                        type="text"
                                        name="meeting_subject"
                                        value="{{old('meeting_subject')}}"
                                        class="form-control @error('meeting_subject') is-invalid @enderror"
                                        id="meeting_subject"
                                        placeholder="बैठकको विषय"
                                    />
                                    @error('meeting_subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="description" class="form-label">बिवरण * </label>
                                    <textarea name="description" id="description" cols="30" placeholder="बिवरण" rows="5" class="form-control @error('meeting_subject') is-invalid @enderror">{{old('description')}}</textarea>
                                    @error('description')
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
