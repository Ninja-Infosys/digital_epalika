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
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grievanceHandling.grievanceDetail.index')}}">गुनासो बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो बिबरण</li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो बिबरण </h4>
            </div>
        </div>
    </div>
    <style>
        .message {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            /*width: 70%;*/
            padding: 10px;
            margin: 10px 0;
            height: 150px;
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">टोकन : {{$grievanceDetail->token}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="header-title">बिषय : {{$grievanceDetail->subject}}</h4>
                            <h4 class="header-title">शाखा : {{$grievanceDetail->grievanceOffice->title??''}}</h4>
                            <h4>
                                स्थिति:
                                <form class="form-inline"
                                      action="{{route('admin.grievanceHandling.grievanceDetail.updateStatus',$grievanceDetail->id)}}"
                                      method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group mb-2">
                                        <select name="status" id="grievanceDetailStatus" class="form-control"
                                                style="width: 150px;">
                                            @foreach(config('defaults.status') as $key=> $status)
                                                <option
                                                    value="{{$status}}" {{$status==$grievanceDetail->status ? 'selected':''}}>{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                                </form>
                            </h4>

                        </div>
                        <div class="col-md-3">
                            <h4>
                                प्रयोग कर्ता
                            </h4>
                            {{$grievanceDetail->grievanceUser->name??''}}<br>
                            {{$grievanceDetail->grievanceUser->email??''}}<br>
                            {{$grievanceDetail->grievanceUser->phone??''}}<br>
                            {{$grievanceDetail->grievanceUser->address??''}}
                            <h4>गुनासो गम्भीरता :
                                @switch($grievanceDetail->complaint_severity)
                                    @case('High priority')
                                        उच्च प्राथमिकता
                                        @break
                                    @case('Priority')
                                        प्राथमिकता
                                        @break
                                    @default
                                        साधारण
                                @endswitch
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="message">
                                <img src="{{asset('assets/backend/images/user_icon.jpg')}}" alt="Avatar" style="width:100%;">
                                <p>{{$grievanceDetail->description}}</p>
                                @foreach($grievanceDetail->files as $file)
                                    <a href="{{$file->file_url}}" download="{{$file->file_url}}">&nbsp;
                                        File {{$loop->iteration}}</a>
                                @endforeach
                            </div>
                            @foreach($grievanceDetail->grievanceDetails as $details)
                                <div class="message darker">
                                    <img src="{{auth()->user()->profile_photo_url}}" alt="Avatar" class="right"
                                         style="width:100%;">
                                    <p>{{$details->description}}</p>
                                    @foreach($details->files as $file)
                                        <a href="{{$file->file_url}}" download="{{$file->file_url}}">&nbsp;
                                            File {{$loop->iteration}}</a>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <form enctype="multipart/form-data"
                          action="{{route('admin.grievanceHandling.grievanceDetail.replyGrievance',$grievanceDetail->id)}}"
                          method="post">
                        @csrf
                        <div class="form-group">
                            <label for="description">बिवरण</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                                      placeholder="बिवरण">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="files">डकुमेन्ट</label>
                            <input type="file" name="files[]" class="form-control" multiple>
                            @error('files.*')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            @error('files')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 mt-4">Save</button>
                    </form>


                </div>
            </div>

        </div>
    </div>
@endsection
