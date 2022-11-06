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
                                class="ms-2">{{$proprietorDetail->name}}</span></p>
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
                                {!! $proprietorDetail->template_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM)->first()['data'] ?? ''!!}

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
