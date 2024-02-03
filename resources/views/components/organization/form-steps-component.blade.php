<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>शिर्षक</th>
            <th> हेर्ने निकाय  </th>
            <th>स्थिति</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($forms as $form)
            <tr @if ($form->map_status==\Modules\EMap\Enums\DocumentStatusEnum::REJECTED) style="background-color:#d16969;" @endif>
                <td>{{ get_nepali_number($loop->iteration) }}</td>
                <td>{{ $form->title }}</td>
                <td>
                    {{ $form->need_from?->label() ?? '' }}
                    {{--                                        {{$mapApply->getCheckFormFilledAttribute($form->formDataTypes->pluck('original_type')->toArray())}} --}}
                </td>
                <td>{{$form->map_status?->label()}}</td>
                <td class="d-flex">

                    @if ($form->need_from !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE)
                        <a href="{{ route('organization.admin.formDetail', [$mapApply, $form]) }}"
                           class="btn me-1 btn-xs btn-outline-primary {{ $form->order == $order ? '' : 'disabled' }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endif
                    @if($form->show_to_consultancy == 1)
                        <a href="{{ route('organization.admin.organization.view-detail', [$mapApply, $form]) }}"
                           class="btn me-1 btn-xs btn-outline-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
