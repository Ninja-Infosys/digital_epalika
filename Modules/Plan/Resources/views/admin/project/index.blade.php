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
                                        <option value="1" {{request('is_contracted')==1 ? 'selected' : ''}}>
                                            भएको
                                        </option>
                                        <option value="0" {{request('is_contracted')=="0" ? 'selected' : ''}}>
                                            नभएको
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
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">योजना/कार्यक्रमहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            <button class="btn btn-sm mx-1 btn-outline-info waves-effect waves-light collapsed"
                                    type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <i class="fa fa-filter"> फिल्टर</i>
                            </button>
                            @can('project_create')
                                <a href="{{route('admin.plan.project.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="demo-foo-accordion" class="table table-bordered mb-0 toggle-arrow-tiny">
                        <thead>
                        <tr>
                            <th data-toggle="true">क्र.स</th>
                            <th>दर्ता नं.</th>
                            <th>आयोजना/कार्यक्रमको नाम</th>
                            <th data-hide="phone">योजना उपक्षेत्र</th>
                            <th data-hide="phone">सुरु हुने मिति</th>
                            <th data-hide="phone">वडा नं.</th>
                            <th data-hide="phone">स्वीकृत रकम</th>
                            <th data-hide="phone">आयोजनाको अवस्था</th>
                            <th data-hide="all">लागत</th>
                            <th data-hide="all">सम्झौता</th>
                            <th data-hide="all">अन्य</th>
                            <th data-hide="all">कार्य</th>
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
                                <td>
                                    @if($project->project_start_date)
                                    {{$project->project_start_date}}
                                    @else
                                        <p class="text-danger">सुरु भएको छैन</p>
                                    @endif
                                </td>
                                <td>{{implode(',',$project->ward_no)}}</td>
                                <td>रू. {{$project->project_allocated_amounts_sum_amount}}</td>
                                <td>{{$project->project_status->label()}}</td>
                                <td>
                                    <a class="btn btn-xs btn-outline-secondary" href="{{route('admin.plan.project.projectCostDetail.index',$project)}}">
                                        <i class="fa fa-list"> आयोजनाको लागत</i>
                                    </a>
                                    @can('technicalCostEstimate_access')
                                        <a class="btn btn-xs btn-outline-secondary"
                                           href="{{route('admin.plan.project.technicalCostEstimate.index',$project)}}">
                                            <i class="fa fa-user-cog"> प्राविधिक लागत</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
                                        <a class="btn btn-xs btn-outline-primary"
                                           href="{{route('admin.plan.project.consumerCommittee.index',$project)}}">
                                            <i class="fa fa-handshake"> योजना सम्झौता</i>
                                        </a>
                                        @if($project->is_contracted)
                                            <a class="btn btn-xs btn-outline-primary"
                                               href="{{route('admin.plan.project.consumerCommitteeTransaction.index',$project)}}">
                                                <i class="fa fa-money-bill"> आर्थिक कारोबार</i>
                                            </a>
                                            <a class="btn btn-xs btn-outline-primary"
                                               href="{{route('admin.plan.project.projectMaintenanceArrangement.index',$project)}}">
                                                <i class="fa fa-cog"> मर्मत संम्भार सम्बन्धी</i>
                                            </a>
                                        @endif
                                    @else
                                        <a class="btn btn-xs btn-outline-primary"
                                           href="{{route('admin.plan.project.projectBidDetail.index',$project)}}">
                                            <i class="fa fa-handshake"> योजना सम्झौता </i>
                                        </a>
                                        @if($project->is_contracted)
                                            <a class="btn btn-xs btn-outline-primary"
                                               href="{{route('admin.plan.project.projectBidSubmission.index',$project)}}">
                                                <i class="fa fa-money-bill"> आर्थिक कारोबार </i>
                                            </a>
                                        @endif
                                    @endif</td>
                                <td>
                                    @if($project->is_contracted)
                                        <a class="btn btn-xs btn-outline-success"
                                           href="{{route('admin.plan.project.projectAgreementTerm.create',$project)}}">
                                            <i class="fa fa-clipboard-check"> शर्तहरु </i>
                                        </a>
                                        @can('projectDocument_access')
                                            <a class="btn btn-xs btn-outline-success"
                                               href="{{route('admin.plan.project.projectDocument.index',$project)}}">
                                                <i class="fa fa-file-contract"> सम्बन्धित कागजातहरू </i>
                                            </a>
                                        @endcan
                                        <a class="btn btn-xs btn-outline-success"
                                           href="{{route('admin.plan.project.fileList',$project)}}">
                                            <i class="fa fa-file"> सम्बन्धित फोटो/फाईलहरू </i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-success"
                                           href="{{route('admin.plan.project.projectDeadlineExtension.index',$project)}}">
                                            <i class="fa fa-calendar-alt"> म्याद थप </i>
                                        </a>
                                    @else
                                        <p class="text-center">सम्झौता भएको छैन ।</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.plan.project.show',$project)}}" class="btn btn-xs btn-outline-info">
                                        <i class="fa fa-eye"></i> विवरण हेर्नुहोस्</a>
                                    <a href="{{route('admin.plan.project.edit',$project)}}" class="btn btn-xs btn-outline-warning">
                                        <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्</a>
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
        <script src="{{asset('assets/backend/js/plugins/footable.min.js')}}"></script>
    @endpush
@endsection
