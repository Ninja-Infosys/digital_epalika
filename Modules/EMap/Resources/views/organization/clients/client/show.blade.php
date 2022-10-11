@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राही: {{$client->name}}</h3>
                        <a href="{{route('organization.admin.clients.client.index')}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही सुची
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card border-primary mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राहीको विवरण</h3>

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th scope="col">नाम</th>
                            <td scope="col">{{$client->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">ठेगाना</th>
                            <td scope="col">{{$client->localBody->local_body ?? ''}}
                                -{{$client->ward_no ?? ''}}
                                , {{$client->tole ?? ''}}
                                , {{$client->district->district ?? ''}}
                                , {{$client->province->province ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="col">इमेल</th>
                            <td scope="col">{{$client->email}}</td>
                        </tr>
                        <tr>
                            <th scope="col">फोन</th>
                            <td scope="col">{{$client->phone}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-info mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा दरखास्त फारमहरु</h3>
                        <a href="{{route('organization.admin.clients.mapApply.create', $client)}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> नक्सा दरखास्त फारम थप्नुहोस
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">आर्थिक वर्ष</th>
                            <th scope="col">दर्ता नं</th>
                            <th scope="col">निर्माण कार्यको किसिम</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($client->mapApplies as $mapApply)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$mapApply->fiscalYear->title ?? ''}}</td>
                                <td>{{$mapApply->registration_no ?? ''}}</td>
                                <td>{{$mapApply->construction_type->label() ?? ''}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('organization.admin.clients.mapApply.show', [$client, $mapApply])}}"
                                           type="button" class="btn btn-info btn-sm text-white">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split text-white"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"
                                             style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate(76px, 40px);"
                                             data-popper-placement="bottom-start">
                                            <a class="dropdown-item"
                                               href="{{route('organization.admin.clients.application.map-acceptance',[$client,$mapApply])}}">भवन
                                                निर्माण सहिता अनुसार नक्शा /
                                                डिजाईनको
                                                लागि दरखास्त फाराम</a>
                                            <a class="dropdown-item" href="#">नक्सा बनाउने प्राविधिकद्वारा मन्जुरी
                                                पत्र</a>
                                            <a class="dropdown-item" href="#">भवन डिजाईन गर्ने प्राविधिकद्वारा
                                                मन्जुरी
                                                पत्र</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
