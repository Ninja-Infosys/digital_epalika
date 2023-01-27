<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4 class="header-title"> जेष्ठ नागरिक रिपोर्ट</h4>
            <div>
                <button class="btn btn-sm btn-info" onclick="printJS({
                            printable: 'printData',
                            targetStyles: ['*'],
                            ignoreElements:['ignore-header'],
                            type: 'html'
                            })">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-md-3">
                    <label for="fiscal_year">आर्थिक बर्ष</label>
                    <select id="fiscal_year" wire:model="fiscal_year" class="form-control">
                        <option>--छान्नुहोस्--</option>
                        @foreach($fiscalYears as $fiscalYear)
                            <option value="{{$fiscalYear->id}}">{{$fiscalYear->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="from_date">मिति देखी</label>
                    <input type="text" name="from_date" id="from_date" wire:model="from_date" placeholder="मिति देखी" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="to_date">मिति सम्म</label>
                    <input type="text" id="to_date" name="to_date" wire:model="to_date" placeholder="मिति सम्म" class="form-control">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @if(count($seniorCitizenReports) > 0)
        <div class="row mt-5">
            <div class="table-responsive">
                <table id="printData" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="align-middle">क्र सं</th>
                        <th class="align-middle">नाम</th>
                        <th class="align-middle">लिङ्ग</th>
                        <th class="align-middle">ठेगाना</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($seniorCitizenReports as $seniorCitizenReport)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$seniorCitizenReport->name}}</td>
                        <td>{{$seniorCitizenReport->gender?->label()??''}}</td>
                        <td>{{$seniorCitizenReport->localBody->local_body??''}},{{$seniorCitizenReport->district->district??''}},{{$seniorCitizenReport->province->province??''}}</td>

                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        @endif
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
