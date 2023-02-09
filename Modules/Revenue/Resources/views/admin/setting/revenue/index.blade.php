@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">राजस्वको शिर्षक</li>
                    </ol>
                </div>
                <h4 class="page-title">राजस्वको शिर्षक</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">राजस्वको शिर्षक सूची</h4>
                            @can('revenue_create')
                                <a href="{{route('admin.revenue.setting.revenue.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>कोड</th>
                                <th>वर्ग</th>
                                <th>रकम</th>
                                <th>स्थिति</th>
                                <th>विवरण</th>
                                <th>कैफियत</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($revenues as $key=>$revenue)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$revenue->title}}</td>
                                    <td>{{$revenue->code_no}}</td>
                                    <td>{{$revenue->revenueCategory->title ??''}}</td>
                                    <td>रु. {{$revenue->amount}}</td>
                                    <td>
                                        @if($revenue->is_active == 1)
                                            <a href="{{route('admin.revenue.setting.revenue.update-status', $revenue)}}" class="btn btn-success btn-sm">सक्रिय</a>
                                        @else
                                            <a href="{{route('admin.revenue.setting.revenue.update-status', $revenue)}}" class="btn btn-danger btn-sm">निष्क्रिय</a>
                                        @endif
                                    </td>
                                    <td>{{$revenue->description}}</td>
                                    <td>{{$revenue->remarks}}</td>
                                    <td>
                                        @can('revenue_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.setting.revenue.edit',$revenue)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('revenue_delete')
                                            <form
                                                action="{{route('admin.revenue.setting.revenue.destroy',$revenue)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
