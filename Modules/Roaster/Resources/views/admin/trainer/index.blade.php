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
                            प्रशिक्षकहरुको विवरण
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">प्रशिक्षकहरुको विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रशिक्षक सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>क्र.सं</th>
                                <th>फोटो</th>
                                <th>नाम</th>
                                <th>विभाग</th>
                                <th>पद</th>
                                <th>कार्यालय</th>
                                <th>Approved</th>
                                <th>सम्पर्क</th>
                                <th class="text-center">कार्य</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($trainers as $trainer)
                                <tr>
                                    <td>{{$loop->iteration ?? ''}}</td>
                                    <td><img src="{{$trainer->photo_url ?? ''}}" alt="{{$trainer->name ?? ''}}" height="100" width="100"></td>
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
                                            <a href="{{route('admin.roaster.trainer.show', $trainer)}}"
                                               class="btn btn-xs btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                            @can('trainer_edit')
                                            <a href="{{route('admin.roaster.trainer.edit', $trainer)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('trainer_delete')
                                            <form action="{{route('admin.roaster.trainer.delete', $trainer)}}"
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
                                    <td colspan="7" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
