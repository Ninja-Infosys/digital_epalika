<section class="footer-section">
    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div id="round-btn" class="popup" onclick="myFunction()">
                    <div class="popup-banner">
                        <h3>e-Palika</h3>
                        <div class="btnsection">
                            <p>म तपाईंलाई कसरी सहयोग गर्न सक्छु?</p>
                        </div>
                    </div>
                    <div class="round-btn-div">
                        <img class="round-btn-img" src="{{asset('assets/frontend/image/icon/support.png')}}">
                    </div>
                    <span class="popuptext" id="myPopup">
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
                    </span>
                </div>
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
                    <div class="footer-img col-md-4">
                        <img src="{{asset('assets/frontend/image/pp.png')}}" alt="Get in Play Store">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <span>Copyright © {{$officeSetting->name}}</span><span>Updated on : 2079/01/12</span>
        </div>
    </footer>
</section>
<script>
    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/footer.css')}}">
@endpush

