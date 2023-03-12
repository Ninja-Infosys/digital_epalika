@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.taskManagement.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item ">नक्सा</li>
                        <li class="breadcrumb-item active">व्यक्तिको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>व्यक्ति र संस्थाको पुरा विवरण
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">व्यक्ति र संस्थाको पुरा विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            <a href="{{ route('emap.admin.map.mapApply.index', $applicationFormTypeEnum) }}"
                                class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list"></i> व्यक्ति र संस्थाको पुरा विवरणहरूको सुची</a>
                        </div>
                    </div>
                </div>

                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">१. प्रस्तावित भवनको विवरण</h5>
                    </legend>
                    <div class="mb-3">
                        <h4 class="form-label fw-bold">१.१ निर्माण कार्यको किसिम :
                            {{ $mapApply->construction_type?->label() }}
                        </h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.२ प्रयोजन :</b> {{ $mapApply->usage?->label() }}</h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.३ भवन ऐन अनुसार वर्गीकरण :</b>
                            {{ $mapApply->building_category?->label() }}</h4>
                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>१.४ स्ट्रकचर टाईप :</b> {{ $mapApply->structureType->title ?? '' }}</h4>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.५ हाल निर्माण गर्ने तल्ला
                                        संख्या :</b> {{ $mapApply->current_storey }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.६ प्लिन्थको क्षेत्रफल :</b> {{ $mapApply->area_of_plinth }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.७ भविष्यमा निर्माण गर्ने तल्ला संख्या :</b>
                                    {{ $mapApply->future_storey }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.८ कुल भवनको लम्बाई :</b> {{ $mapApply->length }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.९ कुल भवनको चौडाई :</b> {{ $mapApply->breadth }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.१० भवनको कुल उचाई जमिनको सतहबाट : {{ $mapApply->height }}</h4>
                            </div>
                            <div class="col-md-12">
                                <h4 class="form-label">१.११ तल्लाको क्षेत्रफल र उचाईको विवरण </h4>
                                <div class="col-md-12">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>क्र.स</th>
                                                    <th>तल्ला</th>
                                                    <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                                    <th>साविक निर्माणको क्षेत्रफल</th>
                                                    <th>जम्मा क्षेत्रफल</th>
                                                    <th>उचाई</th>
                                                </tr>
                                            </tbody>
                                            @foreach ($mapApply->storeyDetails as $storeyDetail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $storeyDetail->mapFee->storey ?? '' }}</td>
                                                    <td>{{ $storeyDetail->area_of_proposed_construction }}</td>
                                                    <td>{{ $storeyDetail->area_of_former_construction }}</td>
                                                    <td>{{ $storeyDetail->total_area }}</td>
                                                    <td>{{ $storeyDetail->height }}</td>
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
                            <h4 class="form-label"><b>२.१ भू-उपयोग्य क्षेत्र :</b>
                                {{ $mapApply->landDetail->land_use_area ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.२ वडा नं :</b> {{ $mapApply->landDetail->ward_no ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.३ साविक वडा नं :</b>
                                {{ $mapApply->landDetail->ward_no ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.४ टोलको नाम :</b>
                                {{ $mapApply->landDetail->tole ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.५ सडक कोड नं :</b>
                                {{ $mapApply->landDetail->street_code_no ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.६ जग्गा कित्ता नं :</b>
                                {{ $mapApply->landDetail->plot_no ?? '' }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>२.७ क्षेत्रफल (बिघा) :</b>
                                {{ $mapApply->landDetail->unit_value ?? '' }}</h4>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">
                                <b>२.८ भवनले
                                    ढाक्ने क्षेत्रफलको प्रतिशत (GCR) :</b>
                                {{ $mapApply->landDetail->percentage_of_area_covered_by_building ?? '' }}
                            </h4>

                        </div>
                    </div>
                </fieldset>
                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">३. जग्गा धनीको विवरण</h5>
                    </legend>
                    <div class="mb-3">
                        <h4 class="form-label"><b>३.१ जग्गा धनीको किसिम :</b>
                            {{ $mapApply->landOwner->land_owner_type?->label() }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१ जग्गा धनीको नाम :</b> {{ $mapApply->landOwner->name }} </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.२ फोन नं. :</b> {{ $mapApply->landOwner->phone }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.३ बुवाको नाम :</b> {{ $mapApply->landOwner->father_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.४ हजुरबुबाको नाम :</b> {{ $mapApply->landOwner->grandfather_name }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.६ नागरिकता नम्बर :</b> {{ $mapApply->landOwner->citizenship_no }}
                            </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.७ नागरिकता लिएको मिति :</b>
                                {{ $mapApply->landOwner->citizenship_issue_date }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.५ नागरिकता लिएको जिल्ला :</b>
                                {{ $mapApply->landOwner->citizenship_issue_district_id }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.८ ठेगाना :</b> {{ $mapApply->landOwner->address }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.९ पालिका :</b> {{ $mapApply->landOwner->local_body }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१० वडा नं. :</b> {{ $mapApply->landOwner->ward_no }}</h4>

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
                            <h4 class="form-label" f>१.१ जग्गा धनीको नाम :
                                {{ $mapApply->houseOwner->name }} </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.२ फोन नं. :
                                {{ $mapApply->houseOwner->phone }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.३ बुवाको नाम :
                                {{ $mapApply->houseOwner->father_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.४ हजुरबुबाको नाम :
                                {{ $mapApply->houseOwner->grandfather_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.६ नागरिकता नम्बर :
                                {{ $mapApply->houseOwner->citizenship_no }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.७ नागरिकता लिएको मिति :
                                {{ $mapApply->houseOwner->citizenship_issue_date }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.५ नागरिकता लिएको
                                जिल्ला : {{ $mapApply->houseOwner->citizenship_issue_district_id }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.८ ठेगाना :
                                {{ $mapApply->houseOwner->address }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.९ पालिका :
                                {{ $mapApply->houseOwner->local_body }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label">१.१० वडा नं. :
                                {{ $mapApply->houseOwner->ward_no }}</h4>

                        </div>
                    </div>
                </fieldset>

                <fieldset class="mx-2 my-2">
                    <legend>५. चार किल्लाको विवरण</legend>
                    <div class="table-responsive">
                        <table class="table table-sm table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">विवरण</th>
                                    <th>पूर्व</th>
                                    <th>पश्चिम</th>
                                    <th>उत्तर</th>
                                    <th>दक्षिण</th>
                                </tr>
                            </thead>
                            @foreach ($mapApply->fourForts as $fourFort )
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $fourFort->detail?->label() }}
                                    </td>
                                    <td>{{ $fourFort->east }}</td>
                                    <td>{{ $fourFort->west }}</td>
                                    <td>{{ $fourFort->north }}</td> 
                                    <td>{{ $fourFort->south }}</td> 
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </fieldset>

                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">६. डिजाइनरको विवरण</h5>
                    </legend>
                    @foreach ($mapApply->designerDetails as $designerDetail )
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <h4><b>१.१ {{ $designerDetail->post?->label() }}</b></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> नाम :
                                {{ $designerDetail->name }} </h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> बुवाको नाम :
                                {{ $designerDetail->father_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> हजुरबुबाको नाम :
                                {{ $designerDetail->grandfather_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> फोन नं. :
                                {{ $designerDetail->phone }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> ठेगाना :
                                {{ $designerDetail->address }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> पालिका :
                                {{ $designerDetail->local_body }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> वडा नं. :
                                {{ $designerDetail->ward_no }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> NEC Council No :
                                {{ $designerDetail->nec_council_no }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"> पालिका दर्ता नं. :
                                {{ $designerDetail->local_body_registration_no }}</h4>

                        </div>
                    </div>
                    @endforeach
                    
                </fieldset>


                <fieldset class="mx-2">
                    <legend>
                        <h5 class="py-2">७. निवेदकको विवरण</h5>
                    </legend>
                    <div class="mb-3">
                        <h4 class="form-label"><b>५.१ निवेदकको प्रकार :</b> {{ $mapApply->applicantDetail->applicant_type?->label() }}</h4>

                    </div>
                    <div class="mb-3">
                        <h4 class="form-label"><b>५.२ घरधनी सँगको सम्बन्ध :</b> {{ $mapApply->applicantDetail->relation_with_owner?->label() }}</h4>

                    </div>
                    <div class="row">
                        <h4 class="form-label fw-bold mb-2">जग्गाधनी वा घरधनी भन्दा फरक भएमा</h4>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.१ नाम :</b> {{ $mapApply->applicantDetail->name }}</h4>
                        </div>

                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.२ फोन नं. :</b> {{ $mapApply->applicantDetail->phone }}</h4>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label" ><b>१.३ बुवाको नाम :</b> {{ $mapApply->applicantDetail->father_name }}</h4>

                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label" ><b>१.४ नागरिकता लिएको
                                जिल्ला :</b> {{ $mapApply->applicantDetail->citizenship_issue_district_id }}</h4>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="form-label"><b>१.५ नागरिकत नम्बर :</b> {{ $mapApply->applicantDetail->citizenship_no }}</h4>

                        </div>
                        <div class="col-md-4 mb-4">
                            <h4 class="form-label"><b>१.६ नागरिकता लिएको मिति :</b> {{ $mapApply->applicantDetail->citizenship_issue_date }}</h4>

                        </div>

                    </div>

                </fieldset>
                <div class="d-flex justify-content-between my-3 px-2">
                    <div class="col-3">
                        <h4 class="form-label fw-bold">निबेदनको मिति : {{ $mapApply->applicantDetail->application_date }}</h4>

                    </div>
                    <div class="col-3">
                        <h4 class="form-label fw-bold">निवेदकको सहि : {{ $mapApply->applicantDetail->applicant_signature }}</h4>
                    </div>
                </div>


            </div>
            {{-- @include('admin.inc.file-view'); --}}
        </div>
    @endsection
