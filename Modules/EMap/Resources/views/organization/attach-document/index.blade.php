@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('organization.admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Rename</li>
                    </ol>
                </div>
                <h4 class="page-title">Rename</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0"></h4>

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
                                @foreach ($forms as $form)
                                    <tr>
                                        <td>{{ get_nepali_number($loop->iteration) }}</td>
                                        <td>{{ $form->title }}</td>
                                        <td>
                                            @if ($form->need_from !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE)
                                                <a href="{{ route('organization.admin.formDetail', [$mapApply, $form]) }}"
                                                    class="btn btn-xs btn-outline-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
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

    {{--    @foreach ($forms as $form)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="header-title mb-0">{{ $form->title }}</h4>

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
                                        @foreach ($form->formDataTypes as $formDataType)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $formDataType->type->label() ?? '' }}</td>
                                                <td>
                                                    @if ($form->need_from->value !== Modules\EMap\Enums\EMapFormFillerTypeEnum::ORGANIZATION->value)
                                                        <button type="button" class="btn btn-xs btn-outline-primary"
                                                            data-target="#exampleModal{{ $loop->iteration }}"
                                                            data-toggle="modal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                @if ($formDataType->type->value == Modules\EMap\Enums\FormTypeEnum::FILE->value)
                                                                    <form
                                                                        action="{{ route('organization.admin.appliedDocument.store', [$mapApply, $form, $formDataType]) }}"
                                                                        enctype="multipart/form-data" method="POST">
                                                                        @csrf

                                                                        <div class="col-md-12 mb-2">
                                                                            <label for="documents" class="form-label">फाईल
                                                                                *</label>
                                                                            <input type="file" name="documents[]"
                                                                                class="form-control @error('documents') is-invalid @enderror"
                                                                                id="documents" multiple />
                                                                            @error('documents.*')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                            @error('documents')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </form>
                                                                @else
                                                                    @php
                                                                        $fields = Modules\EMap\Entities\DynamicForm::find($formDataType->form->id)?->fields;
                                                                    @endphp
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
        @endforeach

        @push('style')
            --}}{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> --}}{{--
            --}}{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}{{--
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
                const component = decodeHtmlEntities('{{ $fields }}');

                Formio.createForm(document.getElementById('form'), JSON.parse(component));
            </script>
        @endpush --}}
@endsection
