@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">सिफारिस विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">नयाँ सिफारिस विवरण थप्नुहोस्</h4>
                        <a href="{{ route('admin.recommendation.setting.recommendationDetail.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस विवरण सुची
                        </a>
                    </div>
                </div>
                <div class="card-body px-0">
                    <form action="{{ route('admin.recommendation.setting.recommendationDetail.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="recommendation_category_id" class="form-label">सिफारिसको प्रकार *</label>
                                    <select id="recommendation_category_id" name="recommendation_category_id" class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach ($recommendationCategories as $recommendationCategory)
                                            <option {{ old('recommendation_category_id') == $recommendationCategory->id ? 'selected' : '' }}
                                                    value="{{ $recommendationCategory->id }}">{{ $recommendationCategory->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('recommendation_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="form-label">शिर्षक *</label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="शिर्षक" required />
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="title_en" class="form-label">शिर्षक (अँग्रेजीमा) *</label>
                                    <input type="text" name="title_en" value="{{ old('title_en') }}"
                                           class="form-control @error('title_en') is-invalid @enderror" id="title_en"
                                           placeholder="शिर्षक (अँग्रेजीमा)" required />
                                    @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="type" class="form-label">सिफारिस दस्तुरको किसिम *</label>
                                    <select id="type" name="type" class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach (\Modules\Recommendation\Enums\RecommendationTypeEnum::cases() as $case)
                                            <option {{ $case->value == old('type') ? 'selected' : '' }}
                                                    value="{{ $case->value }}">{{ $case->label() }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="revenueHeaders" class="form-label">सिफारिस दस्तुरको प्रकार *</label>
                                    <select id="revenueHeaders" name="revenueHeaders[]" class="form-select" required multiple data-toggle="select2">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach ($revenueHeaders as $revenueHeader)
                                            <option
                                                    value="{{ $revenueHeader['id'] }}">{{$revenueHeader->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('revenueHeaders')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('revenueHeaders.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="service_cost" class="form-label">सिफारिस लाग्ने दस्तुर *</label>
                                    <input type="text" name="service_cost" value="{{ old('service_cost') }}"
                                           class="form-control @error('service_cost') is-invalid @enderror" id="service_cost"
                                           placeholder="सिफारिस लाग्ने दस्तुर" required />
                                    @error('service_cost')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="general_time" class="form-label">लाग्ने दिन *</label>
                                    <input type="number" name="general_time" value="{{ old('general_time') }}"
                                           class="form-control @error('general_time') is-invalid @enderror" id="general_time"
                                           placeholder="लाग्ने दिन" required />
                                    @error('general_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="surrogate_time" class="form-label">सर्जमिनको हकमा लाग्ने दिन *</label>
                                    <input type="number" name="surrogate_time" value="{{ old('surrogate_time') }}"
                                           class="form-control @error('surrogate_time') is-invalid @enderror" id="surrogate_time"
                                           placeholder="सर्जमिनको हकमा लाग्ने दिन" required />
                                    @error('surrogate_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_citizenship_required" name="is_citizenship_required" value="1" {{ old('is_citizenship_required')==1 ? 'checked':'' }}>
                                    <label for="is_citizenship_required"> नागरिकता प्रमाणपत्र (लाग्ने/नलाग्ने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_applicable_org" name="is_applicable_org" value="1" {{ old('is_applicable_org')==1 ? 'checked':'' }}>
                                    <label for="is_applicable_org">संस्थागतंलाई लागु (हुने/नहुने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_applicant_self" name="is_applicant_self" value="1" {{ old('is_applicant_self')==1 ? 'checked':'' }}>
                                    <label for="is_applicant_self">निवेदक आफु बाहेक अन्य (हुने/नहुने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_permission_required" name="is_permission_required" value="1" {{ old('is_permission_required')==1 ? 'checked':'' }}>
                                    <label for="is_permission_required">मञ्जुरीनामाको विवरण आवश्यक (पर्ने/नपर्ने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_taxcode_required" name="is_taxcode_required" value="1" {{ old('is_taxcode_required')==1 ? 'checked':'' }}>
                                    <label for="is_taxcode_required">करदाता हुनु (पर्ने/नपर्ने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="add_land_diff_locations" name="add_land_diff_locations" value="1" {{ old('add_land_diff_locations')==1 ? 'checked':'' }}>
                                    <label for="add_land_diff_locations">अन्य स्थानीय स्थरको कित्ता थप्न (मिल्ने नमिल्ने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="checkbox" id="is_applicable_on_recommendation" name="is_applicable_on_recommendation" value="1" {{ old('is_applicable_on_recommendation')==1 ? 'checked':'' }}>
                                    <label for="is_applicable_on_recommendation">ई-सिफारिसबाट निवेदन गर्न (मिल्ने नमिल्ने) </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="order" class="form-label">क्रमागत *</label>
                                    <input type="number" name="order" value="{{ old('order') }}"
                                           class="form-control @error('order') is-invalid @enderror" id="order"
                                           placeholder="क्रमागत" required />
                                    @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="recommendationDocuments" class="form-label">आवश्यक कागजातहरु *</label>
                                    <select id="recommendationDocuments" name="recommendationDocuments[]" class="form-select" required multiple data-toggle="select2">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach ($recommendationDocuments as $recommendationDocument)
                                            <option
                                                value="{{ $recommendationDocument['id'] }}">{{$recommendationDocument->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('recommendationDocuments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('recommendationDocuments.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="description" class="form-label">सिफारिस विवरण</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
