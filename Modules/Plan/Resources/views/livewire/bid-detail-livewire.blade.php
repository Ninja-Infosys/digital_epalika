<form wire:submit.prevent="submitFormData">
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="cost_estimation" class="form-label">कार्यालयको स्वीकृत विभागिय लागत अनुमान</label>
            <input
                type="number"
                wire:model="form.cost_estimation"
                class="form-control @error('form.cost_estimation') is-invalid @enderror"
                id="cost_estimation"
                placeholder="कार्यालयको स्वीकृत विभागिय लागत अनुमान"
            />
            @error('form.cost_estimation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="notice_published_date" class="form-label">बोलपत्रको सुचना प्रकाशित मिति *</label>
            <input
                type="text"
                wire:model="form.notice_published_date"
                class="form-control @error('form.notice_published_date') is-invalid @enderror"
                id="notice_published_date"
                placeholder="बोलपत्रको सुचना प्रकाशित मिति"
            />
            @error('form.notice_published_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="newspaper_name" class="form-label">पत्रिकाको नाम</label>
            <input
                type="text"
                wire:model="form.newspaper_name"
                class="form-control @error('form.newspaper_name') is-invalid @enderror"
                id="newspaper_name"
                placeholder="पत्रिकाको नाम"
            />
            @error('form.newspaper_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <h4 class="header-title border-bottom mb-2">ठेक्का विवरण</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="contract_evaluation_decision_date" class="form-label">ठेक्का मुल्यांकनको निर्णय मिति</label>
            <input
                type="text"
                wire:model="form.contract_evaluation_decision_date"
                class="form-control @error('form.contract_evaluation_decision_date') is-invalid @enderror"
                id="contract_evaluation_decision_date"
                placeholder="ठेक्का मुल्यांकनको निर्णय मिति"
            />
            @error('form.contract_evaluation_decision_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="intent_notice_publish_date" class="form-label">आशयको सुचना प्रकाशित मिति</label>
            <input
                type="text"
                wire:model="form.intent_notice_publish_date"
                class="form-control @error('form.intent_notice_publish_date') is-invalid @enderror"
                id="intent_notice_publish_date"
                placeholder="आशयको सुचना प्रकाशित मिति"
            />
            @error('form.intent_notice_publish_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contract_newspaper_name" class="form-label">पत्रिकाको नाम</label>
            <input
                type="text"
                wire:model="form.contract_newspaper_name"
                class="form-control @error('form.contract_newspaper_name') is-invalid @enderror"
                id="contract_newspaper_name"
                placeholder="पत्रिकाको नाम"
            />
            @error('form.contract_newspaper_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contract_acceptance_decision_date" class="form-label">ठेक्का स्वीकृतीको निर्णय मिति</label>
            <input
                type="text"
                wire:model="form.contract_acceptance_decision_date"
                class="form-control @error('form.contract_acceptance_decision_date') is-invalid @enderror"
                id="contract_acceptance_decision_date"
                placeholder="ठेक्का स्वीकृतीको निर्णय मिति"
            />
            @error('form.contract_acceptance_decision_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contract_percentage" class="form-label">ठेक्का विलो प्रतिशत</label>
            <input
                type="number"
                wire:model="form.contract_percentage"
                class="form-control @error('form.contract_percentage') is-invalid @enderror"
                id="contract_percentage"
                placeholder="ठेक्का विलो प्रतिशत"
            />
            @error('form.contract_percentage')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contractor_name" class="form-label">कम्पनीको नाम</label>
            <input
                type="text"
                wire:model="form.contractor_name"
                class="form-control @error('form.contractor_name') is-invalid @enderror"
                id="contractor_name"
                placeholder="कम्पनीको नाम"
            />
            @error('form.contractor_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contractor_address" class="form-label">कम्पनीको ठेगाना</label>
            <input
                type="text"
                wire:model="form.contractor_address"
                class="form-control @error('form.contractor_address') is-invalid @enderror"
                id="contractor_address"
                placeholder="कम्पनीको ठेगाना"
            />
            @error('form.contractor_address')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contractor_phone" class="form-label">सम्पर्क नम्बर</label>
            <input
                type="text"
                wire:model="form.contractor_phone"
                class="form-control @error('form.contractor_phone') is-invalid @enderror"
                id="contractor_phone"
                placeholder="सम्पर्क नम्बर"
            />
            @error('form.contractor_phone')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="confession_number" class="form-label">कबोल अंक</label>
            <input
                type="text"
                wire:model="form.confession_number"
                class="form-control @error('form.confession_number') is-invalid @enderror"
                id="confession_number"
                placeholder="कबोल अंक"
            />
            @error('form.confession_number')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contract_agreement_date" class="form-label">ठेक्का सम्झौता मिति</label>
            <input
                type="text"
                wire:model="form.contract_agreement_date"
                class="form-control @error('form.contract_agreement_date') is-invalid @enderror"
                id="contract_agreement_date"
                placeholder="ठेक्का सम्झौता मिति"
            />
            @error('form.contract_agreement_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="contract_assigned_date" class="form-label">कार्यादेशको मिति</label>
            <input
                type="text"
                wire:model="form.contract_assigned_date"
                class="form-control @error('form.contract_assigned_date') is-invalid @enderror"
                id="contract_assigned_date"
                placeholder="कार्यादेशको मिति"
            />
            @error('form.contract_assigned_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <h4 class="header-title border-bottom mb-2">विडवण्ड/परफरमेन्स विवरण</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="bid_bond_amount" class="form-label">विडवण्ड रकम</label>
            <input
                type="number"
                wire:model="form.bid_bond_amount"
                class="form-control @error('form.bid_bond_amount') is-invalid @enderror"
                id="bid_bond_amount"
                placeholder="विडवण्ड रकम"
            />
            @error('form.bid_bond_amount')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="bid_bond_no" class="form-label">विडवण्ड नं.</label>
            <input
                type="number"
                wire:model="form.bid_bond_no"
                class="form-control @error('form.bid_bond_no') is-invalid @enderror"
                id="bid_bond_no"
                placeholder="विडवण्ड नं."
            />
            @error('form.bid_bond_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="bid_bond_bank_name" class="form-label">विडवण्ड बैंकको नाम</label>
            <input
                type="text"
                wire:model="form.bid_bond_bank_name"
                class="form-control @error('form.bid_bond_bank_name') is-invalid @enderror"
                id="bid_bond_bank_name"
                placeholder="विडवण्ड बैंकको नाम"
            />
            @error('form.bid_bond_bank_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="bid_bond_issue_date" class="form-label">विडवण्ड जारी मिति</label>
            <input
                type="text"
                wire:model="form.bid_bond_issue_date"
                class="form-control @error('form.bid_bond_issue_date') is-invalid @enderror"
                id="bid_bond_issue_date"
                placeholder="विडवण्ड जारी मिति"
            />
            @error('form.bid_bond_issue_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="bid_bond_expiry_date" class="form-label">विडवण्ड म्याद सकिने मिति</label>
            <input
                type="text"
                wire:model="form.bid_bond_expiry_date"
                class="form-control @error('form.bid_bond_expiry_date') is-invalid @enderror"
                id="bid_bond_expiry_date"
                placeholder="विडवण्ड म्याद सकिने मिति"
            />
            @error('form.bid_bond_expiry_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_no" class="form-label">परफरमेन्स वण्ड नं.</label>
            <input
                type="number"
                wire:model="form.performance_bond_no"
                class="form-control @error('form.performance_bond_no') is-invalid @enderror"
                id="performance_bond_no"
                placeholder="परफरमेन्स वण्ड नं."
            />
            @error('form.performance_bond_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_amount" class="form-label">परफरमेन्स वण्ड रकम</label>
            <input
                type="number"
                wire:model="form.performance_bond_amount"
                class="form-control @error('form.performance_bond_amount') is-invalid @enderror"
                id="performance_bond_amount"
                placeholder="परफरमेन्स वण्ड रकम"
            />
            @error('form.performance_bond_amount')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_bank" class="form-label">परफरमेन्स वण्ड बैंकको नाम</label>
            <input
                type="text"
                wire:model="form.performance_bond_bank"
                class="form-control @error('form.performance_bond_bank') is-invalid @enderror"
                id="performance_bond_bank"
                placeholder="परफरमेन्स वण्ड बैंकको नाम"
            />
            @error('form.performance_bond_bank')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_issue_date" class="form-label">परफरमेन्स वण्ड जारी मिति</label>
            <input
                type="text"
                wire:model="form.performance_bond_issue_date"
                class="form-control @error('form.performance_bond_issue_date') is-invalid @enderror"
                id="performance_bond_issue_date"
                placeholder="परफरमेन्स वण्ड जारी मिति"
            />
            @error('form.performance_bond_issue_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_expiry_date" class="form-label">परफरमेन्स वण्ड म्याद सकिने मिति</label>
            <input
                type="text"
                wire:model="form.performance_bond_expiry_date"
                class="form-control @error('form.performance_bond_expiry_date') is-invalid @enderror"
                id="performance_bond_expiry_date"
                placeholder="परफरमेन्स वण्ड म्याद सकिने मिति"
            />
            @error('form.performance_bond_expiry_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="performance_bond_extended_date" class="form-label">परफरमेन्स वण्ड म्याद थपको मिति</label>
            <input
                type="text"
                wire:model="form.performance_bond_extended_date"
                class="form-control @error('form.performance_bond_extended_date') is-invalid @enderror"
                id="performance_bond_extended_date"
                placeholder="परफरमेन्स वण्ड म्याद थपको मिति"
            />
            @error('form.performance_bond_extended_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <h4 class="header-title border-bottom mb-2">
        इन्स्योरेन्स विवरण
    </h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="insurance_issue_date" class="form-label">इन्स्योरेन्स जारी मिति</label>
            <input
                type="text"
                wire:model="form.insurance_issue_date"
                class="form-control @error('form.insurance_issue_date') is-invalid @enderror"
                id="insurance_issue_date"
                placeholder="इन्स्योरेन्स जारी मिति"
            />
            @error('form.insurance_issue_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="insurance_expiry_date" class="form-label">इन्स्योरेन्स सकिने मिति</label>
            <input
                type="text"
                wire:model="form.insurance_expiry_date"
                class="form-control @error('form.insurance_expiry_date') is-invalid @enderror"
                id="insurance_expiry_date"
                placeholder="इन्स्योरेन्स सकिने मिति"
            />
            @error('form.insurance_expiry_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="insurance_extended_date" class="form-label">इन्स्योरेन्स म्याद थप हुने मिति</label>
            <input
                type="text"
                wire:model="form.insurance_extended_date"
                class="form-control @error('form.insurance_extended_date') is-invalid @enderror"
                id="insurance_extended_date"
                placeholder="इन्स्योरेन्स म्याद थप हुने मिति"
            />
            @error('form.insurance_extended_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/plugins/datepicker.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#notice_published_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#notice_published_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('noticePublishedDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#contract_evaluation_decision_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#contract_evaluation_decision_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('contractEvaluationDecisionDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#intent_notice_publish_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#intent_notice_publish_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('intentNoticePublishDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#contract_acceptance_decision_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#contract_acceptance_decision_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('contractAcceptanceDecisionDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#contract_agreement_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#contract_agreement_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('contractAgreementDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#contract_assigned_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#contract_assigned_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('contractAssignedDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#bid_bond_issue_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#bid_bond_issue_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('bidBondIssueDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#bid_bond_expiry_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#bid_bond_expiry_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('bidBondExpiryDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#performance_bond_issue_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#performance_bond_issue_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('performanceBondIssueDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#performance_bond_expiry_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#performance_bond_expiry_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('performanceBondExpiryDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#performance_bond_extended_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#performance_bond_extended_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('performanceBondExtendedDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#insurance_issue_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#insurance_issue_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('insuranceIssueDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#insurance_expiry_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#insurance_expiry_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('insuranceExpiryDateChanged', inputFieldDate, formattedDate);
                    }
                });
                $("#insurance_extended_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#insurance_extended_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);
                        Livewire.emit('insuranceExtendedDateChanged', inputFieldDate, formattedDate);
                    }
                });
            });
        </script>
    @endpush
@endonce
