@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digitalBoard.notice.index',$type)}}">{{$type}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{$type==='Notice' ?'सूचना':'समाचार'}} </li>
                    </ol>
                </div>
                <h4 class="page-title">{{$type==='Notice' ?'सूचना':'समाचार'}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">{{$type==='Notice' ?'सूचना':'समाचार'}}हरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('digitalBoardNotice_create')
                                <a href="{{route('admin.digitalBoard.notice.create',$type)}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>होम पेजमा देखाउनु होस्</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($notices as $notice)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$notice->title}}</td>
                                    <td>{{$notice->date}}</td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.notice.updateShowOnIndex',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-{{$notice->show_on_index==1 ?'primary':'danger'}} {{get_setting('Pin')?'confirm_pin' : ''}}">
                                            <i class="fa  {{$notice->show_on_index==1 ?' fa-check':'fa-window-close'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.notice.updateClosedDate',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-{{$notice->closed_at==null ?'primary':'danger'}} {{get_setting('Pin')?'confirm_pin' : ''}}">
                                            <i class="fa  {{$notice->closed_at==null ?' fa-check':'fa-window-close'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a data-bs-type="edit" href="{{route('admin.digitalBoard.notice.show',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin' : ''}}"
                                           title="विवरण हेर्नुहोस्">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('digitalBoardNotice_edit')
                                        <a data-bs-type="edit"
                                           href="{{route('admin.digitalBoard.notice.edit',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin' : ''}}"
                                           title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('digitalBoardNotice_delete')
                                        <form action="{{route('admin.digitalBoard.notice.destroy',[$type,$notice])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin' : 'show_confirm'}}"
                                                data-bs-type="delete" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endcan
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
                        {{ $notices->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
