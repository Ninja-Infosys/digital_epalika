@extends('admin.layouts.master')
@push('style')
    <link href="{{asset('assets/backend/libs/hopscotch/css/hopscotch.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $user_count }}
                                </span>
                                </h3>
                            </div>
                            <p class="text my-1">प्रयोगकर्ताहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $training_count }}
                                </span>
                                </h3>
                            </div>
                            <p class="text my-1">सम्पन्न तालिम</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num"
                                                                   data-plugin="counterup">{{ $project_count }}</span>
                                </h3>
                            </div>
                            <p class="text my-1">सम्झौता हुनबाँकि कार्यर्कमहरु</p>

                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $map_count }}</span></h3>
                            </div>
                            <p class="text my-1">दर्ता/प्रमाणित घरनक्सा</p>

                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $grievance_count }}
                                </span></h3>
                            </div>
                            <p class="text my-1">दर्ता भएका गुनासोहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $businessDetail_count }}
                                </span></h3>
                            </div>
                            <p class="text my-1">दर्ता भएका व्यवसायहरु </p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="row mt-2">
            <div class="col-md-6">
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">
                                आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} को क्षेत्र अनुसार रिपोर्ट
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-charts.pie-chart-component
                            id="bar-chart17"
                            chartName=""
                            :labels="$planAreas['labels']"
                            :dataSets="$planAreas['dataSets']"

                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\App::environment('production'))
    <div class="modal fade" id="info-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="info-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-danger text-center">Alert !!!</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>
                        यो डिजिटल ई-पालिकाको डेमो भर्जन हो। यो डेमो भर्जनमा सबै फिचर उपलब्ध गराइएको छैन, पालिकामा उक्त प्रणाली सुचारु भइसकेपछि थप अन्य फिचर देख्न पाउनुहुनेछ। धन्यबाद।
                    </h4>
                </div>
            </div>
        </div>
    </div>
    @endif
    @push('scripts')
        <script src="{{asset('assets/backend/libs/hopscotch/js/hopscotch.min.js')}}"></script>
        @if(app()->environment('production'))
            <script src="{{asset('assets/backend/js/pages/dashboard.init.js')}}"></script>
            <script>
                $(document).ready(function (){
                    $('#info-modal').modal('show');
                })
            </script>

        @endif

    @endpush
@endsection
