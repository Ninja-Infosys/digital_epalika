@extends('frontend.layouts.master')
@section('content')
    <div id="frame" class="rounded border mt-5">
        <div class="top-menu pt-3 d-flex justify-content-around">
            <a id="toggle">
                <i class="fa fa-bars"></i>
            </a>
            <p>नागरिक सहायता</p>
            <a href=""><i class="fa fa-x"></i></a>
        </div>
        <div class="welcome px-5 d-flex">
            <div class="welcome-msg mt-5">
                <h5>खजुरा गाउँपालिकाको संक्षिप्त परिचय</h5>
                <p>तत्कालीन सङ्घीय मामिला तथा स्थानीय विकास मन्त्रालयले तयार गरेको नमुना बमोजिम गठित गाउँपालिका,
                    नगरपालिका तथा विशेष, संरक्षित वा स्वायत्त क्षेत्रको संख्या तथा सिमाना निर्धारण आयोगले मिति २०७३ पुस
                    २२ मा पेश गरेको प्रतिवेदन अनुसार तत्कालिन संघीय मामिला तथा स्थानीय विकास मन्त्रीको संयोजकत्वमा गठित
                    समितिले मिति २०७३/११/२० मा पेश गरेको प्रतिवेदनको आधारमा</p>
            </div>
            <div class="welcome-img my-auto">
                <img src="{{asset('assets/frontend/image/icon/support.png')}}" alt="">
            </div>

        </div>
        <div class="menu-item mb-5 ">
            <div class="tabs mx-5 px-5 pt-4">
                <ul class="d-flex justify-content-around" id="myTab" role="tablist">
                    <li class="" role="presentation">
                        <a class=" active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                           role="tab" aria-controls="home" aria-selected="true">नागरिक</a>

                    </li>
                    <li class="" role="presentation">
                        <a class="" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile">घर/जग्गा</a>
                    </li>
                    <li class="" role="presentation">
                        <a class="" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact">व्यवसाय
                        </a>
                    </li>
                    <li class="" role="presentation">
                        <a class="" id="other-tab" data-bs-toggle="tab" data-bs-target="#other">व्यवसाय
                        </a>
                    </li>
                </ul>
                <div class="tab-content " id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row  mt-5">
                            <div class="col-md-3">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/student.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">विधार्थी</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/minor.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">नाबालक</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/Disabled.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">अपाङ्ग</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/recommendation.png')}}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">सिफारिस</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/Patron.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">संरक्षक</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/Certified.png')}}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">प्रमाणित</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/person.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">ब्यक्ति</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/chairman.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">अध्यक्ष</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center mx-auto">
                                    <img src="{{asset('assets/frontend/image/icon/karar.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">करार/ राहत</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center">
                                    <img src="{{asset('assets/frontend/image/icon/registration.png')}}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">दर्ता</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center">
                                    <img src="{{asset('assets/frontend/image/icon/service.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">सेवा</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-auto">
                                <div class="icon text-center">
                                    <img src="{{asset('assets/frontend/image/icon/others.png')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body">
                                        <p class="card-text">अन्य</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        2 test
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        3 test
                    </div>
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        4 test
                    </div>
                </div>

            </div>
        </div>
        <form action="">
            <div class="message">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="संदेश यहा लेखानुहोस |" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-paper-plane"></i></a></span>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/popup.css')}}">
@endpush
