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

            <div id="printData">
                <div class="m-1 mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="logo" src="{{asset('assets/backend/images/np.png')}}" alt="" height="100">
                            </div>
                            <div class="col-md-8 text-center">
                                <span>
                                <span class="fw-bold">{{$setting->localBody->local_body??''}}</span> <br>
                                वार्ड न {{$setting->ward_no}} को कार्यालय (वडाबाट चलेको अवस्थामा)<br>
                                {{$setting->name}} (कार्यालय रहेको स्थान {{$setting->district->district??''}} (जिल्ला) <br>
                                {{$setting->province->province??''}},नेपाल
                                </span>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
                <div class="m-1 mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-center">
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



