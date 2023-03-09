@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.project.index') }}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> आयोजनाको लागत सम्वन्धि विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title"> आयोजनाको लागत सम्वन्धि विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">२. आयोजनाको लागत सम्वन्धि विवरण</h4>
                </div>
                <div class="card-body">
                    {{-- @livewire('plan::project-cost-detail-livewire',['project_id'=>$project->id]) --}}
                    <form id="cost-detail" action="#" method="post">
                        @csrf
                        <fieldset>
                            <legend>
                                भौतिक तथा वित्तीय प्रगतिको विवरण</legend>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="progress_spent_amount" class="form-label">वित्तीय प्रगति खर्च रकम </label>
                                    <input type="number" name="progress_spent_amount"
                                        wire:model="form.progress_spent_amount"
                                        class="form-control @error('progress_spent_amount') is-invalid @enderror"
                                        id="progress_spent_amount" placeholder="वित्तीय प्रगति खर्च रकम" />
                                    @error('progress_spent_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="physical_progress_target" class="form-label">भौतिक प्रगति लक्ष्य
                                        परिमाण</label>
                                    <input type="number" name="physical_progress_target"
                                        wire:model="form.physical_progress_target"
                                        class="form-control @error('physical_progress_target') is-invalid @enderror"
                                        id="physical_progress_target" placeholder="भौतिक प्रगति लक्ष्य परिमाण" />
                                    @error('physical_progress_target')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="physical_progress_completed" class="form-label">भौतिक प्रगति सम्पन्न परिमाण
                                    </label>
                                    <input type="number" name="physical_progress_completed"
                                        wire:model="form.physical_progress_completed"
                                        class="form-control @error('physical_progress_completed') is-invalid @enderror"
                                        id="physical_progress_completed" placeholder="भौतिक प्रगति सम्पन्न परिमाण" />
                                    @error('physical_progress_completed')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="physical_progress_unit" class="form-label">भौतिक प्रगति एकाइ</label>
                                    <input type="text" name="physical_progress_unit"
                                        wire:model="form.physical_progress_unit"
                                        class="form-control @error('physical_progress_unit') is-invalid @enderror"
                                        id="physical_progress_unit" placeholder="भौतिक प्रगति एकाइ" />
                                    @error('physical_progress_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>


                        <fieldset class="mt-2">
                            <legend>योजनाको लागत विवरण</legend>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="office_grant" class="form-label">कार्यालयबाट अनुदान रकम *</label>
                                    <input type="number" wire:model="form.office_grant" readonly
                                        class="form-control @error('form.office_grant') is-invalid @enderror" id="office_grant"
                                        placeholder="कार्यालयबाट अनुदान रकम" />
                                    @error('form.office_grant')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="agencies_grants" class="form-label">अन्य निकायबाट प्राप्त अनुदान</label>
                                    <input type="number" wire:model="form.agencies_grants"
                                        class="form-control @error('form.agencies_grants') is-invalid @enderror"
                                        id="agencies_grants" placeholder="अन्य निकायबाट प्राप्त अनुदान" />
                                    @error('form.agencies_grants')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="share_amount" class="form-label">अन्य साझेदारी रकम</label>
                                    <input type="number" wire:model="form.share_amount"
                                        class="form-control @error('form.share_amount') is-invalid @enderror" id="share_amount"
                                        placeholder="अन्य साझेदारी रकम" />
                                    @error('form.share_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="committee_share_amount" class="form-label">समितिबाट नगद साझेदारी रकम</label>
                                    <input type="number" wire:model="form.committee_share_amount"
                                        class="form-control @error('form.committee_share_amount') is-invalid @enderror"
                                        id="committee_share_amount" placeholder="समितिबाट नगद साझेदारी रकम" />
                                    @error('form.committee_share_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="total_amount_for_contingency" class="form-label">कन्टिजेन्सी सहितको कुल
                                        रकम</label>
                                    <input type="number" wire:model="form.total_amount_for_contingency" readonly
                                        class="form-control @error('form.total_amount_for_contingency') is-invalid @enderror"
                                        id="total_amount_for_contingency" placeholder="कन्टिजेन्सी सहितको कुल रकम" />
                                    @error('form.total_amount_for_contingency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="contingency_percent" class="form-label">कन्टिजेन्सी कट्टी % </label>
                                    <input type="number" wire:model="form.contingency_percent"
                                        class="form-control @error('form.contingency_percent') is-invalid @enderror"
                                        step="any" id="contingency_percent" max="100"
                                        placeholder="कन्टिजेन्सी कट्टी %" />
                                    @error('form.contingency_percent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="contingency_amount" class="form-label">कन्टिजेन्सी कट्टी रकम</label>
                                    <input type="number" wire:model="form.contingency_amount" readonly
                                        class="form-control @error('form.contingency_amount') is-invalid @enderror"
                                        id="contingency_amount" placeholder="कन्टिजेन्सी कट्टी रकम" />
                                    @error('form.contingency_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="other_taxes" class="form-label">अन्य करकट्टी रकम</label>
                                    <input type="number" wire:model="form.other_taxes"
                                        class="form-control @error('form.other_taxes') is-invalid @enderror" id="other_taxes"
                                        placeholder="अन्य करकट्टी रकम" />
                                    @error('form.other_taxes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="project_contract_amount" class="form-label">योजना सम्झौता रकम </label>
                                    <input type="number" wire:model="form.project_contract_amount" readonly
                                        class="form-control @error('form.project_contract_amount') is-invalid @enderror"
                                        id="project_contract_amount" placeholder=" योजना सम्झौता रकम " />
                                    @error('form.project_contract_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="labor_amount" class="form-label">समितिबाट जनश्रमदान रकम </label>
                                    <input type="number" wire:model="form.labor_amount"
                                        class="form-control @error('form.labor_amount') is-invalid @enderror"
                                        id="labor_amount" placeholder="समितिबाट जनश्रमदान रकम" />
                                    @error('form.labor_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="total_cost_estimate_amount" class="form-label">कुल लागत अनुमान रकम </label>
                                    <input type="number" wire:model="form.total_cost_estimate_amount" readonly
                                        class="form-control @error('form.total_cost_estimate_amount') is-invalid @enderror"
                                        id="total_cost_estimate_amount" placeholder="कुल लागत अनुमान रकम" />
                                    @error('form.total_cost_estimate_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-2">
                            <legend>बस्तुगत अनुदान सम्बन्धी विवरण</legend>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label for="detail" class="form-label fw-bold">अनुदान विवरण <span
                                        class="text-danger">*</span></label>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-outline-info"
                                    data-target-element="detail"
                                    data-toggle="add-more">
                                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                </button>
                            </div>
                            <div id="detail">
                                <div class="main">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-toggle="remove-parent" data-parent=".main"
                                                data-target-element="detail">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="row border-bottom mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">उपलब्ध गराउने स्रोत/निकाय</label>
                                            <select
                                                name="grant_source"
                                                class="form-select">
                                                <option value="">छान्नुहोस्</option>
                                                @foreach (\Modules\Plan\Enums\GrantSourceEnum::cases() as $grantSource)
                                                    <option
                                                    value="{{$grantSource->value}}">
                                                    {{$grantSource->label()}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">सामाग्रीको नाम</label>
                                            <input
                                                type="text"
                                                name="asset_name"
                                                class="form-control"
                                                placeholder="सामाग्रीको नाम"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">परिमाण</label>
                                            <input
                                                type="text"
                                                name="quantity"
                                                class="form-control"
                                                placeholder="परिमाण"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">एकाइ</label>
                                            <input
                                                type="text"
                                                name="asset_unit"
                                                class="form-control"
                                                placeholder="एकाइ"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-2">
                            <legend>आयोजनाबाट लाभान्वित हुने</legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="benefited_organization" class="form-label">संगठित संस्था</label>
                                    <input type="number" wire:model="form.benefited_organization"
                                        class="form-control @error('form.benefited_organization') is-invalid @enderror"
                                        id="benefited_organization" placeholder="संगठित संस्था" />
                                    @error('form.benefited_organization')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="others_benefited" class="form-label">अन्य</label>
                                    <input type="number" wire:model="form.others_benefited"
                                        class="form-control @error('form.others_benefited') is-invalid @enderror"
                                        id="others_benefited" placeholder="अन्य" />
                                    @error('form.others_benefited')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                       

                        <fieldset class="my-2">
                            <legend>योजनाबाट प्रत्यक्ष रुपमा लाभान्वित हुने घरधुरी तथा जनसंख्याको विवरण</legend>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label for="plan" class="form-label fw-bold">घरधुरी तथा जनसंख्याको विवरण <span
                                        class="text-danger">*</span></label>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-outline-info"
                                    data-target-element="plan"
                                    data-toggle="add-more">
                                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                </button>
                            </div>
                            <div id="plan">
                                <div class="main">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-toggle="remove-parent" data-parent=".main"
                                                data-target-element="plan">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="row border-bottom mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">वडा नं.</label>
                                            <select
                                                name="grant_source"
                                                class="form-select">
                                                <option value="">छान्नुहोस्</option>
                                                @foreach ($officeSetting->localBody->ward_no as $ward)
                                                    <option
                                                    value="{{$ward}}">
                                                        {{$ward}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">गाँउ बस्ति</label>
                                            <input
                                                type="text"
                                                name="village"
                                                class="form-control"
                                                placeholder="गाँउ बस्ति"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">दलित/पिछडिएका घरधुरी संख्या</label>
                                            <input
                                                type="number"
                                                name="quantity"
                                                class="form-control"
                                                placeholder="दलित/पिछडिएका"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">अन्य</label>
                                            <input
                                                type="number"
                                                name="other_households_no"
                                                class="form-control"
                                                placeholder="अन्य"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">जम्मा</label>
                                            <input
                                                type="number"
                                                name="other_households_no"
                                                class="form-control"
                                                placeholder="जम्मा"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">महिला</label>
                                            <input
                                                type="number"
                                                name="no_of_female"
                                                class="form-control"
                                                placeholder="महिला"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">पुरुष</label>
                                            <input
                                                type="number"
                                                name="no_of_male"
                                                class="form-control"
                                                placeholder="पुरुष"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">अन्य</label>
                                            <input
                                                type="number"
                                                name="no_of_others"
                                                class="form-control"
                                                placeholder="अन्य"
                                            />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">जम्मा</label>
                                            <input
                                                type="number"
                                                name="no_of_others"
                                                class="form-control"
                                                placeholder="जम्मा"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        {{-- <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">वडा नं.</th>
                                    <th rowspan="2" class="align-middle text-center">गाँउ बस्ति</th>
                                    <th colspan="3" class="text-center">घरधुरी संख्या</th>
                                    <th colspan="4" class="text-center">जनसंख्या</th>
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
                                    <th>अन्य</th>
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
                                                @foreach ($officeSetting->localBody->ward_no as $ward)
                                                    <option
                                                        value="{{$ward}}">
                                                        {{$ward}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.village"
                                                class="form-control form-control-sm"
                                                placeholder="गाँउ बस्ति"
                                            />
                                        </td>
                                        <td width="120">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.dalit_backward_no"
                                                class="form-control form-control-sm"
                                                placeholder="दलित/पिछडिएका"
                                            />
                                        </td>
                                        <td width="90">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.other_households_no"
                                                class="form-control form-control-sm"
                                                placeholder="अन्य"
                                            />
                                        </td>
                                        <td>
                                            {{((double)($form['benefitedMemberDetails'][$key]['dalit_backward_no']??0))+((double)($form['benefitedMemberDetails'][$key]['other_households_no']??0))}}
                                        </td>
                                        <td width="90">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.no_of_female"
                                                class="form-control form-control-sm"
                                                placeholder="महिला"
                                            />
                                        </td>
                                        <td width="90">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.no_of_male"
                                                class="form-control form-control-sm"
                                                placeholder="पुरुष"
                                            />
                                        </td>
                                        <td width="90">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model="form.benefitedMemberDetails.{{$key}}.no_of_others"
                                                class="form-control form-control-sm"
                                                placeholder="अन्य"
                                            />
                                        </td>
                                        <td>
                                            {{((double)($form['benefitedMemberDetails'][$key]['no_of_female']??0))+((double)($form['benefitedMemberDetails'][$key]['no_of_male']??0))+((double)($form['benefitedMemberDetails'][$key]['no_of_others']??0))}}
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
                                        <td class="text-center" colspan="10">
                                            विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div> --}}

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
