@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.digitalBoard.popUpNotice.index') }}"> Pop Up</a>
                        </li>
                        <li class="breadcrumb-item active"> Pop Up </li>
                    </ol>
                </div>
                <h4 class="page-title">Pop Up</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">Pop Up</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('digitalBoardNotice_create')
                                <a href="{{ route('admin.digitalBoard.popUpNotice.create') }}"
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
                                    <th>शिर्षक</th>
                                    <th>मिति</th>
                                    <th>स्थिति</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($popUpNotices as $popUpNotice)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $popUpNotice->title }}</td>
                                        <td>{{ $popUpNotice->date }}</td>
                                        <td>
                                            <a href="{{ route('admin.digitalBoard.popUpNotice.updateShowOnIndex',$popUpNotice) }}"
                                                class="btn btn-xs btn-outline-{{ $popUpNotice->show_on_index == 1 ? 'primary' : 'danger' }} {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                                <i
                                                    class="fa  {{ $popUpNotice->show_on_index == 1 ? ' fa-check' : 'fa-window-close' }}"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex flex-wrap">
                                            <a data-bs-type="edit"
                                                href="{{ route('admin.digitalBoard.popUpNotice.show',$popUpNotice) }}"
                                                class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                title="विवरण हेर्नुहोस्">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                                <a data-bs-type="edit"
                                                    href="{{ route('admin.digitalBoard.popUpNotice.edit',$popUpNotice) }}"
                                                    class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }} ms-1"
                                                    title="सम्पादन गर्नुहोस्">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.digitalBoard.popUpNotice.destroy',$popUpNotice) }}"
                                                    method="post" class="ms-1   ">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="rounded-1 btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                        data-bs-type="delete" title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{-- {{ $popUpNotices->onEachSide(config('app.pagination_count'))->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
