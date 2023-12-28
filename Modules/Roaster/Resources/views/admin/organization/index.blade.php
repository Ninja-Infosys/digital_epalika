@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">
                            <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item active">संगठन</li>
                </ol>
            </div>
            <h4 class="page-title">दर्ता भएका संगठनहरु </h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card p-0">
            <div class="card-header search-card">
            <div class="d-flex align-items-center justify-content-between">
            <h4 class="header-title mb-0">दर्ता भएका संगठनहरु</h4>
            <div class="d-flex flex-wrap align-items-center">
                @includeIf('inc.filter_form')

                <a href="{{ route('admin.digitalBoard.video.create') }}"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>

            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="responsive-table-design">
            <div class="table-rep-design">
                <div id="responsive-table" class="table-responsive" data-pattern="priority-columns">
                    <div class="table-responsive">
                        <table class="table table-sm table-custom">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>संगठनको नाम</th>
                                    <th>ठेगाना</th>
                                    <th>संस्थापकको नाम</th>
                                    <th>इमेल</th>
                                    <th>फोन</th>


                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($organizations as $organization)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$organization->traineeUserDetail->org_name_ne ?? ''}}</td>
                                    <td>{{$organization->traineeUserDetail->province->province??'' }},
                                        {{$organization->traineeUserDetail->district->district??'' }}</td>
                                    <td>{{$organization->name}}</td>
                                    <td>{{$organization->email}}</td>
                                    <td>{{$organization->phone}}</td>

                                    <td class="d-flex flex-wrap">

                                        <a href="{{route('admin.roaster.organization.update-login-status',$organization)}}" class="rounded-1 btn me-1 btn-xs btn-outline-{{$organization->is_active==1 ?'primary':'danger'}}" title="लग इन {{$organization->is_active==1 ?'गर्न मिल्छ':'गर्न मिल्दैन'}}">
                                            <i class="fa  {{$organization->is_active==1 ?' fa-check':'fa-window-close'}}"></i>
                                        </a>

                                        <a href="{{route('admin.roaster.organization.show',$organization)}}" title="हेर्नुहोस्" class="rounded-1 btn me-1 btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <form data-bs-type="delete" action="{{route('admin.roaster.organization.destroy',$organization)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="rounded-1 btn btn-xs btn-outline-danger show_confirm {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
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
                                    <td class="text-center" colspan="8">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $organizations->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
