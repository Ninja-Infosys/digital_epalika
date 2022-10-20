@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div>
                @error('file')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">फारम विवरण </h3>
                        <div class="d-flex justify-content-between">

                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::MAP_PASS_FOR_BUILDING"
                                url="{{route('organization.admin.clients.application.apply-map-application',[$client,$mapApply])}}"></x-application-component>

                            <button id="printButton" class="btn btn-sm btn-success mx-2" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}" title="Print Application">
                                <i class="fa fa-print"></i>
                            </button>
                            <a href="{{route('organization.admin.clients.client.show', $client)}}"
                               class="btn btn-primary btn-sm" title="{{$client->name ?? ''}} को विवरण हेर्नुहोस">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    @includeIf('emap::inc.map_show')
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush
@endsection
