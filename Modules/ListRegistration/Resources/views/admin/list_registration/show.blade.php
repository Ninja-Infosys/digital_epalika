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
                            <a href="{{route('admin.listRegistrations.listRegistration.index')}}">सुची दर्ता प्रणालि</a>
                        </li>
                        <li class="breadcrumb-item active">मौजुदा सुची दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">मौजुदा सुची दर्ता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मौजुदा सुची दर्ताहरु</h4>

                        <a href="{{route('admin.listRegistrations.listRegistration.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> मौजुदा सूची
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
                                        <td>{{$listRegistration->registration_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>प्रकार</th>
                                        <td>{{$listRegistration->applicant_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>नाम.</th>
                                        <td>{{$listRegistration->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>ठेगाना.</th>
                                        <td>{{$listRegistration->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>पत्राचार गर्ने ठेगाना.</th>
                                        <td>{{$listRegistration->mailing_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>मुख्य व्यक्तिको नाम.</th>
                                        <td>{{$listRegistration->main_person}}</td>
                                    </tr>
                                    <tr>
                                        <th>टेलिफोन नम्बर.</th>
                                        <td>{{$listRegistration->telephone}}</td>
                                    </tr>  <tr>
                                        <th>मोबाइल नम्बर</th>
                                        <td>{{$listRegistration->mobile_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>निवेदक /अनुसूची</th>
                                        <td>
                                            <img src="{{$listRegistration->application_photo_url}}" alt="" height="60px;">
                                            <a href="{{route('admin.file-url-download', $listRegistration->application_photo)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i> डाउनलोड
                                            </a>
                                        </td>
                                    </tr>  <tr>
                                        <th>संस्था वा फार्म दर्ताको प्रमाण पत्र.</th>
                                        <td><img src="{{$listRegistration->registration_certificate_url}}" alt="" height="60px;">
                                            <a href="{{route('admin.file-url-download', $listRegistration->registration_certificate)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i> डाउनलोड
                                            </a>
                                        </td>
                                    </tr>  <tr>
                                        <th>स्थायी लेखा नम्बर(PAN)</th>
                                        <td>
                                            <img src="{{$listRegistration->pan_photo_url}}" alt="" height="60px;">
                                            <a href="{{route('admin.file-url-download', $listRegistration->pan_photo)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i> डाउनलोड
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>कर चुक्ता प्रमाण पत्र</th>
                                        <td>
                                            <img src="{{$listRegistration->tax_payment_certificate_url}}" alt="" height="60px;">
                                            <a href="{{route('admin.file-url-download', $listRegistration->tax_payment_certificate)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i> डाउनलोड
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>कुन खरिद को लागि सुची दर्ता हुन निबेदन दिने हो सो को लागि इजाजत पत्र</th>
                                        <td>
                                            <img src="{{$listRegistration->license_photo_url}}" alt="" height="60px;">
                                            <a href="{{route('admin.file-url-download', $listRegistration->license_photo)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i> डाउनलोड
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>मिति</th>
                                        <td>
                                            {{$listRegistration->date}}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($listRegistration->files as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                    <span style="display: flex;justify-content: space-between;">
                                        <p>{{$document->file_name}}</p>
                                        <form action="{{route('admin.file.destroy',$document)}}" method="post">
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
                                            <img src="{{ $document->file_url }}" class="card-image" alt="Image" height=150px;" width="100%">
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
    @push('style')
        <style>
            tbody, td, tfoot, th, thead, tr{
                font-family: Kalimati, serif;
            }
        </style>
    @endpush
@endsection
