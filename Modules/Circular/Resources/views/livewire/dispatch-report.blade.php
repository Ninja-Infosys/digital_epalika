<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">चलानी प्रणाली सूची</h4>
                    <div>
                        <input type="text" class="form-control" wire:model="search" placeholder="चलानी न./ चलानी मिती">
                    </div>

                </div>
            </div>

            <div id="printData">
                <div class="m-1 mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                            <tr>
                                <th rowspan="2">क्र.स</th>
                                <th rowspan="2">चलानी न.</th>
                                <th rowspan="2">चलानी मिति.</th>
                                <th colspan="2">पत्रको</th>
                                <th rowspan="2">पठाउने कार्यालयको नाम</th>
                                <th rowspan="2">बिषय</th>
                                <th rowspan="2">हुलाक/इमेल ठेगाना</th>
                                <th rowspan="2">हस्ताक्षर</th>
                                <th rowspan="2">कैफियत</th>
                            </tr>
                            <tr>
                                <th>पत्र संख्या</th>
                                <th>पत्रको मिति</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dispatches as $dispatch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dispatch->dispatch_no}}</td>
                                    <td>
                                        {{$dispatch->dispatch_date}}
                                    </td>
                                    <td>{{$dispatch->letter_number}}</td>
                                    <td>{{$dispatch->letter_date}}</td>
                                    <td>{{$dispatch->receiver_name}}</td>
                                    <td>{{$dispatch->subject}}</td>
                                    <td>{{$dispatch->receiver_contact}}</td>
                                    <td>
                                        @if($dispatch->receiver_signature_url)
                                        <img height="50" width="85" src="{{$dispatch->receiver_signature_url}}" alt="">
                                        @endif
                                    </td>

                                    <td>{{$dispatch->remarks}}</td>
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



