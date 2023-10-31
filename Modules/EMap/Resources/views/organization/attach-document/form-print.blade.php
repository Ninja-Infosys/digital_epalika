@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('organization.admin.dashboard') }}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $formDataType ->model?->title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $formDataType ->model?->title }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0"></h4>
                        <button class="btn btn-sm btn-info"
                        onclick="printJS({
                        printable: 'printData',
                        targetStyles: ['*'],
                        ignoreElements:['ignore-header'],
                        type: 'html'
                        })">
                    <i class="fa fa-print"></i> प्रिन्ट गर्नुहोस
                </button>
                    </div>
                </div>
                <div class="card-body"  id="printData">
                    {!! $template !!}
                </div>
            </div>
        </div>
    </div>

@endsection
