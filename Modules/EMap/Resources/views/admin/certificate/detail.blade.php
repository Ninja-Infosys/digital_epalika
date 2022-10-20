@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                requestRoute="{{route('print.office-letter-print')}}">
                            <i class="fa fa-print"></i> Print
                        </button>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="top-line d-flex justify-content-between">
                                    <p>पत्र सं.<span class="underline-dotted custom-width"></span></p>
                                    <p>मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p>चलानी:<span class="underline-dotted custom-width"></span></p>
                                <p>श्री राजस्व शाखा<br>
                                नेपालगन्ज उप-महारनागार्पलिका कार्यालय</p>
                                <p class="text-center"><b>विषय :- विवरण पठाएको सम्बन्धमा |</b></p>

                                <p>
                                    उपर्युक्त सम्बन्धमा नेपालगन्ज उ.न.पा. वडा नं.<span class="underline-dotted custom-width"></span> बस्ने श्री/श्रीमती<span class="underline-dotted custom-width"></span> लाई मिति<span class="underline-dotted custom-width"></span> मा स्वीकृत दिएको नयाँ
                                    घर/थपघर/थपतला निर्माण/नामसारी भएको हुँदा तपसिलमा उलेखित विवरण अनुसार रेकर्ड मिलान गर्नु हुन अनुरोध छ |
                                </p>
                                <p>वडा नं.<span class="underline-dotted custom-width"></span> घर नं.<span class="underline-dotted custom-width"></span> सडकको नाम<span class="underline-dotted custom-width"></span> टोलको नाम<span class="underline-dotted custom-width"></span> </p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">घर सि.नं.</th>
                                        <th scope="col">तला नं.</th>
                                        <th scope="col">लम्बाई</th>
                                        <th scope="col">चौडाई</th>
                                        <th scope="col">उचाई</th>
                                        <th scope="col">क्षेत्रफल</th>
                                        <th scope="col">घरको किसिम</th>
                                        <th scope="col">निर्माण भएको</th>
                                        <th scope="col">बाँकि</th>

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
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>जग्गाको विवरण :</b></p>
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th scope="col">ठेली/मोठ नं.</th>
                                        <th scope="col">क्षेत्र</th>
                                        <th scope="col">साविक वडा</th>
                                        <th scope="col">हालको वडा </th>
                                        <th scope="col">कि.नं.</th>
                                        <th scope="col">क्षेत्रफल</th>

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
                                    </tr>
                                    <tr>
                                        <td></td>
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
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>विषय : नाम सरि प्रयोजन</b></p>
                                <p>मिति<span class="underline-dotted custom-width"></span> को निर्णय बमोजिम श्री/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span>
                                    को नामबाट श्री/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> को नाममा नामसारी भएको जानकारी गराईन्छ |</p>
                                <p><b>जग्गाको विवरण :</b></p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">ठेली/मोठ नं.</th>
                                        <th scope="col">क्षेत्र</th>
                                        <th scope="col">साविक वडा</th>
                                        <th scope="col">हालको वडा </th>
                                        <th scope="col">कि.नं.</th>
                                        <th scope="col">क्षेत्रफल</th>

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
                                    </tr>
                                    <tr>
                                        <td></td>
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
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>कित्ता काट भई आएको भएमा :</p>
                                <p>साविक कि.नं.<span class="underline-dotted custom-width"></span>
                                क्षेत्रफल<span class="underline-dotted custom-width"></span> हाल कायम कि.नं.<span class="underline-dotted custom-width"></span>क्षेत्रफल<span class="underline-dotted custom-width"></span></p>
                                <div class="d-flex justify-content-end mt-5">
                                    <span class="underline-dotted custom-width"></span>
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
                padding: 0 50px !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
