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
                        <li class="breadcrumb-item active">सिफारिस</li>
                        <li class="breadcrumb-item active">नयाँ सिफारिस</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ सिफारिस</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                        <a href="{{ route('emap.admin.dynamicForm.index','') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('emap.admin.dynamicForm.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <legend>
                                <h4 class="text-info">नक्शा पास फाराम</h4>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="form-label">शीर्षक</label>
                                    <div class="d-flex justify-content-between gap-1">
                                        <input type="text" id="title" class="form-control"
                                               value="{{old('title')}}"
                                               name="title"/>
                                    </div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-ms-12 md-2">
                                    <div id="builder"></div>
                                    <div id="form"></div>
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
@push('style')
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/backend/form/css/formio.builder.min.css')}}">
@endpush

    @push('scripts')
        <script src="{{asset('assets/backend/form/js/cash.min.js')}}"></script>
        <script src="{{asset('assets/backend/form/js/collect.min.js')}}"></script>
        <script src="{{asset('assets/backend/form/js/formio.full.min.js')}}"></script>
        <script>
            const options = {
                builder: {
                    basic: {
                        // We can change the title of a category...
                        title: 'Basic'
                    },
                    layout: {
                        // ... or change its position...
                        weight: 100
                    },
                    // ... and even create custom categories
                    custom: {
                        title: 'Custom'
                    }
                }
            };
            const form = {
                components: [
                    {
                        key: 'textfield',
                        type: 'textfield',
                        validate: {
                            required: true
                        }
                    },
                    {
                        key: 'datetime',
                        type: 'datetime'
                    },
                    {
                        key: 'submit',
                        type: 'button',
                        theme: 'primary'
                    }
                ]
            };
            const formio = {
                builder: null,
                form: null
            };


            Formio.builder(document.getElementById('builder'), form, options)
                .then((instance) => {
                    formio.builder = instance;
                    // console.log(instance)
                    // Define the on render event of the formio builder instance
                    formio.builder.on('render', (p) => {
                        // console.log(p)
                        // Update the formio form object and re render the form
                        formio.form.form = form;
                        formio.form.render();

                        // Update the json code using Prism.js
                    });
                });
        </script>
    @endpush
@endsection

