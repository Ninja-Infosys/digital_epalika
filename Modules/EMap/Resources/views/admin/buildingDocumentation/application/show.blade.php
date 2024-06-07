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
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}">दर्खास्त निवेदन सूची
                            </a>
                        </li>
                        <li class="breadcrumb-item active">निवेदनको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">निवेदनको विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                विवरण
                            </a>
                        </li>
                        @if (!is_null(auth()->user()->ward_no))
                            <li class="nav-item">
                                <a href="#reg" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    दर्ता
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                निवेदनको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>घरधनिको नाम </th>
                                                            <td>{{ $buildingDocumentation->house_owner_name ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>सम्पर्क नं </th>
                                                            <td>{{ $buildingDocumentation->phone ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> घरको क्षेत्रफल </th>
                                                            <td>{{ $buildingDocumentation->area ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> घर बनेको बर्ष </th>
                                                            <td>{{ $buildingDocumentation->house_built_year ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> कोठा संख्या </th>
                                                            <td>{{ $buildingDocumentation->room ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> घरको तल्ला </th>
                                                            <td>{{ $buildingDocumentation->storey ?? '' }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>घरको किसिम </th>
                                                            <td>{{ $buildingDocumentation->building_category?->label() ?? '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th> घरको लम्बाई </th>
                                                            <td>{{ $buildingDocumentation->length ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> घरको चौडाई </th>
                                                            <td>{{ $buildingDocumentation->breadth ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> घरको उचाई </th>
                                                            <td>{{ $buildingDocumentation->height ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>अन्य </th>
                                                            <td>{{ $buildingDocumentation->other ?? '' }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>अन्या विवरण</th>
                                                            <td>{{ $buildingDocumentation->other ?? '' }}</td>
                                                        </tr>




                                                        <tr>
                                                            <th> ठेगाना</th>
                                                            <td>
                                                                {{ $buildingDocumentation->LocalBody->local_body ?? '' }}
                                                                -{{ $buildingDocumentation->ward_no ?? '' }}
                                                                , {{ $buildingDocumentation->tole ?? '' }}
                                                                , {{ $buildingDocumentation->District->district ?? '' }}
                                                                , {{ $buildingDocumentation->Province->province ?? '' }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th> जग्गा क्षेत्रफल</th>
                                                            <td>{{ $buildingDocumentation->land_area ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> जग्गाको कित्ता नं.</th>
                                                            <td>{{ $buildingDocumentation->land_area ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> सडक अधिकार क्षेत्र</th>
                                                            <td>{{ $buildingDocumentation->road_jurisdiction ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> जग्गा विवरण</th>
                                                            <td>{{ $buildingDocumentation->land_detail ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> हाल वार्ड नं.</th>
                                                            <td>{{ $buildingDocumentation->land_ward_no ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> साविक जिल्ला </th>
                                                            <td>{{ $buildingDocumentation->former_district ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> साविक पालिका</th>
                                                            <td>{{ $buildingDocumentation->former_local_body ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> साविक वार्ड नं.</th>
                                                            <td>{{ $buildingDocumentation->former_ward_no ?? '' }}</td>
                                                        </tr>






                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            संधियारको विवरण
                                        </h4>
                                    </div>
                                    <table class="table table-bordered border-primary mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">क्र.स</th>
                                                <th scope="col">दिशा</th>
                                                <th scope="col">संधियारको नाम</th>
                                                <th scope="col">वार्ड नं.</th>
                                                <th scope="col">दस्तखत</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($buildingDocumentation?->neighbours as $neighbour)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $neighbour?->direction?->label() ?? '' }}</td>
                                                    <td>{{ $neighbour->neighbour_name ?? '' }}</td>
                                                    <td>{{ $neighbour->ward_no ?? '' }}</td>
                                                    <td></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन !!!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            तल्लाको विवरण
                                        </h4>
                                    </div>
                                    <table class="table table-bordered border-primary mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">क्र.स</th>
                                                <th scope="col">तल्ला</th>
                                                <th scope="col">साविक निर्माण भइसकेको क्षेत्रफल</th>
                                                <th scope="col">जग्गाको क्षेत्रफल</th>
                                                <th scope="col">कैफियत</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($buildingDocumentation?->buildingStoreyDetails as $buildingStoreyDetail)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $buildingStoreyDetail?->storey?->label() ?? '' }}</td>
                                                    <td>{{ $buildingStoreyDetail->area_of_former_construction ?? '' }}</td>
                                                    <td>{{ $buildingStoreyDetail->land_area ?? '' }}</td>
                                                    <td>{{ $buildingStoreyDetail->remarks ?? '' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन !!!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            आवश्यक काग्जातहरु
                                        </h4>
                                    </div>



                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->citizenship ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी', '{{ pathinfo($buildingDocumentation?->requiredDocument?->citizenship ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->citizenship }}')"
                                                        class="text-muted fw-medium" type="button">नेपाली नागरिकताको प्रमाण
                                                        पत्रको प्रतिलिपी
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->citizenship ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('citizenship')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->landowner_proved ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('जग्गाधनि प्रमाणपत्रको प्रतिलिपी ', '{{ pathinfo($buildingDocumentation?->requiredDocument?->landowner_proved ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->landowner_proved }}')"
                                                        class="text-muted fw-medium" type="button">जग्गाधनि प्रमाणपत्रको
                                                        प्रतिलिपी
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->landowner_proved ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('landowner_proved')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->revenue ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('चालु आ.व को घरजग्गा कर तिरेको रसिदको प्रतिलिपि  ', '{{ pathinfo($buildingDocumentation?->requiredDocument?->revenue ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->revenue }}')"
                                                        class="text-muted fw-medium" type="button">चालु आ.व को घर
                                                        जग्गा कर तिरेको रसिदको प्रतिलिपि
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->revenue ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('revenue')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->building_map ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('घरको नक्सा', '{{ pathinfo($buildingDocumentation?->requiredDocument?->building_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->building_map }}')"
                                                        class="text-muted fw-medium" type="button">घरको नक्सा
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->building_map ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('building_map')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->land_map ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('जग्गाको नक्सा', '{{ pathinfo($buildingDocumentation?->requiredDocument?->land_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->land_map }}')"
                                                        class="text-muted fw-medium" type="button">जग्गाको नक्सा
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->land_map ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('land_map')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->all_round_house_pic ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('चारैतिरको फोटो', '{{ pathinfo($buildingDocumentation?->requiredDocument?->all_round_house_pic ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->all_round_house_pic }}')"
                                                        class="text-muted fw-medium" type="button">चारैतिरको फोटो
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->all_round_house_pic ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('all_round_house_pic')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-secondary rounded">
                                                            <i
                                                                class="fa {{ getFileIconClass($buildingDocumentation?->requiredDocument?->photo ?? '') }} font-18"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                        onclick="openFileModal('घरधनिको फोटो', '{{ pathinfo($buildingDocumentation?->requiredDocument?->photo ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation?->requiredDocument?->photo }}')"
                                                        class="text-muted fw-medium" type="button">घरधनिको फोटो
                                                        .{{ pathinfo($buildingDocumentation?->requiredDocument?->photo ?? '', PATHINFO_EXTENSION) }}</a>

                                                </div>
                                                <div class="col-2">
                                                    <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation?->requiredDocument?->getRawOriginal('photo')]) }}"
                                                        class="btn btn-xs btn-outline-primary">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            अन्य काग्जातहरु
                                        </h4>
                                    </div>



                                </div>
                            </div>

                            @foreach ($buildingDocumentation->files as $file)
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="col-2">
                                                <h3 class="text-center">{{ $file->file_name }}</h3>

                                            </div>
                                            <div class="row ">


                                                <div class="col-8">
                                                    <iframe src="{{ $file->file_url }}" height="200px"
                                                        width="200px"></iframe>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="tab-pane" id="reg">
                            <form action="{{ route('emap.admin.store.customApplicationData', $buildingDocumentation) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="border p-2 mb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="taxpayer_number" class="form-label">करदाता नम्बर </label>
                                            <input type="text" name="taxpayer_number" placeholder="करदाता नम्बर "
                                                value="{{ old('taxpayer_number', $buildingDocumentation->taxpayer_number ?? '') }}"
                                                class="form-control @error('taxpayer_number') is-invalid @enderror"
                                                id="taxpayer_number" />
                                            @error('taxpayer_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="bill_no" class="form-label">बिल नं</label>
                                            <input type="text" name="bill_no"
                                                value="{{ old('bill_no', $buildingDocumentation->bill_no ?? '') }}"
                                                placeholder="बिल नं"
                                                class="form-control @error('bill_no') is-invalid @enderror"
                                                id="bill_no" />
                                            @error('bill_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <x-date-input-component get-today-date="{{ false }}"
                                                edit-date-ne="{{ $buildingDocumentation->bill_date_bs ?? '' }}"
                                                edit-date-en="{{ $buildingDocumentation->bill_date_ad ?? '' }}"
                                                name-ne="bill_date_bs" label-ne="बिल मिति (बि स.)" name-en="bill_date_ad"
                                                label-en="बिल मिति" />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amount" class="form-label">रकम </label>
                                            <input type="number" name="amount" step="0.01" placeholder="रकम"
                                                value="{{ old('amount', $buildingDocumentation->amount ?? '') }}"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                id="amount" />
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if (!empty($buildingDocumentation->other_file))
                                            <a href="{{ $buildingDocumentation->other_file }}"
                                                download="{{ $buildingDocumentation->other_file }}">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        @endif
                                        <div class="col-md-12 mb-2">
                                            <label for="other_file" class="form-label"> फाईल </label>
                                            <input type="file" name="other_file"
                                                class="form-control @error('other_file') is-invalid @enderror"
                                                id="other_file" />
                                            @error('other_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/backend/editor/ckEditor/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/editor/ckEditor/js/print.js') }}"></script>


        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush
@endsection
