<div class="overflow-hidden p-2">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 1 ? 'active' : '' }}">
                        <i class="fa fa-building me-1"></i>
                        <span class="d-none d-sm-inline fs-5 fw-bold">भवन विवरण</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 2 ? 'active' : '' }}">
                        <i class="fa fa-user me-1"></i>
                        <span class="d-none d-sm-inline  fs-5 fw-bold">संधियारको विवरण</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 3 ? 'active' : '' }}">
                        <i class="fa fa-file me-1"></i>
                        <span class="d-none d-sm-inline  fs-5 fw-bold">कागजातहरु</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if ($progressPercentage > 0)
        <div id="bar" class="progress mb-3" style="height: 7px;">
            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"
                style="width: {{ $progressPercentage }}%"></div>
        </div>
    @endif
    <form wire:submit.prevent="submitForm">
        @switch($currentStep)
            @case(3)
                <fieldset>
                    <div class="col-md-12 main">
                        <div class="row ">
                            <div class="col-md-4 mb-1">
                                <label for="application_date" class="form-label"> आवेदन मिति बि. सं. <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.application_date') is-invalid @enderror"
                                        type="text" id="application_date" wire:model="form.application_date"
                                        placeholder="आवेदन मिति बि. सं.">
                                    @error('form.application_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="applicant_name" class="form-label"> आवेदनकर्ताको नाम <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.applicant_name') is-invalid @enderror"
                                        type="text" id="applicant_name" wire:model="form.applicant_name"
                                        placeholder="आवेदनकर्ताको नाम">
                                    @error('form.applicant_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="mb-2">
                    <label for="requiredDocument" class="form-label"> आबश्यक कागजातहरु <span
                            class="text-danger">*</span></label>
                    <fieldset>
                        <div class="col-md-12 main">
                            <div class="row ">
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.citizenship" class="form-label">नेपाली
                                        नागरिकताको प्रमाण पत्रको प्रतिलिपी <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.citizenship') is-invalid @enderror"
                                            type="file" id="requiredDocument.citizenship"
                                            wire:model="requiredDocument.citizenship" placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.citizenship')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.landowner_proved" class="form-label">जग्गाधनि प्रमाण
                                        पत्रको
                                        प्रतिलिपी <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.landowner_proved') is-invalid @enderror"
                                            type="file" id="requiredDocument.landowner_proved"
                                            wire:model="requiredDocument.landowner_proved"
                                            placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.landowner_proved')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.revenue" class="form-label">चालु आ.व को घर
                                        जग्गा कर तिरेको रसिदको प्रतिलिपि <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.revenue') is-invalid @enderror"
                                            type="file" id="requiredDocument.revenue"
                                            wire:model="requiredDocument.revenue" placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.revenue')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.building_map" class="form-label">घरको नक्सा
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.building_map') is-invalid @enderror"
                                            type="file" id="requiredDocument.building_map"
                                            wire:model="requiredDocument.building_map" placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.building_map')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.land_map" class="form-label">जग्गाको नक्सा
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.land_map') is-invalid @enderror"
                                            type="file" id="requiredDocument.land_map"
                                            wire:model="requiredDocument.land_map" placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.land_map')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.all_round_house_pic" class="form-label">चारैतिरको फोटो
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.all_round_house_pic') is-invalid @enderror"
                                            type="file" id="requiredDocument.all_round_house_pic"
                                            wire:model="requiredDocument.all_round_house_pic"
                                            placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.all_round_house_pic')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="requiredDocument.photo" class="form-label">घरधनिको फोटो
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input
                                            class="form-control @error('requiredDocument.photo') is-invalid @enderror"
                                            type="file" id="requiredDocument.photo"
                                            wire:model="requiredDocument.photo" placeholder="आवेदन मिति बि. सं.">
                                        @error('requiredDocument.photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <legend>
                        <strong>
                            अन्य फाइलहरु
                        </strong>
                    </legend>
                    <div class="col-md-12 mb-2">
                        <div class="d-flex align-items-center justify-content-end mb-1">
                            <label for="file" class="form-label fw-bold"> </label>
                            <button type="button" class="btn btn-xs btn-outline-info"
                                wire:click.prevent="fileArrayIncrement" data-toggle="add-more">
                                <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </button>
                        </div>
                        <fieldset class="bg-soft-secondary">
                            <div id="documents">
                                <div class="main">
                                    @foreach ($form['files'] as $key => $file)
                                        <div class="row border-bottom mb-2">
                                            <div class="col-md-5 mb-2">
                                                <label for="form.files.{{ $key }}.file_name" class="form-label">
                                                    शीर्षक*</label>
                                                <input
                                                    class="form-control @error('form.files.' . $key . '.file_name') is-invalid @enderror"
                                                    type="text" id="form.files.{{ $key }}.file_name"
                                                    wire:model="form.files.{{ $key }}.file_name"
                                                    placeholder="शीर्षक">
                                                @error("form.files.$key.file_name")
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="form.files.{{ $key }}.file" class="form-label">डकुमेन्ट
                                                    *</label>
                                                <input
                                                    class="form-control @error('form.files.' . $key . '.file') is-invalid @enderror"
                                                    type="file" name="files[][file]"
                                                    wire:model="form.files.{{ $key }}.file" placeholder="शीर्षक"
                                                    id="form.files.{{ $key }}.file" />
                                                <div wire:loading wire:target="form.files.{{ $key }}.file">
                                                    Uploading...</div>
                                            </div>
                                            <div class="col-md-1 mb-2">
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    wire:click.prevent="fileArrayDecrement({{ $key }})">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </fieldset>

                <div class="mt-3">
                    <div class="next d-flex justify-content-around">
                        <button type="button" wire:click.prevent="backStep(2)" class="btn btn-info">
                            <i class="fa fa-arrow-circle-left"></i> पछाडि
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> पेश गर्नुहोस्
                        </button>
                    </div>
                </div>
            @break

            @case(2)
                <legend>
                    <strong>
                        अन्य फाइलहरु
                    </strong>
                </legend>
                <div class="col-md-12 mb-2">
                    <div class="d-flex align-items-center justify-content-end mb-1">
                        <label for="neighbour" class="form-label fw-bold"> </label>
                        <button type="button" class="btn btn-xs btn-outline-info"
                            wire:click.prevent="neighbourArrayIncrement" data-toggle="add-more">
                            <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </button>
                    </div>
                    <fieldset class="bg-soft-secondary">
                        <div id="documents">
                            <div class="col-md-12 main">
                                @foreach ($form['neighbours'] as $key => $file)
                                    <div class="row border-bottom mb-2">
                                        <div class="col-md-4 mb-2">
                                            <label for="form.neighbours.{{ $key }}.direction" class="form-label">
                                                शीर्षक*</label>
                                            <select
                                                class="form-select @error('form.neighbours.' . $key . '.direction') is-invalid @enderror"
                                                id="form.neighbours.{{ $key }}.direction"
                                                wire:model="form.neighbours.{{ $key }}.direction">
                                                <option value="">---छान्नुहोस् ----</option>
                                                @foreach (\Modules\EMap\Enums\NeighbourTypeEnum::cases() as $case)
                                                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error("form.neighbours.$key.direction")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="form.neighbours.{{ $key }}.neighbour_name"
                                                class="form-label">
                                                नाम*</label>
                                            <input
                                                class="form-control @error('form.neighbours.' . $key . '.neighbour_name') is-invalid @enderror"
                                                type="text" id="form.neighbours.{{ $key }}.neighbour_name"
                                                wire:model="form.neighbours.{{ $key }}.neighbour_name"
                                                placeholder=" नाम">
                                            @error("form.neighbours.$key.neighbour_name")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="form.neighbours.{{ $key }}.ward_no" class="form-label">
                                                वार्ड*</label>
                                            <input
                                                class="form-control @error('form.neighbours.' . $key . '.ward_no') is-invalid @enderror"
                                                type="text" id="form.neighbours.{{ $key }}.ward_no"
                                                wire:model="form.neighbours.{{ $key }}.ward_no" placeholder="वार्ड">
                                            @error("form.neighbours.$key.ward_no")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-1 mb-2">
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                wire:click.prevent="neighbourArrayDecrement({{ $key }})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="mt-3">
                    <span class="next d-flex justify-content-around">
                        <button type="button" wire:click.prevent="backStep(1)" class="btn btn-info">
                            <i class="fa fa-arrow-circle-left"></i> पछाडि
                        </button>
                        <button type="button" wire:click.prevent="nextStep(3)" class="btn btn-info">
                            अर्को <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </span>
                </div>
            @break

            @default
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder">भवन विवरण</legend>
                    <div class="row">
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="house_owner_name" class="form-label">घरधनिको नाम <span
                                    class="text-danger">*</span></label>


                            <input class="form-control @error('form.house_owner_name') is-invalid @enderror" type="text"
                                id="house_owner_name" wire:model="form.house_owner_name" placeholder="घरधनिको नाम">
                            @error('form.house_owner_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-2 pr-0">
                            <label for="phone" class="form-label">सम्पर्क नं <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.phone') is-invalid @enderror" type="text"
                                id="phone" wire:model="form.phone" placeholder="सम्पर्क नं">
                            @error('form.phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="area" class="form-label">घरको क्षेत्रफल <span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('form.area') is-invalid @enderror" type="text"
                                id="area" wire:model="form.area" placeholder="घरको क्षेत्रफल">
                            @error('form.area')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="house_built_year" class="form-label">घर बनेको बर्ष <span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('form.house_built_year') is-invalid @enderror" type="number"
                                id="house_built_year" wire:model="form.house_built_year" placeholder="घर बनेको बर्ष">
                            @error('form.house_built_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="room" class="form-label">कोठा संख्या <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.room') is-invalid @enderror" type="number"
                                id="room" wire:model="form.room" placeholder="कोठा संख्या">
                            @error('form.room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="storey" class="form-label">घरको तल्ला <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.storey') is-invalid @enderror" type="number"
                                id="storey" wire:model="form.storey" placeholder="घरको तल्ला">
                            @error('form.storey')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="building_category" class="form-label">घरको किसिम <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('form.building_category') is-invalid @enderror"
                                id="form.building_category" wire:model="form.building_category">
                                <option value="">---छान्नुहोस् ----</option>
                                @foreach (\Modules\EMap\Enums\BuildingTypeEnum::cases() as $case)
                                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                                @endforeach
                            </select>
                            @error('form.building_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="length" class="form-label">घरको लम्बाई <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.length') is-invalid @enderror" type="text"
                                id="length" wire:model="form.length" placeholder="घरको लम्बाई">
                            @error('form.length')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="breadth" class="form-label">घरको चौडाई <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.breadth') is-invalid @enderror" type="text"
                                id="breadth" wire:model="form.breadth" placeholder="घरको चौडाई">
                            @error('form.breadth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="height" class="form-label">घरको उचाई <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.height') is-invalid @enderror" type="text"
                                id="height" wire:model="form.height" placeholder="घरको उचाई ">
                            @error('form.height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2 pr-0">
                            <label for="other" class="form-label">अन्य <span class="text-danger">*</span></label>
                            <input class="form-control @error('form.other') is-invalid @enderror" type="text"
                                id="other" wire:model="form.other" placeholder="अन्य ">
                            @error('form.other')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="form.province_id" class="form-label">प्रदेश</label>
                                <select class="form-select @error('form.province_id') is-invalid @enderror"
                                    id="form.province_id" wire:model="form.province_id">
                                    <option value="">---प्रदेश छान्नुहोस् ----</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id ?? '' }}">{{ $province->province ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('form.province_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.district_id" class="form-label">जिल्ला</label>
                                <select class="form-select @error('form.district_id') is-invalid @enderror"
                                    id="form.district_id" wire:model="form.district_id">
                                    <option value="">---जिल्ला छान्नुहोस् ----</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->district }}</option>
                                    @endforeach
                                </select>
                                @error('form.district_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.local_body_id" class="form-label">पालिका</label>
                                <select class="form-select @error('form.local_body_id') is-invalid @enderror"
                                    id="form.local_body_id" wire:model="form.local_body_id">
                                    <option value="">---पालिका छान्नुहोस् ----</option>
                                    @foreach ($localBodies as $localBody)
                                        <option value="{{ $localBody->id }}">{{ $localBody->local_body }}</option>
                                    @endforeach
                                </select>
                                @error('form.local_body_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="ward_no" class="form-label">वार्ड न:</label>
                                <select class="form-select @error('form.ward_no') is-invalid @enderror" id="ward_no"
                                    wire:model="form.ward_no">
                                    <option value="">---वडा छान्नुहोस् ----</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward }}">{{ $ward }}</option>
                                    @endforeach
                                </select>
                                @error('form.ward_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-1">
                                <label for="form.tole" class="form-label">गाउँ/टोल</label>
                                <input name="form.tole" class="form-control @error('form.tole') is-invalid @enderror"
                                    type="text" id="form.tole" placeholder="गाउँ/टोल" wire:model="form.tole" />
                                @error('form.tole')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </fieldset>
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder"> जग्गाको विवरण</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="land_area" class="form-label"> जग्गा क्षेत्रफल<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('form.land_area') is-invalid @enderror" type="text"
                                    step="any" id="land_area" wire:model="form.land_area" placeholder="जग्गा क्षेत्रफल">
                                @error('form.land_area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="plot_no" class="form-label"> जग्गाको कित्ता नं.</label>
                            <div class="input-group">
                                <input class="form-control @error('form.plot_no') is-invalid @enderror" type="text"
                                    step="any" id="plot_no" wire:model="form.plot_no"
                                    placeholder="जग्गाको कित्ता नं.">
                                @error('form.plot_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="road_jurisdiction" class="form-label"> सडक अधिकार क्षेत्र</label>
                            <div class="input-group">
                                <input class="form-control @error('form.road_jurisdiction') is-invalid @enderror"
                                    type="text" step="any" id="road_jurisdiction" wire:model="form.road_jurisdiction"
                                    placeholder="सडक अधिकार क्षेत्र">
                                @error('form.road_jurisdiction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="land_detail" class="form-label"> जग्गा विवरण</label>
                            <div class="input-group">
                                <input class="form-control @error('form.land_detail') is-invalid @enderror" type="text"
                                    step="any" id="land_detail" wire:model="form.land_detail" placeholder="जग्गा विवरण">
                                @error('form.land_detail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="land_ward_no" class="form-label"> वार्ड नं.</label>
                            <div class="input-group">
                                <input class="form-control @error('form.land_ward_no') is-invalid @enderror" type="text"
                                    step="any" id="land_ward_no" wire:model="form.land_ward_no" placeholder="जग्गाको हाल वार्ड नं.">
                                @error('form.land_ward_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="former_district" class="form-label">साविक जिल्ला </label>
                            <div class="input-group">
                                <input class="form-control @error('form.former_district') is-invalid @enderror"
                                    type="text" step="any" id="former_district" wire:model="form.former_district"
                                    placeholder="साविक जिल्ला ">
                                @error('form.former_district')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="former_local_body" class="form-label"> साविक पालिका</label>
                            <div class="input-group">
                                <input class="form-control @error('form.former_local_body') is-invalid @enderror"
                                    type="text" step="any" id="former_local_body" wire:model="form.former_local_body"
                                    placeholder="साविक पालिका">
                                @error('form.former_local_body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="former_ward_no" class="form-label">साविक वार्ड नं.</label>
                            <div class="input-group">
                                <input class="form-control @error('form.former_ward_no') is-invalid @enderror" type="text"
                                    step="any" id="former_ward_no" wire:model="form.former_ward_no"
                                    placeholder="जग्गाको कित्ता नं">
                                @error('form.former_ward_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </fieldset>

                <ul class="list-inline wizard mt-3">
                    <li class="next d-flex justify-content-end">
                        <button type="button" wire:click.prevent="nextStep(2)" class="btn btn-primary fs-5">
                            अर्को <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </li>
                </ul>
        @endswitch
    </form>
</div>
<style>
    .nav-link {
        background-color: #f5f5f5 !important;
    }

    fieldset {
        border-color: #ccc !important;
        border-width: 1px;
        padding: 25px;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 3px !important;
        font-size: 15px;
        color: #333;
    }
</style>
