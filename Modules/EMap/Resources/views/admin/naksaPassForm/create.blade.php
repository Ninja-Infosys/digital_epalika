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
                        <li class="breadcrumb-item active">सिफारिस</li>
                        <li class="breadcrumb-item active">नयाँ सिफारिस</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ सिफारिस</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                        <a href="{{ route('admin.recommendation.recommendationCategory.registrationDetail.index','') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                
                            
                                @livewire('emap::naksa-form', [
                                    'title' =>  old('title'),
                                    'order' =>  old('order'),
                                    'form_type' =>  old('form_type'),
                                    'need_from' =>  old('need_from'),
                                    'map_pass_group_id' =>  old('map_pass_group_id'),
                                    'fields' =>  old('fields'),
                                    ])
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>
@endpush

