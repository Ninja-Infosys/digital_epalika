<template>
    <form action="">
        <div class="row mb-3">
            <div class="col-md-3">
                <VSelect
                    id="organization_id"
                    v-model="form.organization_id"
                    label="संस्था"
                    :options="['Rara Construction','Ajaya construction']"
                />
            </div>
            <div class="col-md-3">
                <VSelect
                    id="application_type"
                    v-model="form.application_type"
                    label="नक्सा"
                    :options="['New','Ajaya old']"
                />
            </div>
        </div>
        <div class="card p-4 mb-4">
            <legend>
                <h5>१. प्रस्तावित भवनको विवरण</h5>
            </legend>
            <div class="mb-3">
                <label class="form-label fw-bolder">१.१ निर्माण कार्यको किसिम *</label>
                <div class="col">
                    <div v-for="type in workTypes" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" v-model="form.construction_type"
                               :id="type" :value="type">
                        <label class="form-check-label"
                               :for="type">
                            {{type}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <VInput
                            input-type="number"
                            id="current_storey"
                            v-model="form.current_storey"
                            placeholder="हाल निर्माण गर्ने तल्ला संख्या"
                            label="१.२ हाल निर्माण गर्ने तल्ला संख्या"
                        />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput
                            input-type="number"
                            id="future_storey"
                            v-model="form.future_storey"
                            placeholder="भविष्यमा निर्माण गर्ने तल्ला संख्या"
                            label="१.३ भविष्यमा निर्माण गर्ने तल्ला संख्या"
                        />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput
                            input-type="number"
                            id="latitude"
                            v-model="form.latitude"
                            placeholder="Latitude"
                            label="१.४ Latitude"
                        />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput
                            input-type="number"
                            id="longitude"
                            v-model="form.longitude"
                            placeholder="Longitude"
                            label="१.५ Longitude"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>२. जग्गाको विवरण</h5>
            </legend>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        v-model="form.landDetail.ward_no"
                        label="२.१ वडा नं"
                        placeholder="वडा नं"
                    />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        v-model="form.landDetail.former_ward_no"
                        label="२.२ साविक वडा नं"
                        placeholder="साविक वडा नं"
                    />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput
                        v-model="form.landDetail.tole"
                        label="२.३ टोलको नाम"
                        placeholder="टोलको नाम"
                    />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput
                        id="plot_no"
                        v-model="form.landDetail.plot_no"
                        label="२.४ जग्गा कित्ता नं"
                        placeholder="जग्गा कित्ता नं"
                    />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput
                        id="unit_value"
                        v-model="form.landDetail.unit_value"
                        label="२.५ क्षेत्रफल"
                        placeholder="क्षेत्रफल"
                    />
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>३. जग्गा धनीको विवरण</h5>
            </legend>
            <div class="mb-3">
                <label class="form-label fw-bolder">३.१ जग्गा धनीको किसिम <span class="text-danger">*</span></label>
                <div class="col">
                    <div v-for="ownerType in landOwnerTypes" class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" :id="ownerType"
                               v-model="form.landOwner.land_owner_type" :value="ownerType">
                        <label class="form-check-label"
                               :for="ownerType">
                            {{ownerType}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-name"
                        v-model="form.landOwner.name"
                        label="जग्गा धनीको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-phone"
                        v-model="form.landOwner.phone"
                        label="फोन नं."
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-father-name"
                        v-model="form.landOwner.father_name"
                        label="बुवाको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-grandfather-name"
                        v-model="form.landOwner.grandfather_name"
                        label="हजुरबुबाको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-grandfather-name"
                        v-model="form.landOwner.grandfather_name"
                        label="नागरिकता नम्बर"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-citizenship_no"
                        v-model="form.landOwner.citizenship_no"
                        label="नागरिकता नम्बर"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-citizenship_issue_date"
                        v-model="form.landOwner.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="landowner-citizenship_issue_district_id"
                        v-model="form.landOwner.citizenship_issue_district_id"
                        :options="districts"
                        label="नागरिकता लिएको जिल्ला"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-address"
                        v-model="form.landOwner.address"
                        label="ठेगाना"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-local_body"
                        v-model="form.landOwner.local_body"
                        label="पालिका"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="landowner-ward_no"
                        v-model="form.landOwner.ward_no"
                        label="वडा नं."
                    />
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h5>
            </legend>
            <div class="d-flex align-items-center gap-2 mb-3">
                <label for="detail_check">के घर धनीको विवरण र जग्गाधनीको विवरण एउटै हो ?</label>
                <button type="button" class="btn btn-link btn-sm border-none"
                        id="detail_check">
                    <i class="fa fa-toggle-off fa-2x"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-name"
                        v-model="form.houseOwner.name"
                        label="घर धनीको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-phone"
                        v-model="form.houseOwner.phone"
                        label="फोन नं."
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-father_name"
                        v-model="form.houseOwner.father_name"
                        label="बुवाको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-grandfather_name"
                        v-model="form.houseOwner.grandfather_name"
                        label="हजुरबुबाको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-citizenship_no"
                        v-model="form.houseOwner.citizenship_no"
                        label="नागरिकता नम्बर"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-citizenship_issue_date"
                        v-model="form.houseOwner.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="houseOwner-citizenship_issue_district_id"
                        v-model="form.houseOwner.citizenship_issue_district_id"
                        :options="districts"
                        label="नागरिकता लिएको जिल्ला"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-address"
                        v-model="form.houseOwner.address"
                        label="ठेगाना"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-local_body"
                        v-model="form.houseOwner.local_body"
                        label="पालिका"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="houseOwner-ward_no"
                        v-model="form.houseOwner.ward_no"
                        label="वडा नं."
                    />
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>५. निवेदकको विवरण</h5>
            </legend>
            <div class="mb-3">

                <label class="form-label fw-bolder">५.१ निवेदकको प्रकार </label>
                <div class="col">
                    <div v-for="type in applicantTypes" class="form-check form-check-inline">
                        <input type="radio" :id="type"
                               v-model="form.applicantDetail.relation_with_owner" :value="type"
                               class="form-check-input">
                        <label class="form-check-label" :for="type">{{ type }}</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bolder">५.२ घरधनी सँगको सम्बन्ध</label>
                <div class="col">
                    <div v-for="type in applicantTypes" class="form-check form-check-inline">
                        <input type="radio" :id="type"
                               v-model="form.applicantDetail.relation_with_owner" :value="type"
                               class="form-check-input">
                        <label class="form-check-label" :for="type">{{ type }}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-bolder">जग्गाधनी वा घरधनी भन्दा फरक भएमा</label>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-name"
                        v-model="form.applicantDetail.name"
                        label="नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-phone"
                        v-model="form.applicantDetail.phone"
                        label="फोन नं."
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-father_name"
                        v-model="form.applicantDetail.father_name"
                        label="बुवाको नाम"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-citizenship_no"
                        v-model="form.applicantDetail.citizenship_no"
                        label="नागरिकता नम्बर"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-citizenship_issue_date"
                        v-model="form.applicantDetail.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="applicantDetail.citizenship_issue_district_id">१.४ नागरिकता लिएको
                        जिल्ला</label>
                    <select class="form-select form-select-sm" wire:model="applicantDetail.citizenship_issue_district_id">
                        <option value="">--- जिल्ला छान्नुहोस् ---</option>
                        @foreach ($allDistricts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->district }}
                        </option>
                        @endforeach
                    </select>
                    @error('applicantDetail.citizenship_issue_district_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>
    </form>
    {{form}}
</template>
<script setup>

import {reactive} from "vue";

const form=reactive({
    organization_id:'',
    application_type:'',
    construction_type:'',
    current_storey:'',
    future_storey:'',
    latitude:'',
    longitude:'',
    landDetail:{
        ward_no:'',
        former_ward_no:'',
        tole:'',
        plot_no:'',
        unit_value:'',
    },
    landOwner:{
        land_owner_type:'',
        name:'',
        father_name:'',
        grandfather_name:'',
        citizenship_no:'',
        citizenship_issue_date:'',
        citizenship_issue_district_id:'',
        address:'',
        local_body:'',
        ward_no:'',
    },
    houseOwner:{
        name:'',
        phone:'',
        father_name:'',
        grandfather_name:'',
        citizenship_no:'',
        citizenship_issue_date:'',
        citizenship_issue_district_id:'',
        address:'',
        local_body:'',
        ward_no:'',
    },
    applicantDetail:{
        applicantType:'',
        relation_with_owner:'',
        name:'',
        phone:'',
        father_name:'',
        citizenship_no:'',
        citizenship_issue_date:'',
        citizenship_issue_district_id:'',
        application_date:'',
        signature:null,
    }
})

const workTypes=[
    'Test','Test 2'
];

const landOwnerTypes=[
    'आफ्नो स्वामित्वमा',
    'मन्जुरीनामा बाट'
]

const districts=[
    'salyan','dang'
]

const applicantTypes=[
    'Self',
    'Other'
]

</script>
