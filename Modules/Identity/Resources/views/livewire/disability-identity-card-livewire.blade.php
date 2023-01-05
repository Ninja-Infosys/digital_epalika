<div>
    <style>
        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        fieldset {
            border-radius: 5px;
        }

        /*progressbar*/
        .progressbar {
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
            margin: 0 auto 30px;
        }

        .progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            width: 25%;
            float: left;
            position: relative;
            text-decoration: none;
        }

        .progressbar li a {
            text-decoration: none;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 50px;
            line-height: 50px;
            display: block;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            background: #eeeeee;
            border-radius: 50%;
            margin: 0 auto 5px auto;
        }

        .progressbar .success:before {
            background: #5ed00f;
            color: white;
        }

        /*progressbar connectors*/
        .progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
            /*put it behind the numbers*/
        }

        .progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        .progressbar li.active:before,
        .progressbar li.active:after {
            background: rgb(255, 99, 71);
            color: white;
        }

        .displayNone {
            display: none;
        }
    </style>
    <div class="text-center">
        <ul class="progressbar d-flex justify-content-between">
            <li @class([
                    'active'=>!($currentStep != 1),
                    'success'=>$currentStep>1
            ])><a href="#step-1" type="button"></a></li>
            <li @class([
                    'active'=>!($currentStep != 2),
                    'success'=>$currentStep>2
            ])><a href="#step-2" type="button"></a></li>
            <li @class([
                    'active'=>!($currentStep != 3),
                    'success'=>$currentStep>3
            ])><a href="#step-3" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 4),
                    'success'=>$currentStep>4
            ])><a href="#step-4" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 5),
                    'success'=>$currentStep>5
            ])><a href="#step-5" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 6),
                    'success'=>$currentStep>6
            ])><a href="#step-6" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 7),
                    'success'=>$currentStep>7
            ])><a href="#step-7" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 8),
                    'success'=>$currentStep>8
            ])><a href="#step-8" type="button">
                </a></li>
            <li @class([
                    'active'=>!($currentStep != 9),
                    'success'=>$currentStep>9
            ])><a href="#step-9" type="button">
                </a></li>


        </ul>
    </div>
    <form wire:submit.prevent="saveForm">
        <div class="card mt-3">
            @switch($currentStep)
                @case(2)
                    <fieldset class="mt-3">
                        <legend>परिवारको सदस्य वा संरक्षकको</legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="form.guardian_name" class="form-label">संरक्षकको नाम</label>
                                <input
                                    name="form.guardian_name"
                                    class="form-control  @error('form.guardian_name') is-invalid @enderror"
                                    type="text"
                                    id="form.guardian_name"
                                    placeholder="संरक्षकको नाम"
                                    wire:model="form.guardian_name"
                                />
                                @error('form.guardian_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.guardian_name_en" class="form-label">संरक्षकको नाम (English)</label>
                                <input
                                    name="form.guardian_name_en"
                                    class="form-control  @error('form.guardian_name_en') is-invalid @enderror"
                                    type="text"
                                    id="form.guardian_name_en"
                                    placeholder="संरक्षकको नाम (English)"
                                    wire:model="form.guardian_name_en"
                                />
                                @error('form.guardian_name_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.relationship_id" class="form-label">नाता</label>
                                <select
                                    class="form-select @error('form.relationship_id') is-invalid @enderror"
                                    wire:model="form.relationship_id"
                                    id="form.relationship_id">
                                    <option value="">---नाता छान्नुहोस् ---</option>
                                    @foreach($relations as $relation)
                                        <option
                                            value="{{$relation->id}}">{{$relation->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.relationship_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.phone" class="form-label">टेलिफोन वा मोबाईल नं.</label>
                                <input
                                    name="form.phone"
                                    class="form-control  @error('form.phone') is-invalid @enderror"
                                    type="text"
                                    id="form.phone"
                                    placeholder="टेलिफोन वा मोबाईल नं."
                                    wire:model="form.phone"
                                />
                                @error('form.phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(1)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(3)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>


                    </div>
                    @break

                @case(3)
                    <fieldset class="mt-3">
                        <legend>असक्तताको गम्भीरताका आधारमा अपाङ्गताको वर्गीकरण</legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="form.govern_disability_type_id" class="form-label">अपाङ्गताको प्रकार</label>
                                <select
                                    class="form-select @error('form.govern_disability_type_id') is-invalid @enderror"
                                    wire:model="form.govern_disability_type_id"
                                    id="form.govern_disability_type_id">
                                    <option value="">---अपाङ्गताको प्रकार छान्नुहोस् ---</option>
                                    @foreach($governmentDisabilityTypes as $governmentDisabilityType)
                                        <option
                                            value="{{$governmentDisabilityType->id}}">{{$governmentDisabilityType->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.govern_disability_type_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.blood_group" class="form-label">रक्त समूह</label>
                                <select
                                    class="form-select @error('form.blood_group') is-invalid @enderror"
                                    wire:model="form.blood_group"
                                    id="form.blood_group">
                                    <option value="">---रक्त समूह छान्नुहोस् ---</option>
                                    @foreach(\App\Enums\BloodGroupEnum::cases() as $bloodGroup)
                                        <option
                                            value="{{$bloodGroup->value}}">{{$bloodGroup->label()}}</option>
                                    @endforeach
                                </select>
                                @error('form.blood_group')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>शारीरिक अङ्ग वा प्रणालीमा भएको समस्या तथा कठिनाइको आधारमा</legend>
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <label for="form.disability_type_id" class="form-label">अपाङ्गताको प्रकार</label>
                                <select
                                    class="form-select @error('form.disability_type_id') is-invalid @enderror"
                                    wire:model="form.disability_type_id"
                                    id="form.disability_type_id">
                                    <option value="">---अपाङ्गताको प्रकार छान्नुहोस् ---</option>
                                    @foreach($disabilityTypes as $disabilityType)
                                        <option
                                            value="{{$disabilityType->id}}">{{$disabilityType->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.disability_type_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>अपाङ्गताको कारण</legend>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form.disability_reason_id" class="form-label">अपाङ्गताको कारण</label>
                                <select
                                    class="form-select @error('form.disability_reason_id') is-invalid @enderror"
                                    wire:model="form.disability_reason_id"
                                    id="form.disability_reason_id">
                                    <option value="">---अपाङ्गताको कारण छान्नुहोस् ---</option>
                                    @foreach($disabilityReasons as $disabilityReason)
                                        <option
                                            value="{{$disabilityReason->id}}">{{$disabilityReason->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.disability_reason_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(2)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="submit" wire:click.prevent="nextStep(4)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>

                    </div>
                    @break

                @case(4)
                    <fieldset class="mt-3">
                        <legend>अपाङ्गता परिचय पत्र पाएको</legend>
                        <div class="col-md-4 mb-3">
                            <label for="form.identity_type" class="form-label">अपाङ्गता परिचय पत्र</label>
                            <select
                                class="form-select @error('form.identity_type') is-invalid @enderror"
                                wire:model="form.identity_type"
                                id="form.identity_type">
                                <option value="">--- छान्नुहोस् ---</option>
                                <option value="receive">पाएको</option>
                                <option value="not_receive">नपाएको</option>
                            </select>
                            @error('form.identity_type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="row">
                            @if($form['identity_type']==='receive')
                                <div class="col-md-4 mb-3">
                                    <label for="form.receiving_body" class="form-label">कहाँ बाट</label>
                                    <select
                                        class="form-select @error('form.receiving_body') is-invalid @enderror"
                                        wire:model="form.receiving_body"
                                        id="form.receiving_body">
                                        <option value="">---छान्नुहोस् ---</option>
                                        @foreach(\Modules\Identity\Enums\ReceivingBodyEnum::cases() as $receivingBody)
                                            <option
                                                value="{{$receivingBody->value}}">{{$receivingBody->label()}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.receiving_body')
                                    <div class="invalid-feedback ">{{$message}} </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="form.card_no" class="form-label"> कार्ड नं </label>
                                    <input
                                        name="form.card_no"
                                        class="form-control  @error('form.card_no') is-invalid @enderror"
                                        type="text"
                                        id="form.card_no"
                                        placeholder=" कार्ड नं "
                                        wire:model="form.card_no"
                                    />
                                    @error('form.card_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="date_bs" class="form-label"> परिचय पत्र पाएको मिति (बि.स.) </label>
                                    <input
                                        class="form-control  @error('form.date_bs') is-invalid @enderror"
                                        type="text"
                                        id="date_bs"
                                        placeholder="परिचय पत्र पाएको मिति (बि.स.)"
                                        wire:model="form.date_bs"
                                    />
                                    @error('form.date_bs')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="date_ad" class="form-label"> परिचय पत्र पाएको मिति (ई.स.) </label>
                                    <input
                                        class="form-control  @error('form.date_ad') is-invalid @enderror"
                                        type="text"
                                        id="date_ad"
                                        placeholder="परिचय पत्र पाएको मिति (ई.स.)"
                                        wire:model="form.date_ad"
                                    />
                                    @error('form.date_ad')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-md-4 mb-3">
                                <label for="form.father_name" class="form-label"> बुवाको नाम </label>
                                <input
                                    name="form.father_name"
                                    class="form-control  @error('form.father_name') is-invalid @enderror"
                                    type="text"
                                    id="form.father_name"
                                    placeholder="बुवाको नाम"
                                    wire:model="form.father_name"
                                />
                                @error('form.father_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.father_name_en" class="form-label"> बुवाको नाम (English) </label>
                                <input
                                    name="form.father_name_en"
                                    class="form-control  @error('form.father_name_en') is-invalid @enderror"
                                    type="text"
                                    id="form.father_name_en"
                                    placeholder="बुवाको नाम"
                                    wire:model="form.father_name_en"
                                />
                                @error('form.father_name_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.grand_father_name" class="form-label"> हजुरबुवाको नाम </label>
                                <input
                                    name="form.grand_father_name"
                                    class="form-control  @error('form.grand_father_name') is-invalid @enderror"
                                    type="text"
                                    id="form.grand_father_name"
                                    placeholder="हजुरबुवाको नाम"
                                    wire:model="form.grand_father_name"
                                />
                                @error('form.grand_father_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.grand_father_name_en" class="form-label"> हजुरबुवाको नाम
                                    (English) </label>
                                <input
                                    name="form.grand_father_name_en"
                                    class="form-control  @error('form.grand_father_name_en') is-invalid @enderror"
                                    type="text"
                                    id="form.grand_father_name_en"
                                    placeholder="हजुरबुवाको नाम (English)"
                                    wire:model="form.grand_father_name_en"
                                />
                                @error('form.grand_father_name_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.mother_name" class="form-label"> आमाको नाम </label>
                                <input
                                    name="form.mother_name"
                                    class="form-control  @error('form.mother_name') is-invalid @enderror"
                                    type="text"
                                    id="form.mother_name"
                                    placeholder=" आमाको नाम "
                                    wire:model="form.mother_name"
                                />
                                @error('form.mother_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.mother_name_en" class="form-label"> आमाको नाम (English) </label>
                                <input
                                    name="form.mother_name_en"
                                    class="form-control  @error('form.mother_name_en') is-invalid @enderror"
                                    type="text"
                                    id="form.mother_name_en"
                                    placeholder="  आमाको नाम (English) "
                                    wire:model="form.mother_name_en"
                                />
                                @error('form.mother_name_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(3)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(5)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    @break

                @case(5)
                    <fieldset class="mt-3">
                        <legend>परिचय खुलाउने विवरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.birth_registration_no" class="form-label"> जन्म दर्ता नं. </label>
                                <input
                                    name="form.birth_registration_no"
                                    class="form-control  @error('form.birth_registration_no') is-invalid @enderror"
                                    type="text"
                                    id="form.birth_registration_no"
                                    placeholder=" जन्म दर्ता नं. "
                                    wire:model="form.birth_registration_no"
                                />
                                @error('form.birth_registration_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.birth_registration_place" class="form-label"> जन्म दर्ता पाएको
                                    स्थान </label>
                                <input
                                    name="form.birth_registration_place"
                                    class="form-control  @error('form.birth_registration_place') is-invalid @enderror"
                                    type="text"
                                    id="form.birth_registration_place"
                                    placeholder=" जन्म दर्ता पाएको स्थान "
                                    wire:model="form.birth_registration_place"
                                />
                                @error('form.birth_registration_place')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="birth_registration_bs" class="form-label"> जन्म दर्ता पाएको मिति
                                    (बि.स.) </label>
                                <input
                                    class="form-control  @error('form.birth_registration_bs') is-invalid @enderror"
                                    type="text"
                                    id="birth_registration_bs"
                                    placeholder="जन्म दर्ता पाएको मिति (बि.स.)"
                                    wire:model="form.birth_registration_bs"
                                />
                                @error('form.birth_registration_bs')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="birth_registration_ad" class="form-label"> जन्म दर्ता पाएको मिति
                                    (ई.स.) </label>
                                <input
                                    class="form-control  @error('form.birth_registration_ad') is-invalid @enderror"
                                    type="text"
                                    id="birth_registration_ad"
                                    placeholder="जन्म दर्ता पाएको मिति (बि.स.)"
                                    wire:model="form.birth_registration_ad"
                                />
                                @error('form.birth_registration_ad')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.citizenship_no" class="form-label"> नागरिकता नं. </label>
                                <input
                                    name="form.citizenship_no"
                                    class="form-control  @error('form.citizenship_no') is-invalid @enderror"
                                    type="text"
                                    id="form.citizenship_no"
                                    placeholder="नागरिकता नं."
                                    wire:model="form.citizenship_no"
                                />
                                @error('form.citizenship_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.citizenship_no_place" class="form-label"> नागरिकता पाएको स्थान </label>
                                <input
                                    name="form.citizenship_no_place"
                                    class="form-control  @error('form.citizenship_no_place') is-invalid @enderror"
                                    type="text"
                                    id="form.citizenship_no_place"
                                    placeholder="नागरिकता पाएको स्थान"
                                    wire:model="form.citizenship_no_place"
                                />
                                @error('form.citizenship_no_place')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="citizenship_no_bs" class="form-label"> नागरिकता पाएको मिति
                                    (बि.स.) </label>
                                <input
                                    class="form-control  @error('form.citizenship_no_bs') is-invalid @enderror"
                                    type="text"
                                    id="citizenship_no_bs"
                                    placeholder="नागरिकता पाएको मिति (बि.स.)"
                                    wire:model="form.citizenship_no_bs"
                                />
                                @error('form.citizenship_no_bs')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="citizenship_no_ad" class="form-label"> नागरिकता पाएको मिति
                                    (ई.स.) </label>
                                <input
                                    class="form-control  @error('form.citizenship_no_ad') is-invalid @enderror"
                                    type="text"
                                    id="citizenship_no_ad"
                                    placeholder="नागरिकता पाएको मिति (ई.स.)"
                                    wire:model="form.citizenship_no_ad"
                                />
                                @error('form.citizenship_no_ad')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.citizenship_photo" class="form-label"> नागरिकताको फोटोकपी </label>
                                <input
                                    name="form.citizenship_photo"
                                    class="form-control  @error('form.citizenship_photo') is-invalid @enderror"
                                    type="file"
                                    id="form.citizenship_photo"
                                    wire:model="form.citizenship_photo"
                                />
                                <div wire:loading wire:target="form.citizenship_photo">Uploading...</div>
                                @error('form.citizenship_photo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.citizenship_photo_certificate" class="form-label"> जन्मदर्ताको
                                    फोटोकपी </label>
                                <input
                                    name="form.citizenship_photo_certificate"
                                    class="form-control  @error('form.citizenship_photo_certificate') is-invalid @enderror"
                                    type="file"
                                    id="form.citizenship_photo_certificate"
                                    wire:model="form.citizenship_photo_certificate"
                                />
                                <div wire:loading wire:target="form.citizenship_photo_certificate">Uploading...</div>
                                @error('form.citizenship_photo_certificate')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(4)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(6)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    @break

                @case(6)
                    <fieldset class="mt-3">
                        <legend>सहयोग सामाग्री प्रयोग गर्नुपर्ने आबश्यकता</legend>

                        <div class="d-flex">
                            <div class="form-check">
                                <input type="radio"
                                       class="form-check-input"
                                       wire:model="form.is_necessary"
                                       value="1"
                                       name="is_necessary"
                                       id="is_necessary1">
                                <label class="form-check-label"
                                       for="is_necessary1"> भएको &nbsp;</label>
                            </div>
                            <div class="form-check">
                                <input type="radio"
                                       class="form-check-input"
                                       wire:model="form.is_necessary"
                                       value="0"
                                       name="is_necessary"
                                       id="is_necessary2">
                                <label class="form-check-label"
                                       for="is_necessary2">नभएको</label>
                            </div>
                        </div>
                        @if($form['is_necessary']=='1')
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form.material_description" class="form-label"> सामाग्री विवरण </label>
                                    <input
                                        name="form.material_description"
                                        class="form-control  @error('form.material_description') is-invalid @enderror"
                                        type="text"
                                        id="form.material_description"
                                        placeholder=" सामाग्री विवरण "
                                        wire:model="form.material_description"
                                    />
                                    @error('form.material_description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>पछिल्लो सैक्षिक योग्यता</legend>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form.qualification" class="form-label"> पछिल्लो सैक्षिक योग्यता </label>
                                <select
                                    class="form-select @error('form.qualification') is-invalid @enderror"
                                    wire:model="form.qualification"
                                    id="form.qualification">
                                    <option value="">---छान्नुहोस् ---</option>
                                    @foreach(\Modules\BusinessRegistration\Enums\Qualification::cases() as $qualification)
                                        <option
                                            value="{{$qualification->value}}">{{$qualification->label()}}</option>
                                    @endforeach
                                </select>
                                @error('form.qualification')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>दैनिक क्रियाकलाप गर्न</legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="form.daily_activity" class="form-label"> दैनिक क्रियाकलाप गर्न </label>
                                <select
                                    class="form-select @error('form.daily_activity') is-invalid @enderror"
                                    wire:model="form.daily_activity"
                                    id="form.daily_activity">
                                    <option value="">---छान्नुहोस् ---</option>

                                    <option value="1">सक्ने</option>
                                    <option value="0">नसक्ने</option>
                                </select>
                                @error('form.daily_activity')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form.supporting_material" class="form-label"> साहायक सामाग्री प्रयोग
                                    गर्ने </label>
                                <select
                                    class="form-select @error('form.supporting_material') is-invalid @enderror"
                                    wire:model="form.supporting_material"
                                    id="form.supporting_material">
                                    <option value="">---छान्नुहोस् ---</option>

                                    <option value="1">गरेको</option>
                                    <option value="0">नगरेको</option>
                                </select>
                                @error('form.supporting_material')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>सहायक सामग्री प्रयोग गर्ने गरेको भए सामाग्रीको नाम</legend>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form.material_name" class="form-label"> सामाग्रीको नाम </label>
                                <input
                                    name="form.material_name"
                                    class="form-control  @error('form.material_name') is-invalid @enderror"
                                    type="text"
                                    id="form.material_name"
                                    placeholder="  सामाग्रीको नाम  "
                                    wire:model="form.material_name"
                                />
                                @error('form.material_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>

                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(5)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(7)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    @break
                @case(7)
                    <fieldset class="mt-3">
                        <legend>अन्य व्यक्तिको सहयोग लिनु पर्ने भए त्यस्तो सहयोग लिनु पर्ने काम</legend>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> कामको नाम</th>
                                    <th>
                                        <button type="button" wire:click.prevent="helpingTaskIncrement"
                                                class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($form['helping_task'] as $index=>$helping_task)
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="कामको नाम"
                                                   wire:model="form.helping_task.{{$index}}"
                                                   class="form-control @error('form.helping_task.'.$index) is-invalid @enderror">
                                            @error('form.helping_task.'.$index)
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <button class="btn btn-danger"
                                                    wire:click.prevent="helpingTaskDecrement({{$index}})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @error('form.helping_task')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>अन्य व्यक्तिको सहयोग बिना गर्न सक्ने दैनिक कार्य</legend>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> कामको नाम</th>
                                    <th>
                                        <button type="button" wire:click.prevent="withoutHelpingTaskIncrement"
                                                class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($form['without_helping_task'] as $index=>$without_helping_task)
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="कामको नाम"
                                                   wire:model="form.without_helping_task.{{$index}}"
                                                   class="form-control @error('form.without_helping_task.'.$index) is-invalid @enderror">
                                            @error('form.without_helping_task.'.$index)
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <button class="btn btn-danger"
                                                    wire:click.prevent="withoutHelpingTaskDecrement({{$index}})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @error('form.without_helping_task')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(6)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(8)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    @break

                @case(8)
                    <fieldset class="mt-3">
                        <legend>कुनै तालिम प्राप्त गरेको भए मुख्य तालिमको</legend>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form.main_training_name" class="form-label"> नाम</label>
                                <input
                                    name="form.main_training_name"
                                    class="form-control  @error('form.main_training_name') is-invalid @enderror"
                                    type="text"
                                    id="form.main_training_name"
                                    placeholder="नाम"
                                    wire:model="form.main_training_name"
                                />
                                @error('form.main_training_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend> हालको पेसा</legend>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form.occupation_id" class="form-label"> हालको पेसा </label>
                                <select
                                    class="form-select @error('form.occupation_id') is-invalid @enderror"
                                    wire:model="form.occupation_id"
                                    id="form.occupation_id">
                                    <option value="">---छान्नुहोस् ---</option>
                                    @foreach($occupations as $occupation)
                                        <option value="{{$occupation->id}}">{{$occupation->title}}</option>
                                    @endforeach

                                </select>
                                @error('form.occupation_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>

                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(7)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(9)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    @break

                @case(9)
                    <fieldset class="mt-3">
                        <legend>विवरण उपलब्ध गराउने</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_full_name" class="form-label"> नाम</label>
                                <input
                                    name="form.provide_detail_full_name"
                                    class="form-control  @error('form.provide_detail_full_name') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_full_name"
                                    placeholder="नाम"
                                    wire:model="form.provide_detail_full_name"
                                />
                                @error('form.provide_detail_full_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_address" class="form-label"> ठेगाना</label>
                                <input
                                    name="form.provide_detail_address"
                                    class="form-control  @error('form.provide_detail_address') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_address"
                                    placeholder="ठेगाना"
                                    wire:model="form.provide_detail_address"
                                />
                                @error('form.provide_detail_address')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_phone_no" class="form-label"> सम्पर्क नं. </label>
                                <input
                                    name="form.provide_detail_phone_no"
                                    class="form-control  @error('form.provide_detail_phone_no') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_phone_no"
                                    placeholder=" सम्पर्क नं. "
                                    wire:model="form.provide_detail_phone_no"
                                />
                                @error('form.provide_detail_phone_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_citizenship_no" class="form-label"> नागरिकता नं </label>
                                <input
                                    name="form.provide_detail_citizenship_no"
                                    class="form-control  @error('form.provide_detail_citizenship_no') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_citizenship_no"
                                    placeholder="  नागरिकता नं  "
                                    wire:model="form.provide_detail_citizenship_no"
                                />
                                @error('form.provide_detail_citizenship_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_citizenship_no_date" class="form-label">
                                    नागरिकता पाएको मिति </label>
                                <input
                                    name="form.provide_detail_citizenship_no_date"
                                    class="form-control  @error('form.provide_detail_citizenship_no_date') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_citizenship_no_date"
                                    placeholder="
नागरिकता पाएको मिति "
                                    wire:model="form.provide_detail_citizenship_no_date"
                                />
                                @error('form.provide_detail_citizenship_no_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.provide_detail_citizenship_no_place" class="form-label">
                                    नागरिकता पाएको स्थान </label>
                                <input
                                    name="form.provide_detail_citizenship_no_place"
                                    class="form-control  @error('form.provide_detail_citizenship_no_place') is-invalid @enderror"
                                    type="text"
                                    id="form.provide_detail_citizenship_no_place"
                                    placeholder=" नागरिकता पाएको स्थान  "
                                    wire:model="form.provide_detail_citizenship_no_place"
                                />
                                @error('form.provide_detail_citizenship_no_place')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.employee_signature_id" class="form-label">
                                    हस्ताक्षर </label>
                                <select
                                    class="form-select @error('form.employee_signature_id') is-invalid @enderror"
                                    wire:model="form.employee_signature_id"
                                    id="form.employee_signature_id">
                                    <option value="">---हस्ताक्षर छान्नुहोस् ---</option>
                                    @foreach($employee_signatures as $employee_signature)
                                        <option
                                            value="{{$employee_signature->id}}">{{$employee_signature->name}}</option>
                                    @endforeach
                                </select>
                                @error('form.employee_signature_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <span style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(8)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </span>
                    @break
                @default

                    <fieldset>
                        <legend>अपाङ्गता भएको व्यक्तिको विवरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.photo" class="form-label">फोटो</label>
                                <input
                                    name="form.photo"
                                    accept="image/*"
                                    class="form-control @error('form.photo') is-invalid @enderror"
                                    type="file"
                                    id="form.photo"
                                    wire:model="form.photo"
                                />
                                <div wire:loading wire:target="form.photo">Uploading...</div>
                                @error('form.photo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <button onclick="loadImage()" type="button">Camera</button>
                                <button onclick="captureImage()" type="button">Capture Image</button>
                                <button onclick="stopCamera()" type="button">Stop Camera</button>
                                <video id="video" width="200" height="200"  autoplay></video>
                                <canvas id="canvas" width="200" height="200"></canvas>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.finger_print_type" class="form-label">छाप</label>
                                <select
                                    class="form-select @error('form.finger_print_type') is-invalid @enderror"
                                    wire:model="form.finger_print_type"
                                    id="form.finger_print_type">
                                    <option value="">---छाप छान्नुहोस् ---</option>
                                    <option value="finger">हातको औंला</option>
                                    <option value="legs">खुट्टाको औंला</option>
                                    <option value="none">दुवै नभएको</option>

                                </select>
                                @error('form.finger_print_type')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            @if($form['finger_print_type'] === 'legs' || $form['finger_print_type'] === 'finger')
                                <div class="col-md-4 mb-3">
                                    <label for="form.finger_left" class="form-label">बाँया</label>
                                    <input
                                        name="form.photo"
                                        class="form-control @error('form.finger_left') is-invalid @enderror"
                                        type="file"
                                        id="form.finger_left"
                                        wire:model="form.finger_left"
                                    />
                                    <div wire:loading wire:target="form.finger_left">Uploading...</div>
                                    @error('form.finger_left')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="form.finger_right" class="form-label">दायाँ</label>
                                    <input
                                        name="form.finger_right"
                                        class="form-control @error('form.finger_right') is-invalid @enderror"
                                        type="file"
                                        id="form.finger_right"
                                        wire:model="form.finger_right"
                                    />
                                    <div wire:loading wire:target="form.finger_right">Uploading...</div>
                                    @error('form.finger_right')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-md-4 mb-3">
                                <label for="form.name" class="form-label">पुरा नाम नेपालीमा</label>
                                <input
                                    name="form.name"
                                    class="form-control @error('form.name') is-invalid @enderror"
                                    type="text"
                                    id="form.name"
                                    placeholder="पुरा नाम नेपालीमा"
                                    wire:model="form.name"
                                />
                                @error('form.name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="form.name_en" class="form-label">पुरा नाम नेपालीमा (English)</label>
                                <input
                                    name="form.name_en"
                                    class="form-control @error('form.name_en') is-invalid @enderror"
                                    type="text"
                                    id="form.name_en"
                                    placeholder="पुरा नाम नेपालीमा (English)"
                                    wire:model="form.name_en"
                                />
                                @error('form.name_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="form.gender" class="form-label">लिङ्ग</label>
                                <select
                                    class="form-select @error('form.gender') is-invalid @enderror"
                                    wire:model="form.gender"
                                    id="form.gender">
                                    <option value="">---लिङ्ग छान्नुहोस् ---</option>
                                    @foreach(\App\Enums\Gender::cases() as $gender)
                                        <option
                                            value="{{$gender->value}}">{{$gender->label()}}</option>
                                    @endforeach
                                </select>
                                @error('form.gender')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.ethnicity_id" class="form-label">
                                    जातीयता</label>
                                <select
                                    class="form-select @error('form.ethnicity_id') is-invalid @enderror"
                                    wire:model="form.ethnicity_id"
                                    id="form.ethnicity_id">
                                    <option value="">---जातीयता छान्नुहोस् ---</option>
                                    @foreach($ethnicities as $ethnicity)
                                        <option
                                            value="{{$ethnicity->id}}">{{$ethnicity->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.ethnicity_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="dob_bs" class="form-label">जन्म मिति (बि.स.)</label>
                                <input
                                    class="form-control  @error('form.dob_bs') is-invalid @enderror"
                                    type="text"
                                    id="dob_bs"
                                    placeholder="जन्म मिति (बि.स.)"
                                    wire:model="form.dob_bs"
                                />
                                @error('form.dob_bs')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">

                                <label for="dob_ad" class="form-label">जन्म मिति (ई.स.)</label>
                                <input
                                    class="form-control  @error('form.dob_ad') is-invalid @enderror"
                                    type="text"
                                    id="dob_ad"
                                    placeholder="जन्म मिति (ई.स.)"
                                    wire:model="form.dob_ad"
                                />
                                @error('form.dob_ad')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>स्थायी ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.permanent_province_id" class="form-label">प्रदेश</label>
                                <select
                                    class="form-select @error('form.permanent_province_id') is-invalid @enderror"
                                    wire:model="form.permanent_province_id"
                                    id="form.permanent_province_id">
                                    <option value="">---प्रदेश छान्नुहोस् ---</option>
                                    @foreach($provinces as $province)
                                        <option
                                            value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                                @error('form.permanent_province_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.permanent_district_id" class="form-label">जिल्ला</label>
                                <select
                                    class="form-select @error('form.permanent_district_id') is-invalid @enderror"
                                    wire:model="form.permanent_district_id"
                                    id="form.permanent_district_id">
                                    <option value="">---जिल्ला छान्नुहोस् ---</option>
                                    @foreach($permanent_districts as $permanent_district)
                                        <option
                                            value="{{$permanent_district->id}}">{{$permanent_district->district}}</option>
                                    @endforeach
                                </select>
                                @error('form.permanent_district_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.permanent_local_body_id" class="form-label">पालिका</label>
                                <select
                                    class="form-select @error('form.permanent_local_body_id') is-invalid @enderror"
                                    wire:model="form.permanent_local_body_id"
                                    id="form.permanent_local_body_id">
                                    <option value="">---पालिका छान्नुहोस् ---</option>
                                    @foreach($permanent_localBodies as $permanent_localBody)
                                        <option
                                            value="{{$permanent_localBody->id}}">{{$permanent_localBody->local_body}}</option>
                                    @endforeach
                                </select>
                                @error('form.permanent_local_body_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.permanent_ward" class="form-label">वार्ड</label>
                                <select
                                    class="form-select @error('form.permanent_ward') is-invalid @enderror"
                                    wire:model="form.permanent_ward"
                                    id="form.permanent_ward">
                                    <option value="">---वार्ड छान्नुहोस् ---</option>
                                    @foreach($permanent_wards as $permanent_ward)
                                        <option
                                            value="{{$permanent_ward}}">{{$permanent_ward}}</option>
                                    @endforeach
                                </select>
                                @error('form.permanent_ward')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.permanent_tole" class="form-label">टोल</label>
                                <input
                                    name="form.permanent_tole"
                                    class="form-control  @error('form.permanent_tole') is-invalid @enderror"
                                    type="text"
                                    id="form.permanent_tole"
                                    placeholder="टोल"
                                    wire:model="form.permanent_tole"
                                />
                                @error('form.permanent_tole')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="mt-3">
                        <legend>अस्थायी ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.temporary_province_id" class="form-label">प्रदेश</label>
                                <select
                                    class="form-select @error('form.temporary_province_id') is-invalid @enderror"
                                    wire:model="form.temporary_province_id"
                                    id="form.temporary_province_id">
                                    <option value="">---प्रदेश छान्नुहोस् ---</option>
                                    @foreach($provinces as $province)
                                        <option
                                            value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                                @error('form.temporary_province_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.temporary_district_id" class="form-label">जिल्ला</label>
                                <select
                                    class="form-select @error('form.temporary_district_id') is-invalid @enderror"
                                    wire:model="form.temporary_district_id"
                                    id="form.temporary_district_id">
                                    <option value="">---जिल्ला छान्नुहोस् ---</option>
                                    @foreach($temporary_districts as $temporary_district)
                                        <option
                                            value="{{$temporary_district->id}}">{{$temporary_district->district}}</option>
                                    @endforeach
                                </select>
                                @error('form.temporary_district_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.temporary_local_body_id" class="form-label">पालिका</label>
                                <select
                                    class="form-select @error('form.temporary_local_body_id') is-invalid @enderror"
                                    wire:model="form.temporary_local_body_id"
                                    id="form.temporary_local_body_id">
                                    <option value="">---पालिका छान्नुहोस् ---</option>
                                    @foreach($temporary_localBodies as $temporary_localBody)
                                        <option
                                            value="{{$temporary_localBody->id}}">{{$temporary_localBody->local_body}}</option>
                                    @endforeach
                                </select>
                                @error('form.temporary_local_body_id')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.temporary_ward" class="form-label">वार्ड</label>
                                <select
                                    class="form-select @error('form.temporary_ward') is-invalid @enderror"
                                    wire:model="form.temporary_ward"
                                    id="form.temporary_ward">
                                    <option value="">---वार्ड छान्नुहोस् ---</option>
                                    @foreach($temporary_wards as $temporary_ward)
                                        <option
                                            value="{{$temporary_ward}}">{{$temporary_ward}}</option>
                                    @endforeach
                                </select>
                                @error('form.temporary_ward')
                                <div class="invalid-feedback ">{{$message}} </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="form.temporary_tole" class="form-label">टोल</label>
                                <input
                                    name="form.temporary_tole"
                                    class="form-control  @error('form.temporary_tole') is-invalid @enderror"
                                    type="text"
                                    id="form.temporary_tole"
                                    placeholder="टोल"
                                    wire:model="form.temporary_tole"
                                />
                                @error('form.temporary_tole')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>


                    <div class="d-flex justify-content-end mt-2">

                        <button type="button" wire:click.prevent="nextStep(2)" class="btn btn-primary"> अर्को <i
                                class="fa fa-arrow-right"></i></button>
                    </div>
            @endswitch
        </div>
    </form>
</div>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#dob_bs").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#dob_bs").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#dob_ad").val(formattedDate);

                        Livewire.emit('dobChanged', inputFieldDate, formattedDate);
                    }
                });
                if ($('#date_bs').length) {
                    $("#date_bs").nepaliDatePicker({
                        ndpYear: true,
                        ndpMonth: true,
                        onChange: function () {
                            let inputFieldDate = $("#date_bs").val();
                            let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                            let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                            let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                            $("#date_ad").val(formattedDate);

                            Livewire.emit('dateChanged', inputFieldDate, formattedDate);
                        }
                    });
                }

                // let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                // let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                // Livewire.emit('fromDateChanged', todayBsDate, todayAdDate);
                // Livewire.emit('toDateChanged', todayBsDate, todayAdDate);
            });

            function captureImage() {
                // Get the video element that will display the webcam feed
                const video = document.getElementById('video');

// Get the canvas element that we will use to capture the image
                const canvas = document.getElementById('canvas');
                const context = canvas.getContext('2d');

// Prompt the user for permission to use their webcam
                navigator.mediaDevices.getUserMedia({video: true})
                    .then(function (stream) {
                        // Set the source of the video element to the webcam stream
                        video.srcObject = stream;

                        // Wait for the video to load
                        video.onloadedmetadata = function () {
                            // Draw the video frame to the canvas
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);

                            // Get the file type (e.g., image/png)
                            const fileType = 'image/png';

// Convert the canvas image to a data URL
                            const file = canvas.toDataURL(fileType);


                            Livewire.emit('photoUpdated', file)
                        };
                    });
            }


            function loadImage() {
                // Get the video element that will display the webcam feed
                const video = document.getElementById('video');


// Prompt the user for permission to use their webcam
                navigator.mediaDevices.getUserMedia({video: true})
                    .then(function (stream) {
                        // Set the source of the video element to the webcam stream
                        video.srcObject = stream;

                        // Wait for the video to load
                        video.onloadedmetadata = function () {
                            // Draw the video frame to the canvas
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);


                            // You can now use the image data URL to display the image on the page or save it to a file, etc.
                        };
                    });

            }
            function stopCamera() {
                const video = document.getElementById('video');

// Prompt the user for permission to use their webcam
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        // Set the source of the video element to the webcam stream
                        video.srcObject = stream;

                        // Wait for the video to load
                        video.onloadedmetadata = function() {
                            // Stop the webcam stream
                            stream.getVideoTracks()[0].stop();
                        };
                    });

            }

        </script>
    @endpush
@endonce



