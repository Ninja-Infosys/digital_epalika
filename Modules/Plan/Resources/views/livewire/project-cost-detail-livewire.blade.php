<form wire:submit.prevent="submitFormData">
    <h4 class="header-title border-bottom mb-2">भौतिक तथा वित्तीय प्रगतिको विवरण</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="progress_spent_amount" class="form-label">वित्तीय प्रगति खर्च रकम </label>
            <input
                type="number"
                name="progress_spent_amount"
                wire:model="form.progress_spent_amount"
                class="form-control @error('progress_spent_amount') is-invalid @enderror"
                id="progress_spent_amount"
                placeholder="वित्तीय प्रगति खर्च रकम"
            />
            @error('progress_spent_amount')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_target" class="form-label">भौतिक प्रगति लक्ष्य परिमाण</label>
            <input
                type="number"
                name="physical_progress_target"
                wire:model="form.physical_progress_target"
                class="form-control @error('physical_progress_target') is-invalid @enderror"
                id="physical_progress_target"
                placeholder="भौतिक प्रगति लक्ष्य परिमाण"
            />
            @error('physical_progress_target')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_completed" class="form-label">भौतिक प्रगति सम्पन्न परिमाण </label>
            <input
                type="number"
                name="physical_progress_completed"
                wire:model="form.physical_progress_completed"
                class="form-control @error('physical_progress_completed') is-invalid @enderror"
                id="physical_progress_completed"
                placeholder="भौतिक प्रगति सम्पन्न परिमाण"
            />
            @error('physical_progress_completed')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="physical_progress_unit" class="form-label">भौतिक प्रगति एकाइ</label>
            <input
                type="text"
                name="physical_progress_unit"
                wire:model="form.physical_progress_unit"
                class="form-control @error('physical_progress_unit') is-invalid @enderror"
                id="physical_progress_unit"
                placeholder="भौतिक प्रगति एकाइ"
            />
            @error('physical_progress_unit')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <h4 class="header-title border-bottom mb-2">लागत व्यहोर्ने स्रोतहरु</h4>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="estimated_total_cost" class="form-label">अनुमानित लागत *</label>
            <input
                type="number"
                wire:model="form.estimated_total_cost"
                class="form-control @error('form.estimated_total_cost') is-invalid @enderror"
                id="estimated_total_cost"
                placeholder="अनुमानित लागत"
            />
            @error('form.estimated_total_cost')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="federal_invest" class="form-label">सघंबाट</label>
            <input
                type="number"
                wire:model="form.federal_invest"
                class="form-control @error('form.federal_invest') is-invalid @enderror"
                id="federal_invest"
                placeholder="सघंबाट"
            />
            @error('form.federal_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="province_invest" class="form-label">प्रदेशबाट</label>
            <input
                type="number"
                wire:model="form.province_invest"
                class="form-control @error('form.province_invest') is-invalid @enderror"
                id="province_invest"
                placeholder="प्रदेशबाट"
            />
            @error('form.province_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="local_level_invest" class="form-label">स्थानीय तह／कार्यालय बाट</label>
            <input
                type="number"
                wire:model="form.local_level_invest"
                class="form-control @error('form.local_level_invest') is-invalid @enderror"
                id="local_level_invest"
                placeholder="स्थानीय तह／कार्यालय बाट"
            />
            @error('form.local_level_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="consumer_committee_invest" class="form-label">जन श्रमदान／उपभोक्ता समिति बाट</label>
            <input
                type="number"
                wire:model="form.consumer_committee_invest"
                class="form-control @error('form.consumer_committee_invest') is-invalid @enderror"
                id="consumer_committee_invest"
                placeholder="जन श्रमदान／उपभोक्ता समिति बाट"
            />
            @error('form.consumer_committee_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="ngo_invest" class="form-label">गैरसरकारी सघंसंस्थाबाट</label>
            <input
                type="number"
                wire:model="form.ngo_invest"
                class="form-control @error('form.ngo_invest') is-invalid @enderror"
                id="ngo_invest"
                placeholder="गैरसरकारी सघंसंस्थाबाट"
            />
            @error('form.ngo_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="foreign_donor_invest" class="form-label">विदेशी दात्री सघंसंस्थाबाट</label>
            <input
                type="number"
                wire:model="form.foreign_donor_invest"
                class="form-control @error('form.foreign_donor_invest') is-invalid @enderror"
                id="foreign_donor_invest"
                placeholder="विदेशी दात्री सघंसंस्थाबाट"
            />
            @error('form.foreign_donor_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="others_invest" class="form-label">अन्य</label>
            <input
                type="number"
                wire:model="form.others_invest"
                class="form-control @error('form.others_invest') is-invalid @enderror"
                id="others_invest"
                placeholder="अन्य"
            />
            @error('form.others_invest')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-12 mb-2">
            <label for="estimated_cost_excluding_vat" class="form-label">लागत अनुमान (भ्याट, ओभर हेड, कन्टिन्जेन्सी
                बाहेक)</label>
            <input
                type="number"
                wire:model="form.estimated_cost_excluding_vat"
                class="form-control @error('form.estimated_cost_excluding_vat') is-invalid @enderror"
                id="estimated_cost_excluding_vat"
                placeholder="लागत अनुमान (भ्याट, ओभर हेड, कन्टिन्जेन्सी बाहेक)"
            />
            @error('form.estimated_cost_excluding_vat')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <h4 class="header-title border-bottom mb-2">बस्तुगत अनुदान सम्बन्धी विवरण</h4>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>उपलब्ध गराउने स्रोत/निकाय</th>
                <th>सामाग्रीको नाम</th>
                <th>परिमाण</th>
                <th>एकाइ</th>
                <th>
                    <button type="button" wire:click="addProjectGrantDetails" class="btn btn-xs btn-outline-primary">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($form['projectGrantDetails'] as $key=>$projectGrantDetail)
                <tr>
                    <td width="250">
                        <select
                            wire:model="form.projectGrantDetails.{{$key}}.grant_source"
                            class="form-select form-select-sm">
                            <option value="">--- छान्नुहोस् ---</option>
                            @foreach(\Modules\Plan\Enums\GrantSourceEnum::cases() as $grantSource)
                                <option
                                    value="{{$grantSource->value}}">
                                    {{$grantSource->label()}}
                                </option>
                            @endforeach
                        </select>
                        @error("form.projectGrantDetails.$key.grant_source")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.projectGrantDetails.{{$key}}.asset_name"
                            class="form-control form-control-sm"
                            placeholder="सामाग्रीको नाम"
                        />
                        @error("form.projectGrantDetails.$key.asset_name")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="number"
                            wire:model="form.projectGrantDetails.{{$key}}.quantity"
                            class="form-control form-control-sm"
                            placeholder="परिमाण"
                        />
                        @error("form.projectGrantDetails.$key.quantity")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.projectGrantDetails.{{$key}}.asset_unit"
                            class="form-control form-control-sm"
                            placeholder="एकाइ"
                        />
                        @error("form.projectGrantDetails.$key.asset_unit")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <button type="button" wire:click="removeProjectGrantDetails({{$key}})"
                                class="btn btn-xs btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">
                        विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <h4 class="header-title border-bottom mb-2">आयोजनाबाट लाभान्वित हुने</h4>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="benefited_organization" class="form-label">संगठित संस्था</label>
            <input
                type="number"
                wire:model="form.benefited_organization"
                class="form-control @error('form.benefited_organization') is-invalid @enderror"
                id="benefited_organization"
                placeholder="संगठित संस्था"
            />
            @error('form.benefited_organization')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="others_benefited" class="form-label">अन्य</label>
            <input
                type="number"
                wire:model="form.others_benefited"
                class="form-control @error('form.others_benefited') is-invalid @enderror"
                id="others_benefited"
                placeholder="अन्य"
            />
            @error('form.others_benefited')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <h4 class="header-title border-bottom mb-2">योजनाबाट प्रत्यक्ष रुपमा लाभान्वित हुने घरधुरी तथा जनसंख्याको विवरण</h4>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th rowspan="2" class="align-middle">वडा नं.</th>
                <th rowspan="2" class="align-middle text-center">गाँउ बस्ति</th>
                <th colspan="3" class="text-center">घरधुरी संख्या</th>
                <th colspan="3" class="text-center">जनसंख्या</th>
                <th rowspan="2" class="align-middle">
                    <button type="button" wire:click="addBenefitedMemberDetails" class="btn btn-xs btn-outline-primary">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </th>
            </tr>
            <tr>
                <th>दलित/पिछडिएका</th>
                <th>अन्य</th>
                <th>जम्मा</th>
                <th>महिला</th>
                <th>पुरुष</th>
                <th>जम्मा</th>
            </tr>
            </thead>
            <tbody>
            @forelse($form['benefitedMemberDetails'] as $key=>$benefitedMemberDetail)
                <tr>
                    <td width="90">
                        <select
                            wire:model="form.benefitedMemberDetails.{{$key}}.ward_no"
                            class="form-select form-select-sm">
                            <option value="">वडा</option>
                            @foreach($officeSetting->localBody->ward_no as $ward)
                                <option
                                    value="{{$ward}}">
                                    {{$ward}}
                                </option>
                            @endforeach
                        </select>
                        @error("form.benefitedMemberDetails.$key.ward_no")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.benefitedMemberDetails.{{$key}}.village"
                            class="form-control form-control-sm"
                            placeholder="गाँउ बस्ति"
                        />
                        @error("form.benefitedMemberDetails.$key.village")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td width="120">
                        <input
                            type="number"
                            wire:model="form.benefitedMemberDetails.{{$key}}.dalit_backward_no"
                            class="form-control form-control-sm"
                            placeholder="दलित/पिछडिएका"
                        />
                        @error("form.benefitedMemberDetails.$key.dalit_backward_no")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td width="90">
                        <input
                            type="number"
                            wire:model="form.benefitedMemberDetails.{{$key}}.other_households_no"
                            class="form-control form-control-sm"
                            placeholder="अन्य"
                        />
                        @error("form.benefitedMemberDetails.$key.other_households_no")
                        <div class="invalid-feedback">{{$message}}</div>
                    </td>
                    @enderror
                    <td>
                        {{($form['benefitedMemberDetails'][$key]['dalit_backward_no']??0)+($form['benefitedMemberDetails'][$key]['other_households_no']??0)}}
                    </td>
                    <td width="90">
                        <input
                            type="number"
                            wire:model="form.benefitedMemberDetails.{{$key}}.no_of_female"
                            class="form-control form-control-sm"
                            placeholder="महिला"
                        />
                        @error("form.benefitedMemberDetails.$key.no_of_female")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td width="90">
                        <input
                            type="number"
                            wire:model="form.benefitedMemberDetails.{{$key}}.no_of_male"
                            class="form-control form-control-sm"
                            placeholder="पुरुष"
                        />
                        @error("form.benefitedMemberDetails.$key.no_of_male")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        {{($form['benefitedMemberDetails'][$key]['no_of_female']??0)+($form['benefitedMemberDetails'][$key]['no_of_male']??0)}}
                    </td>
                    <td>
                        <button type="button" wire:click="removeBenefitedMemberDetails({{$key}})"
                                class="btn btn-xs btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="9">
                        विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
