<div class="overflow-hidden p-2">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 1 ? 'active' : '' }}">
                        <i class="fa fa-building me-1"></i>
                        <span class="d-none d-sm-inline fs-5 fw-bold">फर्म दर्ता</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0 pt-2 pb-2 {{ $currentStep === 2 ? 'active' : '' }}">
                        <i class="fa fa-user me-1"></i>
                        <span class="d-none d-sm-inline  fs-5 fw-bold">पार्टनर</span>
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
                        <label for="application_date_en" class="form-label"> आवेदन मिति ई. सं. <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control @error('form.application_date_en') is-invalid @enderror"
                                   type="text" id="application_date_en" wire:model="form.application_date_en"
                                   placeholder="आवेदन मिति ई. सं.">
                            @error('form.application_date_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </fieldset>

                <fieldset class="mb-2">
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
                                    @foreach($form['files'] as $key=>$file)
                                        <div class="row border-bottom mb-2">
                                            <div class="col-md-5 mb-2">
                                                <label for="form.files.{{ $key }}.file_name" class="form-label"> शीर्षक*</label>
                                                <input
                                                    class="form-control @error('form.files.' . $key . '.file_name') is-invalid @enderror"
                                                    type="text" id="form.files.{{ $key }}.file_name"
                                                    wire:model="form.files.{{ $key }}.file_name" placeholder="शीर्षक">
                                                @error("form.files.$key.file_name")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="form.files.{{ $key }}.file" class="form-label">डकुमेन्ट *</label>
                                                <input
                                                    class="form-control @error('form.files.' . $key . '.file') is-invalid @enderror"
                                                    type="file" name="files[][file]"  wire:model="form.files.{{ $key }}.file" placeholder="शीर्षक"
                                                       id="form.files.{{ $key }}.file"/>
                                                <div wire:loading wire:target="form.files.{{ $key }}.file">Uploading...</div>
                                            </div>
                                            <div class="col-md-1 mb-2">
                                                <button type="button" class="btn btn-sm btn-outline-danger" wire:click.prevent="fileArrayDecrement({{$key}})">
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
                @foreach ($form['partners'] as $key => $partner)
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder"> व्यक्तिगत विवरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.name" class="form-label"> नाम <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.name') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.name"
                                        wire:model="form.partners.{{ $key }}.name" placeholder="नाम">
                                    @error("form.partners.$key.name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.name_en" class="form-label"> नाम
                                    (English)
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.name_en') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.name_en"
                                        wire:model="form.partners.{{ $key }}.name_en" placeholder="नाम (English)">
                                    @error("form.partners.$key.name_en")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.citizenship_no" class="form-label">
                                    नागरिकता
                                    नम्बर
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.citizenship_no') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.citizenship_no"
                                        wire:model="form.partners.{{ $key }}.citizenship_no"
                                        placeholder="नागरिकता नम्बर">
                                    @error("form.partners.$key.citizenship_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.issue_date" class="form-label"> जारि
                                    मिति <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.issue_date') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.issue_date"
                                        wire:model="form.partners.{{ $key }}.issue_date" placeholder="जारि मिति">
                                    @error("form.partners.$key.issue_date")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.issue_district_id" class="form-label">
                                    जारी
                                    जिल्ला
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select
                                        class="form-select @error('form.partners.' . $key . '.issue_district_id') is-invalid @enderror"
                                        id="form.partners.{{ $key }}.issue_district_id"
                                        wire:model="form.partners.{{ $key }}.issue_district_id">
                                        <option>---जिल्ला छान्नुहोस् ----</option>
                                        @foreach (get_districts() as $district)
                                            <option value="{{ $district->id }}">{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                    @error("form.partners.$key.issue_district_id")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.phone" class="form-label"> फोन <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.phone') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.phone"
                                        wire:model="form.partners.{{ $key }}.phone" placeholder="फोन">
                                    @error("form.partners.$key.phone")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.email" class="form-label"> इमेल
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.email') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.email"
                                        wire:model="form.partners.{{ $key }}.email" placeholder="इमेल">
                                    @error("form.partners.$key.email")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.house_no" class="form-label"> घर नम्बर
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.house_no') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.house_no"
                                        wire:model="form.partners.{{ $key }}.house_no" placeholder="घर नम्बर">
                                    @error("form.partners.$key.house_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.account_no" class="form-label">
                                    व्यक्तिगत स्थाई
                                    लेखा
                                    नम्बर </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.account_no') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.account_no"
                                        wire:model="form.partners.{{ $key }}.account_no"
                                        placeholder="व्यक्तिगत स्थाई लेखा नम्बर">
                                    @error("form.partners.$key.account_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.national_card_no" class="form-label">
                                    राष्ट्रियता
                                    परिचयपत्र नम्बर </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.national_card_no') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.national_card_no"
                                        wire:model="form.partners.{{ $key }}.national_card_no"
                                        placeholder="राष्ट्रियता परिचयपत्र नम्बर">
                                    @error("form.partners.$key.national_card_no")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.gender" class="form-label">लिङ्ग
                                    <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.gender') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.gender"
                                    wire:model="form.partners.{{ $key }}.gender">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\App\Enums\Gender::cases() as $case)
                                        <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.gender")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.education_qualification"
                                       class="form-label">शैक्षिक
                                    योग्यता
                                    <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.education_qualification') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.education_qualification"
                                    wire:model="form.partners.{{ $key }}.education_qualification">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\Modules\BusinessRegistration\Enums\Qualification::cases() as $qualification)
                                        <option value="{{ $qualification->value ?? '' }}">
                                            {{ $qualification->label() ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.education_qualification")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.occupation" class="form-label"> मुख्य
                                    पेशा
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.occupation') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.occupation"
                                        wire:model="form.partners.{{ $key }}.occupation" placeholder="मुख्य पेशा">
                                    @error("form.partners.$key.occupation")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.father_name" class="form-label"> बुबाको
                                    नाम
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.father_name') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.father_name"
                                        wire:model="form.partners.{{ $key }}.father_name" placeholder="बुबाको नाम">
                                    @error("form.partners.$key.father_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.grandfather_name" class="form-label">
                                    हजुरबुबाको नाम
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.grandfather_name') is-invalid @enderror"
                                        type="text" id="form.partners.{{ $key }}.grandfather_name"
                                        wire:model="form.partners.{{ $key }}.grandfather_name"
                                        placeholder="हजुरबुबाको नाम">
                                    @error("form.partners.$key.grandfather_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.photo" class="form-label"> पासपोर्ट
                                    साइजको फोटो
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.photo') is-invalid @enderror"
                                        type="file" id="form.partners.{{ $key }}.photo"
                                        wire:model="form.partners.{{ $key }}.photo">
                                    <div wire:loading wire:target="form.partners.{{ $key }}.photo">Uploading...</div>
                                    @error("form.partners.$key.photo")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.signature" class="form-label">
                                    हस्ताक्षर
                                </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.signature') is-invalid @enderror"
                                        type="file" id="form.partners.{{ $key }}.signature"
                                        wire:model="form.partners.{{ $key }}.signature">
                                    <div wire:loading wire:target="form.partners.{{ $key }}.signature">Uploading...</div>
                                    @error("form.partners.$key.signature")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.citizenship_front" class="form-label">
                                    नागरिकता
                                    अपलोड
                                    गर्नुहोस् (आगाडी) </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.citizenship_front') is-invalid @enderror"
                                        type="file" id="form.partners.{{ $key }}.citizenship_front"
                                        wire:model="form.partners.{{ $key }}.citizenship_front">
                                    <div wire:loading wire:target="form.partners.{{ $key }}.citizenship_front">Uploading...</div>
                                    @error("form.partners.$key.citizenship_front")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.citizenship_back" class="form-label">
                                    नागरिकता
                                    अपलोड
                                    गर्नुहोस् (पछाडी) </label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.citizenship_back') is-invalid @enderror"
                                        type="file" id="form.partners.{{ $key }}.citizenship_back"
                                        wire:model="form.partners.{{ $key }}.citizenship_back">
                                    <div wire:loading wire:target="form.partners.{{ $key }}.citizenship_back">Uploading...</div>
                                    @error("form.partners.$key.citizenship_back")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label for="form.partners.{{ $key }}.position" class="form-label">
                                    मर्यादाक्रम <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input
                                        class="form-control @error('form.partners.' . $key . '.position') is-invalid @enderror"
                                        type="number" placeholder="मर्यादाक्रम "
                                        id="form.partners.{{ $key }}.position"
                                        wire:model="form.partners.{{ $key }}.position">
                                    @error("form.partners.$key.position")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @error('form.partners')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.province_id" class="form-label">प्रदेश</label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.province_id') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.province_id"
                                    wire:model="form.partners.{{ $key }}.province_id">
                                    <option value="">---प्रदेश छान्नुहोस् ----</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id ?? '' }}">{{ $province->province ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.province_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.district_id" class="form-label">जिल्ला</label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.district_id') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.district_id"
                                    wire:model="form.partners.{{ $key }}.district_id">
                                    <option value="">---जिल्ला छान्नुहोस् ----</option>
                                    @foreach (!empty($form['partners'][$key]['province_id']) ? get_districts(province_ids: $form['partners'][$key]['province_id']) : [] as $district)
                                        <option value="{{ $district->id }}">{{ $district->district }}</option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.district_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.local_body_id"
                                       class="form-label">पालिका</label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.local_body_id') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.local_body_id"
                                    wire:model="form.partners.{{ $key }}.local_body_id">
                                    <option value="">---पालिका छान्नुहोस् ----</option>
                                    @foreach (!empty($form['partners'][$key]['district_id']) ? get_local_bodies(district_ids: $form['partners'][$key]['district_id']) : [] as $localBody)
                                        <option value="{{ $localBody->id }}">{{ $localBody->local_body }}</option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.local_body_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.ward_no" class="form-label">वार्ड
                                    नं:</label>
                                <select
                                    class="form-select @error('form.partners.' . $key . '.ward_no') is-invalid @enderror"
                                    id="form.partners.{{ $key }}.ward_no"
                                    wire:model="form.partners.{{ $key }}.ward_no">
                                    <option value="">---वडा छान्नुहोस् ----</option>
                                    @foreach (!empty($form['partners'][$key]['local_body_id']) ? get_local_bodies(localBodyId: $form['partners'][$key]['local_body_id'])->ward_no : [] as $ward)
                                        <option value="{{ $ward }}">{{ $ward }}</option>
                                    @endforeach
                                </select>
                                @error("form.partners.$key.ward_no")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.way" class="form-label">मार्ग</label>
                                <input name="form.way"
                                       class="form-control @error('form.partners.' . $key . '.way') is-invalid @enderror"
                                       type="text" id="form.partners.{{ $key }}.way" placeholder="मार्ग"
                                       wire:model="form.partners.{{ $key }}.way"/>

                                @error("form.partners.$key.way")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="form.partners.{{ $key }}.tole" class="form-label">गाउँ/टोल</label>
                                <input name="form.partners.{{ $key }}.tole"
                                       class="form-control @error('form.partners.' . $key . '.tole') is-invalid @enderror"
                                       type="text" id="form.partners.{{ $key }}.tole" placeholder="गाउँ/टोल"
                                       wire:model="form.partners.{{ $key }}.tole"/>
                                @error("form.partners.$key.tole")
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
                        <button type="button" wire:click.prevent="partnerArrayIncrement" class="btn btn-info">
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
                    <legend class="title text-primary fs-4 fw-bolder">फर्म दर्ता विवरण</legend>
                    <div class="row">
                        <div class="col-md-12 mb-2 pr-0">
                            <label for="name" class="form-label">फर्म नाम <span class="text-danger">*</span></label>
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


                            <div class="col-md-6 mb-2 pr-0">
                                <label for="phone" class="form-label">फोन<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.phone') is-invalid @enderror"
                                           type="text" step="any" id="phone" wire:model="form.phone"
                                           placeholder="फोन">
                                    @error('form.phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2 pr-0">
                                <label for="email" class="form-label">इमेल<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.email') is-invalid @enderror"
                                           type="email" step="any" id="email" wire:model="form.email"
                                           placeholder="इमेल">
                                    @error('form.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div> <div class="col-md-6 mb-2 pr-0">
                                <label for="type" class="form-label">फर्मको प्रकार<span
                                        class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('form.type') is-invalid @enderror"
                                    id="form.type"
                                    wire:model="form.type">
                                    <option value="">---छान्नुहोस् ----</option>
                                    @foreach (\Modules\BusinessRegistration\Enums\ForumTypeEnum::cases() as $case)
                                        <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                                    @endforeach
                                </select>
                                    @error('form.type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            <div class="col-md-6 mb-2 pr-0">
                                <label for="investment" class="form-label">पूँजीगत लगानी <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.investment') is-invalid @enderror"
                                           type="number" step="any" id="investment" wire:model="form.investment"
                                           placeholder="पूँजीगत लगानी">
                                    @error('form.investment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="establish_date" class="form-label"> फर्म संचालन मिति <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.establish_date') is-invalid @enderror"
                                           type="text" id="establish_date" wire:model="form.establish_date"
                                           placeholder="फर्म संचालन मिति">
                                    @error('form.establish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="product" class="form-label">कारोबार विवरण <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.product') is-invalid @enderror"
                                           type="text" id="product" wire:model="form.product"
                                           placeholder="कारोबार विवरण">
                                    @error('form.product')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="other" class="form-label">अन्य <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control @error('form.other') is-invalid @enderror"
                                           type="text" id="other" wire:model="form.other"
                                           placeholder="अन्य">
                                    @error('form.other')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2 pr-0">
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
                <fieldset>
                    <legend class="title text-primary fs-4 fw-bolder"> चार किल्ला विवरण</legend>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="owner_name" class="form-label"> जग्गाधनिको नाम<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control @error('form.owner_name') is-invalid @enderror" type="text"
                                       step="any" id="owner_name" wire:model="form.owner_name"
                                       placeholder="जग्गाधनिको नाम">
                                @error('form.owner_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <label for="east" class="form-label"> पूर्व</label>
                            <div class="input-group">
                                <input class="form-control @error('form.east') is-invalid @enderror" type="text"
                                       step="any" id="east" wire:model="form.east" placeholder="पूर्व">
                                @error('form.east')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="west" class="form-label"> पश्चिम</label>
                            <div class="input-group">
                                <input class="form-control @error('form.west') is-invalid @enderror" type="text"
                                       step="any" id="west" wire:model="form.west" placeholder="पश्चिम">
                                @error('form.west')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="north" class="form-label"> उत्तर</label>
                            <div class="input-group">
                                <input class="form-control @error('form.north') is-invalid @enderror" type="text"
                                       step="any" id="north" wire:model="form.north" placeholder="उत्तर">
                                @error('form.north')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="south" class="form-label"> दक्षिण</label>
                            <div class="input-group">
                                <input class="form-control @error('form.south') is-invalid @enderror" type="text"
                                       step="any" id="south" wire:model="form.south" placeholder="दक्षिण">
                                @error('form.south')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="plot_no" class="form-label">जग्गाको कित्ता नं</label>
                            <div class="input-group">
                                <input class="form-control @error('form.plot_no') is-invalid @enderror" type="text"
                                       step="any" id="plot_no" wire:model="form.plot_no"
                                       placeholder="जग्गाको कित्ता नं">
                                @error('form.plot_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="area" class="form-label"> क्षेत्रफल</label>
                            <div class="input-group">
                                <input class="form-control @error('form.area') is-invalid @enderror" type="text"
                                       step="any" id="area" wire:model="form.area" placeholder="क्षेत्रफल">
                                @error('form.area')
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
