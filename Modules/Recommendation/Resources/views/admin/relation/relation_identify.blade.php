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
                                <h5 class="text-center mt-3"><b>खण्ड: ख</b></h5>
                                <h5 class="text-center"><b>सिफारिसको नमुना ढाँचा</b></h5>
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


                                <p class="text-center mt-3"><b>बिषय : नाता प्रमाणित। (१) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ।</b></p>
                                <p class="my-2">........गाउँ/नगरपालिका वडा नं ......... अन्तर्गत ........... मा स्थायी बसोबास भएका श्री ....................
                                ले तपसिलमा उल्लिखित व्यक्तिहरुबीच ................. प्रयोजनका लागि नाता प्रमाणित गरिदिन यस वडा कार्यालयमा दिनु भएको निवेदन अनुसार निजहरुबीच देहाय बमोजिम नाता रहेको व्यहोरा स्थानीय
                                सरकार संचालन ऐन, २००७४ को दफा १२(२)ङ(१) बमोजिम प्रमाणित गरिन्छ ।</p>

                                <p class="text-decoration-underline"><b>देहाय</b></p>
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr>
                                        <th scope="col">निवेदक</th>
                                        <th scope="col">पिता</th>
                                        <th scope="col">माता</th>
                                        <th scope="col">दाई</th>
                                        <th scope="col">अन्य(नाता भएमा)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr height="200">
                                        <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>
                                <div class="break-page"></div>
                                <div class="image mt-3">
                                    <img height="80" width="100" src="{{asset('images/np.png')}}">
                                    <div class="text-center" style="margin-top: -80px;">
                                        <h4><b>....................पालिका</b><br>
                                            <b>वडा नं. ....................को कार्यालय</b><br>
                                            <b>........(कार्यालय रहेको स्थान) ............(जिल्ला)</b>.<br>
                                            <b>........................ प्रदेश, नेपाल</b>
                                        </h4>
                                    </div>
                                    <h5 class="text-center mt-5"><b>Subject : Relation Certificate</b></h5>
                                    <p>To Whom It May Concern</p>
                                    <p>This is to certify that Mr/Mrs/Miss ................ resident of ............. Ward no. ................. is the native citizen of Nepal,
                                    as per the application proceeded in this office following members are the relatives of the applicant as mentioned below
                                    according to Local Government Operation Act, 2074.</p>
                                    <table class="table table-bordered">
                                        <thead class="text-center">
                                        <tr>
                                            <th scope="col">Applicant</th>
                                            <th scope="col">Father</th>
                                            <th scope="col">Mother</th>
                                            <th scope="col">Brother</th>
                                            <th scope="col">Other</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr height="200">
                                            <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                            <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                            <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                            <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                            <td>हालसालै खिचेको पसपोर्ट साइजको फोटो</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mt-2">
                                        <p class="text-center">sign ........................<br>Ward Chairman</p>
                                    </div>
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
