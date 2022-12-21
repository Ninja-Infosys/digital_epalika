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
                            <a href="{{route('admin.judicialCommittee.applicationForm')}}">न्यायिक पालिका</a>
                        </li>
                        <li class="breadcrumb-item active">तारिख पर्चा </li>
                    </ol>
                </div>
                <h4 class="page-title">तारिख पर्चा </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row justify-content-between p-2">
                    <div class="col-auto">
                        <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-1">
                            <i class="fa fa-edit px-1"></i>सम्पादन गर्नुहोस्</button>
                        <button type="button" class="btn btn-info waves-effect waves-light mb-2 me-1">
                            <i class="fa fa-check px-1"></i>Paid</button>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#custom-modal">
                                <i class="fa fa-print px-1"></i>प्रिन्ट गर्नुहोस्</button>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="container">
                    <div class="row judicial_application pt-4 px-3">
                        <div class="application_header d-flex">
                            <div class="col-md-3 application_logo_1 d-flex justify-content-center">
                                <img src="{{asset('assets/backend/images/np.png')}}" alt="government logo">
                            </div>
                            <div class="col-md-6 text-center header">
                                <h5>कावासोती नगरपालिका</h5>
                                <h4>नगर कर्यापालिकाको कार्यालय</h4>
                                <h5>न्यायिक समिति</h5>
                                <h5>तारिख पर्चा </h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content py-2">
                            <div class="d-flex">
                                <p> <span class="underline px-1">विजय थारु</span>
                                    नाउको तारिख पर्चा
                                    <span class="underline px-1">विजय चौधरी</span>
                                    बिरुद्ध
                                    <span class="underline px-1">२०७९</span>
                                    सालको
                                    <span class="underline px-1">१</span>
                                    नम्बरको
                                    <span class="underline px-1"> साइकल चोरी बारे झगडा</span>
                                    मुद्दा
                                    <span class="underline px-1"> चोरी</span>
                                    को निमित्त संवत
                                    <span class="underline px-1">२०७९/०७/२०</span>
                                    को तारिख तोकिएकोले सो दिन
                                    <span class="underline px-1">०५:००:००</span>
                                    बजे यस समितिमा उपस्थित हुनुहोला ।
                                </p>
                            </div>
                        </div>
                        <div class="py-3">
                            <h4>तारिख तोक्ने कर्मचारीको :</h4>
                            <div class="d-flex"><p class="my-auto">दस्तखत:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/sign.png')}}"
                                     alt="">
                            </div>
                            <p>नाम :</p>
                            <p>दर्जा:</p>
                            <div class="d-flex"><p class="my-auto">नगरपालिकाको छाप:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/stamp.png')}}"
                                     alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            p {
                font-size: 1.085rem;
                line-height: 1.8rem;
            }
            .underline {
                text-decoration: underline dotted 2px #0e314c;
            }

            .header > h5 {
                font-size: 1.1rem;
                font-weight: 500;
                line-height: 1.7rem;
            }

            .header > h4 {
                font-size: 1.3rem;
                font-weight: 700;
                line-height: 1.7rem;
            }

            .header > p {
                line-height: 1.7rem;
            }

            .application_sign {
                object-fit: contain;
                height: 5rem;
                width: 5rem;
            }
        </style>
    @endpush
@endsection
