@extends('admin.layouts.master')
@section('content')
    <div class="row">
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
                            <a href="{{ route('admin.organizationRegistration.business.index') }}">व्यवसायहरू</a>
                        </li>
                        <li class="breadcrumb-item active">सबै दर्ता भएका व्यवसायहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">सबै दर्ता भएका व्यवसायहरू </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="margin-left: 350px">
            <div class="card">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <img src="{{ asset('assets/backend/images/users/user-1.jpg') }}"
                            class="mx-auto d-block rounded-circle avatar img-thumbnail" alt=""
                            style="object-fit: cover; height: 6rem; width: 6rem ">
                        <h3 class="mt-3 text-center">{{ $business->name }}</h3>
                        <hr class="border-top border-1">
                        <div class="text-start mt-3">
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>दर्ता नं :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_no }}</span>
                            </p>
                            
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>व्यवसाय सुरु मिति :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>व्यवसाय प्रकृति :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>व्यवसायको घर नं:</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>व्यापार वर्ग :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>ठेगाना :</strong> <span
                                class="ms-2 text-muted">{{$business->address}}
                            </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <h3 class="mt-3 text-center">नबिकरण</h3>
                        <hr class="border-top border-1">
                        <div class="text-start mt-3">
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>आर्थिक वर्ष:</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_no }}</span>
                            </p>
                            
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>नविकरण गरिएको मिति :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>नविकरण कायम रहने मिति:</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>नविकरण दस्तुर रसिद नं:</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                            <p class="border-bottom border-1 text-dark mb-2 font-16"><strong>नविकरण दस्तुर रसिद मिति :</strong>
                                <span class="ms-2 text-muted">{{ $business->registration_date }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <h3 class="mt-3 text-center">कागजातहरु</h3>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">क्र.स</th>
                                <th scope="col">शिर्षक</th>
                                <th scope="col">#</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>१</td>
                                <td>व्यवसाय दर्ता</td>
                                <td> <a href="#"
                                    class="btn btn-xs btn-outline-warning" title="हेर्नुहोस्">
                                     <i class="fa fa-eye"></i> 
                                 </a>
                                 <a href="#"
                                           class="btn btn-xs btn-outline-warning" title="डाउनलोड गर्नुहोस">
                                            <i class="fa fa-download"></i> 
                                        </a>
                                    </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
