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
                        <li class="breadcrumb-item active">योजना/कार्यक्रम विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">योजना/कार्यक्रम विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">१) आयोजनाको विवरण</h4>
                </div>
                <div class="card-body">
                    @livewire('plan::project-detail-livewire',['project'=>$project])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">२. आयोजनाको लागत सम्वन्धि विवरण</h4>
                </div>
                <div class="card-body">
                    @livewire('plan::project-cost-detail-livewire',['project_id'=>$project->id])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">३. उपभोक्ता समिति/समुदायमा आधारित संस्था/गैरसरकारी संस्थाको विवरण</h4>
                </div>
                <div class="card-body">
                    @livewire('plan::consumer-committee-livewire',['project_id'=>$project->id])
                </div>
            </div>
        </div>
    </div>
@endsection
