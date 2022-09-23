@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container-fluid">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div>
                        <a class="whitespace-nowrap text-primary-500" href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                        <i class="fa fa-angle-right ml-lg-1"></i><a class="ml-1 text-primary-500">नीति सुची</a>
                    </div>
                </div>
                <div class="row bg-card shadow rounded overflow-hidden">
                    <div class="d-flex justify-content-start">
                        <h4 class="text-center mt-5">गुनासो विषय: something</h4>
                    </div>
                    <div class="col-md-7"><p>गुनासो प्रकार: something</p></div>
                    <div class="col-md-5"><p>सम्वन्धित शाखा: something</p></div>
                    <div>आवेदक नम्बर: 02012310255</div>
                    <div class=" row mt-4 mb-2 border rounded">
                        <div class=" single-grievance-details  d-flex   mb-5 px-3 py-2">
                            <img src="{{asset('assets/frontend/image/avatar.png')}}"
                                 class="img-fluid rounded-circle mt-1" alt="">
                            <p>सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !</p>
                        </div>
                        <div class="row ">
                            <div class="col-md-3 grievance-doc-img">
                                <img src="{{asset('assets/frontend/image/agri4.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class=" single-grievance-details border rounded px-3 py-2 d-flex justify-content-end">
                            <p>सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !
                                सीमा पर्खाल नियमित गर्ने तथा अनधिकृत सीमा पर्खाल हटाउने सम्बन्धी काठमाडौं महानगरपालिकाको
                                सूचना !</p>
                            <img src="{{asset('assets/frontend/image/avatar.png')}}"
                                 class="img-fluid rounded-circle mt-1" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/policy.css')}}">
    @endpush
@endsection
