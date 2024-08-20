@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                    </ol>
                </div>
                @if ($recommendationCreate->approved_status == 'approved')
                    <h4 class="page-title"> सिफारिस</h4>
                @else
                    <h4 class="page-title">नयाँ सिफारिस</h4>
                @endif

            </div>
        </div>
    </div>
    {{--    @include('admin.inc.file-view')--}}

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="header-title">प्रयोगकर्ताको विवरण</h4>
                    </div>
                    <div class="d-flex justify-content-between gap-1">
                        <form method="POST"
                              action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT]) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::REJECT->label() }}</button>
                        </form>
                        <a href="{{ route('admin.recommendation.recommendationCreate.edit', $recommendationCreate) }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-edit"></i> सम्पादन र समीक्षा गर्नुहोस्
                        </a>
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
                        <a href="{{ route('admin.recommendation.recommendationCreate.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
            </div>
            <div class="main" id="printData">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
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
                                                {{ $recommendationValue?->recommendationFormField?->field_name ?? '' }}
                                            </td>
                                            <td>
                                                <div>
                                                    @if($recommendationValue->type == 'image')
                                                    @elseif($recommendationValue->type == 'table')
                                                    @else
                                                        {{ $recommendationValue->value ?? '' }}
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
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
                                            {{ $recommendationCreate?->mobileUser?->name ?? '' }}
                                        </td>

                                        <td>
                                            {{$recommendationCreate?->mobileUser?->mobileUserDetail?->gender?->label() }}

                                        </td>
                                        <td>
                                            {{ $recommendationCreate?->mobileUser?->phone ?? '' }}

                                        </td>
                                        <td>
                                            {{ $recommendationCreate?->mobileUser?->mobileUserDetail?->province?->province ?? ''}}
                                            ,
                                            {{ $recommendationCreate?->mobileUser?->mobileUserDetail?->district?->district ?? '' }}
                                        </td>
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
                                    <h4 class="header-title mb-0">फाईलहरु</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        @forelse($recommendationCreate->recommendationFiles as $document)
                                            <div class="col-xl-3 col-lg-6">
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
                                                                   onclick="openFileModal('{{ $document?->recommendationDocument?->title }}', '{{ $document?->file_extension }}','{{ $document?->file_url }}')"
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
                        </div>
                        @include('admin.inc.file-view')
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                @if ($recommendationCreate->approved_status->value == 1
                                        && auth()->check()
                                        && (auth()->user()->id == $recommendationSetting->checker_id
                                        || auth()->user()->role_id == 1)
                                )
                                    <form method="POST"
                                          action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_REVENUE]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-sm btn-primary text-white">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_REVENUE->label() }}</button>
                                    </form>
                                    <form method="POST"
                                          action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-sm btn-success">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER->label() }}</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($recommendationCreate->approved_status->value > 1)

                    <div class="row mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="header-title mb-0">बिल प्रिन्ट</h4>
                                <button class="btn btn-sm bg-transparent" style="color: #6f63e3; border: 1px solid #6f63e3;" onclick="printJS({
                                    printable: 'printBill',
                                    targetStyles: ['*'],
                                    ignoreElements: ['ignore-header'],
                                    type: 'html',

                                })">
                                    <i class="fa fa-print"></i> प्रिन्ट गर्नुहोस
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="printBill">
                            <div class="col-md-12">
                                {!! letterHead() !!}
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
                                        @endphp
                                        @if (
                                            !empty(
                                                $recommendationCreate->recommendationDetail->type != 'free' &&
                                                    $recommendationCreate->recommendationDetail->service_cost
                                            ))
                                            <tr>
                                                <td>{{ get_nepali_number(1) }}
                                                </td>
                                                <!-- Incrementing key by 1 to start from 1 instead of 0 -->
                                                <td>सिफारिस दस्तुर</td>
                                                <!-- Assuming these properties exist, replace them with the actual column names -->
                                                <td>
                                                    रु. {{ get_nepali_number($recommendationCreate?->recommendationDetail?->service_cost) }}
                                                </td>
                                                <td>{{ get_nepali_number(1) }}</td>
                                                <td>
                                                    रु. {{ get_nepali_number($total += $recommendationCreate?->recommendationDetail?->service_cost * 1) }}
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($recommendationCreate->recommendationDetail->revenueHeaders ?? [] as $key => $revenueHeaders)
                                            <tr>
                                                <td>{{ get_nepali_number($loop->iteration + 1) }}
                                                </td>
                                                <!-- Incrementing key by 1 to start from 1 instead of 0 -->
                                                <td>{{ $revenueHeaders->title }}</td>
                                                <!-- Assuming these properties exist, replace them with the actual column names -->
                                                <td>रु. {{ get_nepali_number($revenueHeaders?->amount) }}</td>
                                                <td>{{ get_nepali_number(1) }}</td>
                                                <td>
                                                    @php($total+=$revenueHeaders?->amount)
                                                    रु. {{ get_nepali_number($revenueHeaders?->amount * 1) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="text-center fw-bold">जम्मा</td>
                                            <td>रु. {{ get_nepali_number($total) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <x-convert-to-word id="total_amount"
                                                                   number="{{$total }}"/>
                                                मात्र
                                            </td>
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
                                            @if ($recommendationCreate->approved_status->value == 2 && auth()->check() && auth()->user()->id == $recommendationSetting?->checker_id)
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fa fa-file"> </i> नयाँ फाईल उपलोड़ गर्नुहोस
                                                </button>
                                            @endif
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                 data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">नयाँ
                                                                फाईल
                                                                उपलोड़</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
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
                                                                           type="file" id="file"/>
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
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    @if ($recommendationCreate->approved_status->value == 2 && (auth()->check() && auth()->id() == $recommendationSetting?->checker_id || auth()->user()->role_id == 1))
                                                        <form method="POST"
                                                              action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-success">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_APPROVER->label() }}</button>
                                                        </form>
                                                    @endif
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
                                <x-print-button target-element="recommendation-print" title="सिफारिस प्रिन्ट"/>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="recommendation-print" class="p-1">
                                <style>
                                    @page {
                                        margin-top: 0;
                                    }
                                </style>
                                {!! $recommendationCreate->resolveTemplate($recommendationSetting) ?? '' !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                @if ($recommendationCreate->approved_status->value == 3 && (auth()->check() && auth()->user()->id == $recommendationSetting?->approver_id || auth()->user()->role_id == 1))
                                    <form method="POST"
                                          action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::PENDING]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-sm btn-info text-white">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::PENDING->label() }}</button>
                                    </form>
                                    <form method="POST"
                                          action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_REVENUE]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-sm btn-primary">{{ Modules\Recommendation\Enums\RecommendationStatusEnum::SENT_TO_REVENUE->label() }}</button>
                                    </form>
                                    <form method="POST"
                                          action="{{ route('admin.recommendation.recommendationCreate.updateStatus', [$recommendationCreate, Modules\Recommendation\Enums\RecommendationStatusEnum::COMPLETED]) }}">
                                    @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success text-white">
                                            {{ Modules\Recommendation\Enums\RecommendationStatusEnum::COMPLETED->label() }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
