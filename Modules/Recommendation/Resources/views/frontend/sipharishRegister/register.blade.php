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
            {{-- <a href="{{ route('recommendationrecommendation.index') }}"style="background-color: #84adda; color: white; padding: 7px 14px; border-radius: 50%; font-weight: bold; text-decoration: none;" class="mt-2" title="सिफारिस(गृहपृष्ठमा जनुहोस्)">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a> --}}
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
                                <div class="col-md-4 mb-2">
                                    <label for="recommendation_detail_id" class="form-label"> सिफरिस बुझ्ने व्यक्ति <span class="text-danger">*</span></label>
                                    <div class="d-flex gap-2 align-items-center">
                                        <label class="form-check">
                                            <input type="radio" class="form-check-input personalDetail" name="reciver_name_option" value="self" checked>
                                            आफै हो ?
                                        </label>
                                        <label class="gap-2">
                                            <input type="radio" class="form-check-input personalDetail" name="reciver_name_option" value="no_self">
                                            आफै होइन् ?
                                        </label>
                                    </div>

                                    {{-- Input field for receiver name, shown only when 'आफै होइन् ?' is selected --}}
                                    <input
                                        type="text"
                                        name="reciver_name_input"
                                        value="{{ old('reciver_name') }}"
                                        class="form-control mt-2"
                                        id="receiverNameInput"
                                        placeholder="पुरा नाम"
                                        style="display: none;" {{-- Initially hidden --}}
                                    />

                                    {{-- Hidden field that will hold the final value for reciver_name --}}
                                    <input type="hidden" name="reciver_name" id="reciverNameHidden" value="self">
                                </div>
                                @livewire('font-field', [

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const personalDetailRadios = document.querySelectorAll('input[name="reciver_name_option"]');
            const receiverNameInput = document.getElementById('receiverNameInput');
            const reciverNameHidden = document.getElementById('reciverNameHidden');

            // Function to handle the visibility of the input field and value assignment
            function toggleReceiverNameInput() {
                const selectedValue = document.querySelector('input[name="reciver_name_option"]:checked').value;

                if (selectedValue === 'no_self') {
                    receiverNameInput.style.display = 'block'; // Show the input field
                    receiverNameInput.required = true; // Make the input field required
                    reciverNameHidden.value = ''; // Clear the hidden input value
                } else {
                    receiverNameInput.style.display = 'none'; // Hide the input field
                    receiverNameInput.required = false; // Remove the required attribute
                    reciverNameHidden.value = 'self'; // Set hidden input to 'self'
                }
            }

            // Event listeners to detect radio button changes and trigger the toggle function
            personalDetailRadios.forEach(function (radio) {
                radio.addEventListener('change', toggleReceiverNameInput);
            });

            // Set hidden input value to whatever the user types in the receiver name input field
            receiverNameInput.addEventListener('input', function () {
                reciverNameHidden.value = receiverNameInput.value;
            });

            // Initialize the visibility and value based on the default selection
            toggleReceiverNameInput();
        });
    </script>


@endsection
