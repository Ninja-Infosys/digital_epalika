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
                        <li class="breadcrumb-item active">योजना/कार्यक्रम विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">योजना/कार्यक्रम विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">१) आयोजनाको विवरण</h4>
                </div>
                <div class="card-body">
                    @livewire('plan::project-detail-livewire',['project'=>$project])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">२. आयोजनाको लागत सम्वन्धि विवरण</h4>
                </div>
                <div class="card-body">
                    @livewire('plan::project-cost-detail-livewire',['project_id'=>$project->id])
                </div>
            </div>
        </div>
    </div>
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">
                            ३. बोलपत्र सम्वन्धि विवरण
                        </h4>
                    </div>
                    <div class="card-body">
                        @livewire('plan::bid-detail-livewire',['project'=>$project])
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">३. उपभोक्ता समिति/समुदायमा आधारित संस्था/गैरसरकारी संस्थाको विवरण</h4>
                    </div>
                    <div class="card-body">
                        @livewire('plan::consumer-committee-livewire',['project'=>$project])
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::BID)
        <div class="row">
            <div class="col-md-12">
                @livewire('plan::bid-submission-livewire',['project'=>$project])
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                @livewire('plan::installment-detail-livewire',['project'=>$project])
            </div>
        </div>
    @endif

    @if($project->operated_through===\Modules\Plan\Enums\ProjectOperatedThroughEnum::CONSUMER_COMMITTEE)
        <div class="row">
            <div class="col-md-12">
                @livewire('plan::project-bill-livewire',['project'=>$project])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">७. आयोजना मर्मत संम्भार सम्बन्धी व्यवस्था</h4>
                    </div>
                    <div class="card-body">
                        @livewire('plan::maintenance-arrangement-livewire',['project'=>$project])
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">६. सम्झौताको शर्तहरु</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.plan.save-project-agreement-term',$project)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="data" class="form-label">डाटा *</label>
                                    <textarea name="data"
                                              id="data"
                                              cols="30" rows="10"
                                              class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data',$project->projectAgreementTerm->data??'')}}</textarea>
                                    @error('data')
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
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ५. सम्बन्धित कागजातहरू
                    </h4>
                    <a href="{{route('admin.plan.project.projectDocument.create',$project)}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle"> नयाँ कागजात थप्नुहोस्</i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>कागजातको नाम </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->projectDocuments as $document)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$document->document_name}}</td>
                                    <td>
                                        <a href="{{route('admin.plan.project.projectDocument.edit',[$project,$document])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @can('projectDocument_delete')
                                            <form action="{{route('admin.plan.project.projectDocument.destroy',[$project,$document])}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ६. आयोजनासँग सम्बन्धित अन्य कागजातहरु
                    </h4>
                    <a href="{{route('admin.plan.project.uploadFilePage',$project)}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle"> नयाँ थप्नुहोस्</i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फाइल नाम </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->files as $file)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('admin.file.download',$file)}}">
                                            <i class="fa fa-download"></i> {{$file->file_name}}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.file.destroy',$file)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    @push('style')--}}
{{--        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">--}}
{{--        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">--}}
{{--    @endpush--}}
{{--    @push('scripts')--}}
{{--        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>--}}
{{--        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>--}}
{{--    @endpush--}}
@endsection
