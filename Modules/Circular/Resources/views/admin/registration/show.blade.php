@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.registration.index')}}"> दर्ता पत्र </a>
                        </li>
                        <li class="breadcrumb-item active">दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता प्रणाली</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दर्ता पत्र सूची</h4>

                        <a href="{{route('admin.circular.registration.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्ता पत्र सूची
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped table-hover">

                                    <tbody>
                                    <tr>
                                        <th>दर्ता न.</th>
                                        <td>{{$registration->registration_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>आर्थिक वर्ष</th>
                                        <td>{{$registration->fiscalYear->title??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>दर्ता मिति</th>
                                        <td>{{$registration->registration_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>पत्र संख्या.</th>
                                        <td>{{$registration->letter_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>पत्रको मिति.</th>
                                        <td>{{$registration->letter_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>पठाउने कार्यालयको नाम.</th>
                                        <td>{{$registration->sender_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>बिषय.</th>
                                        <td>{{$registration->subject}}</td>
                                    </tr>
                                    <tr>
                                        <th>कैफ़ियत.</th>
                                        <td>{{$registration->remarks}}</td>
                                    </tr>
                                    <tr>
                                        <th>बुझिलिनेको नाम</th>
                                        <td>{{$registration->receiver_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>बुझिलिनेको सम्पर्क नम्बर.</th>
                                        <td>{{$registration->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>बुझिलिनेको सहि.</th>
                                        <td><img src="{{$registration->signature_image_url}}" alt=""
                                                 height="60px;"></td>
                                    </tr>
                                    <tr>
                                        <th> मिति.</th>
                                        <td>{{$registration->date}}</td>
                                    </tr>
                                    <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($registration->files as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header ">
                                        <a href="{{route('admin.file-url-download', ['file_url'=>$document->file])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <form action="{{route('admin.file.destroy',$document)}}" style="float: right"
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
                </div>
            </div>
        </div>
    </div>
@endsection
