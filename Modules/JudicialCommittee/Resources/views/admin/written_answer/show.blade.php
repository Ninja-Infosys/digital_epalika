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

                        <li class="breadcrumb-item active">लिखित जवाफ विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">लिखित जवाफ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">लिखित जवाफ विवरण</h4>
                        <a href="{{ route('admin.judicialCommittee.registeredApplication') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्ता भएका उजुरी
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>पेश मिति</th>
                                <td>{{$writtenAnswer->submitted_date}}</td>
                            </tr>
                            <tr>
                                <th>विवरण</th>
                                <td>
                                    {!! $writtenAnswer->description !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($writtenAnswer->files as $document)
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
