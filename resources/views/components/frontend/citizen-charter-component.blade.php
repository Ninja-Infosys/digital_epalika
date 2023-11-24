<table class="table table-borderless position-relative overflow-hidden" id="marqueeTable">
    <thead class="sticky-top table-headcolor">
        <tr>
            <th scope="col">क्र.सं.</th>
            <th scope="col">शाखा</th>
            <th scope="col">सेवा</th>
            <th scope="col" width="20%">आवश्यक कागजातहरु</th>
            <th scope="col" width="20%">सेवा शुल्क तथा दस्तुर रकम</th>
            <th scope="col">लाग्ने समय</th>
            <th scope="col">जिम्मेवार व्यक्ति</th>
        </tr>
    </thead>
    <tbody class="move_table table-primary" id="marqueeRows">
    @foreach($citizenCharters as $citizenCharter)
        <tr>
            <th scope="row">{{get_nepali_number($loop->iteration)}}</th>
            <td>{{$citizenCharter->branch?->title ?? ''}}</td>
            <td>{{$citizenCharter->service}}</td>
            <td>{{$citizenCharter->required_document}}</td>
            <td>{{$citizenCharter->amount}}</td>
            <td>{{$citizenCharter->time}}</td>
            <td>{{$citizenCharter->responsible_person}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@push('scripts')
    <script>
        const marqueeTable = document.getElementById('marqueeTable');
        const marqueeRows = document.getElementById('marqueeRows');
        for (let i = 0; i < 9; i++) {
            const clone = marqueeRows.cloneNode(true);
            marqueeTable.appendChild(clone);
        }
        const clonedRowsHeight = marqueeRows.clientHeight * 20;

        // Reset the scroll position to the top when the animation completes
        marqueeTable.addEventListener('animationiteration', () => {
            marqueeTable.scrollTop = 0;
        });

    </script>
@endpush

@push('styles')
    <style>
        @keyframes marquee {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100%);
            }
        }

        .move_table {
            position: relative;
            box-sizing: border-box;
            animation: marquee {{count($citizenCharters) <=0 ? 10 :count($citizenCharters) * 10}}s linear infinite;
            margin: 0 auto;
            text-align: center;
            color: var(--mainColor);
        }
    </style>
@endpush

