@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">चलानी</li>
                    </ol>
                </div>
                <h4 class="page-title">चलानी पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">चलानी पत्र सूची</h4>
                        @can('dispatch_create')
                            <a href="{{route('admin.circular.dispatch.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ चलानी पत्र थप्नुहोस्
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
                                <th>चलानी न.</th>
                                <th>पाउने कार्यालयको नाम</th>
                                <th>चलानी मिति</th>
                                <th>बिषय</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dispatches as $dispatch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dispatch->dispatch_no}}</td>
                                    <td>{{$dispatch->receiver_name}}</td>
                                    <td>{{$dispatch->dispatch_date}}</td>
                                    <td>{{$dispatch->subject}}</td>
                                    <td>
                                        @can('dispatch_access')
                                            <a href="{{route('admin.circular.dispatch.show', $dispatch)}}" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-eye"></i> थप हेर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('dispatch_edit')
                                            <a href="{{route('admin.circular.dispatch.edit',$dispatch)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('dispatch_delete')
                                        <form action="{{route('admin.circular.dispatch.destroy',$dispatch)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        </form>
                                        @endcan
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
                </div>
            </div>
        </div>
    </div>
@endsection
