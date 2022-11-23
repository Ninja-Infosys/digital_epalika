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


                                <p class="text-center my-3"><b>विषय : उधोग ठाउँसारी सिफारिस । (२६) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">...............गाउँ/नगरपालिका वडा नं. ............. बस्ने श्री ................. ले ..............
                                    गाउँ/नगरपालिका वडा नं ........ को ................... मा रहेको ....................... नामको उधोगको ठाउँसारी जाने/आउने भएकोले
                                    सिफारिस माग गर्नुभएकोमा सो उधोग ...........गाउँ/नगरपालिका वडा नं ............. को ............. मा ठाउँसारी जान/आउनका लागि
                                    स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(२६) बमोजिम प्रमाणित गरिन्छ ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>

                                <p class="mt-5">नोट : ठाउँसरी आउनेको हकमा स्थानीय सर्जमिन मुचुल्का र आवश्यक भएमा प्रचलित कानून बमोजिम वातावरणीय प्रभाव मुल्याकं प्रतिवेदनका आधारमा सिफारिस गर्नुपर्नेछ ।</p>
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
