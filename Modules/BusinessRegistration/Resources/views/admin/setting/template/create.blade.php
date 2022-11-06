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
                            <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.index')}}">कारोबार
                                गर्ने वस्तु उप श्रेणी </a>
                        </li>
                        <li class="breadcrumb-item active">कारोबार गर्ने वस्तु उप श्रेणी</li>
                    </ol>
                </div>
                <h4 class="page-title">कारोबार गर्ने वस्तु उप श्रेणी</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कारोबार गर्ने वस्तु उप श्रेणी थप्नुहोस्</h4>
                        <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कारोबार गर्ने वस्तु उप श्रेणी सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.store')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> कारोबार गर्ने वस्तु उप श्रेणी</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="form-label">शिर्षक *</label>
                                    <input
                                        type="text"
                                        name="title"
                                        value="{{old('title')}}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title"
                                        placeholder="शिर्षक "
                                    />
                                    @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="for" class="form-label">टेम्प्लेट *</label>
                                    <select name="for" id="for" class="form-control">
                                        <option value="">छान्नुहोस्</option>
                                        @foreach(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::cases() as $templateType)
                                            <option
                                                value="{{$templateType->value}}"{{old('for')==$templateType->value ? 'selected':''}}>{{$templateType->label()}}
                                            </option>
                                        @endforeach
                                        @error('for')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input
                                        type="checkbox"
                                        name="requires_header"
                                        value="1"
                                        class="form-check-input @error('requires_header') is-invalid @enderror"
                                        id="requires_header" {{ old('requires_header') === 1 ?'checked':'' }}
                                    />
                                    <label for="requires_header" class="form-label">Header *</label>
                                    @error('requires_header')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="row">

                                    @foreach( (new Modules\BusinessRegistration\Entities\ProprietorDetail)->getTemplateOptions() as $template)
                                        <div class="col-md-12">
                                            <h6>{{$template['title'] ?? ''}}</h6>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                @forelse($template['data'] as $key=>$templateValue)
                                                    <button class="col-md-2 btn btn-primary btn-sm m-1" type="button"
                                                            onclick="copyText('{{$templateValue}}')">{{$key}}</button>
                                                @empty
                                                    <button class="col-md-2 btn btn-primary btn-sm m-1" type="button">दाटा छैन</button>
                                                @endforelse

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="data" class="form-label">डाटा *</label>
                                    <textarea name="data" id="data" cols="30" rows="10"
                                              class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data')}}</textarea>
                                    @error('data')
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
    @push('scripts')
        <script src="{{asset('assets/backend/js/ckEditor.min.js')}}"></script>
        <script src="{{asset('assets/backend/js/ckEditor.js')}}"></script>
        <script>
            function copyText(text) {
                navigator.clipboard.writeText(text);
            }
        </script>
    @endpush
@endsection

