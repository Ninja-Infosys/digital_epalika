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
                    <div class="table-responsive">
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
                                    <td>{{$project->registration_no}}</td>
                                    <td>{{$project->project_name}}</td>
                                    <td>{{$project->project_start_date}}</td>
                                    <td>{{$project->project_completion_date}}</td>
                                    <td>{{$project->allocated_amount}}</td>
                                    <td>{{$project->project_status->label()}}</td>
                                    <td>
                                        <a data-bs-type="edit" href="{{route('admin.plan.project.show',$project)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-eye"> विवरण हेर्नुहोस्</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $projects->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
