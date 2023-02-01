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
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">करदाता सूची</h4>
                        @can('revenueCategory_create')
                            <a href="{{route('admin.revenue.taxPayer.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm table-striped table-hover">
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
                                            <a href="{{route('admin.revenue.taxPayer.update-status', $taxPayer)}}" class="bg-success text-white rounded p-1">सक्रिय</a>
                                        @else
                                            <a href="{{route('admin.revenue.taxPayer.update-status', $taxPayer)}}" class="bg-danger text-white rounded p-1">निष्क्रिय</a>
                                        @endif
                                    </td>
                                    <td>
                                        @can('taxPayerType_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.taxPayer.edit',[$taxPayer])}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('taxPayerType_delete')
                                            <form
                                                action="{{route('admin.revenue.taxPayer.destroy',[$taxPayer])}}"
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
