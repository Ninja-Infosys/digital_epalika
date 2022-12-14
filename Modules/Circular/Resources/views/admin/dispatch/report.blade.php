@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">चलानी</li>
                    </ol>
                </div>
                <h4 class="page-title">चलानी प्रणाली</h4>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <a href="{{route('admin.circular.dispatch.index')}}" class="btn btn-danger rounded-pill waves-effect waves-light mb-3">
                <i class="fa fa-plus"></i> पत्र चलानी</a>
        </div>
        <div class="col-sm-8">
            <div class="text-sm-end">
                <div class="btn-group mb-3">
                    <button class="btn btn-info float-right">
                        <i class="fa fa-file-excel"></i> Export Excel
                    </button>
                </div>
                <div class="btn-group mb-3">
                    <x-print-button title="{{$officeSetting->localBody->local_body ?? ''}}को पत्र चलानी रिपोर्ट"/>
                </div>
            </div>
        </div><!-- end col-->
    </div>
    <livewire:circular::dispatch-report />

@endsection
