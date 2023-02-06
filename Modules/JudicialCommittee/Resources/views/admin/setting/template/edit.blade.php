@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.judicialCommittee.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.judicialCommittee.setting.judicialCommitteeTemplate.index') }}">
                                टेम्प्लेट
                            </a>
                        </li>
                        <li class="breadcrumb-item active">टेम्प्लेट विवरण अद्यावधिक गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">टेम्प्लेट</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">टेम्प्लेट विवरण अद्यावधिक गर्नुहोस्</h4>
                        <a href="{{ route('admin.judicialCommittee.setting.judicialCommitteeTemplate.index') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> टेम्प्लेट सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('admin.judicialCommittee.setting.judicialCommitteeTemplate.update', $judicialCommitteeTemplate) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input type="text" name="title"
                                    value="{{ old('title', $judicialCommitteeTemplate->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="शिर्षक " />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="type" class="form-label">टेम्प्लेट *</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach (\Modules\JudicialCommittee\Enums\JudicialTemplateTypeEnum::cases() as $type)
                                        <option
                                            {{ $type->value == old('type', $judicialCommitteeTemplate->type->value) ? 'selected' : '' }}
                                            value="{{ $type->value }}">
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">

                                @foreach ((new \Modules\JudicialCommittee\Entities\ComplaintApplication())->getTemplateOptions() as $template)
                                    <div class="col-md-12 mt-1">
                                        <h6>{{ $template['title'] ?? '' }}</h6>
                                    </div>
                                    <div class="col-md-12">
                                        @foreach ($template['data'] as $key => $templateValue)
                                            <a style="cursor: pointer" class="badge badge-outline-primary text-primary"
                                                onclick="copyText('{{ $templateValue }}')">
                                                {{ $key }} : {{ $templateValue }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="data" class="form-label">डाटा *</label>
                                <textarea name="data" id="data" cols="30" rows="10"
                                    class="form-control ckEditor @error('data') is-invalid @enderror">{{ old('data', $judicialCommitteeTemplate->data) }}</textarea>
                                @error('data')
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
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/backend/editor/ckEditor/css/editor.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/backend/editor/ckEditor/css/neo.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('assets/backend/editor/ckEditor/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/editor/ckEditor/js/editor.js') }}"></script>
    @endpush
@endsection
