@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active">किस्ता/पेश्की विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">किस्ता/पेश्की विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">किस्ता/पेश्की विवरण</h4>
                        <a href="{{route('admin.plan.project.consumerCommitteeTransaction.create',$project)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>प्रकार</th>
                            <th>मिति</th>
                            <th>रकम</th>
                            <th>कैफियत</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($project->consumerCommitteeTransactions as $transaction)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaction->type?->label()}}</td>
                                <td>{{$transaction->date}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->remarks}}</td>
                                <td>
                                    <a data-bs-type="edit"
                                       href="{{route('admin.plan.project.consumerCommitteeTransaction.edit',[$project,$transaction])}}"
                                       class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form
                                        action="{{route('admin.plan.project.consumerCommitteeTransaction.destroy',[$project,$transaction])}}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-type="delete"
                                                class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
