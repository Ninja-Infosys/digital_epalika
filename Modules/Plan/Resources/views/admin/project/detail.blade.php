<div class="modal-header bg-primary">
    <h4 class="modal-title text-white fw-bold" id="fullWidthModalLabel">
        {{$project->project_name}}को विवरण
    </h4>
    <button type="button" class="btn-close border" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <ul class="nav nav-pills navtab-bg nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="#project-detail" data-bs-toggle="tab" aria-expanded="true" class="nav-link active"
               aria-selected="true" role="tab">
                योजनाको विवरण
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#project-cost-detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
               aria-selected="false" tabindex="-1" role="tab">
                योजनाको कुल लागतको अनुमान
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#profile1" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="false"
               tabindex="-1" role="tab">
                योजना संचालन गर्ने संस्था/समिति
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#technical-cost-estimate" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
               aria-selected="false" tabindex="-1" role="tab">
                प्राविधिक अनुमान तथा मूल्याङ्कन
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane show active" id="project-detail" role="tabpanel">
            <div class="p-2 border border-info">
                <table class="table table-sm table-bordered">
                    <tbody>
                    <tr>
                        <td>
                            <b class="text-primary">बजेट उप-शीर्षक : </b> {{$project->budgetHead->title??''}}
                        </td>
                        <td>
                            <b class="text-primary">आर्थिक वर्ष : </b> {{$project->fiscalYear->title??''}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">फाइल नं./योजना दर्ता नं. : </b> {{$project->registration_no}}
                        </td>
                        <td>
                            <b class="text-primary">खर्चको किसिमष : </b> {{$project->expenseHead->title??''}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">योजना/कार्यक्रमको नाम : </b> {{$project->project_name}}
                        </td>
                        <td>
                            <b class="text-primary">योजना उपस्तर : </b> {{$project->planLevel->level_name??''}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">योजनाको उपक्षेत्र : </b> {{$project->planArea->area_name??''}}
                        </td>
                        <td>
                            <b class="text-primary">योजना स्वीकृत रकम : </b> रू. {{$project->allocated_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">संचालन हुने वडा नं : </b> {{implode(',',$project->ward_no)}}
                        </td>
                        <td>
                            <b class="text-primary">पहिलो चौमासिक रकम : </b> रू. {{$project->first_quarterly_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">बजेटको श्रोत : </b> {{$project->budgetSource->source_name??''}}
                        </td>
                        <td>
                            <b class="text-primary">पहिलो चौमासिक लक्ष्य : </b> रू. {{$project->first_quarterly_goal}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">आयोजना स्थल : </b> {{$project->project_venue}}
                        </td>
                        <td>
                            <b class="text-primary">दोश्रो चौमासिक रकम : </b> रू. {{$project->second_quarterly_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">उद्देश्य : </b> {{$project->purpose}}
                        </td>
                        <td>
                            <b class="text-primary">दोश्रो चौमासिक लक्ष्य : </b> रू. {{$project->second_quarterly_goal}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">आयोजना अवस्था : </b> {{$project->project_status?->label()}}
                        </td>
                        <td>
                            <b class="text-primary">तेश्रो चौमासिक रकम : </b> रू. {{$project->third_quarterly_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">आयोजना सुरु हुने मिति : </b> {{$project->project_start_date}}
                        </td>
                        <td>
                            <b class="text-primary">तेश्रो चौमासिक लक्ष्य : </b> रू. {{$project->third_quarterly_goal}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b class="text-primary">आयोजना सम्पन्‍न हुने मिति
                                : </b> {{$project->project_completion_date}}
                        </td>
                        @if($project->is_deadline_extended)
                            <td>
                                <b class="text-primary">आयोजनाको म्याद थप मिति : </b> {{$project->extended_date}}
                            </td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                <div class="row bg-soft-secondary p-2 m-1">
                    <div class="col-md-3">
                        <a href="javascript:void(0)"
                           route_action_url="{{route('admin.plan.project.print',[$project,\Modules\Plan\Enums\PlanTemplateTypeEnum::PROJECT_AGREEMENT_FORM])}}"
                           class="printBtn">
                            <i class="fa fa-print"> योजना सम्झौता आदेश</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)" route_action_url="{{route('admin.plan.project.print',[$project,\Modules\Plan\Enums\PlanTemplateTypeEnum::MANDATE])}}"
                           class="printBtn">
                            <i class="fa fa-print"> सम्झौताको कार्यदेश</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)" route_action_url="{{route('admin.plan.project.print',[$project,\Modules\Plan\Enums\PlanTemplateTypeEnum::REGARDING_PLANNING_AGREEMENT_PROVIDING_SUBMISSIONS])}}"
                           class="printBtn">
                            <i class="fa fa-print"> टिप्पणी र आदेश ( प्रथम किस्ता )</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> टिप्पणी र आदेश ( दोस्रो किस्ता )</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> टिप्पणी र आदेश ( अन्तिम किस्ता )</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> पेश्की/भुक्तानी ( प्रथम किस्ता )</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> होडिंग बोर्ड</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> अनुगमन प्रतिवेदन</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> कबुलियतनामा</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> बैंक खाता खोल्ने सम्बन्धमा</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> बैंक खाता संचालक परिवर्तन</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print"> बैंक खाता बन्द</i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)">
                            <i class="fa fa-print">दर्ता प्रमाण पत्र</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="project-cost-detail" role="tabpanel">
            <div class="p-2 border border-info">
                <h5>क) आयोजनाको अनुमान लागत रु: {{$project->total_cost_estimate_amount}}</h5>
                <h5 class="fw-bold">ख) लागत व्यहोर्ने स्रोतहरु:</h5>
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>विवरण</th>
                        <th>रकम</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>कार्यालयबाट स्वीकृत रकम</td>
                        <td>रू. {{$project->allocated_amount}}</td>
                    </tr>
                    <tr>
                        <td>अन्य निकायबाट प्राप्त रकम</td>
                        <td>रू. {{$project->agencies_grants}}</td>
                    </tr>
                    <tr>
                        <td>अन्य साझेदारी रकम</td>
                        <td>रू. {{$project->share_amount}}</td>
                    </tr>
                    <tr>
                        <td>समितिबाट नगद साझेदारी रकम</td>
                        <td>रू. {{$project->committee_share_amount}}</td>
                    </tr>
                    <tr>
                        <td>कन्टिजेन्सी सहितको कुल रकम</td>
                        <td>रू. {{$project->total_amount_for_contingency}}</td>
                    </tr>
                    <tr>
                        <td>कन्टिजेन्सी कट्टी रकम</td>
                        <td>रू. {{$project->contingency_amount}} ({{$project->contingency_percent}} %)</td>
                    </tr>
                    <tr>
                        <td>अन्य करकट्टी रकम</td>
                        <td>रू. {{$project->other_taxes}}</td>
                    </tr>
                    <tr>
                        <td>योजना सम्झौता रकम</td>
                        <td>रू. {{$project->project_contract_amount}}</td>
                    </tr>
                    <tr>
                        <td>समितिबाट जनश्रमदान रकम</td>
                        <td>रू. {{$project->labor_amount}}</td>
                    </tr>
                    <tr>
                        <th>कुल लागत अनुमान रकम</th>
                        <th>रू. {{$project->total_cost_estimate_amount}}</th>
                    </tr>
                    </tbody>
                </table>
                <h5>घ) बस्तुगत अनुदानको विवरण: </h5>
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <td>उपलब्ध गराउने स्रोत/निकाय</td>
                        <td>सामाग्रीको नाम</td>
                        <td>परिमाण</td>
                        <td>एकाइ</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($project->projectGrantDetails as $projectGrantDetail)
                        <tr>
                            <td>{{$projectGrantDetail->grant_source?->label()}}</td>
                            <td>{{$projectGrantDetail->asset_name}}</td>
                            <td>{{$projectGrantDetail->quantity}}</td>
                            <td>{{$projectGrantDetail->asset_unit}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <h5>ङ) आयोजनाबाट लाभान्वित हुने: </h5>
                <ul>
                    <li>संगठित संस्था: {{$project->benefited_organization}}</li>
                    <li>अन्य: {{$project->others_benefited??''}}</li>
                </ul>
                <table class="table table-sm table-bordered">
                    <thead class="align-middle">
                    <tr>
                        <td rowspan="2">वडा नं.</td>
                        <td rowspan="2">गाँउ बस्ति</td>
                        <td colspan="3" class="align-middle text-center">घरधुरी संख्या</td>
                        <td colspan="3" class="align-middle text-center">जनसंख्या</td>

                    </tr>
                    <tr>
                        <td>दलित तथा पिछडिएका वर्ग</td>
                        <td>अन्य</td>
                        <td>जम्मा</td>
                        <td>महिला</td>
                        <td>पुरुष</td>
                        <td>जम्मा</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($project->benefitedMemberDetails as $benefitedMemberDetail)
                        <tr>
                            <td>{{$benefitedMemberDetail->ward_no}}</td>
                            <td>{{$benefitedMemberDetail->village}}</td>
                            <td>{{$benefitedMemberDetail->dalit_backward_no}}</td>
                            <td>{{$benefitedMemberDetail->other_households_no}}</td>
                            <td>{{$benefitedMemberDetail->total_household}}</td>
                            <td>{{$benefitedMemberDetail->no_of_male}}</td>
                            <td>{{$benefitedMemberDetail->no_of_female}}</td>
                            <td>{{$benefitedMemberDetail->total_population}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="technical-cost-estimate" role="tabpanel">
            <div class="p-2 border border-info">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead class="bg-info">
                        <tr>
                            <th>क्र.स</th>
                            <th>विवरण</th>
                            <th>संख्या</th>
                            <th>लम्बाई</th>
                            <th>चौडाई</th>
                            <th>उचाइ</th>
                            <th>परिमाण</th>
                            <th>इकाई</th>
                            <th>दर</th>
                            <th>रकम</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($project->technicalCostEstimates as $technicalCostEstimate)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$technicalCostEstimate->detail}}</td>
                                <td>{{$technicalCostEstimate->number}}</td>
                                <td>{{$technicalCostEstimate->length}}</td>
                                <td>{{$technicalCostEstimate->breadth}}</td>
                                <td>{{$technicalCostEstimate->height}}</td>
                                <td>{{$technicalCostEstimate->amount}}</td>
                                <td>{{$technicalCostEstimate->unit}}</td>
                                <td>{{$technicalCostEstimate->rate}}</td>
                                <td>{{$technicalCostEstimate->amount}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".printBtn").on("click", function (e) {
        $.ajax({
            method: "GET",
            url: $(this).attr("route_action_url"),
            success: function (resp) {
                let print_area = window.open();
                print_area.document.write(resp.data);
                print_area.document.close();
                print_area.focus();
                print_area.print();
                print_area.close();
            }, error: function () {
                alert("Something Went Wrong");
            }
        });
    });
</script>
