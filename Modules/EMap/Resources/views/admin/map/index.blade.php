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
                <h4 class="page-title">{{$applicationFormTypeEnum->value == \Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION->value ? 'नक्सा दर्ता' : 'नक्सा प्रमाणित'}}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title mb-0">{{$applicationFormTypeEnum->value == \Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION->value ? 'नक्सा दर्ता' : 'नक्सा प्रमाणित'}}</h4>
                <div class="d-flex flex-wrap align-items-center">
                    @includeIf('inc.filter_form')
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th scope="col">क्र.सं.</th>
                    <th scope="col">आर्थिक वर्ष</th>
                    <th scope="col">दर्ता नं</th>
                    <th scope="col">युनिक आइडी</th>
                    <th scope="col">निर्माण कार्यको किसिम</th>
                    <th scope="col">आवेदन भर्ने संस्था</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                <tbody>
                @forelse($maps as $mapApply)
                    <tr @class([
                                           "table-danger"=>empty($mapApply->registration_no),
                                           "table-success"=>!empty($mapApply->registration_no),
                                          ])>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$mapApply->fiscalYear->title ?? ''}}</td>
                        <td>{{$mapApply->registration_no ?? ''}}</td>
                        <td>{{$mapApply->unique_id ?? ''}}</td>
                        <td>{{$mapApply->construction_type->label() ?? ''}}</td>
                        <td>{{$mapApply->organization->name ?? ''}}</td>
                        <td>
                            @if(empty($mapApply->registration_no))
                                <a href="{{route('emap.admin.map.mapApply.register', $mapApply)}}"
                                   type="button" class="btn btn-outline-primary btn-sm" title="दर्ता गर्नुहोस्">
                                    <i class="fa fa-check-circle"></i> दर्ता
                                </a>
                            @endif
                            @if(!empty($mapApply->registration_no))
                                <a href="{{route('emap.admin.map.mapApply.noticeList', [$mapApply,$applicationFormTypeEnum])}}"
                                   type="button" class="btn btn-outline-info btn-sm" title="पनिबेदन/प्रतिबेदन हेर्नुहोस्">
                                    <i class="fa fa-eye"></i> निबेदन/प्रतिबेदनहरु
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $maps->onEachSide(config('app.pagination_count'))->links() }}
        </div>
    </div>
@endsection

