@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान क्रियाकलाप</li>
                    </ol>
                </div>
                <h4 class="page-title">अनुदान क्रियाकलाप</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अनुदान क्रियाकलाप थप्नुहोस </h4>
                        <a href="{{route('admin.grant.grantActivity.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> अनुदान क्रियाकलाप सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.grantActivity.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="grant_recipient_type">अनुदानग्रहिको प्रकार *</label>
                                            <select name="grant_recipient_type" id="grant_recipient_type"
                                                    class="form-control">
                                                <option value="">अनुदानग्राहीको प्रकार छान्नुहोस्</option>
                                                @foreach(\Modules\Grant\Enums\GrantRecipientTypeEnum::cases() as $grantRecipientType)
                                                    <option
                                                        {{$grantRecipientType->value==old('grant_recipient_type') ? 'selected' : ''}}
                                                        value="{{$grantRecipientType->value}}">
                                                        {{$grantRecipientType->label()}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">अनुदानको प्रकार *</label>
                                        <input
                                            type="text"
                                            name="title"
                                            value="{{old('title')}}"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="title"
                                            placeholder="अनुदानको  प्रकार"
                                        />
                                        @error('title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
