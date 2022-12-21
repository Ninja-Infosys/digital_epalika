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
                        <li class="breadcrumb-item active"> {{$recommendation->name ?? ''}} हेर्नुहोस </li>
                    </ol>
                </div>
                <h4 class="page-title">{{$recommendation->name ?? ''}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{$recommendation->name ?? ''}}</h4>
                        <a href="{{ route('admin.recommendation.recommendation.index', $applicationTypeEnum) }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> {{ $applicationTypeEnum->label() }} सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>नाम</th>
                            <td>{{$recommendation->name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>मिति</th>
                            <td>{{$recommendation->date_ne ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>आर्थिक वर्ष</th>
                            <td>{{$recommendation->fiscalYear->title ?? ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="formio-form"></div>
                            </td>
                        </tr>
                    </table>
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
            $(document).ready(function () {
                Formio.createForm(document.getElementById('formio-form'), {!! $definition->form !!}, {readOnly: true}).then(function (form) {
                    form.submission = {
                        data: {!! $recommendation->data !!},
                    };
                });
            });
        </script>
    @endpush
@endsection
