@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">भवन अभिलेखिकरण मर्यादाक्रम </li>
                        <li class="breadcrumb-item active">नयाँ भवन अभिलेखिकरण मर्यादाक्रम </li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ भवन अभिलेखिकरण मर्यादाक्रम </h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ भवन अभिलेखिकरण मर्यादाक्रम दर्ता गर्नुहोस</h4>
                        <a href="{{ route('emap.admin.buildingDocumentationStep.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> भवन अभिलेखिकरण मर्यादाक्रम  सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('emap::building-documentation-step-livewire',['formData'=>$buildingDocumentationStep])


                </div>
            </div>

        </div>
    </div>

@endsection

