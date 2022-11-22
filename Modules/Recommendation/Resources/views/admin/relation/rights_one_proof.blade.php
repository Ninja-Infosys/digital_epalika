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
                                <div class="image mt-3">
                                    <img height="80" width="100" src="{{asset('images/np.png')}}">
                                    <div class="text-center" style="margin-top: -80px;">
                                        <h5>
                                            <b>....................पालिका</b><br>
                                            <b>वडा नं. ....................को कार्यालय</b><br>
                                            <b>........(कार्यालय रहेको स्थान) ............(जिल्ला)</b>.<br>
                                            <b>........................ प्रदेश, नेपाल</b>
                                        </h5>
                                    </div>
                                </div>
                                <p class="text-center pt-4"><b>विषय : हकवाला वा हकदार प्रमाणित । (२३) </b></p>
                                <p >जो जससंग सम्बन्धित छ ।</p>

                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............को............................. मा स्थायी बसोबास
                                    भएका श्री ........................................ को नाति/नातिनी श्री........................................को छोरा/छोरी
                                    ............................... को पति/पत्नी बर्ष............................................... को श्री ......................
                                    ले हकदारहरु प्रमाणित गरी पाउँ भनी निवेदन पेश गर्नुभएकोमा मिति.............................मा..........................गाउँ/नगरपालिकाबाट
                                    जारी भएको नाता प्रमाणित, मिति ..................... मा गरिएको स्थानीय /प्रहरी सर्जमिन मुचुल्का अनुसार निजको हकदारहरु तपसिलमा उल्लेख
                                    भए बमोजिम रहेको व्यहोरा स्थानीय सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (२३) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>

                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th>सि. नं.</th>
                                        <th>हकदारको नाम, थर</th>
                                        <th>नाता</th>
                                        <th>कैफियत</th>

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


