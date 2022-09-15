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
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
            </style>
            <div class="printData">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{asset('assets/backend/images/np.png')}}" alt="" height="100px;">
                            </div>
                            <div class="col-md-6">
                                <h4>.........पालिका</h4>
                                <h5>वार्ड न.....को कार्यालय (वडाबाट चलेको अवस्थामा)</h5>
                                <h5>......(कार्यालय रहेको स्थान.......(जिल्ला)</h5>
                                <h5>..........प्रदेश,नेपाल</h5>
                            </div>
                            <div class="col-md-1">

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
                                    <td>{{$registration->letter_number}}</td>
                                    <td>{{$registration->letter_date->toDateString()}}</td>
                                    <td>{{$registration->sender_name}}</td>
                                    <td>{{$registration->subject}}</td>
                                    <td>{{$registration->receiver_name}}</td>
                                    <td>
                                        <img src="{{$registration->signature_image_url}}" alt="">
                                    </td>
                                    <td>{{$registration->date->toDateString()}}</td>
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



