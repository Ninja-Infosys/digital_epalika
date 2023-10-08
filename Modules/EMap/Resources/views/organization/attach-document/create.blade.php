@extends('emap::organization.layouts.master')
@section('content')
    {{--    @push('style')
            --}}{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> --}}{{--
            --}}{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}{{--
            <link rel="stylesheet" href="{{ asset('assets/backend/form/css/formio.builder.min.css') }}">
        @endpush

        @push('scripts')
            <script src="{{ asset('assets/backend/form/js/cash.min.js') }}"></script>
            <script src="{{ asset('assets/backend/form/js/collect.min.js') }}"></script>
            <script src="{{ asset('assets/backend/form/js/formio.full.min.js') }}"></script>
        @endpush--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ $form->title }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $form->title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $form->title }}</h4>
            </div>
        </div>
    </div>
    @foreach ($form->formDataTypes as $formDataType)
        @if ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FILE)
            <x-file-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FORM)
            <x-form-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::PAYMENT)
            <x-bill-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @endif
    @endforeach
@endsection
