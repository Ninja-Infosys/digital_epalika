@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.businessRegistration.registration.forum.index') }}">फर्म</a>
                        </li>
                        <li class="breadcrumb-item active">प्रमाणपत्र प्रिन्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रमाणपत्र प्रिन्ट </h4>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रमाणपत्र प्रिन्ट</h4>
                        <x-print-button target-element="print" title="{{ $forum->registration_no }}"/>
                    </div>
                </div>
                <div class="card-body">
                    <div id="print">
                        <div style="margin: 0 4rem;text-align:center"><span
                                style="font-size:14px"><strong>"सबल स्थानीय सरकार, समृद्ध बगचौर नगर"</strong></span><br/>
                        </div>

                        <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                            <tbody>
                            <tr>
                                <td style="width:25%"><img alt="Office Logo"
                                                           src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                                           style="height:80px; width:100px"/></td>
                                <td style="text-align:center; vertical-align:middle; width:60%">
                                    <div style="color:red; font-size:20px; line-height:1.2">बागचौर नगरपालिका</div>

                                    <div style="color:red; font-size:16px; line-height:1.2"><span
                                            style="font-size:22px"><strong>नगर कार्यपालिकाको कार्यालय</strong></span></div>

                                    <div style="color:red; font-size:16px; line-height:1.2">बागचौर,सल्यान</div>
                                    <div style="color:red; font-size:16px; line-height:1.2">कर्णाली प्रदेश,नेपाल</div>
                                </td>

                                <td>
                                        <img alt="Office Logo"
                                             src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                             style="height:80px; width:100px"/>


                                </td>

                            </tr>
                            <tr>
                                <td style="width:25%">&nbsp;</td>
                                <td style="text-align:center; vertical-align:middle; width:50%">
                                    <h4><u><span
                                                style="color:red; font-size:26px"><strong><u>प्राईभेट फर्म दर्ता प्रमाण-पत्र</u></strong></span></u>
                                    </h4>
                                </td>
                                <td style="width:25%">&nbsp; <div class="py-3" style="text-align:center; vertical-align:center; font-size:16px;border:1px solid black; height:6rem; width:6rem; border-radius: 5px">
                                        संचालकको फोटो
                                    </div></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm font-weight-bold" style="font-size:18px">
                                <p>निजि/साझेदारी प्रा.फ.नं:<span class="dashed-bottom">{{get_nepali_number($forum->registration_no)}}</span></p>
                                <p>निजि/साझेदारी फर्म</p>
                            </div>

                        </div>
                                <p class="font-weight-bold" style="font-size:18px"> प्रदेश व्यापार व्यवसाय (दर्ता तथा संचालन ) ऐन, २०७८ र प्रदेश
                                    व्यापार-व्यवसाया ( दर्ता तथा संचालन ) नियामवाली,२०८० बमोजिमको विवरण भएको निजि/साझेदारी फर्म मिती
                                    <span class="dashed-bottom">{{ get_nepali_number($forum->registration_date_ne ?? '') }} </span>मा दर्ता
                                    गरी यो प्रमाण-पत्र दिईएको छ ।
                                </p>

                            <p class=" mt-2 font-weight-bold" style="font-size:18px" ><strong>देहृाय :</strong><br>
                            फर्मको नाम :<span class="dashed-bottom">{{$forum->name}}</span><br>
                            धनी (प्रोपाईटर)/साझेदारको नाम,थर :<span class="dashed-bottom">{{$forum->owner_name}}</span><br>
                            ठेगाना :<span class="dashed-bottom">{{$forum->province->province ?? ''}},{{$forum->district->district ?? ''}},{{$forum->localBody->local_body ?? ''}}-{{ get_nepali_number($forum->ward_no ?? '') }}</span><br>
                            पूँजी लागानी रु. :<span class="dashed-bottom">{{$forum->investment}}</span><br>
                            फर्मको ठेगान :<span class="dashed-bottom">{{$forum->address}}</span><br>
                            उद्देश्य/कारोबार विवरण :<span class="dashed-bottom">{{$forum->product}}</span><br>
                            मिति:<span class="dashed-bottom">{{ get_nepali_number($forum->registration_date_ne ?? '') }}</span></p><br>

                            <div class="row signature mt-1" style="font-size:20px">
                                <div class="col-sm text-center font-weight-bold">
                                    <p>......................................................</p>
                                    <p class="ml-3">शाखा प्रमुख</p>
                                </div>
                                <div class="col-sm text-center font-weight-bold">
                                    <p>........................................................</p>
                                    <p class="ml-4">प्रमुख प्रशासकीय अधिकृत</p>
                                </div>
                            </div>

                            <h4 class="font-weight-bold mb-2" style="font-size:18px"><u><strong>नोट :</strong></u></h4>
                            <ol class="font-weight-bold" style="font-size:16px">
                                <li> यो प्रमाण-पत्रको म्याद फर्म रजिष्ट्रेशन गरिएको मितिले ५
                                    वर्षसम्म र त्यसपछि प्रत्येक पटक नविकरण भए मुतविक बहाल
                                    रहने
                                    हुनाले अवधी समाप्त भएको मितिले ३५ दिन भित्र अनिवार्य
                                    रूपमा
                                    नविकरण गराईसक्नु पर्नेछ । नविकरण भएको अवधि सम्बन्धी
                                    विवरण
                                    प्रमाणपत्रको पछाडी उल्लेख छ। </li>

                                <li>यो फर्मले कारोवार गर्ने मुख्य चिज वस्तुको विवरण विभागले
                                    दर्ताका बखत प्रमाणपत्रसंगै दिने छुट्टै पत्रमा उल्लेख
                                    छ।</li>
                                <li>माथि उल्लेखित फर्मको उद्देश्य कार्यन्वयनका लागि अन्य
                                    कुनै
                                    निकायबाट इजाजत/अनुमती लिनुपर्नेभए अनुमती लिएर मात्र
                                    कारोबार
                                    गर्नुपर्नेछ र सोको जानकारी यस कार्यलयलाई दिनुपर्नेछ ।
                                    यसै
                                    दर्तालाई नै उद्देश्य कार्यन्वयन गर्ने अनुमती प्राप्त
                                    गरेको
                                    मानिने छैन।</li>
                                <li>सम्पत्ती शुद्धिकरण छैन तथा अपराधिक कार्यमा लगागी
                                    नियन्त्रण
                                    सम्वन्धि कानुन वा सो अन्र्तगत बनेका नियम निर्देशन आदेश
                                    सम्बन्धित निकायको
                                    नियमन, निर्देशन र सुपरीवेक्षण पालना गर्नुपर्नेछ ।</li>
                                <li>मनी ट्रान्सफर सम्बन्धि कारोबार संचालनका लागि सम्बन्धित
                                    निकाय
                                    बाट इजाजत लिनु पर्ने भए लिएर मात्र कारोबार गर्नुपर्नेछ
                                    ।</li>
                                <li>फर्मले कारोबार गर्ने वस्तुहरुको प्रकृति अनुसार
                                    छुट्टाछुट्टी
                                    भण्डारण गरी खरिद विक्रि गर्ने।</li>
                            </ol>


                    <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                        <div class=" mt-5 text-center">
                            <h2 class="font-weight-bold">नविकरण सम्बन्धि विवरण</h2>
                        </div>
                        <div class="">
                            <p style="font-size:18px"><strong>फर्मको नाम :<span class="dashed-bottom">{{$forum->name}} </span></strong></p>
                            <table class="table table-bordered" style="border:2px solid black; height:100px; width:100%">
                                <thead>
                                <tr>
                                    <th scope="col" style="font-size:16px">नविकरण गर्ने कार्यलयको नाम</th>
                                    <th scope="col" style="font-size:16px">नविकरण गरेको मिति </th>
                                    <th scope="col" style="font-size:16px">भौचर नं. र बुझाएको मिति र दस्तुर रु.</th>
                                    <th scope="col" style="font-size:16px">नविकरण गर्ने अधिकारीको दस्तखत</th>
                                    <th scope="col" style="font-size:16px">कैफियत</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class=" py-3" style="font-size:20px">
                            <p><u><strong>नोटः</strong></u></p>
                            <p>१. यो प्रमाणपत्रको म्याद दर्ता भएको मितिले ५ वर्ष सम्म बहाल रहनेछ र प्रत्येक २ वर्षमा नविकरण गराई सक्नुपर्छ ।
                           यो फर्म कारोबार गर्ने मुख्य चिजवस्तुको विवरण यसै कार्यालयले लेखेको छुट्टै पत्रमा उल्लेख छ।
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
