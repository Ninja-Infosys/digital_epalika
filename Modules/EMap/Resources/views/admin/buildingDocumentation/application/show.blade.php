@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                alt="document-icon">
                            गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item ">दर्खास्त निवेदन सूची</li>
                    <li class="breadcrumb-item active">निवेदनको विवरण</li>
                </ol>
            </div>
            <h4 class="page-title">निवेदनको विवरण</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="header-title mb-0">व्यक्ति र संस्थाको पुरा विवरण</h4>
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light">
                            <i class="fa fa-list"></i> व्यक्ति र संस्थाको पुरा विवरणहरूको सुची</a>
                        <x-print-button target-element="printData" title="प्रतिवेदन रिपोर्ट" />
                    </div>
                </div>
            </div>
            <div id="printData">
                <div class="row mt-2 mx-2">
                    <div class="col-md-4">
                        <h4><b>संस्था :</b> {{ $buildingDocumentation->organization?->organizationDetail?->org_name_ne
                            ?? '' }}</h4>
                    </div>

                </div>
                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">१. प्रस्तावित भवनको विवरण</h5>
                    </legend>
                    <div class="mb-3">
                        <h4 class="form-label fw-bold">१.१ निर्माण कार्यको किसिम :
                            {{ $buildingDocumentation?->building_category?->label() }}
                        </h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.२ प्रयोजन :</b> {{ $buildingDocumentation?->building_usage?->label()
                            }}</h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.३ भवनको छानाको किसिम * :</b>
                            {{ $buildingDocumentation?->roof_category?->label() }}</h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.४ भवन निर्माण भएको वर्ष
                                :</b> {{get_nepali_number( $buildingDocumentation?->house_built_year) ?? '' }}
                        </h4>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.५ भवनको तल्ला संख्या
                                        संख्या :</b> {{ get_nepali_number($buildingDocumentation->current_storey) }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.६ भवनको कोठा संख्या
                                        :</b> {{ get_nepali_number($buildingDocumentation->room) }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.७ भवनको प्लिनथको क्षेत्रफल (वर्ग फिट/वर्ग मिटर) :</b>
                                    {{ get_nepali_number($buildingDocumentation->plinth_area) }}</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h4 class="form-label"><b>१.८ अन्य निर्माण (भवन बाहेक जस्तै:कम्पाउणडवाल, टहरा)ले ढाकेको
                                        क्षेत्रफल (वर्ग फिट/वर्ग मिटर):</b> {{
                                    get_nepali_number($buildingDocumentation->other_construction_area_new) }}</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h4 class="form-label"><b>१.९ अन्य निर्माण (भवन बाहेक जस्तै:कम्पाउणडवाल, टहरा)ले ढाकी
                                        सकेको क्षेत्रफल (वर्ग फिट/वर्ग मिटर):</b> {{
                                    get_nepali_number($buildingDocumentation->other_construction_area_old) }}</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h4 class="form-label"><b>१.१० भवन निर्माण र साबिक भवन निर्माणले ढाक्ने जम्मा
                                        क्षेत्रफल(Ground Coverage)(वर्ग फिट/वर्ग मिटर)
                                        : {{ get_nepali_number($buildingDocumentation->total_area) }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.११ भवनको कुल उचाई जमिनको सतहबाट (मिटर/फिट)
                                        : {{ get_nepali_number($buildingDocumentation->height) }}
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <h4 class="form-label"><b>१.१२ साविक भवन/निर्माण तला र क्षेत्रफल सम्बन्धित विवरण: </b>
                                </h4>
                                <div class="col-md-12">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>क्र.स</th>
                                                    <th>तल्ला</th>
                                                    <th> निर्माणको क्षेत्रफल फिट/मिटर</th>
                                                    <th> निर्माण भैसकेको जम्मा क्षेत्रफल वर्ग/मिटर फिट/मिटर</th>
                                                    <th>कैफियत</th>

                                                </tr>
                                            </tbody>
                                            @foreach ($buildingDocumentation->buildingStoreyDetails as $storeyDetail)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $storeyDetail?->direction?->label() }}</td>
                                                <td>{{ get_nepali_number($storeyDetail->land_area) }}</td>
                                                <td>{{ get_nepali_number($storeyDetail->area_of_former_construction) }}
                                                </td>
                                                <td>{{ $storeyDetail->remarks }}</td>

                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">२. जग्गाको विवरण</h5>
                    </legend>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.१ जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल :</b>
                                {{ get_nepali_number($buildingDocumentation->land_area) ?? '' }}</h4>

                        </div>
                        <div class="col-md-6 mb-3">
                            <h4 class="form-label"><b>२.२ फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक क्षेत्रफल
                                    :</b> {{ get_nepali_number($buildingDocumentation->field_land_area) ?? '' }}

                            </h4>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.३ निर्माण भएको जग्गाको कित्ता नं. :</b>
                                {{ get_nepali_number($buildingDocumentation->plot_no) ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.४ जग्गा विवरण :</b>
                                {{ $buildingDocumentation->land_detail ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.५ वार्ड नं. :</b>
                                {{ get_nepali_number($buildingDocumentation->land_ward_no) ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.६ टोल :</b>
                                {{ $buildingDocumentation->land_tole ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.७ साविक पालिका :</b>
                                {{ $buildingDocumentation->former_local_body ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.८ साविक वाड नं.
                                    :</b>
                                {{ get_nepali_number($buildingDocumentation->former_ward_no) ?? '' }}</h4>
                        </div>

                    </div>
                </fieldset>
                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">३. जग्गा धनीको विवरण</h5>
                    </legend>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१ जग्गा धनीको नाम :</b> {{
                                $buildingDocumentation->buildingLandOwner?->name ?? '' }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.२ फोन नं. :</b> {{
                                get_nepali_number($buildingDocumentation->buildingLandOwner?->phone) ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.३ साविक पालिका :</b>
                                {{ $buildingDocumentation->buildingLandOwner?->local_body ?? '' }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.४ साविक वडा नं. :</b>
                                {{ get_nepali_number($buildingDocumentation->buildingLandOwner?->former_ward_no) ?? ''
                                }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.५ बुवाको नाम :</b>
                                {{ $buildingDocumentation->buildingLandOwner?->father_name ?? '' }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.६ हजुरबुबाको नाम :</b>
                                {{ $buildingDocumentation->buildingLandOwner?->grandfather_name ?? '' }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.७ नागरिकता नम्बर :</b>
                                {{ get_nepali_number($buildingDocumentation->buildingLandOwner?->citizenship_no) ?? ''
                                }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.८ नागरिकता लिएको मिति :</b>
                                {{ $buildingDocumentation->buildingLandOwner?->citizenship_issue_date ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.९ नागरिकता लिएको जिल्ला :</b>
                                {{ $buildingDocumentation->buildingLandOwner?->citizenshipIssueDistrict?->district ?? ''
                                }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१० जग्गा धनीको फोटो :</b>
                                <img src="    {{ $buildingDocumentation->buildingLandOwner?->photo_url ?? '' }}" alt=""
                                    width="100" height="100">
                            </h4>

                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <legend>
                                    <h5 class="py-2">ठेगाना</h5>
                                </legend>
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>१. प्रदेश :</b>
                                            {{ $buildingDocumentation->buildingLandOwner?->province->province ?? '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>२. जिल्ला:</b>
                                            {{ $buildingDocumentation->buildingLandOwner?->district->district ?? '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>३. पालिका :</b>
                                            {{ $buildingDocumentation->buildingLandOwner?->localBody->local_body ?? ''
                                            }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>४. वडा नं. :</b>
                                            {{ get_nepali_number($buildingDocumentation->buildingLandOwner?->ward_no) ??
                                            '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>५. टोल :</b> {{
                                            $buildingDocumentation->buildingLandOwner?->tole ?? '' }}
                                        </h4>

                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h5>
                    </legend>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <h4 for="detail_check">के घर धनीको विवरण र जग्गाधनीको विवरण एउटै हो ?</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१ जग्गा धनीको नाम :</b>
                                {{ $buildingDocumentation->buildingHouseOwner?->name ?? '' }} </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.२ फोन नं. :</b>
                                {{ get_nepali_number($buildingDocumentation->buildingHouseOwner?->phone) ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.३ बुवाको नाम :</b>
                                {{ $buildingDocumentation->buildingHouseOwner?->father_name ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.४ हजुरबुबाको नाम :</b>
                                {{ $buildingDocumentation->buildingHouseOwner?->grandfather_name ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.६ नागरिकता नम्बर :</b>
                                {{ get_nepali_number($buildingDocumentation->buildingHouseOwner?->citizenship_no) ?? ''
                                }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.७ नागरिकता लिएको मिति :</b>
                                {{ $buildingDocumentation->buildingHouseOwner?->citizenship_issue_date ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.५ नागरिकता लिएको
                                    जिल्ला
                                    :</b> {{
                                $buildingDocumentation->buildingHouseOwner?->citizenshipIssueDistrict?->district ?? ''
                                }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.५ घरधनीको फोटो :</b>
                                <img src="    {{ $buildingDocumentation->buildingHouseOwner?->photo_url ?? '' }}"
                                    width="100" height="100" alt="">
                            </h4>

                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <legend>
                                    <h5 class="py-2">ठेगाना</h5>
                                </legend>
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>१. प्रदेश :</b>
                                            {{ $buildingDocumentation->buildingHouseOwner?->province->province ?? '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>२. जिल्ला:</b>
                                            {{ $buildingDocumentation->buildingHouseOwner?->district->district ?? '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>३. पालिका :</b>
                                            {{ $buildingDocumentation->buildingHouseOwner?->localBody->local_body ?? ''
                                            }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>४. वडा नं. :</b>
                                            {{ get_nepali_number($buildingDocumentation->buildingHouseOwner?->ward_no)
                                            ?? '' }}
                                        </h4>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h4 class="form-label"><b>५. टोल :</b>
                                            {{ $buildingDocumentation->buildingHouseOwner?->tole ?? '' }}
                                        </h4>

                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mx-2 my-2">
                    <legend>५. संधियारको विवरण </legend>
                    <div class="table-responsive">
                        <table class="table table-sm table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">दिशा</th>
                                    <th>नाम</th>
                                    <th>वडा नं.</th>
                                    <th>कित्ता नं.</th>
                                </tr>
                            </thead>
                            @foreach ($buildingDocumentation->neighbours as $neighbour)
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $neighbour->direction?->label() }}
                                    </td>
                                    <td>{{ $neighbour->neighbour_name }}</td>
                                    <td>{{ get_nepali_number($neighbour->ward_no) }}</td>
                                    <td>{{ get_nepali_number($neighbour->plot_no) }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </fieldset>

                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">६. ठेकेदारको विवरण</h5>
                    </legend>
                    @foreach ($buildingDocumentation->contractorDetails as $contractorDetail)

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> नाम :
                                {{ $contractorDetail->name }} </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> बुवाको नाम :
                                {{ $contractorDetail->father_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> हजुरबुबाको नाम :
                                {{ $contractorDetail->grandfather_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> फोन नं. :
                                {{ get_nepali_number($contractorDetail->phone) }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> NEC Council No :
                                {{ get_nepali_number($contractorDetail->nec_council_no) }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> पालिका दर्ता नं. :
                                {{ get_nepali_number($contractorDetail->local_body_registration_no) }}</h4>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <legend>
                                <h5 class="py-1">ठेगाना</h5>
                            </legend>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>१. प्रदेश :</b>
                                        {{ $contractorDetail->province?->province ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२. जिल्ला:</b>
                                        {{ $contractorDetail->district?->district ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>३. पालिका :</b>
                                        {{ $contractorDetail->localBody->local_body ?? '' }}
                                    </h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>४. वडा नं. :</b>
                                        {{ get_nepali_number($contractorDetail->ward_no) ?? '' }}
                                    </h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>५. टोल :</b> {{ $contractorDetail?->tole ?? '' }}
                                    </h4>

                                </div>
                            </div>

                        </fieldset>
                    </div>
                    @endforeach


                </fieldset>


                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">७. निवेदकको विवरण</h5>
                    </legend>
                    <div class="mb-3">
                        <h4 class="form-label"><b>५.१ निवेदकको प्रकार :</b>
                            {{ $buildingDocumentation->applicant_type?->label() }}</h4>

                    </div>

                    <div class="row">
                        <h4 class="form-label fw-bold mb-2">जग्गाधनी वा घरधनी भन्दा फरक भएमा</h4>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१ नाम :</b> {{ $buildingDocumentation->applicant_name }}</h4>
                        </div>

                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.२ फोन नं. :</b> {{
                                get_nepali_number($buildingDocumentation->applicant_phone_no) }}</h4>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.३ उमेर :</b>
                                {{ get_nepali_number($buildingDocumentation->applicant_age) }}
                            </h4>

                        </div>


                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <legend>
                                <h5 class="py-2">ठेगाना</h5>
                            </legend>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>१. प्रदेश :</b>
                                        {{ $buildingDocumentation->province->province ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२. जिल्ला:</b>
                                        {{ $buildingDocumentation->district->district ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>३. पालिका :</b>
                                        {{ $buildingDocumentation->localBody->local_body ?? '' }}
                                    </h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>४. वडा नं. :</b>
                                        {{ get_nepali_number($buildingDocumentation->applicant_ward_no) ?? '' }}
                                    </h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>५. टोल :</b>
                                        {{ $buildingDocumentation->applicant_tole ?? '' }}
                                    </h4>

                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="d-flex justify-content-between my-3 px-2">
                        <div class="col-3">
                            <h4 class="form-label fw-bold">निबेदनको मिति :
                                {{ get_nepali_number($buildingDocumentation->application_date) }}
                            </h4>

                        </div>
                        <div class="col-3">
                            <h4 class="form-label fw-bold">निवेदकको सहि :
                                <img src="{{ $buildingDocumentation->applicant_signature_url }}" height="80" width="80"
                                    alt="Signature">
                            </h4>
                        </div>
                    </div>

                </fieldset>
                <h4 class="fw-bold mt-3 text center text-black"> ८. भवनको बाहिरि पर्खाल र सिमानासम्माको दुरीको विवरण
                </h4>
                <fieldset class="mx-2 ">
                    <legend class="py-2">मापदण्ड सम्बन्धि विवरण</legend>
                    <div class="col-md-12">
                        <div class="table-responsive mt-1">
                            <table class="table table-sm table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>क्र.सं</th>
                                        <th> दिशा</th>
                                        <th> सडक छ, छैन</th>
                                        <th>झ्याल ढोका छ, छैन ? भए सोको विवरण</th>
                                        <th>न्यूनतम छाड्नु पर्ने</th>
                                        <th>छाडिएको</th>
                                        <th>कैफियत</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buildingDocumentation->buildingDescriptions as $buildingDescription)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <label for="name">
                                                {{ $buildingDescription->direction?->label() }}
                                            </label>
                                        </td>
                                        <td>
                                            {{ $buildingDescription->has_road }}
                                        </td>
                                        <td>
                                            {{ $buildingDescription->has_window }}
                                        </td>
                                        <td>
                                            {{ get_nepali_number($buildingDescription->minimum_distance_to_leave) }}
                                        </td>
                                        <td>
                                            {{ $buildingDescription->leave }}
                                        </td>
                                        <td>
                                            {{ $buildingDescription->remarks }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>


                <div class="d-flex flex-column align-items-end">
                    <div class="col-4">
                        <div class="mb-1">


                        </div>
                        <div class="mb-1">
                            <h4 class="form-label" for="buildingDocumentation.consultant_signature">(कन्सल्टेन्ट
                                इंन्जिनियरको
                                सहि) : <img src="{{ $buildingDocumentation->consultant_engineer_signature_url }}"
                                    height="80" width="80" alt="Signature"></h4>
                            <div class="mb-1">
                                <label class="form-label" for="buildingDocumentation.consultant_engineer_name">नाम :
                                    {{ $buildingDocumentation->consultant_engineer_name }}</label>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="buildingDocumentation.consultant_engineer_post">पद :
                                    {{ $buildingDocumentation->consultant_engineer_post }}</label>
                            </div>
                            <div class="mb-1">
                                <label for="buildingDocumentation.n_e_c_registration_no"><b>एन. ई. सी. नं :
                                        {{ get_nepali_number($buildingDocumentation->n_e_c_registration_no) }}
                                    </b></label>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!empty($buildingDocumentation->requiredDocument))
<div class="card">
    <div class="card-header">
        <h4 class="header-title mb-0">कागजातहरू</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->citizenship ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी', '{{ pathinfo($buildingDocumentation->requiredDocument?->citizenship ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->citizenship }}')"
                                    class="text-muted fw-medium" type="button">नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->citizenship ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->citizenship_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('citizenship')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->citizenship ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="citizenship_status"
                                            id="citizenship_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->citizenship_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->citizenship_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->citizenship_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->landowner_proved ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('जग्गाधनि प्रमाण पत्रको प्रतिलिपी', '{{ pathinfo($buildingDocumentation->requiredDocument?->landowner_proved ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->landowner_proved }}')"
                                    class="text-muted fw-medium" type="button">जग्गाधनि प्रमाण पत्रको प्रतिलिपी
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->landowner_proved ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->landowner_proved_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('landowner_proved')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->landowner_proved ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="landowner_proved_status"
                                            id="landowner_proved_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->landowner_proved_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->landowner_proved_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->landowner_proved_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->revenue ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि', '{{ pathinfo($buildingDocumentation->requiredDocument?->revenue ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->revenue }}')"
                                    class="text-muted fw-medium" type="button">चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->revenue ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->revenue_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('revenue')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->revenue ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="revenue_status"
                                            id="revenue_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->revenue_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->revenue_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->revenue_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->building_map ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('घरको नक्सा', '{{ pathinfo($buildingDocumentation->requiredDocument?->building_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->building_map }}')"
                                    class="text-muted fw-medium" type="button">घरको नक्सा
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->building_map ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->building_map_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('building_map')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->building_map ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="building_map_status"
                                            id="building_map_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->building_map_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->building_map_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->building_map_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->land_map ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('जग्गाको नक्सा', '{{ pathinfo($buildingDocumentation->requiredDocument?->land_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->land_map }}')"
                                    class="text-muted fw-medium" type="button">जग्गाको नक्सा
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->land_map ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->land_map_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('land_map')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->land_map ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="land_map_status"
                                            id="land_map_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->land_map_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->land_map_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->land_map_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-2 pe-0">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded">
                                        <i
                                            class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument?->all_round_house_pic ?? '') }} font-18"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0);"
                                    onclick="openFileModal('चारैतिरको फोटो', '{{ pathinfo($buildingDocumentation->requiredDocument?->all_round_house_pic ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->all_round_house_pic }}')"
                                    class="text-muted fw-medium" type="button">चारैतिरको फोटो
                                    .{{ pathinfo($buildingDocumentation->requiredDocument?->all_round_house_pic ?? '',
                                    PATHINFO_EXTENSION) }}</a>
                                <p class="mb-0 font-13">
                                    {{
                                    convert_to_highest_unit($buildingDocumentation->requiredDocument?->all_round_house_pic_size
                                    ?? '') }}
                                </p>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument?->getRawOriginal('all_round_house_pic')]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{ $buildingDocumentation->requiredDocument?->all_round_house_pic ?? '' }}"
                                    alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                <form
                                    action="{{ route('emap.admin.buildingDocumentation.updateDocumentStatus', $buildingDocumentation) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group d-flex align-items-center">
                                        <select class="form-select form-select-sm" name="all_round_house_pic_status"
                                            id="all_round_house_pic_status"
                                            aria-label="Example select with button addon">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="pending" {{ $buildingDocumentation->
                                                requiredDocument?->all_round_house_pic_status == 'pending' ? 'selected'
                                                : '' }}>
                                                प्रक्रियामा</option>
                                            <option value="accept" {{ $buildingDocumentation->
                                                requiredDocument?->all_round_house_pic_status == 'accept' ? 'selected' :
                                                '' }}>
                                                स्वीकार
                                            </option>
                                            <option value="reject" {{ $buildingDocumentation->
                                                requiredDocument?->all_round_house_pic_status == 'reject' ? 'selected' :
                                                '' }}>
                                                अस्वीकार</option>

                                        </select>
                                        <button class="btn btn-lg btn-outline-primary" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('admin.inc.file-view')
    </div>
</div>
@endif
@endsection
