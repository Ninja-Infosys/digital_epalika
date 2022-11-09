<div class="font-black" id="printData">
    <span>
        {{config('applicationDetail.to_office.to')}}<br>
        {{config('applicationDetail.to_office.office_name')}}<br>
        {{config('applicationDetail.to_office.office')}}<br>
        {{config('applicationDetail.to_office.office_address')}}
    </span><br>
    <p class="text-center fw-bold">बिषय: भबन निर्माणको लागि नक्सापास सम्बन्धमा ।</p>

    <span>
        मैले/हामीले देहायमा लेखिए बमोजिम भवन निर्माण कार्य गर्ने भएकोले उक्त निर्माण कार्यको बिबरण
        तपसिलमा खुलाई आफ्नो हक भोगको निस्साको नक्कल, कित्ता नापी नक्साको नक्कल र घरको नक्सा लगायत
        आवस्यक कागजात सहित निवेदन पेश गरेको छु/छौं । उक्त नक्सापास गरी निर्माण कार्य गर्न स्वीकृति
        पाउन अनुरोध छ। निर्माण कार्यको इजाजत प्राप्त
        भएपछी {{config('applicationDetail.office_type')}} द्वारा स्वीकृत मापदण्ड तथा राष्ट्रिय भवन
        संहिता भित्र रही निर्माण कार्य गर्नेछु/छौं। यस दरखास्त फाराममा लेखिएको व्यहोरा ठीक साँचो छ,
        झुठ्ठा ठहरे कानून बमोजिम सहुँला बुझाउँला।
    </span><br>
    <span class="fw-bold">तपसिल</span><br>
    <span class="fw-bold">
        १. प्रस्तावित भवनको विवरण
    </span><br>
    <span>१.१ निर्माण कार्यको किसिम</span><br>
    <span class="d-flex flex-wrap">
        @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
            <div class="m-1">
                <input type="checkbox"
                       {{$constructionType->value==$mapApply->construction_type->value ? 'checked' : ''}}
                       disabled>
                {{$constructionType->label()}}
            </div>
        @endforeach
    </span>

    <span>१.२ प्रयोजन</span><br>
    <span class="d-flex flex-wrap">
        @foreach(\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
            <div class="m-1">
                <input type="checkbox"
                       {{$usages->value==$mapApply->usage->value ? 'checked' : ''}}
                       disabled>
                {{$usages->label()}}
            </div>
        @endforeach
    </span>
    <div class="d-flex flex-wrap">
        <span>१.३ भवन ऐन अनुसार वर्गीकरण : </span><br>
        @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
            <div class="mx-2">
                <input type="checkbox"
                       {{$categorization->value==$mapApply->building_category->value ? 'checked' : ''}}
                       disabled>
                {{$categorization->label()}}
            </div>
        @endforeach
    </div>
    <span>
        १.४ स्ट्रकचर टाईप : {{$mapApply->structureType->title??''}}
    </span><br>
    <div class="d-flex flex-wrap">
        <span>
            १.५ हाल निर्माण गर्ने तल्ला संख्या : <span
                class="underline-dotted"> {{$mapApply->current_storey}} </span>
        </span><br>
        <span class="mx-3">
            १.६ प्लिन्थको क्षेत्रफल : <span
                class="underline-dotted"> {{$mapApply->area_of_plinth}} </span>
        </span>
    </div>
    <span>
        १.७ भविष्यमा निर्माण गर्ने तल्ला संख्या :
        <span class="underline-dotted">
                                {{$mapApply->future_storey}}
                            </span>
    </span><br>
    <div class="d-flex flex-wrap">
        <span>
            १.८ कुल भवनको लम्बाई :
            <span class="underline-dotted">
                                    {{$mapApply->length}}
                                </span>
        </span><br>
        <span class="mx-3">
            १.९ कुल भवनको चौडाई :
            <span class="underline-dotted">
                                    {{$mapApply->breadth}}
                                </span>
        </span>
    </div>

    <span>
        १.१० भवनको कुल उचाई जमिनको सतहबाट :
        <span class="underline-dotted">
                                {{$mapApply->height}}
                            </span>
    </span><br>
    <span class="break-page"></span>
    <span>
        १.११ तल्लाको क्षेत्रफल र उचाईको विवरण :
    </span><br>
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

    <span>
        <b>२. जग्गाको विवरण</b>
    </span><br>
    <span>
        २.१ भू-उपयोग्य क्षेत्र :
        <span class="underline-dotted">
                                {{$mapApply->landDetail->land_use_area??''}}
                            </span>
    </span><br>
    <div class="d-flex flex-wrap">
        <span>
            २.२ वडा नं : <span
                class="underline-dotted"> {{$mapApply->landDetail->ward_no ?? ''}} </span>
        </span><br>
        <span class="mx-3">
            २.३ साविक वडा नं : <span
                class="underline-dotted"> {{$mapApply->landDetail->former_ward_no??''}} </span>
        </span><br>
    </div>

    <div class="d-flex flex-wrap">
        <span>
            २.४ टोलको नाम :
            <span class="underline-dotted">
                                    {{$mapApply->landDetail->tole ?? ''}}
                                </span>
        </span><br>
        <span class="mx-3">
            २.५ सडक कोड नं :
            <span class="underline-dotted">
                                    {{$mapApply->landDetail->street_code_no??''}}
                                </span>
        </span><br>
    </div>
    <span>
        २.६ जग्गा कित्ता नं :
        <span class="underline-dotted">
                                {{$mapApply->landDetail->plot_no??''}}
                            </span>
    </span><br>

    <span>
        २.७ क्षेत्रफल
        <span class="underline-dotted">
                                {{$mapApply->landDetail->unit_value??''}} {{$mapApply->landDetail->unit->title??''}}
                            </span>
    </span><br>

    <span>
        २.८ भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR):
        <span class="underline-dotted">
                                {{$mapApply->landDetail->percentage_of_area_covered_by_building??''}}
                            </span>
    </span><br>

    <span>
        <b>३. जग्गा धनीको विवरण</b>
    </span><br>
    <span>३.१ जग्गा धनीको किसिम : </span><br>
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

    <span>
        <b>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</b>
    </span><br>
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

    <span class="break-page"></span><br>
    <span>
        <b>५. चार किल्लाको विवरण</b>
    </span><br>
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

    <span>
        <b>६. डिजाइनरको विवरण</b>
    </span><br>
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

    <span>
        <b>७. निवेदकको विवरण</b>
    </span><br>
    <div class="d-flex flex-wrap">
        <span>७.१ निवेदकको प्रकार : </span>
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
        <span>७.२ घरधनी सँगको सम्बन्ध </span>
        @foreach(\Modules\EMap\Enums\RelationEnum::cases() as $relation)
            <div class="mx-2">
                <input type="checkbox"
                       {{$relation->value==$mapApply->applicantDetail->relation_with_owner->value ? 'checked' : ''}}
                       disabled>
                {{$relation->label()}}
            </div>
        @endforeach
    </div>

    <span>
        <b>जग्गाधनी वा घरधनी भन्दा फरक भएमा</b>
    </span><br>
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
        <div>
            <div class="my-5">
                <span class="underline-dotted">
                    {{$mapApply->applicantDetail->application_date??''}}
                </span>
                <span>निबेदनको मिति</span>
            </div>
        </div>
        <div>
            <div class="my-5">
                <span class="custom-width underline-dotted"></span>
                <span>निवेदकको सहि</span>
            </div>
        </div>
    </div>


    <span class="break-page"></span><br>

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

    <div class="d-flex justify-content-end">
        <div>
            <div class="my-5">
                <span class="custom-width underline-dotted"></span><br>
                <span>(कन्सल्टेन्ट इंन्जिनियरको सहि)</span><br>
            </div>
            <span> नाम : {{$mapApply->consultant_name}}</span><br>
            <span> मोबाइल नं. : {{$mapApply->consultant_mobile_no}}</span><br>
            <span> एन. ई. सी. नं. : {{$mapApply->consultant_nec_no}} </span><br>
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
