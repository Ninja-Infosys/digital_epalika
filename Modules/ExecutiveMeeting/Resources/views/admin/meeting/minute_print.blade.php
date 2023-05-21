<div>
    {!! letterHead() !!}

    <hr>

    {!! $meeting->meetingMinute->description ?? '' !!}

    <hr>

    <h5>उपस्थिति </h5>

    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>क्र.सं.</th>
                <th>नाम</th>
                <th>पद</th>
                <th>फोन</th>
                <th>इमेल</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($meeting->meetingParticipants as $meetingParticipant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $meetingParticipant->name }}</td>
                    <td>{{ $meetingParticipant->designation }}</td>
                    <td>{{ $meetingParticipant->phone }}</td>
                    <td>{{ $meetingParticipant->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        तालिकामा कुनै डाटा उपलब्ध छैन !!!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h5>एजेण्डाहरु</h5>

    <ol>
        @foreach ($meeting->meetingAgendas as $meetingAgenda)
            <li>{{ $meetingAgenda->proposal }}</li>
        @endforeach
    </ol>

    <h5>निर्णयहरु</h5>

    <ol>
        @foreach ($meeting->meetingAgendas as $meetingAgenda)
            <li> {!! $meetingAgenda->meetingDecision->description ?? '' !!}</li>
        @endforeach
    </ol>

</div>
