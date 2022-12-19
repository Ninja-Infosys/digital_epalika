@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.recommendation.create', $applicationTypeEnum) }}">
                                <i class="fa fa-home"></i> सिफारिस
                            </a>
                        </li>

                        <li class="breadcrumb-item active">{{ $applicationTypeEnum->label() }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $applicationTypeEnum->label() }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{ $applicationTypeEnum->label() }} सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.recommendation.create', $applicationTypeEnum) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                </div>
            <div id="printData" class="ckEditor">
                {!! $resolvedData ?? '' !!}
            </div>

            <div class="card-body">
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/print.js')}}"></script>
        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush
@endsection
