@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.setting.formBuilder.index')}}">फारम बिल्डर</a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ फारम बिल्डर थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">फारम बिल्डर थप्नुहोस्</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">फारम बिल्डर थप्नुहोस्</h4>
                        <a href="{{route('admin.recommendation.setting.formBuilder.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> फारम बिल्डर सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.recommendation.setting.formBuilder.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form" id="form" value="">
                        <div class=" col-md-12 p-2 mb-2">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="application_type" class="form-label">सिफारिसको प्रकार *</label>
                                    <select name="application_type" id="application_type"
                                            class="form-control @error('application_type') is-invalid @enderror">
                                        <option value="">छान्नुहोस्</option>
                                        @foreach(\Modules\Recommendation\Enums\ApplicationTypeEnum::cases() as $applicationTypeEnum)
                                            <option
                                                value="{{$applicationTypeEnum->value}}" {{old('application_type')===$applicationTypeEnum->value ? 'selected':''}}>{{$applicationTypeEnum->label()}}</option>
                                        @endforeach
                                    </select>
                                    @error('application_type')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="formio-builder"></div>
                        <button type="submit" class="btn btn-primary">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>

        <script lang="text/javascript">
            window.onload = function () {
                Formio.icons = 'fontawesome';
                new Formio.builder(
                    document.getElementById('formio-builder'),
                    @if(old('form')) {!! old('form') !!} @else
                {
                } @endif,
                {
                } // these are the opts you can customize
            ).
                then(function (builder) {
                    // Exports the JSON representation of the dynamic form to that form we defined above
                    document.getElementById('form').value = JSON.stringify(builder.schema);

                    builder.on('change', function (e) {
                        // On change, update the above form w/ the latest dynamic form JSON
                        document.getElementById('form').value = JSON.stringify(builder.schema);
                    })
                });
            };
        </script>
    @endpush
@endsection
