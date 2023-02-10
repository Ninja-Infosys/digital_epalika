@extends('admin.layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-primary rounded-circle">
                                <i class="fas fa-user avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup"> {{ $taxPayerCount}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">करदाता</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-blue rounded-circle">
                                <i class="fas fa-clipboard-list avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1"><span data-plugin="counterup">{{$invoiceCount}}</span></h3>
                                <p class="text-muted mb-1"> आ.व. {{officeSetting()->fiscalYear->title ?? ''}}मा काटिएको नगदी रसिद</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-success rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1">रु. <span data-plugin="counterup">86765453435</span></h3>
                                <p class="text-muted mb-1 text-truncate">चालु आर्थिक वर्षको संकलन राजस्व</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="fas fa-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="text-end">
                                <h3 class="my-1">रु. <span data-plugin="counterup">86765453435</span></h3>
                                <p class="text-muted mb-1 text-truncate">कुल राजस्व</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
@endsection
