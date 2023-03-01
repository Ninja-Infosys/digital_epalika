@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.listRegistrations.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.listRegistrations.listRegistration.index') }}">सुची दर्ता प्रणालि</a>
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
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">मौजुदा सुची दर्ताहरु</h4>
                    <a href="{{ route('admin.listRegistrations.listRegistration.index') }}"
                        class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-list"></i> मौजुदा सूची
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped table-hover table-bordered">

                                    <tbody>
                                        <tr>
                                            <th>दर्ता न.</th>
                                            <td>{{ $listRegistration->registration_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>प्रकार</th>
                                            <td>{{ $listRegistration->applicant_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>नाम.</th>
                                            <td>{{ $listRegistration->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>ठेगाना.</th>
                                            <td>{{ $listRegistration->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>पत्राचार गर्ने ठेगाना.</th>
                                            <td>{{ $listRegistration->mailing_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>मुख्य व्यक्तिको नाम.</th>
                                            <td>{{ $listRegistration->main_person }}</td>
                                        </tr>
                                        <tr>
                                            <th>टेलिफोन नम्बर.</th>
                                            <td>{{ $listRegistration->telephone }}</td>
                                        </tr>
                                        <tr>
                                            <th>मोबाइल नम्बर</th>
                                            <td>{{ $listRegistration->mobile_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>मिति</th>
                                            <td>
                                                {{ $listRegistration->date }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h4 class="header-title text-decoration-underline mt-3">आवश्यक कागजातहरु</h4>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <div class="container">
                                <img src="{{ $listRegistration->application_photo }}" class="figure-img img-fluid rounded"
                                    alt="">
                                <div class="bottom-left">निवेदक /अनुसूची</div>
                                <div class="top-right"><a
                                        href="{{ route('admin.file-url-download', ['file_url' => $listRegistration->getRawOriginal('application_photo')]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="container">
                                <img src="{{ $listRegistration->registration_certificate }}"
                                    class="figure-img img-fluid rounded" alt="">
                                <div class="bottom-left">संस्था वा फार्म दर्ताको प्रमाण पत्र</div>
                                <div class="top-right">
                                    <a href="{{ route('admin.file-url-download', ['file_url' => $listRegistration->getRawOriginal('registration_certificate')]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="container">
                                <img src="{{ $listRegistration->pan_photo }}" class="figure-img img-fluid rounded"
                                    alt="">
                                <div class="bottom-left">स्थायी लेखा नम्बर(PAN)</div>
                                <div class="top-right">
                                    <a href="{{ route('admin.file-url-download', ['file_url' => $listRegistration->getRawOriginal('pan_photo')]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="container">
                                <img src="{{ $listRegistration->tax_payment_certificate }}"
                                    class="figure-img img-fluid rounded" alt="">
                                <div class="bottom-left">कर चुक्ता प्रमाण पत्र</div>
                                <div class="top-right">
                                    <a href="{{ route('admin.file-url-download', ['file_url' => $listRegistration->getRawOriginal('tax_payment_certificate')]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="container">
                                <img src="{{ $listRegistration->license_photo }}" class="figure-img img-fluid rounded"
                                    alt="">
                                <div class="bottom-left">कुन खरिद को लागि सुची दर्ता हुन निबेदन दिने हो सो को लागि इजाजत
                                    पत्र</div>
                                <div class="top-right">
                                    <a href="{{ route('admin.file-url-download', ['file_url' => $listRegistration->getRawOriginal('license_photo')]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr" />

                    <h4 class="mt-4 text-decoration-underline">अन्य फाइलहरु</h4>
                    <div class="row mt-3">
                        @foreach ($listRegistration->files as $document)
                        <div class="col-md-4 mb-3">
                            <div class="container">
                                @if ($document->extension === 'pdf')
                                    <iframe src="{{ $document->file_url }}" frameborder="0" width="100%"></iframe>
                                @elseif($document->extension === 'png' or $document->extension === 'jpg' or $document->extension === 'jpeg')
                                    <img src="{{ $document->file_url }}" class="figure-img img-fluid rounded"
                                        alt="" height="60px;" width="100%">
                                @endif
                                <div class="bottom-left">{{ $document->file_name }}</div>
                                <div class="top-right d-flex justify-content-around">
                                    <a href="{{ route('admin.file-url-download', ['file_url' => $document->file]) }}"
                                        class="btn btn-xs btn-outline-primary mx-1 bg-primary">
                                        <i class="fa fa-download text-white"></i>
                                    </a>
                                    <form action="{{ route('admin.file.destroy', $document) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="show_confirm btn btn-sm btn-danger ml-2">
                                            <i class="fa fa-window-close"></i>
                                        </button>
                                    </form>
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
            .container {
                position: relative;
                text-align: center;
                color: rgb(249, 249, 249);
                font-size: 16px
            }

            .bottom-left {
                position: absolute;
                bottom: 15px;
                left: 16px;
                background: rgba(0, 0, 0, 0.7);
            }

            .top-right {
                position: absolute;
                top: 8px;
                right: 16px;
            }
        </style>
    @endpush
@endsection
