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
                        <li class="breadcrumb-item active">कृषक</li>
                    </ol>
                </div>
                <h4 class="page-title">कृषकहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> कृषकहरुको विवरण </h4>
                        @can('farmer_access')
                            <a href="{{route('admin.grant.farmer.create')}}"
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
                                <th>कृषक परिचय पत्र नं.</th>
                                <th>पुरा नाम</th>
                                <th>कृषक सूचीकरण नं</th>
                                <th>नागरिकता नं</th>
                                <th>सम्पर्क नं.</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($farmers as $farmer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$farmer->unique_id}}</td>
                                    <td>{{$farmer->name}}</td>
                                    <td>{{$farmer->farmer_id_card_no}}</td>
                                    <td>{{$farmer->citizenship_no}}</td>
                                    <td>{{$farmer->phone_no}}</td>
                                    <td>
                                        <a data-bs-type="edit" href="{{route('admin.grant.farmer.show', $farmer)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('farmer_edit')
                                            <a data-bs-type="edit" href="{{route('admin.grant.farmer.edit', $farmer)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('farmer_delete')
                                            <form
                                                action="{{route('admin.grant.farmer.destroy', $farmer)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title=" मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
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
                    <div class="mt-2">
                        {{ $farmers->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
