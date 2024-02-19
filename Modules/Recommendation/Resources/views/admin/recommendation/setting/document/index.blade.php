@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कागजात</li>
                    </ol>
                </div>
                <h4 class="page-title">कागजात</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">कागजात सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            <a href="{{ route('admin.recommendation.setting.recommendationDocument.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ कागजात थप्नुहोस
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($recommendationDocuments as $recommendationDocument)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>  {{$recommendationDocument->title}}</td>
                                    <td>

                                             <a data-bs-type="edit"
                                                href="{{ route('admin.recommendation.setting.recommendationDocument.edit',  $recommendationDocument) }}"
                                                class="btn btn-xs btn-outline-success  {{get_setting('Pin')?'confirm_pin':''}}"
                                                title="फारम सम्पादन गर्नुहोस">
                                                 <i class="fa fa-pen"></i>
                                             </a>

                                             <form
                                                 action="{{ route('admin.recommendation.setting.recommendationDocument.destroy', $recommendationDocument) }}"
                                                 method="post">
                                                 @csrf
                                                 @method('delete')
                                                 <button data-bs-type="delete"
                                                         class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                         title="मेटाउनु होस्">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                             </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
