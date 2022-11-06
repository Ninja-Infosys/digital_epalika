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
                            <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.index')}}">टेम्प्लेट </a>
                        </li>
                        <li class="breadcrumb-item active">टेम्प्लेट</li>
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
                        <h4 class="header-title">टेम्प्लेट सम्पादन गर्नुहोस</h4>
                        <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> टेम्प्लेट सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.update',$businessRegistrationTemplate)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> टेम्प्लेट</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="form-label">शिर्षक *</label>
                                    <input
                                        type="text"
                                        name="title"
                                        value="{{old('title',$businessRegistrationTemplate->title)}}"
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
                                            <option value="{{$templateType->value}}"{{old('for',$templateType->value)==$businessRegistrationTemplate->for->value ? 'selected':''}}>{{$templateType->label()}}
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
                                        id="requires_header" {{ old('requires_header',$businessRegistrationTemplate->requires_header) === 1 ?'checked':'' }}
                                    />
                                    <label for="requires_header" class="form-label">Header *</label>
                                    @error('requires_header')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="data" class="form-label">डाटा *</label>
                                    <textarea name="data" id="data" cols="30" rows="10" class="form-control">{{old('data',$businessRegistrationTemplate->data)}}</textarea>
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

