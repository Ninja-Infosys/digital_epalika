@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">सिफारिस सेटिंग </h4>
                <div class="">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                    alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस सेटिंग</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-3 p-0">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">सिफारिस सेटिंग</h4>
                        {{-- <a href="{{ route('admin.recommendation.setting.sifarisPassGroup.index') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i>सूची
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('admin.recommendation.setting.sipharisSetting.store',$sipharisSetting) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="approver_id" class="form-label">अनुमोदनकर्ता</label>
                            <select id="approver_id" name="approver_id" class="form-select">
                                <option value="">-- छान्नुहोस् --</option>
                                @if ($sipharisSetting)
                                @foreach ($users as $user)
                                <option
                                value="{{ $user->id }}"{{ $sipharisSetting->approver_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name ?? '' }}
                            </option>
                                @endforeach
                            @endif
                            </select>
                            @error('approver_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="checker_id" class="form-label">परीक्षक</label>
                            <select id="checker_id" name="checker_id" class="form-select">
                                <option value="">-- छान्नुहोस् --</option>
                                @if ($sipharisSetting)
                                @foreach ($users as $user)
                                <option
                                value="{{ $user->id }}"{{ $sipharisSetting->checker_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name ?? '' }}
                            </option>
                                @endforeach
                            @endif
                            </select>
                            @error('checker_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
