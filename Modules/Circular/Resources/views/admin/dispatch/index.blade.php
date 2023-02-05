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
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">चलानी पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('dispatch_create')
                                <a href="{{route('admin.circular.dispatch.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>चलानी नं.</th>
                                <th>पाउने कार्यालयको नाम</th>
                                <th>चलानी मिति</th>
                                <th>पत्र संख्या</th>
                                <th>पत्रको मिति</th>
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
                                    <td>{{$dispatch->letter_number}}</td>
                                    <td>{{$dispatch->letter_date}}</td>
                                    <td>{{$dispatch->subject}}</td>
                                    <td>
                                        @can('dispatch_access')
                                            <a data-bs-type="edit"  href="{{route('admin.circular.dispatch.show', $dispatch)}}" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin' : ''}}" title="थप हेर्नुहोस्">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('dispatch_edit')
                                            <a  data-bs-type="edit" href="{{route('admin.circular.dispatch.edit',$dispatch)}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin' : ''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('dispatch_delete')
                                        <form action="{{route('admin.circular.dispatch.destroy',$dispatch)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin' : 'show_confirm'}}" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $dispatches->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
