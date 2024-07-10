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
                        <li class="breadcrumb-item active">भवन अभिलेखिकरण को लागि आवश्यक कागजातहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">भवन अभिलेखिकरण को लागि आवश्यक कागजातहरु</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card  p-0">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title mb-0">भवन अभिलेखिकरण को लागि आवश्यक कागजातहरु थप्नुहोस</h3>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('organization.admin.storeRequiredDocument', $buildingDocumentation) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="citizenship">नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी</label>
                            <input type="file" class="form-control @error('citizenship') is-invalid @enderror"
                                id="file" name="citizenship">
                            @error('citizenship')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="landowner_proved">जग्गाधनि प्रमाण पत्रको प्रतिलिपी</label>
                            <input type="file" class="form-control @error('landowner_proved') is-invalid @enderror"
                                id="file" name="landowner_proved">
                            @error('landowner_proved')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="revenue">चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि</label>
                            <input type="file" class="form-control @error('revenue') is-invalid @enderror"
                                id="file" name="revenue">
                            @error('revenue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="building_map">घरको नक्सा</label>
                            <input type="file" class="form-control @error('building_map') is-invalid @enderror"
                                id="file" name="building_map">
                            @error('building_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_map">जग्गाको नक्सा</label>
                            <input type="file" class="form-control @error('land_map') is-invalid @enderror"
                                id="file" name="land_map">
                            @error('land_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="all_round_house_pic">चारैतिरको फोटो</label>

                            <input type="file" class="form-control" id="file" name="all_round_house_pic">


                        </div>
                        
                    </div>

                   
            </div>
            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    @if (!empty($buildingDocumentation->requiredDocument))
        <div class="card p-0">
            <div class="card-header">
                <h4 class="header-title mb-0">कागजातहरू</h4>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="card shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-2 pe-0">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-secondary rounded">
                                                <i
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->citizenship ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी', '{{ pathinfo($buildingDocumentation->requiredDocument->citizenship ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->citizenship }}')"
                                            class="text-muted fw-medium" type="button">नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी
                                            .{{ pathinfo($buildingDocumentation->requiredDocument->citizenship ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->citizenship_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('citizenship')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->citizenship_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->citizenship_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
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
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->landowner_proved ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('जग्गाधनि प्रमाण पत्रको प्रतिलिपी', '{{ pathinfo($buildingDocumentation->requiredDocument->landowner_proved ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->landowner_proved }}')"
                                            class="text-muted fw-medium" type="button">जग्गाधनि प्रमाण पत्रको प्रतिलिपी
                                            .{{ pathinfo($buildingDocumentation->requiredDocument->landowner_proved ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->landowner_proved_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('landowner_proved')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->landowner_proved_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->landowner_proved_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
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
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->revenue ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि', '{{ pathinfo($buildingDocumentation->requiredDocument->revenue ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->revenue }}')"
                                            class="text-muted fw-medium" type="button">चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि
                                            .{{ pathinfo($buildingDocumentation->requiredDocument->revenue ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->revenue_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('revenue')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->revenue_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->revenue_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
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
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->building_map ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('घरको नक्सा', '{{ pathinfo($buildingDocumentation->requiredDocument->building_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->building_map }}')"
                                            class="text-muted fw-medium" type="button">घरको नक्सा
                                            .{{ pathinfo($buildingDocumentation->requiredDocument->building_map ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->building_map_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('building_map')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->building_map_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->building_map_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
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
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->land_map ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('जग्गाको नक्सा', '{{ pathinfo($buildingDocumentation->requiredDocument->land_map ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->land_map }}')"
                                            class="text-muted fw-medium" type="button">जग्गाको नक्सा.{{ pathinfo($buildingDocumentation->requiredDocument->land_map ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->land_map_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('land_map')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->land_map_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->land_map_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
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
                                                    class="fa {{ getFileIconClass($buildingDocumentation->requiredDocument->all_round_house_pic ?? '') }} font-18"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="javascript:void(0);"
                                            onclick="openFileModal('चारैतिरको फोटो', '{{ pathinfo($buildingDocumentation->requiredDocument->all_round_house_pic ?? '', PATHINFO_EXTENSION) }}', '{{ $buildingDocumentation->requiredDocument->all_round_house_pic }}')"
                                            class="text-muted fw-medium" type="button">चारैतिरको फोटो
                                            .{{ pathinfo($buildingDocumentation->requiredDocument->all_round_house_pic ?? '', PATHINFO_EXTENSION) }}</a>
                                        <p class="mb-0 font-13">
                                            {{ convert_to_highest_unit($buildingDocumentation->requiredDocument->all_round_house_pic_size ?? '') }}
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.file-url-download', ['file_url' => $buildingDocumentation->requiredDocument->getRawOriginal('all_round_house_pic')]) }}"
                                            class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a class="btn btn-xs btn-outline-primary">
                                            @if ($buildingDocumentation->requiredDocument?->all_round_house_pic_status == 'accept')
                                                स्वीकार
                                            @elseif ($buildingDocumentation->requiredDocument?->all_round_house_pic_status == 'reject')
                                                अस्वीकार
                                            @else
                                                प्रक्रियामा
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            @include('admin.inc.file-view');
        </div>
    @endif
@endsection
