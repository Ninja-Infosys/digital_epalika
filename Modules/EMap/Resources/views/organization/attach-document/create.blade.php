@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.setting.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.setting.dashboard') }}">{{ $form->title }}</a>
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
                                <div id="form">
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
                                        <th>शिर्षक</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ get_nepali_number($loop->iteration) }}</td>
                                        <td>{{ $formDataType->type->label() ?? '' }}</td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('style')
        {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> --}}
        {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
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
            const component = decodeHtmlEntities('{{ $formDataType->model->fields ?? null }}');

            Formio.createForm(document.getElementById('form'), JSON.parse(component));
        </script>
    @endpush
@endsection
