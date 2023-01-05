@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">जेष्ठ नागरिक</li>
                    </ol>
                </div>
                <h4 class="page-title">जेष्ठ नागरिक विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <img src="{{ $seniorCitizenDetail->photo }}" class="rounded-circle avatar img-thumbnail"
                             alt="{{ $seniorCitizenDetail->name }}"
                             style="object-fit: cover; height: 7rem; width: 7rem">

                        <p class=" text-dark mb-2 font-16"><strong> पुरा नाम :</strong>
                            <span class="ms-2 text-muted"></span>{{$seniorCitizenDetail->name}}
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>जन्म मिति :</strong> <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->dob_bs}}
                        </p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>कार्ड नं.:</strong>
                            <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->card_no}}</p>

                        <p class=" border-top border-1 text-dark mb-2 font-16"><strong>लिंग :</strong>
                            <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->gender ? 'पुरुष' : 'महिला'}}
                        </p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>नागरिकता नं.</strong> <span
                                class="ms-2 text-muted"></span> {{$seniorCitizenDetail->citizenship_no}}
                        </p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>पति/पत्नीको नाम :</strong> <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->spouse}}
                        </p>

                        <p class=" border-top border-1 text-dark mb-2 font-16"><strong>रक्त समुह :</strong> <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->blood_group}}
                        </p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>बुवाको नाम :</strong> <span
                                class="ms-2 text-muted"></span>{{$seniorCitizenDetail->father_name}}
                        </p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>आमाको नाम :</strong> <span
                                class="ms-2 text-muted">
                            </span>{{$seniorCitizenDetail->mother_name}}
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>ठेगाना :</strong> <span
                                class="ms-2 text-muted">
                            </span>{{$seniorCitizenDetail->province->province ?? ""}}
                            ,{{$seniorCitizenDetail->district->district ?? ""}}
                            , {{$seniorCitizenDetail->localBody->local_body ?? ''}}-{{$seniorCitizenDetail->ward_no}}
                            , {{$seniorCitizenDetail->tole}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xl-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>संरक्षकको नाम :</strong> <span
                                class="ms-2 text-muted">
                                                    </span>{{$seniorCitizenDetail->patrons_name}}
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>संरक्षकको ठेगाना :</strong> <span
                                class="ms-2 text-muted">
                                                    </span>{{$seniorCitizenDetail->patrons_name_address}}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-xl-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-start mt-3">
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>सम्पर्क व्यक्तिको नाम :</strong> <span
                                class="ms-2 text-muted">
                                                    </span>{{$seniorCitizenDetail->contact_person_name}}
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>सम्पर्क व्यक्तिको ठेगाना :</strong> <span
                                class="ms-2 text-muted">
                                                    </span>{{$seniorCitizenDetail->contact_person_address}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
