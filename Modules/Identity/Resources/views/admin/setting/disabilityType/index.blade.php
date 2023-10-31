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
                        <li class="breadcrumb-item">सेटिङ</li>
                        <li class="breadcrumb-item active">अपांगताको प्रकार</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रकृतिको आधारमा अपाङ्गताको प्रकार </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रकृतिको आधारमा अपाङ्गताको प्रकारहरु</h4>
                        <a href="{{route('identity.admin.setting.disabilityType.create')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">शिर्षक</th>
                            <th scope="col">वर्ग</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($disabilityTypes as $disabilityType)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$disabilityType->title ?? ''}}</td>
                                <td>{{$disabilityType->disabilityType->title ?? ''}}</td>
                                <td>
                                    <a data-bs-type="edit" href="{{route('identity.admin.setting.disabilityType.edit', $disabilityType)}}"
                                       type="button" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('identity.admin.setting.disabilityType.destroy',$disabilityType)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
                    {{ $disabilityTypes->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

