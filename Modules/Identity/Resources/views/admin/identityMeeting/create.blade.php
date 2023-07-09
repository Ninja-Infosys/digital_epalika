@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('identity.admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.executiveMeeting.meeting.index') }}">बैठक विवरण </a>
                        </li>
                        <li class="breadcrumb-item active"> नयाँ बैठक विवरण थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">बैठक विवरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ बैठक विवरण थप्नुहोस्</h4>
                        <a href="{{ route('identity.admin.identityMeeting.index') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> बैठक विवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('identity.admin.identityMeeting.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">बैठकको शिर्षक *</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="बैठकको शिर्षक" />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-date-input-component nameNe="date_bs" labelNe="बैठक मिति *" nameEn="date_ad"
                                    labelEn="Meeting Date" />
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="committees" class="form-label">समिति सदस्यहरु *</label>
                                <div class="row">
                                    @foreach ($disabilityCommittees as $disabilityCommittee)
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    name="committees[]" value="{{ $disabilityCommittee->id }}"
                                                    id="committees{{ $disabilityCommittee->id }}">
                                                <label class="form-check-label"
                                                    for="committees{{ $disabilityCommittee->id }}">{{ $disabilityCommittee->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('committees')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('committees.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="disabilityIdentityCards" class="form-label">अपाङ्गता परिचय पत्र को लागि योग्य
                                    *</label>
                                <div class="row">
                                    @foreach ($disabilityCommittees as $disabilityCommittee)
                                        <div class="col-sm-6 mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    name="disabilityIdentityCards[{{ $loop->index }}][id]"
                                                    value="{{ $disabilityCommittee->id }}"
                                                    id="disabilityIdentityCards{{ $disabilityCommittee->id }}">
                                                <label class="form-check-label"
                                                    for="disabilityIdentityCards{{ $disabilityCommittee->id }}">{{ $disabilityCommittee->name }}</label>
                                            </div>
                                            @error("disabilityIdentityCards.$loop->index.id")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <select name="disabilityIdentityCards[{{ $loop->index }}][governmental_disability_type_id]" class="form-select form-select-sm"
                                                id="disabilityIdentityCards">
                                                <option value="">छान्नुहोस्</option>
                                                @foreach ($governmentDisabilityTypes as $governmentDisabilityType)
                                                    <option value="{{ $governmentDisabilityType->id }}">
                                                        {{ $governmentDisabilityType->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error("disabilityIdentityCards.$loop->index.governmental_disability_type_id")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                    @error('disabilityIdentityCards')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
