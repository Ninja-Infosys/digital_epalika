@extends('frontend.layouts.master')
@section('content')

    @include('admin.inc.file-view')
    <div class="breadcrumb d-flex pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="background-color:#f5f5f5; border-radius:5px;">
                        <a class="whitespace-nowrap text-primary-500" style="padding-left: 10px;" href="{{ route('recommendationrecommendation.index') }}">सिफारिस</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd"
                                d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <a class="ml-1 text-primary-500">सिफारिस विवरण</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <div class="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="header-title mb-0"></h4>
                                <button class="btn btn-sm btn-info"
                                    onclick="printJS({
                        printable: 'printData',
                        targetStyles: ['*'],
                        ignoreElements:['ignore-header'],
                        type: 'html'
                        })">
                                    <i class="fa fa-print"></i> पूर्ण विवरण प्रिन्ट गर्नुहोस
                                </button>
                            </div>
                            {{-- <a href="{{ route('admin.recommendation.recommendationCreate.index') }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-list"></i> सिफारिस सुची
                                </a> --}}
                        </div>
                    </div>
                </div>
                <div class="main" id="printData">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-bordered table-striped">
                                        <thead>
                                            <th>विषय</th>
                                            <th>विवरण</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($recommendationCreate->recommendationValues as $key => $recommendationValue)
                                                <tr>
                                                    <td>
                                                        {{--                                                {{dd($sipharishCreatedValue->sipharish_form_field_id)}} --}}
                                                        {{ $recommendationValue?->recommendationFormField?->field_name ?? '' }}
                                                    </td>

                                                    <td>
                                                        {{ $recommendationValue->value ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="font-bold">व्यतिगत विवरण</h4>
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-bordered table-striped">
                                        <thead>
                                            <th>पुरा नाम</th>
                                            <th>लिङ्ग</th>
                                            <th>सम्पर्क नं</th>
                                            <th>ठेगाना</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $mobileUser?->name ?? '' }}
                                                </td>

                                                <td>
                                                    {{ $mobileUser?->mobileUserDetail?->gender->label() }}

                                                </td>
                                                <td>
                                                    {{ $mobileUser?->phone ?? '' }}

                                                </td>
                                                <td>
                                                    {{ $mobileUser?->mobileUserDetail?->province?->province ?? '' }},
                                                    {{ $mobileUser?->mobileUserDetail?->district?->district ?? '' }}
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                       
                        @include('admin.inc.file-view')

                    </div>
                    @if ($recommendationCreate->status == 'sent_to_revenue' || $recommendationCreate->status == 'sent_to_approver')
                        <div class="row mt-3">
                          <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="header-title mb-0">बिल प्रिन्ट</h4>
                                    <x-print-button target-element="print" title="सिफारिस प्रिन्ट" />
                                </div>
                            </div>
                            <div class="card-body" id="print">
                                <div class="col-md-12">
                                    <h4 class="text-center fw-bold mt-2">सिफारिस दस्तुर</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm mb-0 table-striped">
                                            <thead>
                                                <th>क्र.स</th>
                                                <th>शीर्षक</th>
                                                <th>रकम</th>
                                                <th>परिमाण</th>
                                                <th>जम्मा</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                    $loop_iteration = 0;
                                                @endphp
                                                @if (
                                                    !empty(
                                                        $recommendationCreate->recommendationDetail->type != 'free' &&
                                                            $recommendationCreate->recommendationDetail->service_cost
                                                    ))
                                                    <tr>
                                                        <td>{{ get_nepali_number($loop_iteration = $loop_iteration + 1) }}
                                                        </td>
                                                        <!-- Incrementing key by 1 to start from 1 instead of 0 -->
                                                        <td>सिफारिस दस्तुर</td>
                                                        <!-- Assuming these properties exist, replace them with the actual column names -->
                                                        <td>{{ get_nepali_number($recommendationCreate->recommendationDetail->service_cost) }}
                                                        </td>
                                                        <td>{{ get_nepali_number($revenueHeaders->quantity ?? 1) }}
                                                        </td>
                                                        <td>{{ get_nepali_number($total += $recommendationCreate->recommendationDetail->service_cost * 1) }}
                                                        </td>
                                                    </tr>
                                                @endif
                                                @foreach ($recommendationCreate->recommendationDetail->revenueHeaders ?? [] as $key => $revenueHeaders)
                                                    <tr>
                                                        <td>{{ get_nepali_number($loop_iteration = $loop_iteration + 1) }}
                                                        </td>
                                                        <!-- Incrementing key by 1 to start from 1 instead of 0 -->
                                                        <td>{{ $revenueHeaders->title }}</td>
                                                        <!-- Assuming these properties exist, replace them with the actual column names -->
                                                        <td>{{ get_nepali_number($revenueHeaders->amount) }}</td>
                                                        <td>{{ get_nepali_number($revenueHeaders->quantity ?? 1) }}
                                                        </td>
                                                        <td>{{ get_nepali_number($total += $revenueHeaders->amount * 1) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($recommendationCreate->recommendationDetail->revenueHeaders ?? [] as $key => $revenueHeaders)
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td colspan="2"></td>
                                                        <td>जम्मा</td>
                                                        <td>{{ get_nepali_number($total) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td colspan="4">रु .</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="header-title mb-0">फाईल उपलोड़</h4>
                                                
                                                @if ($recommendationCreate->status !== 'sent_to_approver')
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fa fa-file"></i> नयाँ फाईल उपलोड गर्नुहोस
                                                </button>
                                            @endif
                                                
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">नयाँ फाईल
                                                                    उपलोड़</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.recommendation.recommendationCreate.fileUpload', $recommendationCreate) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="file"
                                                                            class="form-label">फाईल</label>
                                                                        <input name="file"
                                                                            class="form-control  @error('file') is-invalid @enderror"
                                                                            type="file" id="file" />
                                                                        @error('file')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                   
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">रद्द
                                                                            गर्नुहोस्
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            पेश
                                                                            गर्नुहोस्
                                                                        </button>
                                                                    
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @if ($recommendationCreate->file)
                                            <div class="card-body">
                                                <div class="p-1">
                                                    <style>
                                                        @page {
                                                            margin-top: 0;
                                                        }
                                                    </style>

                                                    <iframe src="{{ $recommendationCreate->file_url }}" frameborder="0"
                                                        width="100%" height="600"></iframe>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-between">
                                                        {{-- @if ((auth()->check() && auth()->user()->id == $sipharisSetting->checker_id) || auth()->user()->role_id == 1)
                                                            @if ($recommendationCreate->status = 'sent_to_revenue')
                                                                <form method="POST"
                                                                    action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT]) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT->label() }}</button>
                                                                </form>
                                                            @endif

                                                            <form method="POST"
                                                                action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER->label() }}</button>
                                                            </form>
                                                        @endif --}}

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>
                                    @if ($recommendationCreate->status != 'sent_to_approver')
                                        <!-- Hide the print button if status is not 'sent_to_approver' -->
                                    @else
                                        <x-print-button target-element="printSipharish" title="सिफारिस प्रिन्ट" />
                                    @endif
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div id="printSipharish" class="p-1">
                                    <style>
                                        @page {
                                            margin-top: 0;
                                        }
                                    </style>
                                    {!! $recommendationCreate->resolveTemplate() ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
