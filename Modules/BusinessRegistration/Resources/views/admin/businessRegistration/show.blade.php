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
                                                व्यवसायीको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>नाम</th>
                                                        <th>{{$businessDetail->name??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>नाम अंग्रेजी</th>
                                                        <th>{{$businessDetail->name_en??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना</th>
                                                        <th>{{$businessDetail->address??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना अंग्रेजी</th>
                                                        <th>{{$businessDetail->address_en??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> व्यवसायको प्रकृति</th>
                                                        <th>{{$businessDetail->businessNature->title??''}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th> कारोबार गर्ने वस्तु</th>
                                                        <th>{{$businessDetail->objectTransaction->title??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> चालु पूँजी</th>
                                                        <th>{{ $businessDetail->working_capital ?? ''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> स्थिर पूँजी</th>
                                                        <th>{{$businessDetail->fixed_capital??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> पुँजीगत लगानी</th>
                                                        <th>{{$businessDetail->investment??''}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th> उदेश्य</th>
                                                        <th>{{$businessDetail->purpose ??''}}</th>
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
                                @foreach($businessDetail->partners as $partner)
                                    <div class="col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    {{$partner->name}} को विवरण
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm mb-0 table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>फोटो</th>
                                                            <th><img src="{{$partner->photo}}" height="60"
                                                                     class="rounded-circle"
                                                                     alt="{{$partner->name}}"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>नागरिकता नं</th>
                                                            <th>{{$partner->citizenship_no}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>जारी मिति</th>
                                                            <th>{{$partner->issue_date}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>जारी जिल्ला</th>
                                                            <th>{{$partner->issueDistrict->district??''}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>फोन</th>
                                                            <th>{{$partner->phone}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>ईमेल</th>
                                                            <th>{{$partner->email}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>घर नं</th>
                                                            <th>{{$partner->house_no}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>व्यक्तिगत स्थाई लेखा नम्बर</th>
                                                            <th>{{$partner->account_no}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>राष्ट्रियता परिचयपत्र नम्बर</th>
                                                            <th>{{$partner->national_card_no}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>लिङ्ग</th>
                                                            <th>{{$partner->gender}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>शैक्षिक योग्यता</th>
                                                            <th>{{$partner->education_qualification}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>मुख्य पेशा</th>
                                                            <th>{{$partner->occupation}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>बुवाको नाम</th>
                                                            <th>{{$partner->father_name}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>हजुरबुवाको नाम</th>
                                                            <th>{{$partner->grandfather_name}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>ठेगाना</th>
                                                            <th>
                                                                {{$partner->localBody->local_body ?? ''}}
                                                                -{{$partner->ward_no ?? ''}}
                                                                , {{$partner->tole ?? ''}}
                                                                , {{$partner->district->district ?? ''}}

                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>नागरिकता (आगाडी)</th>
                                                            <th>
                                                                <a href="{{$partner->citizenship_front}}"><i
                                                                        class="fa fa-download"></i> </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>नागरिकता (पछाडी)</th>
                                                            <th>
                                                                <a href="{{$partner->citizenship_back}}"><i
                                                                        class="fa fa-download"></i> </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th> हस्ताक्षर</th>
                                                            <th>
                                                                <a href="{{$partner->signature}}"><i
                                                                        class="fa fa-download"></i> </a>
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                                @if($businessDetail->registeredBusinesses->count() > 0)
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
                                                                <td>{{$registeredBusinesses->is_active==1 ? 'छ':'छैन'}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif



                                <div class="col-md-6">
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
                                            <p>आफ्नै घर जग्गा भए जग्गा धनि प्रमाणपत्र </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('land_ownership_certificate')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$businessDetail->land_ownership_certificate??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p> वार्ड सिफारिस </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('ward_recommendation')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->ward_recommendation??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p> राजदूतावासको कागजात </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('embassy_document')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->embassy_document??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p> दर्ता प्रमाणपत्र </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('registration_document')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->registration_document??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p> इजाजत पत्र </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('license')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img
                                                src="{{$businessDetail->license??''}}"
                                                alt=""
                                                style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p> कर तिरेको प्रमाणपत्र </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$businessDetail->getRawOriginal('tax_document')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$businessDetail->tax_document??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>

                                @foreach($businessDetail->files as $file)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-around">
                                            <p>अन्य </p>
                                            <a href="{{route('admin.file-url-download', ['file_url'=>$file->getRawOriginal('file')])}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{$file->file_url??''}}"
                                                 alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                        <div class="tab-pane" id="reg">--}}
                        {{--                            <div class="d-flex justify-content-end mb-2">--}}
                        {{--                                @can('businessRegistration_edit')--}}
                        {{--                                    <a class="btn btn-primary btn-sm"--}}
                        {{--                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM])}}">--}}
                        {{--                                        <i class="fa fa-pen"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('businessRegistrationPrint_access')--}}
                        {{--                                    <button class="btn btn btn-info mx-1" onclick="print('print1')"><i--}}
                        {{--                                            class="fa fa-print"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                @endcan--}}


                        {{--                            </div>--}}
                        {{--                            <div class="font-black ckEditor" id="print1">--}}

                        {{--                                {!!$printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM)->first()->data--}}
                        {{--                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::APPLICATION_FORM)--}}
                        {{--                                   ?? ''!!}--}}

                        {{--                            </div>--}}


                        {{--                            <div class="d-flex justify-content-end mb-2 mt-2">--}}
                        {{--                                @can('businessRegistration_edit')--}}
                        {{--                                    <a class="btn btn-primary btn-sm"--}}
                        {{--                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS])}}">--}}
                        {{--                                        <i class="fa fa-pen"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('businessRegistrationPrint_access')--}}
                        {{--                                    <button class="btn btn btn-info mx-1" onclick="print('print2')"><i--}}
                        {{--                                            class="fa fa-print"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('customs_edit')--}}
                        {{--                                    <a href="{{route('admin.businessRegistration.add-data.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS])}}"--}}
                        {{--                                       class="btn btn-primary">--}}
                        {{--                                        <i class="fa fa-plus"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                @endcan--}}
                        {{--                            </div>--}}
                        {{--                            <div class="font-black ckEditor" id="print2">--}}

                        {{--                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS)->first()->data--}}
                        {{--                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CUSTOMS)--}}
                        {{--                                   ?? ''!!}--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="tab-pane" id="tax">--}}
                        {{--                            <div class="d-flex justify-content-end mb-2">--}}
                        {{--                                @can('businessRegistration_edit')--}}
                        {{--                                    <a class="btn btn-primary btn-sm"--}}
                        {{--                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK])}}">--}}
                        {{--                                        <i class="fa fa-pen"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('businessRegistrationPrint_access')--}}
                        {{--                                    <button class="btn btn btn-info mx-1" onclick="print('print3')"><i--}}
                        {{--                                            class="fa fa-print"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                @endcan--}}
                        {{--                            </div>--}}
                        {{--                            <div class="font-black ckEditor" id="print3">--}}
                        {{--                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK)->first()->data--}}
                        {{--                                   ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::REGISTRATION_BOOK)--}}
                        {{--                                   ?? ''!!}--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="tab-pane" id="application">--}}
                        {{--                            <div class="d-flex justify-content-end mb-2">--}}
                        {{--                                @can('businessRegistration_edit')--}}
                        {{--                                    <a class="btn btn-primary btn-sm"--}}
                        {{--                                       href="{{route('admin.businessRegistration.edit.template',[$businessDetail,\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE])}}">--}}
                        {{--                                        <i class="fa fa-pen"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('businessRegistrationPrint_access')--}}
                        {{--                                    <button class="btn btn btn-info mx-1" onclick="print('print4')"><i--}}
                        {{--                                            class="fa fa-print"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                @endcan--}}
                        {{--                            </div>--}}
                        {{--                            <div class="font-black ckEditor" id="print4">--}}
                        {{--                                {!! $printed_data->where('for', \Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE)->first()->data--}}
                        {{--                                                            ?? $businessDetail->getSpecificTemplateData(\Modules\BusinessRegistration\Enums\TemplateTypeEnum::CERTIFICATE)--}}
                        {{--                                                            ?? ''!!}--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

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
