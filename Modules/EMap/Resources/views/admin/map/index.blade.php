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
                        <li class="breadcrumb-item">संगठन</li>
                        <li class="breadcrumb-item active">नक्सा</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्सा सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th scope="col">क्र.सं.</th>
                                <th scope="col">आर्थिक वर्ष</th>
                                <th scope="col">दर्ता नं</th>
                                <th scope="col">युनिक आइडी</th>
                                <th scope="col">निर्माण कार्यको किसिम</th>
                                <th scope="col">आवेदन भर्ने संस्था </th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($maps as $mapApply)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mapApply->fiscalYear->title ?? ''}}</td>
                                    <td>{{$mapApply->registration_no ?? ''}}</td>
                                    <td>{{$mapApply->unique_id ?? ''}}</td>
                                    <td>{{$mapApply->construction_type->label() ?? ''}}</td>
                                    <td>{{$mapApply->organization->name ?? ''}}</td>
                                    <td>
                                        <a href="{{route('emap.admin.map.mapApply.noticeList', [$mapApply,$applicationFormTypeEnum])}}"
                                           type="button" class="btn btn-info btn-sm text-white" title="पुरा विवरण हेर्नुहोस्">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                </div>
                <div class="mt-2">
                    {{ $maps->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

