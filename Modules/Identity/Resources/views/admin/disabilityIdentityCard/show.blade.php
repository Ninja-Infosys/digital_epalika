@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अपाङ्गता विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">अपाङ्गता विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header px-2 py-1">
                    <div class="card-title border-bottom px-1 d-flex justify-content-between">
                        <h4 class="font-18 ">श्री {{$disabilityIdentityCard->name}} को व्यतिगत विवरण</h4>
                        <div>
                            <button class="btn btn-sm btn-info"
                                    onclick="printJS({
                                    printable: 'printData',
                                    targetStyles: ['*'],
                                    ignoreElements:['ignore-header'],
                                    type: 'html'
                                    })">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
                <div class="profile-table"  id="printData">
                    <table class="table  table-bordered table-hover table-responsive py-1">
                        <tbody>
                        <tr>
                            <td>
                                अपाङ्गता परिचयपत्र नं. : {{$disabilityIdentityCard->card_no}}
                            </td>
                            <td>
                                परिचयपत्रको प्रकार
                                : {{$disabilityIdentityCard->governmentalDisabilityType?->category->label()??''}}
                            </td>
                            <td rowspan="3" class="text-center ">
                                <img src="{{$disabilityIdentityCard->photo_url}}"
                                     alt="{{$disabilityIdentityCard->name}}"
                                     style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                नाम, थर : {{$disabilityIdentityCard->name}}
                            </td>
                            <td>
                                जन्म मिति : {{$disabilityIdentityCard->dob_bs}}
                            </td>
                        </tr>
                        <tr>
                            <td>जन्म दर्ता नं. : {{$disabilityIdentityCard->birth_registration_no}}</td>
                            <td>जन्म दर्ता पाएको स्थान : {{$disabilityIdentityCard->birth_registration_place}}</td>
                        </tr>
                        <tr>
                            <td>जन्म दर्ता पएको मिति : {{$disabilityIdentityCard->birth_registration_bs}}</td>
                            <td>
                                लिंग : {{$disabilityIdentityCard->gender?->label()?? ""}}
                            </td>
                            <td rowspan="3">
                                <h4 class="font-15 text-center pb-2 text-decoration-underline">
                                    @if($disabilityIdentityCard->finger_print_type === 'finger')
                                        हातको छाप :
                                    @elseif($disabilityIdentityCard->finger_print_type === 'legs')
                                        खुट्टाको छाप :
                                    @else
                                        औलाको छाप :<br> <br>दुवै हात खुट्टा नभयको
                                    @endif
                                </h4>
                                @if($disabilityIdentityCard->finger_print_type !== 'none')
                                    <div class="d-flex justify-content-between ">
                                        @foreach($disabilityIdentityCard->fingerPrints as $file)
                                            <div class="col text-center">
                                                <img src="{{$file->finger_image}}"
                                                     alt=""
                                                     style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                                                <p> {{$file->finger=='left' ? 'बाँया':'दाँया'}}  </p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                रक्त समुह : {{$disabilityIdentityCard->blood_group?->label()?? ""}}
                            </td>
                            <td>जातियता : {{$disabilityIdentityCard->ethnicity->title ?? ""}}</td>
                        </tr>
                        <tr>
                            <td>
                                ठेगाना (स्थायी) : {{$disabilityIdentityCard->permanentLocalBody->local_body?? ""}}
                                -{{$disabilityIdentityCard->permanent_ward}}
                                , {{$disabilityIdentityCard->permanent_tole}}
                            </td>
                            <td>
                                ठेगाना (अस्थायी) : {{$disabilityIdentityCard->temporaryLocalBody->local_body?? ""}}
                                -{{$disabilityIdentityCard->temporary_ward}}
                                , {{$disabilityIdentityCard->temporary_tole}}
                            </td>
                        </tr>
                        <tr>
                            <td>नागरिकता नं. : {{$disabilityIdentityCard->citizenship_no}}</td>
                            <td>नागरिकता पाएको स्थान : {{$disabilityIdentityCard->citizenship_no_place}}</td>
                            <td>नागरिकता पाएको मिति : {{$disabilityIdentityCard->citizenship_no_bs}}</td>
                        </tr>
                        <tr>
                            <td>पेशा : {{$disabilityIdentityCard->occupation->title?? ""}}</td>
                            <td>बावुको नाम: {{$disabilityIdentityCard->father_name}}</td>
                            <td>आमाको नाम : {{$disabilityIdentityCard->mother_name}}</td>
                        </tr>
                        <tr>
                            <td>हजुरबावुको नाम: {{$disabilityIdentityCard->grand_father_name}}</td>
                            <td> प्राप्त गरेको तालिम : {{$disabilityIdentityCard->main_training_name}}</td>
                            <td>पछिल्लो सैक्षिक योग्यता : {{$disabilityIdentityCard->qualification?->label()?? ""}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">संरक्षकको विवरण:</th>
                        </tr>
                        <tr>
                            <td>नाम : {{$disabilityIdentityCard->guardian_name}}</td>
                            <td>नाता : {{$disabilityIdentityCard->relationship->title?? ""}}</td>
                            <td>सम्पर्क नं. :{{$disabilityIdentityCard->phone}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">अपाङ्गताको किसिम :</th>
                        </tr>
                        <tr>
                            <td>क) असक्तताको गम्भीरताका आधारमा अपाङ्गताको वर्गीकरण
                                : {{$disabilityIdentityCard->governmentalDisabilityType->title?? ""}}</td>
                            <td>ख) शारीरिक अङ्ग वा प्रणालीमा भएको समस्या तथा कठिनाइको आधारमा
                                : {{$disabilityIdentityCard->disabilityType->title?? ""}}</td>
                            <td>अपाङ्गताको कारण : {{$disabilityIdentityCard->disabilityReason->title}}</td>
                        </tr>
                        <tr>
                            <td>सहयोग सामाग्री प्रयोग गर्नुपर्ने आबश्यकता
                                : {{$disabilityIdentityCard->is_necessary ==1 ? 'भएको' : 'नभएको'}}</td>
                            @if($disabilityIdentityCard->is_necessary==1 )
                                <td colspan="2">सामग्री विवरण : {{$disabilityIdentityCard->material_description}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>दैनिक क्रियाकलाप गर्न
                                : {{$disabilityIdentityCard->daily_activity ==1 ? 'सक्ने' : 'नसक्ने'}}</td>
                            <td>सहयोग सामग्री प्रयोग गर्ने
                                : {{$disabilityIdentityCard->supporting_material ==1 ? 'गरेको' : 'नगरेको'}}</td>
                            @if($disabilityIdentityCard->supporting_material==1)
                                <td>सहयोग सामग्री : {{$disabilityIdentityCard->material_name}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>अन्य व्यक्तिको सहयोग लिनु पर्ने काम
                                : @foreach($disabilityIdentityCard->helping_task as $task)
                                    {{$task}}{{$loop->last ? '':','}}
                                @endforeach</td>
                            <td>अन्य व्यक्तिको सहयोग बिना गर्न सक्ने दैनिक कार्य
                                : @foreach($disabilityIdentityCard->without_helping_task as $without_task)
                                    {{$without_task}}{{$loop->last ? '':','}}
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <th>अपाङ्गता परिचय पत्र पाएको/नपाएको
                                : @if($disabilityIdentityCard->identity_type== 'receive')
                                    पाएको
                                @else
                                    नपाएको
                                @endif
                            </th>
                        </tr>
                        @if($disabilityIdentityCard->identity_type =='receive')
                            <tr>
                                <td>कार्ड नं. : {{$disabilityIdentityCard->card_no}}</td>
                                <td>पाएको स्थान : {{$disabilityIdentityCard->receiving_body->label()?? ""}}</td>
                                <td>पाएको मिति : {{$disabilityIdentityCard->date_bs}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>नाम : {{$disabilityIdentityCard->provide_detail_full_name}}</td>
                            <td>ठेगाना : {{$disabilityIdentityCard->provide_detail_address}}</td>
                            <td>सम्पर्क नं. : {{$disabilityIdentityCard->provide_detail_phone_no}}</td>
                        </tr>
                        <tr>
                            <td>नागरिकता नं. : {{$disabilityIdentityCard->provide_detail_citizenship_no}}</td>
                            <td>नागरिकता पाएको स्थान
                                : {{$disabilityIdentityCard->provide_detail_citizenship_no_place}}</td>
                            <td> मिति : {{$disabilityIdentityCard->provide_detail_citizenship_no_date}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="identity-card">
                    <div class="border-bottom py-2 px-2 d-flex justify-content-between">
                        <h4 class="font-18">अपाङ्गता परिचयपत्र</h4>
                        <a href="javascript:void(0)"
                           route_action="{{route('identity.admin.disabilityIdentityCard.print',$disabilityIdentityCard)}}"
                           class="btn btn-xs btn-outline-warning printDetail">
                            <i class="fa fa-print">Print</i>

                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pt-5  ">
                            <div class="card px-3 py-2 mx-4 card-rounded"
                                 style="background-color: {{$disabilityIdentityCard->governmentalDisabilityType->color??''}};">
                                <div class="office-header d-flex justify-content-between">
                                    <div>
                                        <img src="{{$officeSetting->logo_url}}" alt="" height="40">
                                    </div>
                                    <div class="">
                                        @foreach($officeHeaders as $header)
                                            <p style="font-size: {{$header->card_font}}rem;color:{{$header->font_color}};text-align: center;">{{$header->title}}                                </p>
                                        @endforeach
                                    </div>
                                    <div>

                                        <img src="{{$disabilityIdentityCard->employeeSignature->red_signature??''}}"
                                             alt="" height="30" id="signature_image"
                                             style="z-index: 5;margin-right: -20px;margin-top:30px;transform: rotate(-10deg);"/>
                                        <img src="{{$disabilityIdentityCard->photo_url}}" alt="" height="40">
                                    </div>
                                </div>

                                <div class="identity text-center card-font-color">
                                    <p class="font-12 ">अपांगता परिचय पत्र</p>
                                </div>
                                <div class="card-font-color">
                                    <p>परिचय पत्रको
                                        प्रकार:{{$disabilityIdentityCard->governmentalDisabilityType?->category->label()??''}}</p>
                                    <p>प. प. नं.: {{$disabilityIdentityCard->card_no}}</p>
                                </div>
                                <div class="card-font-color">
                                    <p>नाम थर : <span>{{$disabilityIdentityCard->name ??''}}</span></p>
                                    <p>ठेगाना :
                                        <span>{{$disabilityIdentityCard->permanentProvince->province??''}}</span>
                                        <span>{{$disabilityIdentityCard->permanentDistrict->district??''}}</span>
                                        <span>{{$disabilityIdentityCard->permanentLocalBody->local_body??''}} </span>
                                    </p>
                                    <p>लिङ्ग :<span> {{$disabilityIdentityCard->gender->label() ??''}}</span></p>
                                    <p>अपांगता प्रकृतिको आधारमा :
                                        <span> {{$disabilityIdentityCard->disabilityType->title??''}}</span>
                                    </p>
                                    <p>गम्भीरता :
                                        <span> {{$disabilityIdentityCard->governmentalDisabilityType->title??''}}</span>
                                    </p>
                                    <p>बाबु आमा वा संरक्षकको नाम थर :
                                        <span> {{$disabilityIdentityCard->father_name??''}}</span></p>
                                    <p>परिचय पत्र प्रमाणित गर्ने : <span> </span></p>
                                    <p>जारी मिति : {{$todayDate}}</p>

                                </div>
                                <div class="row footer-part">
                                    <div class="col-md-4 card-font-color text-center">
                                        <span
                                            style="text-decoration: underline dotted;">{{$disabilityIdentityCard->employeeSignature->name??''}}</span><br>
                                        <p>नाम</p>
                                    </div>
                                    <div class="col-md-4 card-font-color text-center">
                                        <span style="border-bottom: 0.122rem dotted #0b0b0b;position: relative;"><img style="position: absolute;"
                                                src="{{$disabilityIdentityCard->employeeSignature->red_signature??''}}"
                                                alt="{{$disabilityIdentityCard->name??''}}" height="30"
                                                class="signature">
                                        </span><br>
                                        <p>हस्ताक्षर</p>
                                    </div>
                                    <div class="col-md-4 card-font-color text-center">
                                        <span style="text-decoration: underline dotted;">{{$disabilityIdentityCard->employeeSignature->designation??''}}
                                        </span><br>
                                        <p>पद</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 pt-5  ">
                            <div class="card px-3 py-2 mx-3 card-rounded"
                                 style="background-color: {{$disabilityIdentityCard->governmentalDisabilityType->color??''}};">
                                <div class="office-header d-flex justify-content-between">
                                    <div>
                                        <img src="{{$officeSetting->logo_url}}" alt="" height="40">
                                    </div>
                                    <div class="">
                                        @foreach($officeHeaders as $header)
                                            <p style="font-size: {{$header->card_font}}rem;color:{{$header->font_color}};text-align: center;">{{$header->title_en}}</p>
                                        @endforeach
                                    </div>
                                    <div>

                                        {!! QrCode::size(40)->generate($disabilityIdentityCard->name_en??''); !!}
                                    </div>
                                </div>

                                <div class="identity text-center card-font-color">
                                    <p class="font-12 ">Disability Identity Card</p>
                                </div>
                                <div class="card-font-color">
                                    <p>ID Card Type
                                        : {{$disabilityIdentityCard->governmentalDisabilityType?->category??''}}</p>
                                    <p>Card No. : {{$disabilityIdentityCard->card_no}}</p>
                                </div>
                                <div class="card-font-color">
                                    <p>Name of card holder: <span>{{$disabilityIdentityCard->name_en ??''}}</span></p>
                                    <p>Address :
                                        <span>{{$disabilityIdentityCard->permanentProvince->province_en??''}}</span>
                                        <span>{{$disabilityIdentityCard->permanentDistrict->district_en??''}}</span>
                                        <span>{{$disabilityIdentityCard->permanentLocalBody->local_body_en??''}} </span>
                                    </p>
                                    <p>Gender :
                                        <span> {{$disabilityIdentityCard->gender ??''}}</span></p>

                                    <div class="row">
                                        <div class="col-md-8 card-font-color">
                                            <p style="margin-bottom: 0;">Disability On the basis of nature :
                                                <span> {{$disabilityIdentityCard->disabilityType->title_en??''}}</span>
                                            </p>
                                            <p style="margin-bottom: 0;">On the basis of severity :
                                                <span> {{$disabilityIdentityCard->governmentalDisabilityType->title_en??''}}</span>
                                            </p>
                                            <p>Father/Mother/Guardian :
                                                <span> {{$disabilityIdentityCard->father_name_en??''}}</span></p>
                                            <p>ID Card Approved By : <span> </span></p>
                                            <p>Issue Date :<span>
                                                    {{today()->toDateString()}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-between">
                                            <div class="text-center card-font-color">
                                                @foreach($disabilityIdentityCard->fingerPrints->where('finger','left') as $fingerPrint)
                                                    <img src="{{$fingerPrint->finger_image}}" alt=""
                                                         height="48"><br>
                                                    <p>Left</p>
                                                @endforeach

                                            </div>
                                            <div class="text-center card-font-color">
                                                @foreach($disabilityIdentityCard->fingerPrints->where('finger','right') as $fingerPrint)
                                                    <img src="{{$fingerPrint->finger_image}}" alt=""
                                                         height="48"><br>
                                                    <p>Right</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row footer-part">
                                    <div class="col-md-4 card-font-color text-center">
                                        <span
                                            style="text-decoration: underline dotted;">{{$disabilityIdentityCard->employeeSignature->name_en??''}}</span><br>
                                        <p>Name</p>
                                    </div>
                                    <div class="col-md-4 card-font-color text-center">
                                        <span style="border-bottom: 0.122rem dotted #0b0b0b;"><img style="position: absolute;"
                                                src="{{$disabilityIdentityCard->employeeSignature->red_signature??''}}"
                                                alt="{{$disabilityIdentityCard->name??''}}" height="30"
                                                class="signature">
                                        </span><br>
                                        <p>Signature</p>
                                    </div>
                                    <div class="col-md-4 card-font-color text-center">
                                        <span style="text-decoration: underline dotted;">{{$disabilityIdentityCard->employeeSignature->designation_en??''}}
                                        </span><br>
                                        <p>Designation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="identity-card">
                    <div class="border-bottom py-2 px-2">
                        <h4 class="font-18">कागजातहरु </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pt-2">
                            <div class="card mx-2 shadow">
                                <div class="card-header" id="ignore-header">
                                    <a href="{{route('admin.file-url-download',['file_url'=>$disabilityIdentityCard->citizenship_photo])}}">
                                        <i class="fa fa-download"> डाउनलोड</i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <img src="{{$disabilityIdentityCard->citizenship_photo_url?? ""}}"
                                         class="card-image" alt="Image"
                                         width="60%" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-2">
                            <div class="card mx-2 shadow">
                                <div class="card-header" id="ignore-header">
                                    <a href="{{route('admin.file-url-download',['file_url'=>$disabilityIdentityCard->citizenship_photo_certificate])}}">
                                        <i class="fa fa-download"> डाउनलोड</i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <img src="{{$disabilityIdentityCard->citizenship_photo_certificate_url?? ""}}"
                                         class="card-image" alt="Image"
                                         width="60%" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(".printDetail").on("click", function (e) {
                $.ajax({
                    method: "GET",
                    url: $(this).attr("route_action"),
                    success: function (resp) {
                        var print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    }, error: function () {
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush
    @push('style')
        <style>
            .card-font-color > p {
                color: #0b0b0b;
                font-size: 12px;
            }

            .card-font-color > span {
                color: #0b0b0b;
            }
            .identity>p{
                background-color: black;
                text-align: center;
                width: 70%;
                color: white;
                border-radius: 5px;
                margin-left: 70px;
                height: 15px;
            }
        </style>
    @endpush
@endsection


