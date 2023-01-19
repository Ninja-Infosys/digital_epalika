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
        <div class="col-lg-12 col-xl-12">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                प्रोपाईटरको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>व्यवसायीको नाम</th>
                                                        <th>{{$businessDetail->proprietorDetail->name??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>फोन नं.</th>
                                                        <th>{{$businessDetail->proprietorDetail->phone??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>इमेल</th>
                                                        <th>{{$businessDetail->proprietorDetail->email??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>नागरिकता नम्बर</th>
                                                        <th>{{$businessDetail->proprietorDetail->citizenship_no ?? ''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>लिङ्ग</th>
                                                        <th>{{  $businessDetail->proprietorDetail->gender?->label() ?? ''  }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>इमेल</th>
                                                        <th>{{$businessDetail->proprietorDetail->email??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> घर नम्बर</th>
                                                        <th>{{$businessDetail->proprietorDetail->house_no??''}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th> व्यक्तिगत स्थाई लेखा नम्बर</th>
                                                        <th>{{$businessDetail->proprietorDetail->account_no??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> राष्ट्रियता परिचयपत्र नम्बर</th>
                                                        <th>{{$businessDetail->proprietorDetail->national_card_no??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> शैक्षिक योग्यता</th>
                                                        <th>{{   $businessDetail->proprietorDetail->education_qualification?->label()??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> मुख्य पेशा</th>
                                                        <th>{{$businessDetail->proprietorDetail->occupation??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> नागरिकता नम्बर</th>
                                                        <th>{{$businessDetail->proprietorDetail->citizenship_no??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> जारी मिति</th>
                                                        <th>{{$businessDetail->proprietorDetail->issue_date??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> जारी जिल्ला</th>
                                                        <th>{{$businessDetail->proprietorDetail->issueDistrict->district??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ठेगाना</th>
                                                        <th>{{$businessDetail->proprietorDetail->LocalBody->local_body ?? ''}}
                                                            -{{$businessDetail->proprietorDetail->ward_no ?? ''}}
                                                            , {{$businessDetail->proprietorDetail->tole ?? ''}}
                                                            , {{$businessDetail->proprietorDetail->District->district ?? ''}}
                                                            , {{$businessDetail->proprietorDetail->Province->province ?? ''}}</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                व्यावसाहिक विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th> फर्म/कम्पनी/ब्यवसाय को नाम नेपलीमा</th>
                                                        <th>{{$businessDetail->business_detail_name??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> फर्म/कम्पनी/ब्यवसाय को नाम अंग्रेजीमा</th>
                                                        <th>{{$businessDetail->business_detail_name_en??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> व्यवसायको प्रकृति</th>
                                                        <th>{{$businessDetail->business_nature??''}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th> व्यवसाय स्थापना गरेको साल</th>
                                                        <th>{{$businessDetail->establish_year??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> पान नम्बर</th>
                                                        <th>{{$businessDetail->pan_no??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> कारोबार गर्ने वस्तु</th>
                                                        <th>{{$businessDetail->investmentRevenue->objectTransaction->title??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> पुँजीगत लगानी</th>
                                                        <th>{{$businessDetail->investmentRevenue->registration_amount??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> लागत रकम रु</th>
                                                        <th>{{$businessDetail->amount_cost??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> पूजीको स्रोत</th>
                                                        <th>{{ $businessDetail->source_of_capital ?? ''}}</th>
                                                    </tr>


                                                    <tr>
                                                        <th> उदेश्य</th>
                                                        <th>@foreach($businessDetail->businessPurposes as $businessPurposes)
                                                                {{$businessPurposes->title}} {{!$loop->last ? ", ":''}}
                                                            @endforeach</th>
                                                    </tr>
                                                    <tr>
                                                        <th> रोजगार संख्या</th>
                                                        <th>{{$businessDetail->employment??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना</th>
                                                        <th>
                                                            {{$businessDetail->LocalBody->local_body ?? ''}}
                                                            -{{$businessDetail->ward_no ?? ''}}
                                                            , {{$businessDetail->tole ?? ''}}
                                                            , {{$businessDetail->District->district ?? ''}}
                                                            , {{$businessDetail->Province->province ?? ''}}


                                                        </th>
                                                    </tr>


                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($businessDetail->proprietorDetail->threeGenerationDetails) && $businessDetail->proprietorDetail->threeGenerationDetails->count() >0)
                                    <div class="col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    तिन पुस्ते विवरण
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-sm mb-0 table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>नाता</th>
                                                            <th>नाम, थर</th>
                                                            <th>नाम, थर( अंग्रेजीमा)</th>
                                                            <th>नागरिकता नं</th>
                                                            <th>सम्पर्क नं</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($businessDetail->proprietorDetail->threeGenerationDetails as $threeGenerationDetail)
                                                            <tr>
                                                                <td>{{$threeGenerationDetail->relation??''}}</td>
                                                                <td>{{$threeGenerationDetail->name??''}}</td>
                                                                <td>{{$threeGenerationDetail->name_en??''}}</td>
                                                                <td>{{$threeGenerationDetail->citizenship_no??''}}</td>
                                                                <td>{{$threeGenerationDetail->mobile_no??''}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($businessDetail->is_rent==1)
                                    <div class="col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    बहालमा
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm mb-0 table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th> घर धनिको नाम थर</th>
                                                            <th>{{$businessDetail->house_owner_name??''}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th> घर धनिको मोबाइल नं</th>
                                                            <th>{{$businessDetail->house_owner_phone??''}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th> ठेगाना</th>
                                                            <th>{{$businessDetail->house_owner_address??''}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th> मासिक भाडा रु</th>
                                                            <th>{{$businessDetail->house_owner_monthly_rent??''}}</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(Modules\BusinessRegistration\Enums\BusinessNature::tryFrom($businessDetail->getRawOriginal('business_nature'))->value == \Modules\BusinessRegistration\Enums\BusinessNature::PARTNERSHIP->value)
                                    <div class="col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    साझेदार हरुको विवरण
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-sm mb-0 table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>साझेदार सँगको नाता</th>
                                                            <th>साझेदार को नाम थर</th>
                                                            <th>नागरिकता नं</th>
                                                            <th>सम्पर्क नं</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($businessDetail->partnerDetails as $partnerDetails)
                                                            <tr>
                                                                <td>{{$partnerDetails->relation}}</td>
                                                                <td>{{$partnerDetails->name}}</td>
                                                                <td>{{$partnerDetails->citizenship_no}}</td>
                                                                <td>{{$partnerDetails->mobile_no}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($businessDetail->is_registered == 1)
                                    <div class="col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    यो भन्दा अगाडी गरेको व्यवसाय दर्ता
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm mb-0 table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>दर्ता नम्बर</th>
                                                            <th>व्यवसायको नाम</th>
                                                            <th>दर्ता मिति</th>
                                                            <th>सक्रिय</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($businessDetail->registeredBusinesses as $registeredBusinesses)
                                                            <tr>
                                                                <td>{{$registeredBusinesses->registration_no}}</td>
                                                                <td>{{$registeredBusinesses->business_name}}</td>
                                                                <td>{{$registeredBusinesses->registration_date}}</td>
                                                                <td>{{$registeredBusinesses->active==1 ? 'छ':'छैन'}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                परिचय पार्टीको साइज
                                            </h4>

                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th> लम्बाई</th>
                                                        <th>{{$businessDetail->length??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> चौडाई</th>
                                                        <th>{{$businessDetail->width??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> वर्गफिट</th>
                                                        <th>{{$businessDetail->square??''}}</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>व्यवसायीको पासपोर्ट साइजको फोटो</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->photo])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$businessDetail->photo_url??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>नागरिकता (आगाडी)</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->citizenship_front])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->citizenship_front_url??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>नागरिकता (पछाडी)</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->citizenship_back])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->citizenship_back_url??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>फार्म कम्पनी भयमा दर्ता, इजाजत प्रमाणपत्र</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->company_registration])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->company_registration_url??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>आन्तरिक राजस्व कार्यालयमा आघिल्लो आ.व सम्मको करतिरेको
                                                करदाता प्रमाणपत्रको प्रतिलिपि</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->tax_pay_file])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->tax_pay_file_url??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>हस्ताक्षर</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->tax_pay_file])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$businessDetail->signature_url??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>औठाको छाप</p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->thumb])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$businessDetail->thumb_url??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="reg">
                            <div class="d-flex justify-content-end mb-2">
                                @can('businessRegistration_edit')
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM])}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('businessRegistrationPrint_access')
                                    <button class="btn btn btn-info mx-1" onclick="print('print1')"><i
                                            class="fa fa-print"></i>
                                    </button>
                                @endcan


                            </div>
                            <div class="font-black ckEditor" id="print1">

                                {!!$printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM)->first()->data
                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM)
                                   ?? ''!!}

                            </div>


                            <div class="d-flex justify-content-end mb-2 mt-2">
                                @can('businessRegistration_edit')
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS])}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('businessRegistrationPrint_access')
                                    <button class="btn btn btn-info mx-1" onclick="print('print2')"><i
                                            class="fa fa-print"></i>
                                    </button>
                                @endcan
                                @can('customs_edit')
                                    <a href="{{route('admin.businessRegistration.add-data.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS])}}"
                                       class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                @endcan
                            </div>
                            <div class="font-black ckEditor" id="print2">

                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS)->first()->data
                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS)
                                   ?? ''!!}
                            </div>
                        </div>

                        <div class="tab-pane" id="tax">
                            <div class="d-flex justify-content-end mb-2">
                                @can('businessRegistration_edit')
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK])}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('businessRegistrationPrint_access')
                                    <button class="btn btn btn-info mx-1" onclick="print('print3')"><i
                                            class="fa fa-print"></i>
                                    </button>
                                @endcan
                            </div>
                            <div class="font-black ckEditor" id="print3">
                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK)->first()->data
                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK)
                                   ?? ''!!}

                            </div>
                        </div>
                        <div class="tab-pane" id="application">
                            <div class="d-flex justify-content-end mb-2">
                                @can('businessRegistration_edit')
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE])}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('businessRegistrationPrint_access')
                                    <button class="btn btn btn-info mx-1" onclick="print('print4')"><i
                                            class="fa fa-print"></i>
                                    </button>
                                @endcan
                            </div>
                            <div class="font-black ckEditor" id="print4">
                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE)->first()->data
                                                            ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE)
                                                            ?? ''!!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/print.js')}}"></script>


        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush

@endsection
