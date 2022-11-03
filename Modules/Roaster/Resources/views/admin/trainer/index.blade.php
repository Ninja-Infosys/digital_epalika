@extends('admin.layouts.master')
@section('content')
    <div class="">
        <div class="page-title d-flex justify-content-between">
            <h5>प्रसिक्षकहरु</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a></li>
                    <li class="breadcrumb-item active" aria-current="page">प्रसिक्षकहरुको विवरण</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6>प्रसिक्षकहरुको विवरण</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                            <th></th>
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

                                <td class="d-flex justify-center">
                                    <a href="{{route('admin.roaster.trainer.show', $trainer)}}" type="button"
                                       class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.roaster.trainer.edit', $trainer)}}" type="button"
                                       class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Data not found !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
