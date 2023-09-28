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
                        <li class="breadcrumb-item">अपाङ्गता परिचय पत्र</li>
                        <li class="breadcrumb-item active">पूर्ण विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्गता परिचय पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">अपाङ्गता परिचय पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-table"  id="printData">
                        <table class="table  table-bordered table-hover table-responsive py-1">
                            <tbody>
                            <tr>
                                <td>
                                    नागरिकता नं. : {{get_nepali_number($disabilityIdentityCard->name)}}
                                </td>
                                <td>
                                    परिचयपत्रको प्रकार
                                    :  ({{$disabilityIdentityCard->governmentalDisabilityType?->category->label()??''}})
                                </td>
                                <td rowspan="4" class="text-center ">
                                    <img src="{{$disabilityIdentityCard->photo_url}}"
                                         alt="{{$disabilityIdentityCard->name}}"
                                         style="object-fit: cover; height: 6rem; width: 6rem; border: 1px solid var(--primary); border-radius: 10px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    आमाको नाम : {{$disabilityIdentityCard->mother_name}}
                                </td>
                                <td>
                                    बाबुको नाम : {{$disabilityIdentityCard->father_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>जन्म मिति : {{get_nepali_number($disabilityIdentityCard->dob)}}</td>
                                <td>  लिङ्ग : {{$disabilityIdentityCard->gender?->label() ?? ''}}</td>
                            </tr>

                            <tr>
                                <td>
                                    ठेगाना  : {{$disabilityIdentityCard->localBody->local_body?? ""}}
                                    -{{$disabilityIdentityCard->ward_no}}
                                    , {{$disabilityIdentityCard->tole}}
                                </td>
                                <td>
                                    अपाङ्गताको प्रकार : {{$disabilityIdentityCard->disabilityType->title?? ""}}
                                </td>
                            </tr>



                            <tr>
                                <th colspan="3" class="text-center">संरक्षकको विवरण</th>
                            </tr>
                            <tr>
                                <td>नाम: {{$disabilityIdentityCard->guardian_name}}</td>
                                <td> नाता : {{$disabilityIdentityCard->relationship->title??''}}</td>
                                <td>फोन : {{$disabilityIdentityCard->phone}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
