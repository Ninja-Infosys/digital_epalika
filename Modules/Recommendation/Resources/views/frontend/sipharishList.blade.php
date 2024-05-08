{{-- @extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="breadcrumb d-flex pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500"
                                href="{{ route('recommendationrecommendation.index') }}">सिफारिस</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <a class="ml-1 text-primary-500">सिफारिस सुची</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="mx-auto col-md-7">
                    <h3 class="text-left fw-bold">सिफारिसहरु</h3>
                    <p class="text-left fs-6 mb-3">तल दिएको सिफारिस फर्म पुरा पढनुहोस् र आफुले चाहेको सिफारिस डाउनलोड
                        गर्नुहोस्।
                    </p>
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr class="fs-5">
                                    <th scope="col">क्र.स.</th>
                                    <th scope="col">सिफारिस शीर्षक</th>
                                    <th scope="col">प्रकाशित मिति</th>
                                    <th scope="col">स्थिति</th>
                                    <th scope="col"> #</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recommendationCreates as $recommendationCreate)
                                    <tr style="vertical-align: middle">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $recommendationCreate->recommendationDetail?->title ?? '' }}</td>
                                        <td>
                                            {{ optional($recommendationCreate->created_at)->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ optional($recommendationCreate)->approved_status }}
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-xs btn-outline-warning " href="{{ route('recommendationrecommendation.recommendationListshow',$recommendationCreate) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('recommendationrecommendation.destroySipharish', $recommendationCreate) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-bs-type="delete" class="btn btn-xs btn-outline-danger"title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}


@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="breadcrumb d-flex pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500"
                                href="{{ route('recommendationrecommendation.index') }}">सिफारिस</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <a class="ml-1 text-primary-500">सिफारिस सुची</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @error('oc_file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('oc_file.*')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="header-title mb-0">सिफारिस सूची</h4>
                                <div class="d-flex flex-wrap align-items-center">
                                    <form action="" method="get" class="me-2">
                                        <input class="form-control form-control-sm filter-form" name="search"
                                            type="search" placeholder="Search" autocomplete="off"
                                            value="{{ old('search', \request('search')) }}">
                                    </form>
                                    @can('recommendation_create')
                                        <a href="{{ route('admin.recommendation.recommendationCreate.create') }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-plus-circle"></i> नयाँ सिफारिस थप्नुहोस
                                        </a>
                                    @endcan
                                    <button class="btn btn-sm mx-1 btn-outline-info waves-effect waves-light collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-filter"> फिल्टर</i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <ul class="nav nav-pills mb-3 nav-bordered nav-justified" role="tablist" style="padding:4px 5px 0 5px;">
                                    @foreach (\Modules\Recommendation\Enums\RecommendationStatusEnum::cases() as $recommendationSettingEnumTab)
                                        <li class="nav-item" role="presentation">
                                            <a  style="border-radius: 0;" class="nav-link  {{ !$loop->first ? '' : 'active' }}"
                                                id="recommendation-{{ $recommendationSettingEnumTab->value }}-tab-btn"
                                                data-bs-toggle="pill"
                                                href="#recommendation-{{ $recommendationSettingEnumTab->value }}-tab"
                                                role="tab"
                                                aria-controls="recommendation-{{ $recommendationSettingEnumTab->value }}-tab"
                                                aria-selected="{{ !$loop->first ?: 'true' }}">{{ $recommendationSettingEnumTab->label() }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content">
                                @foreach (\Modules\Recommendation\Enums\RecommendationStatusEnum::cases() as $recommendationSettingEnumContent)
                                    <!-- Pending Tab Content -->
                                    <div class="tab-pane {{ !$loop->first ? '' : 'active show' }}"
                                        id="recommendation-{{ $recommendationSettingEnumContent->value }}-tab"
                                        role="tabpanel">
                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>क्र.स</th>
                                                    <th>सेवाग्राहीको नाम</th>
                                                    <th>सिफारिस नाम</th>
                                                    <th>सिफारिस स्वीकृति</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($recommendationCreates->where("approved_status",$recommendationSettingEnumContent) as $recommendationCreate)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $recommendationCreate?->mobileUser?->name }}
                                                        </td>
                                                        <td>{{ $recommendationCreate->recommendationDetail?->title ?? '' }}
                                                        </td>
                                                        <td>{{ $recommendationCreate->approved_status?->label() ?? '' }}
                                                        </td>
                                                        <td class="d-flex gap-1">
                                                            
                                                                <a class="btn btn-xs btn-outline-warning " href="{{ route('recommendationrecommendation.recommendationListshow',$recommendationCreate) }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                                        <path
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                                    </svg>
                                                                </a>
                                                                <form action="{{ route('recommendationrecommendation.destroySipharish', $recommendationCreate) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    
                                                                    <button data-bs-type="delete" class="btn btn-xs btn-outline-danger"title="मेटाउनु होस्">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                
                                                           
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन
                                                            !!!
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
