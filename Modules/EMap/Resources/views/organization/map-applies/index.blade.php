@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राही सुची</h3>
                        <a href="{{route('organization.admin.clients.client.create')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> सेवाग्राही थप्नुहोस
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">सब्मिसन आइडी</th>
                            <th scope="col">ठेगाना</th>
                            <th scope="col">इमेल</th>
                            <th scope="col">फोन</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mapApplies as $mapApply)
                            <tr>
                                <td>{{$loop->iteration ?? ''}}</td>
                                <td>{{$mapApply->unique_id ?? ''}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{route('organization.admin.clients.map.apply.edit', $mapApply)}}"> Edit</a>
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
