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
                                    <i class="fas fa-id-card avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> 4</span></h3>
                                <p class="text-muted font-15 mb-0">जम्मा सिफारिस</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-id-card avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">5</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">आ.व. २०७९ को शिफारिस</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-map avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">6</span></h3>
                                <p class="text-muted font-15 mb-0">वार्षिक दर्ता नक्सा</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-map avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">6</span></h3>
                                <p class="text-muted font-15 mb-0">मासिक दर्ता नक्सा</p>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row" id="charts" data-chart-url="{{route('admin.recommendation.dashboard')}}">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="wardWiseRegistration" chart-type="column" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार जम्मा सिफारिस विवरण"></div>
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
                    <div id="monthlyWiseRegistration" chart-type="column" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका महिना अनुसार जम्मा सिफारिस विवरण"></div>
                    <div class="loading">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-pull-12">
            <div class="card">
                <div class="card-body">
                    <div id="categoryWise" chart-type="pie" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका सिफारिस अनुसार जम्मा सिफारिस विवरण"></div>
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
