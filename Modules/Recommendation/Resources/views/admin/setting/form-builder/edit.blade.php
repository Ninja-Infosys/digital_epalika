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
                            <a href="{{route('admin.recommendation.setting.formBuilder.index',$applicationTypeEnum)}}">फारम बिल्डर</a>
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
                        <a href="{{route('admin.recommendation.setting.formBuilder.index',$applicationTypeEnum)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> फारम बिल्डर सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.recommendation.setting.formBuilder.update',[$applicationTypeEnum,$formBuilder])}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 mb-2">
                            <label for="title" class="form-label">शिर्षक *</label>
                            <input
                                type="text"
                                name="title"
                                value="{{old('title',$formBuilder->title)}}"
                                class="form-control @error('title') is-invalid @enderror"
                                id="name"
                                placeholder="शिर्षक"
                            />
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="form" id="form" value="">
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
                    @if(old('form',$formBuilder->form)) {!! old('form',$formBuilder->form) !!} @else
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
