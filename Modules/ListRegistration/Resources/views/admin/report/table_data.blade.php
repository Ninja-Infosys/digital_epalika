<div class="table-responsive">
    <table class="table table-sm mb-0 table-striped table-hover">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>दर्ता नम्बर</th>
            <th>मुख्य व्यक्तिको नाम</th>
            <th>फोन नम्बर </th>
            <th>निबेदन मिति </th>
            <th>ठेगाना</th>
            <th>पत्राचार ठेगाना</th>
        </tr>
        </thead>
        <tbody>
        @forelse($listRegistrations as $listRegistration)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$listRegistration->registration_no}}</td>
                <td>{{$listRegistration->main_person}}</td>
                <td>{{$listRegistration->mobile_no}}</td>
                <td>{{$listRegistration->date}}</td>
                <td>{{$listRegistration->address}}</td>
                <td>{{$listRegistration->mailing_address}}</td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
