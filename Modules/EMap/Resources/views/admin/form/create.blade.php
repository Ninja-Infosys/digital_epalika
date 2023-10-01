@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                        <li class="breadcrumb-item active">नयाँ सिफारिस</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ सिफारिस</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                        <a href="{{ route('emap.admin.form.index','') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('emap.admin.form.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <legend>
                                <h4 class="text-info">नक्शा पास फाराम</h4>
                            </legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="title" class="form-label">शीर्षक</label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <input type="text" id="title" class="form-control"
                                               value="{{old('title')}}"
                                               name="title"/>
                                    </div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="order" class="form-label">क्रम शन्ख्य </label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <input type="number" id="order" class="form-control"
                                               value="{{old('order')}}"
                                               name="order"/>
                                    </div>
                                    @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="form_type" class="form-label">नक्शा पास फारम को किसिम </label>
                                    <select id="form_type" name="form_type"
                                            class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\Modules\EMap\Enums\FormTypeEnum::cases() as $formType)
                                            <option
                                                value="{{$formType->value}}" {{old('form_type') == $formType->value ? 'selected' : ''}}>{{$formType->label()}}</option>
                                        @endforeach

                                    </select>
                                    @error('form_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="map_pass_group_id" class="form-label">स्वीकृति दिने समूह</label>
                                    <select id="map_pass_group_id" name="map_pass_group_id"
                                            class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach($mapPassGroups as $mapPassGroup)
                                            <option
                                                value="{{$mapPassGroup->id}}" {{old('map_pass_group_id') == $mapPassGroup->id ? 'selected' : ''}}>{{$mapPassGroup->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('map_pass_group_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="need_from" class="form-label">फारम भर्ने</label>
                                    <select id="need_from" name="need_from"
                                            class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\Modules\EMap\Enums\EMapFormFillerTypeEnum::cases() as $needFrom)
                                            <option
                                                value="{{$needFrom->value}}" {{old('need_from') == $needFrom->value ? 'selected' : ''}}>{{$needFrom->label()}}</option>
                                        @endforeach

                                    </select>
                                    @error('need_from')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2" id="form">
                                    <label for="route_name" class="form-label">Route name</label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <input type="text" class="form-control personalDetail"
                                               value="{{old('route_name')}}"
                                               name="route_name" id="route_name"/>
                                    </div>
                                    @error('route_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2" id="file">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <label for="files" class="form-label fw-bold">आवश्यक कागजातहरु <span
                                                class="text-danger">*</span></label>
                                        <button type="button" class="btn btn-xs btn-outline-info"
                                                data-target-element="files" data-toggle="add-more">
                                            <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                        </button>
                                    </div>
                                    <fieldset class="bg-soft-secondary">
                                        <div id="files">

                                                <div class="main">
                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                                data-toggle="remove-parent" data-parent=".main"
                                                                data-target-element="files">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="row border-bottom mb-2">
                                                        <div class="col-md-12 mb-2">
                                                            <label for="documents" class="form-label">डकुमेन्ट </label>
                                                            <input type="text" name="fields[0][title]"
                                                                   class="form-control"
                                                                   id="documents" multiple/>
                                                        </div>

                                                        <div class="col-md-12 mb-2">
                                                            <label for="fields.description" class="form-label">डाटा
                                                                *</label>
                                                            <textarea name="fields[0][description]"
                                                                      id="fields.description" required cols="10"
                                                                      rows="1"
                                                                      class="form-control ckEditor @error('description') is-invalid @enderror">{{ old('field') }}</textarea>
                                                            @error('description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection
@push('style')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formType = document.getElementById('form_type');
            const form = document.getElementById('form');
            const file = document.getElementById('file');
            // Add more field variables as needed

            // Function to toggle the visibility of fields based on form_type value
            function toggleFields() {
                const selectedValue = formType.value;

                // Hide all fields initially
                form.classList.add('hidden');
                file.classList.add('hidden');
                // Add more fields to hide as needed

                // Show fields based on the selected value
                if (selectedValue === 'form') {
                    form.classList.remove('hidden');
                } else if (selectedValue === 'file') {
                    file.classList.remove('hidden');
                }
                // Add more conditions to show other fields as needed
            }

            // Initial call to set the initial state based on the form_type value
            toggleFields();

            // Listen for changes in the form_type field
            formType.addEventListener('change', toggleFields);
        });

    </script>
@endpush

