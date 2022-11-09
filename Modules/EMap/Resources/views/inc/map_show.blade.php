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
    <livewire:emap::edit.map-apply-edit-livewire :mapApply="$mapApply"/>
    <p class="break-page"></p>
    <livewire:emap::edit.storey-detail-edit-livewire :mapApply="$mapApply"/>


    <p>
        <b>२. जग्गाको विवरण</b>
    </p>
    <p>
        २.१ भू-उपयोग्य क्षेत्र :
        <span class="underline-dotted">
                                {{$mapApply->landDetail->land_use_area??''}}
                            </span>
    </p>
    <div class="d-flex flex-wrap">
        <p>
            २.२ वडा नं : <span
                class="underline-dotted"> {{$mapApply->landDetail->ward_no ?? ''}} </span>
        </p>
        <p class="mx-3">
            २.३ साविक वडा नं : <span
                class="underline-dotted"> {{$mapApply->landDetail->former_ward_no??''}} </span>
        </p>
    </div>

    <div class="d-flex flex-wrap">
        <p>
            २.४ टोलको नाम :
            <span class="underline-dotted">
                                    {{$mapApply->landDetail->tole ?? ''}}
                                </span>
        </p>
        <p class="mx-3">
            २.५ सडक कोड नं :
            <span class="underline-dotted">
                                    {{$mapApply->landDetail->street_code_no??''}}
                                </span>
        </p>
    </div>
    <p>
        २.६ जग्गा कित्ता नं :
        <span class="underline-dotted">
                                {{$mapApply->landDetail->plot_no??''}}
                            </span>
    </p>

    <p>
        २.७ क्षेत्रफल
        <span class="underline-dotted">
                                {{$mapApply->landDetail->unit_value??''}} {{$mapApply->landDetail->unit->title??''}}
                            </span>
    </p>

    <p>
        २.८ भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR):
        <span class="underline-dotted">
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

    <p class="break-page"></p>
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
        <div>
            <div class="my-5">
                <p class="underline-dotted">
                    {{$mapApply->applicantDetail->application_date??''}}
                </p>
                <p>निबेदनको मिति</p>
            </div>
        </div>
        <div>
            <div class="my-5">
                <p class="custom-width underline-dotted"></p>
                <p>निवेदकको सहि</p>
            </div>
        </div>
    </div>


    <p class="break-page"></p>

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
                <p class="custom-width underline-dotted"></p>
                <p>(कन्सल्टेन्ट इंन्जिनियरको सहि)</p>
            </div>
            <p> नाम : {{$mapApply->consultant_name}}</p>
            <p> मोबाइल नं. : {{$mapApply->consultant_mobile_no}}</p>
            <p> एन. ई. सी. नं. : {{$mapApply->consultant_nec_no}} </p>
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
