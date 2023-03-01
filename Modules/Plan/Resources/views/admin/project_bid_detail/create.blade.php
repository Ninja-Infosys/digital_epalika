@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> बोलपत्र सम्वन्धि विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title"> बोलपत्र सम्वन्धि विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        बोलपत्र सम्वन्धि विवरण
                    </h4>
                    <a href="{{route('admin.plan.project.index')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-list"></i> योजना/कार्यक्रम हरू
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.project.projectBidDetail.store',$project)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label for="bid_no" class="form-label">बोलपत्र नं.</label>
                                <input
                                    type="text"
                                    name="bid_no"
                                    value="{{old('bid_no',$project->projectBidDetail->bid_no??'')}}"
                                    class="form-control @error('bid_no') is-invalid @enderror"
                                    id="bid_no"
                                    placeholder="बोलपत्र नं."
                                />
                                @error('bid_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="cost_estimation" class="form-label">कार्यालयको स्वीकृत विभागिय लागत
                                    अनुमान</label>
                                <input
                                    type="number"
                                    name="cost_estimation"
                                    value="{{old('cost_estimation',$project->projectBidDetail->cost_estimation??'')}}"
                                    class="form-control @error('cost_estimation') is-invalid @enderror"
                                    id="cost_estimation"
                                    placeholder="कार्यालयको स्वीकृत विभागिय लागत अनुमान"
                                    required
                                />
                                @error('cost_estimation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="notice_published_date" labelNe="बोलपत्रको सुचना प्रकाशित मिति *"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->notice_published_date??''"
                                />
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="newspaper_name" class="form-label">पत्रिकाको नाम</label>
                                <input
                                    type="text"
                                    name="newspaper_name"
                                    value="{{old('newspaper_name',$project->projectBidDetail->newspaper_name??'')}}"
                                    class="form-control @error('newspaper_name') is-invalid @enderror"
                                    id="newspaper_name"
                                    placeholder="पत्रिकाको नाम"
                                    required
                                />
                                @error('newspaper_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <h4 class="header-title border-bottom mb-2">ठेक्का विवरण</h4>
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="contract_evaluation_decision_date" labelNe="ठेक्का मुल्यांकनको निर्णय मिति"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->contract_evaluation_decision_date??''"
                                />
                            </div>
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="intent_notice_publish_date" labelNe="आशयको सुचना प्रकाशित मिति"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->intent_notice_publish_date??''"
                                />
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contract_newspaper_name" class="form-label">पत्रिकाको नाम</label>
                                <input
                                    type="text"
                                    name="contract_newspaper_name"
                                    value="{{old('contract_newspaper_name',$project->projectBidDetail->contract_newspaper_name??'')}}"
                                    class="form-control @error('contract_newspaper_name') is-invalid @enderror"
                                    id="contract_newspaper_name"
                                    placeholder="पत्रिकाको नाम"
                                />
                                @error('contract_newspaper_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="contract_acceptance_decision_date" labelNe="ठेक्का स्वीकृतीको निर्णय मिति"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->contract_acceptance_decision_date??''"
                                />
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contract_percentage" class="form-label">ठेक्का विलो प्रतिशत</label>
                                <input
                                    type="number"
                                    name="contract_percentage"
                                    value="{{old('contract_percentage',$project->projectBidDetail->contract_percentage??'')}}"
                                    class="form-control @error('contract_percentage') is-invalid @enderror"
                                    id="contract_percentage"
                                    placeholder="ठेक्का विलो प्रतिशत"
                                    required
                                />
                                @error('contract_percentage')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contractor_name" class="form-label">कम्पनीको नाम</label>
                                <input
                                    type="text"
                                    name="contractor_name"
                                    value="{{old('contractor_name',$project->projectBidDetail->contractor_name??'')}}"
                                    class="form-control @error('contractor_name') is-invalid @enderror"
                                    id="contractor_name"
                                    placeholder="कम्पनीको नाम"
                                />
                                @error('contractor_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contractor_address" class="form-label">कम्पनीको ठेगाना</label>
                                <input
                                    type="text"
                                    name="contractor_address"
                                    value="{{old('contractor_name',$project->projectBidDetail->contractor_name??'')}}"
                                    class="form-control @error('contractor_address') is-invalid @enderror"
                                    id="contractor_address"
                                    placeholder="कम्पनीको ठेगाना"
                                />
                                @error('contractor_address')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contractor_phone" class="form-label">सम्पर्क नम्बर</label>
                                <input
                                    type="text"
                                    name="contractor_phone"
                                    value="{{old('contractor_phone',$project->projectBidDetail->contractor_phone??'')}}"
                                    class="form-control @error('contractor_phone') is-invalid @enderror"
                                    id="contractor_phone"
                                    placeholder="सम्पर्क नम्बर"
                                />
                                @error('contractor_phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="confession_number" class="form-label">कबोल अंक</label>
                                <input
                                    type="text"
                                    name="confession_number"
                                    value="{{old('confession_number',$project->projectBidDetail->confession_number??'')}}"
                                    class="form-control @error('confession_number') is-invalid @enderror"
                                    id="confession_number"
                                    placeholder="कबोल अंक"
                                />
                                @error('confession_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="contract_agreement_date" labelNe="ठेक्का सम्झौता मिति"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->contract_agreement_date??''"
                                />
                            </div>
                            <div class="col-md-3 mb-2">
                                <x-date-input-component
                                    nameNe="contract_assigned_date" labelNe="कार्यादेशको मिति"
                                    :getTodayDate="false"
                                    :editDateNe="$project->projectBidDetail->contract_assigned_date??''"
                                />
                            </div>
                        </div>

                        @if($project->operated_through==\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
                            <h4 class="header-title border-bottom mb-2">विडवण्ड/परफरमेन्स विवरण</h4>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="bid_bond_amount" class="form-label">विडवण्ड रकम</label>
                                    <input
                                        type="number"
                                        name="bid_bond_amount"
                                        value="{{old('bid_bond_amount',$project->projectBidDetail->bid_bond_amount??0)}}"
                                        class="form-control @error('bid_bond_amount') is-invalid @enderror"
                                        id="bid_bond_amount"
                                        placeholder="विडवण्ड रकम"
                                    />
                                    @error('bid_bond_amount')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="bid_bond_no" class="form-label">विडवण्ड नं.</label>
                                    <input
                                        type="number"
                                        name="bid_bond_no"
                                        value="{{old('bid_bond_no',$project->projectBidDetail->bid_bond_no??0)}}"
                                        class="form-control @error('bid_bond_no') is-invalid @enderror"
                                        id="bid_bond_no"
                                        placeholder="विडवण्ड नं."
                                    />
                                    @error('bid_bond_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="bid_bond_bank_name" class="form-label">विडवण्ड बैंकको नाम</label>
                                    <input
                                        type="text"
                                        name="bid_bond_bank_name"
                                        value="{{old('bid_bond_bank_name',$project->projectBidDetail->bid_bond_bank_name??'')}}"
                                        class="form-control @error('bid_bond_bank_name') is-invalid @enderror"
                                        id="bid_bond_bank_name"
                                        placeholder="विडवण्ड बैंकको नाम"
                                    />
                                    @error('bid_bond_bank_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="bid_bond_issue_date" labelNe="विडवण्ड जारी मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->bid_bond_issue_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="bid_bond_expiry_date" labelNe="विडवण्ड म्याद सकिने मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->bid_bond_expiry_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="performance_bond_no" class="form-label">परफरमेन्स वण्ड नं.</label>
                                    <input
                                        type="number"
                                        name="performance_bond_no"
                                        value="{{old('performance_bond_no',$project->projectBidDetail->performance_bond_no??0)}}"
                                        class="form-control @error('performance_bond_no') is-invalid @enderror"
                                        id="performance_bond_no"
                                        placeholder="परफरमेन्स वण्ड नं."
                                    />
                                    @error('performance_bond_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="performance_bond_amount" class="form-label">परफरमेन्स वण्ड रकम</label>
                                    <input
                                        type="number"
                                        name="performance_bond_amount"
                                        value="{{old('performance_bond_amount',$project->projectBidDetail->performance_bond_amount??0)}}"
                                        class="form-control @error('performance_bond_amount') is-invalid @enderror"
                                        id="performance_bond_amount"
                                        placeholder="परफरमेन्स वण्ड रकम"
                                    />
                                    @error('performance_bond_amount')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="performance_bond_bank" class="form-label">परफरमेन्स वण्ड बैंकको
                                        नाम</label>
                                    <input
                                        type="text"
                                        name="performance_bond_bank"
                                        value="{{old('performance_bond_bank',$project->projectBidDetail->performance_bond_bank??'')}}"
                                        class="form-control @error('performance_bond_bank') is-invalid @enderror"
                                        id="performance_bond_bank"
                                        placeholder="परफरमेन्स वण्ड बैंकको नाम"
                                    />
                                    @error('performance_bond_bank')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="performance_bond_issue_date" labelNe="परफरमेन्स वण्ड जारी मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->performance_bond_issue_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="performance_bond_expiry_date" labelNe="परफरमेन्स वण्ड म्याद सकिने मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->performance_bond_expiry_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="performance_bond_extended_date" labelNe="परफरमेन्स वण्ड म्याद थपको मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->performance_bond_extended_date??''"
                                    />
                                </div>
                            </div>

                            <h4 class="header-title border-bottom mb-2">
                                इन्स्योरेन्स विवरण
                            </h4>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="insurance_issue_date" labelNe="इन्स्योरेन्स जारी मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->insurance_issue_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="insurance_expiry_date" labelNe="इन्स्योरेन्स सकिने मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->insurance_expiry_date??''"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="insurance_extended_date" labelNe="इन्स्योरेन्स म्याद थप हुने मिति"
                                        :getTodayDate="false"
                                        :editDateNe="$project->projectBidDetail->insurance_extended_date??''"
                                    />
                                </div>
                            </div>
                        @endif

                        <h4 class="header-title border-bottom mb-2">
                            योजना सम्झौता विवरण
                        </h4>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    nameNe="contract_date" labelNe="सम्झौता मिति *"
                                    :getTodayDate="false"
                                    :editDateNe="$project->contract_date??''"
                                />
                            </div>
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    nameNe="project_start_date" labelNe="आयोजना सुरु हुने मिति *"
                                    :getTodayDate="false"
                                    :editDateNe="$project->project_start_date??''"
                                />
                            </div>
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    nameNe="project_completion_date" labelNe="आयोजना सम्पन्न हुने मिति *"
                                    :getTodayDate="false"
                                    :editDateNe="$project->project_completion_date??''"
                                />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
