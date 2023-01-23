@extends('admin.layouts.master')
@section('content')
    <style>
        ul > li {
            list-style: none;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active">योजना/कार्यक्रम विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">योजना/कार्यक्रम विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">१) सम्झौता गर्ने पक्ष र आयोजना</h4>
                    </div>
                    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
                        <div class="p-2">
                            <h4>क) उपभोक्त्ता समितिको विवरण</h4>
                        </div>
                        <div class="p-3">
                            <h5>नाम : {{$project->consumerCommittee->name??''}}</h5>
                            <h5>ठेगाना : {{$project->consumerCommittee->address??''}}</h5>
                            <h5>अध्यक्षको नाम
                                : {{$project->consumerCommittee?->consumerCommitteeOfficials->where('post',\Modules\Plan\Enums\ConsumerCommitteePostEnum::CHAIRMAN)->first()->name??''}}</h5>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h4>ख) आयोजनाको विवरण</h4>
                        </div>
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-print"> Print</i>
                        </button>
                    </div>
                    <div class="p-3">
                        <h5>नाम : {{$project->project_name}}</h5>
                        <h5>योजना उपस्तर : {{$project->planLevel->level_name??''}}</h5>
                        <h5>योजनाको उपक्षेत्र : {{$project->planArea->area_name??''}}</h5>
                        <h5>संचालन हुने वडा नं : {{implode(',',$project->ward_no)}}</h5>
                        <h5>बजेट उप-शीर्षक : {{$project->budgetHead->title??''}}</h5>
                        <h5>बजेटको श्रोत : {{$project->budgetSource->source_name??''}}</h5>
                        <h5>विनियोजित रकम रु. : {{$project->allocated_amount}}</h5>
                        <h5>आयोजना स्थल : {{$project->project_venue}}</h5>
                        <h5>मूल्याङ्कन रकम रु. : {{$project->evaluation_amount}}</h5>
                        <h5>उद्देश्य : {{$project->purpose}}</h5>
                        <h5>आयोजना अवस्था : {{$project->project_status?->label()}}</h5>
                        <h5>आयोजना सुरु हुने मिति : {{$project->project_start_date}}</h5>
                        <h5>आयोजना सम्पन्‍न हुने मिति : {{$project->project_completion_date}}</h5>
                        @if($project->is_deadline_extended)
                            <h5>आयोजनाको म्याद थप मिति : {{$project->extended_date}}</h5>
                        @endif
                        <h5>वित्तीय प्रगति खर्च रकम रु. : {{$project->progress_spent_amount}}</h5>
                        <h5>भौतिक प्रगति लक्ष्य : {{$project->physical_progress_target}}</h5>
                        <h5>भौतिक प्रगति सम्पन्न : {{$project->physical_progress_completed}}</h5>
                        <h5>भौतिक प्रगति एकाइ : {{$project->physical_progress_unit}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">२. आयोजनाको लागत सम्वन्धि विवरण</h4>
                    </div>
                    <div class="p-2">
                        <h5>क) लागत अनुमान रु: {{$project->projectCostDetail->estimated_total_cost??''}}</h5>
                        <h5>ख) लागत अनुमान (भ्याट, ओभर हेड, कन्टिन्जेन्सी
                            बाहेक): {{$project->projectCostDetail->estimated_cost_excluding_vat??''}}</h5>
                        <h5>ग) लागत व्यहोर्ने स्रोतहरु:
                            <ul>
                                <li>सघंबाट: {{$project->projectCostDetail->federal_invest??''}}</li>
                                <li>प्रदेशबाट: {{$project->projectCostDetail->province_invest??''}}</li>
                                <li>स्थानीय तह／कार्यालय
                                    बाट: {{$project->projectCostDetail->local_level_invest??''}}</li>
                                <li>जन श्रमदान／उपभोक्ता समिति
                                    बाट: {{$project->projectCostDetail->consumer_committee_invest??''}}</li>
                                <li>गैरसरकारी सघंसंस्थाबाट: {{$project->projectCostDetail->ngo_invest??''}}</li>
                                <li>विदेशी दात्री
                                    सघंसंस्थाबाट: {{$project->projectCostDetail->foreign_donor_invest??''}}</li>
                                <li>अन्य: {{$project->projectCostDetail->others_invest??''}}</li>
                            </ul>
                        </h5>
                        <h5>घ) बस्तुगत अनुदानको विवरण: </h5>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <td>उपलब्ध गराउने स्रोत/निकाय</td>
                                <td>सामाग्रीको नाम</td>
                                <td>परिमाण</td>
                                <td>एकाइ</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->projectGrantDetails as $projectGrantDetail)
                                <tr>
                                    <td>{{$projectGrantDetail->grant_source?->label()}}</td>
                                    <td>{{$projectGrantDetail->asset_name}}</td>
                                    <td>{{$projectGrantDetail->quantity}}</td>
                                    <td>{{$projectGrantDetail->asset_unit}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <h5>ङ) आयोजनाबाट लाभान्वित हुने: </h5>
                        <ul>
                            <li>संगठित संस्था: {{$project->projectCostDetail->benefited_organization??''}}</li>
                            <li>अन्य: {{$project->projectCostDetail->others_benefited??''}}</li>
                        </ul>
                        <table class="table table-sm table-bordered">
                            <thead class="align-middle">
                            <tr>
                                <td rowspan="2">वडा नं.</td>
                                <td rowspan="2">गाँउ बस्ति</td>
                                <td colspan="3" class="align-middle text-center">घरधुरी संख्या</td>
                                <td colspan="3" class="align-middle text-center">जनसंख्या</td>

                            </tr>
                            <tr>
                                <td>दलित तथा पिछडिएका वर्ग</td>
                                <td>अन्य</td>
                                <td>जम्मा</td>
                                <td>महिला</td>
                                <td>पुरुष</td>
                                <td>जम्मा</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->benefitedMemberDetails as $benefitedMemberDetail)
                                <tr>
                                    <td>{{$benefitedMemberDetail->ward_no}}</td>
                                    <td>{{$benefitedMemberDetail->village}}</td>
                                    <td>{{$benefitedMemberDetail->dalit_backward_no}}</td>
                                    <td>{{$benefitedMemberDetail->other_households_no}}</td>
                                    <td>{{$benefitedMemberDetail->total_household}}</td>
                                    <td>{{$benefitedMemberDetail->no_of_male}}</td>
                                    <td>{{$benefitedMemberDetail->no_of_female}}</td>
                                    <td>{{$benefitedMemberDetail->total_population}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title"> ३. उपभोक्ता समिति/समुदायमा आधारित संस्था/गैरसरकारी संस्थाको
                                विवरण</h4>
                        </div>
                        <div class="p-2">
                            <h5>क) गठन भएको मिति:-</h5>
                            <h5>ख) पदाधिकारीको नाम र ठेगाना (नागरिकता प्रमाणपत्र नम्बर र जिल्ला)</h5>
                        </div>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <td>क्र.सं.</td>
                                <td>पद</td>
                                <td>नामथर</td>
                                <td>बुवा/पतिको नाम</td>
                                <td>बाजेको नाम</td>
                                <td>ना.प्र.नं.</td>
                                <td>ठेगाना</td>
                                <td>सम्पर्क नं.</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->consumerCommittee?->consumerCommitteeOfficials??collect() as $consumerCommitteeOfficial)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$consumerCommitteeOfficial->post?->label()??''}}</td>
                                    <td>{{$consumerCommitteeOfficial->name}}</td>
                                    <td>{{$consumerCommitteeOfficial->father_name}}</td>
                                    <td>{{$consumerCommitteeOfficial->grandfather_name}}</td>
                                    <td>{{$consumerCommitteeOfficial->citizenship_no}}</td>
                                    <td>{{$consumerCommitteeOfficial->address}}</td>
                                    <td>{{$consumerCommitteeOfficial->phone}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h5> ग) गठन गर्दा उपस्थित लाभान्वितको संख्या: -</h5>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title"> ३. बोलपत्र सम्वन्धि विवरण</h4>
                        </div>
                        <div class="p-2">
                            <h5>क) कार्यालयको स्वीकृत विभागिय लागत अनुमान
                                : {{$project->projectBidDetail->cost_estimation??''}}</h5>
                            <h5>ख)
                                <ul>
                                    <li>१.बोलपत्र नं. : </li>
                                    <li>२.बोलपत्रको सुचना प्रकाशित मिति
                                        : {{$project->projectBidDetail->notice_published_date??''}}</li>
                                    <li>३.पत्रिकाको नाम
                                        : {{$project->projectBidDetail->contract_newspaper_name??''}}</li>
                                </ul>
                            </h5>
                            <h5>ग) ठेक्का विवरण
                                <ul>
                                    <li>ठेक्का मुल्यांकनको निर्णय मिति : {{$project->projectBidDetail->contract_evaluation_decision_date??''}}</li>
                                    <li>आशयको सुचना प्रकाशित मिति : {{$project->projectBidDetail->intent_notice_publish_date??''}}</li>
                                    <li>पत्रिकाको नाम : {{$project->projectBidDetail->contract_newspaper_name??''}}</li>
                                    <li>ठेक्का स्वीकृतीको निर्णय मिति : {{$project->projectBidDetail->contract_acceptance_decision_date??''}}</li>
                                    <li>ठेक्का विलो प्रतिशत : {{$project->projectBidDetail->contract_percentage??''}}</li>
                                </ul>
                            </h5>
                            <h5>घ)
                                <ul>
                                    <li>
                                        १.ठेकेदारको नाम : {{$project->projectBidDetail->contractor_name??''}}
                                    </li>
                                    <li>
                                        २.ठेकेदारको ठेगाना : {{$project->projectBidDetail->contractor_address??''}}
                                    </li>
                                </ul>
                            </h5>
                            <h5>ङ) सम्पर्क नम्बर : {{$project->projectBidDetail->contractor_phone??''}}</h5>
                            <h5>च) कबोल अंक : {{$project->projectBidDetail->confession_number??''}}</h5>
                            <h5>छ) विडवण्ड विवरण : {{$project->projectBidDetail->contract_percentage??''}}
                                <ul>
                                    <li>१.विडवण्ड नं. : {{$project->projectBidDetail->bid_bond_no??''}}</li>
                                    <li>२.विडवण्ड रकम : {{$project->projectBidDetail->bid_bond_amount??''}}</li>
                                    <li>३.बैंकको नाम : {{$project->projectBidDetail->bid_bond_bank_name??''}}</li>
                                    <li>४.जारी मिति : {{$project->projectBidDetail->bid_bond_issue_date??''}}</li>
                                    <li>५.म्याद सकिने मिति : {{$project->projectBidDetail->bid_bond_expiry_date??''}}</li>
                                </ul>
                            </h5>
                            <h5>
                                ज) परफरमेन्स वण्ड विवरण
                                <ul>
                                    <li>१.परफरमेन्स वण्ड नं. : {{$project->projectBidDetail->performance_bond_no??''}}</li>

                                    <li>२.परफरमेन्स वण्ड रकम : {{$project->projectBidDetail->performance_bond_amount??''}}</li>

                                    <li>३.बैंकको नाम : {{$project->projectBidDetail->performance_bond_bank??''}}</li>
                                    <li>४.जारी मिति : {{$project->projectBidDetail->performance_bond_issue_date??''}}</li>
                                    <li>५.म्याद सकिने मिति : {{$project->projectBidDetail->performance_bond_expiry_date??''}}</li>

                                    <li>५.म्याद थपको मिति : {{$project->projectBidDetail->performance_bond_extended_date??''}}</li>
                                </ul>
                            </h5>
                            <h5>झ)
                                <ul>
                                    <li>१.ठेक्का सम्झौता मिति : {{$project->projectBidDetail->contract_agreement_date??''}}</li>
                                    <li>२.कार्यादेशको मिति : {{$project->projectBidDetail->contract_assigned_date??''}}</li>
                                </ul>
                            </h5>
                            <h5>ञ) इन्स्योरेन्स विवरण
                                <ul>
                                    <li>१. जारी मिति : {{$project->projectBidDetail->insurance_issue_date??''}}

                                    </li>
                                    <li>२. सकिने मिति : {{$project->projectBidDetail->insurance_expiry_date??''}}

                                    </li>
                                    <li>३. म्याद थप हुने मिति : {{$project->projectBidDetail->insurance_extended_date??''}}</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">४) मोविलाईजेशन पेश्की/रनिङ विल विवरण </h4>
                        </div>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <td>क्र.सं.</td>
                                <td>बिल/पेश्कीको प्रकार</td>
                                <td>बिल/पेश्कीको क्रम</td>
                                <td>मिति</td>
                                <td>रकम</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->projectBidSubmissions as $projectBidSubmission)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$projectBidSubmission->submission_type?->label()??''}}</td>
                                    <td>{{$projectBidSubmission->submission_no}}</td>
                                    <td>{{$projectBidSubmission->date}}</td>
                                    <td>{{$projectBidSubmission->amount}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">४) किस्ता/पेश्की विवरण </h4>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>क्र.सं.</td>
                                <td>प्रकार</td>
                                <td>मिति</td>
                                <td>रकम</td>
                                <td>कैफियत</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->consumerCommitteeTransactions as $consumerCommitteeOfficial)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$consumerCommitteeOfficial->type?->label()??''}}</td>
                                    <td>{{$consumerCommitteeOfficial->date}}</td>
                                    <td>{{$consumerCommitteeOfficial->amount}}</td>
                                    <td>{{$consumerCommitteeOfficial->remarks}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">५). आयोजना मर्मत संम्भार सम्बन्धी व्यवस्था</h4>
                        <div class="p-2">
                            <h5>क) आयोजना मर्मत संम्भारको जिम्मा लिने समिति संस्थाको नाम:</h5>
                            <h5>ख) मर्मत संम्भारको सम्भावित स्रोत (छ छैन खुलाउने):
                                <ul>
                                    <li>जनश्रमदान: {{$project->projectMaintenanceArrangement->office_name??''}}</li>
                                    <li>सेवा शुल्क: {{$project->projectMaintenanceArrangement->service_fee??''}}</li>
                                    <li>दस्तुर,
                                        चन्दाबाट: {{$project->projectMaintenanceArrangement->from_fee_donation??''}}</li>
                                    <li> अन्य केही भए: {{$project->projectMaintenanceArrangement->others??''}}</li>
                                </ul>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">६). सम्झौताको शर्तहरु</h4>
                    <div class="p-2">
                        {!! $project->projectAgreementTerm->data??'' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">
                        ७). सम्बन्धित कागजातहरू
                    </h4>
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>क्र. सं.</th>
                            <th>कागजात नाम</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($project->projectDocuments as $projectDocument)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$projectDocument->document_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-print"> प्रिन्ट गर्नुहोस</i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">
                        ८). योजना संग सम्बन्धित फोटो/फाईलहरू
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फाइल नाम</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->files as $file)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('admin.file.download',$file)}}">
                                            <i class="fa fa-download"></i> {{$file->file_name}}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
