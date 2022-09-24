<section class="footer-section">
    <footer class="footer">
        <div class="footer-main" style="background-image: url({{url('assets/frontend/image/footer.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="footer-title mb-3">सम्पर्क विवरण</h6>
                        <h6 class="text-white">{{$officeSetting->name}}</h6>
                        <ul class="list mt-2">
                            <li class="text-white">
                                <i class="fa-solid fa-location-dot"></i>
                                {{$officeSetting->site_address}}
                            </li>
                            @foreach(explode(',',$officeSetting->phone) as $phone)
                                <li class="text-white">
                                    <i class="fa-solid fa-phone"></i>
                                    <a href="#">{{$phone}}</a>
                                </li>
                            @endforeach
                            @foreach(explode(',',$officeSetting->email) as $email)
                                <li class="text-white">
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="#">{{$email}}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="footer-title mb-3">महत्त्वपूर्ण लिंकहरु</h6>
                        <ul class="list mt-2">
                            @foreach($important_links->take(5) as $link)
                                <li class="text-white">
                                    <i class="fa fa-angle-right"></i>
                                    <a href="{{$link->link_url}}" target="_blank">
                                        {{$link->link_title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('images/get-on-playstore.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <span>Copyright © {{$officeSetting->name}}</span><span>Updated on : 2079/01/12</span>
        </div>
    </footer>
</section>
{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{asset('assets/frontend/css/footer.css')}}">--}}
{{--@endpush--}}
