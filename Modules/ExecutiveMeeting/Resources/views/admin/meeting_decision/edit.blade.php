@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.executiveMeeting.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting) }}">निर्णयहरु</a>
                        </li>
                        <li class="breadcrumb-item active">निर्णयहरु सम्पादन गर्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">निर्णयहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">निर्णयहरु सम्पादन गर्नुहोस</h4>
                        <a href="{{ route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting) }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> निर्णयहरु बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('admin.executiveMeeting.meeting.meetingDecision.update', [$meeting, $meetingDecision]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <x-date-input-component nameNe="date" :editDateNe="$meetingDecision->date" idNe="date" labelNe="मिति *"
                                    idEn="en_date" nameEn="en_date" :editDateEn="$meetingDecision->en_date" labelEn="Date" :getTodayDate="false" />
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">बिवरण * </label>
                                <textarea name="description" id="description" cols="30" placeholder="बिवरण" rows="5"
                                    class="form-control ckEditor @error('description') is-invalid @enderror">{{ old('description', $meetingDecision->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
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

@push('scripts')
    <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/ckeditor/editor.js') }}"></script>
@endpush
