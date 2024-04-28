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
                            <a class="ml-1 text-primary-500">सिफारिस दर्ता</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="mx-auto col-md-8">
                    <h3 class="text-left fw-bold">सिफारिस दर्ता फर्म</h3>
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('recommendationrecommendation.register.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @livewire('font-field', [
                                //     'personal_detail_id' => old('personal_detail_id'),
                                //     'mobile_user_id' => old('mobile_user_id'),
                                //     'recommendation_detail_id' => old('recommendation_detail_id'),
                                //     'fields' => old('fields'),
                                // ])
                                // [
                                    'personal_detail_id' => old('personal_detail_id'),
                                    'mobile_user_id' => old('mobile_user_id'),
                                    'sipharis_form_type_id' => old('sipharis_form_type_id'),
                                    'status' => old('status'),
                                    'fields' => old('fields'),
                                ])
                                <button type="submit" class="btn btn-primary mt-2">
                                    पेश गर्नुहोस्
                                </button>
                            </form>
                        </div>
                    </div>
                    @includeIf('recommendation::admin.registration.inc.file')

                </div>
            </div>
    </section>





    {{-- @includeIf('recommendation::admin.registration.inc.file') --}}

@endsection
