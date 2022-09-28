<form action="{{route('organization.admin.clients.mapApply.store', $client)}}" method="post"
      class="building-construction-application">
    @csrf
    <fieldset>
        <legend>१. प्रस्तावित भवनको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                {{print_r($applyMap)}}
                <b class="form-label">१.१ निर्माण कार्यको किसिम *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                        <div class="col-md-3">
                            <input type="radio"
                                   class="@error('applyMap.construction_type') is-invalid @enderror "
                                   id="{{$constructionType->name}}"
                                   name="applyMap.construction_type"
                                   wire:model="applyMap.construction_type"
                                   {{old('applyMap.construction_type')== $constructionType->value?'checked':''}} value="{{$constructionType->value}}">
                            <label
                                for="{{$constructionType->name}}">{{$constructionType->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.construction_type')
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
                                   class="@error('applyMap.usage') is-invalid @enderror "
                                   id="{{$usages->name}}"
                                   name="applyMap.usage"
                                   wire:model="applyMap.usage"
                                   {{old('applyMap.usage')== $usages->value?'checked':''}} value="{{$usages->value}}">
                            <label
                                for="{{$usages->name}}">{{$usages->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.usage')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">१.३ भवन ऐन अनुसार वर्गीकरण *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                        <div class="col-md-3">
                            <input type="radio"
                                   class="@error('applyMap.building_category') is-invalid @enderror "
                                   id="{{$categorization->name}}"
                                   name="applyMap.building_category"
                                   wire:model="applyMap.building_category"
                                   {{old('applyMap.building_category')== $categorization->value?'checked':''}} value="{{$categorization->value}}">
                            <label
                                for="{{$categorization->name}}">{{$categorization->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.building_category')
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
                                   class="@error('applyMap.structure_type_id') is-invalid @enderror "
                                   id="structure-type-{{$loop->index}}"
                                   name="applyMap.structure_type_id"
                                   wire:model="applyMap.structure_type_id"
                                   {{old('applyMap.structure_type_id')== $structureType->id?'checked':''}} value="{{$structureType->id}}">
                            <label
                                for="structure-type-{{$loop->index}}">{{$structureType->title}}</label>
                        </div>
                    @endforeach
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio"
                                       class="@error('open_structure_type') is-invalid @enderror "
                                       id="open_structure_type"
                                       name="open_structure_type"
                                       wire:model="open_structure_type"
                                       {{old('open_structure_type')== '1'?'checked':''}} value="1">
                                <label
                                    for="open_structure_type" wire:click.prevent="setStructureType">अन्य</label>
                            </div>
                            @if($open_structure_type)
                                <div class="col-md-8">
                                    <input type="text"
                                           class=" @error('structure_type') is-invalid @enderror "
                                           id="structure-type"
                                           name="structure_type"
                                           value="{{old('structure_type')}}">
                                </div>
                            @endif
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
                            for="applyMap.current_storey"><b>१.५ हाल निर्माण गर्ने तल्ला संख्या: </b></label>
                        <input type="text"
                               class="@error('applyMap.current_storey') is-invalid @enderror "
                               id="applyMap.current_storey"
                               name="applyMap.current_storey"
                               wire:model="applyMap.current_storey"
                               value="{{old('applyMap.current_storey')}}"
                        >

                        @error('applyMap.current_storey')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="applyMap.area_of_plinth"><b>१.६ प्लिन्थको क्षेत्रफल: </b></label>
                        <input type="text"
                               class="@error('applyMap.area_of_plinth') is-invalid @enderror "
                               id="applyMap.area_of_plinth"
                               name="applyMap.area_of_plinth"
                               wire:model="applyMap.area_of_plinth"
                               value="{{old('applyMap.area_of_plinth')}}"
                        >

                        @error('applyMap.area_of_plinth')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="applyMap.future_storey"><b>१.७ भविष्यमा निर्माण गर्ने तल्ला
                                संख्या: </b></label>
                        <input type="text"
                               class="@error('applyMap.future_storey') is-invalid @enderror "
                               id="applyMap.future_storey"
                               name="applyMap.future_storey"
                               value="{{old('applyMap.future_storey')}}"
                               wire:model="applyMap.future_storey"
                        >
                        @error('applyMap.future_storey')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="applyMap.length"><b>१.८ कुल भवनको लम्बाई: </b></label>
                        <input type="text"
                               class="@error('applyMap.length') is-invalid @enderror "
                               id="applyMap.length"
                               name="applyMap.length"
                               value="{{old('applyMap.length')}}"
                               wire:model="applyMap.length"
                        >
                        @error('applyMap.length')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="applyMap.breadth"><b>१.९ कुल भवनको चौडाई: </b></label>
                        <input type="text"
                               class="@error('applyMap.breadth') is-invalid @enderror "
                               id="applyMap.breadth"
                               name="applyMap.breadth"
                               value="{{old('applyMap.breadth')}}"
                               wire:model="applyMap.breadth"
                        >
                        @error('applyMap.breadth')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="applyMap.height"><b>१.१० भवनको कुल उचाई जमिनको सतहबाट: </b></label>
                        <input type="text"
                               class="@error('applyMap.height') is-invalid @enderror "
                               id="applyMap.height"
                               name="applyMap.height"
                               value="{{old('applyMap.height')}}"
                               wire:model="applyMap.height"
                        >
                        @error('applyMap.height')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण: </b>
                        {{print_r($storeyDetails)}}
                        <table
                            class="table table-striped table-hover table-responsive table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>तल्ला</th>
                                <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                <th>साविक निर्माणको क्षेत्रफल</th>
                                <th>जम्मा क्षेत्रफल</th>
                                <th>उचाई</th>
                                <th>
                                    <button class="btn btn-primary" wire:click.prevent="addStoreyDetail">थप्नुहोस
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($storeyDetails as $index=>$storeyDetail)
                                <tr>
                                    <td>
                                        <input type="text"
                                               class="@error("storeyDetails.".$index.".storey") is-invalid @enderror "
                                               id="storeyDetails.{{$index}}.storey"
                                               name="storeyDetails.{{$index}}.storey"
                                               wire:model="storeyDetails.{{$index}}.storey"
                                               value="{{old("storeyDetails.".$index.".storey")}}"
                                        >
                                        @error("storeyDetails.".$index.".storey")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="@error("storeyDetails.".$index.".area_of_proposed_construction") is-invalid @enderror "
                                               id="storeyDetails.{{$index}}.area_of_proposed_construction"
                                               name="storeyDetails.{{$index}}.area_of_proposed_construction"
                                               wire:model="storeyDetails.{{$index}}.area_of_proposed_construction"
                                               value="{{old("storeyDetails.".$index.".area_of_proposed_construction")}}"
                                        >
                                        @error("storeyDetails.".$index.".area_of_proposed_construction")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="@error("storeyDetails.".$index.".area_of_former_construction") is-invalid @enderror "
                                               id="storeyDetails.{{$index}}.area_of_former_construction"
                                               name="storeyDetails.{{$index}}.area_of_former_construction"
                                               wire:model="storeyDetails.{{$index}}.area_of_former_construction"
                                               value="{{old("storeyDetails.".$index.".area_of_former_construction")}}"
                                        >
                                        @error("storeyDetails.".$index.".area_of_former_construction")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="@error("storeyDetails.".$index.".total_area") is-invalid @enderror "
                                               id="storeyDetails.{{$index}}.total_area"
                                               name="storeyDetails.{{$index}}.total_area"
                                               wire:model="storeyDetails.{{$index}}.total_area"
                                               value="{{old("storeyDetails.".$index.".total_area")}}"
                                        >
                                        @error("storeyDetails.".$index.".total_area")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="@error("storeyDetails.".$index.".height") is-invalid @enderror "
                                               id="storeyDetails.{{$index}}.height"
                                               name="storeyDetails.{{$index}}.height"
                                               wire:model="storeyDetails.{{$index}}.height"
                                               value="{{old("storeyDetails.".$index.".height")}}"
                                        >
                                        @error("storeyDetails.".$index.".height")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                wire:click.prevent="removeStoreyDetail({{$index}})">हटाउनुहोस्
                                        </button>
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
        <legend>२. जग्गाको विवरण</legend>
        {{print_r($landDescription)}}
        <div class="row">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="landDescription.land_use_area"><b>२.१ भू-उपयोग्य क्षेत्र: </b></label>
                        <input type="text"
                               class="@error('landDescription.land_use_area') is-invalid @enderror "
                               id="landDescription.land_use_area"
                               name="landDescription.land_use_area"
                               value="{{old('landDescription.land_use_area')}}"
                               wire:model="landDescription.land_use_area"
                        >
                        @error('landDescription.land_use_area')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.ward_no"><b>२.२ वडा नं: </b></label>
                        <input type="text"
                               class="@error('landDescription.ward_no') is-invalid @enderror "
                               id="landDescription.ward_no"
                               name="landDescription.ward_no"
                               value="{{old('landDescription.ward_no')}}"
                               wire:model="landDescription.ward_no"
                        >
                        @error('landDescription.ward_no')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.former_ward_no"><b>२.३ साविक वडा नं: </b></label>
                        <input type="text"
                               class="@error('landDescription.former_ward_no') is-invalid @enderror "
                               id="landDescription.former_ward_no"
                               name="landDescription.former_ward_no"
                               value="{{old('landDescription.former_ward_no')}}"
                               wire:model="landDescription.former_ward_no"
                        >
                        @error('landDescription.former_ward_no')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.tole"><b>२.४ टोलको नाम: </b></label>
                        <input type="text"
                               class="@error('landDescription.tole') is-invalid @enderror "
                               id="landDescription.tole"
                               name="landDescription.tole"
                               value="{{old('landDescription.tole')}}"
                               wire:model="landDescription.tole"
                        >
                        @error('landDescription.tole')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.street_code_no"><b>२.५ सडक कोड नं: </b></label>
                        <input type="text"
                               class="@error('landDescription.street_code_no') is-invalid @enderror "
                               id="landDescription.street_code_no"
                               name="landDescription.street_code_no"
                               value="{{old('landDescription.street_code_no')}}"
                               wire:model="landDescription.street_code_no"
                        >
                        @error('landDescription.street_code_no')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="landDescription.plot_no"><b>२.६ जग्गा कित्ता नं: </b></label>
                        <input type="text"
                               class="@error('landDescription.plot_no') is-invalid @enderror "
                               id="landDescription.plot_no"
                               name="landDescription.plot_no"
                               value="{{old('landDescription.plot_no')}}"
                               wire:model="landDescription.plot_no"
                        >
                        @error('landDescription.plot_no')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>२.७ क्षेत्रफल </b>
                        <label for="landDescription.bigha">बिघा</label>
                        <input type="text"
                               class="@error('landDescription.bigha') is-invalid @enderror "
                               id="landDescription.bigha"
                               name="landDescription.bigha"
                               value="{{old('landDescription.bigha')}}"
                               wire:model="landDescription.bigha"
                        >
                        @error('landDescription.bigha')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label for="landDescription.kattha">कठ्ठा</label>
                        <input type="text"
                               class="@error('landDescription.kattha') is-invalid @enderror "
                               id="landDescription.kattha"
                               name="landDescription.kattha"
                               value="{{old('landDescription.kattha')}}"
                               wire:model="landDescription.kattha"
                        >
                        @error('landDescription.kattha')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label for="landDescription.dhur">धुर</label>
                        <input type="text"
                               class="@error('landDescription.dhur') is-invalid @enderror "
                               id="landDescription.dhur"
                               name="landDescription.dhur"
                               value="{{old('landDescription.dhur')}}"
                               wire:model="landDescription.dhur"
                        >
                        @error('landDescription.dhur')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        {{'('}}
                        <input type="text"
                               class="@error('landDescription.square_meter') is-invalid @enderror "
                               id="landDescription.square_meter"
                               name="landDescription.square_meter"
                               value="{{old('landDescription.square_meter')}}"
                               wire:model="landDescription.square_meter"
                        >
                        <label for="landDescription.square_meter">ब.मी.</label>
                        @error('landDescription.square_meter')
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
                            for="landDescription.percentage_of_area_covered_by_building"><b>२.८ भवनले ढाक्ने
                                क्षेत्रफलको प्रतिशत (GCR): </b></label>
                        <input type="text"
                               class="@error('landDescription.percentage_of_area_covered_by_building') is-invalid @enderror "
                               id="landDescription.percentage_of_area_covered_by_building"
                               name="landDescription.percentage_of_area_covered_by_building"
                               value="{{old('landDescription.percentage_of_area_covered_by_building')}}"
                               wire:model="landDescription.percentage_of_area_covered_by_building"
                        >
                        @error('landDescription.percentage_of_area_covered_by_building')
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
