<div class="card">
    <div class="card-body">
        <div class="text-center">
            <!-- progressbar -->
            {{--            <ul class="progressbar">--}}
            {{--                <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">पहिलो चरण </a></li>--}}
            {{--                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">दोस्रो चरण </a></li>--}}
            {{--                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-3" type="button">तेस्रो चरण </a></li>--}}
            {{--                <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-4" type="button" disabled="disabled">अन्तिम--}}
            {{--                        चरण </a></li>--}}
            {{--            </ul>--}}
        </div>

        <form wire:submit.prevent="save">
            @csrf
            <fieldset>
                <legend class="title">प्रोपाईटरको विवरण</legend>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="first_name" class="form-label">व्यवसायी नाम:</label>
                        <input
                            name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror"
                            type="text"
                            id="first_name"
                            placeholder="व्यवसायी नाम"
                            wire:model="first_name"
                        />
                        @error('first_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
             
                    <div class="col-md-4 mb-3">
                        <label for="gender" class="form-label">लिङ्ग</label>
                        <select
                            class="form-select @error('gender') is-invalid @enderror"
                            wire:model="gender"
                            id="gender">
                            <option value="">--- लिङ्ग छान्नुहोस् ---</option>
                            <option value="Male">पूरुष</option>
                            <option value="Female">महिला</option>
                            <option value="Other">अन्य</option>
                        </select>
                        @error('.gender')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phone" class="form-label">सम्पर्क न:</label>
                        <input
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            type="text"
                            id="phone"
                            placeholder="98********"
                            wire:model="phone"
                        />
                        @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">इमेल:</label>
                        <input
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            type="text"
                            id="email"
                            placeholder="इमेल"
                            wire:model="email"
                        />
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="house_no" class="form-label">घर स्थाई लेखा नम्बर</label>
                        <input
                            name="house_no"
                            class="form-control @error('house_no') is-invalid @enderror"
                            type="text"
                            id="house_no"
                            placeholder="घर स्थाई लेखा नम्बर"
                            wire:model="house_no"
                        />
                        @error('house_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="national_card_no" class="form-label">राष्ट्रियता परिचयपत्र नम्बर</label>
                        <input
                            name="national_card_no"
                            class="form-control @error('national_card_no') is-invalid @enderror"
                            type="text"
                            id="national_card_no"
                            placeholder="राष्ट्रियता परिचयपत्र नम्बर"
                            wire:model="national_card_no"
                        />
                        @error('national_card_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="education_qualification" class="form-label">शैक्षिक योग्यता</label>
                        <input
                            name="education_qualification"
                            class="form-control @error('education_qualification') is-invalid @enderror"
                            type="text"
                            id="education_qualification"
                            placeholder="शैक्षिक योग्यता"
                            wire:model="education_qualification"
                        />
                        @error('education_qualification')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="occupation" class="form-label">मुखय पेशा</label>
                        <input
                            name="occupation"
                            class="form-control @error('occupation') is-invalid @enderror"
                            type="text"
                            id="occupation"
                            placeholder="मुखय पेशा"
                            wire:model="occupation"
                        />
                        @error('occupation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="citizenship_no" class="form-label">नागरिकता नम्बर: </label>
                        <input
                            name="citizenship_no"
                            class="form-control @error('citizenship_no') is-invalid @enderror"
                            type="text"
                            id="citizenship_no"
                            placeholder="नागरिकता नम्बर"
                            wire:model="citizenship_no"
                        />
                        @error('citizenship_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="issue_date" class="form-label">जारी मिति:</label>
                        <input
                            name="issue_date"
                            class="form-control @error('issue_date') is-invalid @enderror"
                            type="text"
                            id="issue_date"
                            placeholder="जारी मिति"
                            wire:model="issue_date"
                        />
                        @error('issue_date')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="issue_district" class="form-label">जारी जिल्ला</label>
                        <select class="form-select @error('issue_district') is-invalid @enderror"
                                id="issue_district"
                                wire:model="issue_district">
                            <option value="">---जारि जिल्ला ----</option>
                        </select>
                        @error('issue_district')
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
                                <select class="form-select @error('province_id') is-invalid @enderror"
                                        id="province_id"
                                        wire:model="province_id">
                                    <option value="">--- प्रदेश छान्नुहोस्---</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="district_id" class="form-label">जिल्ला</label>
                                <select class="form-select @error('district_id') is-invalid @enderror"
                                        id="district_id"
                                        wire:model="district_id">
                                    <option value="">--- जिल्ला छान्नुहोस्----</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}">
                                            {{$district->district}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="local_body_id" class="form-label">पालिका</label>
                                <select class="form-select @error('local_body_id') is-invalid @enderror"
                                        id="local_body_id"
                                        wire:model="local_body_id">
                                    <option value="">--- पालिका छान्नुहोस्----</option>
                                    @foreach($localBodies as $localBody)
                                        <option value="{{$localBody->id}}">
                                            {{$localBody->local_body}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('local_body_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="ward_no" class="form-label">वार्ड</label>
                                <select class="form-select @error('ward_no') is-invalid @enderror"
                                        id="ward_no"
                                        wire:model="ward_no">
                                    <option value="">--- वार्ड छान्नुहोस्----</option>
                                    @for($i=1;$i<=$wards;$i++)
                                        <option value="{{$i}}">
                                            {{$i}}
                                        </option>
                                    @endfor
                                </select>
                                @error('ward_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="way" class="form-label">मार्ग</label>
                                <input
                                    name="way"
                                    class="form-control @error('way') is-invalid @enderror"
                                    type="text"
                                    id="way"
                                    placeholder="मार्ग"
                                    wire:model="way"
                                /> @error('way')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tole" class="form-label">गाउ/टोल</label>
                                <input
                                    name="tole"
                                    class="form-control @error('tole') is-invalid @enderror"
                                    type="text"
                                    id="tole"
                                    placeholder="गाउ/टोल"
                                    wire:model="tole"
                                />
                                @error('tole')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </fieldset>
                </div>

                <div class="row mt-3">
                    <h2>सुचनाहरु</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>नाम</th>
                            <th>नाम, थर</th>
                            <th>नागरिकता न</th>
                            <th>सम्पर्क न</th>
                            <th>Add</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notices as $notice)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                                                <td>
                                    <button class="btn btn-download btn-light">
                                        <a href="#"><i class="fa-solid fa-plus"></i></a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-around mt-2">
                    <button type="button" class="btn btn-warning text-white">Back
                    </button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>

            
        </form>
    </div>
</div>
