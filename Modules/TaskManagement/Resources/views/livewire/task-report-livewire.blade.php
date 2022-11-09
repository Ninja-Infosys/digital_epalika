<div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="p-1 border mt-1">
                        <div class="row">
                            <div class="col-md-3 mb-1">
                                <label>मिति</label>
                                <div class="input-group">
                                    <input type="text"
                                           wire:model="form.from_date" class="form-control" id="from_date"
                                           placeholder="मिति देखि">
                                    <input type="text"
                                           wire:model="form.to_date" class="form-control" id="to_date"
                                           placeholder="मिति सम्म">
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="branch_id" class="form-label">शाखा</label>
                                @foreach($branches as $branch)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               wire:model="form.branch_id"
                                               value="{{$branch->id}}"
                                               class="form-check-input"
                                               id="branch_id-{{$branch->id}}">
                                        <label class="form-check-label"
                                               for="branch_id-{{$branch->id}}">{{$branch->branch_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="branch_id" class="form-label">शाखाहरु अनुसार कार्यहरू</label>
                                @foreach($taskCategories as $taskCategory)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               wire:model="form.task_category_id"
                                               value="{{$taskCategory->id}}"
                                               class="form-check-input"
                                               id="{{$taskCategory->id}}">
                                        <label class="form-check-label"
                                               for="{{$taskCategory->id}}">{{$taskCategory->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="task_division_id" class="form-label">कार्य विभाजन</label>
                                @foreach($taskDivisions as $taskDivision)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               wire:model="form.task_division_id"
                                               value="{{$taskDivision->id}}"
                                               class="form-check-input"
                                               id="task_division_id-{{$taskDivision->id}}">
                                        <label class="form-check-label"
                                               for="task_division_id-{{$taskDivision->id}}">{{$taskDivision->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-3">
                        <button class="btn btn-sm btn-info"
                                onclick="printJS({
                                printable: 'printData',
                                css: '{{asset('assets/backend/css/print.css')}}',
                                type: 'html'
                                })">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                    <div class="table-responsive mt-2">
                        <div id="printData">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>मिति</th>
                                    <th>शाखा</th>
                                    <th>मुख्य कार्य</th>
                                    <th>कार्य</th>
                                    <th>कैफियत</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dailyTasks as $task)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$task->date}}</td>
                                        <td>{{$task->branch->branch_name??''}}</td>
                                        <td>{{$task->taskCategory->title??''}}</td>
                                        <td>{{$task->taskDivision->title??''}}</td>
                                        <td>{{$task->remarks}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
    @endpush
@endonce
@push('scripts')
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
                    //$("#en_from_date").val(formattedDate);

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
                    //$("#en_to_date").val(formattedDate);

                    Livewire.emit('toDateChanged', inputFieldDate, formattedDate);
                }
            });

            // let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
            // let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
            // Livewire.emit('fromDateChanged', todayBsDate, todayAdDate);
            // Livewire.emit('toDateChanged', todayBsDate, todayAdDate);
        });
    </script>
@endpush
