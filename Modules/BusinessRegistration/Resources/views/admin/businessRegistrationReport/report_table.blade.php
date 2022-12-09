<div class="table-responsive">
    <table class="table table-sm mb-0 table-striped table-hover">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>नाम</th>
            <th>दर्ता नं</th>
            <th>दर्ता मिति.</th>
            <th>व्यवसाय ठेगाना</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @forelse($businessDetails as $businessDetail)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$businessDetail->proprietorDetail->name??''}}</td>
                <td>{{$businessDetail->registration_no??''}}</td>
                <td>{{$businessDetail->registration_date_en}}</td>
                <td><span>{{$businessDetail->localBody->local_body??''}}
                                - {{$businessDetail->ward_no??''}} </span></td>
                <td></td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
