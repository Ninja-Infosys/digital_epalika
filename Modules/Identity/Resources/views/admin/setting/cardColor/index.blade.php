@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">कोड रङ</li>
                        <li class="breadcrumb-item active">कोड रङ</li>
                    </ol>
                </div>
                <h4 class="page-title">कोड रङ </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अपांगताको कारण सूची</h4>
                        @can('disabilityReason_create')
                            <a href="{{route('identity.admin.setting.cardColor.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-0 table-striped table-hover mt-3">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">शिर्षक</th>
                            <th scope="col">शिर्षक English</th>
                            <th scope="col">कोड रङ</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cardColors as $cardColor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cardColor->title ?? ''}}</td>
                                <td>{{$cardColor->title_en ?? ''}}</td>
                                <td>{{$cardColor->color ?? ''}}</td>

                                <td>
                                    @can('disabilityReason_edit')
                                        <a href="{{route('identity.admin.setting.cardColor.edit', $cardColor)}}"
                                           type="button" class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('disabilityReason_delete')
                                        <form
                                            action="{{route('identity.admin.setting.cardColor.destroy',$cardColor)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm"
                                                    title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $cardColors->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

