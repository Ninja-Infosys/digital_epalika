<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="header-title">
            ६. पेश्की विवरण
        </h4>
        <button type="button" wire:click="create" class="btn btn-xs btn-outline-primary">
            <i class="fa fa-plus-circle"> नयाँ थप्नुहोस्</i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th>क्र.सं.</th>
                    <th>पेश्की रकम</th>
                    <th> पेस्की दिएको मिति </th>
                </tr>
                </thead>
                <tbody>
                @forelse($project->projectBills as $key=>$projectBill)
                    <tr>
                        <td>{{$projectBill->amount}}</td>
                        <td>{{$projectBill->bill_date}}</td>
                        <td>
                            <button type="button" wire:click="edit({{$projectBill->id}})"
                                    class="btn btn-xs btn-outline-primary">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" wire:click="deleteProjectBill({{$projectBill->id}})"
                                    class="btn btn-xs btn-outline-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">
                            तालिकामा कुनै डाटा उपलब्ध छैन !!!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="modal fade show {{!$createModalOpened ? 'd-none' : ''}}" id="project-bill-modal" tabindex="-1"
             aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog"
             style="display: block;backdrop-filter: brightness(50%);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-light" id="myLargeModalLabel">
                            पेश्की विवरण थप्नुहोस्
                        </h4>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="amount" class="form-label"> पेश्की रकम * </label>
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
                                    <label for="bill_date" class="form-label"> पेस्की दिएको मिति * </label>
                                    <input
                                        type="text"
                                        wire:model="form.bill_date"
                                        class="form-control @error('form.bill_date') is-invalid @enderror"
                                        id="bill_date"
                                        placeholder="पेस्की दिएको मिति"
                                    />
                                    @error('form.bill_date')
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
        <div class="modal fade show {{!$editModalOpened ? 'd-none' : ''}}" id="project-bill-modal" tabindex="-1"
             aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog"
             style="display: block;backdrop-filter: brightness(50%);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-light" id="myLargeModalLabel">
                            पेश्की विवरण सम्पादन गर्नुहोस्
                        </h4>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="amount" class="form-label"> पेश्की रकम * </label>
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
                                    <label for="bill_date" class="form-label"> पेस्की दिएको मिति * </label>
                                    <input
                                        type="text"
                                        wire:model="form.bill_date"
                                        class="form-control @error('form.bill_date') is-invalid @enderror"
                                        id="bill_date"
                                        placeholder="पेस्की दिएको मिति"
                                    />
                                    @error('form.bill_date')
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
                $("#bill_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    container: '#project-bill-modal',
                    onChange: function () {
                        let inputFieldDate = $("#bill_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);

                        Livewire.emit('billDateChanged', inputFieldDate, formattedDate);
                    }
                });
            });
        </script>
    @endpush
@endonce
