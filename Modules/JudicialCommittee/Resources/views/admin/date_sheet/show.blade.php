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

                        <li class="breadcrumb-item active">तारिख पर्चा</li>
                    </ol>
                </div>
                <h4 class="page-title">तारिख पर्चा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">तारिख पर्चा</h4>
                        <div class="d-flex justify-content-between">
                            <button class="mx-1 btn btn btn-sm btn-outline-primary" type="button"
                                    onclick="print('printDateSheet')">
                                <i class="fa fa-print"> प्रिन्ट गर्नुहोस</i>
                            </button>
                            <a href="{{ route('admin.judicialCommittee.registeredApplication') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका उजुरी</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="printDateSheet" class="ckEditor">
                        {!! $complaintApplication->getDateSheetTemplate($dateSheet) !!}
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
