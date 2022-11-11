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
    <livewire:emap::edit.map-apply-edit-livewire :mapApply="$mapApply" :districts="$districts"/>
    <p class="break-page"></p>
    <livewire:emap::edit.storey-detail-edit-livewire :mapApply="$mapApply"/>
    <livewire:emap::edit.land-detail-edit-livewire :mapApply="$mapApply"/>
    <livewire:emap::edit.land-owner-edit-livewire :mapApply="$mapApply" :districts="$districts"/>
    <livewire:emap::edit.house-owner-edit-livewire :mapApply="$mapApply" :districts="$districts"/>
    <livewire:emap::edit.four-fort-detail-edit-livewire :mapApply="$mapApply"/>
    <livewire:emap::edit.designer-detail-edit-livewire :mapApply="$mapApply"/>
    <livewire:emap::edit.applicant-detail-edit-livewire :mapApply="$mapApply" :districts="$districts"/>
    <p class="break-page"></p>
    <livewire:emap::edit.criteria-detail-edit-livewire :mapApply="$mapApply" :districts="$districts"/>

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
