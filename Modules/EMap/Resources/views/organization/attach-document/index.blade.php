@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('organization.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
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
                <form action="{{route('organization.admin.attachDocument.store',$mapApply)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_owner_document">जग्गा धनी प्रमाणपत्र प्रतिलिपि</label>
                            <input type="file" class="form-control @error('land_owner_document') is-invalid @enderror" id="file"
                                   name="land_owner_document" >
                            @error('land_owner_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_revenue_document">चालु आर्थिक वर्षको मालपोत तिरेको रसिदको प्रतिलिपि</label>
                            <input type="file" class="form-control @error('land_revenue_document') is-invalid @enderror" id="file"
                                   name="land_revenue_document" >
                            @error('land_revenue_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="land_owner_citizenship">ज.ध. दर्ता प्रमाण पुर्जामा फोटो नभएको भए नागरिकता प्रमाणपत्रको प्रतिलिपि</label>
                            <input type="file" class="form-control @error('land_owner_citizenship') is-invalid @enderror" id="file"
                                   name="land_owner_citizenship" >
                            @error('land_owner_citizenship')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="blue_print">कि . न. स्पष्ट भएको नापी प्रमाणित नक्शा (ब्लु प्रिन्ट)</label>
                            <input type="file" class="form-control @error('blue_print') is-invalid @enderror" id="file"
                                   name="blue_print" >
                            @error('blue_print')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="pass_document">पास गरिने नक्शाको फोटोकपी वा ब्लुप्रिन्ट (डीजाईनर र नक्शावालाको हस्ताक्षर सहित)</label>
                            <input type="file" class="form-control @error('pass_document') is-invalid @enderror" id="file"
                                   name="pass_document" >
                            @error('pass_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="designer_document">डीजाईनरको इजाजतपत्रको नवीकरण सहितको फोटोकपी (सरोकारवालाबाट प्रमाणित)</label>
                            <input type="file" class="form-control @error('designer_document') is-invalid @enderror" id="file"
                                   name="designer_document" >
                            @error('designer_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="permission_document">मन्जुरी लिई बनाउने भएमा नक्शा वालाले कानुन शाखाको रोहवरमा भएको मन्जुरीनामाको सक्क्ल</label>
                            <input type="file" class="form-control @error('permission_document') is-invalid @enderror" id="file"
                                   name="permission_document" >
                            @error('permission_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="inheritance_document">वारेश राखि नक्सा पास गर्ने भए वारिसको प्रमाणितको प्रतिलिपि</label>
                            <input type="file" class="form-control @error('inheritance_document') is-invalid @enderror" id="file"
                                   name="inheritance_document" >
                            @error('inheritance_document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
