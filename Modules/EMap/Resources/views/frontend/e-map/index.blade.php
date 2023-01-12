@extends('frontend.layouts.master')
@section('content')
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="breadcrumb d-flex">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500" href="{{route('welcome')}}">ई-पालिका</a>
                            <i class="fa fa-angle-double-right text-light"></i>
                            <a class="ml-1 text-primary-500">घर नक्सा</a>
                        </div>
                    </div>
                    <h5>दरखास्त फारम साथ संलग्न कागजातहरु</h5>
                    <h6>तल दिएका कागजातहरु अनिवार्य राख्नु पर्नेछ । </h6>
                    <div class="scroll shadow">
                        <div class="doc">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>नयाँ निर्माणको लागि नक्सा पास गर्न अनिवार्य पेश गर्नुपर्ने आवश्यक कागजातहरु</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>१. जग्गा धनी प्रमाणपत्र प्रतिलिपि</td>
                            </tr>
                            <tr>
                                <td>२. चालु आर्थिक वर्षको मालपोत तिरेको रसिदको प्रतिलिपि </td>
                            </tr>
                            <tr>
                                <td>३. ज.ध. दर्ता प्रमाण पूर्जामा फोटो नभएको भए नागरिता प्रमाणपत्रको प्रतिलिपि</td>
                            </tr>
                            <tr>
                                <td>४. कि.न. स्पष्ट भएको नापी प्रमाणित नक्सा (ब्लु प्रिन्ट)</td>
                            </tr>
                            <tr>
                                <td>५. पास गरिने नक्साको फोटोकपी वा ब्लुप्रिन्ट (डिजाईनर र नक्सावालाको हस्ताक्षर सहित)</td>
                            </tr>
                            <tr>
                                <td>६. डिजाईनरको इजाजतपत्रको नवीकरण सहितको फोटोकपी (सरोकारवालाबाट प्रमाणित)</td>
                            </tr>
                            <tr>
                                <td>७. मन्जुरी लिई बनाउने भएमा नक्सा वालाको कानून शाखाको रोहवरमा भएको मन्जुरीनामाको सक्कल </td>
                            </tr>
                            <tr>
                                <td>८. वारेश राखी नक्सा पास गर्ने भए वरिसको प्रमाणितको प्रतिलिपि</td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th>पुन: निर्माण गर्न आवश्यक कागजातहरु</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>१. नापी नक्सामा देखिएको तर नक्सा पास नभएको खण्डमा Existing Building को भुई तल्ला प्लान चार तिरको एलिभेसन र साइट पेश गर्नुपर्नेछ </td>
                            </tr>
                            <tr>
                                <td>२. कागजातको हकमा नयाँ नक्सा पास गर्दा आवश्यक पर्ने सबै कागजातहरु पेश गर्नुपर्नेछ</td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th>तल्ला थप गर्न आवश्यक कागजातहरु</th>
                            </tr>
                            <tbody>
                            <tr>
                                <td>१. पहिलो पास गरेको नक्सा र प्रमाणपत्रको फोटोकपी</td>
                            </tr>
                            <tr>
                                <td>२. चालु आर्थिक वर्षसम्मको एकिकृत सम्पति कर तिरेको रसिदको प्रतिलिपि</td>
                            </tr>
                            <tr>
                                <td>३. अरु कागजातको हकमा नयाँ नक्सा पास गर्दा आवश्यक पर्ने सबै कागजातहरु पेश गर्नुपर्नेछ</td>
                            </tr>
                            </tbody>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="row">
                        <div class="col-md-6 p-2 mt-5">
                            <div class="card bg-primary text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">नक्सा दरखास्त फारम</h5>
                                    <i class="fa fa-file-invoice fs-5"></i>
                                    <h6>नयाँ नक्सा दरखास्त फारम भर्नुहोस ।</h6>
                                    <a href="{{url('form')}}" class="btn btn-light"><span>नक्सा दरखास्त</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 mt-5">
                            <div class="card bg-success text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">लग इन</h5>
                                    <i class="fa fa-gears fs-5"></i>
                                    <h6>इ-नक्सा लग इन </h6>
                                    <a href="{{route('organization.login.form')}}" class="btn btn-light"
                                       ><span>लग इन गर्नुहोस्</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 mt-4">
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">नक्सा ट्रयाक</h5>
                                    <i class="fa fa-download fs-5"></i>
                                    <h6>घर नक्साको स्थिति बुझन</h6>
                                    <a href="{{route('mapTrack')}}" class="btn btn-light"><span>ट्रयाक</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 mt-4">
                            <div class="card bg-info text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">संस्था दर्ता</h5>
                                    <i class="fa fa-address-card fs-5"></i>
                                    <h6>नयाँ इ-नक्साको लागि दर्ता गर्नुहोस् ।</h6>
                                    <h6>(NEC नम्बर लिएकोले ।)</h6>
                                    <a href="{{route('organization.register.form')}}" class="btn btn-light"><span> संस्था </span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>

                                    <a href="{{route('organization.register.formPerson')}}" class="btn btn-light"><span> व्यक्ति</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('styles')
        <style>
            .doc {
                top: 45vh;
                position: relative;
                box-sizing: border-box;
                animation: marquee 50s linear infinite;
                margin: 0 auto;
                text-align: left !important;
                color: var(--mainColor);
            }

            .scroll {
                border-radius: 5px;
                border: 2px solid #0D6EFD;
                width: 100%;
                height: 50vh;
                margin: 10px  auto;
                overflow: hidden;
                position: relative;
                box-sizing: border-box;
            }
        </style>
    @endpush
@endsection
