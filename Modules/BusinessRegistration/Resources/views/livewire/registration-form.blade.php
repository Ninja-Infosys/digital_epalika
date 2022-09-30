<div class="card">
    <div class="card-body">
        <div class="text-center">
            <ul class="progressbar">
                <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">प्रोपाईटरको
                        बिवरण </a></li>
                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">ब्यावसाहिक
                        बिवरण </a></li>
                <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-3" type="button">
                        सम्बन्धित कागज पत्र </a></li>
                <li class="{{ $currentStep != 4 ? '' : 'active' }}"><a href="#step-4" type="button">
                        परिचय पार्टीको साइज</a></li>
                <li class="{{ $currentStep != 5 ? '' : 'active' }}"><a href="#step-5" type="button">
                        अन्तिम चरण</a></li>

            </ul>
        </div>

        <form wire:submit.prevent="submitForm">
            @switch($currentStep)
                @case(2)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">ब्यावसाहिक बिवरण</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="form.business_detail_name" class="form-label">फर्म/कम्पनी/ब्यवसाय को
                                            नाम
                                            नेपलीमा</label>
                                        <input
                                            name="form.business_detail_name"
                                            class="form-control @error('form.business_detail_name') is-invalid @enderror"
                                            type="text"
                                            id="form.business_detail_name"
                                            placeholder="फर्म/कम्पनी/ब्यवसाय को नाम नेपलीमा"
                                            wire:model="form.business_detail_name"
                                        />
                                        @error('form.business_detail_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.business_detail_name_en" class="form-label">फर्म/कम्पनी/ब्यवसाय
                                            को नाम
                                            अंग्रेजीमा</label>
                                        <input
                                            name="form.business_detail_name_en"
                                            class="form-control @error('form.business_detail_name_en') is-invalid @enderror"
                                            type="text"
                                            id="form.business_detail_name_en"
                                            placeholder="फर्म/कम्पनी/ब्यवसाय को नाम अंग्रेजीमा"
                                            wire:model="form.business_detail_name_en"
                                        />
                                        @error('form.business_detail_name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.business_nature" class="form-label">व्यवसायको प्रकृति</label>
                                        <select
                                            class="form-select @error('form.business_nature') is-invalid @enderror"
                                            wire:model="form.business_nature"
                                            id="form.business_nature">
                                            <option value="">--- व्यवसायको प्रकृति छान्नुहोस् ---</option>
                                            @foreach(\Modules\BusinessRegistration\Enums\BusinessNature::cases() as $businessNature)
                                                <option
                                                    value="{{$businessNature->value}}">{{$businessNature->label()}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.business_nature')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    @if($form['business_nature']==='partnership')
                                        <div class="card mt-3 mb-3">
                                            <div class="card-header">
                                                <h2 class="font-weight-bold text-center">साझेदार हरुको बिवरण</h2>
                                            </div>
                                            <div class="card-body">
                                                <fieldset>
                                                    <div class="row mt-3">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>साझेदार सँगको नाता</th>
                                                                <th>साझेदार को नाम थर</th>
                                                                <th>नागरिकता न</th>
                                                                <th>सम्पर्क न</th>
                                                                <th>
                                                                    <button type="button"
                                                                            wire:click.prevent="partnerDetailIncrement"
                                                                            class="btn btn-primary">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($form['partnerDetails'] as $index=>$partnerDetail)
                                                                <tr>

                                                                    <td>
                                                                        <input type="text"
                                                                               placeholder="साझेदार सँगको नाता"
                                                                               wire:model="form.partnerDetails.{{$index}}.relation"
                                                                               class="form-control @error('form.partnerDetails.'.$index.'.relation') is-invalid @enderror">
                                                                        @error('form.partnerDetails.'.$index.'.relation')
                                                                        <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text"
                                                                               placeholder="साझेदार को नाम थर"
                                                                               wire:model="form.partnerDetails.{{$index}}.name"
                                                                               class="form-control @error('form.partnerDetails.'.$index.'.name') is-invalid @enderror">
                                                                        @error('form.partnerDetails.'.$index.'.name')
                                                                        <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" placeholder="नागरिकता न"
                                                                               wire:model="form.partnerDetails.{{$index}}.citizenship_no"
                                                                               class="form-control @error('form.partnerDetails.'.$index.'.citizenship_no') is-invalid @enderror">
                                                                        @error('form.partnerDetails.'.$index.'.citizenship_no')
                                                                        <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" placeholder="सम्पर्क न"
                                                                               wire:model="form.partnerDetails.{{$index}}.mobile_no"
                                                                               class="form-control @error('form.partnerDetails.'.$index.'.mobile_no') is-invalid @enderror">
                                                                        @error('form.partnerDetails.'.$index.'.mobile_no')
                                                                        <p class="text-danger">{{$message}}</p>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-danger"
                                                                                wire:click.prevent="partnerDetailDecrement({{$index}})">
                                                                            <i class="fa-solid fa-minus"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        @error('form.partnerDetails')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-4 mb-3">
                                        <label for="form.establish_year" class="form-label">व्यवसाय स्थापना गरेको
                                            साल</label>
                                        <input
                                            name="form.establish_year"
                                            class="form-control @error('form.establish_year') is-invalid @enderror"
                                            type="text"
                                            id="form.establish_year"
                                            placeholder="व्यवसाय स्थापना गरेको साल"
                                            wire:model="form.establish_year"
                                        />
                                        @error('form.establish_year')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.registration_date" class="form-label">व्यवसाय दर्ता
                                            मिति</label>
                                        <input
                                            name="form.registration_date"
                                            class="form-control @error('form.registration_date') is-invalid @enderror"
                                            type="text"
                                            id="form.registration_date"
                                            placeholder="व्यवसाय दर्ता मिति"
                                            wire:model="form.registration_date"
                                        />
                                        @error('form.registration_date')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.pan_no" class="form-label">पान नम्बर</label>
                                        <input
                                            name="form.pan_no"
                                            class="form-control @error('form.pan_no') is-invalid @enderror"
                                            type="text"
                                            id="form.pan_no"
                                            placeholder="पान नम्बर"
                                            wire:model="form.pan_no"
                                        />
                                        @error('form.pan_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.object_transaction_sub_category_id" class="form-label">कारोबार
                                            गर्ने वस्तु</label>
                                        <select
                                            class="form-select @error('form.object_transaction_sub_category_id') is-invalid @enderror"
                                            wire:model="form.object_transaction_sub_category_id"
                                            id="form.object_transaction_sub_category_id">
                                            <option value="">--- कारोबार गर्ने वस्तु छान्नुहोस् ---</option>
                                            @foreach($objectTransactions as $objectTransaction)
                                                <option value="{{$objectTransaction->id}}"
                                                        disabled>{{$objectTransaction->title}}
                                                </option>
                                                @foreach($objectTransaction->objectTransactionSubCategories as $object)
                                                    <option value="{{$object->id}}">---{{$object->title}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('form.object_transaction_sub_category_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.price" class="form-label">बर्ग</label>
                                        <select
                                            class="form-select @error('form.price') is-invalid @enderror"
                                            wire:model="form.price"
                                            id="form.price">
                                            <option value="">छान्नुहोस्</option>
                                            @if(!empty($prices))
                                                <option
                                                    value="{{$prices->category_a ??''}}">{{$prices->category_a ??''}}</option>
                                                <option
                                                    value="{{$prices->category_b ??''}}">{{$prices->category_b ??''}}</option>
                                                <option
                                                    value="{{$prices->category_c ??''}}">{{$prices->category_c ??''}}</option>
                                            @endif
                                        </select>
                                        @error('form.price')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.amount_cost" class="form-label">लागत रकम रु</label>
                                        <input
                                            name="form.amount_cost"
                                            class="form-control @error('form.amount_cost') is-invalid @enderror"
                                            type="text"
                                            id="form.amount_cost"
                                            placeholder="लागत रकम रु"
                                            wire:model="form.amount_cost"
                                        />
                                        @error('form.amount_cost')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.source_of_capital" class="form-label">पूजीको स्रोत</label>
                                        <select
                                            class="form-select @error('form.source_of_capital') is-invalid @enderror"
                                            wire:model="form.source_of_capital"
                                            id="form.source_of_capital">
                                            <option value="">--- पूजीको स्रोत छान्नुहोस् ---</option>
                                            @foreach(\Modules\BusinessRegistration\Enums\SourceOfCapital::cases() as $sourceOfCapital)
                                                <option
                                                    value="{{$sourceOfCapital->value}}">{{$sourceOfCapital->label()}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.source_of_capital')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.purpose" class="form-label">उदेश्य</label>
                                        <select
                                            class="form-select @error('form.purpose') is-invalid @enderror"
                                            wire:model="form.purpose"
                                            id="form.purpose">
                                            <option value="">--- उदेश्य छान्नुहोस् ---</option>

                                        </select>
                                        @error('form.purpose')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.employment" class="form-label">रोजगार संख्या</label>
                                        <input
                                            name="form.employment"
                                            class="form-control @error('form.employment') is-invalid @enderror"
                                            type="text"
                                            id="form.employment"
                                            placeholder="रोजगार"
                                            wire:model="form.employment"
                                        />
                                        @error('form.employment')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">बहालमा ? </h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   wire:model="form.is_rent"
                                                   value="1"
                                                   name="is_rent"
                                                   id="is_rent1">
                                            <label class="form-check-label"
                                                   for="is_rent1"> रहेको &nbsp;</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   wire:model="form.is_rent"
                                                   value="0"
                                                   name="is_rent"
                                                   id="is_rent2">
                                            <label class="form-check-label"
                                                   for="is_rent2">नरहेको &nbsp;</label>
                                        </div>
                                    </div>
                                    @if($form['is_rent'])
                                        <div class="col-md-6 mb-3">
                                            <label for="form.house_owner_name" class="form-label">घर धनिको नाम
                                                थर </label>
                                            <input
                                                name="form.house_owner_name"
                                                class="form-control @error('form.house_owner_name') is-invalid @enderror"
                                                type="text"
                                                id="form.house_owner_name"
                                                placeholder="घर धनिको नाम थर"
                                                wire:model="form.house_owner_name"
                                            />
                                            @error('form.house_owner_name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="form.house_owner_phone" class="form-label">घर धनिको मोबाइल
                                                न </label>
                                            <input
                                                name="form.house_owner_phone"
                                                class="form-control @error('form.house_owner_phone') is-invalid @enderror"
                                                type="text"
                                                id="form.house_owner_phone"
                                                placeholder="घर धनिको मोबाइल न"
                                                wire:model="form.house_owner_phone"
                                            />
                                            @error('form.house_owner_phone')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="form.house_owner_address" class="form-label">ठेगाना</label>
                                            <input
                                                name="form.house_owner_address"
                                                class="form-control @error('form.house_owner_address') is-invalid @enderror"
                                                type="text"
                                                id="form.house_owner_address"
                                                placeholder="ठेगाना"
                                                wire:model="form.house_owner_address"
                                            />
                                            @error('form.house_owner_address')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="form.house_owner_monthly_rent" class="form-label">मासिक भाडा
                                                रु</label>
                                            <input
                                                name="form.house_owner_monthly_rent"
                                                class="form-control @error('form.house_owner_monthly_rent') is-invalid @enderror"
                                                type="text"
                                                id="form.house_owner_monthly_rent"
                                                placeholder="मासिक भाडा रु"
                                                wire:model="form.house_owner_monthly_rent"
                                            />
                                            @error('form.house_owner_monthly_rent')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">फर्म / कम्पनी/ब्यबसाय को ठेगाना</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="form.province_id" class="form-label"> प्रदेश </label>
                                        <select class="form-select @error('form.province_id') is-invalid @enderror"
                                                id="form.province_id"
                                                wire:model="form.province_id" disabled>
                                            <option value="">--- प्रदेश छान्नुहोस्---</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->province}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.province_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.district_id" class="form-label">जिल्ला</label>
                                        <select class="form-select @error('form.district_id') is-invalid @enderror"
                                                id="form.district_id"
                                                wire:model="form.district_id" disabled>
                                            <option value="">--- जिल्ला छान्नुहोस्----</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">
                                                    {{$district->district}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('form.district_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.local_body_id" class="form-label">पालिका</label>
                                        <select class="form-select @error('form.local_body_id') is-invalid @enderror"
                                                id="form.local_body_id"
                                                wire:model="form.local_body_id" disabled>
                                            <option value="">--- पालिका छान्नुहोस्----</option>
                                            @foreach($localBodies as $localBody)
                                                <option value="{{$localBody->id}}">
                                                    {{$localBody->local_body}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('form.local_body_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.ward_no" class="form-label">वार्ड</label>
                                        <select class="form-select @error('form.ward_no') is-invalid @enderror"
                                                id="form.ward_no"
                                                wire:model="form.ward_no">
                                            <option value="">--- वार्ड छान्नुहोस्----</option>
                                            @for($i=1;$i<=$wards;$i++)
                                                <option value="{{$i}}">
                                                    {{$i}}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('form.ward_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.way" class="form-label">मार्ग</label>
                                        <input
                                            name="form.way"
                                            class="form-control @error('form.way') is-invalid @enderror"
                                            type="text"
                                            id="form.way"
                                            placeholder="मार्ग"
                                            wire:model="form.way"
                                        />
                                        @error('form.way')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.tole" class="form-label">गाउ/टोल</label>
                                        <input
                                            name="form.tole"
                                            class="form-control @error('form.tole') is-invalid @enderror"
                                            type="text"
                                            id="form.tole"
                                            placeholder="गाउ/टोल"
                                            wire:model="form.tole"
                                        />
                                        @error('form.tole')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>

                            </fieldset>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">यो भन्दा अगाडी कुनै व्यवसाय दर्ता गरेको छ ?</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               wire:model="form.is_registered"
                                               value="1"
                                               name="is_registerd"
                                               id="is_registerd1">
                                        <label class="form-check-label"
                                               for="is_registerd1"> छ&nbsp;</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               wire:model="form.is_registered"
                                               value="0"
                                               name="is_registerd"
                                               id="is_registerd2">
                                        <label class="form-check-label"
                                               for="is_registerd2">छैन &nbsp;</label>
                                    </div>
                                </div>

                                @if($form['is_registered'])
                                    <div class="row mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>दर्ता नम्बर</th>
                                                <th>व्यवसायको नाम</th>
                                                <th>दर्ता मिति</th>
                                                <th>सक्रिय</th>
                                                <th>
                                                    <button type="button"
                                                            wire:click.prevent="registeredBusinessArrayIncrement"
                                                            class="btn btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($form['registeredBusinesses'] as $index=>$registeredBusiness)
                                                <tr>

                                                    <td>
                                                        <input type="text" placeholder="दर्ता नम्बर"
                                                               wire:model="form.registeredBusinesses.{{$index}}.registration_no"
                                                               class="form-control @error('form.registeredBusinesses.'.$index.'.registration_no') is-invalid @enderror">
                                                        @error('form.registeredBusinesses.'.$index.'.registration_no')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="व्यवसायको नाम"
                                                               wire:model="form.registeredBusinesses.{{$index}}.business_name"
                                                               class="form-control @error('form.registeredBusinesses.'.$index.'.business_name') is-invalid @enderror">
                                                        @error('form.registeredBusinesses.'.$index.'.business_name')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="दर्ता मिति"
                                                               wire:model="form.registeredBusinesses.{{$index}}.registration_date"
                                                               class="form-control @error('form.registeredBusinesses.'.$index.'.registration_date') is-invalid @enderror">
                                                        @error('form.registeredBusinesses.'.$index.'.registration_date')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>

                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                       class="form-check-input"
                                                                       wire:model="form.registeredBusinesses.{{$index}}.active"
                                                                       value="1"
                                                                       name="form.registeredBusinesses.{{$index}}.active"
                                                                       id="is_active">
                                                                <label class="form-check-label"
                                                                       for="is_active"> छ&nbsp;</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                       class="form-check-input"
                                                                       wire:model="form.registeredBusinesses.{{$index}}.active"
                                                                       value="0"
                                                                       name="form.registeredBusinesses.{{$index}}.active"
                                                                       id="is_active1">
                                                                <label class="form-check-label"
                                                                       for="is_active1">छैन &nbsp;</label>
                                                            </div>
                                                        </div>
                                                        @error('form.registeredBusinesses.'.$index.'.active')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger"
                                                                wire:click.prevent="registeredBusinessArrayDecrement({{$index}})">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                        @error('form.registeredBusinesses')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                @endif
                            </fieldset>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(1)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(3)" class="btn btn-primary"> अर्को <i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>

                    @break
                @case(3)

                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">सम्बन्धित कागजपत्र</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="form.photo" class="form-label">व्यवसायीको पासपोर्ट साइजको
                                            फोटो*</label>
                                        <input type="file" class="form-control" id="form.photo"
                                               wire:model="form.photo"/>
                                        @error('form.photo')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="form.citizen_ship" class="form-label">नागरिकता प्रमाणपत्रको
                                            प्रतिलिपि-१</label>
                                        <input type="file" class="form-control" id="form.citizen_ship"
                                               wire:model="form.citizen_ship"/>
                                        @error('form.citizen_ship')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="form.company_registration" class="form-label">फार्म कम्पनी भयमा
                                            दर्ता, इजाजत
                                            प्रमाणपत्र</label>
                                        <input type="file" class="form-control" id="form.company_registration"
                                               wire:model="form.company_registration"/>
                                        @error('form.company_registration')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="form.tax_pay_file" class="form-label">आन्तरिक राजस्व कार्यालयमा
                                            आघिल्लो आ.व
                                            सम्मको करतिरेको करदाता प्रमाणपत्रको प्रतिलिपि</label>
                                        <input type="file" class="form-control" id="form.tax_pay_file"
                                               wire:model="form.tax_pay_file"/>
                                        @error('form.tax_pay_file')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="form.signature" class="form-label">हस्ताक्षर</label>
                                        <input type="file" class="form-control" id="form.signature"
                                               wire:model="form.signature"/>
                                        @error('form.signature')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="form.thumb" class="form-label">औठाको छाप</label>
                                        <input type="file" class="form-control" id="form.thumb"
                                               wire:model="form.thumb"/>
                                        @error('form.thumb')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(2)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="nextStep(4)" class="btn btn-primary"> अर्को <i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>

                    @break
                @case(4)
                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">परिचय पार्टीको साइज</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="form.length" class="form-label">लम्बाई</label>
                                        <input
                                            name="form.length"
                                            class="form-control @error('form.length') is-invalid @enderror"
                                            type="text"
                                            id="form.length"
                                            placeholder="लम्बाई"
                                            wire:model="form.length"
                                        />
                                        @error('form.length')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror


                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.width" class="form-label">चौदाई</label>
                                        <input
                                            name="form.width"
                                            class="form-control @error('form.width') is-invalid @enderror"
                                            type="text"
                                            id="form.width"
                                            placeholder="चौदाई"
                                            wire:model="form.width"
                                        />
                                        @error('form.width')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.square" class="form-label">वर्गफिट</label>
                                        <input
                                            name="form.square"
                                            class="form-control @error('form.square') is-invalid @enderror"
                                            type="text"
                                            id="form.square"
                                            placeholder="वर्गफिट"
                                            wire:model="form.square"
                                        />
                                        @error('form.square')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(3)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>

                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(5)" class="btn btn-primary">
                                अर्को <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>

                    </div>
                    @break
                @case(5)
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center font-weight-bold">प्रोपाईटरको विवरण</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>व्यवसायी नाम</th>
                                        <td>{{$form['name']}}</td>
                                    </tr>
                                    <tr>
                                        <th>फोन न</th>
                                        <td>{{$form['phone']}}</td>
                                    </tr>
                                    <tr>
                                        <th>लिङ्ग</th>
                                        <td>

                                            @switch($form['gender'])
                                                @case('Male')
                                                    पुरुष
                                                    @break
                                                @case('Female')
                                                    महिला
                                                    @break
                                                @default
                                                    अन्य
                                            @endswitch
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> इमेल</th>
                                        <td>{{$form['email']}}</td>
                                    </tr>

                                    <tr>
                                        <th> घर नम्बर</th>
                                        <td>{{$form['house_no']}}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            व्यक्तिगत स्थाई लेखा नम्बर
                                        </th>
                                        <td>{{$form['account_no']}}</td>
                                    </tr>
                                    <tr>
                                        <th> राष्ट्रियता परिचयपत्र नम्बर</th>
                                        <td>{{$form['national_card_no']}}</td>
                                    </tr>
                                    <tr>
                                        <th> शैक्षिक योग्यता</th>
                                        <td>{{$form['education_qualification']}}</td>
                                    </tr>
                                    <tr>
                                        <th> मुखय पेशा</th>
                                        <td>{{$form['occupation']}}</td>
                                    </tr>
                                    <tr>
                                        <th> नागरिकता नम्बर</th>
                                        <td>{{$form['citizenship_no']}}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            जारी मिति
                                        </th>
                                        <td>{{$form['issue_date']}}</td>
                                    </tr>
                                    <tr>
                                        <th> जारी जिल्ला</th>
                                        <td>{{$issue_district_preview['district'] ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th> प्रदेश</th>
                                        <td>{{$permanent_province_preview['province'] ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th> जिल्ला</th>
                                        <td>{{$permanent_district_preview['district'] ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th> पालिका</th>
                                        <td>{{$permanent_localBody_preview['local_body'] ??''}}</td>
                                    </tr>
                                    <tr>
                                        <th> वार्ड</th>
                                        <td>{{$form['permanent_ward_no']}}</td>
                                    </tr>

                                    <tr>
                                        <th> मार्ग</th>
                                        <td>{{$form['permanent_way']}}</td>
                                    </tr>
                                    <tr>
                                        <th> गाउ/टोल</th>
                                        <td>{{$form['permanent_tole']}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="text-center font-weight-bold"> तिन पुस्ते बिवरण</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>नाता</th>
                                        <th> नाम, थर</th>
                                        <th>नाम, थर(English)</th>
                                        <th>नागरिकता न</th>
                                        <th>सम्पर्क न</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($form['threeGenerationDetails'] as $threeGenerationDetail)
                                        <tr>
                                            <td>   {{$threeGenerationDetail['relation']}}</td>
                                            <td>   {{$threeGenerationDetail['name']}}</td>
                                            <td>   {{$threeGenerationDetail['name_en']}}</td>
                                            <td>   {{$threeGenerationDetail['citizenship_no']}}</td>
                                            <td>   {{$threeGenerationDetail['mobile_no']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="text-center font-weight-bold">ब्यावसाहिक बिवरण</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>फर्म/कम्पनी/ब्यवसाय को नाम नेपलीमा</th>
                                        <td>{{$form['business_detail_name']}}</td>
                                    </tr>
                                    <tr>
                                        <th>फर्म/कम्पनी/ब्यवसाय को नाम अंग्रेजीमा</th>
                                        <td>{{$form['business_detail_name_en']}}</td>
                                    </tr>
                                    <tr>
                                        <th>व्यवसायको प्रकृति</th>
                                        <td>

                                            @switch($form['business_nature'])
                                                @case('partnership')
                                                    साझेदारी
                                                    @break
                                                @default
                                                    एकल
                                            @endswitch
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> व्यवसाय स्थापना गरेको साल</th>
                                        <td>{{$form['establish_year']}}</td>
                                    </tr>

                                    <tr>
                                        <th> व्यवसाय दर्ता मिति</th>
                                        <td>{{$form['registration_date']}}</td>
                                    </tr>
                                    <tr>
                                        <th>

                                            पान नम्बर
                                        </th>
                                        <td>{{$form['pan_no']}}</td>
                                    </tr>

                                    <tr>
                                        <th> लागत रकम रु</th>
                                        <td>{{$form['amount_cost']}}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            पूजीको स्रोत
                                        </th>
                                        <td>

                                                {{\Modules\BusinessRegistration\Enums\SourceOfCapital::tryFrom($form['source_of_capital'])->label()}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <th> उदेश्य</th>
                                        <td>{{$form['purpose']}}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            रोजगार
                                        </th>
                                        <td>{{$form['employment']}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    @if($form['business_nature']==='partnership')
                        <div class="card mt-3 mb-3">
                            <div class="card-header">
                                <h2 class="font-weight-bold text-center">साझेदार हरुको बिवरण</h2>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <div class="row mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>साझेदार सँगको नाता</th>
                                                <th>साझेदार को नाम थर</th>
                                                <th>नागरिकता न</th>
                                                <th>सम्पर्क न</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($form['partnerDetails'] as $index=>$partnerDetail)
                                                <tr>

                                                    <td>
                                                        {{$partnerDetail['relation']}}
                                                    </td>
                                                    <td>
                                                        {{$partnerDetail['name']}}
                                                    </td>

                                                    <td>

                                                        {{$partnerDetail['citizenship_no']}}
                                                    </td>
                                                    <td>
                                                        {{$partnerDetail['mobile_no']}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    @endif


                    @if($form['is_rent']==1)
                        <div class="card mt-3">
                            <div class="card-header">
                                <h2 class="font-weight-bold text-center">बहालमा ? </h2>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th>घर धनिको नाम थर</th>
                                                <td>
                                                    {{$form['house_owner_name']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>घर धनिको मोबाइल न</th>
                                                <td>
                                                    {{$form['house_owner_phone']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>ठेगाना</th>
                                                <td>
                                                    {{$form['house_owner_address']}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th> मासिक भाडा रु
                                                </th>
                                                <td>
                                                    {{$form['house_owner_monthly_rent']}}
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    @endif


                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">फर्म / कम्पनी/ब्यबसाय को ठेगाना</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>प्रदेश</th>
                                            <td>
                                                {{$province_preview['province'] ??''}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>जिल्ला</th>
                                            <td>
                                                {{$district_preview['district'] ??''}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>पालिका</th>
                                            <td>
                                                {{$localBody_preview['local_body'] ??''}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th> वार्ड
                                            </th>
                                            <td>
                                                {{$form['ward_no']}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th> मार्ग</th>
                                            <td>
                                                {{$form['way']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>

                                                गाउ/टोल
                                            </th>
                                            <td>
                                                {{$form['tole']}}
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    @if($form['is_registered']==1)
                        <div class="card mt-3">
                            <div class="card-header">
                                <h2 class="font-weight-bold text-center">यो भन्दा अगाडी कुनै व्यवसाय दर्ता गरेको छ
                                    ?</h2>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <div class="row mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>दर्ता नम्बर</th>
                                                <th>व्यवसायको नाम</th>
                                                <th>दर्ता मिति</th>
                                                <th>सक्रिय</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($form['registeredBusinesses'] as $registeredBusiness)
                                                <tr>
                                                    <td>
                                                        {{$registeredBusiness['registration_no']}}
                                                    </td>
                                                    <td>
                                                        {{$registeredBusiness['business_name']}}
                                                    </td>
                                                    <td>
                                                        {{$registeredBusiness['registration_date']}}
                                                    </td>
                                                    <td>
                                                        @switch($registeredBusiness['active'])
                                                            @case('1')
                                                                छ
                                                                @break
                                                            @default
                                                                छैन
                                                        @endswitch
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    @endif

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="text-center font-weight-bold">सम्बन्धित कागजपत्र</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>व्यवसायीको पासपोर्ट साइजको फोटो*</th>
                                        <td>
                                            @if(!empty($form['photo']))
                                                <img src="{{$form['photo']->temporaryUrl()}}" alt="" height="60">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>नागरिकता प्रमाणपत्रको प्रतिलिपि-१</th>
                                        <td>
                                            @if(!empty($form['citizen_ship']))
                                                <img src="{{$form['citizen_ship']->temporaryUrl()}}" alt="" height="60">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>फार्म कम्पनी भयमा दर्ता, इजाजत प्रमाणपत्र</th>
                                        <td>
                                            @if(!empty($form['company_registration']))
                                                <img src="{{$form['company_registration']->temporaryUrl()}}" alt=""
                                                     height="60">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> आन्तरिक राजस्व कार्यालयमा आघिल्लो आ.व सम्मको करतिरेको करदाता प्रमाणपत्रको
                                            प्रतिलिपि
                                        </th>
                                        <td>
                                            @if(!empty($form['tax_pay_file']))
                                                <img src="{{$form['tax_pay_file']->temporaryUrl()}}" alt="" height="60">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> हस्ताक्षर</th>
                                        <td>
                                            @if(!empty($form['signature']))
                                                <img src="{{$form['signature']->temporaryUrl()}}" alt="" height="60">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>

                                            औठाको छाप
                                        </th>

                                        <td>
                                            @if(!empty($form['thumb']))
                                                <img src="{{$form['thumb']->temporaryUrl()}}" alt="" height="60">
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="text-center font-weight-bold">परिचय पार्टीको साइज</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>लम्बाई</th>

                                        <td>
                                            @if(!empty($form['length']))
                                                {{$form['length']}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>चौदाई</th>
                                        <td>
                                            @if(!empty($form['width']))
                                                {{$form['width']}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>वर्गफिट</th>
                                        <td>
                                            @if(!empty($form['square']))
                                                {{$form['square']}}
                                            @endif
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>


                    <div style="display: flex;justify-content: space-between;">
                        <div class="mt-2">
                            <button type="button" wire:click.prevent="backStep(4)" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> पहिलो
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">
                                पेश गर्नुहोस्
                            </button>
                        </div>

                    </div>

                    @break



                @default
                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">प्रोपाईटरको विवरण</h2>
                        </div>

                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="form.name" class="form-label">व्यवसायी नाम:</label>
                                        <input
                                            name="form.name"
                                            class="form-control @error('form.name') is-invalid @enderror"
                                            type="text"
                                            id="form.name"
                                            placeholder="व्यवसायी नाम"
                                            wire:model="form.name"
                                        />
                                        @error('form.name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.phone" class="form-label">फोन न:</label>
                                        <input
                                            name="form.phone"
                                            class="form-control @error('form.phone') is-invalid @enderror"
                                            type="text"
                                            id="form.phone"
                                            placeholder="98********"
                                            wire:model="form.phone"
                                        />
                                        @error('form.phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.gender" class="form-label">लिङ्ग</label>
                                        <select
                                            class="form-select @error('form.gender') is-invalid @enderror"
                                            wire:model="form.gender"
                                            id="form.gender">
                                            <option value="">--- लिङ्ग छान्नुहोस् ---</option>
                                            @foreach(config('defaults.gender') as $key=>$gender)
                                                <option value="{{$gender}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.gender')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.email" class="form-label">इमेल:</label>
                                        <input
                                            name="form.email"
                                            class="form-control @error('form.email') is-invalid @enderror"
                                            type="text"
                                            id="form.email"
                                            placeholder="इमेल"
                                            wire:model="form.email"
                                        />
                                        @error('form.email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.house_no" class="form-label">घर नम्बर</label>
                                        <input
                                            name="form.house_no"
                                            class="form-control @error('form.house_no') is-invalid @enderror"
                                            type="text"
                                            id="form.house_no"
                                            placeholder="घर  नम्बर"
                                            wire:model="form.house_no"
                                        />
                                        @error('form.house_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.account_no" class="form-label"> व्यक्तिगत स्थाई लेखा
                                            नम्बर</label>
                                        <input
                                            name="form.account_no"
                                            class="form-control @error('form.account_no') is-invalid @enderror"
                                            type="text"
                                            id="form.account_no"
                                            placeholder="व्यक्तिगत स्थाई लेखा नम्बर"
                                            wire:model="form.account_no"
                                        />
                                        @error('form.account_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.national_card_no" class="form-label">राष्ट्रियता परिचयपत्र
                                            नम्बर</label>
                                        <input
                                            name="form.national_card_no"
                                            class="form-control @error('form.national_card_no') is-invalid @enderror"
                                            type="text"
                                            id="form.national_card_no"
                                            placeholder="राष्ट्रियता परिचयपत्र नम्बर"
                                            wire:model="form.national_card_no"
                                        />
                                        @error('form.national_card_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="form.education_qualification" class="form-label">शैक्षिक
                                            योग्यता</label>
                                        <select
                                            class="form-select @error('form.education_qualification') is-invalid @enderror"
                                            id="form.education_qualification"
                                            wire:model="form.education_qualification">
                                            <option value="">---शैक्षिक योग्यता ----</option>

                                            <option value="Graduation">Graduation</option>
                                            <option value="Undergraduate">Undergraduate</option>

                                        </select>
                                        @error('form.education_qualification')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="occupation" class="form-label">मुखय पेशा</label>
                                        <input
                                            name="form.occupation"
                                            class="form-control @error('form.occupation') is-invalid @enderror"
                                            type="text"
                                            id="form.occupation"
                                            placeholder="मुखय पेशा"
                                            wire:model="form.occupation"
                                        />
                                        @error('form.occupation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.citizenship_no" class="form-label">नागरिकता नम्बर: </label>
                                        <input
                                            name="form.citizenship_no"
                                            class="form-control @error('form.citizenship_no') is-invalid @enderror"
                                            type="text"
                                            id="form.citizenship_no"
                                            placeholder="नागरिकता नम्बर"
                                            wire:model="form.citizenship_no"
                                        />
                                        @error('form.citizenship_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.issue_date" class="form-label">जारी मिति:</label>
                                        <input
                                            name="form.issue_date"
                                            class="form-control @error('form.issue_date') is-invalid @enderror"
                                            type="text"
                                            id="form.issue_date"
                                            placeholder="जारी मिति"
                                            wire:model="form.issue_date"
                                        />
                                        @error('form.issue_date')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.issue_district_id" class="form-label"> जारी जिल्ला</label>
                                        <select
                                            class="form-select @error('form.issue_district_id') is-invalid @enderror"
                                            id="form.issue_district_id"
                                            wire:model="form.issue_district_id">
                                            <option value="">---जारि जिल्ला ----</option>
                                            @foreach($all_districts as $all_district)
                                                <option
                                                    value="{{$all_district->id}}">{{$all_district->district}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.issue_district_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">ठेगाना</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row mt-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_province_id" class="form-label"> प्रदेश </label>
                                        <select
                                            class="form-select @error('form.permanent_province_id') is-invalid @enderror"
                                            id="form.permanent_province_id"
                                            wire:model="form.permanent_province_id">
                                            <option value="">--- प्रदेश छान्नुहोस्---</option>
                                            @foreach($permanent_provinces as $permanent_province)
                                                <option
                                                    value="{{$permanent_province->id}}">{{$permanent_province->province}}</option>
                                            @endforeach
                                        </select>
                                        @error('form.permanent_province_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_district_id" class="form-label">जिल्ला</label>
                                        <select
                                            class="form-select @error('form.permanent_district_id') is-invalid @enderror"
                                            id="form.permanent_district_id"
                                            wire:model="form.permanent_district_id">
                                            <option value="">--- जिल्ला छान्नुहोस्----</option>
                                            @foreach($permanent_districts as $permanent_district)
                                                <option value="{{$permanent_district->id}}">
                                                    {{$permanent_district->district}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('form.permanent_district_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_local_body_id" class="form-label">पालिका</label>
                                        <select
                                            class="form-select @error('form.permanent_local_body_id') is-invalid @enderror"
                                            id="form.permanent_local_body_id"
                                            wire:model="form.permanent_local_body_id">
                                            <option value="">--- पालिका छान्नुहोस्----</option>
                                            @foreach($permanent_localBodies as $permanent_localBody)
                                                <option value="{{$permanent_localBody->id}}">
                                                    {{$permanent_localBody->local_body}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('form.permanent_local_body_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_ward_no" class="form-label">वार्ड</label>
                                        <select
                                            class="form-select @error('form.permanent_ward_no') is-invalid @enderror"
                                            id="form.permanent_ward_no"
                                            wire:model="form.permanent_ward_no">
                                            <option value="">--- वार्ड छान्नुहोस्----</option>
                                            @for($i=1;$i<=$permanent_wards;$i++)
                                                <option value="{{$i}}">
                                                    {{$i}}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('form.permanent_ward_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_way" class="form-label">मार्ग</label>
                                        <input
                                            name="form.permanent_way"
                                            class="form-control @error('form.permanent_way') is-invalid @enderror"
                                            type="text"
                                            id="form.permanent_way"
                                            placeholder="मार्ग"
                                            wire:model="form.permanent_way"
                                        />
                                        @error('form.permanent_way')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="form.permanent_tole" class="form-label">गाउ/टोल</label>
                                        <input
                                            name="form.permanent_tole"
                                            class="form-control @error('form.permanent_tole') is-invalid @enderror"
                                            type="text"
                                            id="form.permanent_tole"
                                            placeholder="गाउ/टोल"
                                            wire:model="form.permanent_tole"
                                        />
                                        @error('form.permanent_tole')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold text-center">तिन पुस्ते बिवरण</h2>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>नाता</th>
                                        <th>नाम, थर</th>
                                        <th>नाम, थर( अंग्रेजीमा)</th>
                                        <th>नागरिकता न</th>
                                        <th>सम्पर्क न</th>
                                        <th>
                                            <button type="button" wire:click.prevent="documentsArrayIncrement"
                                                    class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($form['threeGenerationDetails'] as $index=>$threeGenerationDetail)
                                        <tr>

                                            <td>
                                                <input type="text" placeholder="नाता"
                                                       wire:model="form.threeGenerationDetails.{{$index}}.relation"
                                                       class="form-control @error('form.threeGenerationDetails.'.$index.'.relation') is-invalid @enderror">
                                                @error('form.threeGenerationDetails.'.$index.'.relation')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" placeholder="नाम थर"
                                                       wire:model="form.threeGenerationDetails.{{$index}}.name"
                                                       class="form-control @error('form.threeGenerationDetails.'.$index.'.name') is-invalid @enderror">
                                                @error('form.threeGenerationDetails.'.$index.'.name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" placeholder="नाम थर ( अंग्रेजीमा)"
                                                       wire:model="form.threeGenerationDetails.{{$index}}.name_en"
                                                       class="form-control @error('form.threeGenerationDetails.'.$index.'.name_en') is-invalid @enderror">
                                                @error('form.threeGenerationDetails.'.$index.'.name_en')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" placeholder="नागरिकता न"
                                                       wire:model="form.threeGenerationDetails.{{$index}}.citizenship_no"
                                                       class="form-control @error('form.threeGenerationDetails.'.$index.'.citizenship_no') is-invalid @enderror">
                                                @error('form.threeGenerationDetails.'.$index.'.citizenship_no')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" placeholder="सम्पर्क न"
                                                       wire:model="form.threeGenerationDetails.{{$index}}.mobile_no"
                                                       class="form-control @error('form.threeGenerationDetails.'.$index.'.mobile_no') is-invalid @enderror">
                                                @error('form.threeGenerationDetails.'.$index.'.mobile_no')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                        wire:click.prevent="documentsArrayDecrement({{$index}})">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                @error('form.threeGenerationDetails')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </fieldset>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" wire:click.prevent="nextStep(2)" class="btn btn-primary"> अर्को <i
                                class="fa fa-arrow-right"></i></button>
                    </div>
            @endswitch
        </form>
    </div>
</div>



