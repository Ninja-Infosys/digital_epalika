@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grant.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कृषक</li>
                    </ol>
                </div>
                <h4 class="page-title">कृषक प्रोफाइल </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ $farmer->photo_url }}" class="rounded-circle avatar img-thumbnail"
                        alt="{{ $farmer->name }}" style="object-fit: cover; height: 6rem; width: 6rem">

                    <h3 class="mt-3">{{ $farmer->name }}</h3>
                    <h5 class="mb-0 text-dark">{{ $farmer->unique_id }}</h5>
                    <hr class="border-top border-1">
                    <div class="text-start mt-3">

                        <p class=" text-dark mb-2 font-16"><strong>कृषक परिचय पत्र नं :</strong>
                            <span class="ms-2 text-muted">{{ $farmer->farmer_id_card_no }}</span>
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>सम्पर्क नम्बर :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->phone_no }}</span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>नागरिकता नं. :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->citizenship_no }}</span></p>

                        <p class=" border-top border-1 text-dark mb-2 font-16"><strong>लिङ्ग :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->gender->label() }}</span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>वैवाहिक स्थिति :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->marital_status->label() }}</span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>दम्पतिको नाम :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->spouse_name }}</span></p>

                        <p class=" border-top border-1 text-dark mb-2 font-16"><strong>बुबाको नाम :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->father_name }}</span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>बुबा/ससुराको नाम :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->grandfather_name }}</span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>ठेगाना :</strong> <span
                                class="ms-2 text-muted">{{ $farmer->province->province ?? '' }},
                                {{ $farmer->district->district ?? '' }},
                                {{ $farmer->localBody->local_body ?? '' }} -
                                {{ $farmer->ward_no ?? '' }},
                                {{ $farmer->village ?? '' }}
                                {{ $farmer->tole ?? '' }}
                            </span></p>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-8 ">
            <div class="row">
                <div class="col-md-4 text-center px-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class=" text-dark font-19">आवद्ध सहकारी</h4>
                            <p class=" pt-1 font-16">कृषकको आवद्ध सहकारी।</p>
                        </div>
                        <div class="card-btn pb-2">
                            <a href="" class="btn btn-sm btn-outline-primary "> विवरण हेर्नुहोस <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center px-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class=" text-dark font-19">आवद्ध उधम</h4>
                            <p class=" pt-1 font-16">कृषकको आवद्ध उधम।</p>
                        </div>
                        <div class="card-btn pb-2">
                            <a href="" class="btn btn-sm btn-outline-primary "> विवरण हेर्नुहोस <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center px-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class=" text-dark font-19">आवद्ध समुह</h4>
                            <p class=" pt-1 font-16">कृषकको आवद्ध समुह।</p>
                        </div>
                        <div class="card-btn pb-2">
                            <a href="" class="btn btn-sm btn-outline-primary "> विवरण हेर्नुहोस <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-border">
                <thead>
                  <tr>
                    <th scope="col">क्र.स</th>
                    <th scope="col">कार्यक्रम/क्रियाकलाप</th>
                    <th scope="col">नयाँ/निरन्तर</th>
                    <th scope="col">गत वर्षको लगानी</th>
                    <th scope="col">अनुदान स्थल</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>{{$grantDetail->grant->grantProgram->name??''}}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>घफ्श</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
@endsection
