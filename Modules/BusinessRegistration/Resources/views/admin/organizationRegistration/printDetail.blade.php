@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.businessRegistration.businessRegistration.index') }}">व्यवसाय
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रमाणपत्र प्रिन्ट</h4>
                        <x-print-button target-element="print" title="{{ $organizationRegistration->registration_no }}" />
                    </div>
                </div>
                <div class="card-body">
                    <div id="print">

                        <div class="certificate"
                            style="border-image: url({{ asset('assets/backend/border.png') }}) 30 stretch">
                            <div class=""
                                style=" margin-bottom:0rem; margin-left:4rem; margin-right:4rem; margin-top:0rem; text-align:center">
                                <span style="font-size:14px"><strong>अनुसूची-२</strong></span><br />
                                <span style="font-size:14px"><strong>(दफा ११ को उपदफा ३ संग सम्बन्धित)</strong></span>
                            </div>
                            <div class="lh-lg font-15 position-relative">
                                <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="width:25%"><img alt="Office Logo"
                                                    src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                                    style="height:100px; width:130px" /></td>
                                            <td style="text-align:center; width:50%; vertical-align: middle;">
                                                <div style="line-height: 1.2; color:red; font-size: 20px;">बागचौर नगरपालिका
                                                </div>
                                                <div style="line-height: 1.2; color:red; font-size: 25px;">
                                                    <strong>नगरकार्यपालिकाको कार्यालय</strong>
                                                </div>
                                                <div style="line-height: 1.2; color:red; font-size: 16px;">बागचौर, सल्यान
                                                </div>
                                                <div style="line-height: 1.2; color:red; font-size: 16px;">कर्णाली प्रदेश
                                                    नेपाल
                                                </div>
                                            </td>
                                            <td style="width:25%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="width:25%">&nbsp;</td>
                                            <td style="text-align:center; width:50%; vertical-align: middle;">
                                                <h4
                                                    style="color:red; font-size: 23px; margin-top:10px; text-decoration:underline">
                                                    <strong> उपभोक्ता
                                                        संस्था दर्ता प्रमाण-पत्र</strong>
                                                </h4>
                                            </td>
                                            <td style="width:25%">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="d-flex justify-content-between mt-3">
                                    <div>
                                        <p><strong>करदाता नं. :</strong>
                                            ..............................</p>
                                        <p><strong>प्रमाणपत्र नं :</strong>
                                            {{ get_nepali_number($organizationRegistration->registration_no) }}</p>
                                    </div>

                                    <div>
                                        <p><strong>दर्ता मिति :</strong> {{ get_nepali_number($todayDateInBS) }} गते</p>
                                    </div>
                                </div>

                                <div class="mt-4" style="text-align: justify; ">
                                    <p style="font-weight:700">
                                        श्री .............................................................. </br>
                                        <span class="ml-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            ...........................................</span>
                                    </p>
                                    <p class="mt-4" style="font-weight:700">श्री
                                        ..............................................................
                                        {{ $officeSetting->localBody->local_body ?? '' }} जलस्रोत ऐन २०८० को दफा ३ बमोजिम
                                        {{ get_nepali_number($organizationRegistration->registration_date_ne) }} गतेका दिन
                                        यस
                                        कार्यालयमा
                                        दर्ता गरी यो प्रमाण पत्र प्रदान गरिएको छ। जलस्रोत ऐन २०८० बमोजिम आफ्नो कार्य सञ्चालन
                                        गर्नुहोला।
                                    </p>
                                    <div class="d-flex justify-content-end mt-3 text-center ">
                                        <p>.......................................<br>
                                            <strong>नि. प्रमुख प्रशासकीय अधिकृत</strong><br>
                                            <span>...............................</span>
                                        </p>
                                    </div>

                                    <hr style="border-top:1px solid black; border-radius: 2px;  " />

                                </div>



                            </div>
                            <div class="justify-content-end" style="margin-left:16px; font-weight:700">
                                <h3 style="text-decoration:underline; "><strong>उपभोक्ता संस्था सञ्चालन गर्दा अबलम्बन
                                        गर्नुपर्ने शर्तहरू</strong></h3>

                                <p>(१) यो प्रमाण पत्र हराएमा वा च्यातिएमा यसको नक्कल लिंदा तोकिएको शुल्क लाग्नेछ।</p>
                                <p>(२) यो प्रमाण पत्र सुरक्षित राख्नुपर्नेछ। नगर कार्यपालिकाबाट चेकजाँच गर्न आउने
                                    कर्मचारीले
                                    मागेको वखतमा प्रमाण पत्र देखाउनु पर्नेछ।</p>
                                <p>(३) संस्था रद्द गर्न चाहेमा नगर कार्यपालिकामा लिखित जानकारी दिई लगत कट्टा गराउनु
                                    पर्नेछ।
                                </p>
                                <p>(४) प्रचलित ऐन कानूनले निषेधित गरेको कार्य सञ्चालन गर्न पाइने छैन।</p>
                                <p>(५) यो दर्ता प्रमाण पत्र प्रत्येक वर्ष आषाढ मसान्तभित्र यस नगरपालिकाको आर्थिक ऐन
                                    अनुसारको
                                    शुल्क बुझाई नविकरण गराइ सक्नुपर्नेछ।</p>
                                <p>(६) संस्था सञ्चालनको शिलशिलामा नगर कार्यपालिकाबाट समय समयमा दिएको लिखित तथा मौखिक
                                    निर्देशन पालना गर्नुपर्नेछ।</p>

                            </div>
                        </div>
                        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                        <p style="text-align:center"><span style="font-size:16px"><strong>नविकरण विवरण </strong></span></p>

                        <table border="1" cellpadding="8" cellspacing="0" class="mt-2 table table-bordered"
                            style="border:2px solid black; height:100%; width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"><strong><span style="font-size:14px">क्र.स</span></strong></th>
                                    <th scope="col"><strong><span style="font-size:14px">नविकरण भएको मिति</span></strong>
                                    </th>
                                    <th scope="col"><strong><span style="font-size:14px">नविकरण बहाल रहने
                                                मिति</span></strong></th>
                                    <th scope="col"><strong><span style="font-size:14px">नविकरण दस्तुर बुझाएको रसिद
                                                नं.</span></strong></th>
                                    <th scope="col"><strong><span style="font-size:14px">कार्यालय प्रमुखको
                                                दस्तखत</span></strong></th>
                                    <th scope="col">
                                        <h1 style="margin-left:24px; margin-right:0; text-align:start"><strong><span
                                                    style="font-size:14px">&nbsp;कैफियत</span></strong></h1>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><br />
                                        &nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
