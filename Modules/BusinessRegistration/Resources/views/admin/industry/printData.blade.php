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
                            <a href="{{ route('admin.businessRegistration.registration.industry.index') }}">उधोग</a>
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
                        <x-print-button target-element="print" title="{{ $industry->registration_no }}"/>
                    </div>
                </div>
                <div class="card-body">
                    <div id="print">

                        <div style="margin: 0 4rem;text-align:center"><span
                                style="font-size:14px"><strong>अनुसूची-३</strong></span><br/>
                            <span style="font-size:14px"><strong>(नियम ३ को उपनियम (२) र नियम ६ को उपनियम (१) संग सम्बन्धित्त)</strong></span>
                        </div>
                        {!! letterHead() !!}
                        <div class="item-auto" style="flex:1 1 auto; margin: 0 4rem;text-align:center">&nbsp;</div>

                        <p style="margin-left:350px">&nbsp;</p>

                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                            <tbody>
                            <tr>
                                <td><span style="font-size:18px">उधोग दर्ता नं : <span class="dashed-bottom"> {{ get_nepali_number($industry->registration_no ?? '') }}</span></span></td>
                                <td><span style="font-size:18px">मिति: <span class="dashed-bottom">{{ get_nepali_number($industry->registration_date_ne ?? '') }}</span></span></td>
                            </tr>
                            <tr>
                            <tr>
                                <td><span
                                        style="font-size:18px">अधावधिक गरिएको भय अधावधिक नं: .................... </span>
                                </td>
                                <td><span style="font-size:18px">मिति: ........</span></td>
                            </tr>
                            </tbody>
                        </table>


                        <p class="mt-3" style="text-align:justify; font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; प्रदेश औधोगिक व्यवसाय ऐन,२०७८ को दफा ३ तथा प्रदेश औद्योगिक व्यवसाय नियमावली, २०७९ को नियम ६ बमोजिम निम्न अनुसारको विवरण भएको उद्योग दर्ता गरी यो प्रमाण-पत्र प्रदान गरिएको छ |
                        </p>

                        <p><span style="font-size:18px">१. उद्योग सञ्चालकको नाम :<br/>
                                २. उद्योगको नाम :  <span class="dashed-bottom">{{$industry->name}}</span><br />
                                ३. उद्योगको ठेगाना : <span class="dashed-bottom">{{ $industry->province->province ?? '' }}, {{ $industry->district->district ?? '' }}, {{ $industry->localBody->local_body ?? '' }} - {{ get_nepali_number($industry->ward_no ?? '') }}</span><br />
                                ४. उद्योगको उद्देश्य : <span class="dashed-bottom">{{$industry->purpose}}</span><br />
                                ५. उद्योगको कूल पूँजी रू . <span class="dashed-bottom">{{$industry->investment}}</span><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (क) स्थिर पूँजी <span class="dashed-bottom">{{$industry->fixed_capital}}</span><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ख) चालु पूँजी <span class="dashed-bottom">{{$industry->working_capital}}</span><br />
                                ६. उद्योगको वर्ग : <span class="dashed-bottom">{{$industry->industryCategory->title}}</span><br />
                                ७. उद्योग सञ्चालन हुने सिफ्ट संख्या : <span class="dashed-bottom">{{ get_nepali_number($industry->open_date) }}</span><br />
                                ८. आवश्यक विद्युत शक्ति : <span class="dashed-bottom">{{$industry->electricity}}</span><br />
                                ९. उद्योग सञ्चालन दिन (प्रति वर्ष) : <span class="dashed-bottom">{{$industry->working_days}}</span><br />
                                १०. उद्योगले उत्पादन गर्ने वस्तु वा सेवाको प्रकार : <span class="dashed-bottom">{{$industry->product}}</span><br />
                                ११.आवश्यक पर्ने जनशक्ति : <span class="dashed-bottom">{{$industry->manpower}}</span><br />
                                १२. उद्योग सञ्चालन, व्यावसायिक उत्पादन वा कारोवार सुरु गर्नुपर्ने अवधि : <span class="dashed-bottom">{{$industry->start_date}}</span><br />
                                १३. उत्पादन क्षमता : <span class="dashed-bottom">{{$industry->production_capacity}}</span><br />
                                १४. अन्य : <span class="dashed-bottom">{{$industry->other}}</span></span></p>

                        <div class="item-auto" style="flex:1 1 auto; margin: 3rem 4rem 4rem;text-align:right"><span style="font-size:18px"><strong>...................................<br />
