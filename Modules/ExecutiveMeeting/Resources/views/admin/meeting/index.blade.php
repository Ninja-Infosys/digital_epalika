@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.executiveMeeting.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">बैठक विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">बैठक विवरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">बैठक विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('meeting_create')
                                <a href="{{route('admin.executiveMeeting.meeting.create')}}"
                                   class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>समिति</th>
                                <th>बैठकको नाम</th>
                                <th>विवरण</th>
                                <th>Recurrence</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetings as $meeting)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $meeting->committee->committee_name??'' }}</td>
                                    <td>{{ $meeting->meeting_name }}</td>
                                    <td>{{ $meeting->description }}</td>
                                    <td>{{ $meeting->recurrence->label() }}</td>
                                    <td>{{ $meeting->start_date }}({{ $meeting->en_start_date }})
                                    </td>
                                    <td>{{ $meeting->end_date }}({{ $meeting->en_end_date }})
                                    </td>

                                    <td width="90">
                                        @can('meeting_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.executiveMeeting.meeting.edit', $meeting) }}"
                                               title="सम्पादन गर्नुहोस्" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit {{get_setting('Pin')?'confirm_pin':''}}"></i>
                                            </a>
                                        @endcan
                                        @can('meeting_delete')
                                            <form
                                                action="{{ route('admin.executiveMeeting.meeting.destroy', $meeting) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" type="submit"
                                                        class="btn btn-xs btn-outline-danger show_confirm {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $meetings->onEachSide(config('app.pagination_count'))->links() }}                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
