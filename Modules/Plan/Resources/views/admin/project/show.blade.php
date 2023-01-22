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
                        <h4 class="header-title">१) आयोजनाको विवरण</h4>
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-print"> Print</i>
                        </button>
                    </div>
                    <div class="p-2">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">
                            ३. बोलपत्र सम्वन्धि विवरण
                        </h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">३. उपभोक्ता समिति/समुदायमा आधारित संस्था/गैरसरकारी संस्थाको विवरण</h4>
                    </div>
                    <div class="card-body">

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
                @livewire('plan::installment-detail-livewire',['project'=>$project])
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
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ५. सम्बन्धित कागजातहरू
                    </h4>
                    <a href="{{route('admin.plan.project.projectDocument.create',$project)}}"
                       class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle"> नयाँ कागजात थप्नुहोस्</i>
                    </a>
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
                    <a href="{{route('admin.plan.project.uploadFilePage',$project)}}"
                       class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle"> नयाँ थप्नुहोस्</i>
                    </a>
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
