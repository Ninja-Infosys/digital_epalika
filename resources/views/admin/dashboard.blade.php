@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">डिजिटल ई-पालिका</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $user_count }}
                                </span>
                            </h3>
                            </div>
                            <p class="text my-1">जम्मा प्रयोगकर्ताहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $notice_count }}
                                </span>
                            </h3>
                            </div>
                            <p class="text my-1">जम्मा सम्पन्न तालिम</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">{{ $news_count }}</span></h3>
                            </div>
                            <p class="text my-1">सम्झौता हुनबाँकि कार्यर्कम</p>

                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $registration_count }}</span></h3>
                            </div>
                            <p class="text my-1">दर्ता/प्रमाणित घरनक्सा</p>

                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span class="num" data-plugin="counterup">
                                    {{ $replied_grievance_count + $investigated_grievance_count }}
                                </span></h3>
                            </div>
                            <p class="text my-1">दर्ता भएका गुनासोहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body" style="padding: 10px 20px;">
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

        {{-- <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-8">
                            <p class="text mb-1">जम्मा चलानी पत्रहरु</p>
                            <h3 class="mt-1"><span class="num" data-plugin="counterup">
                                    {{ $dispatch_count }}</span></h3>
                        </div>
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <i class="fa fa-file-alt avatar-title"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-2">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-8">
                            <p class="text mb-1">जम्मा कार्यपालिका बैठकहरु</p>
                            <h3 class="mt-1"><span class="num" data-plugin="counterup">
                                    {{ $municipal_meetings_count }}</span></h3>
                        </div>
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <i class="fa fa-handshake avatar-title"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$municipal_meetings_count}}</span></h3>
                                <p class="text-muted mb-1">जम्मा कार्यपालिका बैठकहरु</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        --}}
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
                            <table class="table table-sm mb-0 table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>क्र.स.</th>
                                    <th>प्रयोगकर्ता नाम</th>
                                    <th>गतिविधिको प्रकार</th>
                                    <th>आईपी </th>
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
                        {{$activityLogs->links()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">
                               आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} को  क्षेत्र अनुसार रिपोर्ट
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

@endsection
