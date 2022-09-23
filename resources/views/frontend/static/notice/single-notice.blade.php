
@extends('frontend.layouts.master')
@section('content')
<section class="view-notice">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-01 justify-content px-5 pt-5 pb-5">
                    <h3>लागुपदार्थ को दुरुपयोग</h3>
                    <small>- २०७९-०६-०६</small>
                    <p>लुम्बिनी प्रदेशको पश्चिम तर्फ र साविक मध्यपश्चिमाञ्चल बिकास क्षेत्रको केन्द्र बिन्दुको रुपमा रहेको प्रमुख ब्यापारिक केन्द्र तथा लुम्बिनी प्रदेश अन्तर्गत्का १२ जिल्लाहरु मध्ये सवैभन्दा महत्वपूर्ण जिल्ला मध्ये बाँके जिल्लाको सदरमुकामको रुपमा रहेको उप–महानगरपालिका हो । शहर बाँके जिल्लामा अवस्थित पश्चिम नेपालको द्धार, नेपालगञ्ज नगरी, नेपालकै नामबाट स्थापना भएको प्रमुख शहरको रुपमा परिचित स्थान हो ।</p>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                               <a href="#"><img lazy="loaded" class="album-img pointer" alt="" src={{asset('assets/frontend/image/submetro.jpg')}}></a></div>
                           
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-notice/single-notice.css')}}">
@endpush
@endsection