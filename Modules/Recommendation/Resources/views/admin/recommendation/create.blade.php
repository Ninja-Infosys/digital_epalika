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
                            <a href="{{ route('admin.recommendation.recommendation.list') }}">सिफारिस</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('admin.recommendation.recommendation.index', $applicationTypeEnum) }}">{{ $applicationTypeEnum->label() }}</a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ {{ $applicationTypeEnum->label() }} थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $applicationTypeEnum->label() }} थप्नुहोस्</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{ $applicationTypeEnum->label() }} थप्नुहोस्</h4>
                        <a href="{{ route('admin.recommendation.recommendation.index', $applicationTypeEnum) }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> {{ $applicationTypeEnum->label() }} सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p style="font-size: 16pt"><strong>Oops</strong>, there was an issue with that.</p>
                            <ul class="ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.recommendation.recommendation.store', $applicationTypeEnum) }}"
                        method="post" enctype="multipart/form-data" id="submissionForm">
                        @csrf
                        <div class="col-md-12 mb-2">
                            <label for="name" class="form-label">सेवा ग्राहीको नाम *</label>
                            <input
                                type="text"
                                name="name"
                                value="{{old('name')}}"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                placeholder="सेवा ग्राहीको नाम"
                            />
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <x-date-input-component
                                nameNe="date_ne" labelNe="मिति *"
                                nameEn="date_en" labelEn="Date"
                            />
                        </div>
                        <div class=" col-md-12 p-2 mb-2">

                            <input type="hidden" name="state">

                            <input type="hidden" name="submissionValues" id="submissionValues" value="">
                        </div>
                        <div id="formio-form"></div>
                    </form>
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
                Formio.createForm(document.getElementById('formio-form'), {!! $definition->form !!})
                    .then(function(form) {
                        form.submission = {
                            data: {!! $data !!},
                        };

                        form.on('submit', function(submission) {
                            var submitForm = document.getElementById('submissionForm');
                            submitForm.querySelector('input[name=state]').value = submission.state;
                            submitForm.querySelector('input[name=submissionValues]').value = JSON.stringify(
                                submission.data);
                            submitForm.submit();
                        });
                    });
            });
        </script>
    @endpush
@endsection
