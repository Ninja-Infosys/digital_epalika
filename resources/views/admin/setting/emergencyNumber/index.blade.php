@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">आपतकालीन सम्पर्क विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">आपतकालीन सम्पर्क विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> आपतकालीन सम्पर्क सूची</h4>
                        @can('emergencyNumber_create')
                            <a href="{{route('admin.generalSetting.emergencyNumber.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>प्रकार</th>
                                <th>शिर्षक</th>
                                <th>आपतकालीन सम्पर्क नं.</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($EmergencyNumbers as $EmergencyNumber)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$EmergencyNumber->type}}</td>
                                    <td>{{$EmergencyNumber->title}}</td>
                                    <td>{{$EmergencyNumber->contact_no}}</td>

                                    <td>
                                        @can('emergencyNumber_edit')
                                            <a data-bs-type="edit" href="{{route('admin.generalSetting.emergencyNumber.edit', $EmergencyNumber)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('emergencyNumber_delete')
                                            <form action="{{route('admin.generalSetting.emergencyNumber.destroy', $EmergencyNumber)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">जातियतामा कुनै डाटा उपलब्ध छैन !!!</td>
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
