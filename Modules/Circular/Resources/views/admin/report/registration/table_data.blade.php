<div class="table-responsive">
    <table class="table table-sm table-bordered text-center">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>दर्ता नं.</th>
            <th>दर्ता मिति</th>
            <th>पत्र संख्या</th>
            <th>पत्रको मिति</th>
            <th>पठाउने कार्यालयको नाम</th>
            <th>बिषय</th>
            <th>बुझिलिनेको नाम</th>
            <th>बुझिलिनेको फोन</th>
            <th>कैफियत</th>
        </tr>
        </thead>
        <tbody>
        @forelse($registrations as $registration)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$registration->registration_no}}</td>
                <td> {{$registration->registration_date}} </td>
                <td>{{$registration->letter_number}}</td>
                <td>{{$registration->letter_date}}</td>
                <td>{{$registration->sender_name}}</td>
                <td>{{$registration->subject}}</td>
                <td>{{$registration->receiver_name}}</td>
                <td>{{$registration->phone}}</td>
                <td>{{$registration->remarks}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
