@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('identity.admin.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अपाङ्गता परिचय पत्र</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्गता परिचय पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">अपाङ्गता परिचय पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            <a href="{{ route('identity.admin.disabilityIdentityCard.searchCitizenshipNo') }}"
                                class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>फोटो</th>
                                    <th>नाम</th>
                                    <th>लिङ्ग</th>
                                    <th>नागरिकता नं./जन्म दर्ता नं.</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($disabilityIdentityCards as $disabilityIdentityCard)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $disabilityIdentityCard->photo_url }}" height="60"
                                                alt="{{ $disabilityIdentityCard->name }}">
                                        </td>
                                        <td>{{ $disabilityIdentityCard->name }}</td>
                                        <td>{{ $disabilityIdentityCard->gender->label() ?? '' }}</td>
                                        <td>
                                            {{ $disabilityIdentityCard->citizenship_no? $disabilityIdentityCard->citizenship_no."(नागरिकता)" : $disabilityIdentityCard->birth_registration_no ."(जन्म दर्ता)" }}
                                        </td>
                                        <td>
                                            @if ($disabilityIdentityCard?->can_edit_delete)
                                                <a data-bs-type="edit"
                                                    href="{{ route('identity.admin.disabilityIdentityCard.show', $disabilityIdentityCard) }}"
                                                    class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                    title="विवरण हेर्नुहोस">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a data-bs-type="edit"
                                                    href="{{ route('identity.admin.disabilityIdentityCard.edit', $disabilityIdentityCard) }}"
                                                    class="btn btn-xs btn-outline-info {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                    title="सम्पादन गर्नुहोस्">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                @if ($recommendationTemplateSetting?->is_hospital_detail_required)
                                                    <button type="button" class="btn btn-xs btn-outline-warning"
                                                        data-bs-toggle="modal" data-bs-target="#print">
                                                        <i class="fa fa-print"></i>
                                                    </button>
                                                    @include('identity::admin.disabilityIdentityCard.inc.print-model')
                                                    @if (!empty($disabilityIdentityCard?->recommend_at))
                                                        <button type="button" class="btn btn-xs btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#print1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    @endif
                                                    @include('identity::admin.disabilityIdentityCard.inc.report')
                                                @endif

                                                <form
                                                    action="{{ route('identity.admin.disabilityIdentityCard.destroy', $disabilityIdentityCard) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                        title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $disabilityIdentityCards->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(".printData").on("click", function(e) {
                e.preventDefault();
                var printButton = $(this);
                var data = $("#disabilityPrint").serialize();
                var url = $("#disabilityPrint").attr("action");
                printButton.prop("disabled", true);
                printButton.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
                    );
                $.ajax({
                    method: "POST",
                    url: url,
                    data: data,
                    success: function(resp) {
                        $("#disabilityPrint")[0].reset();
                        $("#print").modal("hide");
                        swal.fire({
                            title: 'Data Updated Successfully',
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            width: 400,
                            icon: 'success',
                        });
                        location.replace(window.location.href);
                        printButton.prop("disabled", false);
                        printButton.html('Save & Print  <i class="fa fa-print"></i>');
                        const print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $("#error_message").html(XMLHttpRequest.responseJSON.message);
                        printButton.prop("disabled", false);
                        printButton.html('Save & Print  <i class="fa fa-print"></i>');
                    },
                });
            });
            $(".printReportData").on("click", function(e) {
                e.preventDefault();
                var printButton = $(this);
                var data = $("#disabilityReportData").serialize();
                var url = $("#disabilityReportData").attr("action");
                printButton.prop("disabled", true);
                printButton.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
                    );
                $.ajax({
                    method: "POST",
                    url: url,
                    data: data,
                    success: function(resp) {
                        $("#disabilityReportData")[0].reset();
                        $("#print1").modal("hide");
                        swal.fire({
                            title: 'Data Updated Successfully',
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            width: 400,
                            icon: 'success',
                        });
                        location.replace(window.location.href);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $("#error_message1").html(XMLHttpRequest.responseJSON.message);
                        printButton.prop("disabled", false);
                        printButton.html('Save');
                    },
                });
            });
        </script>
    @endpush
@endsection
