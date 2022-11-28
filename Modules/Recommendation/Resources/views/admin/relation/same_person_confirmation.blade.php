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
                                <p class="text-center pt-4"><b>विषय : कुनै व्यत्तिको नाम थर जन्ममिति तथा वतन फरक फरक भएको भए
                                        सो व्यक्ति एउतै हो भन्ने सिफारिस। (१५) </b></p>
                                <p >जो जससंग सम्बन्धित छ ।</p>

                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............को ........................................
                                    मा निवासी श्री ........................................ को नाती/नातिनी श्री .......................................
                                    को छोरा/छोरी श्री.......................... को तपसिलमा उल्लेखित विवरण अनुसारको कागजातमा नाम, थर/जन्ममिति/वतन फरक फरक हुन गएको हुनाले सो
                                     फरक हुन् गएको नाम, थर/जन्ममिति/हुन् गएको व्यक्ति एकै भएको सिफारिस पाउं भनि यस कार्यलयमा निवेदन दिनुभएकोमा मिति...............................
                                    मा गरिएको स्थानीय/प्रहरी सर्जमिन मुचुल्का समेतको आधारमा सो व्यहोरा मनासिव भएको देखिएकोले सो फरक फरक नाम, थर/जन्म मिति/वतन भएको व्यक्ति एकै भएको
                                    व्यहोरा स्थानीय सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (१४) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>
                                <h4 class="text-center py-2"><b>फरक नाम, थर/जन्ममिति र कागजातको विवरण</b></h4>

                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th >फरक भएको कागजात</th>
                                        <th >फरक भएको नाम, थर/जन्म मिति/वतन</th>
                                        <th >हुनु पर्ने नाम, थर/जन्ममिति/वतन</th>

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
                                    <p class="text-center"> हतक्षर्........................
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


