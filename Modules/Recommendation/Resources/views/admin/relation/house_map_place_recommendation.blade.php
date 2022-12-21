@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3></h3>
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
                                <p class="text-center pt-4"><b>विषय : नक्सामा घर कायम गर्ने सिफारिस । (१४) </b></p>
                                <p >श्री नापी कार्यलय,<br>................................................</p>

                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............अन्तर्गत श्री ........................................................
                                    को नाती/नातिनी श्री ........................................ को छोरा/छोरी श्री .............................................
                                    को नाममा त्यस कार्यलयमा दर्ता श्रेस्ता कायम रहेको देहायमा उल्लिखित जग्गाको जग्गाधनी श्रेस्ता पुर्जामा घर कायम गरिदिनुहुन् स्थानीय सरकार संचालन ऐन. २०७४
                                    को दफा १२(२) ङ (१४) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>
                                <h4 class="text-center py-2"><b> घर कायम गर्नुपर्ने जग्गाको विवरण </b></h4>

                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th >क्र. स.</th>
                                        <th >वडा नं.</th>
                                        <th >सिट नं.</th>
                                        <th >की. नं. </th>
                                        <th >जग्गाको क्षेत्रफल</th>
                                        <th >कैफियत</th>
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
                                    <p class="text-center"> हतक्षर्........................
                                        <br>
                                        वडा अध्यक्ष</p>
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

