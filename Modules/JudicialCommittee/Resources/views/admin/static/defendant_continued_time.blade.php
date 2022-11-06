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
                        <li class="breadcrumb-item active">प्रतिवादी जारि म्याद</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रतिवादी जारि म्याद</h4>
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
                        <button class="btn btn-sm btn-info"><i class="fa fa-check px-1"></i>Paid</button>
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
                                <h5>प्रतिबदिको नाममा जारी भएको म्याद </h5>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content py-2">
                            <div class="d-flex">
                                <p> <span class="underline px-1">विजय थारु</span>
                                    को
                                    <span class="underline px-1">छोरा</span>
                                    कावासोती नगरपालिकामा बस्ने वर्ष
                                    <span class="underline px-1">२२</span>
                                    को तपाई श्री
                                    <span class="underline px-1">विजय थारु</span>
                                    नाउँमा मिति
                                    <span class="underline px-1">२०७९/०७/२०</span>
                                    मा
                                    <span class="underline px-1"> नेपालगंज उपमहानगरपालिका- 1,बाँके</span>
                                    मा बस्ने
                                    <span class="underline px-1">विजय थारु</span>
                                    का
                                    <span class="underline px-1">बुवा</span>
                                    वर्ष
                                    <span class="underline px-1">३०</span>
                                    को
                                    <span class="underline px-1">विजय थारु</span>
                                    ले यस न्यायिक समिति को समक्ष
                                    <span class="underline px-1">साइकल चोरी बारे झगडा</span>
                                    विषयमा उजुरी नालेस गरेको हुनाले सो उजुरी नालेसको प्रतिलिपि साथै राखि पठाएको छु |
                                    यो म्याद तपाईले पाएको वा कानुन बमोजिम टाँस भएको मितिले बाटोको म्याद बाहेक
                                    <span class="underline px-1">५</span>
                                    दिन भित्रमा यस समिति समक्ष आफ्नो भएको व्यहोरा प्रतिउत्तर र कानुन बमोजिम आफ्नो प्रमाण समेत लिई हाजिर हुन आउनुहोला वा कानून बमोजिमको वारिस वा कानुन बमोजिम व्यवसायी पठाउनुहोला |
                                    सो बमोजिम नगरी म्याद गुजारी बसेमा उजुरी निवेदनमा कानुन बमोजिम निर्णय हुनेछ |
                                    पछि तपाइको कुनै उजुर लाग्ने छैन |
                                </p>
                            </div>
                        </div>
                        <div class="py-3">
                            <h4>म्याद जारि गर्नेको :</h4>
                            <p>नाम थर:</p>
                            <p>पद:</p>
                            <div class="d-flex"><p class="my-auto">दस्तखत:</p>
                                <img class="application_sign" src="{{asset('assets/backend/images/sign.png')}}"
                                     alt="">
                            </div>

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
