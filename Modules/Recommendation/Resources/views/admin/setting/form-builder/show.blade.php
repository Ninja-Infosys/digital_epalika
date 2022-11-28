@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.setting.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.setting.formBuilder.index',$applicationTypeEnum) }}">फारम बिल्डर</a>
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
                        <a href="{{ route('admin.recommendation.setting.formBuilder.index',$applicationTypeEnum) }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> फारम बिल्डर सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="formio-form"></div>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>

        <script>
            $(document).ready(function() {
                // The third param's readOnly flag turns off buttons & marks all fields as readonly.
                Formio.createForm(document.getElementById('formio-form'),
                        {!! $formBuilder->form !!}, {
                            readOnly: false
                        })
                    .then(function(form) {
                        form.submission = {
                            data: {!! $data !!},
                        };
                    });
            });
        </script>
    @endpush
@endsection
