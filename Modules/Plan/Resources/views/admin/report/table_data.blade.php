<div class="table-responsive">
    @if(!empty($businessDetails))
        <table class="table table-bordered text-center table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th rowspan="2">क्र.स</th>
                <th rowspan="2">सबमिशन नं</th>
                <th rowspan="2">दर्ता नं</th>
                <th rowspan="2">दर्ता मिति</th>
                <th colspan="3">व्यवसायी</th>
                <th colspan="3">व्यवसाय</th>
            </tr>
            <tr>
                <th>नाम</th>
                <th>फोन</th>
                <th>इमेल</th>
                <th>नाम</th>
                <th>प्रकृति</th>
                <th>पूँजी लगानी रु.:</th>
            </tr>
            </thead>
            <tbody>
            @forelse($businessDetails as $businessDetail)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$businessDetail->submission_no ?? ''}}</td>
                    <td>{{$businessDetail->registration_no ?? ''}}</td>
                    <td>{{$businessDetail->registration_date_ne ?? ''}}</td>
                    <td>{{$businessDetail->proprietorDetail->name}}</td>
                    <td>{{$businessDetail->proprietorDetail->phone ?? ''}}</td>
                    <td>{{$businessDetail->proprietorDetail->email ??  ''}}</td>
                    <td>{{$businessDetail->business_detail_name ?? ''}}</td>
                    <td>{{$businessDetail?->business_nature?->label() ?? ''}}</td>
                    <td>{{$businessDetail->amount_cost ?? ''}}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="13">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endif

</div>
