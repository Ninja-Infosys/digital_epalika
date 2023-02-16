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
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> {{$organization_count}}</span></h3>
                                <p class="text-muted font-15 mb-0">दर्ता भएका संगठन</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-map avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$map_apply_count}}</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">जम्मा दर्ता नक्सा</p>
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
    <div id="charts" data-chart-url="{{route('emap.admin.dashboard')}}">
        <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="buildingUsage" chart-type="pie" chart-title="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार प्रयोजन"></div>
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
                                <div id="buildingCategory" chart-type="column" chart-title="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार भवन वर्गीकरण "></div>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="mapApply" chart-type="column" chart-title="आर्थिक बर्ष अनुसारले नक्सा बिवरण"></div>
                                <div class="loading">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border" role="status"></div>
                                    </div>
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
