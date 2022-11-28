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


                                <p class="text-center my-3"><b>विषय : नयाँ व्यवसाय दर्ता सिफारिस । (८) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">...............गाउँ/नगरपालिका वडा नं. ..............को ................. मा
                                    श्री ................. (व्यक्ति/संस्था/फर्म/कम्पनी) ले आफ्नो नाममा यस ............... गाउँ/नगरपालिका वडा नं. ..........
                                    को ............ मा नयाँ व्यवसाय दर्ताका लागि सिफारिस गरिदिन दिनु भएको निवेदन अनुसार उक्त व्यक्ति/संस्था/फर्म/कम्पनीको नाममा नियमानुसार
                                    ................ प्रकृतिको नयाँ व्यवसाय दर्ता गरिदिनुहुन स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(८) बमोजिम सिफारिस गरिन्छ ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>

                                <p class="mt-5"><br>
                                    १) वातावरणीय रुपमा प्रभाव पार्ने खालको व्यवसायको लागि स्थानीय व्यक्तिहरुको सहमति सहितको सर्जमिन मुचुल्का अनिवार्य गर्नुपर्नेछ ।<br>
                                    २) दिर्घकालीन रुपमा वातावरणीय प्रभाव पार्नेखालका आयोजनाहरुको हकमा प्रचलित कानून बमोजिम आइ.इ.इ./इ.आइ.ए. प्रतिवेदन समेतका आधारमा हुने किटान गरेर मात्र सिफारिस गर्नुपर्नेछ ।
                                </p>
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
