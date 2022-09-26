<div class="card">
    <div class="card-body">
        <div class="text-center">
            <ul class="progressbar">
                <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">प्रोपाईटरको
                        बिवरण </a></li>
                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">ब्यावसाहिक
                        बिवरण </a></li>
                <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-4" type="button" >अन्तिम
                        सम्बन्धित कागज पत्र </a></li>
                <li class="{{ $currentStep != 4 ? '' : 'active' }}"><a href="#step-4" type="button" >अन्तिम
                        परिचय पार्टीको साइज</a></li>
            </ul>
        </div>

        <form>
            @switch($currentStep)
                @case(4)
                    <fieldset>
                        <legend class="title">परिचय पार्टीको साइज</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tole" class="form-label">लम्बाई</label>
                                <input
                                    name="tole"
                                    class="form-control @error('tole') is-invalid @enderror"
                                    type="text"
                                    id="tole"
                                    placeholder="लम्बाई"
                                    wire:model="tole"
                                />
                                {{--                                @error('tole')--}}
                                {{--                                <div class="invalid-feedback">{{$message}}</div>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tole" class="form-label">चौदाई</label>
                                <input
                                    name="tole"
                                    class="form-control @error('tole') is-invalid @enderror"
                                    type="text"
                                    id="tole"
                                    placeholder="चौदाई"
                                    wire:model="tole"
                                />
                                {{--                                @error('tole')--}}
                                {{--                                <div class="invalid-feedback">{{$message}}</div>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tole" class="form-label">वर्गफिट</label>
                                <input
                                    name="tole"
                                    class="form-control @error('tole') is-invalid @enderror"
                                    type="text"
                                    id="tole"
                                    placeholder="वर्गफिट"
                                    wire:model="tole"
                                />
                                {{--                                @error('tole')--}}
                                {{--                                <div class="invalid-feedback">{{$message}}</div>--}}
                                {{--                                @enderror--}}
                            </div>
                        </div>
                    </fieldset>

                    @break
                @case(3)

                    <fieldset>
                        <legend class="title">सम्बन्धित कागजपत्र</legend>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">व्यवसायीको पासपोर्ट साइजको फोटो*</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">नागरिकता प्रमाणपत्रको प्रतिलिपि-१</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">फार्म कम्पनी भयमा दर्ता, इजाजत प्रमाणपत्र</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">आन्तरिक राजस्व कार्यालयमा आघिल्लो आ.व सम्मको करतिरेको करदाता प्रमाणपत्रको प्रतिलिपि</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">हस्ताक्षर</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="organizationDetail.org_registration_document" class="form-label">औठाको छाप</label>
                                <input type="file" class="form-control" id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div class="mt-2">
                        <button type="button" wire:click.prevent="backStep(2)" class="btn btn-primary">Pri</button>
                    </div>
                    <div class="mt-2">
                        <button type="button" wire:click.prevent="nextStep(4)" class="btn btn-primary">Next</button>
                    </div>

                    @break
                @case(2)
                    <fieldset>
                        <legend class="title">ब्यावसाहिक बिवरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="form.business_detail_name" class="form-label">फर्म/कम्पनी/ब्यवसाय को नाम नेपलीमा</label>
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
                                <label for="form.business_detail_name_en" class="form-label">फर्म/कम्पनी/ब्यवसाय को नाम अंग्रेजीमा</label>
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
                                <label for="form.gender" class="form-label">व्यवसायको प्रकृति</label>
                                <select
                                    class="form-select @error('form.business_nature_id') is-invalid @enderror"
                                    wire:model="form.business_nature_id"
                                    id="form.business_nature_id">
                                    <option value="">--- व्यवसायको प्रकृति छान्नुहोस् ---</option>
                                    @foreach($businessNatures as $businessNature)
                                        <option value="{{$businessNature->id}}">{{$businessNature->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.business_nature_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                <h2>साझेदार हरुको बिवरण</h2>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>साझेदार सँगको नाता</th>
                                        <th>साझेदार को नाम थर</th>
                                        <th>नागरिकता न</th>
                                        <th>सम्पर्क न</th>
                                        <th>
                                            <button type="button" wire:click.prevent="partnerDetailIncrement"
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
                                                <input type="text" placeholder="साझेदार सँगको नाता"
                                                       wire:model="form.partnerDetails.{{$index}}.relation"
                                                       class="form-control @error('form.partnerDetails.'.$index.'.relation') is-invalid @enderror">
                                                @error('form.partnerDetails.'.$index.'.relation')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" placeholder="साझेदार को नाम थर"
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
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="form.establish_year" class="form-label">व्यवसाय स्थापना गरेको साल</label>
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
                                <label for="registration_date" class="form-label">व्यवसाय दर्ता मिति</label>
                                <input
                                    name="registration_date"
                                    class="form-control @error('form.registration_date') is-invalid @enderror"
                                    type="text"
                                    id="registration_date"
                                    placeholder="व्यवसाय दर्ता मिति"
                                    wire:model="form.registration_date"
                                />
                                @error('form.registration_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="pan_no" class="form-label">पान नम्बर</label>
                                <input
                                    name="pan_no"
                                    class="form-control @error('form.pan_no') is-invalid @enderror"
                                    type="text"
                                    id="pan_no"
                                    placeholder="पान नम्बर"
                                    wire:model="form.pan_no"
                                />
                                @error('form.pan_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="form.transaction_object" class="form-label">कारोबार गर्ने वस्तु</label>
                                <select
                                    class="form-select @error('form.transaction_object') is-invalid @enderror"
                                    wire:model="form.transaction_object"
                                    id="form.transaction_object" multiple>
                                    <option value="">--- कारोबार गर्ने वस्तु छान्नुहोस् ---</option>
                                    @foreach($businessNatures as $businessNature)
                                        <option value="{{$businessNature->id}}">{{$businessNature->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.transaction_object')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>




                            <div class="col-md-4 mb-3">
                                <label for="amount_cost" class="form-label">लागत रकम रु</label>
                                <input
                                    name="amount_cost"
                                    class="form-control @error('form.amount_cost') is-invalid @enderror"
                                    type="text"
                                    id="amount_cost"
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
                                    id="form.source_of_capital" multiple>
                                    <option value="">--- पूजीको स्रोत छान्नुहोस् ---</option>
                                    @foreach($businessNatures as $businessNature)
                                        <option value="{{$businessNature->id}}">{{$businessNature->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.source_of_capital')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="purpose" class="form-label">उदेश्य</label>
                                <input
                                    name="purpose"
                                    class="form-control @error('form.purpose') is-invalid @enderror"
                                    type="text"
                                    id="purpose"
                                    placeholder="उदेश्य"
                                    wire:model="form.purpose"
                                />
                                @error('form.purpose')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="employment" class="form-label">रोजगार</label>
                                <input
                                    name="employment"
                                    class="form-control @error('form.employment') is-invalid @enderror"
                                    type="text"
                                    id="employment"
                                    placeholder="रोजगार"
                                    wire:model="form.employment"
                                />
                                @error('form.employment')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           wire:model="is_show"
                                           value="1"
                                           name="is_show"
                                           id="is_show1">
                                    <label class="form-check-label"
                                           for="is_show1">बहालमा रहेको &nbsp;</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           wire:model="is_show"
                                           value="0"
                                           name="is_show"
                                           id="is_show2">
                                    <label class="form-check-label"
                                           for="is_show2">बहालमा नरहेको &nbsp;</label>
                                </div>
                            </div>
                            @if($is_show)
                                <div class="col-md-6 mb-3">
                                    <label for="house_owner_name" class="form-label">घर धनिको नाम थर </label>
                                    <input
                                        name="house_owner_name"
                                        class="form-control @error('form.house_owner_name') is-invalid @enderror"
                                        type="text"
                                        id="house_owner_name"
                                        placeholder="घर धनिको नाम थर"
                                        wire:model="form.house_owner_name"
                                    />
                                    @error('form.house_owner_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="house_owner_phone" class="form-label">घर धनिको मोबाइल न </label>
                                    <input
                                        name="house_owner_phone"
                                        class="form-control @error('form.house_owner_phone') is-invalid @enderror"
                                        type="text"
                                        id="house_owner_phone"
                                        placeholder="घर धनिको मोबाइल न"
                                        wire:model="form.house_owner_phone"
                                    />
                                    @error('form.house_owner_phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="house_owner_address" class="form-label">ठेगाना</label>
                                    <input
                                        name="house_owner_address"
                                        class="form-control @error('form.house_owner_address') is-invalid @enderror"
                                        type="text"
                                        id="house_owner_address"
                                        placeholder="ठेगाना"
                                        wire:model="form.house_owner_address"
                                    />
                                    @error('form.house_owner_address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="house_owner_monthly_rent" class="form-label">मासिक भाडा रु</label>
                                    <input
                                        name="house_owner_address"
                                        class="form-control @error('form.house_owner_monthly_rent') is-invalid @enderror"
                                        type="text"
                                        id="house_owner_monthly_rent"
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
                    <div class="address">
                        <fieldset>
                            <legend class="title">फर्म / कम्पनी/ब्यबसाय को ठेगाना</legend>
                            <div class="row mt-3">
                                <div class="col-md-4 mb-3">
                                    <label for="province_id" class="form-label"> प्रदेश </label>
                                    <select class="form-select @error('form.province_id') is-invalid @enderror"
                                            id="province_id"
                                            wire:model="form.province_id">
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
                                    <label for="district_id" class="form-label">जिल्ला</label>
                                    <select class="form-select @error('form.district_id') is-invalid @enderror"
                                            id="district_id"
                                            wire:model="form.district_id">
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
                                    <label for="local_body_id" class="form-label">पालिका</label>
                                    <select class="form-select @error('form.local_body_id') is-invalid @enderror"
                                            id="local_body_id"
                                            wire:model="form.local_body_id">
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
                                    <label for="ward_no" class="form-label">वार्ड</label>
                                    <select class="form-select @error('form.ward_no') is-invalid @enderror"
                                            id="ward_no"
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
                                    <label for="way" class="form-label">मार्ग</label>
                                    <input
                                        name="way"
                                        class="form-control @error('form.way') is-invalid @enderror"
                                        type="text"
                                        id="way"
                                        placeholder="मार्ग"
                                        wire:model="form.way"
                                    />
                                    @error('form.way')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tole" class="form-label">गाउ/टोल</label>
                                    <input
                                        name="tole"
                                        class="form-control @error('form.tole') is-invalid @enderror"
                                        type="text"
                                        id="tole"
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
                    <div class="mt-2">
                        <button type="button" wire:click.prevent="backStep(1)" class="btn btn-primary">Pri</button>
                    </div>
                    <div class="mt-2">
                        <button type="button" wire:click.prevent="nextStep(3)" class="btn btn-primary">Next</button>
                    </div>
                    @break
                @default
                    <fieldset>
                        <legend class="title">प्रोपाईटरको विवरण</legend>
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
                                <label for="house_no" class="form-label">घर  नम्बर</label>
                                <input
                                    name="house_no"
                                    class="form-control @error('form.house_no') is-invalid @enderror"
                                    type="text"
                                    id="house_no"
                                    placeholder="घर  नम्बर"
                                    wire:model="form.house_no"
                                />
                                @error('form.house_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="account_no" class="form-label"> व्यक्तिगत स्थाई लेखा नम्बर</label>
                                <input
                                    name="house_no"
                                    class="form-control @error('form.account_no') is-invalid @enderror"
                                    type="text"
                                    id="account_no"
                                    placeholder="व्यक्तिगत स्थाई लेखा नम्बर"
                                    wire:model="form.account_no"
                                />
                                @error('form.account_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="national_card_no" class="form-label">राष्ट्रियता परिचयपत्र नम्बर</label>
                                <input
                                    name="national_card_no"
                                    class="form-control @error('form.national_card_no') is-invalid @enderror"
                                    type="text"
                                    id="national_card_no"
                                    placeholder="राष्ट्रियता परिचयपत्र नम्बर"
                                    wire:model="form.national_card_no"
                                />
                                @error('form.national_card_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="education_qualification" class="form-label">शैक्षिक योग्यता</label>
                                <input
                                    name="education_qualification"
                                    class="form-control @error('form.education_qualification') is-invalid @enderror"
                                    type="text"
                                    id="education_qualification"
                                    placeholder="शैक्षिक योग्यता"
                                    wire:model="form.education_qualification"
                                />
                                @error('form.education_qualification')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="occupation" class="form-label">मुखय पेशा</label>
                                <input
                                    name="occupation"
                                    class="form-control @error('form.occupation') is-invalid @enderror"
                                    type="text"
                                    id="occupation"
                                    placeholder="मुखय पेशा"
                                    wire:model="form.occupation"
                                />
                                @error('form.occupation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="citizenship_no" class="form-label">नागरिकता नम्बर: </label>
                                <input
                                    name="citizenship_no"
                                    class="form-control @error('form.citizenship_no') is-invalid @enderror"
                                    type="text"
                                    id="citizenship_no"
                                    placeholder="नागरिकता नम्बर"
                                    wire:model="form.citizenship_no"
                                />
                                @error('form.citizenship_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="issue_date" class="form-label">जारी मिति:</label>
                                <input
                                    name="issue_date"
                                    class="form-control @error('form.issue_date') is-invalid @enderror"
                                    type="text"
                                    id="issue_date"
                                    placeholder="जारी मिति"
                                    wire:model="form.issue_date"
                                />
                                @error('form.issue_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form.issue_district_id" class="form-label"> जारी जिल्ला</label>
                                <select class="form-select @error('form.issue_district_id') is-invalid @enderror"
                                        id="form.issue_district_id"
                                        wire:model="form.issue_district_id">
                                    <option value="">---जारि जिल्ला ----</option>
                                    @foreach($all_districts as $all_district)
                                        <option value="{{$all_district->id}}">{{$all_district->district}}</option>
                                    @endforeach
                                </select>
                                @error('form.issue_district_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="address">
                        <fieldset>
                            <legend class="title">ठेगाना</legend>
                            <div class="row mt-3">
                                <div class="col-md-4 mb-3">
                                    <label for="province_id" class="form-label"> प्रदेश </label>
                                    <select class="form-select @error('form.province_id') is-invalid @enderror"
                                            id="province_id"
                                            wire:model="form.province_id">
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
                                    <label for="district_id" class="form-label">जिल्ला</label>
                                    <select class="form-select @error('form.district_id') is-invalid @enderror"
                                            id="district_id"
                                            wire:model="form.district_id">
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
                                    <label for="local_body_id" class="form-label">पालिका</label>
                                    <select class="form-select @error('form.local_body_id') is-invalid @enderror"
                                            id="local_body_id"
                                            wire:model="form.local_body_id">
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
                                    <label for="ward_no" class="form-label">वार्ड</label>
                                    <select class="form-select @error('form.ward_no') is-invalid @enderror"
                                            id="ward_no"
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
                                    <label for="way" class="form-label">मार्ग</label>
                                    <input
                                        name="way"
                                        class="form-control @error('form.way') is-invalid @enderror"
                                        type="text"
                                        id="way"
                                        placeholder="मार्ग"
                                        wire:model="form.way"
                                    />
                                    @error('form.way')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tole" class="form-label">गाउ/टोल</label>
                                    <input
                                        name="tole"
                                        class="form-control @error('form.tole') is-invalid @enderror"
                                        type="text"
                                        id="tole"
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
                    <div class="row mt-3">
                        <h2>तिन पुस्ते बिवरण</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>नाता</th>
                                <th>नाम, थर</th>
                                <th>नाम, थर(English)</th>
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
                                        <input type="text" placeholder="नाम थर (English)"
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
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <button type="button" wire:click.prevent="nextStep(2)" class="btn btn-primary">Next</button>
                    </div>
            @endswitch
        </form>
    </div>
</div>



