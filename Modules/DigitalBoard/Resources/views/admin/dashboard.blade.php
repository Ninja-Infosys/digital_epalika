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
                                    <i class="fas fa-video avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$video_count ?? 0}}</span></h3>
                                <p class="text-muted font-15 mb-0">भिडियोहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-newspaper avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$news_count ?? 0}}</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">समाचारहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-info-circle avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$notice_count ?? 0}}</span></h3>
                                <p class="text-muted font-15 mb-0">सूचनाहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-users avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$employee_count ?? 0}}</span></h3>
                                <p class="text-muted font-15 mb-0">कर्मचारी/जनप्रतिनिधि</p>
                            </div>
                        </div>


                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row mt-2" id="charts" data-chart-url="{{route('admin.digitalBoard.dashboard')}}">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="allNoticeAccordingMonth" chart-type="column" chart-title="महिना अनुसार सूचना समाचार"></div>
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
                    <div id="allNoticeAccordingFY" chart-type="column" chart-title="चालु आ.वका सूचना समाचार"></div>
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
