@extends('frontend.layouts.master')
@section('content')
    <section class="home-section mt-3">
        <div class="container">
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
                                <img class="d-block w-100" src="https://placeimg.com/1080/500/animals" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>My Caption Title (1st Image)</h5>
                                    <p>The whole caption will only show up if the screen is at least medium size.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://placeimg.com/1080/500/arch" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://placeimg.com/1080/500/nature" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 mt-1">
                        <div class="card-01 introduction  bg-card shadow rounded ">
                            <h4 class="heading mt-2 mb-3 px-3">नेपालगंज उप-महानगरपालिकाको संक्षिप्त परिचय</h4>
                            <h6 class="fw-normal lh-lg"><strong>पृष्ठभूमि </strong> वि.स. २०६२/६३ को जन आन्दोलनले
                                संबैधानिक राजतन्त्रलाई
                                विस्थापित गरी मुलुक लोकतान्त्रिक&nbsp;गणतन्त्रात्मक शासन व्यवस्थामा रूपान्तरण भएको
                                संविधान सभाबाट निर्मित
                                संविधानले कानुनी रूपमा मुलुकलाई सङ्घीय संरचनामा
                                लगेकोले सात वटा प्रदेशहरू कायम रहन गएको सन्दर्भमा प्रत्येक प्रदेशमा सातै वटा
                                मन्त्रालयहरू कायम रहने
                                व्यवस्था अनुसार यो मन्त्रालयको स्थापना मिति २०७४/१०/२२ गते भएको हो।</h6>
                            <div class="d-flex justify-content-end">
                                <button class="btn  bg-info text-white">थप पढ्नुहोस्</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="avatar-section mt-5">
        <div class="container bg-card swiper-cube-shadow rounded">
            <div class="row ">
                <div class="card-02 col-md-4 mb-2">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="assets/img/logo.png" alt="">
                        <div class="card-body p-0 m-0">
                            <div class="card-description ">
                                <h5 class="card-title mt-5">नगर प्रमुखको नाम</h5>
                                <h6 class="card-title ">नगर प्रमुख</h6>
                                <p>example@gmail.com</p>
                                <p>९८१२३४५६७८</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-02 col-md-4 mb-2">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="assets/img/logo.png" alt="">
                        <div class="card-body p-0 m-0">
                            <div class="card-description ">
                                <h5 class="card-title mt-5">नगर उप-प्रमुखको नाम</h5>
                                <h6 class="card-title">उप-प्रमुख</h6>
                                <p>example@gmail.com</p>
                                <p>९८१२३४५६७८</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" card-02 col-md-4">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="assets/img/logo.png" alt="">
                        <div class="card-body p-0 m-0">
                            <div class="card-description ">
                                <h5 class="card-title mt-5">प्रमुख प्रशासकिय अधिकृत नाम</h5>
                                <h6 class="card-title">प्रमुख प्रशासकिय अधिकृत</h6>
                                <p>example@gmail.com</p>
                                <p>९८१२३४५६७८</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                            <p>सुचनाहरु</p>
                        </div>

                        <div class="list-item-body">
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-05
                                    <span class="text-redish float-right">
                                        नेपालगन्ज उप-महानगरपालिका
                                    </span>
                                </small>
                            </span>
                            </a>
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-04
                                    <span class="text-redish float-right">
                                        इ-नक्सा
                                    </span>
                                </small>
                            </span>
                            </a>


                            <a routerLink='#' class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">अरु
                                थपपद्नुहोस</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                            <p>सुचनाहरु</p>
                        </div>

                        <div class="list-item-body">
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-05
                                    <span class="text-redish float-right">
                                        नेपालगन्ज उप-महानगरपालिका
                                    </span>
                                </small>
                            </span>
                            </a>
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-04
                                    <span class="text-redish float-right">
                                        इ-नक्सा
                                    </span>
                                </small>
                            </span>
                            </a>


                            <a routerLink='#' class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">अरु
                                थपपद्नुहोस</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                            <p>सुचनाहरु</p>
                        </div>

                        <div class="list-item-body">
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-05
                                    <span class="text-redish float-right">
                                        नेपालगन्ज उप-महानगरपालिका
                                    </span>
                                </small>
                            </span>
                            </a>
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-04
                                    <span class="text-redish float-right">
                                        इ-नक्सा
                                    </span>
                                </small>
                            </span>
                            </a>


                            <a routerLink='#' class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">अरु
                                थपपद्नुहोस</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                            <p>सुचनाहरु</p>
                        </div>

                        <div class="list-item-body">
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-05
                                    <span class="text-redish float-right">
                                        नेपालगन्ज उप-महानगरपालिका
                                    </span>
                                </small>
                            </span>
                            </a>
                            <a href="#" target="_blank" class="list-item-body-content">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                <span class="text-bluish" title="इ-नक्सा">
                                    इ-नक्सा
                                </span>
                            <small class="d-block w-100">
                                    - 2079-03-04
                                    <span class="text-redish float-right">
                                        इ-नक्सा
                                    </span>
                                </small>
                            </span>
                            </a>


                            <a routerLink='#' class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">अरु
                                थपपद्नुहोस</a>
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
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3521.2489937123523!2d81.61191651452778!3d28.04742101707261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399867a9e458155b%3A0xb3a9de606a21f9a0!2sNinja%20Infosys%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1663319352634!5m2!1sen!2snp"
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
                                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Finfosysninja&tabs=timeline&width=340&height=400&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId"
                                    width="340" height="400" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0"
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
                                   href="https://twitter.com/NinjaPvt?ref_src=twsrc%5Etfw">Tweets
                                    by NinjaPvt</a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-slider mt-5 ">
        <h3 class="text-center">फोटो ग्यालरी</h3>
        <div class="container p-2">
            <swiper [spaceBetween]="50" [slidesPerView]="3" [slidesPerGroup]="1"
                    [loop]="true" [centeredSlides]="true" [autoplay]="{
                delay: 2500,
                disableOnInteraction: false }" [pagination]="{
                clickable: true }" [navigation]="false" class="mySwiper">
                <ng-template swiperSlide>
                    <div class="card bg-white">
                        <img class="mb-2 card-img-top" src="assets/img/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item text-center fs-5 bg-transparent">यो फोटो सालाइडर १ हो</li>
                            </ul>
                        </div>
                    </div>
                </ng-template>
                <ng-template swiperSlide>
                    <div class="card bg-white">
                        <img class="mb-2 card-img-top" src="assets/img/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item text-center fs-5 bg-transparent">यो फोटो सालाइडर १ हो</li>
                            </ul>
                        </div>
                    </div>
                </ng-template>
                <ng-template swiperSlide>
                    <div class="card bg-white">
                        <img class="mb-2 card-img-top" src="assets/img/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item text-center fs-5 bg-transparent">यो फोटो सालाइडर १ हो</li>
                            </ul>
                        </div>
                    </div>
                </ng-template>
            </swiper>
        </div>
    </section>

@endsection
