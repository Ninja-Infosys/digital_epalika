@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा दरखास्त फारम</h3>
                        <a href="{{route('organization.admin.clients.client.show', $client)}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.clients.mapApply.store', $client)}}" method="post"
                          class="building-construction-application">
                        @csrf
                        {!! $mapSetting->map_request_form_format ?? '' !!}
                        <fieldset>
                            <legend>१. प्रस्तावित भवनको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <b class="form-label">१.१ निर्माण कार्यको किसिम *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('construction_type') is-invalid @enderror "
                                                       id="{{$constructionType->name}}"
                                                       name="construction_type"
                                                       {{old('construction_type')== $constructionType->value?'checked':''}} value="{{$constructionType->value}}">
                                                <label
                                                    for="{{$constructionType->name}}">{{$constructionType->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('construction_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.२ प्रयोजन *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('usage') is-invalid @enderror "
                                                       id="{{$usages->name}}"
                                                       name="usage"
                                                       {{old('usage')== $usages->value?'checked':''}} value="{{$usages->value}}">
                                                <label
                                                    for="{{$usages->name}}">{{$usages->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('usage')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.३ भवन ऐन अनुसार वर्गीकरण *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('building_category') is-invalid @enderror "
                                                       id="{{$categorization->name}}"
                                                       name="building_category"
                                                       {{old('building_category')== $categorization->value?'checked':''}} value="{{$categorization->value}}">
                                                <label
                                                    for="{{$categorization->name}}">{{$categorization->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('building_category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.४ स्ट्रकचर टाईप *</b> <br>
                                    <div class="row">
                                        @foreach($structureTypes as $structureType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('structure_type_id') is-invalid @enderror "
                                                       id="structure-type-{{$loop->index}}"
                                                       name="structure_type_id"
                                                       {{old('structure_type_id')== $structureType->id?'checked':''}} value="{{$structureType->id}}">
                                                <label
                                                    for="structure-type-{{$loop->index}}">{{$structureType->title}}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio"
                                                           class="@error('structure_type_id') is-invalid @enderror "
                                                           id="structure-type-other"
                                                           name="structure_type_id"
                                                           {{old('structure_type_id')== 'other'?'checked':''}} value="other">
                                                    <label
                                                        for="structure-type-other">अन्य</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text"
                                                           class=" @error('structure_type') is-invalid @enderror "
                                                           id="structure-type"
                                                           name="structure_type"
                                                           value="{{old('structure_type')}}">
                                                </div>
                                            </div>


                                        </div>
                                        @error('structure_type_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="current_storey"><b>१.५ हाल निर्माण गर्ने तल्ला संख्या: </b></label>
                                            <input type="text"
                                                   class="@error('current_storey') is-invalid @enderror "
                                                   id="current_storey"
                                                   name="current_storey"
                                                   value="{{old('current_storey')}}"
                                            >

                                            @error('current_storey')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="area_of_plinth"><b>१.६ प्लिन्थको क्षेत्रफल: </b></label>
                                            <input type="text"
                                                   class="@error('area_of_plinth') is-invalid @enderror "
                                                   id="area_of_plinth"
                                                   name="area_of_plinth"
                                                   value="{{old('area_of_plinth')}}"
                                            >

                                            @error('area_of_plinth')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="future_storey"><b>१.७ भविष्यमा निर्माण गर्ने तल्ला
                                                    संख्या: </b></label>
                                            <input type="text"
                                                   class="@error('future_storey') is-invalid @enderror "
                                                   id="future_storey"
                                                   name="future_storey"
                                                   value="{{old('future_storey')}}"
                                            >
                                            @error('future_storey')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="length"><b>१.८ कुल भवनको लम्बाई: </b></label>
                                            <input type="text"
                                                   class="@error('length') is-invalid @enderror "
                                                   id="length"
                                                   name="length"
                                                   value="{{old('length')}}"
                                            >
                                            @error('length')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="breadth"><b>१.९ कुल भवनको चौडाई: </b></label>
                                            <input type="text"
                                                   class="@error('breadth') is-invalid @enderror "
                                                   id="breadth"
                                                   name="breadth"
                                                   value="{{old('breadth')}}"
                                            >
                                            @error('breadth')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="height"><b>१.१० भवनको कुल उचाई जमिनको सतहबाट: </b></label>
                                            <input type="text"
                                                   class="@error('height') is-invalid @enderror "
                                                   id="height"
                                                   name="height"
                                                   value="{{old('height')}}"
                                            >
                                            @error('height')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण: </b>
                                            <table
                                                class="table table-striped table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>तल्ला</th>
                                                    <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                                    <th>साविक निर्माणको क्षेत्रफल</th>
                                                    <th>जम्मा क्षेत्रफल</th>
                                                    <th>उचाई</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>२. जग्गाको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="land_use_area"><b>२.१ भू-उपयोग्य क्षेत्र: </b></label>
                                            <input type="text"
                                                   class="@error('land_use_area') is-invalid @enderror "
                                                   id="land_use_area"
                                                   name="land_use_area"
                                                   value="{{old('land_use_area')}}"
                                            >
                                            @error('land_use_area')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="ward_no"><b>२.२ वडा नं: </b></label>
                                            <input type="text"
                                                   class="@error('ward_no') is-invalid @enderror "
                                                   id="ward_no"
                                                   name="ward_no"
                                                   value="{{old('ward_no')}}"
                                            >
                                            @error('ward_no')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="former_ward_no"><b>२.३ साविक वडा नं: </b></label>
                                            <input type="text"
                                                   class="@error('former_ward_no') is-invalid @enderror "
                                                   id="former_ward_no"
                                                   name="former_ward_no"
                                                   value="{{old('former_ward_no')}}"
                                            >
                                            @error('former_ward_no')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="tole"><b>२.४ टोलको नाम: </b></label>
                                            <input type="text"
                                                   class="@error('tole') is-invalid @enderror "
                                                   id="tole"
                                                   name="tole"
                                                   value="{{old('tole')}}"
                                            >
                                            @error('tole')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="street_code_no"><b>२.५ सडक कोड नं: </b></label>
                                            <input type="text"
                                                   class="@error('street_code_no') is-invalid @enderror "
                                                   id="street_code_no"
                                                   name="street_code_no"
                                                   value="{{old('street_code_no')}}"
                                            >
                                            @error('street_code_no')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="plot_no"><b>२.६ जग्गा कित्ता नं: </b></label>
                                            <input type="text"
                                                   class="@error('plot_no') is-invalid @enderror "
                                                   id="plot_no"
                                                   name="plot_no"
                                                   value="{{old('plot_no')}}"
                                            >
                                            @error('plot_no')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>२.७ क्षेत्रफल </b>
                                            <label for="bigha">बिघा</label>
                                            <input type="text"
                                                   class="@error('bigha') is-invalid @enderror "
                                                   id="bigha"
                                                   name="bigha"
                                                   value="{{old('bigha')}}"
                                            >
                                            @error('bigha')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <label for="kattha">कठ्ठा</label>
                                            <input type="text"
                                                   class="@error('kattha') is-invalid @enderror "
                                                   id="kattha"
                                                   name="kattha"
                                                   value="{{old('kattha')}}"
                                            >
                                            @error('kattha')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <label for="dhur">धुर</label>
                                            <input type="text"
                                                   class="@error('dhur') is-invalid @enderror "
                                                   id="dhur"
                                                   name="dhur"
                                                   value="{{old('dhur')}}"
                                            >
                                            @error('dhur')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            {{'('}}
                                            <input type="text"
                                                   class="@error('square_meter') is-invalid @enderror "
                                                   id="square_meter"
                                                   name="square_meter"
                                                   value="{{old('square_meter')}}"
                                            >
                                            <label for="square_meter">ब.मी.</label>
                                            @error('square_meter')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            {{')'}}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="percentage_of_area_covered_by_building"><b>२.८ भवनले ढाक्ने
                                                    क्षेत्रफलको प्रतिशत (GCR): </b></label>
                                            <input type="text"
                                                   class="@error('percentage_of_area_covered_by_building') is-invalid @enderror "
                                                   id="percentage_of_area_covered_by_building"
                                                   name="percentage_of_area_covered_by_building"
                                                   value="{{old('percentage_of_area_covered_by_building')}}"
                                            >
                                            @error('percentage_of_area_covered_by_building')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>३. जग्गा धनीको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <b class="form-label">३.१ जग्गा धनीको किसिम *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\LandOwnerTypeEnum::cases() as $landOwnerType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('land_owner_type') is-invalid @enderror "
                                                       id="{{$landOwnerType->name}}"
                                                       name="land_owner_type"
                                                       {{old('land_owner_type')== $landOwnerType->value?'checked':''}} value="{{$landOwnerType->value}}">
                                                <label
                                                    for="{{$landOwnerType->name}}">{{$landOwnerType->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('land_owner_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="name">१.१ नाम :</label>
                                                        <input type="text"
                                                               class="@error('name') is-invalid @enderror "
                                                               id="name"
                                                               name="name"
                                                               value="{{old('name')}}"
                                                        >
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="phone">१.२ फोन नं. :</label>
                                                        <input type="text"
                                                               class="@error('phone') is-invalid @enderror "
                                                               id="phone"
                                                               name="phone"
                                                               value="{{old('phone')}}"
                                                        >
                                                        @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="father_name">१.३ बुवाको नाम :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="father_name">१.४ नागरिकता लिएको जिल्ला :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="citizenship_number">१.५ नागरिकत नम्बर :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_number') is-invalid @enderror "
                                                               id="citizenship_number"
                                                               name="citizenship_number"
                                                               value="{{old('citizenship_number')}}"
                                                        >
                                                        @error('citizenship_number')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="citizenship_issued_date">१.६ नागरिकता लिएको मिति :
                                                            :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_issued_date') is-invalid @enderror "
                                                               id="citizenship_issued_date"
                                                               name="citizenship_issued_date"
                                                               value="{{old('citizenship_issued_date')}}"
                                                        >
                                                        @error('citizenship_issued_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</legend>
                            <div class="row">

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="name">१.१ नाम :</label>
                                                        <input type="text"
                                                               class="@error('name') is-invalid @enderror "
                                                               id="name"
                                                               name="name"
                                                               value="{{old('name')}}"
                                                        >
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="phone">१.२ फोन नं. :</label>
                                                        <input type="text"
                                                               class="@error('phone') is-invalid @enderror "
                                                               id="phone"
                                                               name="phone"
                                                               value="{{old('phone')}}"
                                                        >
                                                        @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="father_name">१.३ बुवाको नाम :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="father_name">१.४ नागरिकता लिएको जिल्ला :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="citizenship_number">१.५ नागरिकत नम्बर :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_number') is-invalid @enderror "
                                                               id="citizenship_number"
                                                               name="citizenship_number"
                                                               value="{{old('citizenship_number')}}"
                                                        >
                                                        @error('citizenship_number')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="citizenship_issued_date">१.६ नागरिकता लिएको मिति :
                                                            :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_issued_date') is-invalid @enderror "
                                                               id="citizenship_issued_date"
                                                               name="citizenship_issued_date"
                                                               value="{{old('citizenship_issued_date')}}"
                                                        >
                                                        @error('citizenship_issued_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>५. चार किल्लाको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>विवरण</th>
                                                    <th>पूर्व</th>
                                                    <th>दक्षिण</th>
                                                    <th>पश्चिम</th>
                                                    <th>उत्तर</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(\Modules\EMap\Enums\FourSideParticularEnum::cases() as $fourSide)
                                                    <tr>
                                                        <td>
                                                            <label
                                                                for="name">१.{{$loop->iteration}} {{$fourSide->label()}}</label>
                                                            <input type="hidden"
                                                                   class="@error('detail') is-invalid @enderror "
                                                                   id="detail"
                                                                   name="detail"
                                                                   value="{{old('detail', $fourSide->value)}}"
                                                            >
                                                            @error('detail')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('east') is-invalid @enderror "
                                                                   id="east"
                                                                   name="east"
                                                                   value="{{old('east')}}"
                                                            >
                                                            @error('east')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('south') is-invalid @enderror "
                                                                   id="south"
                                                                   name="south"
                                                                   value="{{old('south')}}"
                                                            >
                                                            @error('south')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('west') is-invalid @enderror "
                                                                   id="west"
                                                                   name="west"
                                                                   value="{{old('west')}}"
                                                            >
                                                            @error('west')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('north') is-invalid @enderror "
                                                                   id="north"
                                                                   name="north"
                                                                   value="{{old('north')}}"
                                                            >
                                                            @error('north')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>६. डिजाइनरको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>पद</th>
                                                    <th>नाम</th>
                                                    <th>NEC Council No.</th>
                                                    <th>पालिकाको दर्ता नं</th>
                                                    <th>कन्सल्टिंग फर्मबाट भए सो को नाम</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(\Modules\EMap\Enums\PostsEnum::cases() as $posts)
                                                    <tr>
                                                        <td>
                                                            <label
                                                                for="name">१.{{$loop->iteration}} {{$posts->label()}}</label>
                                                            <input type="hidden"
                                                                   class="@error('post') is-invalid @enderror "
                                                                   id="post"
                                                                   name="post"
                                                                   value="{{old('post', $posts->value)}}"
                                                            >
                                                            @error('post')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('name') is-invalid @enderror "
                                                                   id="name"
                                                                   name="name"
                                                                   value="{{old('name')}}"
                                                            >
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('nec_council_no') is-invalid @enderror "
                                                                   id="nec_council_no"
                                                                   name="nec_council_no"
                                                                   value="{{old('nec_council_no')}}"
                                                            >
                                                            @error('nec_council_no')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('local_body_registration_no') is-invalid @enderror "
                                                                   id="local_body_registration_no"
                                                                   name="local_body_registration_no"
                                                                   value="{{old('local_body_registration_no')}}"
                                                            >
                                                            @error('local_body_registration_no')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('consulting_firm_name') is-invalid @enderror "
                                                                   id="consulting_firm_name"
                                                                   name="consulting_firm_name"
                                                                   value="{{old('consulting_firm_name')}}"
                                                            >
                                                            @error('consulting_firm_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>७. निवेदकको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <b class="form-label">७.१ निवेदकको प्रकार : </b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\ApplicantTypeEnum::cases() as $applicantType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('usage') is-invalid @enderror "
                                                       id="{{$applicantType->name}}"
                                                       name="applicant_type"
                                                       {{old('applicant_type')== $applicantType->value?'checked':''}} value="{{$applicantType->value}}">
                                                <label
                                                    for="{{$applicantType->name}}">{{$applicantType->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('applicant_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">७.२ घरधनी सँगको सम्बन्ध</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\RelationEnum::cases() as $relation)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('relation') is-invalid @enderror "
                                                       id="{{$relation->name}}"
                                                       name="relation"
                                                       {{old('usage')== $relation->value?'checked':''}} value="{{$relation->value}}">
                                                <label
                                                    for="{{$relation->name}}">{{$relation->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('relation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>जग्गाधनी वा घरधनी भन्दा फरक भएमा</b>
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="name">१.१ नाम :</label>
                                                        <input type="text"
                                                               class="@error('name') is-invalid @enderror "
                                                               id="name"
                                                               name="name"
                                                               value="{{old('name')}}"
                                                        >
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="phone">१.२ फोन नं. :</label>
                                                        <input type="text"
                                                               class="@error('phone') is-invalid @enderror "
                                                               id="phone"
                                                               name="phone"
                                                               value="{{old('phone')}}"
                                                        >
                                                        @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="father_name">१.३ बुवाको नाम :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="father_name">१.४ नागरिकता लिएको जिल्ला :</label>
                                                        <input type="text"
                                                               class="@error('father_name') is-invalid @enderror "
                                                               id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}"
                                                        >
                                                        @error('father_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="citizenship_number">१.५ नागरिकत नम्बर :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_number') is-invalid @enderror "
                                                               id="citizenship_number"
                                                               name="citizenship_number"
                                                               value="{{old('citizenship_number')}}"
                                                        >
                                                        @error('citizenship_number')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <label for="citizenship_issued_date">१.६ नागरिकता लिएको मिति :
                                                            :</label>
                                                        <input type="text"
                                                               class="@error('citizenship_issued_date') is-invalid @enderror "
                                                               id="citizenship_issued_date"
                                                               name="citizenship_issued_date"
                                                               value="{{old('citizenship_issued_date')}}"
                                                        >
                                                        @error('citizenship_issued_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <div class="d-flex justify-content-between ">
                            <div>

                                <div>
                                    <input type="text"
                                           class="@error('application_date') is-invalid @enderror "
                                           id="application_date"
                                           name="application_date"
                                           value="{{old('application_date')}}"
                                    >
                                </div>
                                <div class="px-5">
                                    <label
                                        for="application_date"><b>निबेदनको मिति : </b></label>
                                </div>

                                @error('application_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>

                                <div>
                                    <input type="file"
                                           class="@error('applicant_signature') is-invalid @enderror "
                                           id="applicant_signature"
                                           name="applicant_signature"
                                           value="{{old('applicant_signature')}}"
                                    >
                                </div>
                                <div class="px-5">
                                    <label
                                        for="applicant_signature"><b>निवेदकको सहि: </b></label>
                                </div>
                                @error('applicant_signature')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <fieldset>
                            <legend class="text-center"><b>निर्माण हुने भवन तथा मापदण्ड सम्बन्धि संक्षिप्त विवरण</b>
                            </legend>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>मापदण्ड सम्बन्धि विवरण :</b>
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>क्र.सं</th>
                                                    <th>विवरण</th>
                                                    <th>मापदण्ड अनुसार</th>
                                                    <th>नक्सा अनुसार</th>
                                                    <th>अनुपालन</th>
                                                    <th>कैफियत</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(\Modules\EMap\Enums\DetailsRegardingCriteriaEnum::cases() as $criteria)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            <label
                                                                for="name">{{$criteria->label()}}</label>
                                                            <input type="hidden"
                                                                   class="@error('criteria') is-invalid @enderror "
                                                                   id="criteria"
                                                                   name="criteria"
                                                                   value="{{old('criteria', $criteria->value)}}"
                                                            >
                                                            @error('criteria')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('according_to_criteria') is-invalid @enderror "
                                                                   id="according_to_criteria"
                                                                   name="according_to_criteria"
                                                                   value="{{old('according_to_criteria')}}"
                                                            >
                                                            @error('according_to_criteria')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('according_to_map') is-invalid @enderror "
                                                                   id="according_to_map"
                                                                   name="according_to_map"
                                                                   value="{{old('according_to_map')}}"
                                                            >
                                                            @error('according_to_map')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="@error('non-compliance') is-invalid @enderror "
                                                                   id="non-compliance"
                                                                   name="non-compliance"
                                                                   value="{{old('non-compliance')}}"
                                                            >
                                                            @error('non-compliance')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                   class="@error('remarks') is-invalid @enderror "
                                                                   id="remarks"
                                                                   name="remarks"
                                                                   value="{{old('remarks', $criteria->remarks())}}"
                                                            >
                                                            @error('remarks')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>भवन सम्बन्धि विवरण :</b>
                                            <table
                                                class="table table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>क्र.सं</th>
                                                    <th colspan="2" class="text-center">विवरण</th>
                                                    <th>कैफियत</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <label
                                                            for="name">भवनको वर्ग</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="building category"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>२</td>
                                                    <td>
                                                        <label
                                                            for="name">प्लिन्थको क्षेत्रफल, (जमिन तलाको)</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="plinth area"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>३</td>
                                                    <td>
                                                        <label
                                                            for="name">भवनको लम्बाई</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="length"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>४</td>
                                                    <td>
                                                        <label
                                                            for="name">भवनको चौडाई</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="breadth"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>५</td>
                                                    <td>
                                                        <label
                                                            for="name">भवनको तला संख्या</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="storey count"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>६</td>
                                                    <td>
                                                        <label
                                                            for="name">भवनको कूल उचाई</label>
                                                        <input type="hidden"
                                                               class="@error('detail') is-invalid @enderror "
                                                               id="detail"
                                                               name="detail"
                                                               value="height"
                                                        >
                                                        @error('detail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('value') is-invalid @enderror "
                                                               id="value"
                                                               name="value"
                                                               value="{{old('value')}}"
                                                        >
                                                        @error('value')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="@error('remarks') is-invalid @enderror "
                                                               id="remarks"
                                                               name="remarks"
                                                               value="{{old('remarks')}}"
                                                        >
                                                        @error('remarks')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="d-flex justify-content-end">
                            <div>

                                <div>
                                    <input type="file"
                                           class="@error('consultant_engineer_signature') is-invalid @enderror "
                                           id="consultant_engineer_signature"
                                           name="consultant_engineer_signature"
                                           value="{{old('consultant_engineer_signature')}}"
                                    >
                                </div>
                                <div class="px-5">
                                    <label
                                        for="applicant_signature"><b>(कन्सल्टेन्ट इंन्जिनियरको सहि): </b></label>
                                </div>
                                @error('consultant_engineer_signature')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div>
                                    <label
                                        for="name"><b>नाम: </b></label>
                                    <input type="text"
                                           class="@error('name') is-invalid @enderror "
                                           id="name"
                                           name="name"
                                           value="{{old('name')}}"
                                    >
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div>
                                    <label
                                        for="name"><b>मोबाइल नं.: </b></label>
                                    <input type="text"
                                           class="@error('mobile_no') is-invalid @enderror "
                                           id="mobile_no"
                                           name="mobile_no"
                                           value="{{old('mobile_no')}}"
                                    >
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div>
                                    <label
                                        for="nec_no"><b>एन. ई. सी. नं: </b></label>
                                    <input type="text"
                                           class="@error('nec_no') is-invalid @enderror "
                                           id="nec_no"
                                           name="nec_no"
                                           value="{{old('nec_no')}}"
                                    >
                                </div>
                                @error('nec_no')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary    ">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @push('style')
        <style>
            .building-construction-application p {
                color: black;
            }

            .building-construction-application input[type="text"],
            .building-construction-application input[type="file"],
            .building-construction-application input[type="date"] {
                border-bottom: dotted 3px black;
                border-top: none;
                border-right: none;
                border-left: none;
                margin: 0 5px;
                /*width: 60%;*/
            }


        </style>
    @endpush
@endsection
