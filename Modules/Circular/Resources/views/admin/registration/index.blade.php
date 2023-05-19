@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">दर्ता पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('registration_create')
                                <a href="{{route('admin.circular.registration.create')}}"
                                   class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता न.</th>
                                <th>दर्ता मिति</th>
                                <th>पत्र संख्या</th>
                                <th>पठाउने कार्यालयको नाम</th>
                                <th>बुझिलिनेको नाम</th>
                                <th>बिषय</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($registrations as $registration)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$registration->registration_number}}</td>
                                    <td>{{$registration->registration_date}}</td>
                                    <td>{{$registration->letter_number}}</td>
                                    <td>{{$registration->sender_name}}</td>
                                    <td>{{$registration->receiver_name}}</td>
                                    <td>{{$registration->subject}}</td>
                                    <td>
                                        @if(auth()->user()->branch_id==$registration->branch_id)
                                            <form
                                                action="{{route('admin.circular.registration.updateStatus',$registration)}}"
                                                method="post" >
                                                @csrf
                                                @method('put')
                                                <div class="input-group">
                                                        <select class="form-select form-select-sm" name="status"
                                                                {{$registration->status=='accept' ? 'disabled':''}}
                                                                    >
                                                            <option value=""  >--- छान्नुहोस् ---</option>
                                                            <option value="pending"
                                                                {{ $registration->status == 'pending' ? 'selected' : '' }}>
                                                                प्रक्रियामा</option>
                                                            <option value="accept"
                                                                {{ $registration->status == 'accept' ? 'selected' : '' }}>स्वीकार
                                                            </option>
                                                            <option value="reject"
                                                                {{ $registration->status == 'reject' ? 'selected' : '' }}>
                                                                अस्वीकार</option>
                                                        </select>

                                                    <button   @if($registration->status=='accept') disabled @endif class="btn btn-sm btn-outline-primary" type="submit">पेश
                                                        गर्नुहोस्</button>
                                                </div>

                                            </form>
                                        @else
                                            <span class="badge badge-pill badge-primary"
                                                  style="color: blue;border: 1px solid;">
                                            {{$registration->status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a data-bs-type="edit"
                                           href="{{route('admin.circular.registration.show',$registration)}}"
                                           title="थप हेर्नुहोस्"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin') ? 'confirm_pin':''}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('registration_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.circular.registration.edit',$registration)}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin') ? 'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('registration_delete')
                                            <form
                                                action="{{route('admin.circular.registration.destroy',$registration)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin' : 'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
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
                        {{ $registrations->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
