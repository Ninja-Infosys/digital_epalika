@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
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
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            {{--                      @include('livewire.search-livewire')--}}
                            <a href="{{ route('admin.recommendation.recommendationCreate.index') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> सिफारिस सुची
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--                    <livewire:recommendation::recommendation-apply-livewire />--}}
                   






                    <form action="{{ route('admin.recommendation.recommendationCreate.store') }}" method="post" enctype="multipart/form-data">
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

                        @livewire('field', [
                            'mobile_user_id' => old('mobile_user_id'),
                            'recommendation_detail_id' => old('recommendation_detail_id'),
                            'fields' => old('fields'),
                        ])

                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>

                    {{-- JavaScript to handle radio button selection and form value manipulation --}}




                </div>
            </div>

        </div>
    </div>
    @includeIf('recommendation::admin.registration.inc.file')



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
