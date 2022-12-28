<div class="col-sm" style="text-align: end; margin-right: 10px">
    <button class="btn btn-sm btn-info"
        onclick="printJS({
        printable: 'printData',
        targetStyles: ['*'],
        ignoreElements:['ignore-header'],
        type: 'html'
        })">
        <i class="fa fa-print"></i> Print
    </button>
</div>
<div class="table-responsive" id="printData">
    <table class="table table-sm table-striped table-hover mt-2">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>निजि उधम/फर्म परिचय पत्र नं.</th>
            <th>निजि उधम/फर्मको नाम </th>
            <th>निजि उधम/फर्मको प्रकार </th>
        </tr>
        </thead>
        <tbody>
        @forelse($enterprises as $enterprise)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$enterprise->unique_id}}</td>
                <td>{{$enterprise->name}}</td>
                <td>{{$enterprise->enterpriseType->title ?? '' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
