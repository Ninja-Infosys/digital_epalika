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


                                <p class="text-center my-3"><b>विषय : जग्गा धनी प्रमाणपूर्जा हराएको सिफारिस (१७) </b></p>
                                <p><b>श्री मालपोत कार्यालय<br>
                                        ..................।</b></p>
                                <p class="my-3">........... गाउँ/नगरपालिका वडा नं. ............ को .......... मा निवासी श्री ................. को तपसिलमा उल्लिखित विवरण
                                    अनुसार जग्गाधनी प्रमाणपूर्जा हराएकोले सिफारिस गरिदिनुहुन भनी निवेदन दिनु भएकोमा नियमानुसार गरिदिनुहुन स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(१७) बमोजिम गरिन्छ ।</p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">जग्गा भएको स्थानको ठेगाना</th>
                                        <th scope="col">कित्ता नं.</th>
                                        <th scope="col">जग्गाको क्षेत्रफ़ल</th>
                                        <th scope="col">कैफियत</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
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
