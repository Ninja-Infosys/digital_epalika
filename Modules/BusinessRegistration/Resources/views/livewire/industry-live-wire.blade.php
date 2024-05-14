<div class="overflow-hidden p-2">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 1 ? 'active' : '' }}">
                        <i class="fa fa-building me-1"></i>
                        <span class="d-none d-sm-inline fs-5 fw-bold">उधोग दर्ता</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 2 ? 'active' : '' }}">
                        <i class="fa fa-user me-1"></i>
                        <span class="d-none d-sm-inline  fs-5 fw-bold">सदस्य विवरण</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 3 ? 'active' : '' }}">
                        <i class="fa fa-file me-1"></i>
                        <span class="d-none d-sm-inline  fs-5 fw-bold">अन्य</span>
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
                    <legend class="title text-primary fs-4 fw-bolder"> विवरण</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="application_date" class="form-label"> आवेदन मिति बि. सं. <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('form.application_date') is-invalid @enderror" type="text"
                                       id="application_date" wire:model="form.application_date" placeholder="आवेदन मिति बि. सं.">
                                @error('form.application_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder"> अन्य कागजातहरु</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="other_document" class="form-label">
                                अन्य
                            </label>
                            <div class="input-group">
                                <input class="form-control @error('form.other_document') is-invalid @enderror" type="file"
                                       id="other" wire:model="form.other_document" multiple>
                                @error('form.other_document')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                @foreach ($form['committeeNames'] as $key => $partner)
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder"> संस्थाको सदस्य विवरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.name" class="form-label"> नाम <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.name') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.name"
                                        wire:model="form.committeeNames.{{ $key }}.name" placeholder="नाम">
                                    @error("form.committeeNames.$key.name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.name_en" class="form-label"> नाम
                                    (English)
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.name_en') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.name_en"
                                        wire:model="form.committeeNames.{{ $key }}.name_en" placeholder="नाम (English)">
                                    @error("form.committeeNames.$key.name_en")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.citizenship_no" class="form-label">
                                    नागरिकता नम्बर
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.citizenship_no') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.citizenship_no"
                                        wire:model="form.committeeNames.{{ $key }}.citizenship_no"
                                        placeholder="नागरिकता नम्बर">
                                    @error("form.committeeNames.$key.citizenship_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.issue_date" class="form-label"> जारि
                                    मिति <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.issue_date') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.issue_date"
                                        wire:model="form.committeeNames.{{ $key }}.issue_date" placeholder="जारि मिति">
                                    @error("form.committeeNames.$key.issue_date")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.issue_district_id" class="form-label">
                                    जारी जिल्ला
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select
                                        class="form-select @error('form.committeeNames.' . $key . '.issue_district_id') is-invalid @enderror"
                                        id="form.committeeNames.{{ $key }}.issue_district_id"
                                        wire:model="form.committeeNames.{{ $key }}.issue_district_id">
                                        <option>---जिल्ला छान्नुहोस् ----</option>
                                        @foreach (get_districts() as $district)
                                            <option value="{{ $district->id }}">{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                    @error("form.committeeNames.$key.issue_district_id")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.phone" class="form-label"> फोन <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.phone') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.phone"
                                        wire:model="form.committeeNames.{{ $key }}.phone" placeholder="फोन">
                                    @error("form.committeeNames.$key.phone")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.email" class="form-label"> इमेल
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.email') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.email"
                                        wire:model="form.committeeNames.{{ $key }}.email" placeholder="इमेल">
                                    @error("form.committeeNames.$key.email")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.national_card_no" class="form-label">
                                    राष्ट्रियता परिचयपत्र नम्बर </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.national_card_no') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.national_card_no"
                                        wire:model="form.committeeNames.{{ $key }}.national_card_no"
                                        placeholder="राष्ट्रियता परिचयपत्र नम्बर">
                                    @error("form.committeeNames.$key.national_card_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.gender" class="form-label">लिङ्ग
                                    <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select @error('form.committeeNames.' . $key . '.gender') is-invalid @enderror"
                                    id="form.committeeNames.{{ $key }}.gender"
                                    wire:model="form.committeeNames.{{ $key }}.gender">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\App\Enums\Gender::cases() as $case)
                                        <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error("form.committeeNames.$key.gender")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.father_name" class="form-label"> बुबाको
                                    नाम
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.father_name') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.father_name"
                                        wire:model="form.committeeNames.{{ $key }}.father_name"
                                        placeholder="बुबाको नाम">
                                    @error("form.committeeNames.$key.father_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.grandfather_name" class="form-label">
                                    हजुरबुबाको नाम
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.grandfather_name') is-invalid @enderror"
                                        type="text" id="form.committeeNames.{{ $key }}.grandfather_name"
                                        wire:model="form.committeeNames.{{ $key }}.grandfather_name"
                                        placeholder="हजुरबुबाको नाम">
                                    @error("form.committeeNames.$key.grandfather_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.photo" class="form-label"> पासपोर्ट
                                    साइजको फोटो
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.photo') is-invalid @enderror"
                                        type="file" id="form.committeeNames.{{ $key }}.photo"
                                        wire:model="form.committeeNames.{{ $key }}.photo">
                                    @error("form.committeeNames.$key.photo")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.citizenship_front" class="form-label">
                                    नागरिकता अपलोड गर्नुहोस् (आगाडी) </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.citizenship_front') is-invalid @enderror"
                                        type="file" id="form.committeeNames.{{ $key }}.citizenship_front"
                                        wire:model="form.committeeNames.{{ $key }}.citizenship_front">
                                    @error("form.committeeNames.$key.citizenship_front")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.citizenship_back" class="form-label">
                                    नागरिकता अपलोड गर्नुहोस् (पछाडी) </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.citizenship_back') is-invalid @enderror"
                                        type="file" id="form.committeeNames.{{ $key }}.citizenship_back"
                                        wire:model="form.committeeNames.{{ $key }}.citizenship_back">
                                    @error("form.committeeNames.$key.citizenship_back")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.designation" class="form-label">
                                    पद <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.designation') is-invalid @enderror"
                                        type="text" placeholder="पद "
                                        id="form.committeeNames.{{ $key }}.designation"
                                        wire:model="form.committeeNames.{{ $key }}.designation">
                                    @error("form.committeeNames.$key.designation")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label for="form.committeeNames.{{ $key }}.position" class="form-label">
                                    मर्यादाक्रम <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.committeeNames.' . $key . '.position') is-invalid @enderror"
                                        type="number" placeholder="मर्यादाक्रम "
                                        id="form.committeeNames.{{ $key }}.position"
                                        wire:model="form.committeeNames.{{ $key }}.position">
                                    @error("form.committeeNames.$key.position")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @error('form.committeeNames')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.province_id"
                                       class="form-label">प्रदेश</label>
                                <select
                                    class="form-select @error('form.committeeNames.' . $key . '.province_id') is-invalid @enderror"
                                    id="form.committeeNames.{{ $key }}.province_id"
                                    wire:model="form.committeeNames.{{ $key }}.province_id">
                                    <option value="">---प्रदेश छान्नुहोस् ----</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id ?? '' }}">{{ $province->province ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("form.committeeNames.$key.province_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.district_id"
                                       class="form-label">जिल्ला</label>
                                <select
                                    class="form-select @error('form.committeeNames.' . $key . '.district_id') is-invalid @enderror"
                                    id="form.committeeNames.{{ $key }}.district_id"
                                    wire:model="form.committeeNames.{{ $key }}.district_id">
                                    <option value="">---जिल्ला छान्नुहोस् ----</option>
                                    @foreach (!empty($form['committeeNames'][$key]['province_id']) ? get_districts(province_ids: $form['committeeNames'][$key]['province_id']) : [] as $district)
                                        <option value="{{ $district->id }}">{{ $district->district }}</option>
                                    @endforeach
                                </select>
                                @error("form.committeeNames.$key.district_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.local_body_id"
                                       class="form-label">पालिका</label>
                                <select
                                    class="form-select @error('form.committeeNames.' . $key . '.local_body_id') is-invalid @enderror"
                                    id="form.committeeNames.{{ $key }}.local_body_id"
                                    wire:model="form.committeeNames.{{ $key }}.local_body_id">
                                    <option value="">---पालिका छान्नुहोस् ----</option>
                                    @foreach (!empty($form['committeeNames'][$key]['district_id']) ? get_local_bodies(district_ids: $form['committeeNames'][$key]['district_id']) : [] as $localBody)
                                        <option value="{{ $localBody->id }}">{{ $localBody->local_body }}</option>
                                    @endforeach
                                </select>
                                @error("form.committeeNames.$key.local_body_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.ward_no" class="form-label">वार्ड
                                    न:</label>
                                <select
                                    class="form-select @error('form.committeeNames.' . $key . '.ward_no') is-invalid @enderror"
                                    id="form.committeeNames.{{ $key }}.ward_no"
                                    wire:model="form.committeeNames.{{ $key }}.ward_no">
                                    <option value="">---वडा छान्नुहोस् ----</option>
                                    @foreach (!empty($form['committeeNames'][$key]['local_body_id']) ? get_local_bodies(localBodyId: $form['committeeNames'][$key]['local_body_id'])->ward_no : [] as $ward)
                                        <option value="{{ $ward }}">{{ $ward }}</option>
                                    @endforeach
                                </select>
                                @error("form.committeeNames.$key.ward_no")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.way" class="form-label">मार्ग</label>
                                <input name="form.way"
                                       class="form-control @error('form.committeeNames.' . $key . '.way') is-invalid @enderror"
                                       type="text" id="form.committeeNames.{{ $key }}.way" placeholder="मार्ग"
                                       wire:model="form.committeeNames.{{ $key }}.way"/>

                                @error("form.committeeNames.$key.way")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.committeeNames.{{ $key }}.tole" class="form-label">गाउँ/टोल</label>
                                <input name="form.committeeNames.{{ $key }}.tole"
                                       class="form-control @error('form.committeeNames.' . $key . '.tole') is-invalid @enderror"
                                       type="text" id="form.committeeNames.{{ $key }}.tole" placeholder="गाउँ/टोल"
                                       wire:model="form.committeeNames.{{ $key }}.tole"/>
                                @error("form.committeeNames.$key.tole")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    @if (!$loop->first)
                        <button class="btn btn-danger" wire:click.prevent="partnerArrayDecrement({{ $key }})">
                            <i class="fa fa-minus"></i>
                        </button>
                    @endif
                    @if ($loop->last)
                        <button type="button" wire:click.prevent="committeeNameArrayIncrement" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                        </button>
                    @endif
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
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
                    <legend class="title text-primary fs-4 fw-bolder">उधोग विवरण</legend>
                    <div class="row">
                        <div class="col-md-12 mb-2 pr-0">
                            <label for="name" class="form-label">उधोगको नाम <span class="text-danger">*</span></label>
                            <div class="row input-group">
                                <div class="col-md-6 pr-0">
                                    <input class="form-control @error('form.name') is-invalid @enderror" type="text"
                                           id="name" wire:model="form.name" placeholder="नेपालीमा">
                                    @error('form.name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 pr-0">
                                    <input class="form-control @error('form.name_en') is-invalid @enderror" type="text"
                                           id="name_en" wire:model="form.name_en" placeholder="In English">
                                    @error('form.name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mb-2 pr-0">
                            <div class="row input-group">
                                <div class="col-md-6 pr-0">
                                    <label for="phone" class="form-label">सम्पर्क नं<span class="text-danger">*</span></label>
                                    <input class="form-control @error('form.phone') is-invalid @enderror" type="text"
                                           id="phone" wire:model="form.phone" placeholder="सम्पर्क नं">
                                    @error('form.phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 pr-0">
                                    <label for="email" class="form-label">इमेल<span class="text-danger">*</span></label>
                                    <input class="form-control @error('form.email') is-invalid @enderror" type="text"
                                           id="email" wire:model="form.email" placeholder="इमेल">
                                    @error('form.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label">ठेगाना <span class="text-danger">*</span></label>
                            <div class="row input-group">
                                <div class="col-md-6 mb-2 pr-0">
                                    <input class="form-control @error('form.address') is-invalid @enderror" type="text"
                                           id="address" wire:model="form.address" placeholder="ठेगाना">
                                    @error('form.address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2 pr-0">
                                    <input class="form-control @error('form.address_en') is-invalid @enderror"
                                           type="text"
                                           id="address_en" wire:model="form.address_en" placeholder="In English"
                                    @error('form.address_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="investment" class="form-label">कूल पूँजी </label>
                                <div class="input-group">
                                    <input class="form-control @error('form.investment') is-invalid @enderror"
                                           type="text" step="any" id="investment"
                                           wire:model="form.investment" placeholder="कूल पूँजी">
                                    @error('form.investment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="fixed_capital" class="form-label">स्थिर पूँजी </label>
                                <div class="input-group">
                                    <input class="form-control @error('form.fixed_capital') is-invalid @enderror"
                                           type="text" step="any" id="fixed_capital"
                                           wire:model="form.fixed_capital" placeholder="स्थिर पूँजी">
                                    @error('form.fixed_capital')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="working_capital" class="form-label">चालु पूँजी</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.working_capital') is-invalid @enderror"
                                           type="text" step="any" id="working_capital"
                                           wire:model="form.working_capital" placeholder="चालु पूँजी">
                                    @error('form.working_capital')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="electricity" class="form-label">आवश्यक विधुत शक्ति</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.electricity') is-invalid @enderror"
                                           type="text" step="any" id="electricity"
                                           wire:model="form.electricity" placeholder="आवश्यक विधुत शक्ति">
                                    @error('form.electricity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="production_capacity" class="form-label">उत्पादन क्षमता</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.production_capacity') is-invalid @enderror"
                                           type="text" step="any" id="production_capacity"
                                           wire:model="form.production_capacity" placeholder="उत्पादन क्षमता">
                                    @error('form.production_capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="manpower" class="form-label">आवश्यक पर्ने जनशक्ति</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.manpower') is-invalid @enderror"
                                           type="text" step="any" id="manpower"
                                           wire:model="form.manpower" placeholder="आवश्यक पर्ने जनशक्ति">
                                    @error('form.manpower')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="open_date" class="form-label">उधोग संचालन हुने सिफ़ट संख्या</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.open_date') is-invalid @enderror"
                                           type="text" step="any" id="open_date"
                                           wire:model="form.open_date" placeholder="उधोग संचालन हुने सिफ़ट संख्या">
                                    @error('form.open_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="start_date" class="form-label">उधोग संचालन, व्यावसायिक उत्पादन वा कारोवार सुरु गर्नेपर्ने अवधि</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.start_date') is-invalid @enderror"
                                           type="text" step="any" id="start_date"
                                           wire:model="form.start_date" placeholder="उधोग संचालन, व्यावसायिक उत्पादन वा कारोवार सुरु गर्नेपर्ने अवधि">
                                    @error('form.start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="product" class="form-label">उधोगले उत्पादन गर्ने वस्तु वा सेवाको प्रकार</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.product') is-invalid @enderror"
                                           type="text" step="any" id="product"
                                           wire:model="form.product" placeholder="उधोगले उत्पादन गर्ने वस्तु वा सेवाको प्रकार">
                                    @error('form.product')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="other" class="form-label">अन्य</label>
                                <div class="input-group">
                                    <input class="form-control @error('form.other') is-invalid @enderror"
                                           type="text" step="any" id="other"
                                           wire:model="form.other" placeholder="अन्य">
                                    @error('form.other')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="purpose" class="form-label">उद्देश्य
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                        <textarea id="purpose" wire:model="form.purpose" placeholder="उद्देश्य"
                                                  class="form-control @error('form.purpose') is-invalid @enderror"></textarea>
                                </div>
                                @error('form.purpose')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="form.province_id" class="form-label">प्रदेश</label>
                            <select class="form-select @error('form.province_id') is-invalid @enderror"
                                    id="form.province_id"
                                    wire:model="form.province_id">
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
                                    id="form.district_id"
                                    wire:model="form.district_id">
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
                            <label for="form.way" class="form-label">मार्ग</label>
                            <input name="form.way" class="form-control @error('form.way') is-invalid @enderror"
                                   type="text" id="form.way" placeholder="मार्ग" wire:model="form.way"/>

                            @error('form.way')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="form.tole" class="form-label">गाउँ/टोल</label>
                            <input name="form.tole" class="form-control @error('form.tole') is-invalid @enderror"
                                   type="text" id="form.tole" placeholder="गाउँ/टोल" wire:model="form.tole"/>
                            @error('form.tole')
                            <div class="invalid-feedback">{{ $message }}</div>
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
