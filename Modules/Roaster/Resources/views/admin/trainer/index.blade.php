@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.roaster.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.roaster.trainer.index')}}">प्रशिक्षक</a>
                        </li>
                        <li class="breadcrumb-item">
                            प्रशिक्षकहरु
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">प्रशिक्षकहरु</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रशिक्षकहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.सं</th>
                                <th>फोटो</th>
                                <th>नाम</th>
                                <th>विभाग</th>
                                <th>पद</th>
                                <th>कार्यालय</th>
                                <th>स्वीकृत</th>
                                <th>सम्पर्क</th>
                                <th class="text-center">#</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($trainers as $trainer)
                                <tr>
                                    <td>{{$loop->iteration ?? ''}}</td>
                                    <td><img src="{{$trainer->photo_url ?? ''}}" alt="{{$trainer->name ?? ''}}" height="100" width="100" class="img-fluid avatar-md rounded-circle"></td>
                                    <td>{{$trainer->name ?? ''}}</td>
                                    <td>{{$trainer->department->title ??''}}</td>
                                    <td>{{$trainer->designation->title ??''}}</td>
                                    <td>{{$trainer->office ??''}}</td>
                                    <td>

                                        <a href="">
                                            <i class="fa fa-2x fa-{{($trainer->approved_at==null) ? 'toggle-off text-danger' : 'toggle-on text-success'}}"></i>
                                        </a>

                                    </td>
                                    <td>
                                        @if($trainer->phone)
                                            <i class="fa fa-phone"></i> {{$trainer->phone}} <br>
                                        @endif
                                        @if($trainer->email)
                                            <i class="fa fa-envelope"></i> {{$trainer->email}}
                                        @endif
                                    </td>

                                    <td>
                                        @can('trainer_access')
                                            <a data-bs-type="edit" href="{{route('admin.roaster.trainer.show', $trainer)}}"
                                               class="btn btn-xs btn-outline-info {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                            @can('trainer_edit')
                                            <a data-bs-type="edit" href="{{route('admin.roaster.trainer.edit', $trainer)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $trainers->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
