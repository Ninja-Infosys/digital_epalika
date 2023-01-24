@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.planTemplate.index')}}">
                                टेम्प्लेट
                            </a>
                        </li>
                        <li class="breadcrumb-item active">टेम्प्लेट विवरण सम्पादन गर्नुहोस्</li>
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
                        <h4 class="header-title">टेम्प्लेट विवरण सम्पादन गर्नुहोस्</h4>
                        <a href="{{route('admin.plan.planTemplate.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> टेम्प्लेट सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.planTemplate.update',$planTemplate)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title',$planTemplate->title)}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="शिर्षक "
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="template_for" class="form-label">उपभोक्ता समिति/बोलपत्र(टेन्डर) को लागि</label>
                                <select name="template_for" id="type" class="form-control">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach(\Modules\Plan\Enums\ProjectOperatedThroughEnum::cases() as $operatedThroughEnum)
                                        <option {{old('template_for',$planTemplate->template_for?->value)==$operatedThroughEnum->value ? 'selected':''}}
                                                value="{{$operatedThroughEnum->value}}">
                                            {{$operatedThroughEnum->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('template_for')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="type" class="form-label">टेम्प्लेट</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach(\Modules\Plan\Enums\PlanTemplateTypeEnum::cases() as $templateType)
                                        <option {{old('type',$planTemplate->type?->value)==$templateType->value ? 'selected':''}}
                                                value="{{$templateType->value}}">
                                            {{$templateType->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">

                                @foreach( (new \Modules\Plan\Entities\Project())->getTemplateOptions() as $template)
                                    <div class="col-md-12 mt-1">
                                        <h6>{{$template['title'] ?? ''}}</h6>
                                    </div>
                                    <div class="col-md-12">
                                        @foreach($template['data'] as $key=>$templateValue)
                                            <a style="cursor: pointer" class="badge badge-outline-primary text-primary"
                                               onclick="copyText('{{$templateValue}}')">
                                                {{$key}}
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="data" class="form-label">डाटा *</label>
                                <textarea name="data"
                                          id="data"
                                          cols="30" rows="10"
                                          class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data',$planTemplate->data)}}</textarea>
                                @error('data')
                                <div class="invalid-feedback">{{$message}}</div>
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
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
        <script>

            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.getTemplate').on('click', function (event) {
                    event.preventDefault();

                    const button = event.target
                    // Extract info from data-bs-* attributes
                    const type = button.getAttribute('data-bs-type')

                    $.ajax({
                        type: "POST",
                        url: "{{route('emap.admin.template-emap.get-static-template')}}",
                        data: {
                            type: type
                        },
                        success: function (resp) {
                            CKEDITOR.instances.data.setData(resp);
                        },
                        error: function () {
                            alert("Something Went Wrong");
                        },
                        timeout: 10000
                    });
                });
            });
        </script>
    @endpush
@endsection

