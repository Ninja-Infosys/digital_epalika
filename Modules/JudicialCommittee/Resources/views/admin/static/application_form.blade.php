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
                        <li class="breadcrumb-item active">निबेदन फारम</li>
                    </ol>
                </div>
                <h4 class="page-title">निबेदन फारम</h4>
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
                                <h5>न्यायिक समिति समक्ष पेश गरेको</h5>
                                <h5>निवेदन - पत्र</h5>
                                <h5>अनुसूची - १</h5>
                                <p>( दफा ८ को उपदफा (२) सँग सम्बन्धित ) </p>
                            </div>
                        </div>
                        <div class="application_date fw-semibold d-flex justify-content-end py-2">
                            <h5>मिति: २०७९/०७/२० </h5>
                        </div>
                        <div class="application_content">
                            <div class="d-flex">
                                <p class="underline px-1">बाँके</p>
                                <p>जिल्ला</p>
                                <p class="underline px-1">नेपालगंज उपमहानगरपालिका</p>
                                <p>गा.पा./न.पा./उ.न.पा./मा.न.पा. वडा नं. </p>
                                <p class="underline px-1">१</p>
                                <p>मा बस्ने</p>
                                <p class="underline px-1">विजय</p>
                                <p>को</p>
                                <p class="underline px-1">बावु</p>
                                <p>वर्ष</p>
                                <p class="underline px-1">२५</p>
                                <p>को निवेदक</p>
                                <p class="underline px-1">मनोज के.सी.</p>
                                <p> र</p>
                            </div>
                            <div class="d-flex justify-content-center py-2">
                                <h4>बिरुद्ध:</h4>
                            </div>
                            <div class="d-flex">
                                <p class="underline px-1">बाँके</p>
                                <p>जिल्ला</p>
                                <p class="underline px-1">नेपालगंज उपमहानगरपालिका</p>
                                <p>गा.पा./न.पा./उ.न.पा./मा.न.पा. वडा नं. </p>
                                <p class="underline px-1">१</p>
                                <p>मा बस्ने</p>
                                <p class="underline px-1">विजय</p>
                                <p>को</p>
                                <p class="underline px-1">बावु</p>
                                <p>वर्ष</p>
                                <p class="underline px-1">२५</p>
                                <p>को निवेदक</p>
                                <p class="underline px-1">मनोज के.सी.</p>
                                <p> र</p>
                                <p>( दोस्रो पक्ष )</p>
                            </div>
                            <div class="d-flex justify-content-center py-3">
                                <h4>विषय:</h4><p class="underline px-1">साइकल चोरी बारे झगडा </p>
                            </div>
                        </div>
                        <hr>
                        <div class="application_policy">
                            <h4>म निम्न बुँदाहरुमा लेखिए बमोजिम निवेदन गर्दछु :</h4>
                            <h5>१. यस समितिबाट दोस्रो पक्ष झिकाई जे जो बुझ्नुपर्छ बुझी विवाद निरुपण गराई पाउँ ।</h5>
                            <h5>२. यस गा.पा./न.पा./उ.न.पा./म.न.पा. बाट जारी भएको स्थानीय न्यायिक कार्यविधिको दफा १४ को
                                उपदफा (१) बमोजिम निबेदन दस्तुर रु.१००|- दाखिला गरेको छु ।</h5>
                            <h5>३. यो निवेदन स्थानीय सरकार संचालन ऐन, २०७४ को दफा ४७ (.........) अनुसार यसै समितिको
                                अधिकारक्षेत्र भित्र पर्दछ ।</h5>
                            <h5>४. यो निवेदन हदम्याद भित्रै छ र म निवेदकलाई यस विषयमा निवेदन दिने हकदैया प्राप्त छ
                                ।</h5>
                            <h5>५. यस विषयमा अन्यत्र कहीँ कतै कुनै निकायमा कुनै प्रकारको निवेदन दिएको छैन ।</h5>
                            <h5>६. यसमा दोस्रो पक्षको सदस्यहरुलाई झिकाई थप व्यहोरा बुझन सकिनेछ ।</h5>
                            <h5>७. यसमा लेखिएका व्यहोरा ठिक/साँचो सत्य हुन्, झुठा ठहरेमा कानुन बमोजिम सजाय भोग्ने तयार
                                छु ।</h5>
                        </div>
                        <hr>
                        <div class="applicant d-flex pb-2 bg-light">
                            <div class="col-sm-6 px-5">
                                <p>निवेदक :</p>
                                <p>नाम:</p>
                                <p>सम्पर्क न.:</p>
                                <p>ठेगाना:</p>
                                <p>टोल:</p>
                                <p class="d-flex">सहि:<img class="application_sign" src="{{asset('assets/backend/images/np.png')}}" alt=""></p>

                            </div>
                            <div class="col-sm-6 px-5 bg-light">
                                <p>दोस्रो पक्षको विवरण :</p>
                                <p>नाम:</p>
                                <p>सम्पर्क न.:</p>
                                <p>ठेगाना:</p>
                                <p>टोल:</p>
                                <p class="d-flex">सहि:<img class="application_sign" src="{{asset('assets/backend/images/np.png')}}" alt=""></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            .application_policy>h4{
                font-weight: 600;
                text-decoration: underline  1px;
            }
            p{
                font-size: 1rem;
            }
            .underline{
                text-decoration: underline dotted 2px #0e314c;
            }
            .header>h5{
                font-size: 1.1rem;
                font-weight: 500;
                line-height: 1.7rem;
            }
            .header>h4{
                font-size: 1.3rem;
                font-weight: 700;
                line-height: 1.7rem;
            }
            .header>p{
                line-height: 1.7rem;
            }
            .application_sign{
                object-fit: contain;
                height: 5rem;
                width: 5rem;
            }
        </style>
    @endpush
@endsection
