@extends('emap::organization.layouts.master')
@section('content')
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">नयाँ
                                {{ $formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value ? 'फाइल' : 'फारम' }}
                                थप्नुहोस्</h4>
                                @if( $formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value)
                                <a href="javascript:void(0)"
                                route_action="{{ route('organization.admin.printTemplate',[$mapApply,$formDataType]) }}" class="btn btn-primary btn-sm printDetail">
                                   <i class="fa fa-print"></i> प्रिन्ट गर्नुहोस
                                </a>
                                @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value)
                            <form
                                action="{{ route('organization.admin.appliedDocument.store', [$mapApply, $form, $formDataType]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="documents" class="form-label">फाईल*</label>
                                        <input type="file" name="documents[]"
                                            class="form-control @error('documents') is-invalid @enderror" id="documents"
                                            multiple />
                                        @error('documents.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @error('documents')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </form>
                        @else
                            <form
                                action="{{ route('organization.admin.appliedDocument.store', [$mapApply, $form, $formDataType]) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div id="formData">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    save
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">
                                {{ $formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value ? 'फाइल' : 'फारम' }}
                                विवरण
                            </h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>क्र.स</th>
                                        <th>अवस्था</th>
                                        <th>मिति</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value)
                                        @foreach ($formDataType->appliedDocuments as $appliedDocument)
                                            <tr>
                                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                                <td>{{ $appliedDocument->status->label() ?? '' }}</td>
                                                <td>
                                                    {{ $appliedDocument->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('organization.admin.documentDetail',$appliedDocument) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        @foreach ($formDataType->formStores as $formStore)
                                            <tr>
                                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                                <td>{{ $formStore->status->label() ?? '' }}</td>
                                                <td>
                                                    {{ $formStore->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('organization.admin.formStoreDetail',$formStore) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/backend/form/css/formio.builder.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/backend/form/js/cash.min.js') }}"></script>
        <script src="{{ asset('assets/backend/form/js/collect.min.js') }}"></script>
        <script src="{{ asset('assets/backend/form/js/formio.full.min.js') }}"></script>
        <script>
            function decodeHtmlEntities(input) {
                const doc = new DOMParser().parseFromString(input, "text/html");
                return doc.documentElement.textContent;
            }
            const component = decodeHtmlEntities('{{ $formDataType->model->fields ?? '' }}');

            Formio.createForm(document.getElementById('formData'), JSON.parse(component));
        </script>
         <script>
            $(".printDetail").on("click", function (e) {
                // alert('dd');
                $.ajax({
                    method: "GET",
                    url: $(this).attr("route_action"),
                    success: function (resp) {
                        var print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    }, error: function () {
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush

{{--
        @if ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FILE)
            <x-file-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FORM)
            <x-form-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::PAYMENT)
            <x-bill-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form"/>
        @endif

        --}}


@endsection
