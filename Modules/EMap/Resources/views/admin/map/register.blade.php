@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fa fa-home"></i> गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item ">नक्सा</li>
                    <li class="breadcrumb-item active">नक्सा दर्ता तथा दस्तुर</li>
                </ol>
            </div>
            <h4 class="page-title">नक्सा दर्ता तथा दस्तुर </h4>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title mb-0"> नक्सा दर्ता तथा दस्तुर सम्बन्धि </h4>
                <div class="d-flex gap-1">
                    @if(!empty($mapApply->mapRegistration))
                        <a href="{{route('emap.admin.map.map-apply.map-registration.edit',[$mapApply,$mapApply->mapRegistration])}}"
                           class="btn btn-outline-info btn-sm">
                            <i class="fas fa-edit"></i> सम्पादन
                        </a>
                        <x-print-button
                            target-element="print"
                            title="नक्सा दर्ता तथा दस्तुर सम्बन्धि"
                        />
                    @else
                        <a href="{{route('emap.admin.map.map-apply.map-registration.create',$mapApply)}}"
                           class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-plus"></i> दर्ता गर्नुहोस्
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="print" class="p-1">
                @includeIf('emap::admin.map.map-registration.print')
            </div>
        </div>
    </div>
@endsection
