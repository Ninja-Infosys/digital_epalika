<form wire:submit.prevent="saveFormData">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="application_type" class="form-label fw-bold"> नक्सा <span class="text-danger">*</span></label>
            <select wire:model="oldMap.application_type" id="application_type" class="form-select form-select-sm" required>
                <option value="">--- नक्सा छान्नुहोस् ---</option>
                @foreach (\Modules\EMap\Enums\ApplicationFormTypeEnum::cases() as $applicationFormTypeEnum)
                    <option value="{{ $applicationFormTypeEnum->value }}">{{ $applicationFormTypeEnum->label() }}
                    </option>
                @endforeach
            </select>
            @error('oldMap.application_type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label" for="fiscal_year_id">आर्थिक बर्ष </label>
            <select wire:model="oldMap.fiscal_year_id" id="fiscal_year_id" class="form-select form-select-sm" required>
                <option value="">--- आर्थिक बर्ष छान्नुहोस् ---</option>
                @foreach ($fiscalYears as $fiscalYear)
                    <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->title }}</option>
                @endforeach
            </select>
            @error('oldMap.fiscal_year_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-2">
            <label class="form-label" for="oldMap">दर्ता नं. </label>
            <input class="form-control form-control-sm" type="text" id="oldMap"
                wire:model="oldMap.registration_no" placeholder="दर्ता नं.">
            @error('oldMap.registration_no')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-2">
            <label class="form-label" for="registration_fee">दर्ता रकम</label>
            <input class="form-control form-control-sm" type="number" step="any" id="registration_fee"
                wire:model="oldMap.registration_fee" placeholder="दर्ता रकम">
            @error('oldMap.registration_fee')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-2">
            <label class="form-label" for="registration_date">दर्ता मिति</label>
            <input class="form-control form-control-sm" type="text" id="registration_date"
                wire:model="oldMap.registration_date" placeholder="दर्ता मिति">
            @error('oldMap.registration_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="card border border-1 round-1">
        <legend>
            <h5>१. प्रस्तावित भवनको विवरण</h5>
        </legend>
        <div class="mb-3">
            <label class="form-label fw-bold">१.१ निर्माण कार्यको किसिम *</label>
            <div class="col mt-1">
                @foreach (\Modules\EMap\Enums\TypeOfConstructionWorkEnum::cases() as $constructionType)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mt-1 mb-1" type="radio" wire:model="oldMap.construction_type"
                            id="{{ $constructionType->name }}" value="{{ $constructionType->value }}">
                        <label class="form-check-label mt-1 mb-1"
                            for="{{ $constructionType->name }}">{{ $constructionType->label() }}</label>
                    </div>
                @endforeach
                @error('oldMap.construction_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">१.२ प्रयोजन *</label>
            <div class="col mt-1">
                @foreach (\Modules\EMap\Enums\BuildingUsageEnum::cases() as $usages)
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input mt-1 mb-1" id="{{ $usages->name }}"
                            wire:model="oldMap.usage" value="{{ $usages->value }}">
                        <label class="form-check-label mt-1 mb-1"
                            for="{{ $usages->name }}">{{ $usages->label() }}</label>
                    </div>
                @endforeach
                @error('oldMap.usage')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">१.३ भवन ऐन अनुसार वर्गीकरण *</label>
            <div class="col mt-1">
                @foreach (\Modules\EMap\Enums\CategorizationEnum::cases() as $categorization)
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input mt-1 mb-1" id="{{ $categorization->name }}"
                            wire:model="oldMap.building_category" value="{{ $categorization->value }}">
                        <label class="form-check-label mt-1 mb-1"
                            for="{{ $categorization->name }}">{{ $categorization->label() }}</label>
                    </div>
                @endforeach
                @error('oldMap.building_category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="card border border-1 round-1 mt-3">
        <legend>
            <h5>२. घर धनीको विवरण</h5>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.name">२.१ जग्गा धनीको नाम </label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.name"
                    wire:model="houseOwner.name" placeholder=" जग्गा धनीको नाम">
                @error('houseOwner.name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.phone">२.२ फोन नं.</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.phone"
                    wire:model="houseOwner.phone" placeholder="फोन नं.">
                @error('houseOwner.phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.father_name">२.३ बुवाको नाम</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.father_name"
                    wire:model="houseOwner.father_name" placeholder="बुवाको नाम">
                @error('houseOwner.father_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.grandfather_name">२.४ हजुरबुबाको नाम</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.grandfather_name"
                    wire:model="houseOwner.grandfather_name" placeholder="हजुरबुबाको नाम">
                @error('houseOwner.grandfather_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.citizenship_no">२.६ नागरिकता नम्बर</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.citizenship_no"
                    wire:model="houseOwner.citizenship_no" placeholder="नागरिकता नम्बर">
                @error('houseOwner.citizenship_no')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.citizenship_issue_date">२.७ नागरिकता लिएको मिति</label>
                <input class="form-control form-control-sm mt-1" type="text"
                    id="houseOwner.citizenship_issue_date" wire:model="houseOwner.citizenship_issue_date"
                    placeholder="yyyy/mm/dd">
                @error('houseOwner.citizenship_issue_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.citizenship_issue_district_id">२.५ नागरिकता लिएको
                    जिल्ला</label>
                <select class="form-select form-select-sm mt-1" wire:model="houseOwner.citizenship_issue_district_id"
                    id="houseOwner.citizenship_issue_district_id">
                    <option value="">--- जिल्ला छान्नुहोस् ---</option>
                    @foreach ($allDistricts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->district }}
                        </option>
                    @endforeach
                </select>
                @error('houseOwner.citizenship_issue_district_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.address">२.८ ठेगाना</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.address"
                    wire:model="houseOwner.address" placeholder="ठेगाना">
                @error('houseOwner.address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.local_body">२.९ पालिका</label>
                <input class="form-control form-control-sm mt-1" type="text" id="houseOwner.local_body"
                    wire:model="houseOwner.local_body" placeholder="पालिका">
                @error('houseOwner.local_body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label" for="houseOwner.ward_no">२.१० वडा नं.</label>
                <input class="form-control form-control-sm mt-1" type="number" id="houseOwner.ward_no"
                    wire:model="houseOwner.ward_no" min="0" placeholder="वडा नं.">
                @error('houseOwner.ward_no')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="card border border-1 round-1 mt-3">
        <legend>
            <h5>३. सम्बन्धित कागजातहरू</h5>
        </legend>
        <div class="table-responsive">
            <table class="table table-sm mb-0 table-bordered">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>फाइलको नाम</th>
                        <th>फाइल</th>
                        <th>
                            <button type="button" wire:click="addOldMapDocuments"
                                class="btn btn-xs btn-outline-primary" title="नयाँ फाइल थप्नुहोस्">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($oldMap['oldMapDocuments'] as $key=>$document)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <input type="text"
                                    wire:model="oldMap.oldMapDocuments.{{ $key }}.document_name"
                                    class="form-control form-control-sm" placeholder="फाइलको नाम"
                                    required />
                                @error("oldMap.oldMapDocuments.$key.document_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="file"
                                    wire:model="oldMap.oldMapDocuments.{{ $key }}.document"
                                    class="form-control form-control-sm" placeholder="फाइल"
                                    required />
                                @error("oldMap.oldMapDocuments.$key.document")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <button type="button"
                                    wire:click="removeOldMapDocuments({{ $key }})"
                                    class="btn btn-xs btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">
                                विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @error('form.oldMapDocuments')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
    </div>

</form>
@push('scripts')
    <script src="{{ asset('assets/backend/js/plugins/datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#date").nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                onChange: function() {
                    let inputFieldDate = $("#date").val();
                    let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                    let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                    $("#en_date").val(formattedDate);

                    Livewire.emit('dateChanged', inputFieldDate, formattedDate);
                }
            });

            @if (!$oldMap)
                let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(),
                    "YYYY-MM-DD")
                let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(),
                    "YYYY-MM-DD")
                Livewire.emit('dateChanged', todayBsDate, todayAdDate);
            @endif
        });
    </script>
@endpush
