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
                                href="{{ route('admin.businessRegistration.organizationRegistration.organizationRenew.index', $organizationRegistration) }}">व्यवसाय
                                नवीकरण </a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसाय
                            नवीकरण
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसाय
                    नवीकरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">{{ $organizationRegostration->name ?? '' }}को व्यवसाय
                            नवीकरण विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                                <a href="{{ route('admin.businessRegistration.organizationRegistration.organizationRenew.create', $organizationRegistration) }}"
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
                            @forelse($organizationRenews as $organizationRenew)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $organizationRenew->fiscalYear->title ?? '' }}</td>
                                    <td>{{ $organizationRenew->business_renew_date }}</td>
                                    <td>{{ $organizationRenew->date_to_be_maintained }}</td>
                                    <td>{{ $organizationRenew->renew_amount }}</td>
                                    <td>{{ $organizationRenew->penalty_amount }}</td>
                                    <td>{{ $organizationRenew->payment_receipt }}</td>
                                    <td>{{ $organizationRenew->payment_receipt_date }}</td>
                                    <td class="d-flex gap-1">

                                            <a data-bs-type="edit"
                                               href="{{ route('admin.businessRegistration.organizationRegistration.organizationRenew.edit', [$businessDetail, $organizationRenew]) }}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                                <i class="fa fa-edit"></i>
                                            </a>


                                            <a data-bs-type="edit"
                                               href="{{ route('admin.businessRegistration.organizationRegistration.organizationRenew.show', [$businessDetail, $organizationRenew]) }}"
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
                        {{ $organizationRenews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
