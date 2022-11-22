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
                                <p class="text-center pt-4"><b>विषय : वडाबाट जारी हुने सिफारिस तथा अन्य कागजलाई अंग्रेजी भाषामा समेत सिफारिस तथा प्रमाणित गर्ने । (११) </b></p>
                                <p class="text-center"><b>अंग्रेजी भाषामा उत्था गरी सम्बन्धित निकायमा सिफारिस वा प्रमाणित गरिदिने । उदाहरणका लागि,</b></p>
                                <h4 class="text-center pt-2"><b> BIRTH CERTIFICATE</b></h4>

                                <h5>TO WHOM IT MAY CONCERN </h5>
                                <P> This is to certify that Mr/Ms ............................................ Granddaughter/Grandson of ....................................................,
                                 Daughter/Son of ......................................., resident of .................................. Municipality Ward No. ..................................        .........................
                                District,   ..................................  Province, Nepal, was born on   .................................              Municipality Ward No .............,     ................... District, Nepal according to his/her citizenship certificate according
                                to Local Government Operation Act, 2074.</P>
                                <h4 class="text-center py-2"><b> PROPERTY VALUATION</b></h4>

                                <h5>TO WHOM IT MAY CONCERN </h5>
                                <p>This is to certify that Mr ......................, is a permanent resident of ......................      Municipality
                                Ward Np. 10, Province, Nepal. On his/her request for the total value of the properties owned by him/her in this ..............................
                                Municipality is shown below. As per the field survey and investigation made by Ward Office, the current market value of property is as follows:</p>

                                <h5 class="text-decoration-underline">
                                    Valuation of Land & Building
                                </h5>
                                <table class="table table-bordered my-2">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">SN</th>
                                        <th rowspan="2">Owner's Type</th>
                                        <th rowspan="2">Type of Property</th>
                                        <th colspan="2">Address</th>
                                        <th rowspan="2">Plot No.</th>
                                        <th rowspan="2">Area</th>
                                        <th rowspan="2">Rate(NRP)</th>
                                        <th rowspan="2">Total Valuation(NRP)</th>
                                    </tr>
                                    <tr>
                                        <td>Municipality</td>
                                        <td>ward</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ABC</td>
                                        <td>Land</td>
                                        <td></td>
                                        <td></td>
                                        <td>000</td>
                                        <td>0-0-0-0</td>
                                        <td>0000</td>
                                        <td>000000</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
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
                                <p>Total Valuation of Property is NRP : 0000000 <br>
                                Today's Exchange Rate US($) 1 = NRP : 00 <br>
                                which is equivalent to US ($): 000000        (Source: NRB)</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">........................
                                        <br>
                                        Ward Chairman</p>
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

