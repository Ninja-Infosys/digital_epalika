@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('admin.businessRegistration.forum.forumRenew.index', $forum) }}">फर्म
                                नवीकरण </a>
                        </li>
                        <li class="breadcrumb-item active">फर्म
                            नवीकरण
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">फर्म
                    नवीकरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">{{ $forum->name ?? '' }} को फर्म
                            नवीकरण विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                            <a href="{{ route('admin.businessRegistration.forum.forumRenew.create', $forum) }}"
                               class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>

                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-striped">
                            <thead class="align-middle text-nowrap text-center">
                            <tr>
                                <th> क्र. सं.</th>
                                <th> आ.व.</th>
                                <th>नवीकरण गरिएको मिति</th>
                                <th>नवीकरण कायम रहने मिति</th>
                                <th>नवीकरण रकम</th>
                                <th>नवीकरण जरिवाना रकम</th>
                                <th>नवीकरण दस्तुर रसिद नं.</th>
                                <th>नवीकरण दस्तुर रसिद मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody class="text-nowrap text-center">
                            @forelse($forumRenews as $forumRenew)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $forumRenew->fiscalYear->title ?? '' }}</td>
                                    <td>{{ $forumRenew->date }}</td>
                                    <td>{{ $forumRenew->date_to_be_maintained }}</td>
                                    <td>{{ $forumRenew->renew_amount }}</td>
                                    <td>{{ $forumRenew->penalty_amount }}</td>
                                    <td>{{ $forumRenew->payment_receipt }}</td>
                                    <td>{{ $forumRenew->payment_receipt_date }}</td>
                                    <td class="d-flex gap-1">

                                        <a data-bs-type="edit"
                                           href="{{ route('admin.businessRegistration.forum.forumRenew.edit', [$forum, $forumRenew]) }}"
                                           title="सम्पादन गर्नुहोस्"
                                           class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <a data-bs-type="edit"
                                           href="{{ route('admin.businessRegistration.forum.forumRenew.show', [$forum, $forumRenew]) }}"
                                           title="सम्पादन गर्नुहोस्"
                                           class="btn btn-xs btn-outline-warning {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                            <i class="fa fa-print"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="9">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $forumRenews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
