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


                                <p class="text-center my-3"><b>विषय : आर्थिक अवस्था कमजोर वा विपन्नता प्रमाणित । (३२) </b></p>
                                <p><b>श्री जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">............... गाउँ/नगरपालिका वडा नं. ...... मा स्थायी ठेगाना भएका वर्ष ....... को श्री ......................
                                    ले आफ्नो आर्थिक अवस्था कमजोर/विपन्नता भएकोले प्रमाणित गरिदिन निवेदन पेश गर्नुभएकोमा स्थलगत सर्जमिन मुचुल्का, निजले यस ................ गाउँ/नगरपालिकालाई
                                    तिर्न सक्ने करको विश्लेषण, घर जग्गाको विवरण, अन्य आयका आधारमा निजको आर्थिक अवस्था कमजोर/निज विपन्न रहेको व्यहोरा -
                                    स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(३२) बमोजिम प्रमाणित गरिन्छ ।</p>
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
