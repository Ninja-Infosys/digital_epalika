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
                                <p class="text-center pt-4"><b>विषय : संरक्षक सिफारिस । (१९) </b></p>
                                <p >जो जससंग सम्बन्धित छ ।</p>

                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............अन्तर्गत श्री ...................................कोनाती/नातिनी श्री .......................................
                                    को छोरा/छोरी बर्ष ..................को श्री............................................./................................. संस्थाको को संरक्षक....................................
                                    पालिका ....................................वडा नं. स्थयी ठेगाना भएको बर्ष .................................... को श्री........................./ ............................
                                    संस्था रहेकोले सो विवरण प्रमाणित गरिदिनुहुन निवेदन पेश भएकोमा स्थायी सर्जमिन मुचुल्का समेतको आधारमा देहाय बमोजिम संरक्षक रहेको व्यहोरा
                                    स्थानीय सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (१९) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>
                                <h4 class="text-decoration-underline py-2"><b>देहाय</b></h4>

                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th colspan="4">संरक्षण पाउनेको विवरण</th>
                                        <th colspan="4">संरक्षकको विवरण</th>
                                        <th rowspan="2">संरक्षण पाउने र संरक्षक व्यक्ति भएमा नाता</th>
                                        <th rowspan="2">कैफियत</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>नाम थर</td>
                                        <td>ठेगाना</td>
                                        <td>हालको उमेर</td>
                                        <td>संस्था</td>
                                        <td>नाम थर</td>
                                        <td>ठेगाना</td>
                                        <td>हालको उमेर</td>
                                        <td>संस्था</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                                <p>नोट: व्यक्ति भएमा व्यक्तिगत विवरण र संस्था भएमा संस्थागत विवरण भर्नुपर्ने ।</p>
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


