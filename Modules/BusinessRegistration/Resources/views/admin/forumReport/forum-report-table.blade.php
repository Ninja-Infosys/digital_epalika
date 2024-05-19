<div class="table-responsive">
    @if(!empty($forums))
        <table class="table table-bordered text-center table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th>क्र. स.</th>
                <th>दर्ता नं</th>
                <th>दर्ता नं</th>
                <th>नाम</th>
                <th>प्रकार</th>
                <th>उदेश्य</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @forelse($forums as $forum)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$forum->name}}</td>
                    <td>{{get_nepali_number($forum->registration_no)}}</td>
                    <td>{{get_nepali_number($forum->registration_date_no)}}</td>
                    <td>{{$forum->forum_type->label() ?? ''}}</td>
                    <td>{{$forum->purpose}}</td>
                    <td>
                        <a href="">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
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
