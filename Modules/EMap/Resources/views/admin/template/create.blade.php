@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.eMapTemplate.index',$noticeTypeEnum)}}">
                                टेम्प्लेट
                            </a>
                        </li>
                        <li class="breadcrumb-item active">टेम्प्लेट थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">टेम्प्लेट</h4>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="header-title mb-0">टेम्प्लेट थप्नुहोस्</h4>
                    <a href="{{route('emap.admin.eMapTemplate.index',$noticeTypeEnum)}}"
                       class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-list"></i> टेम्प्लेट सूची
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('emap.admin.eMapTemplate.store',$noticeTypeEnum)}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="title" class="form-label">शिर्षक *</label>
                            <input
                                type="text"
                                name="title"
                                value="{{old('title')}}"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                placeholder="शिर्षक"
                            />
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="form-label">घरधनी/परामर्शदाता/पालिका</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">--- छान्नुहोस् ---</option>
                                @foreach(\Modules\EMap\Enums\EMapFormFillerTypeEnum::cases() as $type)
                                    <option {{old('type')==$type->value ? 'selected':''}}
                                            value="{{$type->value}}">{{$type->label()}}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            @foreach( (new \Modules\EMap\Entities\MapApply())->getTemplateOptions() as $template)
                                <div class="mt-2">
                                    <h4>{{$template['title'] ?? ''}} :</h4>
                                    <div class="button-list">
                                    @foreach($template['data'] as $key=>$templateValue)
                                            <button type="button" class="btn btn-outline-primary btn-xs"
                                                    onclick="copyText('{{$templateValue}}')">
                                                {{$key}}
                                            </button>
                                    @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>Static Template :</h4>
                            <div class="button-list">
                            <button class="btn btn-outline-primary btn-xs getTemplate"
                                    data-bs-type="level">
                                प्लिन्थ लेभलसम्म निर्माण कार्यको ईजाजत पत्र
                            </button>
                            <button class="btn btn-outline-primary btn-xs getTemplate"
                                    data-bs-type="superstructure">
                                भवन निर्माण स्थायी ईजाजत पत्र (Superstructure को लागि)
                            </button>
                            <button class="btn btn-outline-primary btn-xs getTemplate"
                                    data-bs-type="construction-completion-certificate">
                                भवन निर्माण कार्य सम्पन्न प्रमाण-पत्र
                            </button>
                            <button class="btn btn-outline-primary btn-xs getTemplate"
                                    data-bs-type="naksa_certificate">
                                नक्सा प्रमाणित प्रमाण-पत्र
                            </button>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="data" class="form-label">डाटा *</label>
                            <textarea name="data"
                                      id="data"
                                      cols="30" rows="10"
                                      class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data')}}</textarea>
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
    @push('scripts')
        <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>
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
                    const type = button.getAttribute('data-bs-type')
                    $.ajax({
                        type: "POST",
                        url: "{{route('emap.admin.template-emap.get-static-template')}}",
                        data: {
                            type: type
                        },
                        success: function (resp) {
                            editor.setData(resp);
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

