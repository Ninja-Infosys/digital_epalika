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
                                    <i class="fas fa-clipboard-list avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> {{$totalApplicationsCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">जम्मा निवेदनहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard-list avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$registeredApplicationsCount}}</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">दर्ता भएका निवेदनहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard-list avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$currentYearApplicationsCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">चालू आर्थिक वर्षका निवेदनहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard-list avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$currentMonthApplicationsCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">चालू महिनाका निवेदनहरु</p>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row" id="charts" data-chart-url="{{route('admin.judicialCommittee.dashboard')}}">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="monthlyApplications" chart-type="column" chart-title="चालु आ.वका मासिक निवेदनहरु"></div>
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
                    <div id="lawsuitNatureWiseApplications" chart-type="pie" chart-title="चालु आ.वका मुद्दा प्रकृति अनुसारका निवेदनहरु"></div>
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
                    <div id="fiscalYearWiseApplications" chart-type="column" chart-title="आर्थिक वर्ष अनुसारका निवेदनहरु"></div>
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
                    <div id="lawsuitNatureWiseApplicationsData" chart-type="column" chart-title="चालु आ.वका मुद्दा प्रकृति (निवेदन स्थिति) अनुसारका निवेदनहरु"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
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
