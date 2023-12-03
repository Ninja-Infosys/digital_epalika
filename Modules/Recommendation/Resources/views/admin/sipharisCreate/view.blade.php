@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ सिफारिस</h4>
            </div>
        </div>
    </div>
    @include('admin.inc.file-view');

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                        <a href="{{route('admin.recommendation.sipharish.sipharishCreate.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-bordered table-striped">
                                    <thead>
                                    <th>Field name</th>
                                    <th>Value</th>
                                    </thead>
                                    <tbody>
                                    @foreach($sipharishCreate->SipharishCreatedValues as $key=>$sipharishCreatedValue)
                                        <tr>
                                            <td>
{{--                                                {{dd($sipharishCreatedValue->sipharish_form_field_id)}}--}}
                                                {{$sipharishCreatedValue?->SipharisFormField?->field_name ?? '' }}
                                            </td>

                                            <td>
                                                {{$sipharishCreatedValue->value??''}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">फाईलहरु</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($sipharishCreate->SipharisCreatedDocuments ?? [] as $document)
                            <div class="col-xl-4 col-lg-6">
                                <div class="card shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-2 pe-0">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                          <i class="fa {{getFileIconClass($document->extension)}} font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <a href="javascript:void(0);"
                                                   onclick="openFileModal('{{$document->filename}}', '{{ $document->extension }}', '{{ $document->filename }}')"
                                                   class="text-muted fw-medium">{{basename($document->filename)}}</a>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('admin.file-url-download', ['file_url'=>$document->filename])}}"
                                                   class="btn btn-xs btn-outline-primary">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div>
                        @empty
                            <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                        @endforelse
                    </div> <!-- end row-->
                </div>
            </div>
        </div>
        @include('admin.inc.file-view')
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>
                        <x-print-button
                            target-element="print"
                            title="sipharish"
                        />
                    </div>
                </div>
                <div class="card-body">
                    <div id="print" class="p-1">
                        <style>
                            @page {
                                margin-top: 0;
                            }
                        </style>
                        {!! $sipharishCreate->resolveTemplate() ?? '' !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
