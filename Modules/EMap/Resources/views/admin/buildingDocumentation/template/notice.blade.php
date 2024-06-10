@extends('admin.layouts.master')

@section('content')
    <div class="row m-3">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">अभिलेखीकरण</li>
                    </ol>
                </div>
                <h4 class="page-title">७ दिने सूचना</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">७ दिने सूचना </h4>
                        <div class="d-flex justify-content-between">
                            <x-print-button title="७ दिने सूचना" target-element="printData" />

                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका अभिलेखीकरण</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div id="printData">

                            <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                                <tbody>
                                <tr>
                                    <td style="width:25%"><img alt="Office Logo"
                                                               src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                                               style="height:100px; width:130px" /></td>
                                    <td style="text-align:center; vertical-align:middle; width:50%">
                                        <div><span style="font-size:14px"><strong>अनुसूची-३</strong></span><br />
                                            <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग
                                                सम्वन्धित</strong></span>
                                        </div>

                                        <div style="font-size:19px; line-height:1.2">{{ $officeSetting->localBody->local_body ?? '' }} </div>

                                        <div style=" font-size:19px; line-height:1.2">{{$buildingDocumentation->former_ward_no ?? ''}} नं वडा कार्यालय
                                        </div>
                                        <div style="font-size:19px; line-height:1.2">.............................
                                        </div>


                                    </td>


                                    <td style="width:25%">&nbsp;</td>
                                    <td style="width:25%">&nbsp;</td>
                                </tr>

                                </tbody>
                            </table>

                            <div class="row sub-title mt-3">
                                <div class="col-sm sub-title1">
                                    <p class=" fw-bold lh-1">पत्र संख्या : ................</p>
                                    <p class="mt-1  fw-bold lh-1">चलानी नम्बर : ...............</p>
                                </div>
                                <div class="col-sm sub-title2 text-end ml-auto">
                                    <p class=" fw-bold lh-1" style="text-align: end;">मिती :
                                        ......................</p>
                                </div>
                            </div>
                            <p class="fw-bold fs-5 text-center my-3">
                                ७ दिने सूचना ।
                            </p>
                            <p style="font-size:18px; text-align: justify">
                        <span class="dashed-bottom">
                            {{ $buildingDocumentation?->province?->province ?? '' }},{{ $buildingDocumentation?->district?->district ?? '' }},{{ $buildingDocumentation?->localBody?->local_body ?? '' }}-{{ get_nepali_number($buildingDocumentation->ward_no ?? '') }}
                        </span> वस्ने श्री  <span class="dashed-bottom">{{ $buildingDocumentation->applicant_name }} </span>ले बागचौर नगरपालिका वडा नं
                                <span class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->ward_no ?? '') }} </span>को साबिक  <span class="dashed-bottom">{{$buildingDocumentation->former_local_body ?? ''}} </span>गाविस वडा नं  <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->former_ward_no)}}</span>
                                कित्ता नं  <span class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->plot_no ?? '') }}</span> क्षेत्रफल  <span class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->area ?? '') }} </span> को<br>

                                @foreach ($buildingDocumentation->neighbours as $neighbour)
                                    {{$neighbour->direction->label()}}  <span class="dashed-bottom">{{$neighbour->neighbour_name}}</span><br>
                                @endforeach

                                यति चार किल्ला भित्रको जग्गामा तपशिलं बमोजिमको निर्माण भए अनुसारको घर अभिलेखिकरण गरी पाउँ भनि
                                मिति  <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->application_date ?? '')}}</span> मा निवेदन दिनु भएकोले सो घरको साध संधियार कोहि कसैलाइ पिरमर्मा परेको भए
                                आफुलाइ परेको सबै विवरण यो सूचना प्रकाशित भएको मितिले ७ दिन भित्र वडा कार्यालयमा उजुर बाजुर
                                गर्नुहुन यो सुचना प्रकाशित गरिएको छ । म्यादभित्र पर्न नआएका उजुर प्रति कुनै कारबाही गरिने छैन
                                ।<br>
                            </p>
                            <p class="text-decoration-underline fw-bold fs-5">तपशिल</p>
                            <p>१. घरको किसिम : <span class="dashed-bottom">{{$buildingDocumentation->building_category ?? ''}}</span><br>
                                २. लम्बाई : <span class="dashed-bottom">{{$buildingDocumentation->length ?? ''}}</span> <br>
                                ३. चौडाई :  <span class="dashed-bottom">{{$buildingDocumentation->breadth ?? ''}}</span><br>
                                ४. उचाई : <span class="dashed-bottom">{{$buildingDocumentation->height ?? ''}}</span> <br>
                                ५. अन्य :  <span class="dashed-bottom">{{$buildingDocumentation->other ?? ''}}</span><br></p>
                            <div class="col-sm text-end font-weight-bold">
                                <p class="ml-4">....................<br>वडा अध्यक्ष</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
