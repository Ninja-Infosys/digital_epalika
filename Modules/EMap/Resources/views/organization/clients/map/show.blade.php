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
                        <p class="break-page"></p>
                        <p>
                            १.११ तल्लाको क्षेत्रफल र उचाईको विवरण :
                        </p>
                        <table
                            class="table table-sm table-bordered">
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
                        <p>
                            २.१ भू-उपयोग्य क्षेत्र :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->landDetail->land_use_area??''}}
                            </span>
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>
                                २.२ वडा नं : <span
                                    class="underline-dotted custom-width"> {{$mapApply->landDetail->ward_no ?? ''}} </span>
                            </p>
                            <p class="mx-3">
                                २.३ साविक वडा नं : <span
                                    class="underline-dotted custom-width"> {{$mapApply->landDetail->former_ward_no??''}} </span>
                            </p>
                        </div>

                        <div class="d-flex flex-wrap">
                            <p>
                                २.४ टोलको नाम :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->landDetail->tole ?? ''}}
                                </span>
                            </p>
                            <p class="mx-3">
                                २.५ सडक कोड नं :
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->landDetail->street_code_no??''}}
                                </span>
                            </p>
                        </div>
                        <p>
                            २.६ जग्गा कित्ता नं :
                            <span class="underline-dotted custom-width">
                                {{$mapApply->landDetail->plot_no??''}}
                            </span>
                        </p>

                        <p>
                            २.७ क्षेत्रफल
                            <span class="underline-dotted custom-width">
                                {{$mapApply->landDetail->unit_value??''}} {{$mapApply->landDetail->unit->title??''}}
                            </span>
                        </p>

                        <p>
                            २.८ भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR):
                            <span class="underline-dotted custom-width">
                                {{$mapApply->landDetail->percentage_of_area_covered_by_building??''}}
                            </span>
                        </p>

                        <p>
                            <b>३. जग्गा धनीको विवरण</b>
                        </p>
                        <p>३.१ जग्गा धनीको किसिम : </p>
                        <div class="d-flex flex-wrap">
                            @foreach(\Modules\EMap\Enums\LandOwnerTypeEnum::cases() as $landOwnerType)
                                <div class="mx-2">
                                    <input type="checkbox"
                                           {{$landOwnerType->value==$mapApply->landOwner->land_owner_type->value ? 'checked' : ''}}
                                           disabled>
                                    {{$landOwnerType->label()}}
                                </div>
                            @endforeach
                        </div>
                        <table
                            class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    १.१ नाम : {{$mapApply->landOwner->name??''}}
                                </td>
                                <td>
                                    १.२ फोन नं. : {{$mapApply->landOwner->phone??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.३ बुवाको नाम : {{$mapApply->landOwner->father_name??''}}
                                </td>
                                <td>
                                    १.४ नागरिकता लिएको जिल्ला
                                    : {{$mapApply->landOwner->citizenshipIssueDistrict->district??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.५ नागरिकत नम्बर : {{$mapApply->landOwner->citizenship_no??''}}
                                </td>
                                <td>
                                    १.६ नागरिकता लिएको मिति : {{$mapApply->landOwner->citizenship_issue_date??''}}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <p>
                            <b>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</b>
                        </p>
                        <table
                            class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    १.१ नाम : {{$mapApply->houseOwner->name??''}}
                                </td>
                                <td>
                                    १.२ फोन नं. : {{$mapApply->houseOwner->phone??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.३ बुवाको नाम : {{$mapApply->houseOwner->father_name??''}}
                                </td>
                                <td>
                                    १.४ नागरिकता लिएको जिल्ला
                                    : {{$mapApply->houseOwner->citizenshipIssueDistrict->district??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.५ नागरिकत नम्बर : {{$mapApply->houseOwner->citizenship_no??''}}
                                </td>
                                <td>
                                    १.६ नागरिकता लिएको मिति : {{$mapApply->houseOwner->citizenship_issue_date??''}}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <p>
                            <b>५. चार किल्लाको विवरण</b>
                        </p>
                        <table
                            class="table table-sm table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>विवरण</th>
                                <th>पूर्व</th>
                                <th>दक्षिण</th>
                                <th>पश्चिम</th>
                                <th>उत्तर</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mapApply->fourForts as $fourFort)
                                <tr>
                                    <td>
                                        {{$fourFort->detail->label()}}
                                    </td>
                                    <td>{{$fourFort->east}}</td>
                                    <td>{{$fourFort->south}}</td>
                                    <td>{{$fourFort->west}}</td>
                                    <td>{{$fourFort->north}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p>
                            <b>६. डिजाइनरको विवरण</b>
                        </p>
                        <table
                            class="table table-sm table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>पद</th>
                                <th>नाम</th>
                                <th>NEC Council No.</th>
                                <th>पालिकाको दर्ता नं</th>
                                <th>कन्सल्टिंग फर्मबाट भए सो को नाम</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mapApply->designerDetails as $designerDetail)
                                <tr>
                                    <td>
                                        {{$designerDetail->post->label()}}
                                    </td>
                                    <td>{{$designerDetail->name}}</td>
                                    <td>{{$designerDetail->nec_council_no}}</td>
                                    <td>{{$designerDetail->local_body_registration_no}}</td>
                                    <td>{{$designerDetail->consulting_firm_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p>
                            <b>७. निवेदकको विवरण</b>
                        </p>
                        <div class="d-flex flex-wrap">
                            <p>७.१ निवेदकको प्रकार : </p>
                            @foreach(\Modules\EMap\Enums\ApplicantTypeEnum::cases() as $applicantType)
                                <div class="mx-2">
                                    <input type="checkbox"
                                           {{$applicantType->value==$mapApply->applicantDetail->applicant_type->value ? 'checked' : ''}}
                                           disabled>
                                    {{$applicantType->label()}}
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex flex-wrap">
                            <p>७.२ घरधनी सँगको सम्बन्ध </p>
                            @foreach(\Modules\EMap\Enums\RelationEnum::cases() as $relation)
                                <div class="mx-2">
                                    <input type="checkbox"
                                           {{$relation->value==$mapApply->applicantDetail->relation_with_owner->value ? 'checked' : ''}}
                                           disabled>
                                    {{$relation->label()}}
                                </div>
                            @endforeach
                        </div>

                        <p>
                            <b>जग्गाधनी वा घरधनी भन्दा फरक भएमा</b>
                        </p>
                        <table
                            class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    १.१ नाम : {{$mapApply->applicantDetail->name??''}}
                                </td>
                                <td>
                                    १.२ फोन नं. : {{$mapApply->applicantDetail->phone??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.३ बुवाको नाम : {{$mapApply->applicantDetail->father_name??''}}
                                </td>
                                <td>
                                    १.४ नागरिकता लिएको जिल्ला
                                    : {{$mapApply->applicantDetail->citizenshipIssueDistrict->district??''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    १.५ नागरिकत नम्बर : {{$mapApply->applicantDetail->citizenship_no??''}}
                                </td>
                                <td>
                                    १.६ नागरिकता लिएको मिति : {{$mapApply->applicantDetail->citizenship_issue_date??''}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <p>
                                <span class="underline-dotted custom-width">
                                    {{$mapApply->applicantDetail->application_date??''}}
                                </span>
                                <br>
                                <span class="custom-width">निबेदनको मिति</span>
                            </p>
                            <p>
                                <span class="underline-dotted custom-width">
                                    <img src="{{$mapApply->applicantDetail->signature_url??''}}" height="30"
                                         alt="Signature">
                                </span>
                                <br>
                                निवेदकको सहि
                            </p>
                        </div>

                        <h4 class="text-center">
                            निर्माण हुने भवन तथा मापदण्ड सम्बन्धि संक्षिप्त विवरण
                        </h4>

                        <h6>
                            मापदण्ड सम्बन्धि विवरण
                        </h6>
                        <table
                            class="table table-sm table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>क्र.सं</th>
                                <th>विवरण</th>
                                <th>मापदण्ड अनुसार</th>
                                <th>नक्सा अनुसार</th>
                                <th>अनुपालन</th>
                                <th>कैफियत</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mapApply->criteriaDetails as $criteriaDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$criteriaDetail->detail->label()}}
                                    </td>
                                    <td>{{$criteriaDetail->according_to_criteria}}</td>
                                    <td>{{$criteriaDetail->according_to_map}}</td>
                                    <td>{{$criteriaDetail->compliance}}</td>
                                    <td>{{$criteriaDetail->remarks }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h6>
                            भवन सम्बन्धि विवरण :
                        </h6>
                        <table
                            class="table table-sm table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>क्र.सं</th>
                                <th colspan="2" class="text-center">विवरण</th>
                                <th>कैफियत</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mapApply->buildingDetails as $buildingDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$buildingDetail->detail->label()}}
                                    </td>
                                    <td>{{$buildingDetail->description}} </td>
                                    <td>{{$buildingDetail->remarks}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <p> नाम : </p>
                        <p> मोबाइल नं. : </p>
                        <p> एन. ई. सी. नं. : : </p>
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
