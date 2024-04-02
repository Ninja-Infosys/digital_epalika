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
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.necessaryDocument.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> आवश्यक कागजात सूची
                            </a>
                        </li>
                        <li class="breadcrumb-item active">आवश्यक कागजात </li>
                    </ol>
                </div>
                <h4 class="page-title">आवश्यक कागजात </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> आवश्यक कागजात विवरण</h4>

                        <a href="{{ route('emap.admin.necessaryDocument.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> आवश्यक कागजात सूची 
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">

                                    <tbody>
                                    <tr>
                                        <th>शिर्षक</th>
                                        <td>{{$necessaryDocument->title}}</td>
                                    </tr>
                                   
                                    
                                    <tr>
                                        <th>बिवरण</th>
                                        <td>{!! $necessaryDocument->description !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                @foreach($necessaryDocument->files as $document)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            
                                            <div class="card-header" style="width: 700px;">
                                                आवश्यक कागजात 
                                                <form action="{{route('admin.file.destroy',$necessaryDocument)}}"
                                                      style="float: right"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            class="show_confirm btn btn-sm btn-danger ml-2">
                                                        <i class="fa fa-window-close"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            
                                            <div class="card-body">
                                               @if($document->extension ==='pdf')
                                                    <iframe src="{{$document->file_url}}" frameborder="0"
                                                            width="700px;" height="500px"></iframe>
                                                @elseif(($document->extension ==='png') or ($document->extension ==='jpg') or ($document->extension ==='jpeg'))
                                                    <img src="{{ $document->file_url }}" class="card-image" alt="Image"
                                                         height="150px;" width="100%">
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
        </div>
@endsection
