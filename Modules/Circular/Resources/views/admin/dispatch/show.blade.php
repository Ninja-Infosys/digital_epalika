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
                            <a href="{{route('admin.circular.dispatch.index')}}">चलानी पत्र </a>
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
                        <h4 class="header-title">चलानी पत्र सूची</h4>

                        <a href="{{route('admin.circular.dispatch.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> चलानी पत्र सूची
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="printData">
                        <table class="table table-sm mb-0 table-striped table-hover">

                            <tbody>
                            <tr>
                                <th>चलानी न.</th>
                                <td>{{$dispatch->dispatch_no}}</td>
                            </tr>
                            <tr>
                                <th>आर्थिक वर्ष</th>
                                <td>{{$dispatch->fiscalYear->title??''}}</td>
                            </tr>
                            <tr>
                                <th>चलानी मिति</th>
                                <td>{{$dispatch->dispatch_date}}</td>
                            </tr>
                            <tr>
                                <th>पत्र संख्या.</th>
                                <td>{{$dispatch->letter_number}}</td>
                            </tr>
                            <tr>
                                <th>पत्रको मिति.</th>
                                <td>{{$dispatch->letter_date}}</td>
                            </tr>
                            <tr>
                                <th>पाउने कार्यालयको नाम</th>
                                <td>{{$dispatch->receiver_name}}</td>
                            </tr>
                            <tr>
                                <th>पाउने कार्यालयको ठेगाना</th>
                                <td>{{$dispatch->receiver_address}}</td>
                            </tr>
                            <tr>
                                <th>बिषय.</th>
                                <td>{{$dispatch->subject}}</td>
                            </tr>
                            <tr>
                                <th>हुलाक/ र.न./इमेल.</th>
                                <td>{{$dispatch->receiver_contact}}</td>
                            </tr>
                            <tr>
                                <th>बुझिलिनेको हस्तक्षर्</th>
                                <td>
                                    <img src="{{$dispatch->receiver_signature_url}}" alt="" height="60">
                                </td>
                            </tr>
                            <tr>
                                <th>कैफ़ियत.</th>
                                <td>{{$dispatch->remarks}}</td>
                            </tr>
                            <tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="row">
                        @foreach($dispatch->files as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                    <span style="float: right">
                                        <form action="{{route('admin.file.destroy',$document)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="show_confirm btn btn-sm btn-danger ml-2">
                                                <i class="fa fa-window-close"></i>
                                            </button>
                                        </form>
                                    </span>
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
                </div>

            </div>
        </div>
    </div>
@endsection
