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
                        <a href="{{ route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting) }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> निर्णयहरु बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.executiveMeeting.meeting.meetingDecision.store', $meeting) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($meeting->meetingAgendas as $meetingAgenda)
                            <fieldset class="border border-secondary p-2 mb-2">
                                <legend class="font-16 text-secondary">
                                    <strong>{{ $loop->iteration }}. {{ $meetingAgenda->proposal }} </strong>
                                </legend>
                                <input type="hidden" name="meetingDecisions[{{ $loop->index }}][meeting_agenda_id]"
                                    id="meeting_agenda_id{{ $loop->index }}" value="{{ $meetingAgenda->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <x-date-input-component nameNe="meetingDecisions[{{ $loop->index }}][date]"
                                            :editDateNe="$meetingAgenda->meetingDecision->date??''"
                                            idNe="date{{ $loop->index }}" labelNe="मिति *"
                                            idEn="en_date{{ $loop->index }}"
                                            nameEn="meetingDecisions[{{ $loop->index }}][en_date]" labelEn="Date"
                                            :editDateEn="$meetingAgenda->meetingDecision->en_date??''"
                                            :getTodayDate="false" />
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="description{{ $loop->index }}" class="form-label">बिवरण * </label>
                                        <textarea name="meetingDecisions[{{ $loop->index }}][description]" id="description{{ $loop->index }}" cols="30"
                                            placeholder="बिवरण" rows="5"
                                            class="form-control ckEditor @error("meetingDecisions.{{ $loop->index }}.description") is-invalid @enderror">{{ old("meetingDecisions.$loop->index.description", $meetingAgenda->meetingDecision->description ?? '') }}</textarea>
                                        @error("meetingDecisions.{{ $loop->index }}.description")
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        @endforeach
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
