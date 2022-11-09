<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
<button wire:click.prevent="setEditForm"><i class="fa fa-pen"></i></button>

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
                                   value="{{$constructionType->value}}"
                                {{$editForm ? '' : 'disabled'}}
                            >
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
                                   value="{{$usages->value}}"
                                {{$editForm ? '' : 'disabled'}}
                            >
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
                                   value="{{$categorization->value}}"
                                {{$editForm ? '' : 'disabled'}}
                            >
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
                                   value="{{$structureType->id}}"
                                {{$editForm ? '' : 'disabled'}}
                            >
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
                                       value="1"
                                    {{$editForm ? '' : 'disabled'}}
                                >
                                <label
                                    for="open_structure_type" wire:click.prevent="setStructureType">अन्य</label>
                            </div>
                            @if($open_structure_type)
                                <div class="col-md-8">
                                    <label for="structure-type">
                                        <input type="text"
                                               wire:model="applyMap.structure_type"
                                               id="structure-type"
                                            {{$editForm ? '' : 'disabled'}}
                                        >
                                    </label>
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
                               wire:model="applyMap.current_storey"
                            {{$editForm ? '' : 'disabled'}}
                        >

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
                            {{$editForm ? '' : 'disabled'}}
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
                            {{$editForm ? '' : 'disabled'}}
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
                            {{$editForm ? '' : 'disabled'}}
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
                            {{$editForm ? '' : 'disabled'}}
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
                            {{$editForm ? '' : 'disabled'}}
                        >
                        @error('applyMap.height')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </fieldset>
    @if($editForm)
        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary    ">Save</button>
        </div>
    @endif

</form>
