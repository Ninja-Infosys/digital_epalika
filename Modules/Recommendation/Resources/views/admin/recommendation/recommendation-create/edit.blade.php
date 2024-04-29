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

@endsection
