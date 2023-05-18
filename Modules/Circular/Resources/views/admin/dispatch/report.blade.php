@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.circular.dispatch.index') }}">चलानी पत्र </a>
                        </li>
                        <li class="breadcrumb-item active">चलानी</li>
                    </ol>
                </div>
                <h4 class="page-title">चलानी पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm" style="text-align: end">

        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">चलानी पत्र विवरण</h4>

                        <a href="{{ route('admin.circular.dispatch.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> चलानी पत्र सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="printData">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="header-title mb-0">आवश्यक कागजातहरु</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($dispatch->files as $document)

                @empty
                    <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                @endforelse
            </div> <!-- end row-->
        </div>
        @include('admin.inc.file-view');
    </div>
@endsection
