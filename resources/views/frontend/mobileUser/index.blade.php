@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="breadcrumb d-flex pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500" href="{{ url('digital-service') }}">ई-पालिका</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <a class="ml-1 text-primary-500">सेवाग्राहीहरु</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @auth('mobile-user')
                            <div class="col-md-3 p-2">
                                <div class="module-card text-center overflow-hidden p-3">
                                    <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                        <img src="{{ asset('assets/frontend/image/new-icons/job.png') }}" width="50"
                                            height="50">
                                        <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                            <h5 class="fw-semibold mb-1">प्रोफाइल</h5>

                                            <h6 class="text-muted text-justify">सेवाग्राहीले आफ्नो प्रोफाइल परिवर्तन गर्नुहोस्
                                            </h6>

                                            <a href="{{ route('mobileUser.editProfile',$mobileUser) }}"
                                                class="btn btn-outline-primary btn-sm mt-3"><span> परिवर्तन गर्नुहोस्</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-2">
                                <div class="module-card text-center overflow-hidden p-3">
                                    <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                        <img src="{{ asset('assets/frontend/image/new-icons/job.png') }}" width="50"
                                            height="50">
                                        <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                            <h5 class="fw-semibold mb-1">पासवोर्ड</h5>

                                            <h6 class="text-muted text-justify">सेवाग्राहीले आफ्नो पासवोर्ड परिवर्तन गर्नुहोस्
                                            </h6>

                                            <a href="{{ route('mobileUser.editPassword',$mobileUser) }}"
                                                class="btn btn-outline-primary btn-sm mt-3"><span> परिवर्तन गर्नुहोस्</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-2">
                                <div class="module-card text-center overflow-hidden p-3">
                                    <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                        <img src="{{ asset('assets/frontend/image/new-icons/job.png') }}" width="50"
                                            height="50">
                                        <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                            <h5 class="fw-semibold mb-1">लग आउट</h5>

                                            <h6 class="text-muted text-justify">बाहिर निस्किनुहोस
                                            </h6>

                                            <a href="{{ route('mobileUser.logout',$mobileUser) }}"
                                                class="btn btn-outline-primary btn-sm mt-3"><span> परिवर्तन गर्नुहोस्</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3 p-2">
                                <div class="module-card text-center overflow-hidden p-3">
                                    <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                        <img src="{{ asset('assets/frontend/image/new-icons/password.png') }}" width="50"
                                            height="50">
                                        <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                            <h5 class="fw-semibold mb-1">लग इन</h5>

                                            <h6 class="text-muted">सेवाग्राही लग इन</h6>
                                            <a href="{{ route('mobileUser.login.form') }}"
                                                class="btn btn-outline-primary btn-sm mt-3"><span>लग इन
                                                    गर्नुहोस्</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-2 mt-1">
                                <div class="module-card text-center overflow-hidden p-3">
                                    <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                        <img src="{{ asset('assets/frontend/image/new-icons/map-locator.png') }}" width="50"
                                            height="50">
                                        <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                            <h5 class="fw-semibold mb-1"> साइन-इन</h5>
                                            <h6 class="text-muted">सेवाग्राही साइन-इन</h6>

                                            <a href="{{ route('mobileUser.register.form') }}"
                                                class="btn btn-outline-primary btn-sm mt-3"><span>साइन इन गर्नुस</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth



                    </div>
                </div>
            </div>


        </div>
        </div>
    </section>
@endsection
