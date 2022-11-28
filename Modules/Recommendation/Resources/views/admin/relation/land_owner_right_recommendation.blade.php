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


                                <p class="text-center my-3"><b>विषय : जग्गाको हक सम्बन्धमा सिफारिस । (२५) </b></p>
                                <p><b>जो जस सँग सम्बन्ध छ ।</b></p>
                                <p class="my-3">........... गाउँ/नगरपालिका वडा नं. ............ बस्ने श्री .............. को नाति/नातिनी श्री ...................
                                    को छोरा/छोरी श्री ................ को नाममा दर्ता श्रेष्ता कायम रहेको तल उल्लिखित विवरणको जग्गाको हक सम्बन्धमा सिफारिस गरिदिनका लागि श्री ..................
                                    ले निवेदन दिनुभएकोमा .................. गाउँ/नगरपालिकाबाट गरिएको नाता प्रमाणित विवरण र स्थानीय सर्जमिन मुचुल्का समेतका आधारमा सो जग्गाको हक देहाय बमोजिम हुन
                                    स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(२५) बमोजिम सिफारिस गरिन्छ ।</p>
                                <h4 class="text-decoration-underline"><b>हकदारहरुको विवरण</b></h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">क्र.स</th>
                                        <th scope="col">हकदारहरुको नाम</th>
                                        <th scope="col">नाता</th>
                                        <th scope="col">बावु/पति को नाम</th>
                                        <th scope="col">ना.प्र.प.नं/जारी <br>
                                        मिति/जिल्ला</th>
                                        <th scope="col">कैफियत</th>
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
                                <h4 class="text-decoration-underline"><b>नामसारी गर्ने जग्गाको विवरण</b></h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">क्र.स</th>
                                        <th scope="col">वडा नं.</th>
                                        <th scope="col">सिट नं.</th>
                                        <th scope="col">क्षेत्रफल</th>
                                        <th scope="col">कैफियत</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
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
