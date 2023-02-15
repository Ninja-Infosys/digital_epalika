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
                        <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                        <a href="{{ route('admin.recommendation.registrationDetail.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    नाम
                                </td>
                                <td>
                                     - <b>{{$registrationDetail->personalDetail->name??''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    सिफारिस
                                </td>
                                <td>
                                     - <b>{{$registrationDetail->recommendationCategory->title??''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    दर्ता नं.
                                </td>
                                <td>
                                     - <b>{{$registrationDetail->registration_no??''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    मिति
                                </td>
                                <td>
                                     - <b>{{$registrationDetail->date_ne??''}}</b>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">फाईलहरु</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($registrationDetail->files->where('type','OcFile') as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{route('admin.file-url-download', ['file_url'=>$document->getRawOriginal('file')])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        @if($document->extension ==='pdf')
                                            <iframe src="{{$document->file_url}}" frameborder="0"
                                                    width="100%"></iframe>
                                        @elseif(($document->extension ==='png') or ($document->extension ==='jpg') or ($document->extension ==='jpeg'))
                                            <img src="{{ $document->file_url }}" class="card-image" alt="Image"
                                                 height=150px;" width="100%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अन्य फाईलहरु</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($registrationDetail->files->where('type','ClientFile') as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <a href="{{route('admin.file-url-download', ['file_url'=>$document->getRawOriginal('file')])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <p>{{$document->file_name}}</p>
                                    </div>
                                    <div class="card-body">
                                        @if($document->extension ==='pdf')
                                            <iframe src="{{$document->file_url}}" frameborder="0"
                                                    width="100%"></iframe>
                                        @elseif(($document->extension ==='png') or ($document->extension ==='jpg') or ($document->extension ==='jpeg'))
                                            <img src="{{ $document->file_url }}" class="card-image" alt="Image"
                                                 height=150px;" width="100%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>
                        <x-print-button
                            target-element="print"
                            title="{{$registrationDetail-> date_ne}}"
                        />
                    </div>
                </div>
                <div class="card-body">
                    <div id="print" class="p-1">
                        {!! $registrationDetail->recommendation_data !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
