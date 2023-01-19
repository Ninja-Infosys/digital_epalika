@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.judicialCommittee.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">तारिख भरपाई</li>
                    </ol>
                </div>
                <h4 class="page-title">तारिख भरपाई</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">तारिख भरपाई</h4>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn btn-sm btn-outline-primary" type="button"
                                    onclick="print('printDateCompensation')">
                                <i class="fa fa-print"> प्रिन्ट गर्नुहोस</i>
                            </button>
                            @can('dateCompensation_edit')
                                <a data-bs-type="edit" href="{{ route('admin.judicialCommittee.complaintApplication.dateCompensation.create', $complaintApplication) }}"
                                   class="btn btn-sm btn-outline-warning mx-1 {{get_setting('Pin')?'confirm_pin':''}}">
                                    <i class="fa fa-edit"> सम्पादन गर्नुहोस्</i>
                                </a>
                            @endcan
                            <a href="{{ route('admin.judicialCommittee.registeredApplication') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका उजुरी</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="printDateCompensation" class="ckEditor">
                        {!! $complaintApplication->getSpecificTemplateData(
                            \Modules\JudicialCommittee\Enums\JudicialTemplateTypeEnum::DATE_COMPENSATION,
                        ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/backend/editor/ckEditor/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/editor/ckEditor/js/print.js') }}"></script>


        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush
@endsection
