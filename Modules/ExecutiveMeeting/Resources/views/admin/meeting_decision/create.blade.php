@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.executiveMeeting.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.executiveMeeting.meetingDecision.index',$meeting_for)}}">निर्णयहरु</a>
                        </li>
                        <li class="breadcrumb-item active"> नयाँ निर्णयहरु थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">निर्णयहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ निर्णयहरु थप्नुहोस्</h4>
                        <a href="{{route('admin.executiveMeeting.meetingDecision.index',$meeting_for)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> निर्णयहरु बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.executiveMeeting.meetingDecision.store',$meeting_for)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="meeting_event_id" class="form-label"> बैठक *</label>
                                    <select
                                        name="meeting_event_id"
                                        class="form-select @error('meeting_event_id') is-invalid @enderror"
                                        id="meeting_event_id" required>
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($meetingEvents as $meetingEvent)
                                            <option {{$meetingEvent->id===old('meeting_event_id') ? 'selected' : ''}}
                                                    value="{{$meetingEvent->id}}">
                                                {{$meetingEvent->event_name}} ({{$meetingEvent->start_date}})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('meeting_event_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-date-input-component
                                        nameNe="date" labelNe="मिति *"
                                        nameEn="en_date" labelEn="Date"
                                    />
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="subject" class="form-label"> विषय * </label>
                                    <input
                                        type="text"
                                        name="subject"
                                        value="{{old('subject')}}"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        id="subject"
                                        placeholder="विषय"
                                        required
                                    />
                                    @error('subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="description" class="form-label">बिवरण * </label>
                                    <textarea name="description" id="description" cols="30" placeholder="बिवरण" rows="5"
                                              class="form-control ckEditor summernote @error('meeting_subject') is-invalid @enderror">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="decision_file" class="form-label"> फाईल * </label>
                                    <input
                                        type="file"
                                        name="decision_file"
                                        class="form-control @error('decision_file') is-invalid @enderror"
                                        id="decision_file"

                                    />
                                    @error('decision_file')
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
@push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
    @endpush
