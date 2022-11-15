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
                <div class="card-body">
                    <div class="mega-menu py-1">
                        <div class="btn-group ">
                            <button class="btn btn-info dropdown-toggle fs-4" type="button" id="defaultDropdown"
                                    data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                नक्सा विवरण <i class="fa fa-angle-down px-1"></i>
                            </button>
                            <ul class="dropdown-menu mega-menu-content" aria-labelledby="defaultDropdown">
                                <li>
                                    @foreach(\Modules\EMap\Enums\NoticeTypeEnum::getAllValues()->chunk(6) as $noticeTypeEnums)
                                        <div class="row">
                                            @foreach($noticeTypeEnums->chunk(2) as $noticeTypeEnum)
                                                <div class="col-md-4 menu_content">
                                                    <ul>
                                                        @foreach($noticeTypeEnum as $value)
                                                            <li>
                                                                <i class="fa fa-angle-right px-1 text-primary"></i>
                                                                <a href="#{{\Illuminate\Support\Str::limit($value,10,'mmm')}}">
                                                                    {{\Modules\EMap\Enums\NoticeTypeEnum::tryFrom($value)->label()}}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endforeach
                                        <div class="row">
                                            <div class="col-md-4 menu_content">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-angle-right px-1 text-primary"></i>
                                                        <a href="#registration-and-fees">
                                                            नक्सा दर्ता तथा दस्तुर सम्बन्धि
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div data-bs-spy="scroll" data-bs-offset="0">
                        @foreach(\Modules\EMap\Enums\NoticeTypeEnum::cases() as $noticeType)
                            <section id="{{\Illuminate\Support\Str::limit($noticeType->value,10,'mmm')}}">
                                <h4 class="mt-2"> {{$noticeType->label()}}</h4>
                                <div
                                    class="card-body mt-2 {{$mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType) ? 'border_black':'border_yellow'}}">
                                    <div>
                                        @if(!$mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))

                                            <i class="fa fa-exclamation-triangle map_template_exclamation"
                                               data-bs-toggle="tooltip" data-bs-placement="right"
                                               title="{{$noticeType->label()}} सेभ भएको छैन"></i>

                                        @endif

                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @if($mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))
                                            <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}"
                                               class="mx-2">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <div class="btn-group mb-3 ">
                                                <i class="fa fa-print text-primary" onclick=" printJS({
                                                        printable: 'print{{\Illuminate\Support\Str::limit($value,10,"pt-".$loop->iteration)}}',
                                                        type: 'html',
                                                        documentTitle: '{{$noticeType->label()}}',
                                                        showModal: true,
                                                        targetStyles: ['*'],
                                                        honorMarginPadding: false,
                                                        modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
                                               })"
                                                ></i>
                                            </div>
                                            @if($noticeType->type() !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::MUNICIPAL)

                                                <form
                                                    action="{{route('emap.admin.map.map-apply.notice.upload.reject',[$mapApply,$noticeType])}}"
                                                    method="POST" class="show_reject_confirm">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="reject_remarks" name="remarks">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        @endif

                                    </div>
                                    <div
                                        id="print{{\Illuminate\Support\Str::limit($value,10,'pt-'.$loop->iteration)}}">
                                        {!!  $mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->data
                                     ??  $mapApply->template_data
                                     ->where('for', \Modules\EMap\Enums\NoticeTypeEnum::tryFrom($noticeType->value))?->first()['data']
                                     ?? ''!!}
                                    </div>

                                </div>
                            </section>
                        @endforeach
                            <section id="registration-and-fees">
                                <h4 class="mt-2"> नक्सा दर्ता तथा दस्तुर सम्बन्धि </h4>
                                <div
                                    class="card-body mt-2 {{!empty($mapApply->mapRegistration) ? 'border_black':'border_yellow'}}">
                                    <div>
                                        @if(empty($mapApply->mapRegistration))

                                            <i class="fa fa-exclamation-triangle map_template_exclamation"
                                               data-bs-toggle="tooltip" data-bs-placement="right"
                                               title="नक्सा दर्ता तथा दस्तुर सेभ भएको छैन"></i>

                                        @endif

                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @if(!empty($mapApply->mapRegistration))
                                            <a href="{{route('emap.admin.map.map-apply.map-registration.edit',[$mapApply,$mapApply->mapRegistration])}}"
                                               class="mx-2">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <div class="btn-group mb-3 ">
                                                <i class="fa fa-print text-primary" onclick=" printJS({
                                                        printable: 'print-registration-fees',
                                                        type: 'html',
                                                        documentTitle: 'नक्सा दर्ता तथा दस्तुर',
                                                        showModal: true,
                                                        targetStyles: ['*'],
                                                        honorMarginPadding: false,
                                                        modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
                                               })"
                                                ></i>
                                            </div>
                                        @else
                                            <a href="{{route('emap.admin.map.map-apply.map-registration.create',$mapApply)}}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div id="print-registration-fees">
                                        @includeIf('emap::admin.map.map-registration.print')
                                    </div>

                                </div>
                            </section>
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

                        <li class="nav-item" role="presentation">
                            <a href="#test" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link" aria-selected="true" role="tab">
                                Test
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#test1" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link" aria-selected="true" role="tab">
                                Test 1
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
                                            ({{$mapApply->organization->organizationDetail->org_name_en ?? $mapApply->organization->userDetail->name_en ?? ''}}
                                            )
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
                        <div class="tab-pane" id="test" role="tabpanel">
                            <div class="d-flex justify-content-end">
                                <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,\Modules\EMap\Enums\NoticeTypeEnum::MAP_ACCEPTANCE])}}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,\Modules\EMap\Enums\NoticeTypeEnum::MAP_ACCEPTANCE])}}"
                                   class="btn btn-primary btn-sm mx-1">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                {!!  $mapApply->template_data->where('for', \Modules\EMap\Enums\NoticeTypeEnum::MAP_ACCEPTANCE)?->first()['data']
                                  ?? ''!!}
                            </div>
                        </div>

                        <div class="tab-pane" id="test1" role="tabpanel">
                            <div class="d-flex justify-content-end">
                                <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,\Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION])}}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,\Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION])}}"
                                   class="btn btn-primary btn-sm mx-1">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                {!!  $mapApply->template_data
                                  ->where('for', \Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION)?->first()['data']
                                  ?? ''!!}
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

