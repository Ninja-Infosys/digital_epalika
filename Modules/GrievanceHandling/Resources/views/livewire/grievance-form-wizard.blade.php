<div class="card">
    <div class="card-body">
        <div class="text-center">
            <!-- progressbar -->
            <ul class="progressbar">
                <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">पहिलो चरण </a></li>
                <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">दोस्रो चरण </a></li>
                <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-3" type="button" disabled="disabled">अन्तिम
                        चरण </a></li>
            </ul>
        </div>
        <form wire:submit.prevent="submitForm">
            @switch($currentStep)
                @case(2)
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <h5>
                                <label for="complaint_severity" class="form-label">
                                    के तपाईंलाई यो गुनासोको पासवर्ड चाहिन्छ ? *
                                </label>
                            </h5>
                            <p>
                                (यदि तपाईको गुनासोको नतिजा/स्थिती अझ सुरक्षित राख्नुछ भने मात्र)
                            </p>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           wire:model="is_password"
                                           value="1"
                                           name="is_password"
                                           id="is_password1">
                                    <label class="form-check-label"
                                           for="is_password1">चाहिन्छ &nbsp;</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           wire:model="is_password"
                                           value="0"
                                           id="is_password2">
                                    <label class="form-check-label"
                                           for="is_password2">चाहिदैन &nbsp;</label>
                                </div>
                            </div>
                        </div>
                        @if($is_password)
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" wire:model="form.password" class="form-control"
                                       placeholder="Password">
                                @error('form.password')
                                <div class="text-danger p-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" wire:model="form.password_confirmation"
                                       class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                       placeholder="Confirm Password">
                            </div>
                        @endif
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="is_open" class="form-label">
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
                                           wire:model="form.is_open"
                                           value="1"
                                           id="is_open1">
                                    <label class="form-check-label"
                                           for="is_open1">हुन्छ | &nbsp;</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio"
                                           class="form-check-input"
                                           name="is_open"
                                           wire:model="form.is_open"
                                           value="0"
                                           id="is_open">
                                    <label class="form-check-label"
                                           for="is_open">हुदैन | &nbsp;</label>
                                </div>
                            </div>
                            @error('form.is_open')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">पुरा नाम *</label>
                            <input type="text" wire:model="form.name" class="form-control" id="name"
                                   placeholder="पुरा नाम">
                            @error('form.name')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">इमेल *</label>
                            <input type="text" wire:model="form.email" class="form-control" id="email"
                                   placeholder="इमेल">
                            @error('form.email')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                            <input type="text" wire:model="form.phone" class="form-control" id="phone"
                                   placeholder="सम्पर्क नम्बर ">
                            @error('form.phone')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">ठेगाना *</label>
                            <input type="text" wire:model="form.address" class="form-control" id="address"
                                   placeholder="ठेगाना">
                            @error('form.address')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="text-end">
                            <button type="button" wire:click.prevent="backStep(1)" class="btn btn-primary">
                                पहिले
                            </button>
                            <button type="button" wire:click.prevent="nextStep(3)" class="btn btn-primary">
                                अर्को
                            </button>
                        </div>
                    </div>
                    @break
                @case(3)
                    <h5>तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस् । </h5>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>गुनासोको प्रकार:</th>
                            <td>{{$grievanceType->title}}</td>
                        </tr>
                        <tr>
                            <th>बिषय</th>
                            <td>{{$form['subject']}}</td>
                        </tr>
                        <tr>
                            <th>गुनासो पठाउन चाहाने कार्यालय</th>
                            <td>{{$grievanceOffice->title}}</td>
                        </tr>
                        <tr>
                            <th>गुनासो गम्भीरता</th>
                            <td>
                                @switch($form['complaint_severity'])
                                    @case('Simple')
                                        साधारण
                                        @break
                                    @case('Priority')
                                        प्राथमिकता
                                        @break
                                    @default
                                        उच्च प्राथमिकता
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <th>के तपाईं आफ्नो विवरण खुलाउन चाहनुहुन्छ</th>
                            <td>{{$form['is_open'] ? 'हुन्छ ' : 'हुदैन '}}</td>
                        </tr>
                        <tr>
                            <th>के तपाईले पासवोर्ड राख्नु भएको छ ?</th>
                            <td>{{$form['is_password'] ? 'छ ': 'छैन '}}</td>
                        </tr>
                        <tr>
                            <th> गुनासोको विवरण</th>
                            <td>{{$form['description']}}</td>
                        </tr>
                        <tr>
                            <th> पुरा नाम</th>
                            <td>{{$form['name']}}</td>
                        </tr>
                        <tr>
                            <th>इमेल</th>
                            <td>{{$form['email']}}</td>
                        </tr>
                        <tr>
                            <th>सम्पर्क नम्बर</th>
                            <td>{{$form['phone']}}</td>
                        </tr>
                        <tr>
                            <th>ठेगाना</th>
                            <td>{{$form['address']}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <h5>गुनासो सम्बन्धी कागजपत्र</h5>
                    @if(!empty($form['files']))
                        <div class="row mb-4">
                            @foreach($form['files'] as $file)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{$file->temporaryUrl()}}"
                                                 style="width: 100%;height: auto;object-fit: contain"
                                                 alt="File">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @foreach($form['files'] as $file)

                        @endforeach
                    @endif
                    <div class="text-end">
                        <div class="text-end">
                            <button type="button" wire:click.prevent="backStep(2)" class="btn btn-primary">
                                पहिले
                            </button>
                            <button type="submit" class="btn btn-primary">
                                पेश गर्नुहोस्
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
                            <select name="grievance_type_id" wire:model="form.grievance_type_id"
                                    id="grievance_type_id"
                                    class="form-select">
                                <option value="">गुनासो प्रकार छान्नुहोस्</option>
                                @foreach($grievanceTypes as $grievanceType)
                                    <option value="{{$grievanceType->id}}">{{$grievanceType->title}}</option>
                                @endforeach
                            </select>
                            @error('form.grievance_type_id')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="subject" class="form-label">
                                    २. बिषय *
                                </label>
                            </h5>
                            <input type="text" class="form-control" id="subject" wire:model="form.subject"
                                   placeholder="बिषय">
                            @error('form.subject')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="description" class="form-label">
                                    ३. गुनासोको विवरण *
                                </label>
                            </h5>
                            <textarea name="description" wire:model="form.description" id="description"
                                      class="form-control"
                                      cols="30"
                                      rows="5" placeholder="गुनासोको विवरण"></textarea>
                            @error('form.description')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="files" class="form-label">
                                    ४. गुनासो सम्बन्धी कागजपत्र अथवा अन्य फाइल छ भने अपलोड गर्नुहोस्
                                </label>
                            </h5>
                            <p>(तपाईले कुनै पनि कागजात, फोटो, भिडियो 10 MB सम्मको साइजको अपलोड गर्न
                                सक्नुहुन्छ | )</p>
                            <input type="file" name="files[]" multiple wire:model="form.files" id="files"
                                   class="form-control">
                            @error('form.files')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                            @error('form.files.*')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="grievance_office_id" class="form-label">
                                    ५. गुनासो पठाउन चाहाने कार्यालय *
                                </label>
                            </h5>
                            <p>
                                (यदि तपाँइ लाई गुनासो सँग सम्बन्धित कार्यालय थाहा छ भने छनोट गर्नुहोस्,
                                अन्यथा हामी गुनासोको प्रकृति हेरेर सम्बन्धित कार्यालय मा पाठाउने छौं)
                            </p>
                            <select name="grievance_office_id" wire:model="form.grievance_office_id"
                                    id="grievance_office_id" class="form-select">
                                <option value=""> छान्नुहोस्</option>
                                @foreach($grievanceOffices as $grievanceOffice)
                                    <option value="{{$grievanceOffice->id}}">
                                        {{$grievanceOffice->title}}
                                    </option>
                                @endforeach
                            </select>
                            @error('form.grievance_office_id')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <h5>
                                <label for="complaint_severity" class="form-label">
                                    ६ . गुनासो गम्भीरता *
                                </label>
                            </h5>
                            <div class="d-flex">
                                @foreach(config('defaults.complaint_severity') as $key=>$severity)
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="complaint_severity"
                                               wire:model="form.complaint_severity"
                                               value="{{$severity}}"
                                               id="complaint_severity{{$severity}}">
                                        <label class="form-check-label"
                                               for="complaint_severity{{$severity}}">{{$key}} &nbsp;</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('form.complaint_severity')
                            <div class="text-danger p-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" wire:click.prevent="nextStep(2)" class="btn btn-primary text-end">
                            अर्को
                        </button>
                    </div>
            @endswitch
        </form>
    </div>
</div>
