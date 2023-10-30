@extends('admin.layouts.master')
@section('content')
<div class="row mt-2">
    <div class="card">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar-sm bg-blue-100 d-flex align-items-center justify-content-center rounded-2">
                                    <img class="sidebar-icon" src="{{asset('assets/backend/images/document.png')}}" height="25" loading="lazy">
                                </div>
                                <p class="text-body font-15 mb-0 ms-2">प्रयोगकर्ताहरु</p>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">45</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar-sm bg-blue-100 d-flex align-items-center justify-content-center rounded-2">
                                    <img class="sidebar-icon" src="{{asset('assets/backend/images/document.png')}}" height="25" loading="lazy">
                                </div>
                                <p class="text-body font-15 mb-0 ms-2">समाचार</p>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">45</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar-sm bg-blue-100 d-flex align-items-center justify-content-center rounded-2">
                                    <img class="sidebar-icon" src="{{asset('assets/backend/images/document.png')}}" height="25" loading="lazy">
                                </div>
                                <p class="text-body font-15 mb-0 ms-2">सुचना</p>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">45</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar-sm bg-blue-100 d-flex align-items-center justify-content-center rounded-2">
                                    <img class="sidebar-icon" src="{{asset('assets/backend/images/document.png')}}" height="25" loading="lazy">
                                </div>
                                <p class="text-body font-15 mb-0 ms-2">कर्मचारी/जनप्रतिनिधि</p>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">45</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="card">
        <div style="width: 800px;">
            <canvas id="acquisitions">

            </canvas>
        </div>
    </div>
    <script type="module" src="./acquisitions.js"></script>
</div>
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
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">45</span></h3>
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
    @can('grievanceHandlingDashboard_access')
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="avatar-md bg-info rounded-circle">
                            <i class="fas fa-comment avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="text-end">
                            <h3 class="my-1"><span data-plugin="counterup">432</span></h3>
                            <p class="text-muted mb-1 text-truncate">दर्ता भएका गुनासोहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
    @endcan
    @can('businessRegistrationDashboard_access')
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="avatar-md bg-info rounded-circle">
                            <i class="fas fa-building avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="text-end">
                            <h3 class="my-1"><span data-plugin="counterup">45</span>
                            </h3>
                            <p class="text-muted mb-1 text-truncate">दर्ता भएका व्यवसायहरु </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
    @endcan
    @can('eMapDashboard_access')
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="avatar-md bg-info rounded-circle">
                            <i class="fas fa-map avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="text-end">
                            <h3 class="my-1"><span data-plugin="counterup">41</span></h3>
                            <p class="text-muted mb-1 text-truncate">दर्ता/प्रमाणित घर नक्सा</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
    @endcan
    @can('planDashboard_access')
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="avatar-md bg-info rounded-circle">
                            <i class="fas fa-handshake avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="text-end">
                            <h3 class="my-1"><span data-plugin="counterup">1</span></h3>
                            <p class="text-muted mb-1 text-truncate">सम्झौता हुनबाँकि कार्यक्रम</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
    @endcan
    @can('roasterDashboard_access')
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-2">
                        <div class="avatar-md bg-info rounded-circle">
                            <i class="fas fa-chalkboard-teacher avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="text-end">
                            <h3 class="my-1"><span data-plugin="counterup">45</span></h3>
                            <p class="text-muted mb-1 text-truncate">सम्पन्न तालिम</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div>
    @endcan
</div>
<div class="row">
    @can('revenueDashboard_access')
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
    @endcan
    @can('planDashboard_access')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div id="wardWiseProjects" chart-type="column" chart-title="चालु आर्थिक() वर्षका वडा अनुसार योजनाहरुको विवरण"></div>
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
    @endcan
    @can('eMapDashboard_access')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div id="constructionType" chart-type="pie" chart-title="आर्थिक बर्ष  अनुसार भवन निर्माण कार्यको किसिम"></div>
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
                <div id="structureType" chart-type="pie" chart-title="आर्थिक बर्ष इस्टकचर अनुसार भवनको किसिम"></div>
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
    @endcan
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
                        </tbody>
                    </table>

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