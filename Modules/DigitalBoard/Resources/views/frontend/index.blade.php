@extends('digitalboard::layouts.master')
@section('content')
    <div class="content-section">
        <div class="text-center mt-5 text-decoration-underline m-4">
            <h5 class="fw-bold">तपशिल सेवा लिन सम्बन्धित ठाउँमा click गर्नुहोस्</h5>
        </div>
        <livewire:helpdesk::help-desk-livewire/>
    </div>
@endsection
