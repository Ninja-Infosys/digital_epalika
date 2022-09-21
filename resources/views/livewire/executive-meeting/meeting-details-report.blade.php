<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" wire:model="from_date" class="form-control" placeholder="मिति देखि">
                </div>
                <div class="col-md-4">
                    <input type="text" wire:model="to_date" class="form-control" placeholder="मिति सम्म ">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="printData">

            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }

                @media print {
                    table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        text-align: center;
                    }

                    .logo {
                        margin: 20px;
                    }

                    .row {
                        display: flex;
                        align-content: center;
                    }

                    .col-md-8 {
                        width: 66.66666667%;
                    }

                    .col-md-2 {
                        width: 16.66666667%;
                    }

                    .text-center {
                        text-align: center;
                    }
                }

            </style>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="logo" src="{{asset('assets/backend/images/np.png')}}" alt="" height="100">
                        </div>
                        <div class="col-md-8 text-center">
                            <h4>{{$officeSetting->localBody->local_body??''}}</h4>
                            <h5>वार्ड न {{$officeSetting->ward_no}} को कार्यालय (वडाबाट चलेको अवस्थामा)</h5>
                            <h5> {{$officeSetting->name}} (कार्यालय रहेको
                                स्थान {{$officeSetting->district->district??''}} (जिल्ला)</h5>
                            <h5>{{$officeSetting->province->province??''}},नेपाल</h5>
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset('assets/backend/images/nepal_flag.gif')}}" alt="" height="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm mb-0 table-striped table-hover">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>बैठक मिति</th>
                            <th>बैठक बिसय</th>
                            <th>बिबरण</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($meetingDetails as $meetingDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$meetingDetail->meeting_date ? $meetingDetail->meeting_date->toDateString() : ''}}</td>
                                <td>{{$meetingDetail->meeting_subject}}</td>
                                <td>{{$meetingDetail->description}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>
</div>
