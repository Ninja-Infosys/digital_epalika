@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> मोविलाईजेशन पेश्की/रनिङ विल विवरण </li>
                    </ol>
                </div>
                <h4 class="page-title">मोविलाईजेशन पेश्की/रनिङ विल विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @livewire('plan::bid-submission-livewire',['project'=>$project])
        </div>
    </div>
@endsection
