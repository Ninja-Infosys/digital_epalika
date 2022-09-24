@extends('frontend.layouts.master')
@section('content')
    <section class="home-section mt-3">
        <div class="row">
            <div class="col-md-7">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $slider)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <img
                                    src="{{$slider->image_url}}"
                                    class="d-block w-100" alt="{{$slider->title}}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$slider->title}}</h5>
                                    <p>{{$slider->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-5 intro-col mt-1">
                <div class="card-01 introduction  bg-card shadow rounded">
                    <h4 class="heading mt-2 mb-3 px-3">{{$officeSetting->name}}को संक्षिप्त परिचय</h4>
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
                            <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="{{$employee->photo_url}}"
                                 alt="{{$employee->name}}">
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
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">सुचनाहरु</p>
                    </div>
                    <ul class="list-group">
                        @foreach($notices as $notice)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="{{route('single-notice',$notice)}}">{{Str::words($notice->title,12)}}</a>
                                <span><small>{{$notice->date->toDateString()}}</small></span>

                            </li>
                        @endforeach

                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i>
                        </button>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">समाचारहरु </p>
                    </div>
                    <ul class="list-group">
                        @foreach($newses as $news)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="{{route('single-notice',$notice)}}">{{Str::words($news->title,12)}}</a>
                                <span><small>{{$news->date->toDateString()}}</small></span>

                            </li>
                        @endforeach
                        <button class="btn bg-primary btn-outline-light ">थप समाचारहरु <i
                                class="fa fa-angles-right"></i>
                        </button>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">कार्यपालिका बोर्ड निर्णय</p>
                    </div>
                    <ul class="list-group">
                        @foreach($meetingDetails as $meetingDetail)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right"></i>
                                <a href="">{{Str::words($news->subject,12)}}</a>
                                <span><small>{{$news->date->toDateString()}}</small></span>

                            </li>
                        @endforeach
                        <button class="btn bg-primary btn-outline-light ">थप कार्यपालिका बोर्ड निर्णय <i
                                class="fa fa-angles-right"></i>
                        </button>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="map-section pt-4 bg-light">
        <div class="mb-3">
            <div class="title-head-main px-3 py-2 d-flex justify-content-between">
                <div>
                    <span class="fa fa-globe">प्रदेश ६</span>
                </div>
            </div>
        </div>
    </section>


    <section class="tab-section mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://sthaniya.gov.np/gis" style="height:250px;width:100%;"
                            title="Iframe Example"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="row align-content-stretch">
                        @foreach($municipalDetails as $municipalDetail)
                            <div class="col-md-3 p-1 detail " style="background-color: {{$municipalDetail->bg_color}}">
                                <div class="text-center py-1">
                                    {!! $municipalDetail->icon !!}
                                    <h4 class="text-white m-0">
                                        {{$municipalDetail->count}}
                                    </h4>
                                    <p>{{$municipalDetail->title}}</p>
                                </div>
                            </div>
                        @endforeach
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
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/home/home.css')}}">
    @endpush

@endsection
