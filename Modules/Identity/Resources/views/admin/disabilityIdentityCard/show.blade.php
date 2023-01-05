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
                <div class="card-title border-bottom py-2 px-2 d-flex justify-content-between">
                    <h4 class="font-18 ">श्री {{$disabilityIdentityCard->name}} को व्यतिगत विवरण</h4>
                    <div>
                    </div>
                    <a href="javascript:void(0)"
                       route_action=""
                       class="btn btn-xs btn-outline-warning printDetail">
                        <i class="fa fa-print">Print</i>
                    </a>
                </div>

                <div class="profile-table px-1">

                    <table class="table  table-bordered table-hover table-responsive">
                        <tbody>
                        <tr>
                            <td>
                                अपाङ्गता परिचयपत्र नं. : {{$disabilityIdentityCard->card_no}}
                            </td>
                            <td>
                                परिचयपत्रको प्रकार :
                            </td>
                            <td rowspan="2" class="text-center ">
                                <img src="{{$disabilityIdentityCard->photo_url}}"
                                     alt="{{$disabilityIdentityCard->name}}"
                                     style="object-fit: cover; height: 5rem; width: 5rem; border: 1px solid var(--primary); border-radius: 10px;">
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
                            <td>
                                लिंग : {{$disabilityIdentityCard->gender?->label()?? ""}}
                            </td>
                            <td>
                                रक्त समुह : {{$disabilityIdentityCard->blood_group}}
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
                                    <div class="d-flex justify-content-between">
                                        <img src="{{$disabilityIdentityCard->right_finger}}"
                                             alt="{{$disabilityIdentityCard->name}}"
                                             style="object-fit: cover; height: 4rem; width: 4rem; border: 1px solid var(--primary); border-radius: 10px;">
                                        <img src="{{$disabilityIdentityCard->left_finger}}"
                                             alt="{{$disabilityIdentityCard->name}}"
                                             style="object-fit: cover; height: 4rem; width: 4rem; border: 1px solid var(--primary); border-radius: 10px;">
                                    </div>
                                @endif
                            </td>
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
                            <td>जातियता : {{$disabilityIdentityCard->ethnicity->title ?? ""}}</td>

                        </tr>
                        <tr>
                            <td>पेशा : {{$disabilityIdentityCard->occupation->title?? ""}}</td>
                            <td>बावुको नाम: {{$disabilityIdentityCard->father_name}}</td>
                            <td>आमाको नाम : {{$disabilityIdentityCard->mother_name}}</td>
                        </tr>
                        <tr>
                            <td>हजुरबावुको नाम: {{$disabilityIdentityCard->grand_father_name}}</td>
                            <td>रक्त समुह : {{$disabilityIdentityCard->blood_group}}</td>
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
                            <td>क) असक्तताको गम्भीरताका आधारमा अपाङ्गताको वर्गीकरण : {{$disabilityIdentityCard->governmentalDisabilityType->title?? ""}}</td>
                            <td>ख) शारीरिक अङ्ग वा प्रणालीमा भएको समस्या तथा कठिनाइको आधारमा : {{$disabilityIdentityCard->disabilityType->title?? ""}}</td>
                            <td>अपाङ्गताको कारण : {{$disabilityIdentityCard->disabilityReason->title}}</td>
                        </tr>
                        <tr>
                            <td>सहयोग सामाग्री प्रयोग गर्नुपर्ने आबश्यकता : {{$disabilityIdentityCard->is_necessary ==1 ? 'भएको' : 'नभएको'}}</td>
                            @if($disabilityIdentityCard->is_necessary==1 )
                                <td colspan="2">सामग्री विवरण : {{$disabilityIdentityCard->material_description}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>दैनिक क्रियाकलाप गर्न : {{$disabilityIdentityCard->daily_activity ==1 ? 'सक्ने' : 'नसक्ने'}}</td>
                            <td>सहयोग सामग्री प्रयोग गर्ने : {{$disabilityIdentityCard->supporting_material ==1 ? 'गरेको' : 'नगरेको'}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


