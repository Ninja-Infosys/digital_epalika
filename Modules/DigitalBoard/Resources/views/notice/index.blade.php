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
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{$type==='Notice' ?'सूचना':'समाचार'}} सुची</h4>
                        @can('user_create')
                            <a href="{{route('admin.digitalBoard.notice.create',$type)}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ {{$type==='Notice' ?'सूचना':'समाचार'}} थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक </th>
                                <th>मिति </th>
                                <th>होम पेजमा  देखाउनु होस् </th>
                                <th>स्थिति </th>
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
                                           class="btn btn-xs btn-outline-{{$notice->show_on_index==1 ?'primary':'danger'}}">
                                            <i class="fa  {{$notice->show_on_index==1 ?' fa-check':'fa-window-close'}}"></i>

                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.notice.updateClosedDate',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-{{$notice->closed_at==null ?'primary':'danger'}}">
                                            <i class="fa  {{$notice->closed_at==null ?' fa-check':'fa-window-close'}}"></i>


                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.notice.show',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-eye"></i>


                                        </a>
                                        <a href="{{route('admin.digitalBoard.notice.edit',[$type,$notice])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form action="{{route('admin.digitalBoard.notice.destroy',[$type,$notice])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
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
                </div>
            </div>
        </div>
    </div>
@endsection
