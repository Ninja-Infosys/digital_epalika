<div class="bg-light p-2 mt-3">
    <form wire:submit.prevent="save">
        <fieldset class="border p-2">
            <legend class="float-none w-auto">१. व्यक्तिगत विवरण</legend>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="name" class="form-label">पुरा नाम *</label>
                    <input type="text" wire:model="form.full_name"
                           class="form-control @error('form.full_name') is-invalid @enderror" id="name"
                           placeholder="पुरा नाम">
                    @error('form.full_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formFile" class="form-label">फोटो *</label>
                    <input wire:model="form.photo" class="form-control @error('form.photo') is-invalid @enderror"
                           type="file" id="formFile">
                    @error('form.photo')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="citizenship_no" class="form-label">नागरिता नं. * </label>
                    <input type="text" wire:model="form.citizenship_no"
                           class="form-control @error('form.citizenship_no') is-invalid @enderror" id="citizenship_no"
                           placeholder="नागरिता नं.">
                    @error('form.citizenship_no')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="phone" class="form-label">सम्पर्क न. * </label>
                    <input type="text" wire:model="form.phone_no"
                           class="form-control @error('form.phone_no') is-invalid @enderror" id="phone"
                           placeholder="सम्पर्क न.">
                    @error('form.phone_no')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="email_id" class="form-label">इमेल (उपलब्द भए) </label>
                    <input type="email" wire:model="form.email_id"
                           class="form-control @error('form.email_id') is-invalid @enderror" id="email_id"
                           placeholder="इमेल">
                    @error('form.email_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="qualification" class="form-label">शैक्षिक योग्यता * </label>
                    <input type="text" wire:model="form.qualification" class="form-control" id="qualification"
                           placeholder="शैक्षिक योग्यता">
                    @error('form.qualification')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="gender" class="form-label">लिङ्ग *</label>
                    <select wire:model="form.gender" class="form-select @error('form.gender') is-invalid @enderror"
                            id="gender">
                        <option value="">-- लिङ्ग --</option>
                        @foreach(\App\Enums\Gender::cases() as $key=>$gender)
                        <option value="{{$gender->value}}">{{$gender->label()}}</option>
                        @endforeach

                    </select>
                    @error('form.gender')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="ethnicity_id">जातीयता *</label>
                    <select wire:model="form.ethnicity_id"
                            class="form-select @error('form.ethnicity_id') is-invalid @enderror" id="ethnicity_id">
                        <option value="">-- जातीयता छान्नुहोस् --</option>
                        @foreach($ethnicities as $ethnicity)
                            <option value="{{$ethnicity->id}}">{{$ethnicity->title}}</option>
                        @endforeach
                    </select>
                    @error('form.ethnicity_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="current_profession" class="form-label">हालको व्यवसाय </label>
                    <input type="text" wire:model="form.current_profession"
                           class="form-control @error('form.current_profession') is-invalid @enderror"
                           id="current_profession"
                           placeholder="हालको व्यवसाय">
                    @error('form.current_profession')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </fieldset>
        <fieldset class="border p-2 mt-2">
            <legend class="float-none w-auto">२. हालको ठेगाना</legend>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="province_id" class="form-label">प्रदेश *</label>
                    <select wire:model="form.province_id"
                            class="form-select @error('form.province_id') is-invalid @enderror" id="province_id">
                        <option value="">-- प्रदेश छान्नुहोस्--</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->province}}</option>
                        @endforeach
                    </select>
                    @error('form.province_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="district_id" class="form-label">जिल्ला *</label>
                    <select wire:model="form.district_id"
                            class="form-select @error('form.district_id') is-invalid @enderror" id="district_id">
                        <option value="">-- जिल्ला छान्नुहोस्--</option>
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                        @endforeach
                    </select>
                    @error('form.district_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="local_body_id" class="form-label">पालिका *</label>
                    <select wire:model="form.local_body_id"
                            class="form-select @error('form.local_body_id') is-invalid @enderror"
                            id="local_body_id">
                        <option value="">-- पालिका छान्नुहोस्--</option>
                        @foreach($localBodies as $localBody)
                            <option value="{{$localBody->id}}">{{$localBody->local_body}}</option>
                        @endforeach
                    </select>
                    @error('form.local_body_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="ward_no" class="form-label">वडा नं. *</label>
                    <select wire:model="form.ward_no"
                            class="form-select @error('form.ward_no') is-invalid @enderror" id="ward_no">
                        <option value="">-- वडा छान्नुहोस्--</option>
                        @foreach($wards as $ward)
                            <option value="{{$ward}}">{{$ward}}</option>
                        @endforeach
                    </select>
                    @error('form.ward_no')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="tole" class="form-label @error('form.tole') is-invalid @enderror">टोल</label>
                    <input type="text" wire:model="form.tole" class="form-control" id="tole" placeholder="टोल">
                    @error('form.tole')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </fieldset>
        <fieldset class="border p-2 mt-2">
            <legend class="float-none w-auto">३. आवश्यक पर्ने कागजात हरु</legend>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label" id="application_form">आवेदन फारम *</label>
                    <input wire:model="form.application_form"
                           class="form-control @error('form.application_form') is-invalid @enderror" type="file"
                           id="application_form">
                    @error('form.application_form')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="ward_recommendation">वडाको सिफारिस *</label>
                    <input wire:model="form.ward_recommendation"
                           class="form-control @error('form.ward_recommendation') is-invalid @enderror" type="file"
                           id="ward_recommendation">
                    @error('form.ward_recommendation')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="mark_sheet">मार्क सिट</label>
                    <input wire:model="form.mark_sheet"
                           class="form-control @error('form.mark_sheet') is-invalid @enderror" type="file"
                           id="mark_sheet">
                    @error('form.mark_sheet')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="citizenship_front">नागरीकता (अगाडी) *</label>
                    <input wire:model="form.citizenship_front"
                           class="form-control @error('form.citizenship_front') is-invalid @enderror" type="file"
                           id="citizenship_front">
                    @error('form.citizenship_front')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="citizenship_back" class="form-label">नागरीकता (पछाडी) </label>
                    <input wire:model="form.citizenship_back"
                           class="form-control @error('form.citizenship_back') is-invalid @enderror" type="file"
                           id="citizenship_back">
                    @error('form.citizenship_back')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="passport" class="form-label">पासपोर्ट (वैदेशिक रोजगारबाट फर्केको हकमा)</label>
                    <input wire:model="form.passport" class="form-control @error('form.passport') is-invalid @enderror"
                           type="file" id="passport">
                    @error('form.passport')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </fieldset>
        @if(empty($trainee))
            <div class="col-md-6 mt-3">
                <div class="alert alert-info" role="alert">
                    <p>नोट: सहभागी छनौटको मापदण्ड :</p>
                    <ul>
                        <li>उमेर २५-५० बर्षका आवेदन कृषकहरुलाई प्राथमिकता दिइन्छ |</li>
                        <li>शिक्षित् किसानलाई प्राथमिकता दिइन्छ |</li>
                        <li>बैदेशिक रोजगारलाई फर्किएका युवा/युबतिहरुलाई बिशेष प्राथमिकता दिइन्छ |</li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
