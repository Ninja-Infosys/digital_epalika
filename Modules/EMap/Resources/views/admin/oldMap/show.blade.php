@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item ">नक्सा </li>
                        <li class="breadcrumb-item active">पुरानो नक्सा विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">पुरानो नक्सा विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">पुरानो नक्साको पुरा विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <a href="{{ route('emap.admin.oldMap.index') }}"
                                class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list"></i> पुरानो नक्साको पुरा विवरणहरूको सुची</a>
                            <x-print-button target-element="printData" title="प्रतिवेदन रिपोर्ट" />
                        </div>
                    </div>
                </div>
                <div id="printData">

                    <fieldset class="mx-2">
                        <div class="row py-2">
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label fw-bold">नक्सा :
                                    {{ $oldMap->application_type?->label() }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label fw-bold">आर्थिक बर्ष :
                                    {{ $oldMap->fiscalYear?->title ?? '' }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>दर्ता नं. :</b> {{ $oldMap->registration_no ?? '' }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>दर्ता रकम :</b>
                                    {{ $oldMap->registration_fee ?? '' }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>दर्ता मिति :</b>
                                    {{ $oldMap->registration_date ?? '' }}</h4>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mx-2">
                        <legend>
                            <h5 class="py-2">१. प्रस्तावित भवनको विवरण</h5>
                        </legend>
                        <div class="row ">
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label fw-bold">१.१ निर्माण कार्यको किसिम :
                                    {{ $oldMap->construction_type?->label() }}
                                </h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.२ प्रयोजन :</b> {{ $oldMap->usage?->label() }}</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h4 class="form-label"><b>१.३ भवन ऐन अनुसार वर्गीकरण :</b>
                                    {{ $oldMap->building_category?->label() }}</h4>
                            </div>
                        </div>

                    </fieldset>
                    @if (!empty($oldMap->houseOwner))
                        <fieldset class="mx-2">
                            <legend>
                                <h5 class="py-2">२. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h5>
                            </legend>

                            <div class="row ">
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.१ घर धनीको नाम :</b>
                                        {{ $oldMap->houseOwner?->first()?->name ?? '' }} </h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.२ फोन नं. :</b>
                                        {{ $oldMap->houseOwner?->first()?->phone ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.३ बुवाको नाम :</b>
                                        {{ $oldMap->houseOwner?->first()?->father_name ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.४ हजुरबुबाको नाम :</b>
                                        {{ $oldMap->houseOwner?->first()?->grandfather_name ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.६ नागरिकता नम्बर :</b>
                                        {{ $oldMap->houseOwner?->first()?->citizenship_no ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.७ नागरिकता लिएको मिति :</b>
                                        {{ $oldMap->houseOwner?->first()?->citizenship_issue_date ?? '' }}</h4>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <h4 class="form-label"><b>२.५ नागरिकता लिएको
                                            जिल्ला
                                            :</b>
                                        {{ $oldMap->houseOwner?->first()?->citizenshipIssueDistrict?->district ?? '' }}
                                    </h4>


                                    <div class="col-md-12">
                                        <fieldset>
                                            <legend>
                                                <h5 class="py-2"> ठेगाना</h5>
                                            </legend>
                                            <div class="row">

                                                {{-- <div class="col-md-4 mb-3">
                                            <h4 class="form-label"><b>१. प्रदेश :</b> {{ $oldMap->houseOwner?->province->province ?? '' }}</h4>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <h4 class="form-label"><b>२. जिल्ला:</b> {{ $oldMap->houseOwner?->district->district ?? '' }}</h4>

                                        </div> --}}
                                                <div class="col-md-12 mb-3">
                                                    <h4 class="form-label"><b> पालिका :</b>
                                                        {{ $oldMap->houseOwner?->first()?->local_body ?? '' }}
                                                    </h4>

                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <h4 class="form-label"><b> वडा नं. :</b>
                                                        {{ $oldMap->houseOwner?->first()?->ward_no ?? '' }}
                                                    </h4>

                                                </div>
                                                {{-- <div class="col-md-4 mb-3">
                                            <h4 class="form-label"><b>५. टोल :</b> {{ $oldMap->houseOwner?->tole ?? '' }}
                                            </h4>

                                        </div> --}}
                                            </div>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    @endif



                </div>
            </div>
        </div>
    </div>

    <h4 class="header-title mt-3 "> पुरानो नक्साको सम्बन्धित कागजातहरू</h4>
    <div class="row mt-4">
        @if (!empty($oldMap->oldMapDocuments))
            @foreach ($oldMap->oldMapDocuments as $oldMapDocument)
                <div class="col-md-4 mb-3">
                    <div class="card border border-info">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title">
                                {{ $oldMapDocument->document_name }}
                            </h5>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.file-url-download', ['file_url' => $oldMapDocument->document]) }}"
                                    class="btn btn-xs btn-outline-primary mx-1">
                                    <i class="fa fa-download"></i>
                                </a>
                                <form
                                    action="{{ route('emap.admin.oldMap.oldMapdDocument.destroy', [$oldMap, $oldMapDocument]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="show_confirm btn btn-sm btn-danger ml-2">
                                        <i class="fa fa-window-close"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($oldMapDocument->extension === 'pdf')
                                <iframe src="{{ $oldMapDocument->document_url }}" frameborder="0" width="100%"></iframe>
                            @elseif(in_array($oldMapDocument->extension, ['png', 'jpg', 'jpeg']))
                                <img src="{{ $oldMapDocument->document_url }}" class="card-image" alt="Image"
                                    height="150px" width="100%">
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
