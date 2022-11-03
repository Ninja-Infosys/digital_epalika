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
                            <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">व्यवसाय
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसायीको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसायीको विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{$proprietorDetail->name}}" class="rounded-circle avatar-lg img-thumbnail"
                         alt="profile-image">

                    <h4 class="mb-0">{{$proprietorDetail->name}}</h4>
                    <div class="text-start mt-3">
                        <p class="mb-2 font-13"><strong>व्यवसायीको नाम :</strong> <span
                                class="ms-2">Geneva D. McKnight</span></p>
                        <p class="mb-2 font-13"><strong>फोन नं. :</strong><span class="ms-2">(123) 123 1234</span></p>
                        <p class="mb-2 font-13"><strong>इमेल :</strong> <span class="ms-2">user@email.domain</span></p>
                        <p class="mb-1 font-13"><strong>नागरिकता नम्बर :</strong> <span class="ms-2">USA</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                विवरण
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#reg" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                दर्ता/नबिकरण निबेदन फाराम
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tax" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                व्यवसाय कर दर्ता किताव
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#application" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                व्यवसाय दर्ता प्रमाण-पत्र
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detail">
                            testg
                        </div>
                        <div class="tab-pane" id="reg">
                            <div class="font-black" id="printData">
                                <p>श्रीमान प्रमुख प्रशासकीय अधिकृत,<br>
                                    फिदिम नगरपालिकाको कार्यालय,<br>
                                    फिदिम,पाँचथर</p>
                                <p class="text-center my-1"><b>बिषय : व्यवसाय दर्ता/नवीकरण गर्न र परिचय पाटी राख्न
                                        अनुमति पाउँ । </b></p>
                                <p class="my-2">मैले/हामीले निम्न स्थानमा<span
                                        class="underline-dotted custom-width"></span>व्यवसाय दर्ता/नवीकरण
                                    गर्न लागेकोले आवश्यक कागजात सहित दरखास्त दिन आएको छु/छौ । नियमानुसार लाग्ने कर,
                                    दस्तुर बुझाउनुको साथ नगरपालिका बाट समय समयमा
                                    दिइने आदेश/निर्देशन समेत पालन गर्न मन्जुरी छु/छौ । साथै मैले/हामीले पेश गरेको कागजात
                                    तथा विवरणहरु ठिक साँचो रहेको र फरक परे
                                    कानून बमोजिम कार्वाही भएमा मन्जुरी छु/छौ ।</p>
                                <p>१. व्यवसायीको नाम, थर :<span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span><br>
                                    (फर्म कम्पनीको हकमा मुख्य व्यत्तिको नाम)<br>
                                    २. स्थायी ठेगाना : <span class="underline-dotted custom-width"></span> जिल्ला<span
                                        class="underline-dotted custom-width"></span> न.पा.<span
                                        class="underline-dotted custom-width"></span>
                                    वडा नं.<span class="underline-dotted custom-width"></span> मार्ग<span
                                        class="underline-dotted custom-width"></span> घर नं.<span
                                        class="underline-dotted custom-width"></span><br>
                                    ३. बाबुको नाम, थर :<span class="underline-dotted custom-width"></span><br>
                                    ४. व्यवसाय रहने स्थानको ठेगान : वडा नं.<span
                                        class="underline-dotted custom-width"></span> मार्ग<span
                                        class="underline-dotted custom-width"></span>
                                    घर नं.<span class="underline-dotted custom-width"></span><br>
                                    ५. सम्पर्क फोन नं.<span class="underline-dotted custom-width"></span> फ्याक्स<span
                                        class="underline-dotted custom-width"></span>
                                    इमेल<span class="underline-dotted custom-width"></span><br>
                                    ६. भाडामा रहेको भए व्यवसाय रहने घर र जग्गा धनीको नाम, थर :<span
                                        class="underline-dotted custom-width"></span><br>
                                    ७. ठेगाना :<span class="underline-dotted custom-width"></span> वडा नं.<span
                                        class="underline-dotted custom-width"></span>
                                    घर नं.<span class="underline-dotted custom-width"></span><br>
                                    ८. व्यवसायको विवरण/प्रकृति :<span class="underline-dotted custom-width"></span><br>
                                    ९. पूँजीगत लगानी रु. मा <span class="underline-dotted custom-width"></span><br>
                                    १०. फर्म/कम्पनीको नाम :<span class="underline-dotted custom-width"></span><br>
                                    ११. परिचय पाटीको साइज : (लम्बाई <span class="underline-dotted custom-width"></span>
                                    चौडाई<span class="underline-dotted custom-width"></span>
                                    वर्गफिट <span class="underline-dotted custom-width"></span>)<br>
                                    १२. अन्य दर्ता भएको भए, दर्ता नं.<span class="underline-dotted custom-width"></span>/कार्यालय
                                    :<span class="underline-dotted custom-width"></span><br>
                                    १३.संलग्न गर्नुपर्ने कागजातहरु : आफनै घर जग्गा भए जग्गा धनी प्रमाण पत्रको
                                    प्रतिलिपि-१, भाडामा बस्ने भए भाडा रकम र भुत्तानी तरिका समेत खुलेको वहाल
                                    सम्झौतापत्र-१,
                                    नागरिकको हकमा नेपालस्थित राजदुतावासबाट व्यवसायीको नाममा जारी कागजात-१, करदाताको
                                    हालसालैको पासपोर्ट साईजको फोटो २ प्रति, फर्म कम्पनी भएमा दर्ता,
                                    इजाजत प्रमाणपत्र र आन्तरिक राजस्व कार्यालयमा अघिल्लो आ.व.सम्मको कर तिरेको करदाता
                                    प्रमाणपत्रको प्रतिलिपि ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        निवेदकको दरखास्त </p>
                                </div>
                                <hr class="style">
                                <h5 class="mt-2">कार्यालय प्रयोजनका लागि मात्र :-</h5>
                                <p>निवेदन दस्तुर :<span class="underline-dotted"></span> दर्ता दस्तुर <span
                                        class="underline-dotted"></span>
                                    व्यवसाय कर <span class="underline-dotted"></span> परिचय पाटी
                                    दस्तुर<span class="underline-dotted"></span>
                                    जरिवाना<span class="underline-dotted"></span> जम्मा <span
                                        class="underline-dotted"></span> व्यवसाय प्रमाण पत्र नं. :<span
                                        class="underline-dotted"></span>
                                    मिति : <span class="underline-dotted"></span> पेश गर्ने/ठिक छ भनी
                                    पप्रमाणितगर्ने/स्वीकृत गर्ने</p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tax">
                            <div class="font-black" id="printData">
                                <p class="text-center">फिदिम नगरपालिका<br>
                                    नगर कार्यपालिकाको कार्यालय<br>
                                    व्यवसाय कर दर्ता किताब</p>
                                <p>करदाता प्रमाणपत्र नं. :
                                    <br>जारी भएको मिति :</p>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="35%" scope="col">व्यवसायको विवरण</th>
                                        <th width="35%" scope="col">परिचयपाटी विवरण</th>
                                        <th width="35%" scope="col">व्यवसायीको विवरण</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>१) व्यवसायको प्रकृति :</td>
                                        <td>१) फर्म/कं. को नाम :</td>
                                        <td>१) नाम, थर :</td>
                                    </tr>
                                    <tr>
                                        <td>२) व्यवसायको किसिम :</td>
                                        <td>२) साइज :</td>
                                        <td>२) नागरिकता नं:</td>
                                    </tr>
                                    <tr>
                                        <td>३) रहने स्थान/ठेगाना:<br>
                                            वडा नं.: घर नं.: बाटोको नाम:
                                        </td>
                                        <td>३) किसिम: जारी भेय्को जिल्ला :</td>
                                        <td>३) ठेगाना: थायी:<br>
                                            अस्थायी :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>४) अन्य :</td>
                                        <td>४) घर धनीको नाम :</td>
                                        <td>४) बाबुको नाम :</td>
                                    </tr>
                                    <tr>
                                        <td>५) बजेको नाम :</td>
                                    </tr>
                                    <tr>
                                        <td>६) सम्पर्क फोन नं. :</td>
                                    </tr>
                                    <tr>
                                        <td>७) अन्य :</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">असुली</th>
                                        <th scope="col">आ.व</th>
                                        <th scope="col">मिति</th>
                                        <th scope="col">निवेदन<br>
                                            दस्तुर
                                        </th>
                                        <th scope="col">दर्ता<br>
                                            शुल्क
                                        </th>
                                        <th scope="col">चालु <br>
                                            आ.व.को<br>
                                            व्यवसाय<br>
                                            कर रु.
                                        </th>
                                        <th scope="col">परिचय
                                            <br>पाटी
                                        </th>
                                        <th scope="col">वक्यौता</th>
                                        <th scope="col">जरिवाना</th>
                                        <th scope="col">जम्मा<br>रकम</th>
                                        <th scope="col">रसिद<br>नं.</th>
                                        <th scope="col">प्रमणित<br>गर्नेको<br>सही</th>
                                        <th scope="col">कैफियत</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="application">
                            testttt
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
