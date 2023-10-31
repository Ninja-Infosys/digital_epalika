@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">सेटिङ</li>
                        <li class="breadcrumb-item active">अपांगताको कारण</li>
                    </ol>
                </div>
                <h4 class="page-title">अपांगताको कारण </h4>
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
                            <a href="{{route('identity.admin.setting.disabilityReason.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">शिर्षक</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($disabilityReasons as $disabilityReason)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$disabilityReason->title ?? ''}}</td>
                                <td>
                                    @can('disabilityReason_edit')
                                        <a data-bs-type="edit" href="{{route('identity.admin.setting.disabilityReason.edit', $disabilityReason)}}"
                                           type="button" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('disabilityReason_delete')
                                        <form
                                            action="{{route('identity.admin.setting.disabilityReason.destroy',$disabilityReason)}}"
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
                                <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $disabilityReasons->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

