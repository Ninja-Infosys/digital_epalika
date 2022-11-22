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


                                <p class="text-center my-3"><b>विषय : संरक्षक प्रमाणित गर्ने (१९) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">........... गाउँ/नगरपालिका वडा नं. ............ अन्तर्गत श्री ..............को नाति/नातिनी श्री ...............
                                    को छोरा/छोरी वर्ष ....... को श्री .......... को ............. संरक्षक ........... गाउँ/नगरपालिका ............. वडा नं. ............
                                    स्थायी ठेगाना भएको वर्ष .......... को श्री ............ रहेकोले सो विवरण प्रमाणित गरिदिनुहुन निवेदन पेश भएकोमा स्थानीय सर्जमिन मुचुल्का समेतको आधारमा
                                    देहाय बमोजिम संरक्षक रहेको व्यहोरा  स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(१९) बमोजिम सिफारिस गरिन्छ ।</p>
                                <h4 class="text-decoration-underline"><b>देहाय</b></h4>
                                <table class="table table-sm table-bordered mt-2">
                                    <thead>
                                    <tr class="text-center">
                                        <th colspan="3">संरक्षण पाउने विवरण</th>
                                        <th colspan="3">संरक्षकको विवरण</th>
                                        <th rowspan="3">संरक्षण पाउने र संरक्षक बिचको विवरण</th>
                                        <th rowspan="3">कैफियत</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>नाम थर</td>
                                        <td>ठेगाना</td>
                                        <td>हालको उमेर</td>
                                        <td>नाम थर</td>
                                        <td>ठेगाना</td>
                                        <td>हालको उमेर</td>
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
