<div class="table-responsive">
    <table class="table table-sm table-bordered text-center">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>चलानी न.</th>
            <th>चलानी मिति</th>
            <th>पत्र संख्या</th>
            <th>पत्रको मिति</th>
            <th>पाउने कार्यालयको नाम</th>
            <th>बिषय</th>
            <th>हुलाक/इमेल ठेगाना</th>
            <th>हस्ताक्षर</th>
            <th>कैफियत</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dispatches as $dispatch)
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
        @empty
            <tr>
                <td colspan="10" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
