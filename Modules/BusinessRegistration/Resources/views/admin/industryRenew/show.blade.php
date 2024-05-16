@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.registration.businessRegistration.index')}}">संस्था
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
                            title="{{$industry-> registration_no}}"
                        />
                    </div>
                </div>
                <section class="row justify-content-center my-4 ">
                    <div class="card col-md-12 border">
                        <div class="card-body">
                            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                            <x-print-button target-element="printData" title="{{ $industry->name }}" />
                            <div id="printData">
                                <div class="flex-container" style="display:flex">
                                    <div class="item-auto"
                                         style="flex:1 1 auto; margin: 0 4rem 0 0;text-align:center">
                                        <img alt="" src="{{asset('assets/backend/images/np.png')}}"
                                             style="float:left; height:80px; width:110px"/></div>

                                    <div class="item-auto"
                                         style="flex:1 1 auto; margin: 0 4rem;text-align:center">
                                        <strong><span style="font-size:16px" class="text-danger">चिङ्गाड गाउँपालिका</span><br/>
                                            <span style="font-size:20px" class="text-danger">गाउँ कार्यपालिकाको कार्यालय</span></strong><br/>
                                        <span class="fw-bold text-danger mb-0" style="font-size:24px; width:80px">उधोग शाखा</span><br>
                                        <span style="font-size:16px" class="text-danger fw-bold">अवलचिङ्ग, सुर्खेत</span>
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
                                <p class="text-center mb-0">विषय :- फर्म रजिष्ट्रेशन गरिएको</p>
                                <p>श्री ...............................................</p>
                                <p class="mb-0">तपाईले स्थिर पूँजी रु. <span class="dashed-bottom">{{$industry->fixed_capital}}</span> र चालु पूँजी रु.
                                    <span class="dashed-bottom">{{$industry->working_capital}}</span> समेत कूल
                                    पूँजी रु. <span class="dashed-bottom">{{$industry->investment}}</span>
                                    लगानी गरि अन्दाजी वार्षिक रु. ............................... बराबरको
                                    ..............................................................................................
                                    उत्पादन गर्ने उदेश्यले कामदार ................................... जवान राखी,
                                    <span class="dashed-bottom">{{ $industry->province->province ?? '' }}</span> प्रदेश <span class="dashed-bottom">{{ $industry->district->district ?? '' }}</span> जिल्ला
                                    <span class="dashed-bottom">{{ $industry->localBody->local_body ?? '' }}</span> गा.पा/न.पा. वडा नं. <span class="dashed-bottom">{{ $industry->ward_no ?? '' }}</span> मा
                                    उधोग स्थापना गर्ने गरी ............................................................... नामको
                                    प्राइभेट/साझेदारी/प्रा.लि. फर्म रजिष्ट्रेशन पाउँ भनि दिएको निवेदन उपर कारबाही हुँदा मिति
                                    ..................... को निर्णयाअनुसार निम्नलिखित शर्तहरु पालना गर्नुपर्ने
                                    गरी रजिष्ट्रेशन गरिदिने भनी निर्णय भएको हुँदा तपाई समेतको नाममा रजिष्ट्रेशन भएको फ.नं.
                                    .................................... को सक्कल प्रमाण-पत्र यसै साथ संलग्न गरी प्त्हैएको व्यहोरा
                                    जानकारी गराइएको छ ।
                                </p>
                                <p class="text-decoration-underline mb-0">उद्योगले पालना गर्नुपर्ने शर्तहरुः
                                </p>
                                <p>
                                    १. उद्योग सञ्चालन गर्न आवश्यक पर्ने सम्पूर्ण कच्चा पदार्थ उद्योगले स्वयं व्यवस्था गर्नुपर्नेछ ।<br>
                                    २. उद्योगको साइनबोर्ड र फर्मको प्याडमा रजिष्ट्रेशन नम्बर अनिवार्य रुपमा उल्लेख गर्नुपर्नेछ ।<br>
                                    ३. नाबालकलाई उद्योगको काममा संलग्न गराउन पाइने छैन ।<br>
                                    ४. छर छिमेक कसैलाई पीर मर्का बाधा नपर्ने गरी उद्योग सञ्चालन गर्नुपर्नेछ ।<br>
                                    ५. रात्री सिफ्ट सञ्चालन गर्नुपर्ने भएमा पूर्व स्वीकृती लिएर मात्र सञ्चालन गर्न सकिनेछ ।<br>
                                    ६. उद्योगलाई आवश्यक पर्ने जनशक्ति नेपाली नागरिकबाटै पूर्ति गर्नुपर्नेछ। विदेशी जनशक्ति विना उद्योग
                                    सञ्चालन हुन नसक्ने भएमा श्रम विभाग समेतको पूर्व स्वीकृती लिएर मात्र काममा लगाउन सकिनेछ ।<br>
                                    ७. उद्योग विस्तार,विविधीकरण वा स्तर परिवर्तन गर्दा पूर्व स्वीकृती प्राप्त गर्नुपर्नेछ ।<br>
                                    ८. उद्योग सञ्चालन गर्दा वातावरण प्रदूषण हुन नदिने गरी आवश्यक व्यवस्था गर्नुपर्नेछ ।<br>
                                    ९. तोकिएको शर्तहरू पालना नभएकोमा वा प्रदत्त सुविधा तथा सहुलियतहरु दुरुपयोग भएको पाइएमा प्रदेश
                                    औद्योगिक व्यवसाय ऐन, २०७८ अनुसार कार्यबाही गरिनेछ ।<br>
                                    १०. उद्योगले व्यावसायिक उत्पादन वा कारोबारो प्रारम्भ गरेपछि तोकिए बमोजिमको विवरण प्रत्येक आर्थिक
                                    वर्ष समाप्त भएको मितिले ६ महिनाभित्र उद्योग दर्ता गर्ने निकायसमक्ष पेश गर्नुपर्नेछ ।<br>
                                    ११. उद्योग सञ्चालन गर्दा उद्योगमा भइरहेको काम कारबाहीलाई मूल सडकबाट नदेखिने गरी व्यवस्था मिलाउनु
                                    पर्नेछ ।<br>
                                    १२. यस ऐन बमोजिम दर्ता भएको उद्योग सम्बन्धित उद्योगीले कुनै कारणले बन्द गरेमा वा व्यावसायिक उत्पादन
                                    वा कारोबारो स्थगन गरेमा त्यसरी बन्द वा स्थगन गरेको मितिले ३५ दिनभित्र त्यसको जानकारी उद्योग दर्ता
                                    गर्ने निकायलाई तोकिए बमोजिमको ढाँचामा दिनु पर्नेछ ।<br>
                                    १३.उद्योग दर्ता प्रमाणपत्रमा उल्लेखित उद्देश्य विपरित कार्य गर्न पाइने छैन ।<br>
                                    १४. यसै नामबाट यस अघि अर्को उद्योग दर्ता भइसकेको देखिएमा यस उद्योगको नाम परिवर्तन गर्नुपर्नेछ ।<br>
                                    १५. माथि उल्लेखित भए अनुसारका शर्तहरू पालना नगरेमा वा प्रगति विवरण प्राप्त नभएमा उद्योगले पाउने
                                    सुविधा तथा सहुलियतहरू उपलब्ध गराइने छैन ।<br>
                                    १६. उपभोक्ता संरक्षण ऐन २०७५ अनुसार कार्य गर्नुपर्नेछ ।<br>
                                    १७. अन्य कुनै निकायले अनुमति लिई उद्योग सञ्चालन गर्नुपर्ने भएमा अनुमति प्राप्त भइसकेपछि मात्र उद्योग
                                    सञ्चालन गर्नुपर्नेछ ।<br>
                                    १८. विशेष शर्त :
                                    क. उद्योगबाट उत्पादित फोहोरमैला उचित व्यवस्था गर्नुपर्नेछ ।<br>
                                    ख.
                                    <span class="text-decoration-underline">बोधार्थ:</span><br>
                                    श्री आन्तरिक राजस्व कार्यालय, सुर्खेत ।<br>
                                    श्री .......................
                                </p>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="header-title mb-0">अन्य फाइलहरु</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($industryRenew->files as $document)
                    <div class="col-xl-4 col-lg-6">
                        <div class="card shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-2 pe-0">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                          <i class="fa {{getFileIconClass($document->extension)}} font-18"></i>
                                                    </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                           onclick="openFileModal('{{$document->file_name}}', '{{ $document->extension }}', '{{ $document->file_url }}')"
                                           class="text-muted fw-medium">{{$document->file_name}}
                                            .{{$document->extension}}</a>
                                        <p class="mb-0 font-13">{{convert_to_highest_unit($document->file_size)}}</p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{route('admin.file.download', $document)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end .p-2-->
                        </div> <!-- end col -->
                    </div>
                @empty
                    <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                @endforelse
            </div> <!-- end row-->
        </div>
    </div>
    @include('admin.inc.file-view');
@endsection
