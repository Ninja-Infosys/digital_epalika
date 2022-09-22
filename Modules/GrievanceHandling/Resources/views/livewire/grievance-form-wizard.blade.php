<div class="card">
    <div class="card-body">
        <div class="text-center">
            <!-- progressbar -->
            <ul class="progressbar">
                <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">Step 1</a></li>
                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">Step 2</a></li>
                <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-3" type="button" disabled="disabled">Step
                        3</a></li>
            </ul>
        </div>
        <form action="">
            @switch($currentStep)
                @case(2)
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="grievance_type_id" class="form-label">
                                    के तपाईं आफ्नो विवरण खुलाउन चाहनुहुन्छ ?
                                </label>
                            </h5>
                            <p>
                                (यस् गुनासो/उजुरी सम्बन्धी कुनै जानकारी दिन परेमा यो विवरण चाहिने छ, तपाईंको विवरण हामी
                                गोप्य राख्ने छौं र सम्बन्धित अधिकारीहरुले मात्र हेर्न पाउने छन्।)
                            </p>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           name="is_open"
                                           value="1"
                                           id="is_open1">
                                    <label class="form-check-label"
                                           for="is_open1">हुन्छ | &nbsp;</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           name="is_open"
                                           value="1"
                                           id="is_open">
                                    <label class="form-check-label"
                                           for="is_open">हुदैन | &nbsp;</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">पुरा नाम *</label>
                            <input type="text" class="form-control" id="name" placeholder="पुरा नाम">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">इमेल *</label>
                            <input type="text" class="form-control" id="email" placeholder="इमेल">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                            <input type="text" class="form-control" id="phone" placeholder="सम्पर्क नम्बर ">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">ठेगाना *</label>
                            <input type="text" class="form-control" id="address" placeholder="ठेगाना">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="text-end">
                            <button type="button" wire:click.prevent="backStep(1)" class="btn btn-primary">
                                Previous
                            </button>
                            <button type="button" wire:click.prevent="secondStepSubmit" class="btn btn-primary">
                                Next
                            </button>
                        </div>
                    </div>
                    @break
                @case(3)
                    <h5>तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस् । </h5>
                    <table class="table table-bordered table-sm">
                        <tbody>
                        <tr>
                            <th>गुनासोको प्रकार:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th> गुनासोको विवरण</th>
                            <td>{{$firstStepForm['description']}}</td>
                        </tr>
                        <tr>
                            <th> पुरा नाम</th>
                            <td>{{$firstStepForm['description']}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <div class="text-end">
                            <button type="button" wire:click.prevent="backStep(2)" class="btn btn-primary">
                                Previous
                            </button>
                            <button type="button" wire:click.prevent="submitForm" class="btn btn-primary">
                                Next
                            </button>
                        </div>
                    </div>
                    @break
                @default
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="grievance_type_id" class="form-label">
                                    १. गुनासोको प्रकार *
                                </label>
                            </h5>
                            <select name="grievance_type_id" wire:model="firstStepForm.grievance_type_id"
                                    id="grievance_type_id"
                                    class="form-select">
                                <option value="">गुनासो प्रकार छान्नुहोस्</option>
                                @foreach($grievanceTypes as $grievanceType)
                                    <option value="{{$grievanceType->id}}">{{$grievanceType->title}}</option>
                                @endforeach
                            </select>
                            @error('firstStepForm.grievance_type_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="description" class="form-label">
                                    २. गुनासोको विवरण *
                                </label>
                            </h5>
                            <textarea name="description" wire:model="firstStepForm.description" id="description"
                                      class="form-control"
                                      cols="30"
                                      rows="5" placeholder="गुनासोको विवरण"></textarea>
                            @error('firstStepForm.description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="files" class="form-label">
                                    ३. गुनासो सम्बन्धी कागजपत्र अथवा अन्य फाइल छ भने अपलोड गर्नुहोस् *
                                </label>
                            </h5>
                            <p>(तपाईले कुनै पनि कागजात, फोटो, भिडियो 10 MB सम्मको साइजको अपलोड गर्न
                                सक्नुहुन्छ | )</p>
                            <input type="file" name="files[]" id="files" class="form-control">
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="grievance_office_id" class="form-label">
                                    ४. गुनासो पठाउन चाहाने कार्यालय *
                                </label>
                            </h5>
                            <p>
                                (यदि तपाँइ लाई गुनासो सँग सम्बन्धित कार्यालय थाहा छ भने छनोट गर्नुहोस्,
                                अन्यथा हामी गुनासोको प्रकृति हेरेर सम्बन्धित कार्यालय मा पाठाउने छौं)
                            </p>
                            <select name="grievance_office_id" id="grievance_office_id" class="form-select">
                                <option value=""> छान्नुहोस्</option>
                            </select>
                            @error('grievance_office_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="complaint_severity" class="form-label">
                                    ५. गुनासो गम्भीरता *
                                </label>
                            </h5>
                            <div class="d-flex">
                                @foreach(config('defaults.complaint_severity') as $key=>$severity)
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="complaint_severity"
                                               value="{{$severity}}"
                                               id="complaint_severity{{$severity}}">
                                        <label class="form-check-label"
                                               for="complaint_severity{{$severity}}">{{$key}} &nbsp;</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('complaint_severity')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="complaint_severity" class="form-label">
                                    ६. के तपाईंलाई यो गुनासोको पासवर्ड चाहिन्छ ? *
                                </label>
                            </h5>
                            <p>
                                (यदि तपाईको गुनासोको नतिजा/स्थिती अझ सुरक्षित राख्नुछ भने मात्र)
                            </p>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           name="is_password"
                                           value="1"
                                           id="is_password1">
                                    <label class="form-check-label"
                                           for="is_password1">चाहिन्छ &nbsp;</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           name="is_password"
                                           value="1"
                                           id="is_password2">
                                    <label class="form-check-label"
                                           for="is_password2">चाहिदैन &nbsp;</label>
                                </div>
                            </div>

                            @error('is_password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" wire:click.prevent="firstStepSubmit" class="btn btn-primary text-end">
                            Next
                        </button>
                    </div>
            @endswitch
        </form>
    </div>
</div>
