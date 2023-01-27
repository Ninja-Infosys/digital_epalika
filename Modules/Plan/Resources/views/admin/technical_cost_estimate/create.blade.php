@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active">प्राविधिक लागत अनुमान</li>
                    </ol>
                </div>
                <h4 class="page-title">प्राविधिक लागत अनुमान</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">
                            प्राविधिक लागत अनुमान विवरण थप्नुहोस्
                        </h4>
                        <a href="{{route('admin.plan.project.technicalCostEstimate.index',$project)}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> प्राविधिक लागत अनुमान विवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.plan.project.technicalCostEstimate.store',$project)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="detail" class="form-label">विवरण *</label>
                                <input
                                    type="text"
                                    name="detail"
                                    value="{{old('detail')}}"
                                    class="form-control @error('detail') is-invalid @enderror"
                                    id="detail"
                                    placeholder="विवरण"
                                />
                                @error('detail')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="number" class="form-label">संख्या</label>
                                <input
                                    type="number"
                                    name="number"
                                    value="{{old('number')}}"
                                    class="form-control @error('number') is-invalid @enderror"
                                    id="number"
                                    placeholder="संख्या"
                                />
                                @error('number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="length" class="form-label">लम्बाई</label>
                                <input
                                    type="number"
                                    name="length"
                                    value="{{old('length')}}"
                                    class="form-control @error('length') is-invalid @enderror"
                                    id="length"
                                    placeholder="लम्बाई"
                                />
                                @error('length')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="breadth" class="form-label">चौडाई</label>
                                <input
                                    type="number"
                                    name="breadth"
                                    value="{{old('breadth')}}"
                                    class="form-control @error('breadth') is-invalid @enderror"
                                    id="breadth"
                                    placeholder="चौडाई"
                                />
                                @error('breadth')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="height" class="form-label">ऊचाई</label>
                                <input
                                    type="number"
                                    name="height"
                                    value="{{old('height')}}"
                                    class="form-control @error('height') is-invalid @enderror"
                                    id="height"
                                    placeholder="चौडाई"
                                />
                                @error('height')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="quantity" class="form-label">परिमाण *</label>
                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{old('quantity')}}"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity"
                                    placeholder="परिमाण"
                                />
                                @error('quantity')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="unit" class="form-label">इकाइ *</label>
                                <input
                                    type="text"
                                    name="unit"
                                    value="{{old('unit')}}"
                                    class="form-control @error('unit') is-invalid @enderror"
                                    id="unit"
                                    placeholder="इकाइ"
                                />
                                @error('unit')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="rate" class="form-label">दर *</label>
                                <input
                                    type="number"
                                    name="rate"
                                    value="{{old('rate')}}"
                                    class="form-control @error('rate') is-invalid @enderror"
                                    id="rate"
                                    placeholder="दर"
                                />
                                @error('rate')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
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
