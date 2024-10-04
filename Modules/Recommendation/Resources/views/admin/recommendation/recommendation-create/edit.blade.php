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
                    <form action="{{ route('admin.recommendation.recommendationCreate.update',$recommendationCreate) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="recommendation_detail_id" class="form-label">
                                    सिफरिस बुझ्ने व्यक्ति <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex gap-2 align-items-center">
                                    <label class="form-check">
                                        <input type="radio" class="form-check-input personalDetail" name="reciver_name_radio" value="self"
                                            {{ old('reciver_name',$recommendationCreate->reciver_name) === 'self' ? 'checked' : '' }} onclick="toggleReceiverInput()">
                                        आफै हो ?
                                    </label>
                                    <label class="gap-2">
                                        <input type="radio" class="form-check-input personalDetail" name="reciver_name_radio" value="no_self"
                                            {{ old('reciver_name',$recommendationCreate->reciver_name) === 'no_self' ? 'checked' : '' }} onclick="toggleReceiverInput()">
                                        आफै होइन् ?
                                    </label>
                                </div>

                                {{-- Input field for receiver name, shown only when 'आफै होइन् ?' is selected --}}
                                <input
                                    type="text"
                                    name="reciver_name"
                                    value="{{ old('reciver_name',$recommendationCreate->reciver_name) }}"
                                    class="form-control mt-2"
                                    id="receiverNameInput"
                                    style="{{ old('reciver_name',$recommendationCreate->reciver_name) === 'no_self' ? '' : 'display: none;' }}" {{-- Conditionally show --}}
                                    placeholder="सिफारिस बुझ्ने व्यक्तिको नाम"
                                />

                                <input type="hidden" name="reciver_name_hidden" id="reciverNameHidden" value="{{ old('reciver_name', $recommendationCreate->reciver_name) }}">
                            </div>


                            <div class="col-md-4 mb-2">
                                <label for="recommendation_detail_id" class="form-label">
                                    सिफरिसकलाई शुल्का पर्ने <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex gap-2 align-items-center">
                                    <label class="form-check">
                                        <input type="radio" class="form-check-input Fee" name="sifaris_fee" value="fee" {{ old('sifaris_fee',$recommendationCreate->sifaris_fee) === 'fee' ? 'checked' : '' }}>
                                        हो ?
                                    </label>
                                    <label class="gap-2">
                                        <input type="radio" class="form-check-input Fee" name="sifaris_fee" value="no_fee" {{ old('sifaris_fee',$recommendationCreate->sifaris_fee) === 'no_fee' ? 'checked' : '' }}>
                                        होइन् ?
                                    </label>
                                </div>
                            </div>
                        </div>

                        @livewire('field', [
                            'personal_detail_id' => old('personal_detail_id',$recommendationCreate->personal_detail_id),
                            'mobile_user_id' => old('mobile_user_id'),
                            'recommendation_detail_id' => old('recommendation_detail_id',$recommendationCreate->recommendation_detail_id),
                            'fields' => old('fields',$recommendationCreate->recommendationValues),
                        ])
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @includeIf('recommendation::admin.registration.inc.file')
    <script>
        function toggleReceiverInput() {
            const selfRadio = document.querySelector('input[name="reciver_name_radio"][value="self"]');
            const noSelfRadio = document.querySelector('input[name="reciver_name_radio"][value="no_self"]');
            const receiverNameInput = document.getElementById('receiverNameInput');
            const hiddenInput = document.getElementById('reciverNameHidden');

            if (noSelfRadio.checked) {
                receiverNameInput.style.display = 'block';  // Show input when 'आफै होइन् ?' is selected
                hiddenInput.value = receiverNameInput.value;  // Preserve the input value
            } else {
                receiverNameInput.style.display = 'none';  // Hide input when 'आफै हो ?' is selected
                receiverNameInput.value = '';  // Clear the text input
                hiddenInput.value = 'self';  // Set the hidden value to 'self'
            }
        }

        // Run this function when the page loads to maintain the correct state
        window.onload = toggleReceiverInput;
    </script>


@endsection

