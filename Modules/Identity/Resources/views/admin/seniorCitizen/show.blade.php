
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
                        <li class="breadcrumb-item active">जेष्ठ नागरिक</li>
                    </ol>
                </div>
                <h4 class="page-title">जेष्ठ नागरिक विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title border-bottom py-2 px-2 d-flex justify-content-between">
                    <h4 class="font-18 ">श्री {{$seniorCitizenDetail->name}} को व्यतिगत विवरण</h4>
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
                                नाम, थर : {{ $seniorCitizenDetail->name }}
                            </td>
                            <td>
                                नाम, थर (English) : {{ $seniorCitizenDetail->name_en }}
                            </td>
                            <td rowspan="2" class="text-center ">
                                <img src="{{ $seniorCitizenDetail->photo }}"
                                     alt="{{ $seniorCitizenDetail->name }}"
                                     style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                जन्म मिति : {{$seniorCitizenDetail->dob_bs}}
                            </td>
                            <td>
                                कार्ड नं : {{$seniorCitizenDetail->card_no}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                लिंग : {{$seniorCitizenDetail->gender?->label()?? ""}}
                            </td>
                            <td>
                                रक्त समुह : {{$seniorCitizenDetail->blood_group}}
                            </td>
                            <td rowspan="3">
                                <h4 class="font-15 text-center pb-2 text-decoration-underline">
                                    @if($seniorCitizenDetail->finger_print_type === 'finger')
                                        हातको छाप :
                                    @endif
                                </h4>
                                @if($seniorCitizenDetail->finger_print_type !== 'none')
                                    <div class="d-flex justify-content-between">
                                        <img src="{{$seniorCitizenDetail->right_finger}}"
                                             alt="{{$seniorCitizenDetail->name}}"
                                             style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                                             
                                        <img src="{{$seniorCitizenDetail->left_finger}}"
                                             alt="{{$seniorCitizenDetail->name}}"
                                             style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ठेगाना (स्थायी) : {{$seniorCitizenDetail->localBody->local_body?? ""}}
                                -{{$seniorCitizenDetail->ward_no}}
                                , {{$seniorCitizenDetail->tole}}
                            </td>
                        </tr>
                        <tr>
                            <td>नागरिकता नं. : {{$seniorCitizenDetail->citizenship_no}}</td>
                            <td>जारी मिति (वि.स) : {{$seniorCitizenDetail->issue_date_bs}}</td>
                        </tr>
                        <tr>
                            <td>पति/पत्नीको नाम : {{$seniorCitizenDetail->spouse}}</td>
                            <td>पति/पत्नीको नाम (English) : {{$seniorCitizenDetail->spouse_en}}</td>
                        </tr>
                           <tr>
                            <td>बावुको नाम: {{$seniorCitizenDetail->father_name}}</td>
                            <td>बावुको नाम (English): {{$seniorCitizenDetail->father_name_en}}</td>
                           </tr>
                        <tr>
                            <td>आमाको नाम : {{$seniorCitizenDetail->mother_name}}</td>
                            <td>आमाको नाम (English) : {{$seniorCitizenDetail->mother_name_en}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">संरक्षकको विवरण:</th>
                        </tr>
                        <tr>
                            <td>संरक्षकको नाम : {{$seniorCitizenDetail->patrons_name}}</td>
                            <td>संरक्षकको नाम (English) : {{$seniorCitizenDetail->patrons_name_en}}</td>
                        </tr>
                        <tr>
                            <td>ठेगाना :{{$seniorCitizenDetail->patrons_name_address}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">सम्पर्क व्यक्तिको विवरण :</th>
                        </tr>
                        <tr>
                            <td>सम्पर्क व्यक्तिको नाम : {{$seniorCitizenDetail->contact_person_name}}</td>
                            <td>सम्पर्क व्यक्तिको नाम (English) : {{$seniorCitizenDetail->contact_person_name_en}}</td>
                        </tr>
                        <tr>
                            <td>सम्पर्क नं. : {{$seniorCitizenDetail->contact_person_phone}}</td>
                            <td>ठेगाना :{{$seniorCitizenDetail->contact_person_address}}</td>
                        </tr>
                        <tr>
                            <th colspan="3">कुनै प्रकारको रोग छ वा छैन :</th>
                        </tr>
                        <tr>
                            <td>कुनै प्रकारको रोग छ वा छैन ? : {{$seniorCitizenDetail->is_disease ==1 ? 'छ' : 'छैन'}}</td>
                            @if($seniorCitizenDetail->is_disease==1 )
                                <td colspan="2">रोगको नाम : {{$seniorCitizenDetail->disease_name}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>हेरचाह केन्द्रको विवरण : {{$seniorCitizenDetail->description}}</td>
                            <td>हेरचाह केन्द्रको विवरण (English) : {{$seniorCitizenDetail->description_en}}</td>
                        </tr>
                        <tr>
                            <td>कुनै प्रकार को औषधि सेवन गरिएको छ वा छैन ? : {{$seniorCitizenDetail->is_medicine ==1 ? 'छ' : 'छैन'}}</td>
                            @if($seniorCitizenDetail->is_medicine==1 )
                                <td colspan="2">औषधि नाम : {{$seniorCitizenDetail->medicine_name}}</td>
                            @endif
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


