@extends('frontend.layouts.master')
@section('content')

    @include('admin.inc.file-view')
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
                        {{-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title mb-0">फाईलहरु</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        @forelse($recommendationCreate->recommendationFiles as $document)
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-2 pe-0">
                                                                <div class="avatar-sm">
                                                                    <span
                                                                        class="avatar-title bg-light text-secondary rounded">
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
                        </div> --}}
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
                        </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="header-title mb-0">सिफारिस प्रिन्ट</h4>
                                    @if ($recommendationCreate->status != 'sent_to_revenue')
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
                                    {!! $recommendationCreate->resolveTemplate() ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <script>
        function printForm() {
            printJS({
                printable: '{{ $targetElement }}',
                type: 'html',
                documentTitle: '{{ $title }}',
                showModal: true,
                header: $('.header-content').html(),
                targetStyles: ['*'],
                css: ['{{ asset('assets/backend/css/bootstrap.min.css') }}',
                    '{{ asset('assets/backend/css/app.min.css') }}'
                ],
                scanStyles: false,
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
            });
        }
    </script> --}}

@endsection
