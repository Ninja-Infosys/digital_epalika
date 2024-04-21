@extends('frontend.layouts.master')

@section('content')
    @include('admin.inc.file-view')
    <div class="container">
        <div class="row mt-4">


            <div class="col-md-12">
                {{-- @if ($recommendationCreates->approved_status == 'pending') --}}
                <div class="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            {{-- <a href="" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-edit"></i> सम्पादन र समीक्षा गर्नुहोस्
                            </a> --}}
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
                            <a href="{{ route('recommendationrecommendation.index') }}" <a href=""
                                class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> सिफारिस सुची
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main mt-4" id="printData">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-custom">
                                        <thead>
                                            <tr class="fs-5">
                                                <th>विषय</th>
                                                <th>विवरण</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @if ($recommendationCreates->recommendationValues)
                                                @foreach ($recommendationCreates->recommendationValues as $key => $recommendationValue)
                                                    <tr>
                                                        <td>
                                                            {{ $recommendationValue->recommendationFormField->field_name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $recommendationValue->value ?? '' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
                                                    {{ $mobileUser->name }}
                                                </td>

                                                <td>
                                                    {{ $mobileUser?->mobileUserDetail?->gender->label() }}

                                                </td>
                                                <td>
                                                    {{ Auth::guard('mobile-user')->user()->phone ?? '' }}

                                                </td>
                                                <td>

                                                    {{ $mobileUser?->mobileUserDetail?->province?->province }},
                                                    {{ $mobileUser?->mobileUserDetail?->district?->district }}

                                                </td>
                                            </tr>
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
                <div class="mt-4">
                    <div class="card-header">
                        <h4 class="header-title mb-0">फाईलहरु</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            {{-- @if ($recommendationCreates->recommendationFiles)
                                @forelse($recommendationCreates->recommendationFiles as $document)
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-2 pe-0">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-light text-secondary rounded">
                                                                <i class="fa fa-file font-18"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <a href="javascript:void(0);"
                                                            onclick="openFileModal('{{ $document->recommendationDocument->title }}', '{{ $document->file_extension }}','{{ $document->file_url }}')"
                                                            class="text-muted fw-medium">{{ $document->recommendationDocument->title ?? '' }}</a>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="{{ route('admin.file-url-download', ['file_url' => $document->file]) }}"
                                                            class="btn btn-xs btn-outline-primary">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                                @endforelse
                            @endif --}}
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
            @include('admin.inc.file-view')
            <div class="row mt-4">


                <div>
                    {{-- @if ($recommendationCreates->status == 'sent_to_revenue') --}}
                    <div class="row mt-4">
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
                                                $mobileUser &&
                                                    $mobileUser->recommendationCreates &&
                                                    $mobileUser->recommendationCreates->recommendationDetail &&
                                                    $mobileUser->recommendationCreates->recommendationDetail->type != 'free' &&
                                                    $mobileUser->recommendationCreates->recommendationDetail->service_cost)
                                                <tr>
                                                    <td>{{ get_nepali_number($loop->iteration) }}</td>
                                                    <td>सिफारिस दस्तुर</td>
                                                    <td>{{ get_nepali_number($mobileUser->recommendationCreates->recommendationDetail->service_cost) }}
                                                    </td>
                                                    <td>{{ get_nepali_number($mobileUser->recommendationCreates->revenueHeaders->quantity ?? 1) }}
                                                    </td>
                                                    <td>{{ get_nepali_number($total += $mobileUser->recommendationCreates->recommendationDetail->service_cost * 1) }}
                                                    </td>
                                                </tr>
                                            @endif
                                            {{-- @foreach ($recommendationCreates->recommendationDetail->revenueHeaders ?? [] as $key => $revenueHeaders)
                                                    <tr>
                                                        <td>{{ get_nepali_number($loop_iteration = $loop_iteration + 1) }}
                                                        </td>
                                                        <!-- Incrementing key by 1 to start from 1 instead of 0 -->
                                                        <td>{{ $revenueHeaders->title }}</td>
                                                        <!-- Assuming these properties exist, replace them with the actual column names -->
                                                        <td>{{ get_nepali_number($revenueHeaders->amount) }}</td>
                                                        <td>{{ get_nepali_number($revenueHeaders->quantity ?? 1) }}</td>
                                                        <td>{{ get_nepali_number($total += $revenueHeaders->amount * 1) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($recommendationCreates->recommendationDetail->revenueHeaders ?? [] as $key => $revenueHeaders)
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td colspan="2"></td>
                                                        <td>जम्मा</td>
                                                        <td>{{ get_nepali_number($total) }}</td>
                                                    </tr>
                                                @endforeach --}}
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="header-title mb-0">फाईल उपलोड़</h4>
                                            {{-- @if (auth()->check() && auth()->user()->id == $sipharisSetting->checker_id) --}}
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                <i class="fa fa-file"> </i> नयाँ फाईल उपलोड़ गर्नुहोस
                                            </button>
                                            {{-- @endif --}}
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">नयाँ फाईल
                                                                उपलोड़</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @if ($mobileUser->recommendationCreates->file)
                                        <div class="card-body">
                                            <div class="p-1">
                                                <style>
                                                    @page {
                                                        margin-top: 0;
                                                    }
                                                </style>

                                                <iframe src="{{ $mobileUser->recommendationCreates->file_url }}"
                                                    frameborder="0" width="100%" height="600"></iframe>

                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-12 d-flex justify-content-between">
                                                    @if ((auth()->check() && auth()->user()->id == $sipharisSetting->checker_id) || auth()->user()->role_id == 1)
                                                        @if ($recommendationCreates->status = 'sent_to_revenue')
                                                            <form method="POST"
                                                                action="{{ route('admin.recommendation.recommendationCreates.updateStatus', [$recommendationCreates, Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT->label() }}</button>
                                                            </form>
                                                        @endif

                                                        <form method="POST"
                                                            action="{{ route('admin.recommendation.recommendationCreates.updateStatus', [$recommendationCreates, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER->label() }}</button>
                                                        </form>
                                                    @endif

                                                </div>
                                            </div> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>




                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>
                                    {{-- @if ((auth()->check() && auth()->user()->id == $sipharisSetting->approver_id) || auth()->user()->role_id == 1) --}}
                                    @if ($mobileUser->recommendationCreates->status != 'sent_to_revenue')
                                        <x-print-button target-element="print" title="सिफारिस प्रिन्ट" />
                                        {{-- @endif --}}
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="print" class="p-1">
                                    <style>
                                        @page {
                                            margin-top: 0;
                                        }
                                    </style>
                                    {!! $mobileUser->recommendationCreates->resolveTemplate() ?? '' !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    {{-- @if ((auth()->check() && auth()->user()->id == $sipharisSetting->approver_id) || auth()->user()->role_id == 1)
                                    @if ($recommendationCreates->status != 'sent_to_revenue')
                                        <form method="POST"
                                            action="{{ route('admin.recommendation.recommendationCreates.updateStatus', [$recommendationCreates, Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT->label() }}</button>
                                        </form>
                                        <form method="POST"
                                            action="{{ route('admin.recommendation.recommendationCreates.approvedStatus', $recommendationCreates) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary text-white">Sign
                                                & Generate</button>
                                        </form>
                                    @endif
                                @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($mobileUser->recommendationCreates->approved_status == 'approved')
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>

                                        @if ($mobileUser->recommendationCreates->status != 'sent_to_revenue')
                                            <x-print-button target-element="print" title="सिफारिस प्रिन्ट" />
                                        @endif

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="print" class="p-1">
                                        <style>
                                            @page {
                                                margin-top: 0;
                                            }
                                        </style>
                                        {!! $mobileUser->recommendationCreates->resolveTemplate() ?? '' !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
