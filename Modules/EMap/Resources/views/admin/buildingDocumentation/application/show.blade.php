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
                    <div class="d-flex justify-content-between">
                        <x-print-button title="७ दिने सूचना" target-element="detail" />
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detail">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                निवेदनको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-sm mb-0 table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>घरधनिको नाम</th>
                                                                    <td>{{ $buildingDocumentation->house_owner_name ?? '' }}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th>ठेगाना</th>
                                                                    <td>
                                                                        {{ $buildingDocumentation->LocalBody->local_body ?? '' }}
                                                                        -{{ get_nepali_number($buildingDocumentation->ward_no ?? '') }},
                                                                        {{ $buildingDocumentation->tole ?? '' }},
                                                                        {{ $buildingDocumentation->District->district ?? '' }},
                                                                        {{ $buildingDocumentation->Province->province ?? '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>सम्पर्क नं</th>
                                                                    <td>{{ $buildingDocumentation->phone ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घरको क्षेत्रफल</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->area ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घर बनेको बर्ष</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->house_built_year ?? '') }}
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th>घरको तल्ला</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->storey ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घरको किसिम</th>
                                                                    <td>{{ $buildingDocumentation->building_category?->label() ?? '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घरको लम्बाई</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->length ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घरको चौडाई</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->breadth ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>घरको उचाई</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->height ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>कोठा संख्या</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->room ?? '') }}
                                                                    </td>
                                                                </tr>

                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <table class="table table-sm mb-0 table-striped table-hover">
                                                            <thead>

                                                                <tr>
                                                                    <th>जग्गा क्षेत्रफल</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->land_area ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>जग्गाको कित्ता नं.</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->land_area ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>सडक अधिकार क्षेत्र</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->road_jurisdiction ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>जग्गा विवरण</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->land_detail ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>हाल वार्ड नं.</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>साविक जिल्ला</th>
                                                                    <td>{{ $buildingDocumentation->former_district ?? '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>साविक पालिका</th>
                                                                    <td>{{ $buildingDocumentation->former_local_body ?? '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>साविक वार्ड नं.</th>
                                                                    <td>{{ get_nepali_number($buildingDocumentation->former_ward_no ?? '') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>अन्य</th>
                                                                    <td>{{ $buildingDocumentation->other ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>अन्या विवरण</th>
                                                                    <td>{{ $buildingDocumentation->other ?? '' }}</td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
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
                                            @if (!empty($buildingDocumentation?->neighbours))
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
                                                        <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन
                                                            !!!
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @endif
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
                                            @if (!empty($buildingDocumentation?->buildingStoreyDetails))
                                                @forelse($buildingDocumentation?->buildingStoreyDetails as $buildingStoreyDetail)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $buildingStoreyDetail?->storey?->label() ?? '' }}</td>
                                                        <td>{{ $buildingStoreyDetail->area_of_former_construction ?? '' }}
                                                        </td>
                                                        <td>{{ $buildingStoreyDetail->land_area ?? '' }}
                                                        </td>
                                                        <td>{{ $buildingStoreyDetail->remarks ?? '' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन
                                                            !!!
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @endif
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
                                                <div class="col-6 pe-0">
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
                                                        {{ pathinfo($buildingDocumentation?->requiredDocument?->landowner_proved ?? '', PATHINFO_EXTENSION) }}</a>

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
                                <div class="col-md-5 mt-3">
                                    <div class="card shadow-none border">

                                        <div class="col-6">
                                            <h4 class="text-center">{{ $file->file_name }}</h4>

                                        </div>


                                        <div class="col-6">
                                            <iframe src="{{ $file->file_url }}" height="350px" width="400px"></iframe>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- notice --}}
                            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
                            @if ($buildingDocumentation->registration_no != null)
                                <div id="printData">

                                    <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="width:25%"><img alt="Office Logo"
                                                        src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                                        style="height:100px; width:130px" /></td>
                                                <td style="text-align:center; vertical-align:middle; width:50%">
                                                    <div><span
                                                            style="font-size:14px"><strong>अनुसूची-३</strong></span><br />
                                                        <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग
                                                                सम्वन्धित</strong></span>
                                                    </div>

                                                    <div style="font-size:19px; line-height:1.2">
                                                        {{ $officeSetting->localBody->local_body ?? '' }} </div>

                                                    <div style=" font-size:19px; line-height:1.2">
                                                        {{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}
                                                        नं
                                                        वडा
                                                        कार्यालय
                                                    </div>
                                                    <div style="font-size:19px; line-height:1.2">
                                                        .............................
                                                    </div>


                                                </td>


                                                <td style="width:25%">&nbsp;</td>
                                                <td style="width:25%">&nbsp;</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="row sub-title mt-3">
                                        <div class="col-sm sub-title1">
                                            <p class=" fw-bold lh-1">पत्र संख्या : ................</p>
                                            <p class="mt-1  fw-bold lh-1">चलानी नम्बर : ...............</p>
                                        </div>
                                        <div class="col-sm sub-title2 text-end ml-auto">
                                            <p class=" fw-bold lh-1" style="text-align: end;">मिती :
                                                {{ get_nepali_number($buildingDocumentation->get_today_nepali_date()) }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="fw-bold fs-5 text-center my-3">
                                        ७ दिने सूचना ।
                                    </p>
                                    <p style="font-size:18px; text-align: justify">
                                        <span class="dashed-bottom">
                                            {{ $buildingDocumentation?->province?->province ?? '' }},{{ $buildingDocumentation?->district?->district ?? '' }},{{ $buildingDocumentation?->localBody?->local_body ?? '' }}-{{ get_nepali_number($buildingDocumentation->ward_no ?? '') }}
                                        </span> वस्ने श्री <span
                                            class="dashed-bottom">{{ $buildingDocumentation->applicant_name }}
                                        </span>ले बागचौर नगरपालिका वडा नं
                                        <span
                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->ward_no ?? '') }}
                                        </span>को साबिक <span
                                            class="dashed-bottom">{{ $buildingDocumentation->former_local_body ?? '' }}
                                        </span>गाविस वडा नं <span
                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->former_ward_no) }}</span>
                                        कित्ता नं <span
                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->plot_no ?? '') }}</span>
                                        क्षेत्रफल <span
                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->area ?? '') }}
                                        </span>
                                        को<br>

                                        @foreach ($buildingDocumentation->neighbours as $neighbour)
                                            {{ $neighbour->direction->label() }} <span
                                                class="dashed-bottom">{{ $neighbour->neighbour_name }}</span><br>
                                        @endforeach

                                        यति चार किल्ला भित्रको जग्गामा तपशिलं बमोजिमको निर्माण भए अनुसारको घर अभिलेखिकरण गरी
                                        पाउँ भनि
                                        मिति <span
                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->application_date ?? '') }}</span>
                                        मा निवेदन दिनु भएकोले सो घरको साध संधियार कोहि कसैलाइ पिरमर्मा परेको भए
                                        आफुलाइ परेको सबै विवरण यो सूचना प्रकाशित भएको मितिले ७ दिन भित्र वडा कार्यालयमा उजुर
                                        बाजुर
                                        गर्नुहुन यो सुचना प्रकाशित गरिएको छ । म्यादभित्र पर्न नआएका उजुर प्रति कुनै कारबाही
                                        गरिने छैन
                                        ।<br>
                                    </p>
                                    <p class="text-decoration-underline fw-bold fs-5">तपशिल</p>
                                    <p>१. घरको किसिम : <span
                                            class="dashed-bottom">{{ $buildingDocumentation->building_category ?? '' }}</span><br>
                                        २. लम्बाई : <span
                                            class="dashed-bottom">{{ $buildingDocumentation->length ?? '' }}</span> <br>
                                        ३. चौडाई : <span
                                            class="dashed-bottom">{{ $buildingDocumentation->breadth ?? '' }}</span><br>
                                        ४. उचाई : <span
                                            class="dashed-bottom">{{ $buildingDocumentation->height ?? '' }}</span>
                                        <br>
                                        ५. अन्य : <span
                                            class="dashed-bottom">{{ $buildingDocumentation->other ?? '' }}</span><br>
                                    </p>
                                    <div class="col-sm text-end font-weight-bold">
                                        <p class="ml-4">....................<br>वडा अध्यक्ष</p>
                                    </div>

                                </div>
                            @endif

                            {{-- sarjamin muchulka --}}
                            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                            @if (
                                $buildingDocumentation->sent_admin == 'land_confirmation_show' ||
                                    $buildingDocumentation->sent_admin == 'recommendation_sent' ||
                                    !is_null(auth()->user()->ward_no))
                                <div class="card-body px-0">
                                    <div id="printData">
                                        <div class="text-center fw-bolder">
                                            <div><span style="font-size:14px"><strong>अनुसूची-३</strong></span><br />
                                                <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग
                                                        सम्वन्धित</strong></span><br />
                                                <span style="font-size:14px"><strong>सरजमिन मुचुल्काको
                                                        ढाँचा</strong></span>
                                            </div>
                                        </div>

                                        <div class="subject mt-4">
                                            <p>
                                                {{ $buildingDocumentation?->localBody?->local_body }}
                                                वडा नं {{ get_nepali_number($buildingDocumentation->ward_no) ?? '' }} वस्ने
                                                श्री
                                                {{ $buildingDocumentation->house_owner_name }} ले यस कार्यालयमा पेश गरेको
                                                निवेदन
                                                माथि स्थलगत चेकजाँच गर्दा निजले साविक जिल्ला
                                                {{ $buildingDocumentation->former_district }}
                                                {{ $buildingDocumentation->former_local_body }} वडा नं
                                                {{ get_nepali_number($buildingDocumentation->former_ward_no) }} हाल
                                                {{ $officeSetting->localBody->local_body ?? '' }}
                                                वडा नं. {{ get_nepali_number($buildingDocumentation->land_ward_no) }} को
                                                कित्ता नं .
                                                {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                                                {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफल
                                                जग्गामा
                                                {{ get_nepali_number($buildingDocumentation->house_built_year) }} सालमा
                                                {{ get_nepali_number($buildingDocumentation->room) }} कोठाको
                                                {{ get_nepali_number($buildingDocumentation->storey) }} तल्लाको
                                                {{ get_nepali_number($buildingDocumentation->area) }} क्षेत्रफलको घर/भवन
                                                निर्माण गरेको
                                                ठिक
                                                साँचो हो
                                                र यो घरको नक्सापास गरिदिएमा हामीलाइ कुनै किसिमको दावी विरोध छैन । पछि
                                                होइन/छैन भनि कहि कतै उजुरी समेत गर्ने छैन । साथै कार्यालयबाट खटिआएका
                                                डोरले सोधनी गर्दा चित्त बुझ्यो । निजले सडक अधिकार क्षेत्र
                                                {{ get_nepali_number($buildingDocumentation->road_jurisdiction) }}मि समेत
                                                छाडी घर
                                                निर्माण
                                                गरेको देखिन्छ /
                                                पाइएको छ ।
                                            </p>
                                            <p>संधियारहरु</p>

                                            @foreach ($buildingDocumentation->neighbours as $neighbour)
                                                <p><strong>{{ $neighbour->direction->label() }}तर्फ :-</strong></p>
                                                <p>१. {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                                                    {{ get_nepali_number($neighbour->ward_no) }} बस्ने श्री
                                                    {{ $neighbour->neighbour_name }} </p>
                                            @endforeach

                                            <p class="mt-2">वडा अध्यक्ष श्री .................
                                                {{ $officeSetting->localBody->local_body ?? '' }}
                                                {{ $officeSetting->ward_no ?? '' }}नं. वडा </p>
                                            <p>काम तामेल गर्ने कर्मचारी :</p>

                                            <p>ईति सम्वत </p>

                                        </div>
                                    </div>

                                </div>
                            @endif
                            {{-- sifarish --}}
                            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                            @if ($buildingDocumentation->sent_admin == 'recommendation_sent' || !is_null(auth()->user()->ward_no))
                                <div class="card-body px-0">
                                    <div Id="printData">
                                        <div class="text-center fw-bolder">
                                            <div><span style="font-size:14px"><strong>अनुसूची ४</strong></span><br />
                                                <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ संग
                                                        सम्वन्धिता</strong></span><br />
                                                <span style="font-size:14px"><strong>सिफारिस पत्रको ढाँचा</strong></span>
                                            </div>
                                        </div>

                                        <div class="subject text-justify-center lh-lg px-5 ">
                                            <h5><strong> {{ $officeSetting->localBody->local_body ?? '' }}</strong></h5>
                                            <h5><strong>{{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}
                                                    नं वडा
                                                    कार्यालय</strong></h5>

                                        </div>
                                        <div class="d-flex text-justify-center lh-lg px-5">
                                            <p>प.स.:</p>
                                            <p style="margin-left: 500px;">मिति
                                                :{{ get_nepali_number($buildingDocumentation->get_today_nepali_date()) }}
                                            </p>
                                        </div>
                                        <p class="text-justify-center lh-lg px-5"> चालनी नं. :</p>
                                        <div class="text-justify-center lh-lg px-5">
                                            <p>श्री {{ $officeSetting->localBody->local_body ?? '' }}को कार्यालय</p>
                                            <p>{{ $officeSetting->site_address }} ।</p>
                                        </div>
                                        <p class="text-justify-center text-center lh-lg px-5"> <strong>बिषय : घर जग्गा
                                                अभिलेखिकरणको
                                                सिफारिस
                                                पठाइएको बारे ।</strong></p>
                                        <p class="text-justify-center  lh-lg px-5">
                                            प्रस्तुत बिषयमा {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                                            {{ get_nepali_number($buildingDocumentation->land_ward_no) }} साविक जिल्ला
                                            {{ $buildingDocumentation->former_district }}
                                            {{ $buildingDocumentation->former_local_body }} वडा नं
                                            {{ get_nepali_number($buildingDocumentation->former_ward_no) }} कित्ता नं.
                                            {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                                            {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफलमा घर
                                            निर्माण गरेको घरधनि श्री. {{ $buildingDocumentation->house_owner_name }} ले यस
                                            कार्यालयमा
                                            घर अभिलेखिकरणका लागी सिफारिस गरिपाउँ भनि दिएको निवेदन माथि जाँचबुझ
                                            गर्दा निजले पेश गरेको घरको अभिलेखिकरण गर्न तोकिएको मापदण्ड हरु सबै पुरा भएको
                                            देखिएकाले घर
                                            अभिलेखिकरण गरिदिनुहुन सिफारिस साथ अनुरोध छ
                                        </p>
                                        <p class="text-justify-center  lh-lg px-5">
                                            ...................<br>
                                            वडा अध्यक्ष
                                        </p>
                                        <p class="text-justify-center lh-lg px-5"> <strong>(नगरपालिकामा सिफारिस गर्दा तपसिल
                                                बमोजिमका
                                                कागजात
                                                संलग्न हुनपर्नेछ)</strong></p>

                                        <div class="subject text-justify-center lh-lg px-5">
                                            <ol>
                                                <li>
                                                    सम्बन्धीत वडा कार्यालयको सिफारिस पत्र (१ प्रति)
                                                </li>
                                                <li>
                                                    नगरपालिकामा सूचिकृत भएको कन्सल्टेन्सीबाट तयार भई सहिछाप भएको घरको नक्सा
                                                    (२
                                                    प्रति)
                                                </li>

                                                <li>नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी (१ प्रति)</li>

                                                <li>चालु आ.व को मालपोत कर तिरेको प्रमाण (१ प्रति)</li>
                                                <li>पासपोर्ड साइजको फोटो (४ प्रति)</li>

                                                <li>जग्गा धनी दर्ता प्रमाण पूर्जाको प्रतिलिपी (१ प्रति)</li>
                                                <li>घर बनेको जग्गाको ब्लु प्रिन्ट, फाईल वा ट्रेस नक्साको सक्कल प्रतिलिपी (१
                                                    प्रति)</li>
                                                <li>चार किल्ला प्रमाणित सिफारिसको प्रतिलिपी (१ प्रति)</li>
                                                <li>निर्मित घर टहरा तथा पक्की भवनको चौतर्फी फोटो (१/१ प्रति)</li>

                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- report --}}
                            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                            <div id="print-content">
                                {!! $buildingDocumentation?->landReport?->description ?? '' !!}
                            </div>
                            {{-- certificate --}}
                            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>

                            @if ($buildingDocumentation->status == Modules\EMap\Enums\BuildingDocumentationStatusEnum::CERTIFICATE)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card p-0">

                                            <div class="card-body px-0">
                                                <div Id="printData">
                                                    <div class="text-center font-weight-bold fs-4">
                                                        <h4><strong>अनुसूची ५</strong></h4>
                                                        <h4><strong>घर अभिलेखिकरण प्रमाण पत्र</strong></h4>
                                                        <h4><strong>{{ $officeSetting?->localBody?->local_body ?? '' }}</strong>
                                                        </h4>
                                                        <h4><strong> नगर कार्यपाालिकाको कार्यालय</strong></h4>
                                                        <h4><strong>{{ $officeSetting?->site_address ?? '' }}</strong>
                                                        </h4>
                                                        <h4><strong>{{ $officeSetting?->province?->province ?? '' }}
                                                                नेपाल</strong></h4>
                                                        <h3><strong>अभिलेखिकरण प्रमाण पत्र</strong></h3>

                                                    </div>
                                                    <div class="text-end lh-lg px-5">
                                                        <p>आ.व:
                                                            {{ get_nepali_number($officeSetting->fiscalYear?->title ?? '') }}
                                                        </p>
                                                        <p>मिति:
                                                            {{ get_nepali_number($buildingDocumentation->get_today_nepali_date()) }}
                                                        </p>

                                                    </div>
                                                    <p class="text-justify-center lh-lg "> अभीलेख नं. :</p>

                                                    <p class="text-justify-center  lh-lg "> <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->applicant_former_district }}
                                                        </span>
                                                        जिल्ला
                                                        <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->applicant_former_local_body }}
                                                        </span>
                                                        गा.पा./न.पा <span
                                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->applicant_former_ward_no) }}
                                                        </span> नं. वडा स्थायी ठेगाना भइ हाल
                                                        वागचौर नगरपालिका <span
                                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->ward_no) }}
                                                        </span>
                                                        नं.
                                                        वडा
                                                        <span class="dashed-bottom">{{ $buildingDocumentation->tole }}
                                                        </span> टोल बस्ने
                                                        श्री{{ $buildingDocumentation->applicant_name }} ले सविक <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->former_district }}
                                                        </span> गा.वि.स. वडा
                                                        नं.
                                                        <span
                                                            class="dashed-bottom">{{ get_nepali_number($buildingDocumentation->former_ward_no) }}
                                                        </span> कित्ता
                                                        नं <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->plot_no }}
                                                        </span> मा <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->area }}
                                                        </span> क्षेत्रफलमा <span
                                                            class="dashed-bottom">{{ $buildingDocumentation->buildingCategory }}
                                                        </span> भवन
                                                        अभिलेखिकरण
                                                        निर्देशिका लागु हुनु
                                                        भन्दा अगाडी घर,टहरा निर्माण सम्पन्ना भइ सकेको भनि
                                                        पेश गर्नु भएको निवेदन उपर कारवाहि हुदा मिति <span
                                                            class="dashed-bottom">................. </span> मा
                                                        नगरपालिकाको स्थलगत निरिक्षण
                                                        प्रतिवेदन र यस
                                                        नगरपालिका
                                                        {{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}
                                                        नं. वडाको मिति
                                                        {{ get_nepali_number($buildingDocumentation->bill_date_bs ?? '') }}
                                                        गतेको सिफारिस पत्रका आधारमा निजलाई घर
                                                        अभिलेखिकरणको प्रमाण पत्र
                                                        प्रदान गरिएको छ ।
                                                    </p>

                                                    <table class="table table-bordered  lh-lg px-5">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">तला</th>
                                                                <th scope="col">सविका निर्माण भईसकेको क्षेत्रफल</th>
                                                                <th scope="col">जग्गाको क्षेत्रफल</th>
                                                                <th scope="col">कैफियत</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($buildingDocumentation?->buildingStoreyDetails as $buildingStoreyDetail)
                                                                <tr>
                                                                    <th scope="row">
                                                                        {{ $buildingStoreyDetail?->storey->label() }}</th>
                                                                    <td>{{ get_nepali_number($buildingStoreyDetail->area_of_former_construction) }}
                                                                    </td>
                                                                    <td>{{ get_nepali_number($buildingStoreyDetail->land_area) }}
                                                                    </td>
                                                                    <td>{{ get_nepali_number($buildingStoreyDetail->remarks) }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                    <div class="d-flex gap-5 justify-content-between text-center">
                                                        <p>...................<br>
                                                            अमिन
                                                        </p>
                                                        <p>........................<br>
                                                            सव-इन्जिनियर
                                                        </p>
                                                        <p>.......................<br>
                                                            इन्जिनियर
                                                        </p>
                                                        <p>.........................................<br>
                                                            प्रमुख प्रसाशकीय अधिकृत
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
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
        @include('admin.inc.file-view');
    </div>
@endsection
