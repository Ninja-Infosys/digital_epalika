@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">फारम विवरण </h3>
                        <div>
                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>
                            <a href="{{route('organization.admin.clients.client.show', $client)}}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> {{$client->name ?? ''}} को विवरण हेर्नुहोस
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <p>
                            {{config('applicationDetail.to_office.to')}}<br>
                            {{config('applicationDetail.to_office.office_name')}}<br>
                            {{config('applicationDetail.to_office.office')}}<br>
                            {{config('applicationDetail.to_office.office_address')}}
                        </p>
                        <p class="text-center"><b>बिषय: भबन निर्माणको लागि नक्सापास सम्बन्धमा ।</b></p>

                        <p>
                            मैले/हामीले देहायमा लेखिए बमोजिम भवन निर्माण कार्य गर्ने भएकोले उक्त निर्माण कार्यको बिबरण
                            तपसिलमा खुलाई आफ्नो हक भोगको निस्साको नक्कल, कित्ता नापी नक्साको नक्कल र घरको नक्सा लगायत
                            आवस्यक कागजात सहित निवेदन पेश गरेको छु/छौं । उक्त नक्सापास गरी निर्माण कार्य गर्न स्वीकृति
                            पाउन अनुरोध छ। निर्माण कार्यको इजाजत प्राप्त
                            भएपछी {{config('applicationDetail.office_type')}} द्वारा स्वीकृत मापदण्ड तथा राष्ट्रिय भवन
                            संहिता भित्र रही निर्माण कार्य गर्नेछु/छौं। यस दरखास्त फाराममा लेखिएको व्यहोरा ठीक साँचो छ,
                            झुठ्ठा ठहरे कानून बमोजिम सहुँला बुझाउँला।
                        </p>
                        <p>तपसिल</p>
                        <p>
                            <b>१. प्रस्तावित भवनको विवरण </b>
                        </p>
                        <p>१.१ निर्माण कार्यको किसिम</p>
                        <div class="d-flex flex-wrap">
                            @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                                <div class="m-1">
                                    <input type="checkbox"
                                           {{$constructionType->value==$mapApply->construction_type->value ? 'checked' : ''}}
                                           disabled>
                                    {{$constructionType->label()}}
                                </div>
                            @endforeach
                        </div>

                        <p>१.२ प्रयोजन</p>
                        <div class="d-flex flex-wrap">
                            @foreach(\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
                                <div class="m-1">
                                    <input type="checkbox"
                                           {{$usages->value==$mapApply->usage->value ? 'checked' : ''}}
                                           disabled>
                                    {{$usages->label()}}
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex flex-wrap">
                            <p>१.३ भवन ऐन अनुसार वर्गीकरण : </p>
                            @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                                <div class="mx-2">
                                    <input type="checkbox"
                                           {{$categorization->value==$mapApply->building_category->value ? 'checked' : ''}}
                                           disabled>
                                    {{$categorization->label()}}
                                </div>
                            @endforeach
                        </div>
                        <p>
                            १.४ स्ट्रकचर टाईप : {{$mapApply->structureType->title??''}}
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>
                                १.५ हाल निर्माण गर्ने तल्ला संख्या : <span
                                    class="underline-dotted custom-width"> {{$mapApply->current_storey}} </span>
                            </p>
                            <p class="mx-3">
                                १.६ प्लिन्थको क्षेत्रफल : <span
                                    class="underline-dotted custom-width"> {{$mapApply->area_of_plinth}} </span>
                            </p>
                        </div>
                        <p>
                            १.७ भविष्यमा निर्माण गर्ने तल्ला संख्या :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->future_storey}}
                            </span>
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>
                                १.८ कुल भवनको लम्बाई :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->length}}
                                </span>
                            </p>
                            <p class="mx-3">
                                १.९ कुल भवनको चौडाई :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->breadth}}
                                </span>
                            </p>
                        </div>

                        <p>
                            १.१० भवनको कुल उचाई जमिनको सतहबाट :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->height}}
                            </span>
                        </p>
                        <div class="break-page"></div>
                        <p>
                            १.११ तल्लाको क्षेत्रफल र उचाईको विवरण :
                        </p>
                        <table
                            class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>तल्ला</th>
                                <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                <th>साविक निर्माणको क्षेत्रफल</th>
                                <th>जम्मा क्षेत्रफल</th>
                                <th>उचाई</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mapApply->storeyDetails as $storeyDetail)
                                <tr class="text-center">
                                    <td>{{$storeyDetail->mapFee->storey??''}}</td>
                                    <td>{{$storeyDetail->area_of_proposed_construction}}</td>
                                    <td>{{$storeyDetail->area_of_former_construction}}</td>
                                    <td>{{$storeyDetail->total_area}}</td>
                                    <td>{{$storeyDetail->height}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p>
                            <b>२. जग्गाको विवरण</b>
                        </p>
                        <p>१.१ निर्माण कार्यको किसिम</p>
                        <div class="d-flex flex-wrap">
                            @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                                <div class="m-1">
                                    <input type="checkbox"
                                           {{$constructionType->value==$mapApply->construction_type->value ? 'checked' : ''}}
                                           disabled>
                                    {{$constructionType->label()}}
                                </div>
                            @endforeach
                        </div>

                        <p>१.२ प्रयोजन</p>
                        <div class="d-flex flex-wrap">
                            @foreach(\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
                                <div class="m-1">
                                    <input type="checkbox"
                                           {{$usages->value==$mapApply->usage->value ? 'checked' : ''}}
                                           disabled>
                                    {{$usages->label()}}
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex flex-wrap">
                            <p>१.३ भवन ऐन अनुसार वर्गीकरण : </p>
                            @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                                <div class="mx-2">
                                    <input type="checkbox"
                                           {{$categorization->value==$mapApply->building_category->value ? 'checked' : ''}}
                                           disabled>
                                    {{$categorization->label()}}
                                </div>
                            @endforeach
                        </div>
                        <p>
                            १.४ स्ट्रकचर टाईप : {{$mapApply->structureType->title??''}}
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>
                                १.५ हाल निर्माण गर्ने तल्ला संख्या : <span
                                    class="underline-dotted custom-width"> {{$mapApply->current_storey}} </span>
                            </p>
                            <p class="mx-3">
                                १.६ प्लिन्थको क्षेत्रफल : <span
                                    class="underline-dotted custom-width"> {{$mapApply->area_of_plinth}} </span>
                            </p>
                        </div>
                        <p>
                            १.७ भविष्यमा निर्माण गर्ने तल्ला संख्या :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->future_storey}}
                            </span>
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>
                                १.८ कुल भवनको लम्बाई :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->length}}
                                </span>
                            </p>
                            <p class="mx-3">
                                १.९ कुल भवनको चौडाई :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->breadth}}
                                </span>
                            </p>
                        </div>

                        <p>
                            १.१० भवनको कुल उचाई जमिनको सतहबाट :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->height}}
                            </span>
                        </p>

                        <p>घरधनीको नाम : <span class="underline-dotted">{{$mapApply->houseOwner->name ?? ''}}</span></p>
                        <p>ठेगाना : <span class="underline-dotted">{{$mapApply->houseOwner->address ?? ''}}</span></p>
                        <p>फोन नं. : <span class="underline-dotted">{{$mapApply->houseOwner->phone ?? ''}}</span></p>
                        <p>सहि : <span class="underline-dotted custom-width"></span></p>
                        <p>मिति : <span class="underline-dotted custom-width"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <style>
            .font-black p {
                color: black;
            }

            .underline-dotted {
                border-bottom: dotted 3px !important;
                padding: 0 15px;
            }

            .custom-width {
                padding: 0 50px !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush
@endsection
