@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.recommendation.dashboard') }}">
                           <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
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
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                    <a href="{{ route('admin.recommendation.recommendationCategory.registrationDetail.index','1') }}"
                        class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-list"></i> सिफारिस सुची
                    </a>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.recommendation.sipharish.sipharishCreate.store') }}" method="post">
                    
                    @csrf
                    @livewire('field', [
                                    'sipharis_category_id' =>  old('sipharis_category_id')
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

@endsection