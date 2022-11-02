<div class="container">
    <div class="card">
        <div class="card-body">
            <form wire:id="Lmp87OmZ8BjyY0OZyWpg" wire:submit.prevent="save" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;Lmp87OmZ8BjyY0OZyWpg&quot;,&quot;name&quot;:&quot;add-edit-application-registration&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;da058229&quot;,&quot;data&quot;:{&quot;provinces&quot;:[],&quot;districts&quot;:[],&quot;vdcs&quot;:[],&quot;applicantTypes&quot;:[],&quot;fiscalYears&quot;:[],&quot;wards&quot;:null,&quot;thematicAreas&quot;:[],&quot;infrastructures&quot;:[],&quot;notice_no&quot;:null,&quot;applicant_name&quot;:null,&quot;province_id&quot;:null,&quot;district_id&quot;:null,&quot;vdc_id&quot;:null,&quot;ward_no&quot;:null,&quot;applicant_reg_no&quot;:null,&quot;applicant_code_no&quot;:null,&quot;applicant_type_id&quot;:null,&quot;demand_grant_area&quot;:null,&quot;main_demand_activities&quot;:null,&quot;est_total_cost&quot;:null,&quot;demand_grant_amount&quot;:null,&quot;self_invest_amount&quot;:null,&quot;contact_person_name&quot;:null,&quot;contact_numbers&quot;:null,&quot;account_holders_name&quot;:null,&quot;bank_account_no&quot;:null,&quot;bank_name&quot;:null,&quot;bank_address&quot;:null,&quot;grant_received_before&quot;:0,&quot;grant_received_year&quot;:null,&quot;thematic_area_id&quot;:null,&quot;grant_amount&quot;:null,&quot;grant_giving&quot;:null,&quot;beneficiary_families&quot;:null,&quot;beneficial_area&quot;:null,&quot;applicant_infrastructures&quot;:null,&quot;remarks&quot;:null,&quot;registration_no&quot;:&quot;AP-001&quot;,&quot;grantReceivedBefore&quot;:false,&quot;applicationRegistration&quot;:null},&quot;dataMeta&quot;:{&quot;modelCollections&quot;:{&quot;provinces&quot;:{&quot;class&quot;:&quot;App\\Models\\Province&quot;,&quot;id&quot;:[1,2,3,4,5,6,7],&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;},&quot;applicantTypes&quot;:{&quot;class&quot;:&quot;App\\Models\\ApplicantType&quot;,&quot;id&quot;:[1,2,3,4,5],&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;},&quot;fiscalYears&quot;:{&quot;class&quot;:&quot;App\\Models\\FiscalYear&quot;,&quot;id&quot;:[1,2,3,4,5,6,7,8,9,10,11,12],&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;},&quot;thematicAreas&quot;:{&quot;class&quot;:null,&quot;id&quot;:[],&quot;relations&quot;:[],&quot;connection&quot;:null},&quot;infrastructures&quot;:{&quot;class&quot;:&quot;App\\Models\\Infrastructure&quot;,&quot;id&quot;:[1,2,3,4],&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;}}},&quot;checksum&quot;:&quot;86226d26eb8e9bf6130bb46234d9f053e1270b07659133135d2b4279e371cad1&quot;}}">
                <input type="hidden" name="_token" value="qcq4YMw8A8Rz7Uhrs5DWMeauwAWMeWiMRhTNNIc5">    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="notice_no">सूचना नं.</label>
                            <input type="text" wire:model="notice_no" id="notice_no" class="form-control" placeholder="सूचना नं.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="applicant_name">आवेदकको नाम </label>
                            <input type="text" wire:model="applicant_name" id="applicant_name" class="form-control" placeholder="आवेदकको नाम ">
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend class="text-center">ठेगाना</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="province_id">प्रदेश</label>
                                <select wire:model="province_id" class="form-control">
                                    <option value="">- - प्रदेश छान्नुहोस्</option>
                                    <option value="1">&nbsp; प्रदेश नं. १</option>
                                    <option value="2">&nbsp; प्रदेश नं. २</option>
                                    <option value="3">&nbsp; वाग्मती प्रदेश</option>
                                    <option value="4">&nbsp; गण्डकी प्रदेश</option>
                                    <option value="5">&nbsp; लुम्बिनी प्रदेश </option>
                                    <option value="6">&nbsp; कर्णाली प्रदेश</option>
                                    <option value="7">&nbsp; सुदूर-पश्चिम प्रदेश</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="district_id">जिल्ला</label>
                                <select wire:model="district_id" class="form-control">
                                    <option value="">- - जिल्ला छान्नुहोस्</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vdc_id">पालिका</label>
                                <select wire:model="vdc_id" class="form-control">
                                    <option value="">- - पालिका छान्नुहोस्</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ward_no">वडा नं.</label>
                                <select wire:model="ward_no" class="form-control">
                                    <option value="">- - - -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="applicant_reg_no">आवेदक दर्ता नं.</label>
                            <input type="text" value="AP-001" id="applicant_reg_no" class="form-control" disabled="" placeholder="आवेदक दर्ता नं.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="applicant_code_no">आवेदकको कोड नं.</label>
                            <input type="text" wire:model="applicant_code_no" id="applicant_code_no" class="form-control" placeholder="आवेदकको कोड नं.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="applicant_type_id">आवेदकको प्रकार</label>
                            <select wire:model="applicant_type_id" id="applicant_type_id" class="form-control">
                                <option value="">- - आवेदकको प्रकार छान्नुहोस्</option>
                                <option value="1">&nbsp; कृषक</option>
                                <option value="2">&nbsp; कृषक समूह</option>
                                <option value="3">&nbsp; सहकारी</option>
                                <option value="4">&nbsp; उद्यम</option>
                                <option value="5">&nbsp; कम्पनी</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="demand_grant_area">माग गरेको अनुदान क्षेत्र</label>
                            <input type="text" wire:model="demand_grant_area" id="demand_grant_area" class="form-control" placeholder="माग गरेको अनुदान क्षेत्र">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_demand_activities">माग गरेका मुख्य कृयाकलापहरु</label>
                            <input type="text" wire:model="main_demand_activities" id="main_demand_activities" class="form-control" placeholder="माग गरेका मुख्य कृयाकलापहरु">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="est_total_cost">जम्मा लागत अनुमान</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">रु</span>
                                </div>
                                <input type="text" wire:model="est_total_cost" id="est_total_cost" class="form-control" placeholder="जम्मा लागत अनुमान">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demand_grant_amount">माग अनुदान रकम</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">रु</span>
                                </div>
                                <input type="text" wire:model="demand_grant_amount" id="demand_grant_amount" class="form-control" placeholder="माग अनुदान रकम">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="self_invest_amount">स्वलगानी रकम</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">रु</span>
                                </div>
                                <input type="text" wire:model="self_invest_amount" id="self_invest_amount" class="form-control" placeholder="स्वलगानी रकम">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_person_name">सम्पर्क ब्यक्तिको नाम</label>
                            <input type="text" wire:model="contact_person_name" id="contact_person_name" class="form-control" placeholder="सम्पर्क ब्यक्तिको नाम">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_numbers">सम्पर्क नम्बरहरु</label>
                            <input type="text" wire:model="contact_numbers" id="contact_numbers" class="form-control" placeholder="सम्पर्क नम्बरहरु">
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend class="text-center">बैंक खाताको विवरण</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_holders_name">खातावालहरुको नाम</label>
                                <input type="text" wire:model="account_holders_name" id="account_holders_name" class="form-control" placeholder="खातावालहरुको नाम">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_account_no">बैंक खाता नं.</label>
                                <input type="text" wire:model="bank_account_no" id="bank_account_no" class="form-control" placeholder="बैंक खाता नं.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_name">बैंकको नाम</label>
                                <input type="text" wire:model="bank_name" id="bank_name" class="form-control" placeholder="बैंकको नाम">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_address">बैंकको ठेगाना</label>
                                <input type="text" wire:model="bank_address" id="bank_address" class="form-control" placeholder="बैंकको ठेगाना">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-center">पहिले अनुदान प्राप्त गरे नगरेको</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="grant_received_before">पाएको नपाएको</label>
                                <select wire:model="grant_received_before" id="grant_received_before" class="form-control">
                                    <option value="0" selected="">नपाएको</option>
                                    <option value="1">पाएको</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="beneficiary_families">लाभान्वित परिवार</label>
                            <input type="text" wire:model="beneficiary_families" id="beneficiary_families" class="form-control" placeholder="लाभान्वित परिवार">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="beneficial_area"> लाभ पुग्ने क्षेत्रफल</label>
                            <input type="text" wire:model="beneficial_area" id="beneficial_area" class="form-control" placeholder="लाभ पुग्ने क्षेत्रफल">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="applicant_infrastructures">सम्बधित पूर्बाधारहरु</label>
                            <select wire:model="applicant_infrastructures" name="applicant_infrastructures[]" id="infrastructures" class="form-control" multiple="">
                                <option value="1">उत्पादनसङ्ग सम्बन्धित</option>
                                <option value="2">सिंचाईसङ्ग सम्बन्धित</option>
                                <option value="3">प्रशोधनसङ्ग सम्बन्धित</option>
                                <option value="4">बजारिकरणसङ्ग सम्बन्धित</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remarks">कैफियत</label>
                            <textarea wire:model="remarks" id="remarks" class="form-control" cols="30" rows="3" placeholder="कैफियत"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>


            <!-- Livewire Component wire-end:Lmp87OmZ8BjyY0OZyWpg -->        </div>
    </div>
</div>
