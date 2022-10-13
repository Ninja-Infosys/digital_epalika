@extends('admin.layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
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
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                <i class="fa fa-users font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$user_count}}
                                    </span>
                                </h3>
                                <p class="text-muted mb-1">जम्मा प्रयोगकर्ताहरु</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-secondary border-secondary border">
                                <i class="fa fa-clipboard-list font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                         {{$notice_count}}
                                    </span>
                                </h3>
                                <p class="text-muted mb-1">जम्मा सूचना</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-blue border-blue border">
                                <i class="fa fa-newspaper font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">{{$news_count}}</span></h3>
                                <p class="text-muted mb-1">जम्मा समाचार</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-pink border-pink border">
                                <i class="fa fa-comment font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$replied_grievance_count + $investigated_grievance_count}}
                                    </span></h3>
                                <p class="text-muted mb-1">जम्मा चलिरहेको गुनासोहरु</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-primary border-primary border">
                                <i class="fa fa-building font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        1
                                    </span></h3>
                                <p class="text-muted mb-1">जम्मा दर्ता भएका व्यवसायहरु </p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-info border-info border">
                                <i class="fa fa-file-alt font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$dispatch_count}}</span></h3>
                                <p class="text-muted mb-1">जम्मा चलानी पत्रहरु</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-success border-success border">
                                <i class="fa fa-file-alt font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$registration_count}}</span></h3>
                                <p class="text-muted mb-1">जम्मा दर्ता पत्रहरु</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                <i class="fa fa-handshake font-22 avatar-title text-white"></i>
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
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-header bg-success">
                   <h5 class="fw-bold text-white">प्रकार अनुसार गुनासोको विवरण</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>क्र.सं</th>
                                <th>प्रकार</th>
                                <th>संख्या</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grievanceTypes as $grievanceType)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$grievanceType->title}}</td>
                                    <td>{{$grievanceType->grievance_details_count}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-8">
            <div class="widget-rounded-circle card">
                <div class="card-header">
                   गुनासोको विवरण
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>टोकन</th>
                                <th>गुनासोको प्रकार</th>
                                <th> गुनासोको शिर्षक</th>
                                <th> गुनासो प्रकाशन मिति</th>
                                <th> गुनासो गम्भीरता</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($unseen_grievances as $grievanceDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$grievanceDetail->token}}</td>
                                    <td>{{$grievanceDetail->grievanceType->title??''}}</td>
                                    <td>{{$grievanceDetail->subject}}</td>
                                    <td>{{$grievanceDetail->created_at->toDateString()}}</td>
                                    <td>
                                        @switch($grievanceDetail->complaint_severity)
                                            @case('High priority')
                                                उच्च प्राथमिकता
                                                @break
                                            @case('Priority')
                                                प्राथमिकता
                                                @break
                                            @default
                                                साधारण
                                        @endswitch
                                    </td>

                                    <td>
                                        <a href="{{route('admin.grievanceHandling.grievanceDetail.show',$grievanceDetail)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
@endsection
