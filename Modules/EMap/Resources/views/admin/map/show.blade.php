@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item ">संगठन</li>
                        <li class="breadcrumb-item ">नक्सा</li>
                        <li class="breadcrumb-item active">नक्सा विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्सा सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#application_tab" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link active" aria-selected="true" role="tab">
                                आवेदन
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#detail-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                विवरण
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#map-registration-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                दस्तुर तथा दर्ता
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#notice-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                सूचना
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#rejected_application_tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                खारेज भएका आवेदन
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#organization_tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                               aria-selected="false" role="tab" tabindex="-1">
                                आवेदन भर्ने संस्था
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="application_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach($mapApply->mapApplyApplications->whereNull('rejected_at') as $application)
                                    <div class="col">
                                        <div class="card">
                                            <iframe class="card-img-top img-fluid" height="500" frameborder="0"
                                                    src="{{$application->file_url}}"></iframe>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$application->file_type->label() ?? ''}}</h4>
                                                <p class="card-text mt-2">
                                                <form
                                                    action="{{route('emap.admin.map.mapApply.reject',[$mapApply,$application])}}"
                                                    method="POST" class="show_reject_confirm">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                            @class([
                                                                "btn",
                                                                "btn-danger"=>empty($application->rejected_at),
                                                                "btn-primary"=>!empty($application->rejected_at),
                                                                "btn-sm"])>
                                                        {{empty($application->rejected_at)? 'Reject Application' : 'Accept Application'}}
                                                    </button>
                                                </form>
                                                </p>
                                                <p class="card-text">
                                                    <small
                                                        class="text-muted">{{$application->created_at->diffForHumans() ?? ''}}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane show" id="detail-tab" role="tabpanel">
                            @includeIf('emap::inc.map_show')
                        </div>

                        <div class="tab-pane" id="map-registration-tab" role="tabpanel">

                                @includeIf('emap::admin.map.map-registration.print')


                        </div>

                        <div class="tab-pane" id="notice-tab" role="tabpanel">
                            <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem. Nulla consequat massa quis enim.</p>
                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                                justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                                mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean
                                vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                                ac, enim.</p>
                        </div>

                        <div class="tab-pane" id="rejected_application_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                @foreach($mapApply->mapApplyApplications->whereNotNull('rejected_at') as $application)
                                    <div class="col">
                                        <div class="card">
                                            <iframe class="card-img-top img-fluid" height="500" frameborder="0"
                                                    src="{{$application->file_url}}"></iframe>
                                            <div class="card-body">
                                                <h4 class="card-title">{{$application->file_type->label() ?? ''}}</h4>
                                                <p class="card-text mt-2">
                                                <form
                                                    action="{{route('emap.admin.map.mapApply.reject',[$mapApply,$application])}}"
                                                    method="POST" class="show_accept_confirm">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        @class([
                                                            "btn",
                                                            "btn-danger"=>empty($application->rejected_at),
                                                            "btn-success"=>!empty($application->rejected_at),
                                                            "btn-sm"])>
                                                        {{empty($application->rejected_at)? 'Reject Application' : 'Accept Application'}}
                                                    </button>
                                                </form>
                                                </p>
                                                <p class="card-text">
                                                    <small
                                                        class="text-muted">{{$application->created_at->diffForHumans() ?? ''}}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane" id="organization_tab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                <table class="table table-sm mb-0 table-striped table-hover">
                                    <tr>
                                        <th>नाम</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_name_ne ?? ''}}
                                            ({{$mapApply->organization->organizationDetail->org_name_en ?? ''}})
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>इमेल</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_email ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>फोन</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_contact ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>लिङ्ग</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_registration_no ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>इमेल</th>
                                        <td>{{$mapApply->organization->organizationDetail->org_pan_no ?? ''}}</td>
                                    </tr>

                                    <tr>
                                        <th>ठेगाना</th>
                                        <td>{{$mapApply->organization->organizationDetail->localBody->local_body ?? ''}}
                                            -{{$mapApply->organization->organizationDetail->ward ?? ''}}
                                            , {{$mapApply->organization->organizationDetail->tole ?? ''}}
                                            , {{$mapApply->organization->organizationDetail->district->district ?? ''}}
                                            , {{$mapApply->organization->organizationDetail->province->province ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a href="{{route('emap.admin.organization.show',$mapApply->organization_id)}}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"> पुरा विवरण हेर्नुहोस</i>
                                            </a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सूचनाहरु</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('emap.admin.map.map-apply.notice.office-letter',$mapApply)}}" class="btn btn-sm btn-outline-primary">संघियारको नाममा जारी भएको सूचना</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.notice-letter',$mapApply)}}" class="btn btn-sm btn-outline-primary">१५ दिने सूचना टाँस सम्बन्धमा</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.map-arrears',$mapApply)}}" class="btn btn-sm btn-outline-primary">नक्सा पासको लागि १५ दिने टाँस मुचुल्का</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.land-arrears',$mapApply)}}" class="btn btn-sm btn-outline-primary">सरजमिन मुचुल्का</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.technician-notice',$mapApply)}}" class="btn btn-sm btn-outline-primary">प्राविधिक प्रतिवेदन</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.ch-agreement',$mapApply)}}" class="btn btn-sm btn-outline-primary">सम्झौता पत्र (सुपरिवेक्षक/कन्सल्टेन्ट तथा घरधनी बीच)</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.agent-agreement',$mapApply)}}" class="btn btn-sm btn-outline-primary">सम्झौता पत्र (घरधनी र निर्माणकर्मी/ठेकेदार)</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.permission-letter',$mapApply)}}" class="btn btn-sm btn-outline-primary">टिप्पणी र आदेश</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.level',$mapApply)}}" class="btn btn-sm btn-outline-primary">प्लिन्थ लेभलसम्म निर्माण कार्यको ईजाजत पत्र</a>
                    <a href="{{route('emap.admin.map.map-apply.notice.supervisor',$mapApply)}}" class="btn btn-sm btn-outline-primary">सुपरस्ट्रक्चर सम्म निर्माणको सुपरिवेक्षण प्रतिवेदन</a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('.show_reject_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();

                swal.fire({

                    title: "Are You Sure to reject this application ? ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    confirmButtonText: "Reject",
                    dangerMode: true,

                })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            form.submit();
                        }
                    });
            });
            $('.show_accept_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();

                swal.fire({

                    title: "Are You Sure to accept this application ? ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    confirmButtonText: "Accept",
                    dangerMode: true,

                })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
@endsection

