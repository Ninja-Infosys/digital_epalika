@extends('frontend.layouts.master')
@section('content')
    <section class="home-section mt-3">
        <div class="row">
            <div class="col-md-7">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://myrepublica.nagariknetwork.com/uploads/media/2019/August/Bageshwori%20temple.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>वगेस्वोरी मन्दिर</h5>
                                <p>The whole caption will only show up if the screen is at least medium size.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('assets/frontend/image/submetro.jpg')}}" class="d-block w-100" alt="...">
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
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-md-5 intro-col mt-1">
                <div class="card-01 introduction  bg-card shadow rounded">
                    <h4 class="heading mt-2 mb-3 px-3">नेपालगंज उप-महानगरपालिकाको संक्षिप्त परिचय</h4>
                    <h6 class="fw-normal lh-lg"><strong>पृष्ठभूमि </strong> लुम्बिनी प्रदेशको पश्चिम तर्फ र साविक
                        मध्यपश्चिमाञ्चल बिकास क्षेत्रको केन्द्र बिन्दुको रुपमा रहेको प्रमुख ब्यापारिक केन्द्र
                        तथा लुम्बिनी प्रदेश अन्तर्गत्का १२ जिल्लाहरु मध्ये सवैभन्दा महत्वपूर्ण जिल्ला मध्ये बाँके
                        जिल्लाको सदरमुकामको रुपमा रहेको उप–महानगरपालिका हो ।
                        शहर बाँके जिल्लामा अवस्थित पश्चिम नेपालको द्धार, नेपालगञ्ज नगरी, नेपालकै नामबाट स्थापना भएको
                        प्रमुख शहरको रुपमा परिचित स्थान हो ।
                        यो शहर बिक्रम सम्बत २०१७ सालमा नेपालगञ्ज नगर पञ्चायतका नामबाट स्थापना भई २०१९ सालमा नगरपालिकाको
                        रुपमा स्थापित भएको हो ।
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
                <div class="card-02 col-md-4 mb-2 px-3">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="{{asset('assets/frontend/image/avatar.png')}}" alt="">
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
                <div class="card-02 px-3 col-md-4 mb-2">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="{{asset('assets/frontend/image/avatar.png')}}" alt="">
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
                <div class=" card-02 px-3 col-md-4">
                    <div class="card shadow text-center">
                        <img class="mt-3 mb-3 rounded mx-auto d-block img-fluid" src="{{asset('assets/frontend/image/avatar.png')}}" alt="">
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
    <section class="news-section  mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">सुचनाहरु</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">कार्यपालिका बोर्ड निर्णय </p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="list-item-head bg-danger rounded p-2">
                        <p class="mb-0 text-white fs-5">समचारहरु</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-right"></i>
                            <a href="">नेपालगञ्जमा समुदायमा डेंगी भेटिएपछि लामखुट्टेका लार्भा नष्ट गरिदैं !!</a>
                            <span><small>-2079-03-05</small></span>
                        </li>
                        <button class="btn bg-primary btn-outline-light ">थप सुचनाहरु <i class="fa fa-angles-right"></i></button>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    GIS Map
                </div>
                <div class="col-md-6">
                    <div class="row align-content-stretch">
                        <div class="col-md-3 p-1 detail bg-primary">
                            <div class="text-center py-1">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">१</h4>
                                <p>जम्मा वडा</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-success">
                            <div class="text-center py-1">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <p>सैक्षिक संस्था</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-danger">
                            <div class="text-center py-1">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">४६</h4>
                                <p>स्वास्थ्य संस्था</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-warning">
                            <div class="text-center py-1">
                                <h4 class="text-white m-0">४०%</h4>
                                <p>पर्यटकिय क्षेत्र</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-success">
                            <div class="text-center py-1">
                                <i class="fa fa-users"></i>
                                <h4 class="text-white m-0">२८७७२६१७९१</h4>
                                <p>जनसंख्या</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-primary">
                            <div class="text-center py-1">
                                <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                                <h4 class="text-white m-0">१२१</h4>
                                <p style="font-size:12px;">घर धुरी</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-warning">
                            <div class="text-center py-1">
                                <i class="fa fa-pagelines"></i>
                                <h4 class="text-white m-0">७८३५९५</h4>
                                <p>साना मभौला उधोग</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1 detail bg-danger">
                            <div class="text-center py-1">
                                <i class="fa fa-camera"></i>
                                <h4 class="text-white m-0">१३</h4>
                                <p>कृषि योग्य जमिन</p>
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
 @push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/home/home.css')}}">
@endpush

@endsection
