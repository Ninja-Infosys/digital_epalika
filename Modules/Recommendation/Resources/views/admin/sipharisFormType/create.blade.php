@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
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
                        <a href="{{ route('admin.recommendation.sipharish.sipharishFormType.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.recommendation.sipharish.sipharishFormType.store') }}" method="post">
                        @csrf
                        <fieldset>
                            <legend>
                                <h4 class="text-info">सिफारिस फाराम</h4>
                            </legend>
                            <div class="row">
                                <div class="col-md-8">
                                    @livewire('category', [
                                            'sipharis_category_id' => old('sipharis_category_id'),
                                            'sipharis_sub_category_id' => old('sipharis_sub_category_id')
                                            ])
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="title" class="form-label">शिर्षक <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="शिर्षक"/>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="status" class="form-label">स्थिति <span class="text-danger">*</span></label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <select id="personal_detail_id" name="status"
                                                class="form-select personalDetail">
                                            <option value="">-- छान्नुहोस् --</option>
                                            <option value="1" {{old('status') == 1?'selected':''}}>Active</option>
                                            <option value="0" {{old('status') == 0?'selected':''}}>Inactive</option>
                                        </select>

                                    </div>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="need_approval" class="form-label">सुइकृती चहिन्छ <span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <select id="need_approval" name="need_approval"
                                                class="form-select personalDetail">
                                            <option value="">-- छान्नुहोस् --</option>
                                            <option value="1" {{old('need_approval') == 1?'selected':''}}>Yes</option>
                                            <option value="0" {{old('need_approval') == 0?'selected':''}}>No</option>
                                        </select>

                                    </div>
                                    @error('need_approval')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                @livewire('sipharish-form-type-livewire')
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                पेश गर्नुहोस्
                            </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @includeIf('recommendation::admin.registration.inc.file')

@endsection
