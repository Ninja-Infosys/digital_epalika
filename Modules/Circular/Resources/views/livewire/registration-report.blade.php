<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">दर्ता प्रणाली सूची</h4>
                    <div>
                        <input type="text" class="form-control" wire:model="search" placeholder="दर्ता न./ दर्ता मिती">
                    </div>

                </div>
            </div>

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
                                <h4>{{$setting->localBody->local_body??''}}</h4>
                                <h5>वार्ड न {{$setting->ward_no}} को कार्यालय (वडाबाट चलेको अवस्थामा)</h5>
                                <h5> {{$setting->name}} (कार्यालय रहेको स्थान {{$setting->district->district??''}}
                                    (जिल्ला)</h5>
                                <h5>{{$setting->province->province??''}},नेपाल</h5>
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
                                <th rowspan="2">क्र.स</th>
                                <th rowspan="2">दर्ता न.</th>
                                <th rowspan="2">दर्ता मिति.</th>
                                <th colspan="2">प्राप्त भएको</th>
                                <th rowspan="2">पठाउने कार्यालयको नाम</th>
                                <th rowspan="2">बिषय</th>
                                <th colspan="3">बुझिलिनेको बिवरण</th>
                                <th rowspan="2">कैफियत</th>
                            </tr>
                            <tr>
                                <th>पत्र संख्या</th>
                                <th>पत्रको मिति</th>
                                <th>नाम</th>
                                <th>हस्ताक्षर</th>
                                <th>मिति</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$registration->registration_no}}</td>
                                    <td>
                                        {{$registration->registration_date}}
                                    </td>
                                    <td>{{$registration->letter_number}}</td>
                                    <td>{{$registration->letter_date}}</td>
                                    <td>{{$registration->sender_name}}</td>
                                    <td>{{$registration->subject}}</td>
                                    <td>{{$registration->receiver_name}}</td>
                                    <td>
                                        <img height="50" width="85" src="{{$registration->signature_image_url}}" alt="">
                                    </td>
                                    <td>{{$registration->date}}</td>
                                    <td>{{$registration->remarks}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>



