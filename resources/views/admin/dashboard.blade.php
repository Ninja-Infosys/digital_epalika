@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-users avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{ $user_count }}</span></h3>
                                <p class="text-muted font-15 mb-0">प्रयोगकर्ताहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-server avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">2</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">सक्रिय मोड्युलहरू</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard-check avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">6</span></h3>
                                <p class="text-muted font-15 mb-0">जम्मा आर्थिक वर्ष</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-code-branch avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">6</span></h3>
                                <p class="text-muted font-15 mb-0">शाखा/उपशाखाहरु</p>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{ $grievance_count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">दर्ता भएका गुनासोहरु</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{ $businessDetail_count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">दर्ता भएका व्यवसायहरु </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{ $map_count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">दर्ता/प्रमाणित घर नक्सा</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{ $project_count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">सम्झौता हुनबाँकि कार्यक्रम</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{ $training_count }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">सम्पन्न तालिम</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div id="totalRevenue" chart-type="pie" chart-title="कुल राजस्व"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div id="revenueAccordingToMonth" chart-type="column" chart-title="चालु आर्थिक वर्षको महिना अनुसार कुल राजस्व"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div id="wardWiseProjects" chart-type="column" chart-title="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार योजनाहरुको विवरण"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div id="budgetHeadWiseProjects" chart-type="pie" chart-title="चालु आ.व बजेट शिर्षक अनुसारका योजनाहरु"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="constructionType" chart-type="pie" chart-title="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार भवन निर्माण कार्यको किसिम"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="structureType" chart-type="pie" chart-title="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} इस्टकचर अनुसार भवनको किसिम"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="mapAccordingToMonth" chart-type="column" chart-title="चालु आर्थिक बर्षको महिना अनुसारले नक्सा बिवरण"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">
                            प्रयोगकर्ता गतिविधिहरू
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>प्रयोगकर्ता नाम</th>
                                <th>गतिविधिको प्रकार</th>
                                <th>आईपी</th>
                                <th>मोडेल प्रकार</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($activityLogs as $activity_log)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$activity_log->user->name??''}}</td>
                                    <td>{{$activity_log->activity_type}}</td>
                                    <td>{{$activity_log->ip}}</td>
                                    <td>{{class_basename($activity_log->model_type)}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    {{$activityLogs->onEachSide(config('app.pagination_count'))->links()}}
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
