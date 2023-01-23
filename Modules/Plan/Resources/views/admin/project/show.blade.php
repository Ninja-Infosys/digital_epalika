@extends('admin.layouts.master')
@section('content')
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>उपलब्ध गराउने स्रोत/निकाय</td>
                                <td>सामाग्रीको नाम</td>
                                <td>परिमाण</td>
                                <td>एकाइ</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->projectGrantDetails as $projectGrantDetail)
                                <tr>
                                    <td>{{$projectGrantDetail->grant_source}}</td>
                                    <td>{{$projectGrantDetail->asset_name}}</td>
                                    <td>{{$projectGrantDetail->quantity}}</td>
                                    <td>{{$projectGrantDetail->asset_unit}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h5>ङ) आयोजनाबाट लाभान्वित हुने: </h5>
                        <ul>
                            <li>संगठित संस्था: {{$project->projectCostDetail->benefited_organization??''}}</li>
                            <li>अन्य: {{$project->projectCostDetail->others_benefited??''}}</li>
                        </ul>
                        <table class="table table-bordered">
                            <thead class="align-middle">
                            <tr>
                                <td rowspan="2">वडा नं.</td>
                                <td rowspan="2">गाँउ बस्ति</td>
                                <td colspan="3" class="align-middle">घरधुरी संख्या</td>
                                <td colspan="3" class="align-middle">जनसंख्या</td>
                                <td rowspan="2">सम्पादन</td>
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
                            @foreach($project->benefitedMemberDetails as $benefitedMemberDetail)
                                <tr>
                                    <td>{{$benefitedMemberDetail->ward_no}}</td>
                                    <td>{{$projectGrantDetail->village}}</td>
                                    <td>{{$projectGrantDetail->dalit_backward_no}}</td>
                                    <td>{{$projectGrantDetail->other_households_no}}</td>
                                    <td>{{$projectGrantDetail->total_household}}</td>
                                    <td>{{$projectGrantDetail->no_of_male}}</td>
                                    <td>{{$projectGrantDetail->no_of_female}}</td>
                                    <td>{{$projectGrantDetail->total_population}}</td>
                                </tr>
                            @endforeach
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
                        <table class="table table-bordered">
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
                            <h5>क) कार्यालयको स्वीकृत विभागिय लागत अनुमान:-</h5>
                            <h5>ख)
                                <ul>
                                    <li>१.बोलपत्र नं.:</li>
                                    <li>२.बोलपत्रको सुचना प्रकाशित मिति:</li>
                                    <li>३.पत्रिकाको नाम:</li>
                                </ul>
                            </h5>
                            <h5>ग) ठेक्का विवरण
                                <ul>
                                    <li>ठेक्का मुल्यांकनको निर्णय मिति:</li>
                                    <li>आशयको सुचना प्रकाशित मिति:</li>
                                    <li>पत्रिकाको नाम:</li>
                                    <li>ठेक्का स्वीकृतीको निर्णय मिति:</li>
                                    <li>ठेक्का विलो प्रतिशत:</li>
                                </ul>
                            </h5>
                            <h5>घ)
                                <ul>
                                    <li>
                                        १.ठेकेदारको नाम: -
                                    </li>
                                    <li>
                                        २.ठेकेदारको ठेगाना: -
                                    </li>
                                </ul>
                            </h5>
                            <h5>ङ) सम्पर्क नम्बर: -</h5>
                            <h5>च) कबोल अंक: -</h5>
                            <h5>छ) विडवण्ड विवरण :
                                <ul>
                                    <li>१.विडवण्ड नं.:</li>
                                    <li>२.विडवण्ड रकम:</li>
                                    <li>३.बैंकको नाम:</li>
                                    <li>४.जारी मिति:</li>
                                    <li>५.म्याद सकिने मिति:</li>
                                </ul>
                            </h5>
                            <h5>
                                ज) परफरमेन्स वण्ड विवरण
                                <ul>
                                    <li>१.परफरमेन्स वण्ड नं.:</li>

                                    <li>२.परफरमेन्स वण्ड रकम:</li>

                                    <li>३.बैंकको नाम:</li>
                                    <li>४.जारी मिति:</li>
                                    <li>५.म्याद सकिने मिति:</li>

                                    <li>५.म्याद थपको मिति:</li>
                                </ul>
                            </h5>
                            <h5>झ)
                                <ul>
                                    <li>१.ठेक्का सम्झौता मिति:</li>
                                    <li>२.कार्यादेशको मिति:</li>
                                </ul>
                            </h5>
                            <h5>ञ) इन्स्योरेन्स विवरण
                                <ul>
                                    <li>१. जारी मिति: -

                                    </li>
                                    <li>२. सकिने मिति: -

                                    </li>
                                    <li>३. म्याद थप हुने मिति: -</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">४.मोविलाईजेशन पेश्की/रनिङ विल विवरण</h4>
                    </div>
                    <div class="p-2">
                        <h5>क) गठन भएको मिति:-</h5>
                        <h5>ख) पदाधिकारीको नाम र ठेगाना (नागरिकता प्रमाणपत्र नम्बर र जिल्ला)</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
        <div class="row">
            <div class="col-md-12">
                @livewire('plan::bid-submission-livewire',['project'=>$project])
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                किस्ता/पेश्की विवरण
            </div>
        </div>
    @endif

    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
        <div class="row">
            <div class="col-md-12">
                @livewire('plan::project-bill-livewire',['project'=>$project])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">७. आयोजना मर्मत संम्भार सम्बन्धी व्यवस्था</h4>
                    </div>
                    <div class="card-body">
                        @livewire('plan::maintenance-arrangement-livewire',['project'=>$project])
                    </div>
                </div>
            </div>
        </div>

    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">६. सम्झौताको शर्तहरु</h4>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ५. सम्बन्धित कागजातहरू
                    </h4>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ६. आयोजनासँग सम्बन्धित अन्य कागजातहरु
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फाइल नाम</th>
                                <th>#</th>
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
                                    <td>
                                        <form action="{{route('admin.file.destroy',$file)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
    </div>

@endsection
