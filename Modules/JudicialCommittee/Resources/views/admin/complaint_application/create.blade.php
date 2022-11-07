@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">मुख्य न्यायिक सदस्य</li>
                    </ol>
                </div>
                <h4 class="page-title">मुख्य न्यायिक सदस्य</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मुख्य न्यायिक सदस्य थप्नुहोस </h4>
                        <a href="{{route('admin.judicialCommittee.complaintApplication.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> मुख्य न्यायिक सदस्य सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('judicialcommittee::complaint-application-livewire')
                </div>
            </div>
        </div>
    </div>
@endsection
