@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दस्तुर तथा दर्ता सम्बन्धी</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card mb_30">
                                <div class="card-body p-3">
                                    <div class="font-black" id="printData">
                                        <form
                                            action="{{route('emap.admin.map.map-apply.map-registration.store', $mapApply)}}">


                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col" rowspan="2">तल्लाको विवरण</th>
                                                    <th scope="col" rowspan="2">प्रस्तावित निर्माणको क्षेत्रफल</th>
                                                    <th colspan="2">नक्सा दस्तुर</th>
                                                    <th scope="col" rowspan="2">कैफियत</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>(वर्ग फिट/मिटर)</td>
                                                    <td>दर</td>
                                                    <td>रकम</td>
                                                    <td></td>
                                                </tr>
                                                @foreach($mapApply->storeyDetails as $storeyDetail)
                                                    <tr>
                                                        <th scope="row">सेमि/बेसमेन्ट १</th>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <th colspan="2">जम्मा</th>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">फारम दस्तुर</th>
                                                    <td colspan="3"></td>
                                                    <td rowspan="4">राजस्व उपशाखामा बुझाउने</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">निवेदक दर्ता दस्तुर</th>
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">अन्य</th>
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">कुल जम्मा</th>
                                                    <td colspan="3"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p>अक्षरेपी<span class="underline-dotted custom-width"></span></p>
                                            <p>फाटवालाको सही: <span class="underline-dotted custom-width"></span></p>
                                            <p>मिति:<span class="underline-dotted custom-width"></span> रसिद नं: <span
                                                    class="underline-dotted custom-width"></span> रकम बुझने: <span
                                                    class="underline-dotted custom-width"></span></p>
                                            <strong>राजस्व शाखाको प्रयोजनको लागि</strong>
                                            <p>निवेदकको नक्सा पास दस्तुर वापत रु: <span
                                                    class="underline-dotted custom-width"></span> बाट प्राप्त भयो |</p>
                                            <p>मिति: <span class="underline-dotted custom-width"></span> रसिद नं: <span
                                                    class="underline-dotted custom-width"></span>. रकम बुझने: <span
                                                    class="underline-dotted custom-width"></span></p>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            .font-black p {
                color: black;
            }

            .underline-dotted {
                border-bottom: dotted 2px !important;
                padding: 0 20px;
            }

            .custom-width {
                padding: 0 80px !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
