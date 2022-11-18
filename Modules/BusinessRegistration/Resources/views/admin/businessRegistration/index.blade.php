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
                            <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">व्यवसाय
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसाय दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसाय दर्ता </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mb-0 table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th rowspan="2">क्र.स</th>
                                <th rowspan="2">सबमिशन नं</th>
                                <th rowspan="2">दर्ता नं</th>
                                <th rowspan="2">दर्ता मिति</th>
                                <th colspan="4">व्यवसायी</th>
                                <th colspan="4">व्यवसाय</th>
                                <th rowspan="2">#</th>
                            </tr>
                            <tr>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>फोन</th>
                                <th>इमेल</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>प्रकृति</th>
                                <th>पूँजी लगानी रु.:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($proprietors as $proprietor)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$proprietor->businessDetail->submission_no ?? ''}}</td>
                                    <td>{{$proprietor->businessDetail->registration_no ?? ''}}</td>
                                    <td>{{$proprietor->businessDetail->registration_date_ne ?? ''}}</td>
                                    <td>{{$proprietor->name}}</td>
                                    <td>
                                        <span>{{$proprietor->localBody->local_body??''}}
                                - {{$proprietor->ward_no??''}} </span>
                                    </td>
                                    <td>{{$proprietor->phone ?? ''}}</td>
                                    <td>{{$proprietor->email ??  ''}}</td>
                                    <td>{{$proprietor->businessDetail->business_detail_name ?? ''}}</td>
                                    <td>
                                        <span>{{$proprietor->businessDetail->localBody->local_body??''}}
                                - {{$proprietor->businessDetail->ward_no??''}} </span>
                                    </td>
                                    <td>{{$proprietor->businessDetail->business_nature->label() ?? ''}}</td>
                                    <td>{{$proprietor->businessDetail->amount_cost ?? ''}}</td>
                                    <td>
                                        <a href="{{route('admin.businessRegistration.businessRegistration.show',$proprietor)}}"
                                           class="btn btn-xs btn-outline-info">
                                            <i class="fa fa-eye"></i> पुरा विवरण हेर्नुहोस
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="12">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

