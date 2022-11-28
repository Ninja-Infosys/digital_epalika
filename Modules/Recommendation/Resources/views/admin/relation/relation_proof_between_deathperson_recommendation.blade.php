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
                                <div class="flex-container" style="display:flex">
                                    <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:0rem; margin-right:4rem; margin-top:0rem; text-align:center"><img alt="" src="http://localhost:8000/storage/photos/1/cropped-logo.png" style="float:left; height:100px; width:110px" /></div>

                                    <div class="item-auto" style="flex:1 1 auto; margin-right:8rem; margin-top:0rem; text-align:center"><strong><span style="font-size:20px">....................पालिका</span><br />
                                            <span style="font-size:16px">वडा नं. ....................को कार्यालय</span></strong><br />
                                        <span style="font-size:14px">........(कार्यालय रहेको स्थान) ............(जिल्ला)<br />
........................ प्रदेश, नेपाल</span></div>

                                    <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:4rem; margin-right:0rem; margin-top:0rem; text-align:center">&nbsp;</div>
                                </div>


                                <p class="text-center my-3"><b>विषय : मृतकसँगको नाता प्रमाणित तथा सर्जमिन सिफारिस । (२१) </b></p>
                                <p><b>जो जस सँग सम्बन्ध छ ।</b></p>
                                <p class="my-3">........... गाउँ/नगरपालिका वडा नं. ............ अन्तर्गत स्थायी बसोबास भएका श्री .............. ले तपसिलमा उल्लिखित
                                    व्यक्तिहरुमध्ये ........... नाताको व्यक्ति मृतक भएकोले मृत्युदर्ताको प्रमाणपत्र सहित मृतकसँगको नाता सिफारिसका लागि यस वडा कार्यालयमा दिनु भएको
                                    निवेदन अनुसार निवेदक, मृतक र अन्य व्यक्तिहरुबीच तपसिल बमोजिम नाता रहेको व्यहोरा
                                    स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(२१) बमोजिम सिफारिस गरिन्छ ।</p>
                                <h4 class="text-decoration-underline"><b>तपसिल</b></h4>
                                <table class="table table-bordered">
                                    <thead>
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
                                        <td>हालसालै खिचेको पासपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पासपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पासपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पासपोर्ट साइजको फोटो</td>
                                        <td>हालसालै खिचेको पासपोर्ट साइजको फोटो</td>
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
