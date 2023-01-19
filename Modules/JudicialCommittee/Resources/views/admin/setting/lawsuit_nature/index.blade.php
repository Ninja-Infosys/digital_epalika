@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">मुद्दा प्रकृति</li>
                    </ol>
                </div>
                <h4 class="page-title">मुद्दा प्रकृति</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मुद्दा प्रकृति सूची</h4>
                        @can('lawsuitNature_create')
                            <a href="{{route('admin.judicialCommittee.lawsuitNature.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
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
                                <th>शीर्षक</th>
                                <th>शीर्षक_en</th>
                                <th>कोड</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($lawSuitNatures as $lawSuitNature)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$lawSuitNature->title}}</td>
                                    <td>{{$lawSuitNature->title_en}}</td>
                                    <td>{{$lawSuitNature->code}}</td>
                                    <td>
                                        @can('lawsuitNature_edit')
                                            <a data-bs-type="edit" href="{{route('admin.judicialCommittee.lawsuitNature.edit',$lawSuitNature)}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('lawsuitNature_delete')
                                            <form
                                                action="{{route('admin.judicialCommittee.lawsuitNature.destroy',$lawSuitNature)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
