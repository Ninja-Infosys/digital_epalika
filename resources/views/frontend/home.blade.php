@extends('frontend.layouts.master')
@section('content')
    <section class="home-section mt-3">
        <div class="row">
            <div class="col-md-7">
                <div id="carouselExampleIndicators" class="card-01 carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                 src="https://myrepublica.nagariknetwork.com/uploads/media/2019/August/Bageshwori%20temple.jpg"
                                 alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>वगेस्वोरी मन्दिर</h5>
                                <p>The whole caption will only show up if the screen is at least medium size.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/frontend/image/submetro.jpg')}}"
                                 alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>नेपालगन्ज उप-महानगरपालिका</h5>
                                <p>The whole caption will only show up if the screen is at least medium size.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/frontend/image/border.jpg')}}"
                                 alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>बिरेन्द्र चोक</h5>
                                <p>The whole caption will only show up if the screen is at least medium size.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/frontend/image/ranitalau.jpg')}}"
                                 alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>महादेव मुर्ति </h5>
                                <p>The whole caption will only show up if the screen is at least medium size.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-5 intro-col mt-1">
                <div class="card-01 introduction  bg-card shadow rounded">
                    <h4 class="heading mt-2 mb-3 px-3">नेपालगंज उप-महानगरपालिकाको संक्षिप्त परिचय</h4>
                    <h6 class="fw-normal lh-lg">
                        {!! Str::words(strip_tags($officeSetting->introduction),100) !!}
                        </h6>
                    <div class="d-flex justify-content-end">
                        <button class="btn  bg-info text-white">थप पढ्नुहोस्</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="avatar-section mt-5">
        <div class="container bg-card card  rounded">
            <div class="row ">
                @foreach($employees as $employee)
                    <div class="card-02 col-md-4 mb-2 px-3">
                        <div class="card shadow text-center">
                            <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="{{$employee->photo_url}}" alt="{{$employee->name}}">
                            <div class="card-body p-0 m-0">
                                <div class="card-description ">
                                    <h5 class="card-title mt-5">{{$employee->name}}</h5>
                                    <h6 class="card-title ">{{$employee->designation}}</h6>
                                    <p>{{$employee->email}}</p>
                                    <p>{{$employee->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="news-section  mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">सुचनाहरु</p>
                    </div>
                    <ul class="list-group">
                        @foreach($notices as $notice)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="">{{Str::words($notice->title,12)}}</a>
                                <span><small>{{$notice->date->toDateString()}}</small></span>

                            </li>
                        @endforeach

                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">कार्यपालिका बोर्ड निर्णय </p>
                    </div>
                    <ul class="list-group">
                        @foreach($newses as $news)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="">{{Str::words($news->title,12)}}</a>
                                <span><small>{{$news->date->toDateString()}}</small></span>

                            </li>
                        @endforeach
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">बजेट तथा कार्यक्रम </p>
                    </div>
                    <ul class="list-group">
                        @foreach($meetingDetails as $meetingDetail)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="">{{Str::words($news->subject,12)}}</a>
                                <span><small>{{$news->date->toDateString()}}</small></span>

                            </li>
                        @endforeach
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">सार्वजनिक खरीद बोलपत्र</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                            <span><small>नेपालगन्ज उप-महानगरपालिका</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                            <span><small>नेपालगन्ज उप-महानगरपालिका</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                            <span><small>नेपालगन्ज उप-महानगरपालिका</small></span>
                        </li>
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="tab-section mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ps-lg-7 text-lg-start mt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">सूचना
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">समाचार
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">प्रेस
                                विज्ञप्ति
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content notice" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="सूचना-tab">
                            <div class="list-item-body">
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा<span> Posted Date:- 2079-03-05</span>
                                </a>
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा<span>Posted Date:- 2079-03-05 </span>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-primary">अरु थपपद्नुहोस</button>
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="समाचार-tab">
                            <div class="list-item-body">
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा
                                    <span> Posted Date:- 2079-03-05 </span>
                                </a>
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा<span>Posted Date:- 2079-03-05 </span>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-primary">अरु थपपद्नुहोस</button>
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="प्रेस विज्ञप्ति-tab">
                            <div class="list-item-body">
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा<span>Posted Date:- 2079-03-05 </span>
                                </a>
                                <a href="#" target="_blank" class="note">
                                    इ-नक्सा<span>Posted Date:- 2079-03-05 </span>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-primary">अरु थपपद्नुहोस</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-7 text-lg-start mt-3">
                    <div class="container">
                        <div class="video">
                            <iframe width="525" height="300" src="https://www.youtube.com/embed/13UQAEKF2HM"
                                    title="OMG बालेनले टुकुचा खोला खोज्दा भेटियो सयौं वर्ष पुरानो राजा चढ्ने गाडि।एक्कासी भयो भागाभाग,हंगामा🚎"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-12 mt-3">
                        <div class="mobile-app">
                            <div class="card-01 h-100">
                                <h6 class="heading mb-2">NMC Mobile Application</h6>
                                <p>
                                    <a target="_blank" href="#"><img src="assets/img/logo.png"
                                                                     class="img-fluid animation"></a>
                                    <a target="_blank" href="#"><img src="assets/img/logo.png"
                                                                     class="img-fluid animation"></a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="social-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title ">वडा कार्यालय स्थान</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <div class="map">
                                <iframe
                                    src="{{$officeSetting->google_map}}"
                                    width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">

                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">फेसबुक अपडेट</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <div class="facebook-page">
                                <iframe
                                    src="{{$officeSetting->facebook_link}}"
                                    width="340" height="400"
                                    style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">ट्वीट्स</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <div class="twitter">
                                <a class="twitter-timeline" data-height="400"
                                   href="{{$officeSetting->website}}">Tweets
                                    by NinjaPvt</a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    @endpush
    @push('scripts')
    @endpush

@endsection
