@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grant.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ दर्ता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                        <a href="{{ route('admin.recommendation.registrationDetail.index') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्ता सुची
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="text-start mt-3">

                                    <p class="mb-2 font-15"><strong>प्रयोगकर्ता आ.ई.डी :</strong> <span
                                            class="ms-2">{{ $registrationDetail->user->name ?? '' }}</span>
                                    </p>
                                    <p class="mb-2 font-15"><strong>व्यक्तिगत विवरण आ.ई.डी :</strong><span
                                            class="ms-2">{{ $registrationDetail->personalDetail->name ?? '' }}</span></p>

                                    <p class="mb-2 font-15"><strong>सिफारिस आ.ई.डी:</strong> <span
                                            class="ms-2">{{ $registrationDetail->recommendationCategory->title ?? '' }}</span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="mt-2 text-black">{{ $registrationDetail->name }}</h4>
                                <div class="text-start mt-3">

                                    <p class="mb-2 font-15"><strong>दर्ता नं :</strong> <span
                                            class="ms-2">{{ $registrationDetail->registration_no }}</span>
                                    </p>
                                    <p class="mb-2 font-15"><strong>मिति :</strong><span
                                            class="ms-2">{{ $registrationDetail->date_ne }}</span></p>

                                    <p class="mb-2 font-15"><strong>सिफारिस :</strong> <span
                                            class="ms-2">{{ $registrationDetail->recommendation }}</span></p>
                                    <p class="mb-2 font-15"><strong>निवेदन :</strong><span>
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                                <i class="fa fa-download"></i>
                                            </button></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
