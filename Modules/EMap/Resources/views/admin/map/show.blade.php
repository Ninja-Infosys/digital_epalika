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
                                    @if($applicationFormTypeEnum===\Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_VERIFIED)
                                        @foreach(\Modules\EMap\Enums\NoticeTypeEnum::getAllVerifiedField()->chunk(6) as $noticeTypeEnums)
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

                                    @else
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
                                    @endif
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
                            @if($applicationFormTypeEnum===\Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_VERIFIED)
                                @if($noticeType->showInMapVerification())
                                    <section id="{{\Illuminate\Support\Str::limit($noticeType->value,10,'mmm')}}">
                                        <h4 class="mt-2"> {{$noticeType->label()}}</h4>
                                        <div
                                            class="card-body mt-2 {{$mapApply->applyMapNotices
->pluck('file_type')
->unique()
->contains($noticeType) ? 'border_black':'border_yellow'}}">
                                            <div>
                                                @if(!$mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))

                                                    <i class="fa fa-exclamation-triangle map_template_exclamation"
                                                       data-bs-toggle="tooltip" data-bs-placement="right"
                                                       title="{{$noticeType->label()}} सेभ भएको छैन"></i>

                                                @endif

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                @if($mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))
                                                    @can('mapApplyNotice_access')
                                                        <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}"
                                                           class="mx-2">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('mapApplyNotice_print')
                                                        <div class="btn-group mb-3 ">
                                                            <i class="fa fa-print text-primary"
                                                               onclick="print('print{{\Illuminate\Support\Str::limit($value,10,'pt-'.$loop->iteration)}}')"
                                                            ></i>
                                                        </div>
                                                    @endcan
                                                    @if($noticeType->type() !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::MUNICIPAL)
                                                        <form
                                                            action="{{route('emap.admin.map.map-apply.notice.upload.reject',[$mapApply,$noticeType])}}"
                                                            method="POST"
                                                            class="{{empty($mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->remarks) ? 'show_reject_confirm':'show_accept_confirm'}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" class="reject_remarks" name="remarks">

                                                            @if(empty($mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->remarks))
                                                                @can('mapApplyNoticeReject_access')
                                                                    <i class="fa fa-times mx-2"></i>
                                                                @endcan
                                                            @else
                                                                @can('mapApplyNoticeReject_access')
                                                                    <i class="fa fa-check mx-2"></i>
                                                                @endcan
                                                            @endif

                                                        </form>
                                                    @endif
                                                @else
                                                    @can('mapApplyNotice_access')
                                                        <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    @endcan
                                                @endif

                                            </div>
                                            <div
                                                id="print{{\Illuminate\Support\Str::limit($value,10,'pt-'.$loop->iteration)}}"
                                                class="ckEditor">
                                                {!!  $mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->data
                                             ??  $mapApply->template_data
                                             ->where('for', \Modules\EMap\Enums\NoticeTypeEnum::tryFrom($noticeType->value))?->first()['data']
                                             ?? ''!!}
                                            </div>

                                        </div>
                                    </section>
                                @endif
                            @else
                                <section id="{{\Illuminate\Support\Str::limit($noticeType->value,10,'mmm')}}">
                                    <h4 class="mt-2"> {{$noticeType->label()}}</h4>
                                    <div
                                        class="card-body mt-2 {{$mapApply
                                             ->applyMapNotices
                                             ->pluck('file_type')
                                             ->unique()
                                             ->contains($noticeType) ? 'border_black':'border_yellow'}}">
                                        <div>
                                            @if(!$mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))

                                                <i class="fa fa-exclamation-triangle map_template_exclamation"
                                                   data-bs-toggle="tooltip" data-bs-placement="right"
                                                   title="{{$noticeType->label()}} सेभ भएको छैन"></i>

                                            @endif

                                        </div>
                                        <div class="d-flex justify-content-end">
                                            @if($mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeType))
                                                @can('mapApplyNotice_access')
                                                    <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}"
                                                       class="mx-2">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                @endcan
                                                @can('mapApplyNotice_print')
                                                    <div class="btn-group mb-3 ">
                                                        <i class="fa fa-print text-primary"
                                                           onclick="print('print{{\Illuminate\Support\Str::limit($value,10,'pt-'.$loop->iteration)}}')"
                                                        ></i>
                                                    </div>
                                                @endcan
                                                @if($noticeType->type() !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::MUNICIPAL)
                                                    <form
                                                        action="{{route('emap.admin.map.map-apply.notice.upload.reject',[$mapApply,$noticeType])}}"
                                                        method="POST"
                                                        class="{{empty($mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->remarks) ? 'show_reject_confirm':'show_accept_confirm'}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" class="reject_remarks" name="remarks">

                                                        @if(empty($mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->remarks))
                                                            @can('mapApplyNoticeReject_access')
                                                                <i class="fa fa-times mx-2"></i>
                                                            @endcan
                                                        @else
                                                            @can('mapApplyNoticeReject_access')
                                                                <i class="fa fa-check mx-2"></i>
                                                            @endcan
                                                        @endif

                                                    </form>
                                                @endif
                                            @else
                                                @can('mapApplyNotice_access')
                                                    <a href="{{route('emap.admin.map.map-apply.notice.upload.get-template-data',[$mapApply,$noticeType->value])}}">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                @endcan
                                            @endif

                                        </div>
                                        <div
                                            id="print{{\Illuminate\Support\Str::limit($value,10,'pt-'.$loop->iteration)}}"
                                            class="ckEditor">
                                            {!!  $mapApply->applyMapNotices->where('file_type',$noticeType)?->first()->data
                                         ??  $mapApply->getSpecificTemplateData($noticeType)
                                         ?? ''!!}
                                        </div>

                                    </div>
                                </section>
                            @endif

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
                                            <i class="fa fa-print text-primary"
                                               onclick=" printJS({
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

    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/print.js')}}"></script>
        <script>
            $('.show_reject_confirm').click(function (event) {
                const form = $(this).closest("form");
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
                            $(".reject_remarks").val(data.value)
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

        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush
@endsection

