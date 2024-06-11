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

                        <li class="breadcrumb-item active">घर अभिलेखिकरण प्रमाण पत्र</li>
                    </ol>
                </div>
                <h4 class="page-title">घर अभिलेखिकरण प्रमाण पत्र</h4>
            </div>
        </div>
    </div>
    @if (
        $buildingDocumentation->status == Modules\EMap\Enums\BuildingDocumentationStatusEnum::CERTIFICATE ||
            is_null(auth()->user()->ward_no))
        <div class="row">
            <div class="col-md-12">
                <div class="card p-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title">घर अभिलेखिकरण प्रमाण पत्र</h4>
                            <div class="d-flex justify-content-between">
                                <x-print-button title="घर अभिलेखिकरण प्रमाण पत्र" target-element="printData" />

                                <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-list"> दर्ता भएका अभिलेखीकरण</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div Id="printData">
                            <div class="text-center font-weight-bold fs-4">
                                <h4><strong>अनुसूची ५</strong></h4>
                                <h4><strong>घर अभिलेखिकरण प्रमाण पत्र</strong></h4>
                                <h4><strong>{{ $officeSetting?->localBody?->local_body ?? ''}}</strong></h4>
                                <h4><strong> नगर कार्यपाालिकाको कार्यालय</strong></h4>
                                <h4><strong>{{ $officeSetting?->site_address ?? '' }}</strong></h4>
                                <h4><strong>कर्णली प्रदेश नेपाल</strong></h4>
                                <h3><strong>अभिलेखिकरण प्रमाण पत्र</strong></h3>

                            </div>
                            <div class="text-end lh-lg px-5">
                                <p>आ.व: {{ get_nepali_number($officeSetting->fiscalYear?->title ?? '' )}}</p>
                                <p>मिति: {{ get_nepali_number($currentDate)}}</p>

                            </div>
                            <p class="text-justify-center lh-lg "> अभीलेख नं. :</p>

                            <p class="text-justify-center  lh-lg "> <span
                                    class="dashed-bottom">{{ $buildingDocumentation->applicant_former_district }} </span>
                                जिल्ला
                                <span class="dashed-bottom">{{ $buildingDocumentation->applicant_former_local_body }}
                                </span>
                                गा.पा./न.पा <span
                                    class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->applicant_former_ward_no) }}
                                </span> नं. वडा स्थायी ठेगाना भइ हाल
                                वागचौर नगरपालिका <span
                                    class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->ward_no) }} </span>
                                नं.
                                वडा
                                <span class="dashed-bottom">{{ $buildingDocumentation->tole }} </span> टोल बस्ने
                                श्री{{ $buildingDocumentation->applicant_name }} ले सविक <span
                                    class="dashed-bottom">{{ $buildingDocumentation->former_district }} </span> गा.वि.स. वडा
                                नं.
                                <span class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->former_ward_no) }}
                                </span> कित्ता
                                नं <span class="dashed-bottom">{{ $buildingDocumentation->plot_no }} </span> मा <span
                                    class="dashed-bottom">{{ $buildingDocumentation->area }} </span> क्षेत्रफलमा <span
                                    class="dashed-bottom">{{ $buildingDocumentation->buildingCategory }} </span> भवन
                                अभिलेखिकरण
                                निर्देशिका लागु हुनु
                                भन्दा अगाडी घर,टहरा निर्माण सम्पन्ना भइ सकेको भनि
                                पेश गर्नु भएको निवेदन उपर कारवाहि हुदा मिति <span
                                    class="dashed-bottom">{{ $buildingDocumentation->applicantion_date }} </span> मा
                                नगरपालिकाको स्थलगत निरिक्षण
                                प्रतिवेदन र यस
                                नगरपालिका {{ get_nepali_number($officeSetting->ward_no ?? '') }} नं. वडाको मिति
                                .............
                                गतेको सिफारिस पत्रका आधारमा निजलाई घर
                                अभिलेखिकरणको प्रमाण पत्र
                                प्रदान गरिएको छ ।
                            </p>

                            <table class="table table-bordered  lh-lg px-5">
                                <thead>
                                    <tr>
                                        <th scope="col">तला</th>
                                        <th scope="col">सविका निर्माण भईसकेको क्षेत्रफल</th>
                                        <th scope="col">जग्गाको क्षेत्रफल</th>
                                        <th scope="col">कैफियत</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buildingDocumentation?->buildingStoreyDetails as $buildingStoreyDetail)
                                        <tr>
                                            <th scope="row">{{ $buildingStoreyDetail?->storey->label() }}</th>
                                            <td>{{ get_nepali_number($buildingStoreyDetail->area_of_former_construction) }}
                                            </td>
                                            <td>{{ get_nepali_number($buildingStoreyDetail->land_area) }}</td>
                                            <td>{{ get_nepali_number($buildingStoreyDetail->remarks) }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex gap-5 justify-content-between text-center">
                                <p>...................<br>
                                    अमिन
                                </p>
                                <p>........................<br>
                                    सव-इन्जिनियर
                                </p>
                                <p>.......................<br>
                                    इन्जिनियर
                                </p>
                                <p>.........................................<br>
                                    प्रमुख प्रसाशकीय अधिकृत
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
