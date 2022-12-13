@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            न्यायिक समिति
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            2
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1">जम्मा उजुरी</p>
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
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            3
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">जम्मा दर्ता उजुरी</p>
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
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            4
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">नहेरीयको</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary"  style="background-color: #0047AB">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            3
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">छिनोफानो भैसकेको</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
@endsection
