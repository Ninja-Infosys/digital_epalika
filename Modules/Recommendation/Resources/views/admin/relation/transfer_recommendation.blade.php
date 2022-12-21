@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
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
                                <h5 class="text-center pt-4"><b>विषय : नामसारी सिफारिस । (२४) </b></h5>
                                <h5><b>श्री मालपोत कार्यलय, <br>
                                        ......................................... ।</b></h5>
                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............बस्ने श्री
                                    ...................................... को नाति/नातिनी
                                    श्री ..................... को छोरा/छोरी श्री ............................... को मिति
                                    ....................................
                                    मा मृत्यु भएको हुनाले निज मृतकका नाममा रहेको तल उल्लेखित विवरणको घरजग्गा नामसारीको
                                    लागि श्री .......................................
                                    ले निवेदन दिनुभएकोमा ........................................... पालिकाबाट गरिएको
                                    नाता प्रमाणित विवरण अनुसार निज मृतकको
                                    नाममा रहेको सो घर/जग्गा प्रचलित कानुन बमोजिम हकदारहरुको नाममा नामसारीको लागि स्थानीय
                                    सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (२४) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>
                                <h5 class="text-decoration-underline pt-3"> मृतकका हकदारहरुको विवरण</h5>
                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th>क्र. स</th>
                                        <th>हकदारहरुको नाम</th>
                                        <th>नाता</th>
                                        <th>बाबु/पति को नाम</th>
                                        <th>बाजे/ससुरा को नाम</th>
                                        <th>ना.प्र.प.नं/जारी मिति/जिल्ला</th>
                                        <th>कैफियत</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h5 class="text-decoration-underline pt-3">नामसारी गर्ने घर/जग्गाको विवरण</h5>
                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th>क्र. स</th>
                                        <th>वडा नं.</th>
                                        <th>सिट नं.</th>
                                        <th>कि. नं.</th>
                                        <th>क्षेत्रफल</th>
                                        <th>कैफियत</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center"> हतक्षर्.......................
                                        <br>
                                        (वडा अध्यक्ष) </p>
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


