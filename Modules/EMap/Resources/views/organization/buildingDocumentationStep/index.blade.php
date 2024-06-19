@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card  p-0">
                <div class="card-body px-0">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                सबै ({{$forms->count()}})
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#tab-organization" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                {{\Modules\EMap\Enums\EMapFormFillerTypeEnum::ORGANIZATION?->label()}} ({{$forms->where('need_from',\Modules\EMap\Enums\EMapFormFillerTypeEnum::ORGANIZATION)->count()}})
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane " id="tab-all">
                            <x-organization.form-steps-component
                                :map-apply="$mapApply"
                                :forms="$forms"
                                :order="$order"
                            />
                        </div>
                        <div class="tab-pane show active" id="tab-organization">
                            <x-organization.form-steps-component
                                :map-apply="$mapApply"
                                :forms="$forms->where('need_from',\Modules\EMap\Enums\EMapFormFillerTypeEnum::ORGANIZATION)"
                                :order="$order"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
