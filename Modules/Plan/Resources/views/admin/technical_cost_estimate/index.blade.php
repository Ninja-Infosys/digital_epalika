@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.project.index') }}">
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
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        {{ $project->project_name }}को प्राविधिक लागत अनुमान
                    </h4>
                    <a href="{{ route('admin.plan.project.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-list"></i> योजना/कार्यक्रमहरू
                    </a>
                </div>
                <div class="card-body">
                    <form id="technical-cost" action="#" method="post">
                        <fieldset class="my-2">
                            <legend>योजनाबाट प्रत्यक्ष रुपमा लाभान्वित हुने घरधुरी तथा जनसंख्याको विवरण</legend>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label for="technical" class="form-label fw-bold">घरधुरी तथा जनसंख्याको विवरण <span
                                        class="text-danger">*</span></label>
                                <button type="button" class="btn btn-xs btn-outline-info" data-target-element="technical"
                                    data-toggle="add-more">
                                    <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                </button>
                            </div>
                            <div id="technical">
                                <div class="main">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            data-toggle="remove-parent" data-parent=".main" data-target-element="technical">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="row border-bottom mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label for="detail" class="form-label">विवरण</label>
                                            <input type="text" name="detail" class="form-control"
                                                placeholder="विवरण" />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="quantity" class="form-label">परिमाण</label>
                                            <input type="number" name="quantity" class="form-control"
                                                placeholder="परिमाण" />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="unit_id" class="form-label">एकाई</label>
                                            <select name="unit_id" class="form-select">
                                                <option value="">छान्नुहोस्</option>
                                                @foreach ($units as $unit)
                                                <option value="{{$unit->id}}">
                                                    {{$unit->title}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="rate" class="form-label">दर</label>
                                            <input type="number" name="rate" class="form-control"
                                                placeholder="दर" />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="amount" class="form-label">जम्मा</label>
                                            <input type="number" name="other_households_no" class="form-control"
                                                placeholder="जम्मा" />
                                        </div> 
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
