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
                            <a href="{{route('admin.businessRegistration.setting.businessNature.index')}}">व्यवसाय को प्रकृति </a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसाय को प्रकृति </li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसाय को प्रकृति </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय को प्रकृति सूची</h4>
                        @can('businessNature_create')
                            <a href="{{route('admin.businessRegistration.setting.businessNature.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ व्यवसाय को प्रकृति थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-2">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक. </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessNatures as $businessNature)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessNature->title}}</td>
                                    <td>
                                        @can('businessNature_edit')
                                        <a href="{{route('admin.businessRegistration.setting.businessNature.edit',$businessNature)}}"
                                           class="btn btn-xs btn-outline-warning">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        @endcan
                                        <form action="{{route('admin.businessRegistration.setting.businessNature.destroy',$businessNature)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            @can('businessNature_delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                            @endcan
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
                        {{ $businessNatures->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

