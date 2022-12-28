@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान जारि</li>
                    </ol>
                </div>
                <h4 class="page-title">अनुदान कार्यक्रम प्रोफाइल </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-start mt-3">

                        <p class=" text-dark mb-2 font-16"><strong>अनुदान कार्यक्रम/क्रियाकलाप :</strong>
                            <span class="ms-2 text-muted"></span>
                        </p>
                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>अनुदानग्राही :</strong> <span
                                class="ms-2 text-muted"></span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>अनुदानग्राहीको प्रकार :</strong> <span
                                class="ms-2 text-muted"></span></p>

                        <p class=" border-top border-1 text-dark mb-2 font-16"><strong>अनुदानग्राहीको लगानी :</strong> <span
                                class="ms-2 text-muted"></span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>नयाँ वा निरन्तर</strong> <span
                                class="ms-2 text-muted"></span></p>

                        <p class="border-top border-1 text-dark mb-2 font-16"><strong>गत वर्षको लगानी:</strong> <span
                                class="ms-2 text-muted"></span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

