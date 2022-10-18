<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4 class="header-title">नक्सा दर्ता तथा दस्तुर सम्बन्धि</h4>
            <div>
                @if(!empty($mapApply->mapRegistration))
                    <a class="btn btn-info btn-sm"
                       href="{{route('emap.admin.map.map-apply.map-registration.edit',[$mapApply,$mapApply->mapRegistration])}}">
                        <i class="fa fa-edit"></i> दर्ता
                        गरिएको नक्सा अपडेट गर्नुहोस्</a>
                    <x-application-component
                        :application-type="\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_FEES_AND_REGISTRATION"
                        url="{{route('emap.admin.map.map-apply.notice.apply-map-notice',$mapApply)}}"/>
                    <button class="btn btn-sm btn-success mx-2 printButton" printElementId='printData1'
                            requestRoute="{{route('print.application-print')}}" title="Print Application">
                        <i class="fa fa-print"></i>
                    </button>
                @else
                    <a class="btn btn-primary btn-sm"
                       href="{{route('emap.admin.map.map-apply.map-registration.create',$mapApply)}}"> <i
                            class="fa fa-plus"></i> नक्सा दर्ता
                        गर्नुहोस</a>
                @endif


            </div>
        </div>
    </div>
    <div class="card-body">
        @if(!empty($mapApply->mapRegistration))
            <div class="font-black" id="printData1">
                <h5 class="text-center"><b>दस्तुर तथा दर्ता सम्बन्धि</b></h5>
                <p>घरधनीको नाम, थर: <span class="underline-dotted">{{$mapApply->houseOwner->name ?? ''}}</span></p>
                <p>भू-उपयोग क्षेत्र : <span
                        class="underline-dotted">{{$mapApply->landDetail->land_use_area??''}} {{$mapApply->landDetail->unit->title??''}}</span>
                </p>
                <p>निर्माणको विवरण : <span class="underline-dotted">{{$mapApply->usage->label()??''}}</span></p>
                <p>निर्माणको प्रयोजन : <span
                        class="underline-dotted">{{$mapApply->construction_type->label() ??''}}</span></p>
                <p>भवनको वर्गीकरण :
                    @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)

                        <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions"
                               id="categorization{{$loop->index}}"
                               {{$categorization->value===$mapApply->building_category->value ? 'checked' : ''}}
                               disabled>
                        <label class="form-check-label"
                               for="categorization{{$loop->index}}">{{$categorization->label()}}</label>
                    @endforeach
                </p>
                <p>निर्माणको स्ट्रक्चरल सिस्टम : <span
                        class="underline-dotted "> {{$mapApply->structureType->title??''}}</span></p>
                <table class="table table-bordered mt-2">
                    <thead>
                    <tr class="text-center">
                        <th rowspan="2">तल्लाको विवरण</th>
                        <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                        <th colspan="2">नक्सा दस्तुर</th>
                        <th rowspan="2">कैफियत</th>
                    </tr>
                    <tr class="text-center">
                        <th>(वर्ग फिट/मिटर)</th>
                        <th>दर</th>
                        <th>रकम</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($mapApply->mapRegistration->mapRegistrationParticulars as $particular)
                        <tr>
                            <td>{{$particular->storey ?? ''}}</td>
                            <td>{{$particular->area ?? 0}}</td>
                            <td>रु. {{$particular->rate ?? 0}}</td>
                            <td>रु. {{$particular->amount ?? ''}}</td>
                            <td>{{$particular->remarks ?? ''}}</td>
                        </tr>

                    @endforeach

                    <tr>
                        <th colspan="2">जम्मा</th>
                        <td>रु. {{$mapApply->mapRegistration->particular_total_rate}}</td>
                        <td>रु. {{$mapApply->mapRegistration->particular_total_amount}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">फारम दस्तुर</th>
                        <td colspan="3">रु. {{$mapApply->mapRegistration->form_receipt}}</td>
                        <td rowspan="4">राजस्व उपशाखामा बुझाउने</td>
                    </tr>
                    <tr>
                        <th scope="row">निवेदक दर्ता दस्तुर</th>
                        <td colspan="3">रु. {{$mapApply->mapRegistration->application_registration_fee}}</td>
                    </tr>
                    <tr>
                        <th scope="row">अन्य</th>
                        <td colspan="3">रु. {{$mapApply->mapRegistration->other}}</td>
                    </tr>
                    <tr>
                        <th scope="row">कुल जम्मा</th>
                        <td colspan="3">रु. {{$mapApply->mapRegistration->total_amount}}</td>
                    </tr>
                    </tbody>
                </table>
                <p>अक्षरेपी
                    <x-number-into-unicode :is_currency="true" :number="$mapApply->mapRegistration->total_amount ?? ''"
                                           id="in_amount" class="underline-dotted"/>
                    मात्र
                </p>
                <p>फाटवालाको सही: <span class="underline-dotted custom-width"></span></p>
                <p>मिति:<span class="underline-dotted">{{$mapApply->mapRegistration->nepali_date ?? ''}}</span>
                    रसिद नं: <span class="underline-dotted">{{$mapApply->mapRegistration->receipt_no ?? ''}}</span>
                    रकम बुझने: <span class="underline-dotted">{{$mapApply->mapRegistration->recipient ?? ''}}</span>
                </p>
                <strong>राजस्व शाखाको प्रयोजनको लागि</strong>
                <p>निवेदकको नक्सा पास दस्तुर वापत रु: <span
                        class="underline-dotted">{{$mapApply->mapRegistration->total_amount ?? ''}}</span> बाट प्राप्त
                    भयो |</p>
                <p>मिति: <span class="underline-dotted">{{$mapApply->mapRegistration->nepali_date ?? ''}}</span>
                    रसिद नं:<span class="underline-dotted">{{$mapApply->mapRegistration->receipt_no ?? ''}}</span>
                    रकम बुझने: <span class="underline-dotted">{{$mapApply->mapRegistration->recipient ?? ''}}</span></p>
            </div>
        @endif
    </div>
</div>

@push('style')
    <style>
        .font-black p {
            color: black;
            font-size: 12px;
        }

        .underline-dotted {
            border-bottom: dotted 2px !important;
            padding: 0 20px;
        }

        .custom-width {
            padding: 0 80px !important;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
@endpush

