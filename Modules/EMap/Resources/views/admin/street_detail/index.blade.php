@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg"
                                    alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">सडक विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">सडक विवरण</h4>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card p-0">
            <div class="card-header search-card">
                <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">सडक विवरण सूची</h4>
                       <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                            <a href="{{ route('emap.admin.streetDetail.create') }}" 
                                class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>

                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-sm table-custom">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>नाम</th>
                                    <th>देखि</th>
                                    <th>सम्म</th>
                                    <th>सेटब्याक</th>
                                    <th>सडक कोड</th>
                                    <th>अवस्था</th>
                                    <th>वडा</th>
                                    <th>सडक अधिकार क्षेत्र</th>
                                    <th>बाटोको चौडाई</th>
                                    <th>सडकको प्रकार</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($streetDetails as $streetDetail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $streetDetail->name }}</td>
                                        <td>{{ $streetDetail->from }}</td>
                                        <td>{{ $streetDetail->to }}</td>
                                        <td>{{ $streetDetail->setback }}</td>
                                        <td>{{ $streetDetail->street_code }}</td>
                                        <td>{{ $streetDetail->condition->label() }}</td>
                                        <td>{{ $streetDetail->wards }}</td>
                                        <td>{{ $streetDetail->right_of_way }}</td>
                                        <td>{{ $streetDetail->width }}</td>
                                        <td>{{ $streetDetail->road_type->label() }}</td>
                                        <td class="d-flex">
                                            <a data-bs-type="edit"
                                                href="{{ route('emap.admin.streetDetail.edit', $streetDetail) }}"
                                                class="btn btn-xs me-1 btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="सम्पादन गर्नुहोस">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
                                            </a>
                                            <form action="{{ route('emap.admin.streetDetail.destroy', $streetDetail) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                    class="btn btn-xs me-1 btn-outline-danger show_confirm  {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="मेटाउनु होस्">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="empty">
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
