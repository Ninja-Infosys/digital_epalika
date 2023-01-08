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

                        <li class="breadcrumb-item active">निर्णय विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">निर्णय</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">निर्णय विवरण</h4>
                        <div>
                            @can('complaintDecision_edit')
                                <a href="{{ route('admin.judicialCommittee.complaintApplication.complaintDecision.create', $complaintApplication) }}"
                                   class="btn btn-sm btn-outline-warning mx-1">
                                    <i class="fa fa-edit"> सम्पादन गर्नुहोस्</i>
                                </a>
                            @endcan
                            <a href="{{ route('admin.judicialCommittee.registeredApplication') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> दर्ता भएका उजुरी
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $complaintApplication->complaintDecision->description??'' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($complaintApplication->complaintDecision->files??collect() as $document)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('admin.file.destroy',$document)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="show_confirm btn btn-sm btn-danger ml-2">
                                <i class="fa fa-window-close"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        @if($document->extension ==='pdf')
                            <iframe src="{{$document->file_url}}" frameborder="0" width="100%"></iframe>
                        @elseif(($document->extension ==='png') or ($document->extension ==='jpg') or ($document->extension ==='jpeg'))
                            <img src="{{ $document->file_url }}" class="card-image" alt="Image"
                                 height=150px;" width="100%">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
