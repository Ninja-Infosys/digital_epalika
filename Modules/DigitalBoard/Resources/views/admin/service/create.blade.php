@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digitalBoard.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सेवा</li>
                    </ol>
                </div>
                <h4 class="page-title">सेवा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सेवा थप्नुहोस्</h4>
                        <a href="{{route('admin.digitalBoard.service.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सेवा सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.digitalBoard.service.store')}}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="branch_id" class="form-label">शाखा *</label>
                                <select
                                    name="branch_id"
                                    class="form-select @error('branch_id') is-invalid @enderror"
                                    id="branch_id">
                                    <option value="">छान्नुहोस्</option>
                                    @foreach($mainBranches as $mainBranch)
                                        <option {{$mainBranch->id===old('branch_id') ? 'selected' : ''}}
                                                value="{{$mainBranch->id}}">
                                            {{$mainBranch->branch_name}}
                                        </option>
                                        @foreach($mainBranch->branches as $branch)
                                            <option
                                                {{$branch->id===old('branch_id') ? 'selected' : ''}}
                                                value="{{$branch->id}}">
                                                &nbsp;&nbsp;
                                                - - {{$branch->branch_name}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="service_name" class="form-label">सेवा नाम *</label>
                                <input
                                    type="text"
                                    name="service_name"
                                    value="{{old('service_name')}}"
                                    class="form-control @error('service_name') is-invalid @enderror"
                                    id="service_name"
                                    placeholder="सेवा नाम"
                                />
                                @error('service_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="time_taken" class="form-label">लाग्ने समय *</label>
                                <input
                                    type="text"
                                    name="time_taken"
                                    value="{{old('time_taken')}}"
                                    class="form-control @error('time_taken') is-invalid @enderror"
                                    id="time_taken"
                                    placeholder="लाग्ने समय "
                                />
                                @error('time_taken')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="responsible_officer" class="form-label">जिम्मेवार अधिकारी *</label>
                                <input
                                    type="text"
                                    name="responsible_officer"
                                    value="{{old('responsible_officer')}}"
                                    class="form-control @error('responsible_officer') is-invalid @enderror"
                                    id="responsible_officer"
                                    placeholder="लाग्ने समय "
                                />
                                @error('responsible_officer')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="office" class="form-label">कोठा नम्बर /कार्यालय *</label>
                                <input
                                    type="text"
                                    name="office"
                                    value="{{old('office')}}"
                                    class="form-control @error('office') is-invalid @enderror"
                                    id="office"
                                    placeholder="नम्बर /कार्यालय"
                                />
                                @error('office')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label for="important-document" class="form-label">आबश्यक कागजात *</label>
                                    <button
                                        type="button"
                                        class="btn btn-xs btn-outline-info"
                                        data-toggle="add-more"
                                        data-content='<div class="row align-items-center gap-1 mb-2">
								<div class="col">
									<input type="text" class="form-control" placeholder="शीर्षक" name="serviceDocuments[][description]">
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="fa fa-times"></i>
									</button>
								</div>
							</div>' data-target=".important-document">
                                       <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                    </button>
                                </div>
                                <div class="important-document"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                <label for="process" class="form-label">उपलब्ध गराउने प्रक्रिया *</label>
                                    <button
                                        type="button"
                                        class="btn btn-xs btn-outline-info"
                                        data-toggle="add-more"
                                        data-content='<div class="row align-items-center gap-1 mb-2">
								<div class="col">
									<input type="text" class="form-control" placeholder="शीर्षक" name="serviceProcesses[][description]">
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="fa fa-times"></i>
									</button>
								</div>
							</div>' data-target=".process"><i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्</button>
                                </div>
                                <div class="process"></div>
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
