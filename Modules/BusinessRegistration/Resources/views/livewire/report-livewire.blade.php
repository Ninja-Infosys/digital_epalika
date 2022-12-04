<div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता रिपोर्ट</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submitForm">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label for="from_date">देखि</label>
                                <input
                                    type="text"
                                    name="from_date"
                                    value="{{old('from_date')}}"
                                    wire:model="form.from_date"
                                    class="form-control nepali_date @error('from_date') is-invalid @enderror"
                                    id="from_date"
                                    placeholder="देखि "
                                />

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="to_date">सम्म</label>
                                <input
                                    type="text"
                                    name="to_date"
                                    wire:model="form.to_date"
                                    value="{{old('to_date')}}"
                                    class="form-control nepali_date @error('to_date') is-invalid @enderror"
                                    id="to_date"
                                    placeholder="सम्म "
                                />

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="fiscal_year">आर्थिक बर्ष</label>
                                <select name="fiscal_year" wire:model="form.fiscal_year" id="fiscal_year" class="form-control" >
                                    <option value=""> --आर्थिक बर्ष--</option>
                                    @foreach($fiscalYears as $fiscalYear)
                                        <option value="{{$fiscalYear->id}}">{{$fiscalYear->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="business_nature">व्यवसाय प्रकृति अनुसार</label>
                                <select name="business_nature" wire:model="form.business_nature" id="business_nature" class="form-control" >
                                    <option value=""> --व्यवसाय प्रकृति अनुसार--</option>
                                    @foreach(\Modules\BusinessRegistration\Enums\BusinessNature::cases() as $businessNature)
                                        <option value="{{$businessNature->value}}">{{$businessNature->label()}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="business_purpose">उदेश्य अनुसार</label>
                                <select name="business_purpose" wire:model="form.business_purpose" id="business_purpose" class="form-control" >
                                    <option value=""> --उदेश्य अनुसार--</option>
                                    @foreach($businessPurposes as $businessPurpose)
                                        <option value="{{$businessPurpose->id}}">{{$businessPurpose->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="object_transaction">कारोबार वस्तु अनुसार</label>
                                <select name="object_transaction" wire:model="form.object_transaction" id="object_transaction" class="form-control" >
                                    <option value=""> --कारोबार वस्तु--</option>
                                    @foreach($objectTransactions as $objectTransaction)
                                        <option value="{{$objectTransaction->id}}">{{$objectTransaction->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="investment_revenue">पुँजीगत लगानी र राजस्वो</label>
                                <select name="investment_revenue" id="investment_revenue" wire:model="form.investment_revenue" class="form-control" >
                                    <option value=""> --पुँजीगत लगानी र राजस्वो--</option>
                                    @foreach($investmentRevenues as $investmentRevenue)
                                        <option value="{{$investmentRevenue->id}}">{{$investmentRevenue->title}} ({{$investmentRevenue->registration_amount}})</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="registration_renewal">दर्ता र नविकरण अनुसार</label>
                                <select name="registration_renewal" id="registration_renewal" wire:model="form.registration_renewal" class="form-control" >
                                    <option value=""> --दर्ता र नविकरण अनुसार--</option>
                                    @foreach(\Modules\BusinessRegistration\Enums\BusinessTypeEnum::cases() as $businessTypeEnum)
                                        <option value="{{$businessTypeEnum->value}}">{{$businessTypeEnum->label()}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="investment">लगानी अनुसार</label>
                                <input type="text" name="investment" wire:model="form.investment" id="investment" class="form-control" placeholder="लगानी अनुसार">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="employment"> रोजगार संख्या </label>
                                <input type="text" name="employment" id="employment" wire:model="form.employment" class="form-control" placeholder=" रोजगार संख्या ">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="business_year"> व्यवसाय स्थापना साल अनुसार </label>
                                <input type="text" name="business_year" id="business_year" wire:model="form.business_year" class="form-control" placeholder=" व्यवसाय स्थापना साल अनुसार  ">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="introboard">परिचय पाटी अनुसार</label>
                                <input type="text" name="introboard" id="introboard" wire:model="form.introboard" class="form-control" placeholder=" व्यवसाय स्थापना साल   ">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >
                          Save
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> व्यवसाय दर्ता रिपोर्ट</h4>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fa fa-print"></i>
                            Print</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>दर्ता नं</th>
                                <th>दर्ता मिति.</th>
                                <th>व्यवसाय ठेगाना</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessDetails as $businessDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessDetail->proprietorDetail->name??''}}</td>
                                    <td>{{$businessDetail->registration_no??''}}</td>
                                    <td>{{$businessDetail->registration_date_en}}</td>
                                    <td><span>{{$businessDetail->localBody->local_body??''}}
                                - {{$businessDetail->ward_no??''}} </span></td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#from_date").nepaliDatePicker({
                        ndpYear: true,
                        ndpMonth: true,
                        onChange: function () {
                            let inputFieldDate = $("#from_date").val();
                            let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                            let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                            let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                            Livewire.emit('fromDateChanged', inputFieldDate, formattedDate);
                        }
                    });

                    $("#to_date").nepaliDatePicker({
                        ndpYear: true,
                        ndpMonth: true,
                        onChange: function () {
                            let inputFieldDate = $("#to_date").val();
                            let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                            let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                            let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                            Livewire.emit('toDateChanged', inputFieldDate, formattedDate);
                        }
                    });

                });
            </script>
        @endpush
    @endonce
</div>
