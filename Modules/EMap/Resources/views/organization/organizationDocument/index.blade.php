@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('organization.admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा पास को लागि आवश्यक कागजातहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्शा पास को लागि आवश्यक कागजातहरु</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title mb-0">नक्शा पास को लागि आवश्यक कागजातहरु थप्नुहोस</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('organization.admin.storeOrganizationDocument',$mapApply)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_owner_document">जग्गा धनी प्रमाणपत्र प्रतिलिपि</label>
                            <input type="file" class="form-control @error('land_owner_document') is-invalid @enderror"
                                   id="file"
                                   name="land_owner_document">
                            @error('land_owner_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_revenue_document">चालु आर्थिक वर्षको मालपोत तिरेको
                                रसिदको प्रतिलिपि</label>
                            <input type="file" class="form-control @error('land_revenue_document') is-invalid @enderror"
                                   id="file"
                                   name="land_revenue_document">
                            @error('land_revenue_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_owner_citizenship">ज.ध. दर्ता प्रमाण पुर्जामा फोटो नभएको
                                भए नागरिकता प्रमाणपत्रको प्रतिलिपि</label>
                            <input type="file"
                                   class="form-control @error('land_owner_citizenship') is-invalid @enderror" id="file"
                                   name="land_owner_citizenship">
                            @error('land_owner_citizenship')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="blue_print">कि . न. स्पष्ट भएको नापी प्रमाणित नक्शा (ब्लु
                                प्रिन्ट)</label>
                            <input type="file" class="form-control @error('blue_print') is-invalid @enderror" id="file"
                                   name="blue_print">
                            @error('blue_print')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="pass_document">पास गरिने नक्शाको फोटोकपी वा ब्लुप्रिन्ट
                                (डीजाईनर र नक्शावालाको हस्ताक्षर सहित)</label>
                            <input type="file" class="form-control @error('pass_document') is-invalid @enderror"
                                   id="file"
                                   name="pass_document">
                            @error('pass_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="designer_document">डीजाईनरको इजाजतपत्रको नवीकरण सहितको
                                फोटोकपी (सरोकारवालाबाट प्रमाणित)</label>
                            <input type="file" class="form-control @error('designer_document') is-invalid @enderror"
                                   id="file"
                                   name="designer_document">
                            @error('designer_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="permission_document">मन्जुरी लिई बनाउने भएमा नक्शा वालाले
                                कानुन शाखाको रोहवरमा भएको मन्जुरीनामाको सक्क्ल</label>
                            <input type="file" class="form-control"
                                   id="file"
                                   name="permission_document">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="inheritance_document">वारेश राखि नक्सा पास गर्ने भए वारिसको
                                प्रमाणितको प्रतिलिपि</label>
                            <input type="file" class="form-control"
                                   id="file"
                                   name="inheritance_document">
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @if(!empty($mapApply->attachDocument))
      <div class="card">
          <div class="card-header">
              <h4 class="header-title mb-0">कागजातहरू</h4>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-xl-4 col-lg-6">
                      <div class="card shadow-none border">
                          <div class="p-2">
                              <div class="row align-items-center">
                                  <div class="col-2 pe-0">
                                      <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-secondary rounded">
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->land_owner_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a  href="javascript:void(0);"
                                          onclick="openFileModal('जग्गा धनी प्रमाणपत्र प्रतिलिपि', '{{ pathinfo($mapApply->attachDocument->land_owner_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->land_owner_document }}')"
                                          class="text-muted fw-medium" type="button">जग्गा धनी प्रमाणपत्र प्रतिलिपि
                                          .{{pathinfo($mapApply->attachDocument->land_owner_document ??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->land_owner_document_size ??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('land_owner_document')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->land_revenue_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('चालु आर्थिक वर्षको मालपोत तिरेको रसिदको प्रतिलिपि', '{{ pathinfo($mapApply->attachDocument->land_revenue_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->land_revenue_document }}')"
                                         class="text-muted fw-medium" type="button">चालु आर्थिक वर्षको मालपोत तिरेको
                                          रसिदको प्रतिलिपि
                                          .{{pathinfo($mapApply->attachDocument->land_revenue_document ??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->land_revenue_document_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('land_revenue_document')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->land_owner_citizenship ??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('ज.ध. दर्ता प्रमाण पुर्जामा फोटो नभएको भए नागरिकता प्रमाणपत्रको प्रतिलिपि', '{{ pathinfo($mapApply->attachDocument->land_owner_citizenship ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->land_owner_citizenship }}')"
                                         class="text-muted fw-medium" type="button">ज.ध. दर्ता प्रमाण पुर्जामा फोटो नभएको
                                          भए नागरिकता प्रमाणपत्रको प्रतिलिपि
                                          .{{pathinfo($mapApply->attachDocument->land_owner_citizenship ??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->land_owner_citizenship_size ??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('land_owner_citizenship')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->blue_print ??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('कि . न. स्पष्ट भएको नापी प्रमाणित नक्शा (ब्लु प्रिन्ट)', '{{ pathinfo($mapApply->attachDocument->blue_print ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->blue_print }}')"
                                         class="text-muted fw-medium" type="button">कि . न. स्पष्ट भएको नापी प्रमाणित नक्शा (ब्लु
                                          प्रिन्ट)
                                          .{{pathinfo($mapApply->attachDocument->blue_print ??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->blue_print_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('blue_print')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->pass_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('पास गरिने नक्शाको फोटोकपी वा ब्लुप्रिन्ट(डीजाईनर र नक्शावालाको हस्ताक्षर सहित)', '{{ pathinfo($mapApply->attachDocument->pass_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->pass_document }}')"
                                         class="text-muted fw-medium" type="button">पास गरिने नक्शाको फोटोकपी वा ब्लुप्रिन्ट
                                          (डीजाईनर र नक्शावालाको हस्ताक्षर सहित)
                                          .{{pathinfo($mapApply->attachDocument->pass_document??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->pass_document_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('pass_document')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->designer_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('डीजाईनरको इजाजतपत्रको नवीकरण सहितको फोटोकपी (सरोकारवालाबाट प्रमाणित)', '{{ pathinfo($mapApply->attachDocument->designer_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->designer_document }}')"
                                         class="text-muted fw-medium" type="button">डीजाईनरको इजाजतपत्रको नवीकरण सहितको
                                          फोटोकपी (सरोकारवालाबाट प्रमाणित)
                                          .{{pathinfo($mapApply->attachDocument->designer_document??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->designer_document_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('designer_document')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->permission_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('मन्जुरी लिई बनाउने भएमा नक्शा वालाले कानुन शाखाको रोहवरमा भएको मन्जुरीनामाको सक्क्ल', '{{ pathinfo($mapApply->attachDocument->permission_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->permission_document }}')"
                                         class="text-muted fw-medium" type="button">मन्जुरी लिई बनाउने भएमा नक्शा वालाले
                                          कानुन शाखाको रोहवरमा भएको मन्जुरीनामाको सक्क्ल
                                          .{{pathinfo($mapApply->attachDocument->permission_document??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->permission_document_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('permission_document')])}}"
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
                                              <i class="fa {{getFileIconClass($mapApply->attachDocument->inheritance_document??'')}} font-18"></i>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <a href="javascript:void(0);"
                                         onclick="openFileModal('वारेश राखि नक्सा पास गर्ने भए वारिसको प्रमाणितको प्रतिलिपि', '{{ pathinfo($mapApply->attachDocument->inheritance_document ??'' ,PATHINFO_EXTENSION)}}', '{{ $mapApply->attachDocument->inheritance_document }}')"
                                         class="text-muted fw-medium" type="button">वारेश राखि नक्सा पास गर्ने भए वारिसको
                                          प्रमाणितको प्रतिलिपि
                                          .{{pathinfo($mapApply->attachDocument->inheritance_document??'',PATHINFO_EXTENSION)}}</a>
                                      <p class="mb-0 font-13">{{convert_to_highest_unit($mapApply->attachDocument->inheritance_document_size??'')}}</p>
                                  </div>
                                  <div class="col-2">
                                      <a href="{{route('admin.file-url-download', ['file_url'=>$mapApply->attachDocument->getRawOriginal('inheritance_document')])}}"
                                         class="btn btn-xs btn-outline-primary">
                                          <i class="fa fa-download"></i>
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
