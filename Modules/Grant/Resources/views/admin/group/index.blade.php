@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">समूह आव्धता</li>
                    </ol>
                </div>
                <h4 class="page-title">समूह आव्धता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">समूह आव्धता</h4>
                        @can('group_access')
                            <a href="{{route('admin.grant.group.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>समूह परिचय पत्र नं. </th>
                                <th>समूहको नाम </th>
                                <th>दर्ता मिति</th>
                                <th>दर्ता भएको कार्यलय</th>
                                <th>पाना/भ्याट</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$group->unique_id}}</td>
                                    <td>{{$group->name}}</td>
                                    <td>{{ $group->registration_date }}</td>
                                    <td>{{ $group->registered_office }}</td>
                                    <td>{{ $group->vat_pan }}</td>
                                    <td>
                                        <a href="{{route('admin.grant.group.show', $group)}}"
                                           class="btn btn-xs btn-outline-primary" title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.grant.group.edit', $group)}}"
                                           class="btn btn-xs btn-outline-primary" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.grant.group.destroy', $group)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $groups->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
