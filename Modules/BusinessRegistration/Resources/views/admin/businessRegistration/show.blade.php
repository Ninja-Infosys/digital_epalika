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
                        <li class="breadcrumb-item active">व्यवसायीको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसायीको विवरण </h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{$proprietorDetail->name}}" class="rounded-circle avatar-lg img-thumbnail"
                             alt="profile-image">

                        <h4 class="mb-0">{{$proprietorDetail->name}}</h4>
                        <div class="text-start mt-3">
                            <p class="mb-2 font-13"><strong>व्यवसायीको नाम :</strong> <span class="ms-2">Geneva D. McKnight</span></p>
                            <p class="mb-2 font-13"><strong>फोन नं. :</strong><span class="ms-2">(123) 123 1234</span></p>
                            <p class="mb-2 font-13"><strong>इमेल :</strong> <span class="ms-2">user@email.domain</span></p>
                            <p class="mb-1 font-13"><strong>नागरिकता नम्बर :</strong> <span class="ms-2">USA</span></p>
                        </div>
                    </div>
                </div> <!-- end card -->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill navtab-bg">
                            <li class="nav-item">
                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    दर्ता/नबिकरण निबेदन फाराम
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    व्यवसाय कर दर्ता किताव
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    व्यवसाय दर्ता प्रमाण-पत्र
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="aboutme">
                                test
                            </div>

                            <div class="tab-pane show active" id="timeline">
                                test
                            </div>
                            <div class="tab-pane" id="settings">
                                test
                            </div>
                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
@endsection
