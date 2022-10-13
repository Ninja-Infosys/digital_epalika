<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <fieldset>
        <legend>१. प्रस्तावित भवनको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                <b class="form-label">१.१ निर्माण कार्यको किसिम *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$constructionType->name}}"
                                   wire:model="applyMap.construction_type"
                                   value="{{$constructionType->value}}">
                            <label
                                for="{{$constructionType->name}}">{{$constructionType->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.construction_type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">१.२ प्रयोजन *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$usages->name}}"
                                   wire:model="applyMap.usage"
                                   value="{{$usages->value}}">
                            <label
                                for="{{$usages->name}}">{{$usages->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.usage')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">१.३ भवन ऐन अनुसार वर्गीकरण *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$categorization->name}}"
                                   wire:model="applyMap.building_category"
                                   value="{{$categorization->value}}">
                            <label
                                for="{{$categorization->name}}">{{$categorization->label()}}</label>
                        </div>
                    @endforeach
                    @error('applyMap.building_category')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">१.४ स्ट्रकचर टाईप *</b> <br>
                <div class="row">
                    @foreach($structureTypes as $structureType)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="structure-type-{{$loop->index}}"
                                   wire:model="applyMap.structure_type_id"
                                   value="{{$structureType->id}}">
                            <label
                                for="structure-type-{{$loop->index}}">{{$structureType->title}}</label>
                        </div>
                    @endforeach
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio"
                                       id="open_structure_type"
                                       wire:model="open_structure_type"
                                       value="1">
                                <label
                                    for="open_structure_type" wire:click.prevent="setStructureType">अन्य</label>
                            </div>
                            @if($open_structure_type)
                                <div class="col-md-8">
                                    <input type="text"
                                           wire:model="applyMap.structure_type"
                                           id="structure-type">
                                </div>
                            @endif
                        </div>
                    </div>
                    @error('structure_type_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="applyMap.current_storey"><b>१.५ हाल निर्माण गर्ने तल्ला संख्या: </b></label>
                        <input type="text"
                               id="applyMap.current_storey"
                               wire:model="applyMap.current_storey">

                        @error('applyMap.current_storey')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="applyMap.area_of_plinth"><b>१.६ प्लिन्थको क्षेत्रफल: </b></label>
                        <input type="text"
                               id="applyMap.area_of_plinth"
                               wire:model="applyMap.area_of_plinth"
                        >

                        @error('applyMap.area_of_plinth')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="applyMap.future_storey"><b>१.७ भविष्यमा निर्माण गर्ने तल्ला
                                संख्या: </b>
                        </label>
                        <input type="text"
                               id="applyMap.future_storey"
                               wire:model="applyMap.future_storey"
                        >
                        @error('applyMap.future_storey')
                        <p class="text-danger">{{$message}}</p>
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
                               id="applyMap.length"
                               wire:model="applyMap.length"
                        >
                        @error('applyMap.length')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="applyMap.breadth"><b>१.९ कुल भवनको चौडाई: </b></label>
                        <input type="text"
                               id="applyMap.breadth"
                               wire:model="applyMap.breadth"
                        >
                        @error('applyMap.breadth')
                        <p class="text-danger">{{$message}}</p>
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
                               id="applyMap.height"
                               wire:model="applyMap.height"
                        >
                        @error('applyMap.height')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण: </b>
                        <div class="table-responsive">
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
                                        <button type="button" class="btn btn-primary"
                                                wire:click.prevent="addStoreyDetail">थप्नुहोस
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applyMap['storeyDetails'] as $index=>$storeyDetail)
                                    <tr>
                                        <td>
                                            <select
                                                wire:model="applyMap.storeyDetails.{{$index}}.map_fee_id">
                                                <option value="">छान्नुहोस्</option>
                                                @foreach($mapFees as $mapFee)
                                                    <option value="{{$mapFee->id}}">{{$mapFee->storey}}</option>
                                                @endforeach
                                            </select>
                                            @error("applyMap.storeyDetails.".$index.".map_fee_id")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.area_of_proposed_construction"
                                                   wire:model="applyMap.storeyDetails.{{$index}}.area_of_proposed_construction"
                                            >
                                            @error("applyMap.storeyDetails.".$index.".area_of_proposed_construction")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.area_of_former_construction"
                                                   wire:model="applyMap.storeyDetails.{{$index}}.area_of_former_construction"
                                            >
                                            @error("applyMap.storeyDetails.".$index.".area_of_former_construction")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.total_area"
                                                   wire:model="applyMap.storeyDetails.{{$index}}.total_area"
                                            >
                                            @error("applyMap.storeyDetails.".$index.".total_area")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.height"
                                                   wire:model="applyMap.storeyDetails.{{$index}}.height"
                                            >
                                            @error("applyMap.storeyDetails.".$index.".height")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"
                                                    wire:click.prevent="removeStoreyDetail({{$index}})">हटाउनुहोस्
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        @error("applyMap.storeyDetails")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
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
                    <div class="col-md-6">
                        <label
                            for="landDescription.land_use_area"><b>२.१ भू-उपयोग्य क्षेत्र: </b></label>
                        <input type="text"
                               id="landDescription.land_use_area"
                               wire:model="landDescription.land_use_area"
                        >
                        @error('landDescription.land_use_area')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="convert_to">Convert To</label>
                        <select name="convert_to" id="convert_to" wire:model="conversion_id"
                                wire:change="conversionLogic">
                            <option value="">Select conversion Unit</option>
                            @foreach($conversion_units as $conversion_unit)
                                <option value="{{$conversion_unit->id}}">{{$conversion_unit->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label
                            for="landDescription.ward_no"><b>२.२ वडा नं: </b></label>
                        <input type="text"
                               id="landDescription.ward_no"
                               wire:model="landDescription.ward_no"
                        >
                        @error('landDescription.ward_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.former_ward_no"><b>२.३ साविक वडा नं: </b></label>
                        <input type="text"
                               id="landDescription.former_ward_no"
                               wire:model="landDescription.former_ward_no"
                        >
                        @error('landDescription.former_ward_no')
                        <p class="text-danger">{{$message}}</p>
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
                               id="landDescription.tole"
                               wire:model="landDescription.tole"
                        >
                        @error('landDescription.tole')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label
                            for="landDescription.street_code_no"><b>२.५ सडक कोड नं: </b></label>
                        <input type="text"
                               id="landDescription.street_code_no"
                               wire:model="landDescription.street_code_no"
                        >
                        @error('landDescription.street_code_no')
                        <p class="text-danger">{{$message}}</p>
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
                               id="landDescription.plot_no"
                               wire:model="landDescription.plot_no"
                        >
                        @error('landDescription.plot_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>२.७ क्षेत्रफल </b>
                        @foreach($units as $index=>$unit)
                            <label for="{{$unit->id}}">{{$unit->title}}</label>
                            <input type="text" id="{{$unit->id}}" wire:model="conversion.data{{$index}}" readonly>
                        @endforeach

                        {{'('}}
                        <input type="text"
                               id="landDescription.unit_value"
                               wire:model="landDescription.unit_value"
                        >
                        <label
                            for="landDescription.unit_value">{{$setting->standardLandMeasurement->title ?? ''}}</label>
                        @error('landDescription.unit_value')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        {{')'}}
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label
                            for="landDescription.percentage_of_area_covered_by_building">
                            <b>२.८ भवनले ढाक्ने
                                क्षेत्रफलको प्रतिशत (GCR): </b>
                        </label>
                        <input type="text"
                               id="landDescription.percentage_of_area_covered_by_building"
                               wire:model="landDescription.percentage_of_area_covered_by_building"
                        >
                        @error('landDescription.percentage_of_area_covered_by_building')
                        <p class="text-danger">{{$message}}</p>
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
                                   id="{{$landOwnerType->name}}"
                                   wire:model="landOwner.land_owner_type"
                                   value="{{$landOwnerType->value}}">
                            <label
                                for="{{$landOwnerType->name}}">{{$landOwnerType->label()}}</label>
                        </div>
                    @endforeach
                    @error('landOwner.land_owner_type')
                    <p class="text-danger">{{$message}}</p>
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
                                           id="name"
                                           wire:model="landOwner.name"
                                    >
                                    @error('landOwner.name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="phone">१.२ फोन नं. :</label>
                                    <input type="text"
                                           id="phone"
                                           wire:model="landOwner.phone"
                                    >
                                    @error('landOwner.phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="father_name">१.३ बुवाको नाम :</label>
                                    <input type="text"
                                           id="father_name"
                                           wire:model="landOwner.father_name"
                                    >
                                    @error('landOwner.father_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="landOwner.citizenship_issue_district_id">१.४ नागरिकता लिएको जिल्ला
                                        :</label>
                                    <select wire:model="landOwner.citizenship_issue_district_id"
                                            id="landOwner.citizenship_issue_district_id">
                                        <option value=""></option>
                                        @foreach($allDistricts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->district}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('landOwner.citizenship_issue_district_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="citizenship_no">१.५ नागरिकत नम्बर :</label>
                                    <input type="text"
                                           id="citizenship_no"
                                           wire:model="landOwner.citizenship_no"
                                    >
                                    @error('landOwner.citizenship_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="citizenship_issue_date">१.६ नागरिकता लिएको मिति :
                                        :</label>
                                    <input type="text"
                                           id="citizenship_issue_date"
                                           wire:model="landOwner.citizenship_issue_date"
                                    >
                                    @error('landOwner.citizenship_issue_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="landOwner.address">१.७ ठेगाना :</label>
                                    <input type="text"
                                           id="landOwner.address"
                                           wire:model="landOwner.address"
                                    >
                                    @error('landOwner.address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>

                                </td>
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
                                    <label for="houseOwner.name">१.१ नाम :</label>
                                    <input type="text"
                                           id="houseOwner.name"
                                           wire:model="houseOwner.name"
                                    >
                                    @error('houseOwner.name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="houseOwner.phone">१.२ फोन नं. :</label>
                                    <input type="text"
                                           id="houseOwner.phone"
                                           wire:model="houseOwner.phone"
                                    >
                                    @error('houseOwner.phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="houseOwner.father_name">१.३ बुवाको नाम :</label>
                                    <input type="text"
                                           id="houseOwner.father_name"
                                           wire:model="houseOwner.father_name"
                                    >
                                    @error('houseOwner.father_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="houseOwner.citizenship_issue_district">
                                        १.४ नागरिकता लिएको जिल्ला
                                        :
                                    </label>
                                    <select wire:model="houseOwner.citizenship_issue_district_id">
                                        <option value=""></option>
                                        @foreach($allDistricts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->district}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('houseOwner.citizenship_issue_district_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="houseOwner.citizenship_no">
                                        १.५ नागरिकत नम्बर :
                                    </label>
                                    <input type="text"
                                           id="houseOwner.citizenship_no"
                                           wire:model="houseOwner.citizenship_no"
                                    >
                                    @error('houseOwner.citizenship_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="citizenship_issue_date">
                                        १.६ नागरिकता लिएको मिति :
                                    </label>
                                    <input type="text"
                                           id="houseOwner.citizenship_issue_date"
                                           wire:model="houseOwner.citizenship_issue_date"
                                    >
                                    @error('houseOwner.citizenship_issue_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="houseOwner.address">
                                        १.७ ठेगाना :
                                    </label>
                                    <input type="text"
                                           id="houseOwner.address"
                                           wire:model="houseOwner.address"
                                    >
                                    @error('houseOwner.address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>

                                </td>
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
                        <div class="table-responsive">
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
                                @foreach($fourFortDetails as $key=>$fourFort)
                                    <tr>
                                        <td>
                                            <label
                                                for="fourFortDetail.detail">
                                                १.{{$loop->iteration}} {{\Modules\EMap\Enums\FourSideParticularEnum::tryFrom($fourFort['detail'])->label()}}
                                            </label>
                                            <input type="hidden"
                                                   id="fourFortDetails.{{$key}}.detail"
                                                   wire:model="fourFortDetails.{{$key}}.detail"
                                            >
                                            @error("fourFortDetails.$key.detail")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.east"
                                                   wire:model="fourFortDetails.{{$key}}.east"
                                            >
                                            @error("fourFortDetails.$key.east")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.south"
                                                   wire:model="fourFortDetails.{{$key}}.south"
                                            >
                                            @error("fourFortDetails.$key.south")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.west"
                                                   wire:model="fourFortDetails.{{$key}}.west"
                                            >
                                            @error("fourFortDetails.$key.west")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.north"
                                                   wire:model="fourFortDetails.{{$key}}.north"
                                            >
                                            @error("fourFortDetails.$key.north")
                                            <p class="text-danger">{{$message}}</p>
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
        </div>

    </fieldset>

    <fieldset>
        <legend>६. डिजाइनरको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>पद</th>
                                    <th>नाम</th>
                                    <th>फोन</th>
                                    <th>ठेगाना</th>
                                    <th>NEC Council No.</th>
                                    <th>पालिकाको दर्ता नं</th>
                                    <th>कन्सल्टिंग फर्मबाट भए सो को नाम</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($designerDetails as $key=>$designerDetail)
                                    <tr>
                                        <td>
                                            <label
                                                for="designerDetails.{{$key}}.post">
                                                १.{{$loop->iteration}} {{\Modules\EMap\Enums\PostsEnum::tryFrom($designerDetail['post'])->label()}}
                                            </label>
                                            <input type="hidden"
                                                   id="designerDetails.{{$key}}.post"
                                                   wire:model="designerDetails.{{$key}}.post"
                                            >
                                            @error("designerDetails.$key.post")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="designerDetails.{{$key}}.name"
                                            >
                                            @error("designerDetails.$key.name")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="designerDetails.{{$key}}.phone"
                                            >
                                            @error("designerDetails.$key.phone")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="designerDetails.{{$key}}.address"
                                            >
                                            @error("designerDetails.$key.address")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="designerDetails.{{$key}}.nec_council_no"
                                                   wire:model="designerDetails.{{$key}}.nec_council_no"
                                            >
                                            @error("designerDetails.$key.nec_council_no")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="designerDetails.{{$key}}.local_body_registration_no"
                                                   wire:model="designerDetails.{{$key}}.local_body_registration_no"
                                            >
                                            @error("designerDetails.$key.local_body_registration_no")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="designerDetails.{{$key}}.consulting_firm_name"
                                                   wire:model="designerDetails.{{$key}}.consulting_firm_name"
                                            >
                                            @error("designerDetails.$key.consulting_firm_name")
                                            <p class="text-danger">{{$message}}</p>
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
                                   id="{{$applicantType->name}}"
                                   wire:model="applicantDetail.applicant_type"
                                   value="{{$applicantType->value}}">
                            <label
                                for="{{$applicantType->name}}">{{$applicantType->label()}}</label>
                        </div>
                    @endforeach
                    @error('applicantDetail.applicant_type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">७.२ घरधनी सँगको सम्बन्ध</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\RelationEnum::cases() as $relation)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$relation->name}}"
                                   wire:model="applicantDetail.relation_with_owner"
                                   value="{{$relation->value}}">
                            <label
                                for="{{$relation->name}}">{{$relation->label()}}</label>
                        </div>
                    @endforeach
                    @error('applicantDetail.relation_with_owner')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            @if($applicantDetail['applicant_type']==='inheritance')
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <b>जग्गाधनी वा घरधनी भन्दा फरक भएमा</b>
                            <table
                                class="table table-hover table-responsive table-bordered">
                                <tbody>
                                <tr>
                                    <td>
                                        <label for="applicantDetail.name">१.१ नाम :</label>
                                        <input type="text"
                                               id="applicantDetail.name"
                                               wire:model="applicantDetail.name"
                                        >
                                        @error('applicantDetail.name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="applicantDetail.phone">१.२ फोन नं. :</label>
                                        <input type="text"
                                               id="applicantDetail.phone"
                                               wire:model="applicantDetail.phone"
                                        >
                                        @error('applicantDetail.phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="applicantDetail.father_name">१.३ बुवाको नाम :</label>
                                        <input type="text"
                                               id="applicantDetail.father_name"
                                               wire:model="applicantDetail.father_name"
                                        >
                                        @error('applicantDetail.father_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="applicantDetail.citizenship_issue_district_id">
                                            १.४ नागरिकता लिएको
                                            जिल्ला :
                                        </label>
                                        <select wire:model="applicantDetail.citizenship_issue_district_id">
                                            <option value=""></option>
                                            @foreach($allDistricts as $district)
                                                <option value="{{$district->id}}">
                                                    {{$district->district}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('applicantDetail.citizenship_issue_district_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="applicantDetail.citizenship_no">१.५ नागरिकत नम्बर :</label>
                                        <input type="text"
                                               id="applicantDetail.citizenship_no"
                                               wire:model="applicantDetail.citizenship_no"
                                        >
                                        @error('applicantDetail.citizenship_no')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="applicantDetail.citizenship_issue_date">
                                            १.६ नागरिकता लिएको मिति :
                                            :
                                        </label>
                                        <input type="text"
                                               id="applicantDetail.citizenship_issue_date"
                                               wire:model="applicantDetail.citizenship_issue_date"
                                        >
                                        @error('applicantDetail.citizenship_issue_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </fieldset>
    <div class="d-flex justify-content-between ">
        <div>
            <div>
                <input type="text"
                       id="application_date"
                       wire:model="applicantDetail.application_date"
                >
            </div>
            <div class="px-5">
                <label
                    for="application_date"><b>निबेदनको मिति : </b></label>
            </div>

            @error('applicantDetail.application_date')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div>

            <div>
                <input type="file"
                       id="applicant_signature"
                       wire:model="applicantDetail.signature"
                >
            </div>
            <div class="px-5">
                <label
                    for="applicant_signature"><b>निवेदकको सहि: </b></label>
            </div>
            @error('applicantDetail.signature')
            <p class="text-danger">{{$message}}</p>
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
                            @foreach($criteriaDetails as $key=>$criteriaDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <label
                                            for="name">
                                            {{\Modules\EMap\Enums\DetailsRegardingCriteriaEnum::tryFrom($criteriaDetail['detail'])->label()}}
                                        </label>
                                        <input type="hidden"
                                               id="criteriaDetails.{{$key}}.detail"
                                               wire:model="criteriaDetails.{{$key}}.detail"
                                        >
                                        @error("criteriaDetails.$key.detail")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               wire:model="criteriaDetails.{{$key}}.according_to_criteria"
                                        >
                                        @error("criteriaDetails.$key.according_to_criteria")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               wire:model="criteriaDetails.{{$key}}.according_to_map"
                                        >
                                        @error("criteriaDetails.$key.according_to_map")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               wire:model="criteriaDetails.{{$key}}.compliance"
                                        >
                                        @error("criteriaDetails.$key.compliance")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>

                                    <td>
                                        <input type="text"
                                               wire:model="criteriaDetails.{{$key}}.remarks"
                                        >
                                        @error("criteriaDetails.$key.remarks")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                            @error("criteriaDetails")
                            <p class="text-danger">{{$message}}</p>
                            @enderror

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
                            @foreach($buildingDetails as $key=>$buildingDetail)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <label
                                            for="name">
                                            {{\Modules\EMap\Enums\BuildingDetailEnum::tryFrom($buildingDetail['detail'])->label()}}
                                        </label>
                                        <input type="hidden"
                                               id="detail"
                                               wire:model="buildingDetails.{{$key}}.detail"
                                        >
                                        @error("buildingDetails.$key.detail")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               wire:model="buildingDetails.{{$key}}.description"
                                        >
                                        @error("buildingDetails.$key.description")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text"
                                               wire:model="buildingDetails.{{$key}}.remarks"
                                        >
                                        @error("buildingDetails.$key.remarks")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                            @error("buildingDetails")
                            <p class="text-danger">{{$message}}</p>
                            @enderror

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
                       wire:model="applyMap.consultant_signature"
                       id="applyMap.consultant_signature"
                >
            </div>
            <div class="px-5">
                <label
                    for="applyMap.consultant_signature">
                    <b>(कन्सल्टेन्ट इंन्जिनियरको सहि): </b>
                </label>
            </div>
            @error('applyMap.consultant_signature')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_name">
                    <b>नाम: </b>
                </label>
                <input type="text"
                       wire:model="applyMap.consultant_name"
                       id="applyMap.consultant_name">
            </div>
            @error('applyMap.consultant_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_mobile_no"><b>मोबाइल नं.: </b></label>
                <input type="text"
                       wire:model="applyMap.consultant_mobile_no"
                       id="applyMap.consultant_mobile_no"
                >
            </div>
            @error('applyMap.consultant_mobile_no')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <label
                    for="applyMap.consultant_nec_no"><b>एन. ई. सी. नं: </b></label>
                <input type="text"
                       wire:model="applyMap.consultant_nec_no"
                       id="applyMap.consultant_nec_no"
                >
            </div>
            @error('applyMap.consultant_nec_no')
            <p class="text-danger">{{$message}}</p>
            @enderror

        </div>
    </div>
    <div class="mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary    ">Save</button>
    </div>
</form>
