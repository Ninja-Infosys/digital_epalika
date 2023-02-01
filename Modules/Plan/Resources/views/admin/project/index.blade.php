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

                        <li class="breadcrumb-item active">योजना/कार्यक्रमहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">योजना/कार्यक्रमहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="collapse mb-2" id="collapseFilterForm">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="from_date" labelNe="मिति देखि"
                                        :get-today-date="false"
                                        :edit-date-ne="request('from_date')"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <x-date-input-component
                                        nameNe="to_date" labelNe="मिति सम्म"
                                        :get-today-date="false"
                                        :edit-date-ne="request('to_date')"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="project_status">योजनाको अवस्था</label>
                                    <select name="project_status"
                                            id="project_status" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach(\Modules\Plan\Enums\ProjectStatusEnum::cases() as $projectStatus)
                                            <option
                                                {{$projectStatus->value==request('project_status') ? 'selected' : ''}}
                                                value="{{$projectStatus->value}}">{{$projectStatus->label()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="grant_category_id">अनुदान किसिम</label>
                                    <select name="grant_category_id"
                                            id="grant_category_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($grantCategories as $grantCategory)
                                            <option
                                                {{$grantCategory->id==request('grant_category_id') ? 'selected' : ''}}
                                                value="{{$grantCategory->id}}">{{$grantCategory->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="budget_source_id">बजेट श्रोत</label>
                                    <select name="budget_source_id"
                                            id="budget_source_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($budgetSources as $budgetSource)
                                            <option
                                                {{$budgetSource->id==request('budget_source_id') ? 'selected' : ''}}
                                                value="{{$budgetSource->id}}">{{$budgetSource->source_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="expense_head_id">खर्च शिर्षक</label>
                                    <select name="expense_head_id"
                                            id="expense_head_id" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($expenseHeads as $expenseHead)
                                            <option
                                                {{$expenseHead->id==request('expense_head_id') ? 'selected' : ''}}
                                                value="{{$expenseHead->id}}">{{$expenseHead->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="is_contracted">सम्झौता भएको/नभएको</label>
                                    <select name="is_contracted"
                                            id="is_contracted" class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        <option value="1" {{request('is_contracted')==1 ? 'selected' : ''}}>भएको
                                        </option>
                                        <option value="0" {{request('is_contracted')==0 ? 'selected' : ''}}>नभएको
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-search"> पेश गर्नुहोस्</i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">योजना/कार्यक्रमहरु</h4>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-secondary mx-1 waves-effect waves-light collapsed"
                                    type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <i class="fa fa-filter"> फिल्टर गर्नुहोस</i>
                            </button>
                            @can('project_create')
                                <a href="{{route('admin.plan.project.create')}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('inc.filter_form')
                    <table class="table table-bordered table-sm table-striped mt-2 table-hover">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>दर्ता नं.</th>
                            <th class="text-nowrap">आयोजना/कार्यक्रमको नाम</th>
                            <th class="text-nowrap">योजना उपक्षेत्र</th>
                            <th class="text-nowrap">सुरु हुने मिति</th>
                            <th class="text-nowrap">वडा नं.</th>
                            <th class="text-nowrap">स्वीकृत रकम</th>
                            <th class="text-nowrap">आयोजनाको अवस्था</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a class="projectShowBtn" action-url="{{route('admin.plan.project.show',$project)}}"
                                       href="javascript:void(0)">
                                        {{$project->registration_no}}
                                    </a>
                                </td>
                                <td>
                                    <a class="projectShowBtn" action-url="{{route('admin.plan.project.show',$project)}}"
                                       href="javascript:void(0)">
                                        {{$project->project_name}}
                                    </a>
                                </td>
                                <td>{{$project->planArea->area_name??''}}</td>
                                <td>{{$project->project_start_date}}</td>
                                <td>{{implode(',',$project->ward_no)}}</td>
                                <td>रू. {{$project->allocated_amount}}</td>
                                <td>{{$project->project_status->label()}}</td>
                                <td>
                                    <div class="btn-group dropdown mb-2">
                                        <a href="{{route('admin.plan.project.show',$project)}}"
                                           class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"> विवरण </i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item"
                                               href="{{route('admin.plan.project.edit',$project)}}">
                                                <i class="fa fa-edit"> सम्पादन गर्नुहोस्</i>
                                            </a>
                                            <a class="dropdown-item"
                                               href="{{route('admin.plan.project.projectCostDetail.index',$project)}}">
                                                <i class="fa fa-list"> आयोजनाको लागत सम्वन्धि विवरण</i>
                                            </a>
                                            @can('technicalCostEstimate_access')
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.technicalCostEstimate.index',$project)}}">
                                                    <i class="fa fa-check"> प्राविधिक लागत अनुमान</i>
                                                </a>
                                            @endcan
                                            @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.consumerCommittee.index',$project)}}">
                                                    <i class="fa fa-list"> योजना सम्झौता</i>
                                                </a>
                                                @if($project->is_contracted)
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.plan.project.consumerCommitteeTransaction.index',$project)}}">
                                                        <i class="fa fa-money-bill"> आर्थिक कारोबारको विवरण </i>
                                                    </a>
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.plan.project.projectMaintenanceArrangement.index',$project)}}">
                                                        <i class="fa fa-list"> आयोजना मर्मत संम्भार सम्बन्धी
                                                            व्यवस्था </i>
                                                    </a>
                                                @endif
                                            @else
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.projectBidDetail.index',$project)}}">
                                                    <i class="fa fa-list"> योजना सम्झौता </i>
                                                </a>
                                                @if($project->is_contracted)
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.plan.project.projectBidSubmission.index',$project)}}">
                                                        <i class="fa fa-money-bill"> आर्थिक कारोबारको विवरण </i>
                                                    </a>
                                                @endif
                                            @endif
                                            @if($project->is_contracted)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.projectAgreementTerm.create',$project)}}">
                                                    <i class="fa fa-file-alt"> सम्झौताको शर्तहरु </i>
                                                </a>
                                                @can('projectDocument_access')
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.plan.project.projectDocument.index',$project)}}">
                                                        <i class="fa fa-file-alt"> सम्बन्धित कागजातहरू </i>
                                                    </a>
                                                @endcan
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.fileList',$project)}}">
                                                    <i class="fa fa-file"> योजना संग सम्बन्धित फोटो/फाईलहरू </i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $projects->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="project-info-modal" class="modal fade" tabindex="-1" aria-labelledby="fullWidthModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content" id="project-data">

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.projectShowBtn').on('click', function (e) {
                    e.preventDefault()
                    $.ajax({
                        method: "GET",
                        url: $(this).attr("action-url"),
                        success: function (resp) {
                            $('#project-info-modal').modal('toggle')
                            $('#project-data').html(resp.view)
                        }, error: function () {
                            alert("Something Went Wrong");
                        }
                    });
                })
            })
        </script>
    @endpush
@endsection
