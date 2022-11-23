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
                                        <h4>
                                            <b>....................पालिका</b><br>
                                            <b>वडा नं. ....................को कार्यालय</b><br>
                                            <b>........(कार्यालय रहेको स्थान) ............(जिल्ला)</b>.<br>
                                            <b>........................ प्रदेश, नेपाल</b>
                                        </h4>
                                    </div>
                                </div>
                                <h5 class="text-center pt-4"><b>विषय : आधारभूत विधालय खोल्ने सिफारिस । (२७) </b></h5>
                                <h5 class="py-3"><b>श्री .........................................गाउँनगर कार्यपालिकाको कार्यलय, <br>
                                        ......................................... ।</b></h5>
                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............ को ...................................
                                    मा आधारभुत विधालय खोल्नका लागि स्थनीय भद्रभलादमी सहितको बैठकको निर्णय अनुसार माग भई आएकोमा सो
                                    स्थानमा आधारभुत विधालय खोल्ने उपयुक्त भएको भनी यस वडा कार्यालयको मिति ........................... मा
                                    निर्णय भएकोले सोहि अनुसार आधारभुतन विधालय खोल्ने स्थानीय सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (२७) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>

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


