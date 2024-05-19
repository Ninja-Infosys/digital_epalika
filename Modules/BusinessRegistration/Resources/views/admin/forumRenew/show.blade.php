@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.registration.forum.index')}}">संस्था
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">प्रमाणपत्र प्रिन्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रमाणपत्र प्रिन्ट </h4>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रमाणपत्र प्रिन्ट</h4>
                        <x-print-button
                            target-element="print"
                            title="{{$forum-> registration_no}}"
                        />
                    </div>
                </div>
                <section class="row justify-content-center my-4 ">
                    <div class="card col-md-12 border">
                        <div class="card-body">
                            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                            <x-print-button target-element="printData" title="{{ $forum->name }}"/>
                            <div id="printData">
                                <div class="flex-container" style="display:flex">
                                    <div class="item-auto"
                                         style="flex:1 1 auto; margin: 0 4rem 0 0;text-align:center">
                                        <img alt="" src="{{asset('assets/backend/images/np.png')}}"
                                             style="float:left; height:80px; width:110px"/></div>

                                    <div class="item-auto"
                                         style="flex:1 1 auto; margin: 0 4rem;text-align:center">
                                        <strong><span style="font-size:16px"
                                                      class="text-danger">चिङ्गाड गाउँपालिका</span><br/>
                                            <span style="font-size:20px"
                                                  class="text-danger">गाउँ कार्यपालिकाको कार्यालय</span></strong><br/>
                                        <span class="fw-bold text-danger mb-0" style="font-size:24px; width:80px">उधोग शाखा</span><br>
                                        <span style="font-size:16px"
                                              class="text-danger fw-bold">अवलचिङ्ग, सुर्खेत</span>
                                    </div>
                                    <div class="item-auto"
                                         style="flex:1 1 auto; margin: 0 4rem;text-align:center">
                                    </div>
                                </div>
                                <div class="row sub-title">
                                    <div class="col-sm sub-title1">
                                        <p class="text-danger fw-bold lh-1">पत्र संख्या : ................</p>
                                        <p class="mt-1 text-danger fw-bold lh-1">चलानी नम्बर : ...............</p>
                                    </div>
                                    <div class="col-sm sub-title2 text-end ml-auto">
                                        <p class="text-danger fw-bold lh-1"
                                           style="text-align: end;">मिती :
                                            ......................</p>
                                    </div>
                                </div>

                                <p class="fw-bold my-2">श्री...........................<br>
                                    ........................... </p>


                                <p class="fw-bold fs-5 text-center my-3">
                                    विषय : निजी फर्म रजिष्ट्रेशन गारिएको प्रमाणपत्र पठाएको ।
                                </p>


                                <p class="fw-bold mb-0">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; तपाईको पँजी रु.
                                    <span class="dashed-bottom"> {{$forum->investment}} </span> लागानी गरी
                                    <span class="dashed-bottom">{{$forum->address}} </span>मा ठेगाना रहने गरी
                                    <span class="dashed-bottom"> {{$forum->name}} </span>
                                    नामको फर्म बाट स्थनिय व्यापार गर्ने उद्देश्यले निजी कर्म
                                    रजिष्ट्रेशन गरी पाउँ भनी दिनुभएको निवेदन उपर कारवाही हुदाँ निम्न
                                    शर्तहरु
                                    पालना गर्ने गरी कर्णाली प्रदेश व्यापार व्यवसाय दर्ता सञ्चालन ऐन,
                                    २०७८ र कर्णाली प्रदेश नियमावली (दर्ता सञ्चालन) नियमावली २०८०
                                    अनुसार रजिष्टर गरिएको हुँदा नि.का.र.नं
                                    <span class="dashed-bottom">{{get_nepali_number($forum->registration_no)}}</span>
                                    मिति<span class="dashed-bottom"> {{get_nepali_number($forum->registration_date_ne ?? '') }} </span> को प्रमाण-पत्र बान एक यसै साथ
                                    पठाइएको छ।
                                </p>


                                <p class="fw-bold text-decoration-underline fs-5">शर्तहरु :</p>
                                <p class="fw-normal fs-5">
                                    १. वस फर्मको उद्देश्य स्थानीय व्यापार रहेको छ।<br>
                                    २. यो फर्मको कारोबार गर्ने चिज वस्तुको विवरण
                                    <span class="dashed-bottom"> {{$forum->product}} </span>
                                    रहेको छ।<br>
                                    ३. यो फर्म दर्ता गर्नुभन्दा पहिले यो फर्मको नामसँग मिल्ने गरी
                                    अरू कसैको फर्म दर्ता भइसकेको भए सो को सूचना पाउनासाथ तुरुन्त यो
                                    फर्मलाई खारेज गरी अर्को नाम राखी फर्म दर्ता गर्नु
                                    &nbsp;&nbsp;पर्नेछ। सूचनामा उल्लेखित म्यादभित्र नआएको कारणले
                                    फर्मलाई स्वतः खारेज गरिएमा पछि कुनै दावी लाने छैन। <br>
                                    ४. यो फर्मको साइनबोर्ड ठूलो अक्षरबाट राखी त्यसको मुन्तिर
                                    सुविधाको निमित्त मात्र सानो अक्षरले अग्रेजीमा लेख्नु पर्दछ। <br>
                                    ५. यो फर्ममा विदेशी नागरिकलाई कर्मचारीको रूपमा नियुक्ति गर्नु
                                    परेमा पूर्व स्वीकृती लिएर मात्र गर्नु पर्नेछ।<br>
                                    ९. कर्णाली प्रदेश व्यापार व्यवसाय (वर्ता सम्मान) ऐन २०७८ को
                                    विरुद्ध काम भएको प्रमाणित भएमा यो फर्मलाई तुरुन्त बन्द गराउन
                                    सकिनेछ।<br>
                                    ७. यो प्रमाणपत्रको म्याद जुन मितिमा दर्ता भएको हो, सो मितिले ५
                                    (पाँच) वर्षसम्म बहाल रहने छ। त्यसपछि प्रत्येक पटक नवीकरण भए
                                    अनुसार बहान रहने हुनाले" अवधि समाप्त हुनुभन्दा &nbsp; &nbsp;अगावै अनिवार्य
                                    रूपमा स्वीकरण गराई सक्नु पर्नेछ। नथीकरण भए‌को अधि
                                    सम्बन्धी विवरण प्रमाणपत्रको पछाडि पट्टि रहेको छ।<br>
                                    ८. अनुमति लिई कारोबार गर्नुपर्ने बस्तुहरुको अनुमति लिएर मात्रै
                                    खरिद बिक्री/आयात/निर्यात गर्नु पर्नेछ ।<br>
                                    ९. सम्पत्ति शुद्धीकरण निवारण ऐन तथा राधिक कार्यमा लगानी
                                    नियन्त्रण सम्बन्धी कानून वा सो अन्तर्गतका बनेका नियम निर्देशन
                                    आदेश वा सम्बन्धित निकायको नियमन, निर्देशन र &nbsp;&nbsp; सुपरीवेक्षण पालना
                                    गर्नुपर्नेछ।<br>
                                    १०. निजी फर्मको धनीले आफ्नो फर्मको नाम, ठेगान
                                </p>


                                <p class="text-decoration-underline fw-bold fs-5">बोधार्थ :</p>
                                <div class="row last-text">
                                    <div class="col-sm">
                                        <p class="mt-2 font-weight-bold">श्री आन्तरिक राजस्व कार्यालय, सुर्खेन । </p>
                                        <p class="font-weight-bold">श्री: ..........................</p>
                                    </div>
                                    <div class="col-sm text-end">
                                        <p class="mt-2 fw--bold" style="text-align: end;">
                                            ........................................</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

            </section>
        </div>
    </div>
@endsection