प्रमाणित गर्ने अधिकृत</strong></span></div>

                        <hr />
                        <p class="text-center" style="font-size:18px"><strong><u>नोट</u>: उधोगले पालाना गर्नुपर्ने शर्तहरु यस प्रमाण-पत्रको पछाडि उल्लेख गरिएको छ |</strong></p>

                        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                        <p style="font-size:18px; text-align: justify"><strong>प्रचलित कानूनमा तोकिएका अतिरिक्त उधोगले देहाय बमोजिमका शर्तहरु पालना गर्नु पर्नेछ |</strong><br>
                            १. उद्योगलाई आवश्यक पर्ने जनशक्ति नेपाली नागरिकबाट पूर्ति गर्नु पर्नेछ। विदेशी जनशक्ति आवश्यक पर्ने  प्रचलित श्रम ऐन, २०७४ को अधिनमा रही विदेशी जनशक्ति राख्न सकिनेछ ।<br>
                            २. उद्योगमा विदेशी पूँजी लगानी, प्रविधि उपभोग गर्नु परेमा विभागको पूर्व स्वीकृति लिनु पर्नेछ ।<br>
                            ३. अनुमति लिनु नपर्ने उद्योगको पुनरुत्थान, आधुनिकीकरण वा विस्तार गर्दा विभागको स्वीकृति लिनु पर्नेछ ।<br>
                            ४. उद्योग चालु भएपछि विभागको तथ्याङ्ग शाखामा वार्षिक प्रतिवेदन, कार्य प्रगति र उत्पादन विवरण सम्बन्धी मासिक चौमासिक प्रतिवेदन अनिवार्य रुपमा पेश मर्नु पर्नेछ । मौसमी (सिजनल) वा अन्य कारणले बन्द रहेको भए कारण खुलाई सूचना गर्नु पर्नेछ ।<br>
                            ५. वातावरण सम्बन्धमा विभागबाट दिइने निर्देशन तथा शर्तहरू पालना गर्नु पर्नेछ । उद्योगबाट निस्कने फोहोरलाई उचित व्यवस्थापन गर्नु पर्नेछ ।<br>
                            ६. प्रदूषण नियन्त्रण सम्बन्धमा वन तथा वातावरण मन्त्रालयले तथा अन्य सम्बन्धित निकायले तोकेको शर्तहरू र कार्यविधि अनिवार्य रूपमा पालना गर्नु पर्नेछ ।<br>
                            ७.यस उद्योगको नाम पहिले दर्ता भएका कम्पनीको नाम, कसैको व्यापारिक नाम वा ट्रेडमार्कसँग मिलेमा नाम संशोध गर्नु पर्नेछ । यस उद्योगबाट उत्पादन वा प्रदान गर्ने वस्तु वा सेवामा ट्रेडमार्क प्रयोग गर्ने भएमा प्रचलित औद्योगिक सम्पत्ति सम्बन्धी कानून बमोजिम दर्ता गराएर मात्र प्रयोग गर्नु पर्नेछ ।<br>
                            ८. उद्योगमा कार्यरत कर्मचारी वा श्रमिकलाई पारिश्रमिक दिँदा अनिवार्य रूपमा बैंक खातामार्फत भुक्तानी दिनु पर्नेछ ।<br>
                            ९. औद्योगिक प्रतिष्ठानका कार्यस्थलमा हुने लैङ्गिक हिंसाविरुद्धको आचारसंहिता पालना गर्नु पर्नेछ ।<br>
                            १०. उद्योग वरिपरिका बासिन्दालाई हानी नोक्सानी नपर्ने गरी उद्योग सञ्चालन गर्नु पर्नेछ ।<br>
                            ११. उद्योगले उद्योग दर्ता प्रमाण-पत्रमा उल्लेख भएको अवधिभित्र उद्योग सञ्चालन वा आफ्नो व्यावसायिक उत्पादनवा कारोबारो प्रारम्भ गर्नुपर्नेछ र सो को जानकारी ३० दिनभित्र उद्योग बर्ता गर्ने निकायलाई गराउनु पर्नेछ ।<br>
                            १२. प्रत्येक उद्योगले व्यावसायिक उत्पादन वा कारोबार प्रारम्भ गरेपछि तोकिए बमोजिमको विवरण प्रत्येक आ.व.समाप्त भएको मितिले ६ महिनाभित्र उद्योग दर्ता गर्ने निकाय समक्ष पेश गर्नुपर्नेछ ।

                        </p>


                        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                        <p style="text-align:center"><strong><span style="font-size:18px">उद्योगको पूँजी वृद्धि/क्षमता वृद्धि/नामसारी लगायतका अन्य निर्णयहरू</span></strong></p>

                        <table border="1" cellpadding="8" cellspacing="0" class="mt-2 table table-bordered"
                               style="border:2px solid black; height:100%; width:100%">
                            <thead>
                            <tr>
                                <th scope="col">सि.नं</th>
                                <th scope="col"><span style="font-size:14px"><strong>निर्णयको व्यहोरा</strong></span></th>
                                <th scope="col"><span style="font-size:14px"><strong>प्रमाणित गर्नेको दस्तखत र मिति</strong></span></th>
                                <th scope="col">कार्यालयको छाप</th>
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

                        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                        <p style="text-align:center"><span style="font-size:18px"><strong>नवीकरण गरेको प्रमाण</strong></span></p>

                        <table class="mt-2 table table-bordered"
                               style="border:2px solid black; height:100px; width:100%">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <p>नवीकरण गर्ने निर्देशनालय / कार्यालयको नाम</p>
                                </th>
                                <th scope="col">नवीकरण गरेको अबधि</th>
                                <th scope="col">नवीकरण दस्तुरको भौचर नं र मिति</th>
                                <th scope="col">दरखास्त</th>
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
                            </tr><tr>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr><tr>
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
                            </thead>
                        </table>

                        <p style="font-size: 18px; text-align: justify"><u>नोट</u>:- हालको व्यबस्था अनुसार रजिष्ट्रेशन (दर्ता) वा नवीकरण भएको प्राइभेट फर्मको अवधि क्रमशः ५ वर्ष र २ वर्षको लागि हुर्दछ । सो अवधि समाप्त हुनु अगावै फर्म नवीकरण गराउनु पर्नेछ । यो प्रमाणपत्रमा लेखिएको उद्देश्य बाहेकको अन्य काम गर्नु हुदैन। नवीकरण गराउन ल्याउँदा यो प्रमाण-पत्र साथै लिइ आउनु पर्नेछ। यही प्रमाण-पत्रमा सम्बन्धित कार्यालयबाट नवीकरण भएको निस्सा पाउनेछ। म्यादभित्र नवीकरण नभएमा उद्योग खारेज हुन सक्नेछ ।</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
