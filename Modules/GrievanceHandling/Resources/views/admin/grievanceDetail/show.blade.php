@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grievanceHandling.grievanceDetail.index') }}">गुनासो बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो बिबरण</li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो बिबरण </h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"><b>टोकन : </b>{{ $grievanceDetail->token }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="header-title"><b>बिषय : </b>{{ $grievanceDetail->subject }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="header-title"><b>शाखा</b>
                                : {{ $grievanceDetail->grievanceOffice->title ?? '' }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="header-title"><b>गुनासो हेर्ने अधिकारी</b>
                                : {{ $grievanceDetail->assignedUser->name ?? '' }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="header-title"><b>प्रकाशकको ​​नाम</b>
                                : {{ $grievanceDetail->publisher->name ?? '' }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-inline"
                                action="{{ route('admin.grievanceHandling.grievanceDetail.updateStatus', $grievanceDetail->id) }}"
                                method="post">
                                @method('put')
                                @csrf
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label text-black"><b>स्थिति</b></label>
                                    <select name="status" class="form-control mt-1" id="grievanceDetailStatus">
                                        @foreach (\Modules\GrievanceHandling\Enums\GrievanceStatus::cases() as $status)
                                            <option value="{{ $status->value }}"
                                                {{ $status == $grievanceDetail->status ? 'selected' : '' }}>
                                                {{ $status->label() }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mt-3"><b>दर्ता स्थिति:</b> <a
                                    href="{{ route('admin.grievanceHandling.grievanceDetail.approve', $grievanceDetail) }}"
                                    @class([
                                        'mx-2',
                                        'px-3',
                                        'text-white',
                                        'btn btn-lg ',
                                        'bg-success' => $grievanceDetail->is_approved == 1,
                                        'bg-danger' => $grievanceDetail->is_approved == 0,
                                    ])><i @class([
                                        'fa',
                                        'fa-check' => $grievanceDetail->is_approved == 1,
                                        'fa-window-close' => $grievanceDetail->is_approved == 0,
                                    ])></i></a>
                                {{ $grievanceDetail->is_approved == 1 ? 'निसक्रिय गर्नुहोस' : 'सक्रिय गर्नुहोस' }}
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mt-3"> <b>सार्वजनिक गरेको स्थिति:</b> <a
                                    href="{{ route('admin.grievanceHandling.grievance-detail.show-to-public', $grievanceDetail) }}"
                                    @class([
                                        'mx-2',
                                        'px-3',
                                        'text-white',
                                        'btn btn-lg',
                                        'bg-success' => $grievanceDetail->is_public == 1,
                                        'bg-danger' => $grievanceDetail->is_public == 0,
                                    ])><i @class([
                                        'fa',
                                        'fa-check' => $grievanceDetail->is_public == 1,
                                        'fa-window-close' => $grievanceDetail->is_public == 0,
                                    ])></i></a>
                                {{ $grievanceDetail->is_approved == 1 ? 'निसक्रिय गर्नुहोस' : 'सक्रिय गर्नुहोस' }}
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="d-flex justify-content between">
                                    <div class="col-md-6">
                                        <h4 class="text-decoration-underline mt-4">
                                            <b> प्रयोगकर्ता विवरण</b>
                                        </h4>
                                        <h4 class="mt-2"><b>नाम :-
                                            </b>{{ $grievanceDetail->grievanceUser->name ?? '' }}</h4>
                                        <h4 class="mt-2"><b>ईमेल :-
                                            </b>{{ $grievanceDetail->grievanceUser->email ?? '' }}</h4>
                                        <h4 class="mt-2"><b>सम्पर्क नं :-</b>
                                            {{ $grievanceDetail->grievanceUser->phone ?? '' }}</h4>
                                        <h4 class="mt-2"><b>ठेगाना :-
                                            </b>{{ $grievanceDetail->grievanceUser->address ?? '' }}</h4>
                                        <h4 class="mb-1"><b>गुनासो गम्भीरता
                                                :</b>{{ $grievanceDetail->complaint_severity->label() }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-decoration-underline mt-3 fw-bold">
                                गुनासो तोकिएको इतिहास
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>क्र.सं.</th>
                                            <th>मिति</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grievanceDetail->grievanceAssignHistories as $history)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <x-ad-to-bs
                                                id="assigned_at{{ $loop->iteration }}"
                                                :adDate="$history->assigned_at->toDateString()"
                                                />
                                                {{ $history->assigned_at->format('g:i A') }}
                                            </td>
                                            <td>{{ empty($history->grievanceDetail->grievance_detail_id) ? ($grievanceDetail->grievanceUser->name??'') : ($history->fromUser->name??'') }}</td>
                                            <td>{{ $history->user->name??'' }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-7 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12 mx-10">
                                    <div class="row">
                                        <div
                                            class="grievanceChat mt-2 border border-dark shadow rounded px-2 h-50 overflow-auto">
                                            <div id="chat">
                                                <div class="my-2 p-2" style="height:100vh;overflow-y:scroll;">
                                                    <div class="border rounded p-2">
                                                        <div class="d-flex justify-content-end my-3 border p-2 rounded">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <img class="order-2"
                                                                    src="{{ $grievanceDetail->grievanceUser->avatar ?? '' }}" alt="avatar 1"
                                                                    height="50">
                                                                <div class="order-1">
                                                                    <p class="small">{{ $grievanceDetail->grievanceUser->name ?? '' }}</p>
                                                                    <p class="small text-muted">
                                                                        {{ $grievanceDetail->created_at?->calendar() }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                            <h6 class="p-2 me-3 mb-1 rounded bg-light">
                                                                {{ $grievanceDetail->description }}</h6>
                                                            @foreach ($grievanceDetail->files as $file)
                                                                <a class="me-3 btn btn-primary btn-sm" href="{{ $file->file_url }}"
                                                                    download="{{ $file->file_url }}">
                                                                    {{ $file->file_name }} <i class="fa fa-download"></i>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @foreach ($grievanceDetail->grievanceDetails as $detail)
                                                        @if (!empty($detail->user_id))
                                                            <div class="border rounded p-2">
                                                                <div
                                                                    class="d-flex justify-content-start my-3 border p-2 rounded">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img class="order-1"
                                                                            src="{{ $detail->user->avatar ?? '' }}"
                                                                            alt="avatar 1" height="50">
                                                                        <div class="order-2">
                                                                            <p class="small">
                                                                                {{ $detail->user->name ?? '' }}</p>
                                                                            <p class="small text-muted">
                                                                                {{ $detail->created_at?->calendar() }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column align-items-start">
                                                                    <h6 class="p-2 ms-3 mb-1 rounded bg-light">
                                                                        {{ $detail->description }}</h6>
                                                                    @foreach ($detail->files as $detailFile)
                                                                        <a class="me-3 btn btn-primary btn-sm"
                                                                            href="{{ $detailFile->file_url }}"
                                                                            download="{{ $detailFile->file_url }}">
                                                                            {{ $detailFile->file_name }} <i
                                                                                class="fa fa-download"></i>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="border rounded p-2">
                                                                <div
                                                                    class="d-flex justify-content-end my-3 border p-2 rounded">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img class="order-2"
                                                                            src="{{ $detail->grievanceUser->avatar ?? '' }}"
                                                                            alt="avatar 1" height="50">
                                                                        <div class="order-1">
                                                                            <p class="small">
                                                                                {{ $detail->grievanceUser->name ?? '' }}
                                                                            </p>
                                                                            <p class="small text-muted">
                                                                                {{ $detail->created_at?->calendar() }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column align-items-end">
                                                                    <h6 class="p-2 me-3 mb-1 rounded bg-light">
                                                                        {{ $detail->description }}</h6>
                                                                    @foreach ($detail->files as $detailFile)
                                                                        <a class="me-3 btn btn-primary btn-sm"
                                                                            href="{{ $detailFile->file_url }}"
                                                                            download="{{ $detailFile->file_url }}">
                                                                            {{ $detailFile->file_name }} <i
                                                                                class="fa fa-download"></i>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <form enctype="multipart/form-data"
                                                action="{{ route('admin.grievanceHandling.grievanceDetail.replyGrievance', $grievanceDetail->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="d-flex justify-content-start align-items-center my-4 p-2">
                                                    <input type="text" class="form-control flex-shrink-1"
                                                        name="description" id="description" placeholder="Type message">
                                                    <div class="flex-shrink-0 text-center">


                                                        <input type="file" id="upload" name="files[]" multiple
                                                            hidden />
                                                        <label class="ms-1 text-muted" for="upload"><i
                                                                class="fas fa-paperclip"></i></label>



                                                        <button type="submit" class="btn bg-white ms-3 link-info"
                                                            href="#"><i class="fas fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            @error('files.*')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('files')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    @push('style')
        <style>
            .message {
                border: 2px solid #dedede;
                background-color: #f1f1f1;
                border-radius: 5px;
                /*width: 70%;*/
                padding: 10px;
                margin: 10px 0;
                height: 200px;
            }


            label {
                display: inline-block;
                font-family: sans-serif;
                border-radius: 0.3rem;
                cursor: pointer;
                margin-top: 1rem;
            }



            .darker {
                border-color: #ccc;
                background-color: #ddd;
            }

            .message::after {
                content: "";
                clear: both;
                display: table;
            }

            .message img {
                float: left;
                max-width: 60px;
                width: 100%;
                margin-right: 20px;
                border-radius: 50%;
            }

            .message img.right {
                float: right;
                margin-left: 20px;
                margin-right: 0;
            }

            .time-right {
                float: right;
                color: #aaa;
            }

            .time-left {
                float: left;
                color: #999;
            }
        </style>
    @endpush
@endsection
