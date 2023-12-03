@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">करदाता</li>
                    </ol>
                </div>
                <h4 class="page-title">करदाता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">करदाताहरुको सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('taxPayer_create')
                                <a href="{{route('admin.revenue.taxPayer.create')}}"
                                   class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता नम्बर</th>
                                <th>नाम</th>
                                <th>फोन</th>
                                <th>नागरिकता नं</th>
                                <th>वार्ड</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($taxPayers as $key=>$taxPayer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$taxPayer->registration_no}}</td>
                                    <td>{{$taxPayer->name}}</td>
                                    <td>{{$taxPayer->phone}}</td>
                                    <td>{{$taxPayer->citizenship_no}}</td>
                                    <td>{{$taxPayer->ward}}</td>
                                    <td>
                                        @if($taxPayer->is_active == 1)
                                            <a href="{{route('admin.revenue.taxPayer.update-status', $taxPayer)}}"
                                               class="btn btn-xs btn-primary waves-effect waves-light" style="width: 50px;">सक्रिय</a>
                                        @else
                                            <a href="{{route('admin.revenue.taxPayer.update-status', $taxPayer)}}"
                                               class="btn btn-xs btn-danger waves-effect waves-light" style="width: 50px;">निष्क्रिय</a>
                                        @endif
                                    </td>
                                    <td class="d-flex gap-1">
                                    {{--    @can('taxPayerLand_access')
                                            <a
                                                href="{{route('admin.revenue.taxPayer.taxPayerLand.index',[$taxPayer])}}"
                                                class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-mountain-sun"></i>
                                            </a>
                                        @endcan--}}
                                        @can('taxPayer_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.taxPayer.edit',[$taxPayer])}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('taxPayer_access')
                                            <a href="{{route('admin.revenue.taxPayer.show',[$taxPayer])}}"
                                               class="btn btn-xs btn-outline-success" title="">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('taxPayer_delete')
                                            <form
                                                action="{{route('admin.revenue.taxPayer.destroy',[$taxPayer])}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
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
                        {{$taxPayers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
