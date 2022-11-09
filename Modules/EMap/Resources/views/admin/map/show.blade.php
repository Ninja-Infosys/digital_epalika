@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item ">संगठन</li>
                        <li class="breadcrumb-item ">नक्सा</li>
                        <li class="breadcrumb-item active">नक्सा विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="card mb-1">
                            <div class="card-header" id="headingTwo">
                                <h5 class="m-0">
                                    <a class="text-dark collapsed" data-bs-toggle="collapse" href="#mapNavigationSelect"
                                       aria-expanded="false">
                                        <button class="btn btn-sm btn-secondary">main-title</button>
                                    </a>
                                </h5>
                            </div>
                            <div id="mapNavigationSelect" class="collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordion" style="">
                                <div class="card-body">
                                    <a href="#1" class="btn btn-sm btn-primary my-1">navigation 1</a>
                                    <a href="#2" class="btn btn-sm btn-primary my-1">navigation 2</a>
                                    <a href="#3" class="btn btn-sm btn-primary my-1">navigation 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <h4>शिर्षक नाम:</h4>
                            <div class="btn-group mb-3 ">
                                <button class="bg-success text-white" onclick=" printJS({
                printable: 'printData',
                type: 'html',
                documentTitle: 'ufjgjufgjh',
                showModal: true,
                css: '{{asset('assets/backend/css/print.css')}}',
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'})"><i class="fa fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                    <div data-bs-spy="scroll" data-bs-offset="0">
                        <section id="1" style="height: 800px; background-color: red;">1</section>
                        <section id="2" style="height: 900px; background-color: blue;">2</section>
                        <section id="3" style="height: 1000px; background-color: green;">3</section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्सा सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#application_tab" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link active" aria-selected="true" role="tab">
                                आवेदन
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#detail-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                विवरण
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#map-registration-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                दस्तुर तथा दर्ता
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#notice-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                सूचना
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="#rejected_application_tab" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                खारेज भएका आवेदन
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#organization_tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                आवेदन भर्ने संस्था
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="application_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach($mapApply->applyMapNotices->where('type',\Modules\EMap\Enums\FileTypeEnum::APPLICATION)->whereNull('rejected_at') as $application)
                                    <div class="col">
                                        <div class="card">
                                            <iframe class="card-img-top img-fluid" height="500" frameborder="0"
                                                    src="{{$application->file_url}}"></iframe>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$application->file_type->label() ?? ''}}</h4>
                                                <p class="card-text mt-2">
                                                <form
                                                    action="{{route('emap.admin.map.mapApply.reject',[$mapApply,$application])}}"
                                                    method="POST" class="show_reject_confirm">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="reject_remarks" name="remarks">
                                                    <button type="submit"
                                                        @class([
                                                            "btn",
                                                            "btn-danger"=>empty($application->rejected_at),
                                                            "btn-primary"=>!empty($application->rejected_at),
                                                            "btn-sm"])>
                                                        {{empty($application->rejected_at)? 'Reject Application' : 'Accept Application'}}
                                                    </button>
                                                </form>
                                                </p>
                                                <p class="card-text">
                                                    <small
                                                        class="text-muted">{{$application->created_at->diffForHumans() ?? ''}}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane show" id="detail-tab" role="tabpanel">
                            @includeIf('emap::inc.map_show')
                        </div>

                        <div class="tab-pane" id="map-registration-tab" role="tabpanel">
                            @includeIf('emap::admin.map.map-registration.print')
                        </div>


                        <div class="tab-pane" id="notice-tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach($mapApply->applyMapNotices->where('type','!=',\Modules\EMap\Enums\FileTypeEnum::APPLICATION)->whereNull('rejected_at') as $applyMapNotice)
                                    <div class="col">
                                        <div class="card">
                                            <iframe class="card-img-top img-fluid" height="500" frameborder="0"
                                                    src="{{$applyMapNotice->file_url}}"></iframe>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$applyMapNotice->file_type->label() ?? ''}}</h4>
                                                <p class="card-text mt-2">
                                                </p>
                                                <p class="card-text">
                                                    <small
                                                        class="text-muted">{{$applyMapNotice->created_at->diffForHumans() ?? ''}}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="tab-pane" id="rejected_application_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach($mapApply->applyMapNotices->where('type',\Modules\EMap\Enums\FileTypeEnum::APPLICATION)->whereNotNull('rejected_at') as $application)
                                    <div class="col">
                                        <div class="card">
                                            <iframe class="card-img-top img-fluid" height="500" frameborder="0"
                                                    src="{{$application->file_url}}"></iframe>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$application->file_type->label() ?? ''}}</h4>
                                                <p class="card-text mt-2">
                                                <form
                                                    action="{{route('emap.admin.map.mapApply.reject',[$mapApply,$application])}}"
                                                    method="POST" class="show_accept_confirm">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        @class([
                                                            "btn",
                                                            "btn-danger"=>empty($application->rejected_at),
                                                            "btn-success"=>!empty($application->rejected_at),
                                                            "btn-sm"])>
                                                        {{empty($application->rejected_at)? 'Reject Application' : 'Accept Application'}}
                                                    </button>
                                                </form>
                                                </p>
                                                <p class="card-text">
                                                    <small
                                                        class="text-muted">{{$application->created_at->diffForHumans() ?? ''}}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane" id="organization_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                <table class="table table-sm mb-0 table-striped table-hover">
                                    <tr>
                                        <th>नाम</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_name_ne ?? $mapApply->organization->userDetail->name_ne ?? ''}}
                                            ({{$mapApply->organization->organizationDetail->org_name_en ?? $mapApply->organization->userDetail->name_en ?? ''}})
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>इमेल</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_email ?? $mapApply->organization->userDetail->email ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>फोन</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_contact ?? $mapApply->organization->userDetail->phone ??''}}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <th>ठेगाना</th>--}}
{{--                                        <td>{{$mapApply->organization->organizationDetail->localBody->local_body ?? ''}}--}}
{{--                                            -{{$mapApply->organization->organizationDetail->ward ?? ''}}--}}
{{--                                            , {{$mapApply->organization->organizationDetail->tole ?? ''}}--}}
{{--                                            , {{$mapApply->organization->organizationDetail->district->district ?? ''}}--}}
{{--                                            , {{$mapApply->organization->organizationDetail->province->province ?? ''}}</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td colspan="2">
                                            <a href="{{route('emap.admin.organization.show',$mapApply->organization_id)}}"
                                               class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"> पुरा विवरण हेर्नुहोस</i>
                                            </a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सूचनाहरु</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.office-letter',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">संघियारको नाममा जारी भएको सूचना</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.notice-letter',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">१५ दिने सूचना टाँस सम्बन्धमा</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.sendingDetails',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">{{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_SENDING_DETAILS->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.revisedSuperStructurePermit',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT->label()}}</a>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रमाणपत्रहरु</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.level',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">प्लिन्थ लेभलसम्म निर्माण कार्यको ईजाजत पत्र</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.superstructure',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">{{\Modules\EMap\Enums\NoticeTypeEnum::PERMANENT_BUILDING_PERMIT_FOR_SUPERSTRUCTURE->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.building-construction-completion-certificate',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">{{\Modules\EMap\Enums\NoticeTypeEnum::BUILDING_COMPLETION_CERTIFICATE->label()}}</a>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रतिबेदन</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.technician-notice',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">प्राविधिक प्रतिवेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.plinth-level-supervisor-report',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">प्लिन्थ लेभलसम्मको निर्माणको सुपरिवेक्षण
                        प्रतिवेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.first-phase-consultant-report',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">प्रथम चरणको कार्य सम्पन्नको परामर्शदाताको
                        प्रतिबेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.first-phase-technician-report',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">प्रथम चरणको कार्य
                        सम्पन्नको {{config('applicationDetail.place')}} {{config('applicationDetail.office_short_name')}}
                        प्राबिधिकको प्रतिबेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.second-phase-consultant-report',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">दोस्रो चरणको कार्य सम्पन्नको परामर्शको प्राविधिकको
                        प्रतिवेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.second-phase-technician-report',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">दोस्रो चरणको कार्य
                        सम्पन्नको {{config('applicationDetail.place')}} {{config('applicationDetail.office_short_name')}}
                        प्रबिधिकको प्रतिवेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.supervisor',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">सुपरस्ट्रक्चर सम्म निर्माणको सुपरिवेक्षण
                        प्रतिवेदन</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मुचुल्का</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.map-arrears',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">नक्सा पासको लागि १५ दिने टाँस मुचुल्का</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.land-arrears',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">सरजमिन मुचुल्का</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सम्झौता</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.ch-agreement',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">सम्झौता पत्र (सुपरिवेक्षक/कन्सल्टेन्ट तथा घरधनी
                        बीच)</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.agent-agreement',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1">सम्झौता पत्र (घरधनी र निर्माणकर्मी/ठेकेदार)</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">टिप्पणी र आदेश</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.permission-letter',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.superstructure-permission',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_SUPERSTRUCTURE_PERMIT->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.constructionCompletionCertificate',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_CONSTRUCTION_COMPLETION_CERTIFICATE->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.revisedSuperStructurePermitOrder',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT_ORDER->label()}}</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.houseMapNamsari',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::HOUSE_MAP_NAMSARI->label()}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">वारेसनामा</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.heir',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::HEIR->label()}}</a>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मन्जुरीनामा</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.permission',$mapApply)}}"
                       class="btn btn-sm btn-outline-primary mb-1"> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION->label()}}</a>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('.show_reject_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();

                swal.fire({

                    title: "Are You Sure to reject this application ? ",
                    input: 'text',
                    inputLabel: 'Reject Reason',
                    inputPlaceholder: 'Reject Reason',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    confirmButtonText: "Reject",
                    dangerMode: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Please enter reject reason !'
                        }
                    }

                })
                    .then((data) => {
                        if (data.value) {
                            $("#reject_remarks").val(data.value)
                            form.submit();
                        }
                    });
            });
            $('.show_accept_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();

                swal.fire({

                    title: "Are You Sure to accept this application ? ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    confirmButtonText: "Accept",
                    dangerMode: true,

                })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
@endsection

