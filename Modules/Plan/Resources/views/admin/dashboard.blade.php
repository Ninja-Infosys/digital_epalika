@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                            {{$not_started_project_count}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">शुरु नभएका योजनाहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$in_progress_project_count}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">चालु योजनाहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                            {{$completed_project_count}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">सम्पन्न योजनाहरू</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$deadline_extended_project_count}}
                                   </span>
                                </h3>
                            </div>
                            <p class="text my-1">म्याद थप योजनाहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2" id="charts" data-chart-url="{{route('admin.plan.dashboard')}}">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका बजेट शिर्षक अनुसारका सम्पूर्ण योजनाहरु</h4>
                </div>
                <div class="card-body">
                    <div id="budgetHeadWiseProjects" chart-type="pie"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">  चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका योजना स्तर अनुसारका योजनाहरु</h4>
                </div>
                <div class="card-body">
                    <div id="planLevelWiseProjects" chart-type="pie"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">   चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका योजनाको क्षेत्रअनुसारका सम्पूर्ण योजनाहरु</h4>
                </div>
                <div class="card-body">
                    <div id="planAreaWiseProjects" chart-type="column"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार योजनाहरुको विवरण</h4>
                </div>
                <div class="card-body">
                    <div id="wardWiseProjects" chart-type="column"></div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('assets/backend/js/chart/chart.js')}}"></script>
        <script src="{{asset('assets/backend/js/chart/chart-export.js')}}"></script>
        <script src="{{asset('assets/backend/js/chart/export-data.js')}}"></script>
        <script src="{{asset('assets/backend/js/chart/accessibility.js')}}"></script>
        <script src="{{asset('assets/backend/js/chart/chart.init.js')}}"></script>
    @endpush
@endsection
