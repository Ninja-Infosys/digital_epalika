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
                                    <i class="fas fa-building avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> </span></h3>
                                <p class="text-muted font-15 mb-0"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-redo avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup"></span></h3>
                                <p class="text-muted font-15 mb-0"></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"></span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate"></p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup"></span></h3>
                                <p class="text-muted font-15 mb-0"></p>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

    <div class="row mt-2" id="charts" data-chart-url="">

        <div class="col-md-6">
            <div class="card">
                <h4>

                </h4>
                <div class="card-body">
                    <canvas id="businessRegistration" chart-type="pie"></canvas>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h4>

                </h4>
                <div class="card-body">
                    <canvas id="businessNature" chart-type="doughnut"></canvas>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h4>

                </h4>
                <div class="card-body">
                    <canvas id="wardWise" chart-type="bar"></canvas>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h4>

                </h4>
                <div class="card-body">
                    <canvas id="monthWise" chart-type="bar"></canvas>
                </div>

            </div>
        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
        <script type="module" src="{{ asset('assets/backend/js/chartInit.js') }}"></script>
    @endpush
@endsection
