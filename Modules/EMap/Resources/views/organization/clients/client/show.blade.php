@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राही: {{$client->name}}</h3>
                        <a href="{{route('organization.admin.clients.client.index')}}" class="btn btn-primary btn-sm">
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
    </div>

@endsection
