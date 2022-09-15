@extends('admin.layouts.master')
@section('content')
    <div class="row">
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
                            <a href="{{route('admin.circular.registration.index')}}">दर्ता प्रणाली </a>
                        </li>
                        <li class="breadcrumb-item active">दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता प्रणाली</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दर्ता प्रणाली सूची</h4>
                        @can('registration_create')
                            <a href="{{route('admin.circular.registration.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ दर्ता पत्र थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता न.</th>
                                <th>पठाउने कार्यालयको नाम</th>
                                <th>बुझिलिनेको नाम</th>
                                <th>दर्ता मिति</th>
                                <th>थप हेर्नुहोस्</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$registration->registration_no}}</td>
                                    <td>{{$registration->sender_name}}</td>
                                    <td>{{$registration->receiver_name}}</td>
                                    <td>{{$registration->registration_date}}</td>
                                   <td>
                                       <a href="{{route('admin.circular.registration.show',$registration)}}"   class="btn btn-xs btn-outline-primary">
                                           <i class="fa fa-eye"></i> थप हेर्नुहोस्
                                       </a>
                                   </td>
                                    <td>
                                        <a href="{{route('admin.circular.registration.edit',$registration)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form action="{{route('admin.circular.registration.destroy',$registration)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
