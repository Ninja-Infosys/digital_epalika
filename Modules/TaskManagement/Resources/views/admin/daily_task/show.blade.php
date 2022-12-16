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
                        <li class="breadcrumb-item active">दैनिक कार्य</li>
                    </ol>
                </div>
                <h4 class="page-title">दैनिक कार्य</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm" style="text-align: end">
            <button class="btn btn-sm btn-info"
                    onclick="printJS({
                    printable: 'printData',
                    css: '{{asset('assets/backend/css/print.css')}}',
                    type: 'html'
                    })">
                <i class="fa fa-print"></i> Print
            </button>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दैनिक कार्य विवरण</h4>
                        <a href="{{route('admin.taskManagement.dailyTask.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दैनिक कार्य सूची
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="printData">
                        <table class="table table-sm mb-0 table-striped table-hover">

                            <tbody>
                            <tr>
                                <th>मिति</th>
                                <td>{{$dailyTask->date}}</td>
                            </tr>
                            <tr>
                                <th>आर्थिक वर्ष</th>
                                <td>{{$dailyTask->fiscalYear->title ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>शाखा</th>
                                <td>{{$dailyTask->branch->branch_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>मुख्य कार्य</th>
                                <td>{{$dailyTask->taskCategory->title ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>कार्य</th>
                                <td>{{$dailyTask->taskDivision->title ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>कैफियत</th>
                                <td>{{$dailyTask->remarks}}</td>
                            </tr>
                            <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="row">
                        @foreach($dailyTask->files as $document)
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
                                        @elseif(in_array($document->extension,['png', 'jpg', 'jpeg']))
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
@endsection
