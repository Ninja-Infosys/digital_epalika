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
                        <li class="breadcrumb-item active">निस्सा सनाखत</li>
                    </ol>
                </div>
                <h4 class="page-title">निस्सा सनाखत </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="action_section bg-light d-flex pt-1">
                    <div class="col-sm-8 px-3">
                        <button class="btn btn-sm btn-outline-primary"><i class="fa fa-edit px-1"></i>सम्पादन गर्नुहोस्
                        </button>
                        <button class="btn btn-sm btn-outline-info"><i class="fa fa-check px-1"></i>Paid</button>
                    </div>
                    <div class="col-sm-4 px-5">
                        <button class="btn btn-sm btn-outline-success"><i class="fa fa-print px-1"></i>प्रिन्ट गर्नुहोस्
                        </button>
                    </div>
                    <hr>
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
                                <h5>निस्सा (रसिद) </h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content">
                            <div class="d-flex">
                                <p>उजुरीकर्ता निवेदक / वादी श्री
                                    <span class="underline px-1">नेपालगंज उपमहानगरपालिका</span>
                                    ले मिति
                                    <span class="underline px-1">2079/07/20</span>
                                    मा
                                    <span class="underline px-1">विजय थारु</span>
                                    को बिरुद्धमा
                                    <span class="underline px-1">साइकल चोरी बारे झगडा</span>
                                    विषयमा दर्ता गर्न ल्याएको उजुरी निवेदन / नालेस यस समितिको दर्ता नं.
                                    <span class="underline px-1">२५</span>
                                    मा दर्ता भएकोले यो निस्सादिईको छ ।</p>
                            </div>
                        </div>
                        <div class="py-3">
                            <h4>उजुरी प्रशासकको :</h4>
                            <div class="d-flex"><p class="my-auto">दस्तखत:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/sign.png')}}"
                                     alt="">
                            </div>
                            <p>नाम थर:</p>
                            <p>दर्जा :</p>
                            <div class="d-flex"><p class="my-auto">नगरपालिकाको छाप:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/np.png')}}"
                                     alt=""></div>
                        </div>

                    </div>
                    <div class="row judicial_application pt-4 px-3">
                        <div class="application_header d-flex">
                            <div class="col-md-3 application_logo_1 d-flex justify-content-center">
                                <img src="{{asset('assets/backend/images/np.png')}}" alt="government logo">
                            </div>
                            <div class="col-md-6 text-center header">
                                <h5>कावासोती नगरपालिका</h5>
                                <h4>नगर कर्यापालिकाको कार्यालय</h4>
                                <h5>न्यायिक समिति </h5>
                                <h5>सनाखत</h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content">
                            <div class="d-flex">
                                <p>प्रस्तुत
                                    <span class="underline px-1">नेपालगंज उपमहानगरपालिका</span>
                                    पृष्ठको निवेदन उजुरी मैले दर्ता गर्न लागेको छु | यसमा लेखिएको व्यहोरा दुरुस्त छ | फरक परे कानुन बमोजिम सँहुला भनि सनाखत दर्ता गरेको छु | </p>
                            </div>
                        </div>
                        <div class="py-3">
                            <h4>सहिछाप गर्ने :</h4>
                            <p>नाम थर:</p>
                            <div class="d-flex"><p class="my-auto">दस्तखत:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/sign.png')}}"
                                     alt="">
                            </div>
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

