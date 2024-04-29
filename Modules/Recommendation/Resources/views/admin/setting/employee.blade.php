@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">  सिफारिस </li>
                        <li class="breadcrumb-item active">सिफारिस जनप्रतिनिधि/कर्मचारीहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">सिफारिस जनप्रतिनिधि/कर्मचारीहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सिफारिस</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="{{route('admin.recommendation.setting.recommendationSetting.store')}}"
                        method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="approver_id" class="form-label">अनुमोदनकर्ता</label>
                                    <select id="approver_id" name="approver_id" class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach($users as $employee)
                                            <option
                                                {{$employee->id==old('approver_id',$recommendationSetting?->approver_id) ? 'selected' : ''}}
                                                value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('approver_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="checker_id" class="form-label">परीक्षक</label>
                                    <select id="checker_id" name="checker_id" class="form-select" required>
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach($users as $employee)
                                            <option
                                                {{$employee->id==old('checker_id',$recommendationSetting?->checker_id) ? 'selected' : ''}}
                                                value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('checker_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


