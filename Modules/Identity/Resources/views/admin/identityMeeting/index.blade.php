@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('identity.admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">बैठक</li>
                    </ol>
                </div>
                <h4 class="page-title">बैठक</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">बैठक सूची</h4>
                        <a href="{{ route('identity.admin.identityMeeting.create') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">बैठकको नाम</th>
                            <th scope="col">मिति</th>
                            <th scope="col">उपस्थित सदस्य</th>
                            <th scope="col">आमन्त्रित</th>
                            <th scope="col">अपाङ्गता भएका व्यक्तिहरू</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($identityMeetings as $identityMeeting)
                            <tr>
                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                <td>{{ $identityMeeting->title ?? '' }}</td>
                                <td>{{ get_nepali_number($identityMeeting->date_bs ?? '') }}</td>
                                <td>{{ get_nepali_number($identityMeeting->disability_committees_count ?? 0) }}</td>
                                <td>{{ get_nepali_number($identityMeeting->invited_guests_count ?? 0) }}</td>
                                <td>{{ get_nepali_number($identityMeeting->disability_identity_cards_count) }}</td>
                                <td>
                                    <a disabled data-bs-type="edit"
                                       href="{{ route('identity.admin.identityMeeting.edit', $identityMeeting) }}"
                                       type="button"
                                       class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a
                                        href="{{ route('identity.admin.identityMeeting.minute', $identityMeeting) }}"
                                        type="button"
                                        class="btn btn-xs btn-outline-warning">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    @if(!empty($identityMeeting->minute))
                                        <a href="javascript:void(0)"
                                           route_action="{{route('identity.admin.identityMeeting.minutePrint', $identityMeeting)}}"
                                           class="btn btn-xs btn-outline-warning printDetail">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    @endif

                                    <form
                                        action="{{ route('identity.admin.identityMeeting.destroy', $identityMeeting) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-type="delete"
                                                class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                title="मेटाउनु होस्">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(".printDetail").on("click", function (e) {
                $.ajax({
                    method: "GET",
                    url: $(this).attr("route_action"),
                    success: function (resp) {
                        const print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    }, error: function () {
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush
@endsection
