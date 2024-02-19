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

            <tr>
                <td>{{ get_nepali_number($loop->iteration) }}</td>
                <td>{{ $form->title }}</td>
                <td>
                    {{$form->need_from?->label()??''}}
                </td>
                <td>{{$form->map_status?->label()}}</td>
                <td>
                    @if ($form->need_from->value == \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE->value)
                        @if($form->map_group_id == $form->map_pass_group_id)
                            <a href="{{ route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]) }}"
                               class="btn btn-xs btn-outline-primary {{ $form->order == $order ? '' : 'disabled' }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        @else
                            @if($form->form_approve)
                                <a href="{{ route('emap.admin.mapApply.admin-step.view-detail', [$mapApply, $form]) }}"
                                   class="btn btn-xs bn-outline-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                                @if($form->form_edit)
                                    <a href="{{ route('emap.admin.mapApply.admin-step.formDetail', [$mapApply, $form]) }}"
                                       class="btn btn-xs btn-outline-primary {{ $form->order == $order ? '' : 'disabled' }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @else
                                    <a href="{{ route('emap.admin.mapApply.admin-step.view-document', [$mapApply, $form]) }}"
                                       class="btn me-1 btn-xs btn-outline-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                        @endif
                    @else
                        <a href="{{ route('emap.admin.mapApply.admin-step.view-detail', [$mapApply, $form]) }}"
                           class="btn btn-xs bn-outline-success">
                            <i class="fa fa-eye"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
