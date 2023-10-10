@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">नक्सा दर्ता/प्रमाणित</li>
                        <li class="breadcrumb-item active">
                            {{ $applicationFormTypeEnum->value == \Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION->value ? 'नक्सा दर्ता' : 'नक्सा प्रमाणित' }}
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">
                    {{ $applicationFormTypeEnum->value == \Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION->value ? 'नक्सा दर्ता' : 'नक्सा प्रमाणित' }}
                </h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title mb-0">
                    {{ $applicationFormTypeEnum->value == \Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION->value ? 'नक्सा दर्ता' : 'नक्सा प्रमाणित' }}
                </h4>
                <div class="d-flex flex-wrap align-items-center">
                    @includeIf('inc.filter_form')
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="demo-foo-accordion" class="table table-bordered mb-0 toggle-arrow-tiny">
                <thead>
                    <tr>
                        <th data-toggle="true">क्र.सं.</th>
                        <th data-hide="phone">आर्थिक वर्ष</th>
                        <th>युनिक आइडी</th>
                        <th>फाईल कोड नं</th>
                        <th>दर्ता नं</th>
                        <th data-hide="phone">निर्माण कार्यको किसिम</th>
                        <th data-hide="phone">आवेदन भर्ने संस्था</th>
                        <th data-hide="phone">#</th>
                        <th data-hide="all"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($maps as $mapApply)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapApply->fiscalYear->title ?? '' }}</td>
                            <td>{{ $mapApply->unique_id ?? '' }}</td>
                            <td>{{ $mapApply->file_code ?? '' }}</td>
                            <td>{{ $mapApply->registration_no ?? '' }}</td>
                            <td>{{ $mapApply->construction_type->label() ?? '' }}</td>
                            <td>{{ $mapApply->organization->name ?? '' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if ($mapApply->sent_to_organization == 'Accept')
                                        <a href="{{ route('emap.admin.mapApply.mapRegistration.index', $mapApply) }}"
                                            class="btn btn-outline-info btn-sm" title="दर्ता गर्नुहोस्">
                                            <i
                                                class="fa fa-{{ empty($mapApply->registration_no) ? 'times-circle' : 'check-circle' }}"></i>
                                            दर्ता {{ empty($mapApply->registration_no) ? 'गर्नुहोस्' : 'भएको' }}
                                        </a>
                                    @endif
                                    <form
                                        action="{{ route('emap.admin.map.mapApply.updateStatus', [$mapApply, $applicationFormTypeEnum]) }}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <div class="input-group">
                                            <select class="form-select form-select-sm" name="sent_to_organization"
                                                id="sent_to_organization" aria-label="Example select with button addon"   @if($mapApply->sent_to_organization=='Accept') disabled @endif>
                                                <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                                <option value="Unseen"
                                                    {{ $mapApply->sent_to_organization == 'Unseen' ? 'selected' : '' }}>
                                                    प्रक्रियामा</option>
                                                <option value="Accept"
                                                    {{ $mapApply->sent_to_organization == 'Accept' ? 'selected' : '' }}>स्वीकार
                                                </option>
                                                <option value="Reject"
                                                    {{ $mapApply->sent_to_organization == 'Reject' ? 'selected' : '' }}>
                                                    अस्वीकार</option>
                                            </select>
                                            <button   @if($mapApply->sent_to_organization=='Accept') disabled @endif class="btn btn-sm btn-outline-primary" type="submit">पेश
                                                गर्नुहोस्</button>
                                        </div>

                                    </form>
                                    <a href="{{ route('emap.admin.map.mapApply.mapDetail', [$mapApply, $applicationFormTypeEnum]) }}" title="विवरण हेर्नुहोस"
                                        class="btn btn-xs btn-outline-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('emap.admin.mapApply.admin-step.form-list', $mapApply) }}" title="नक्सा विवरण"
                                        class="btn btn-xs btn-outline-primary">
                                        <i class="fa fa-step-forward"></i>
                                    </a>
                                </div>
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
