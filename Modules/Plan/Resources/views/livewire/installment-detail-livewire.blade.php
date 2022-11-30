<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="header-title">५. उपभोक्ता समिति समुदायमा अधारित संस्था गैरसरकारी संस्थाले प्राप्त गर्ने किस्ता
            विवरण:</h4>
        <button type="button" wire:click="openCreateModal" class="btn btn-xs btn-outline-primary">
            <i class="fa fa-plus-circle"> नयाँ थप्नुहोस्</i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th>किस्ताको क्रम</th>
                    <th>मिति</th>
                    <th>किस्ताको रकम</th>
                    <th>निर्माण समाग्री परिमाण</th>
                    <th>कैफियत</th>
                    <th> #</th>
                </tr>
                </thead>
                <tbody>
                @forelse($project->projectInstallmentDetails as $key=>$installmentDetail)
                    <tr>
                        <td>{{$installmentDetail->installment_type->label()}}</td>
                        <td>{{$installmentDetail->date}}</td>
                        <td>{{$installmentDetail->amount}}</td>
                        <td>{{$installmentDetail->construction_material_quantity}}</td>
                        <td>{{$installmentDetail->remarks}}</td>
                        <td>
                            <button type="button" wire:click="deleteInstallmentDetail({{$installmentDetail->id}})"
                                    class="btn btn-xs btn-outline-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
                            तालिकामा कुनै डाटा उपलब्ध छैन !!!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="modal fade show {{!$createModalOpened ? 'd-none' : ''}}" id="bs-example-modal-lg" tabindex="-1"
             aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog"
             style="display: block;backdrop-filter: brightness(50%);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-light" id="myLargeModalLabel">
                            किस्ताको विवरण उल्लेख गर्नुहोस्।
                        </h4>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="submitFormData">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="installment_type" class="form-label">किस्ताको क्रम *</label>
                                    <select
                                        wire:model="form.installment_type"
                                        id="installment_type"
                                        class="form-select">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach(\Modules\Plan\Enums\InstallmentTypeEnum::cases() as $installmentType)
                                            <option
                                                value="{{$installmentType->value}}">
                                                {{$installmentType->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('form.installment_type')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="date" class="form-label"> मिति </label>
                                    <input
                                        type="text"
                                        wire:model="form.date"
                                        class="form-control @error('form.date') is-invalid @enderror"
                                        id="date"
                                        placeholder="मिति"
                                    />
                                    @error('form.date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="amount" class="form-label"> किस्ताको रकम * </label>
                                    <input
                                        type="number"
                                        wire:model="form.amount"
                                        class="form-control @error('form.amount') is-invalid @enderror"
                                        id="amount"
                                        placeholder="किस्ताको रकम"
                                    />
                                    @error('form.amount')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="construction_material_quantity" class="form-label"> निर्माण समाग्री
                                        परिमाण </label>
                                    <input
                                        type="text"
                                        wire:model="form.construction_material_quantity"
                                        class="form-control @error('form.construction_material_quantity') is-invalid @enderror"
                                        id="construction_material_quantity"
                                        placeholder="निर्माण समाग्री परिमाण"
                                    />
                                    @error('form.construction_material_quantity')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="remarks" class="form-label">कैफियत</label>
                                    <textarea
                                        wire:model="form.remarks"
                                        id="remarks"
                                        class="form-control @error('form.remarks') is-invalid @enderror"
                                        placeholder="कैफियत"
                                        cols="30" rows="2"></textarea>
                                    @error('form.remarks')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="button" wire:click="closeModal" class="btn btn-danger">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
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
                $("#date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    container: '#bs-example-modal-lg',
                    onChange: function () {
                        let inputFieldDate = $("#date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);

                        Livewire.emit('dateChanged', inputFieldDate, formattedDate);
                    }
                });
            });
        </script>
    @endpush
@endonce
