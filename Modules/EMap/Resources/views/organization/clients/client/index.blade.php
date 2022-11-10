@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा दर्ता सुची </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">नाम</th>
                            <th scope="col">ठेगाना</th>
                            <th scope="col">इमेल</th>
                            <th scope="col">फोन</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$client->name}}</td>
                                <td>{{$client->localBody->local_body ?? ''}}
                                    -{{$client->ward_no ?? ''}}
                                    , {{$client->tole ?? ''}}
                                    , {{$client->district->district ?? ''}}
                                    , {{$client->province->province ?? ''}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td class="d-flex">
                                    <a href="{{route('organization.admin.clients.client.show',$client)}}"
                                       class="btn btn-sm btn-outline-info mx-1">
                                        <i class="fa fa-eye"></i> हेर्नुहोस
                                    </a>
                                    <a href="{{route('organization.admin.clients.client.edit',$client)}}"
                                       class="btn btn-sm btn-outline-warning mx-1">
                                        <i class="fa fa-edit"></i> सम्पादन गर्नुहोस
                                    </a>
                                    <form action="{{route('organization.admin.clients.client.destroy',$client)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger show_confirm mx-1">
                                            <i class="fa fa-trash"></i> मेटाउनु होस्
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
