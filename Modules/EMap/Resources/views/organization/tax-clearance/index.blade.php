@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">कर चुक्ता</h3>
                        <a href="{{route('organization.admin.taxClearance.create')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> कर चुक्ता थप्नुहोस
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">बर्ष</th>
                            <th scope="col">फाईल</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($taxClearances as $taxClearance)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$taxClearance->year}}</td>
                                <td>
                                    <img src="{{$taxClearance->document_url}}" alt="" height="60">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('organization.admin.taxClearance.edit',$taxClearance)}}"
                                           class="btn btn-sm btn-outline-warning mx-1">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस
                                        </a>
                                        <form action="{{route('organization.admin.taxClearance.destroy',$taxClearance)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger show_confirm mx-1">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        </form>
                                    </div>

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
