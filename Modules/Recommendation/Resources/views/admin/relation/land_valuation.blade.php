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
                                <h5 class="text-center pt-4"><b>विषय : जग्गा मुल्यांकन/प्रमाणित । (२८) </b></h5>
                                <h5 class="py-3"><b>श्री जो जससंग सम्बन्धित छ ।</b></h5>
                                <P>
                                    ............................ गाउँ/नगरपालिका वडा नं. ............ को ...................................
                                    मा स्थायी ठेगाना भएका श्री .............................. ले आफ्नो तपसिलमा उल्लेखित जग्गाको मुल्यांकन/ प्रमाणित गरिदिन
                                    भनि निवेदन पेश गर्नुभएकोमा सो जग्गाको मुल्यांकन /मुल्यांकन प्रमाणित देहाय बमोजिम भएको व्यहोरा
                                    स्थानीय सरकार संचालन ऐन. २०७४ को दफा १२(२) ङ (२८) बमोजिम सिफारिस साथ अनुरोध गरिन्छ ।
                                </P>
                                <h5 class="text-decoration-underline pt-3"> देहाय</h5>
                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th>जग्गा भएको स्थानको ठेगाना </th>
                                        <th>कित्ता नं.</th>
                                        <th>जग्गाको क्षेत्रफल </th>
                                        <th>हलको मुल्यांकन रकम</th>
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
                                    </tr>
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
                                    <p class="text-center"> हतक्षर्.......................
                                        <br>
                                        (वडा अध्यक्ष) </p>
                                </div>

                                <p class="pt-5">
                                    <b>नोट:</b> जग्गाको मुल्यांकन मालपोत कार्यालयले कायम गरेको मुल्य वा स्थानीय तहले कायम गरेको मुल्य वा चलनचल्ती अनुसार कायम गरिएको मुल्य अनुसार हुने र सोहि व्यहोरा कैफियत महलमा उल्लेख
                                    गर्नुपर्नेछ ।
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


