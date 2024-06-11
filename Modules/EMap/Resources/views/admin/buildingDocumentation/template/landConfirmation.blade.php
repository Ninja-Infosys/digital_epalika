@extends('admin.layouts.master')
@section('content')
    <div class="row m-3">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">अभिलेखीकरण</li>
                    </ol>
                </div>
                <h4 class="page-title">सरजमिन मुचुल्काको ढाँचा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">सरजमिन मुचुल्काको ढाँचा </h4>
                        <div class="d-flex justify-content-between">
                            <x-print-button title="७ दिने सूचना" target-element="printData" />

                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका अभिलेखीकरण</i>
                            </a>
                        </div>
                    </div>
                </div>
                @if (!is_null(auth()->user()->ward_no) && $buildingDocumentation->sent_admin == null)
                    <a href="{{ route('emap.admin.buildingDocumentation.showToAdmin', $buildingDocumentation) }}" data-bs-type="edit" type="submit" title="प्रिन्ट गर्नुहोस"
                       class="btn btn-xs btn-outline-warning">
                        <i class="fa fa-print"></i>पालिकामा देखाउनुहोस्
                    </a>
                @endif
                @if (
                    $buildingDocumentation->sent_admin == 'land_confirmation_show' ||
                        $buildingDocumentation->sent_admin == 'recommendation_sent' ||
                        !is_null(auth()->user()->ward_no))
                    <div class="card-body px-0">
                        <div id="printData">
                            <div class="text-center fw-bolder">
                                <div><span style="font-size:14px"><strong>अनुसूची-३</strong></span><br />
                                    <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग
                                            सम्वन्धित</strong></span><br />
                                    <span style="font-size:14px"><strong>सरजमिन मुचुल्काको ढाँचा</strong></span>
                                </div>
                            </div>

                            <div class="subject mt-4">
                                <p>
                                    {{ $buildingDocumentation?->localBody?->local_body }}
                                    वडा नं {{ get_nepali_number($buildingDocumentation->ward_no) ?? '' }} वस्ने श्री
                                    {{ $buildingDocumentation->house_owner_name }} ले यस कार्यालयमा पेश गरेको
                                    निवेदन
                                    माथि स्थलगत चेकजाँच गर्दा निजले साविक जिल्ला
                                    {{ $buildingDocumentation->former_district }}
                                    {{ $buildingDocumentation->former_local_body }} वडा नं
                                    {{ get_nepali_number($buildingDocumentation->former_ward_no) }} हाल
                                    {{ $officeSetting->localBody->local_body ?? '' }}
                                    वडा नं. {{ get_nepali_number($buildingDocumentation->land_ward_no) }} को कित्ता नं .
                                    {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                                    {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफल जग्गामा
                                    {{ get_nepali_number($buildingDocumentation->house_built_year) }} सालमा
                                    {{ get_nepali_number($buildingDocumentation->room) }} कोठाको
                                    {{ get_nepali_number($buildingDocumentation->storey) }} तल्लाको
                                    {{ get_nepali_number($buildingDocumentation->area) }} क्षेत्रफलको घर/भवन निर्माण गरेको
                                    ठिक
                                    साँचो हो
                                    र यो घरको नक्सापास गरिदिएमा हामीलाइ कुनै किसिमको दावी विरोध छैन । पछि
                                    होइन/छैन भनि कहि कतै उजुरी समेत गर्ने छैन । साथै कार्यालयबाट खटिआएका
                                    डोरले सोधनी गर्दा चित्त बुझ्यो । निजले सडक अधिकार क्षेत्र
                                    {{ get_nepali_number($buildingDocumentation->road_jurisdiction) }}मि समेत छाडी घर
                                    निर्माण
                                    गरेको देखिन्छ /
                                    पाइएको छ ।
                                </p>
                                <p>संधियारहरु</p>

                                @foreach ($buildingDocumentation->neighbours as $neighbour)
                                    <p><strong>{{ $neighbour->direction->label() }}तर्फ :-</strong></p>
                                    <p>१. {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                                        {{ get_nepali_number($neighbour->ward_no) }} बस्ने श्री
                                        {{ $neighbour->neighbour_name }} </p>
                                @endforeach

                                <p class="mt-2">वडा अध्यक्ष श्री .................
                                    {{ $officeSetting->localBody->local_body ?? '' }}
                                    .........नं. वडा </p>
                                <p>काम तामेल गर्ने कर्मचारी :</p>

                                <p>ईति सम्वत </p>

                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
