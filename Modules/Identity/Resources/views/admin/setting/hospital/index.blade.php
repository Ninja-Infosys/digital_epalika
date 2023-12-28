@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">सेटिङ</li>
                        <li class="breadcrumb-item active">अस्पताल</li>
                    </ol>
                </div>
                <h4 class="page-title">अस्पताल</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header search-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title">अस्पताल सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                        @includeIf('inc.filter_form')

                            <a href="{{route('identity.admin.setting.hospital.create')}}"
                            class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>

                    </div>
                </div>
                </div>
                <div class="card-body px-0">
                    <table class="table table-sm table-custom">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">नाम</th>
                            <th scope="col">फोन</th>
                            <th scope="col">इमेल</th>
                            <th scope="col">ठेगाना</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($hospitals as $hospital)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$hospital->name ?? ''}}</td>
                                <td>{{$hospital->phone ?? ''}}</td>
                                <td>{{$hospital->email ?? ''}}</td>
                                <td>{{$hospital->address ?? ''}}</td>
                                <td class="d-flex gap-1">
                                    <a data-bs-type="edit" href="{{route('identity.admin.setting.hospital.edit', $hospital)}}"
                                       type="button" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                                    </a>
                                    <form action="{{route('identity.admin.setting.hospital.destroy',$hospital)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
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
                                <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

