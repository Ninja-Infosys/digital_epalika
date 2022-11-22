@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3> </h3>
                        <div class="d-flex justify-content-end">
                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="image mt-3">
                                    <img height="80" width="100" src="{{asset('images/np.png')}}">
                                    <div class="text-center" style="margin-top: -80px;">
                                        <h5><b>....................पालिका</b><br>
                                            <b>वडा नं. ....................को कार्यालय</b><br>
                                            <b>........(कार्यालय रहेको स्थान) ............(जिल्ला)</b>.<br>
                                            <b>........................ प्रदेश, नेपाल</b>
                                        </h5>
                                    </div>
                                </div>


                                <p class="text-center my-3"><b>विषय : कित्ताकाट गर्न सिफारिस । (१८) </b></p>
                                <p><b>श्री नापी कार्यालय,<br>
                                        ..............।</b></p>
                                <p class="my-3">........... गाउँ/नगरपालिका वडा नं. ............ अन्तर्गत श्री ..............को नाति/नातिनी श्री ...............
                                    को छोरा/छोरी श्री ................. को नाममा दर्ता श्रेस्ता कायम रहेको तपसिलमा उल्लिखित विवरणको जग्गा/घरजग्गा मध्ये .............
                                    बाट ............. क्षेत्रफ़ल जग्गा कित्ताकाट/प्लट मिलन लागि गर्न प्राविधिक निरिक्षण गर्दा मापदण्ड अनुसार मिल्ने देखिएको हुनाले सोको
                                    लागि स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(१८) बमोजिम सिफारिस गरिन्छ ।</p>
                                <h4 class="text-center text-decoration-underline"><b>जग्गा/घरजग्गाको विवरण </b></h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">जग्गा/घरजग्गा रहेको स्थान </th>
                                        <th scope="col">सिट नं.</th>
                                        <th scope="col">किता नं.</th>
                                        <th scope="col">क्षेत्रफल</th>
                                        <th scope="col">कैफियत</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
