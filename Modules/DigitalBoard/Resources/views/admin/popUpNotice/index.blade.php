@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.digitalBoard.popUpNotice.index') }}">पपअप सूचना</a>
                        </li>
                        <li class="breadcrumb-item active">पपअप सूचना सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">पपअप सूचना</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header search-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">पपअप सूचनाहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                            <a href="{{ route('admin.digitalBoard.popUpNotice.create') }}"
                                class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>

                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-custom">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>शिर्षक</th>
                                    <th>फोटो</th>
                                    <th>पप-आप देखाउने समय</th>
                                    <th>पप-आप फिर्ता हुने समय</th>
                                    <th>वडा</th>
                                    <th>पालिकामा पनि देखाउने</th>
                                    <th>स्थिति</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($popUpNotices as $popUpNotice)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $popUpNotice->title }}</td>
                                        <td><img src="{{ $popUpNotice->image_url }}" alt="Image" width="80"></td>
                                        <td>
                                            {{ $popUpNotice->display_duration }}
                                        </td>
                                        <td>
                                            {{ $popUpNotice->iteration_duration }}
                                        </td>
                                        <td>
                                            {{ implode(',', $popUpNotice->popupActivations->pluck('ward')->toArray()) }}
                                        </td>

                                        <td>
                                            @if ($popUpNotice->is_displayed == 1)
                                                <i class="fa-solid fa-circle-check fa-2x" style="color:green"></i>
                                            @else
                                                <i class="fa-solid fa-circle-xmark fa-2x" style="color:red"></i>
                                            @endif
                                        </td>


                                        <td>
                                            <form
                                                action="{{ route('admin.digitalBoard.popUpNotice.updateStatus', $popUpNotice) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit"
                                                    class="btn btn-{{ $popUpNotice->is_active ? 'success' : 'danger' }} btn-block"
                                                    style="width: max-content">
                                                    {{ $popUpNotice->is_active ? 'पप-अप बन्द गर्नुहोस' : 'पप-अप देखाउनुहोस' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="d-flex gap-1 mt-4">
                                            @if (empty(auth()->user()->ward_no) || auth()->id() == $popUpNotice->user_id)
                                            <a data-bs-type="edit"
                                                href="{{ route('admin.digitalBoard.popUpNotice.edit', $popUpNotice) }}"
                                                class="btn btn-xs btn-outline-primary " title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif
                                            @if (empty(auth()->user()->ward_no) || auth()->id() == $popUpNotice->user_id)
                                                <form
                                                    action="{{ route('admin.digitalBoard.popUpNotice.destroy', $popUpNotice) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger show_confirm"
                                                        title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif

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
    @push('scripts')
        <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/ckeditor/editor.js') }}"></script>
    @endpush
@endsection
