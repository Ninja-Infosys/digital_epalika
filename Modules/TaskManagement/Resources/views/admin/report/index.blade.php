@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">रिपोर्ट</h4>
            </div>
        </div>
    </div>
    @livewire('taskmanagement::task-report-livewire')
@endsection
