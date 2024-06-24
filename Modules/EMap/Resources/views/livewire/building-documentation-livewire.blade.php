<div class="overflow-hidden p-2">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 1 ? 'active' : '' }}">
                        <i class="fa fa-building me-1"></i>
                        <span class="d-none d-sm-inline fs-5 fw-bold"> विवरण</span>
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
    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        @switch($currentStep)
        @case(3)
        <fieldset>
            <div class="col-md-12 main">
                <div class="row ">
                    <div class="col-md-4 mb-1">
                        <label for="application_date" class="form-label"> आवेदन मिति बि. सं. <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control @error('form.application_date') is-invalid @enderror" type="text"
                                id="application_date" wire:model="form.application_date"
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
                            <input class="form-control @error('form.applicant_name') is-invalid @enderror" type="text"
                                id="applicant_name" wire:model="form.applicant_name" placeholder="आवेदनकर्ताको नाम">
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
                                <input class="form-control @error('requiredDocument.citizenship') is-invalid @enderror"
                                    type="file" id="requiredDocument.citizenship"
                                    wire:model="requiredDocument.citizenship" placeholder="आवेदन मिति बि. सं.">
                                @error('requiredDocument.citizenship')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="requiredDocument.buildingLandOwner_proved" class="form-label">जग्गाधनि प्रमाण
                                पत्रको
                                प्रतिलिपी <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input
                                    class="form-control @error('requiredDocument.buildingLandOwner_proved') is-invalid @enderror"
                                    type="file" id="requiredDocument.buildingLandOwner_proved"
                                    wire:model="requiredDocument.buildingLandOwner_proved"
                                    placeholder="आवेदन मिति बि. सं.">
                                @error('requiredDocument.buildingLandOwner_proved')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="requiredDocument.revenue" class="form-label">चालु आ.व को घर
                                जग्गा कर तिरेको रसिदको प्रतिलिपि <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('requiredDocument.revenue') is-invalid @enderror"
                                    type="file" id="requiredDocument.revenue" wire:model="requiredDocument.revenue"
                                    placeholder="आवेदन मिति बि. सं.">
                                @error('requiredDocument.revenue')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="requiredDocument.building_map" class="form-label">घरको नक्सा
                                <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('requiredDocument.building_map') is-invalid @enderror"
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
                                <input class="form-control @error('requiredDocument.land_map') is-invalid @enderror"
                                    type="file" id="requiredDocument.land_map" wire:model="requiredDocument.land_map"
                                    placeholder="आवेदन मिति बि. सं.">
                                @error('requiredDocument.land_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="requiredDocument.files" class="form-label">चारैतिरको फोटो
                                <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group">
                                    {{-- <input
                                        class="form-control @error('requiredDocument.other_document') is-invalid @enderror"
                                        type="file" id="other" wire:model="requiredDocument.other_document" multiple>
                                    --}}
                                    <input class="form-control @error('requiredDocument.files.') is-invalid @enderror"
                                        type="file" name="files[][file]" wire:model="requiredDocument.files"
                                        placeholder="शीर्षक" id="requiredDocument.files" />
                                    @error('requiredDocument.files')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="requiredDocument.photo" class="form-label">घरधनिको फोटो
                                <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('requiredDocument.photo') is-invalid @enderror"
                                    type="file" id="requiredDocument.photo" wire:model="requiredDocument.photo"
                                    placeholder="घरधनिको फोटो">
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
                    <button type="button" class="btn btn-xs btn-outline-info" wire:click.prevent="fileArrayIncrement"
                        data-toggle="add-more">
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
                                        wire:model="form.files.{{ $key }}.file_name" placeholder="शीर्षक">
                                    @error("form.files.$key.file_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="form.files.{{ $key }}.file" class="form-label">डकुमेन्ट
                                        *</label>
                                    <input
                                        class="form-control @error('form.files.' . $key . '.file') is-invalid @enderror"
                                        type="file" name="files[][file]" wire:model="form.files.{{ $key }}.file"
                                        placeholder="शीर्षक" id="form.files.{{ $key }}.file" />
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

                संधियारको विवरण

            </strong>
        </legend>
        <div class="col-md-12 mb-2">
            <div class="d-flex align-items-center justify-content-end mb-1">
                <label for="neighbour" class="form-label fw-bold"> </label>
                <button type="button" class="btn btn-xs btn-outline-info" wire:click.prevent="neighbourArrayIncrement"
                    data-toggle="add-more">
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
                                    दिशा*</label>
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
                                <label for="form.neighbours.{{ $key }}.neighbour_name" class="form-label">
                                    नाम*</label>
                                <input
                                    class="form-control @error('form.neighbours.' . $key . '.neighbour_name') is-invalid @enderror"
                                    type="text" id="form.neighbours.{{ $key }}.neighbour_name"
                                    wire:model="form.neighbours.{{ $key }}.neighbour_name" placeholder=" नाम">
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

                            <div class="col-md-4 mb-2">
                                <label for="form.neighbours.{{ $key }}.plot_no" class="form-label">
                                    कित्ता नं</label>
                                <input
                                    class="form-control @error('form.neighbours.' . $key . '.plot_no') is-invalid @enderror"
                                    type="text" id="form.neighbours.{{ $key }}.plot_no"
                                    wire:model="form.neighbours.{{ $key }}.plot_no" placeholder="कित्ता नं">
                                @error("form.neighbours.$key.plot_no")
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

        <legend>
            <strong>
               साविक भवन/निर्माण तला र क्षेत्रफल सम्बन्धित विवरण
            </strong>
        </legend>
        <div class="col-md-12 mb-2">
            <div class="d-flex align-items-center justify-content-end mb-1">
                <label for="buildingStoreyDetail" class="form-label fw-bold"> </label>
                <button type="button" class="btn btn-xs btn-outline-info"
                    wire:click.prevent="buildingStoreyDetailArrayIncrement" data-toggle="add-more">
                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                </button>
            </div>
            <fieldset class="bg-soft-secondary">
                <div id="documents">
                    <div class="col-md-12 main">
                        @foreach ($form['buildingStoreyDetails'] as $key => $file)
                        <div class="row border-bottom mb-2">
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingStoreyDetails.{{ $key }}.storey" class="form-label">
                                    तल्ला*</label>
                                <select
                                    class="form-select @error('form.buildingStoreyDetails.' . $key . '.storey') is-invalid @enderror"
                                    id="form.buildingStoreyDetails.{{ $key }}.storey"
                                    wire:model="form.buildingStoreyDetails.{{ $key }}.storey">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\Modules\EMap\Enums\StoreyTypeEnum::cases() as $case)
                                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                                @error("form.buildingStoreyDetails.$key.storey")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingStoreyDetails.{{ $key }}.area_of_former_construction"
                                    class="form-label">
                                    निर्माणको क्षेत्रफल फिट/मिटर*</label>
                                <input
                                    class="form-control @error('form.buildingStoreyDetails.' . $key . '.area_of_former_construction') is-invalid @enderror"
                                    type="text" id="form.buildingStoreyDetails.{{ $key }}.area_of_former_construction"
                                    wire:model="form.buildingStoreyDetails.{{ $key }}.area_of_former_construction"
                                    placeholder="   निर्माणको क्षेत्रफल">
                                @error("form.buildingStoreyDetails.$key.area_of_former_construction")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingStoreyDetails.{{ $key }}.land_area" class="form-label">
                                    निर्माण भैसकेको जम्मा क्षेत्रफल वर्ग/मिटर फिट/मिटर*</label>
                                <input
                                    class="form-control @error('form.buildingStoreyDetails.' . $key . '.land_area') is-invalid @enderror"
                                    type="text" id="form.buildingStoreyDetails.{{ $key }}.land_area"
                                    wire:model="form.buildingStoreyDetails.{{ $key }}.land_area"
                                    placeholder="जग्गाको क्षेत्रफल">
                                @error("form.buildingStoreyDetails.$key.land_area")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingStoreyDetails.{{ $key }}.remarks" class="form-label">
                                    कैफियत</label>
                                <input
                                    class="form-control @error('form.buildingStoreyDetails.' . $key . '.remarks') is-invalid @enderror"
                                    type="text" id="form.buildingStoreyDetails.{{ $key }}.remarks"
                                    wire:model="form.buildingStoreyDetails.{{ $key }}.remarks" placeholder="कैफियत">
                                @error("form.buildingStoreyDetails.$key.remarks")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-1 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                    wire:click.prevent="buildingStoreyDetailArrayDecrement({{ $key }})">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </fieldset>
        </div>
        <legend>
            <strong>
                भवनको बाहिरि पर्खाल र सिमानासम्माको दुरीको विवरण
            </strong>
        </legend>
        <div class="col-md-12 mb-2">
            <div class="d-flex align-items-center justify-content-end mb-1">
                <label for="buildingDescription" class="form-label fw-bold"> </label>
                <button type="button" class="btn btn-xs btn-outline-info"
                    wire:click.prevent="buildingDescriptionArrayIncrement" data-toggle="add-more">
                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                </button>
            </div>
            <fieldset class="bg-soft-secondary">
                <div id="documents">
                    <div class="col-md-12 main">
                        @foreach ($form['buildingDescriptions'] as $key => $file)
                        <div class="row border-bottom mb-2">
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.direction" class="form-label">
                                    दिशा*</label>
                                <select
                                    class="form-select @error('form.buildingDescriptions.' . $key . '.direction') is-invalid @enderror"
                                    id="form.buildingDescriptions.{{ $key }}.direction"
                                    wire:model="form.buildingDescriptions.{{ $key }}.direction">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\Modules\EMap\Enums\NeighbourTypeEnum::cases() as $case)
                                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                                @error("form.buildingDescriptions.$key.direction")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.has_road"
                                    class="form-label">
                                    सडक छ, छैन</label>
                                <input
                                    class="form-control @error('form.buildingDescriptions.' . $key . '.has_road') is-invalid @enderror"
                                    type="text" id="form.buildingDescriptions.{{ $key }}.has_road"
                                    wire:model="form.buildingDescriptions.{{ $key }}.has_road"
                                    placeholder="  सडक छ, छैन">
                                @error("form.buildingDescriptions.$key.has_road")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.has_window" class="form-label">
                                झ्याल ढोका छ, छैन ? भए सोको विवरण</label>
                                <input
                                    class="form-control @error('form.buildingDescriptions.' . $key . '.has_window') is-invalid @enderror"
                                    type="text" id="form.buildingDescriptions.{{ $key }}.has_window"
                                    wire:model="form.buildingDescriptions.{{ $key }}.has_window"
                                    placeholder=" झ्याल ढोका छ, छैन ? भए सोको विवरण">
                                @error("form.buildingDescriptions.$key.has_window")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.minimum_distance_to_leave" class="form-label">
                                न्यूनतम छाड्नु पर्ने</label>
                                <input
                                    class="form-control @error('form.buildingDescriptions.' . $key . '.minimum_distance_to_leave') is-invalid @enderror"
                                    type="text" id="form.buildingDescriptions.{{ $key }}.minimum_distance_to_leave"
                                    wire:model="form.buildingDescriptions.{{ $key }}.minimum_distance_to_leave"
                                    placeholder="   न्यूनतम छाड्नु पर्ने">
                                @error("form.buildingDescriptions.$key.minimum_distance_to_leave")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.leave" class="form-label">
                                छाडिएको</label>
                                <input
                                    class="form-control @error('form.buildingDescriptions.' . $key . '.leave') is-invalid @enderror"
                                    type="text" id="form.buildingDescriptions.{{ $key }}.leave"
                                    wire:model="form.buildingDescriptions.{{ $key }}.leave"
                                    placeholder=" छाडिएको">
                                @error("form.buildingDescriptions.$key.leave")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.buildingDescriptions.{{ $key }}.remarks" class="form-label">
                                    कैफियत</label>
                                <input
                                    class="form-control @error('form.buildingDescriptions.' . $key . '.remarks') is-invalid @enderror"
                                    type="text" id="form.buildingDescriptions.{{ $key }}.remarks"
                                    wire:model="form.buildingDescriptions.{{ $key }}.remarks" placeholder="कैफियत">
                                @error("form.buildingDescriptions.$key.remarks")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-1 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                    wire:click.prevent="buildingDescriptionArrayDecrement({{ $key }})">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </fieldset>
        </div>
        <legend>
            <strong>
              ठेकेदारको विवरण
            </strong>
        </legend>
        <div class="col-md-12 mb-2">
            <div class="d-flex align-items-center justify-content-end mb-1">
                <label for="contractorDetail" class="form-label fw-bold"> </label>
                <button type="button" class="btn btn-xs btn-outline-info"
                    wire:click.prevent="contractorDetailArrayIncrement" data-toggle="add-more">
                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                </button>
            </div>
            <fieldset class="bg-soft-secondary">
                <div id="documents">
                    <div class="col-md-12 main">
                        @foreach ($form['contractorDetails'] as $key => $file)
                        <div class="row border-bottom mb-2">
                            <div class="col-md-4 mb-2">
                                <label for="form.contractorDetails.{{ $key }}.storey" class="form-label">
                                    तल्ला*</label>
                                <select
                                    class="form-select @error('form.contractorDetails.' . $key . '.storey') is-invalid @enderror"
                                    id="form.contractorDetails.{{ $key }}.storey"
                                    wire:model="form.contractorDetails.{{ $key }}.storey">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\Modules\EMap\Enums\StoreyTypeEnum::cases() as $case)
                                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                                @error("form.contractorDetails.$key.storey")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.contractorDetails.{{ $key }}.area_of_former_construction"
                                    class="form-label">
                                    साविक निर्माण भइसकेको क्षेत्रफल*</label>
                                <input
                                    class="form-control @error('form.contractorDetails.' . $key . '.area_of_former_construction') is-invalid @enderror"
                                    type="text" id="form.contractorDetails.{{ $key }}.area_of_former_construction"
                                    wire:model="form.contractorDetails.{{ $key }}.area_of_former_construction"
                                    placeholder=" साविक निर्माण भइसकेको क्षेत्रफल">
                                @error("form.contractorDetails.$key.area_of_former_construction")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.contractorDetails.{{ $key }}.land_area" class="form-label">
                                    जग्गाको क्षेत्रफल*</label>
                                <input
                                    class="form-control @error('form.contractorDetails.' . $key . '.land_area') is-invalid @enderror"
                                    type="text" id="form.contractorDetails.{{ $key }}.land_area"
                                    wire:model="form.contractorDetails.{{ $key }}.land_area"
                                    placeholder="जग्गाको क्षेत्रफल">
                                @error("form.contractorDetails.$key.land_area")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.contractorDetails.{{ $key }}.remarks" class="form-label">
                                    कैफियत</label>
                                <input
                                    class="form-control @error('form.contractorDetails.' . $key . '.remarks') is-invalid @enderror"
                                    type="text" id="form.contractorDetails.{{ $key }}.remarks"
                                    wire:model="form.contractorDetails.{{ $key }}.remarks" placeholder="कैफियत">
                                @error("form.contractorDetails.$key.remarks")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-1 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                    wire:click.prevent="contractorDetailArrayDecrement({{ $key }})">
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
                    <label for="plinth_area" class="form-label">घरको क्षेत्रफल <span
                            class="text-danger">*</span></label>
                    <input class="form-control @error('form.plinth_area') is-invalid @enderror" type="text"
                        id="plinth_area" wire:model="form.plinth_area" placeholder="घरको क्षेत्रफल">
                    @error('form.plinth_area')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="house_built_year" class="form-label">घर बनेको मिति <span
                            class="text-danger">*</span></label>
                    <input class="form-control @error('form.house_built_year') is-invalid @enderror" type="text"
                        id="house_built_year" wire:model="form.house_built_year" placeholder="घर बनेको बर्ष">
                    @error('form.house_built_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="room" class="form-label">कोठा संख्या <span class="text-danger">*</span></label>
                    <input class="form-control @error('form.room') is-invalid @enderror" type="number" id="room"
                        wire:model="form.room" placeholder="कोठा संख्या">
                    @error('form.room')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="storey" class="form-label">घरको तल्ला <span class="text-danger">*</span></label>
                    <input class="form-control @error('form.storey') is-invalid @enderror" type="number" id="storey"
                        wire:model="form.storey" placeholder="घरको तल्ला">
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
                    <label for="building_usage" class="form-label">निर्माणको प्रयोजन <span
                            class="text-danger">*</span></label>
                    <select class="form-select @error('form.building_usage') is-invalid @enderror"
                        id="form.building_usage" wire:model="form.building_usage">
                        <option value="">---छान्नुहोस् ----</option>
                        @foreach (\Modules\EMap\Enums\BuildingTypeEnum::cases() as $case)
                        <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                        @endforeach
                    </select>
                    @error('form.building_usage')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="roof_category" class="form-label">भवनको छानाको किसिम <span
                            class="text-danger">*</span></label>
                    <select class="form-select @error('form.roof_category') is-invalid @enderror"
                        id="form.roof_category" wire:model="form.roof_category">
                        <option value="">---छान्नुहोस् ----</option>
                        @foreach (\Modules\EMap\Enums\BuildingTypeEnum::cases() as $case)
                        <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                        @endforeach
                    </select>
                    @error('form.roof_category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="height" class="form-label">भवनको कुल उचाई <span class="text-danger">*</span></label>
                    <input class="form-control @error('form.height') is-invalid @enderror" type="text" id="height"
                        wire:model="form.height" placeholder="भवनको कुल उचाई">
                    @error('form.height')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="set_back" class="form-label">सडकबाट प्रस्तावित भवनसम्माको सेट व्याक <span
                            class="text-danger">*</span></label>
                    <input class="form-control @error('form.set_back') is-invalid @enderror" type="text" id="set_back"
                        wire:model="form.set_back" placeholder="सडकबाट प्रस्तावित भवनसम्माको सेट व्याक">
                    @error('form.set_back')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="other_construction_area_new" class="form-label">अन्य निर्माण(निर्माण बाहेक जस्तै ः
                        कम्पाउणडवाल,टहरा) ले ढाकेको क्षेत्रफल<span class="text-danger">*</span></label>
                    <input class="form-control @error('form.other_construction_area_new') is-invalid @enderror"
                        type="text" id="other_construction_area_new" wire:model="form.other_construction_area_new"
                        placeholder="अन्य निर्माण(निर्माण बाहेक जस्तै ः कम्पाउणडवाल,टहरा) ले ढाकेको क्षेत्रफल">
                    @error('form.other_construction_area_new')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label for="other_construction_area_old" class="form-label">अन्य निर्माण(निर्माण बाहेक जस्तै ः
                        कम्पाउणडवाल,टहरा) ले ढाकी सकेको क्षेत्रफल<span class="text-danger">*</span></label>
                    <input class="form-control @error('form.other_construction_area_old') is-invalid @enderror"
                        type="text" id="other_construction_area_old" wire:model="form.other_construction_area_old"
                        placeholder="अन्य निर्माण(निर्माण बाहेक जस्तै ः कम्पाउणडवाल,टहरा) ले ढाकेको क्षेत्रफल">
                    @error('form.other_construction_area_old')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>
        </fieldset>
        <fieldset>
            <legend class="title text-primary fs-4 fw-bolder">जग्गा विवरण</legend>
            <div class="row">
                <div class="col-md-4 mb-1">
                    <label for="land_area" class="form-label"> जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल<span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <input class="form-control @error('form.land_area') is-invalid @enderror" type="text" step="any"
                            id="land_area" wire:model="form.land_area"
                            placeholder="जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल">
                        @error('form.land_area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="field_land_area" class="form-label"> फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक
                        क्षेत्रफल<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input class="form-control @error('form.field_land_area') is-invalid @enderror" type="text"
                            step="any" id="field_land_area" wire:model="form.field_land_area"
                            placeholder="फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक क्षेत्रफल">
                        @error('form.field_land_area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="plot_no" class="form-label"> निर्माण भएको जग्गाको कित्ता नं.</label>
                    <div class="input-group">
                        <input class="form-control @error('form.plot_no') is-invalid @enderror" type="text" step="any"
                            id="plot_no" wire:model="form.plot_no" placeholder="जग्गाको कित्ता नं.">
                        @error('form.plot_no')
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
                        <input class="form-control @error('form.land_ward_no') is-invalid @enderror" type="number"
                            step="any" id="land_ward_no" wire:model="form.land_ward_no"
                            placeholder="जग्गाको हाल वार्ड नं.">
                        @error('form.land_ward_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="land_tole" class="form-label"> टोल</label>
                    <div class="input-group">
                        <input class="form-control @error('form.land_tole') is-invalid @enderror" type="number"
                            step="any" id="land_tole" wire:model="form.land_tole"
                            placeholder="टोल">
                        @error('form.land_tole')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="former_local_body" class="form-label"> साविक पालिका</label>
                    <div class="input-group">
                        <input class="form-control @error('form.former_local_body') is-invalid @enderror" type="text"
                            step="any" id="former_local_body" wire:model="form.former_local_body"
                            placeholder="साविक पालिका">
                        @error('form.former_local_body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="former_ward_no" class="form-label">साविक वाड नं.</label>
                    <div class="input-group">
                        <input class="form-control @error('form.former_ward_no') is-invalid @enderror" type="text"
                            step="any" id="former_ward_no" wire:model="form.former_ward_no" placeholder="साबिक वडा नं">
                        @error('form.former_ward_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </fieldset>
        <fieldset>
            <legend class="title text-primary fs-4 fw-bolder">
                जग्गा धनीको विवरण
            </legend>

            <div class="row">
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="name">१.१ जग्गा धनीको नाम </label>
                    <input class="form-control form-control-sm" type="text" id="name"
                        wire:model="buildingLandOwner.name" placeholder=" जग्गा धनीको नाम">
                    @error('buildingLandOwner.name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="phone">१.२ फोन नं.</label>
                    <input class="form-control form-control-sm" type="text" id="phone"
                        wire:model="buildingLandOwner.phone" placeholder="फोन नं.">
                    @error('buildingLandOwner.phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="father_name">१.३ बुवाको नाम</label>
                    <input class="form-control form-control-sm" type="text" id="father_name"
                        wire:model="buildingLandOwner.father_name" placeholder="बुवाको नाम">
                    @error('buildingLandOwner.father_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="buildingLandOwner.grandfather_name">१.४ हजुरबुबाको नाम</label>
                    <input class="form-control form-control-sm" type="text" id="buildingLandOwner.grandfather_name"
                        wire:model="buildingLandOwner.grandfather_name" placeholder="हजुरबुबाको नाम">
                    @error('buildingLandOwner.grandfather_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="citizenship_no">१.५ नागरिकता नम्बर</label>
                    <input class="form-control form-control-sm" type="text" id="citizenship_no"
                        wire:model="buildingLandOwner.citizenship_no" placeholder="नागरिकता नम्बर">
                    @error('buildingLandOwner.citizenship_no')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="citizenship_issue_date">१.६ नागरिकता लिएको मिति</label>
                    <input class="form-control @error('buildingLandOwner.citizenship_issue_date') is-invalid @enderror"
                        type="text" id="buildingLandOwner.citizenship_issue_date"
                        wire:model="buildingLandOwner.citizenship_issue_date" placeholder="जारि मिति">
                    @error('buildingLandOwner.citizenship_issue_date')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="buildingLandOwner.citizenship_issue_district_id">१.७ नागरिकता लिएको
                        जिल्ला</label>
                    <select class="form-select form-select-sm"
                        wire:model="buildingLandOwner.citizenship_issue_district_id"
                        id="buildingLandOwner.citizenship_issue_district_id">
                        <option value="">--- जिल्ला छान्नुहोस् ---</option>
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->district }}
                        </option>
                        @endforeach
                    </select>
                    @error('buildingLandOwner.citizenship_issue_district_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="buildingLandOwner.province_id" class="form-label">प्रदेश</label>
                            <select class="form-select @error('buildingLandOwner.province_id') is-invalid @enderror"
                                id="buildingLandOwner.province_id" wire:model="buildingLandOwner.province_id">
                                <option value="">---प्रदेश छान्नुहोस् ----</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id ?? '' }}">{{ $province->province ?? '' }}
                                </option>
                                @endforeach
                            </select>
                            @error('buildingLandOwner.province_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="buildingLandOwner.district_id" class="form-label">जिल्ला</label>
                            <select class="form-select @error('buildingLandOwner.district_id') is-invalid @enderror"
                                id="buildingLandOwner.district_id" wire:model="buildingLandOwner.district_id">
                                <option value="">---जिल्ला छान्नुहोस् ----</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->district }}</option>
                                @endforeach
                            </select>
                            @error('buildingLandOwner.district_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="buildingLandOwner.local_body_id" class="form-label">पालिका</label>
                            <select class="form-select @error('buildingLandOwner.local_body_id') is-invalid @enderror"
                                id="buildingLandOwner.local_body_id" wire:model="buildingLandOwner.local_body_id">
                                <option value="">---पालिका छान्नुहोस् ----</option>
                                @foreach ($localBodies as $localBody)
                                <option value="{{ $localBody->id }}">{{ $localBody->local_body }}</option>
                                @endforeach
                            </select>
                            @error('buildingLandOwner.local_body_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="ward_no" class="form-label">वार्ड न:</label>
                            <select class="form-select @error('buildingLandOwner.ward_no') is-invalid @enderror"
                                id="ward_no" wire:model="buildingLandOwner.ward_no">
                                <option value="">---वडा छान्नुहोस् ----</option>
                                @foreach ($wards as $ward)
                                <option value="{{ $ward }}">{{ $ward }}</option>
                                @endforeach
                            </select>
                            @error('buildingLandOwner.ward_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="buildingLandOwner.tole" class="form-label">गाउँ/टोल</label>
                            <input name="buildingLandOwner.tole"
                                class="form-control @error('buildingLandOwner.tole') is-invalid @enderror" type="text"
                                id="buildingLandOwner.tole" placeholder="गाउँ/टोल"
                                wire:model="buildingLandOwner.tole" />
                            @error('form.tole')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

            </div>
        </fieldset>

        <fieldset>
            <legend class="title text-primary fs-4 fw-bolder"> घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h5>
            </legend>
            <div class="d-flex align-items-center gap-2 mb-3">
                <label for="detail_check">के घर धनीको विवरण र जग्गाधनीको विवरण एउटै हो ?</label>
                <button wire:click.prevent="checkSameAsLandOwner" type="button" class="btn btn-link btn-sm border-none"
                    id="detail_check">
                    <i class="fa fa-toggle-{{ $same_as_land_owner ? 'on' : 'off' }} fa-2x"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="name">१.१ घर धनीको नाम </label>
                    <input class="form-control form-control-sm" type="text" id="name"
                        wire:model="buildingHouseOwner.name" placeholder=" घर धनीको नाम">
                    @error('buildingHouseOwner.name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="phone">१.२ फोन नं.</label>
                    <input class="form-control form-control-sm" type="text" id="phone"
                        wire:model="buildingHouseOwner.phone" placeholder="फोन नं.">
                    @error('buildingHouseOwner.phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="father_name">१.३ बुवाको नाम</label>
                    <input class="form-control form-control-sm" type="text" id="father_name"
                        wire:model="buildingHouseOwner.father_name" placeholder="बुवाको नाम">
                    @error('buildingHouseOwner.father_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="buildingHouseOwner.grandfather_name">१.४ हजुरबुबाको नाम</label>
                    <input class="form-control form-control-sm" type="text" id="buildingHouseOwner.grandfather_name"
                        wire:model="buildingHouseOwner.grandfather_name" placeholder="हजुरबुबाको नाम">
                    @error('buildingHouseOwner.grandfather_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="citizenship_no">१.५ नागरिकता नम्बर</label>
                    <input class="form-control form-control-sm" type="text" id="citizenship_no"
                        wire:model="buildingHouseOwner.citizenship_no" placeholder="नागरिकता नम्बर">
                    @error('buildingHouseOwner.citizenship_no')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="citizenship_issue_date">१.६ नागरिकता लिएको मिति</label>
                    <input class="form-control form-control-sm" type="text" id="citizenship_issue_date"
                        wire:model="buildingHouseOwner.citizenship_issue_date" placeholder="yyyy/mm/dd">
                    @error('buildingHouseOwner.citizenship_issue_date')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-2 pr-0">
                    <label class="form-label" for="buildingHouseOwner.citizenship_issue_district_id">१.७ नागरिकता लिएको
                        जिल्ला</label>
                    <select class="form-select form-select-sm"
                        wire:model="buildingHouseOwner.citizenship_issue_district_id"
                        id="buildingHouseOwner.citizenship_issue_district_id">
                        <option value="">--- जिल्ला छान्नुहोस् ---</option>
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->district }}
                        </option>
                        @endforeach
                    </select>
                    @error('buildingHouseOwner.citizenship_issue_district_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="buildingHouseOwner.province_id" class="form-label">प्रदेश</label>
                            <select class="form-select @error('buildingHouseOwner.province_id') is-invalid @enderror"
                                id="buildingHouseOwner.province_id" wire:model="buildingHouseOwner.province_id">
                                <option value="">---प्रदेश छान्नुहोस् ----</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id ?? '' }}">{{ $province->province ?? '' }}
                                </option>
                                @endforeach
                            </select>
                            @error('buildingHouseOwner.province_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="buildingHouseOwner.district_id" class="form-label">जिल्ला</label>
                            <select class="form-select @error('buildingHouseOwner.district_id') is-invalid @enderror"
                                id="buildingHouseOwner.district_id" wire:model="buildingHouseOwner.district_id">
                                <option value="">---जिल्ला छान्नुहोस् ----</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->district }}</option>
                                @endforeach
                            </select>
                            @error('buildingHouseOwner.district_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="buildingHouseOwner.local_body_id" class="form-label">पालिका</label>
                            <select class="form-select @error('buildingHouseOwner.local_body_id') is-invalid @enderror"
                                id="buildingHouseOwner.local_body_id" wire:model="buildingHouseOwner.local_body_id">
                                <option value="">---पालिका छान्नुहोस् ----</option>
                                @foreach ($localBodies as $localBody)
                                <option value="{{ $localBody->id }}">{{ $localBody->local_body }}</option>
                                @endforeach
                            </select>
                            @error('buildingHouseOwner.local_body_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="ward_no" class="form-label">वार्ड न:</label>
                            <select class="form-select @error('buildingHouseOwner.ward_no') is-invalid @enderror"
                                id="ward_no" wire:model="buildingHouseOwner.ward_no">
                                <option value="">---वडा छान्नुहोस् ----</option>
                                @foreach ($wards as $ward)
                                <option value="{{ $ward }}">{{ $ward }}</option>
                                @endforeach
                            </select>
                            @error('buildingHouseOwner.ward_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="buildingHouseOwner.tole" class="form-label">गाउँ/टोल</label>
                            <input name="buildingHouseOwner.tole"
                                class="form-control @error('buildingHouseOwner.tole') is-invalid @enderror" type="text"
                                id="buildingHouseOwner.tole" placeholder="गाउँ/टोल"
                                wire:model="buildingHouseOwner.tole" />
                            @error('form.tole')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

            </div>
        </fieldset>
        <fieldset>
            <legend class="title text-primary fs-4 fw-bolder"> निवेदकको विवरण</h5>
            </legend>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="form.applicant_name">१.१ नाम</label>
                    <input class="form-control form-control-sm" type="text" id="form.applicant_name"
                        wire:model="form.applicant_name" placeholder="निवेदकको नाम">
                    @error('form.applicant_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="form.applicant_phone_no">१.२ फोन नं.</label>
                    <input class="form-control form-control-sm" type="text" id="form.applicant_phone_no"
                        wire:model="form.applicant_phone_no" placeholder="फोन नं.">
                    @error('form.applicant_phone_no')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="form.applicant_age">१.२ उमेर</label>
                    <input class="form-control form-control-sm" type="number" id="form.applicant_age"
                        wire:model="form.applicant_age" placeholder="उमेर">
                    @error('form.applicant_age')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
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
                            <label for="applicant_ward_no" class="form-label">वार्ड न:</label>
                            <select class="form-select @error('form.applicant_ward_no') is-invalid @enderror"
                                id="applicant_ward_no" wire:model="form.applicant_ward_no">
                                <option value="">---वडा छान्नुहोस् ----</option>
                                @foreach ($wards as $ward)
                                <option value="{{ $ward }}">{{ $ward }}</option>
                                @endforeach
                            </select>
                            @error('form.applicant_ward_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="form.applicant_tole" class="form-label">गाउँ/टोल</label>
                            <input name="form.applicant_tole"
                                class="form-control @error('form.applicant_tole') is-invalid @enderror" type="text"
                                id="form.applicant_tole" placeholder="गाउँ/टोल" wire:model="form.applicant_tole" />
                            @error('form.applicant_tole')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>


            </div>
        </fieldset>


        <div class="d-flex justify-content-between mt-3">
            <div class="col-3">
                <label class="form-label fw-bolder" for="application_date">निबेदनको मिति <span
                        class="text-danger">*</span></label>
                <input type="text" id="application_date" wire:model="form.application_date"
                    class="form-control form-control-sm" placeholder="yyyy/mm/dd">
                @error('form.application_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-3">
                <label class="form-label fw-bolder" for="applicant_signature">निवेदकको सहि</label>
                <input type="file" id="applicant_signature" wire:model="form.applicant_signature"
                    class="form-control form-control-sm">
                @error('form.applicant_signature')
                <p class="text-danger">{{ $message }}</p>
                @enderror
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
