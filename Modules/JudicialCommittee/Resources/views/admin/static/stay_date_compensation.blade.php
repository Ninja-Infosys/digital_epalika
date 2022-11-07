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
                        <li class="breadcrumb-item active">तारिख भरपाई</li>
                    </ol>
                </div>
                <h4 class="page-title">तारिख भरपाई</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="action_section bg-light d-flex pt-1">
                    <div class="col-sm-8 px-3">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-edit px-1"></i>सम्पादन गर्नुहोस्
                        </button>
                        <button class="btn btn-sm btn-info"><i class="fa fa-check px-1"></i> सहि गरेको पत्र अपलोड गरियो
                        </button>
                        <button class="btn btn-sm btn-info"><i class="fa fa-check px-1"></i> बुझीलिएको पत्र अपलोड गरियो
                        </button>
                    </div>
                    <div class="col-sm-4 px-5">
                        <button class="btn btn-sm btn-success"><i class="fa fa-print px-1"></i>प्रिन्ट गर्नुहोस्
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
                                <h5>तारिख भरपाई  </h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content py-2">
                            <div class="d-flex pt-3">
                                <div class="col-md-6 text-center">
                                    <p>वादी</p>
                                    <h5 class="underline pt-2">विजय गमुवा थारु </h5>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p>प्रतिवादी</p>
                                    <h5 class="underline pt-2">विजय गमुवा थारु </h5>
                                </div>
                            </div>
                            <div class="d-flex pt-3 justify-content-center">
                                <h5>विषय: </h5>&nbsp;<h5 class="underline">साइकल चोरी बारे झगडा </h5>
                            </div>

                            <div class="d-flex">
                                <p>मिति
                                    <span class="underline px-1">२०७९/०७/२०</span>
                                    मा
                                    <span class="underline px-1">इजलाश हुनेछ</span>
                                    काम हुने भएकोले सोहि दिन
                                    <span class="underline px-1">१०:००:००</span>
                                    बजे यस न्यायिक समिति / कार्यालयमा उपस्थित हुनेछु भनि सहि गर्ने :
                                </p>
                            </div>
                            <div class="d-flex pt-3">
                                <div class="col-md-6 text-center">
                                    <p>वादी</p>
                                    <h5 class=" pt-2">.............................</h5>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p>प्रतिवादी</p>
                                    <h5 class=" pt-2">..............................</h5>
                                </div>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center py-3">
                            <p>
                            इति संवत्<span class="underline px-1">२०७९/०७/२०</span>
                            रोज सुभम |
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="action_section bg-light d-flex pt-1">
                    <button class="btn btn-sm btn-success"><i class="fa fa-print px-1"></i>प्रिन्ट गर्नुहोस्
                    </button>

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
                                <h5>म्याद बुझिलिएको भरपाई </h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content">
                            <div class="d-flex">
                                <p>
                                    <span class="underline px-1">साइकल चोरी बारे झगडा</span>
                                    विषयमा मेरो नाउँमा जारी भएको एक प्रति म्याद र नालिसको एक प्रतिलिपी
                                    समेत देहायका साक्षिहरुको रोहवरमा म आफैले बुझिलिएभनि दस्तखत सहि छाँप गरिदिए।
                                </p>
                            </div>
                        </div>
                        <div class="py-3">
                            <p>नाम: ....................</p>
                            <p>दस्तखत : .....................</p>

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
                                <h5>म्याद बुझिलिएको भरपाई</h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content">
                            <div class="d-flex">
                                <p>
                                    <span class="underline px-1">साइकल चोरी बारे झगडा</span>
                                    विषयमा मेरो नाउँमा जारी भएको एक प्रति म्याद र नालिसको एक प्रतिलिपी
                                    समेत देहायका साक्षिहरुको रोहवरमा म आफैले बुझिलिएभनि दस्तखत सहि छाँप गरिदिए।
                                </p>
                            </div>
                        </div>
                        <div class="py-3">
                            <p>नाम: ....................</p>
                            <p>दस्तखत : .....................</p>

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

