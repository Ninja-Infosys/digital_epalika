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


                                <p class="text-center my-3"><b>बिषय : घर जग्गा करको लेखाजोखा सिफारिस । (६) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">...............गाउँ/नगरपालिका ............... वडा नं. ..............को
                                    ................. मा बस्ने श्री ................. ले
                                    घर जग्गा करको लेखाजोखा सिफारिस गरिदिनुहुन भनी जग्गाधनी प्रमाणपत्र र घर जग्गाको अन्य
                                    विवरण सहित दिएको निवेदन अनुसार नीजको आ.व ..........देखि ...........
                                    सम्मको यस गाउँ/नगरपालिकामा र्हेक्लो घर र जग्गा तिर्नुपर्ने मालपोत/सम्पत्तिकर/
                                    .................(घरजग्गासँग सम्बन्धित अन्य) सबैकर चुक्ता गरेको
                                    व्यहोरा स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(६) बमोजिम सिफारिस/प्रमाणित
                                    गरिन्छ ।</p>
                                <p class="mt-4">करको लेखाजोखा सहित कर तिरेको रसिदको प्रतिलिपि यसैसाथ संलग्न ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>
                                <span class="mt-3">नोट :<br>
                                १) घरको लेखाजोखा/मुल्यांकन विधिको नमुना<br>
                                <table class="table table-bordered">
                                    <thead>
    <tr>
      <th scope="col">क.स</th>
      <th scope="col">लम्बाई</th>
      <th scope="col">चौडाई</th>
      <th scope="col">ब.फि.</th>
      <th scope="col">तल्ला</th>
      <th scope="col">जम्मा ब.फि.</th>
      <th scope="col">मूल्य दर</th>
      <th scope="col">जम्मा मूल्य</th>
      <th scope="col">हांस कटटी</th>
      <th scope="col">कायमी मूल्य</th>
      <th scope="col">कैफियत</th>
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
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
                                <br>
                                २) जग्गाको लेखाजोखा/मुल्यांकनमालपोत कार्यालयलये कायम गरेको मूल्य/पालिकाको कायम गरेको मूल्य/चलनचल्ती अनुसार कायम गरिएको मूल्य अनुसार हुनेछ ।<br>
                                ३) कर तिरेको/चुक्ता गरेको रसिदको प्रतिलिपि अनिवार्य रुपमा संलग्न राखी सिफारिस गर्नुपर्नेछ ।</span>
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
