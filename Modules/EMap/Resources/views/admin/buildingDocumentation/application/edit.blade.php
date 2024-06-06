@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> भवन अभिलेखिकरण
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">दर्खास्त निवेदन
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> दर्खास्त निवेदन सम्पादन गर्नुहोस्</h4>
                        <a href="{{route('emap.admin.buildingDocumentation.index',$buildingDocumentation)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्खास्त निवेदन सूची
                        </a>
                    </div>
                </div>
                @livewire('emap::building-documentation-livewire',['buildingDocumentation'=>$buildingDocumentation])
            </div>
        </div>
    </div>
@endsection
