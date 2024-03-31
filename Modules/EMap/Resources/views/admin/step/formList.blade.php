@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $mapApply->unique_id }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $mapApply->houseOwner?->name }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">{{ $mapApply->unique_id }}</h4>

                        <span class="d-flex justify-content-between align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    घरधनि नामसारी
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if ($mapApply->sent_to_organization == 'done')
                                        <li><a class="dropdown-item"
                                                href="{{ route('emap.admin.houseOwnerArchive.index', [$mapApply]) }}">
                                                सम्पन्न घर नामसारी</a></li>
                                    @else
                                        <li><a class="dropdown-item"
                                                href="{{ route('emap.admin.houseOwnerArchive.index', [$mapApply]) }}">
                                                निर्माणाधीन घर नामसारी </a></li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('emap.admin.organizationArchive.index', $mapApply) }}">
                                                परामर्शदाता नामसारी</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            @if (empty($mapApply->registration_no))
                                <a style="margin-left:10px;"
                                    href="{{ route('emap.admin.mapApply.register-map', $mapApply) }}"
                                    class="btn btn-success">
                                    नक्सा दर्ता गर्नुहोस
                                </a>
                            @endif
                            <button type="button" style="margin-left:10px;" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#mapReject">
                                नक्सा अस्वीकार गर्नुहोस
                            </button>

                            <div class="modal fade" id="mapReject" tabindex="-1" aria-labelledby="statusLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mapReject">नक्सा अस्वीकार गर्नुहोस</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                action="{{ route('emap.admin.mapApply.rejectMap', $mapApply) }}">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="status1" class="form-label">स्थिति</label>
                                                    <input type="text" name="status1"
                                                        value="{{ Modules\EMap\Enums\DocumentStatusEnum::REJECTED->label() }}"class="form-control @error('status') is-invalid @enderror"
                                                        id="status1" readonly />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="comment" class="form-label">टिप्पणी</label>
                                                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                                                    @error('comment')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">बन्द</button>
                                                    <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </span>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        @if (auth()->user()->role->type == 'Super')
                            <li class="nav-item">
                                <a href="#tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                    सबै ({{ $forms->count() }})
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#tab-submission" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                पेश गर्नुपर्ने ({{ $forms->where('form_edit', true)->where('need_from', \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE)?->count() }})
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#tab-approval" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                स्वीकृत गर्नुपर्ने ({{ $forms->where('form_approve', true)?->count() }})
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane " id="tab-all">
                            <x-admin.form-steps-component :map-apply="$mapApply" :forms="$forms" :order="$order" />
                        </div>
                        <div class="tab-pane show active" id="tab-submission">
                            <x-admin.form-steps-component :map-apply="$mapApply" :forms="$forms->where('form_edit', true)->where('need_from', \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE)" :order="$order" />
                        </div>

                        <div class="tab-pane" id="tab-approval">
                            <x-admin.form-steps-component :map-apply="$mapApply" :forms="$forms->where('form_approve', true)" :order="$order" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
