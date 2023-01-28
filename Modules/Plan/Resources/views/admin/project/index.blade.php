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

                        <li class="breadcrumb-item active">योजनाहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">योजनाहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">योजनाहरु</h4>
                        @can('project_create')
                            <a href="{{route('admin.plan.project.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('inc.filter_form')
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>दर्ता नं.</th>
                            <th>आयोजनाको नाम</th>
                            <th> सुरु हुने मिति</th>
                            <th>सम्पन्‍न हुने मिति</th>
                            <th>विनियोजन रकम</th>
                            <th>आयोजनाको अवस्था</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a class="projectShowBtn" action-url="{{route('admin.plan.project.show',$project)}}" href="javascript:void(0)">
                                        {{$project->registration_no}}
                                    </a>
                                </td>
                                <td>
                                    <a class="projectShowBtn" action-url="{{route('admin.plan.project.show',$project)}}" href="javascript:void(0)">
                                        {{$project->project_name}}
                                    </a>
                                </td>
                                <td>{{$project->project_start_date}}</td>
                                <td>{{$project->project_completion_date}}</td>
                                <td>{{$project->allocated_amount}}</td>
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
                                            @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.projectBidDetail.index',$project)}}">
                                                    <i class="fa fa-list"> बोलपत्र सम्वन्धि विवरण </i>
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.projectBidSubmission.index',$project)}}">
                                                    <i class="fa fa-money-bill"> मोविलाईजेशन पेश्की/रनिङ विल विवरण </i>
                                                </a>
                                            @else
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.consumerCommittee.index',$project)}}">
                                                    <i class="fa fa-list"> उपभोक्ता समिति/समुदायमा आधारित
                                                        संस्था/गैरसरकारी संस्थाको विवरण </i>
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.consumerCommitteeTransaction.index',$project)}}">
                                                    <i class="fa fa-list"> किस्ता/पेश्की विवरण </i>
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{route('admin.plan.project.projectMaintenanceArrangement.index',$project)}}">
                                                    <i class="fa fa-list"> आयोजना मर्मत संम्भार सम्बन्धी व्यवस्था </i>
                                                </a>
                                            @endif
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
    <div id="project-info-modal" class="modal fade" tabindex="-1" aria-labelledby="fullWidthModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content" id="project-data">

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function (){
                $('.projectShowBtn').on('click',function (e){
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
