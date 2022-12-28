@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अपाङ्गता परिचय पत्र</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्गता परिचय पत्र</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> अपाङ्गता परिचय पत्र सूची</h4>
                        <a href="{{route('identity.admin.disabilityIdentityCard.create')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>लिङ्ग</th>
                                <th> फोटो</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($disabilityIdentityCards as $disabilityIdentityCard)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$disabilityIdentityCard->name}}</td>
                                    <td>{{$disabilityIdentityCard->gender->label()??''}}</td>
                                    <td>
                                        <img src="{{$disabilityIdentityCard->photo_url}}" alt="{{$disabilityIdentityCard->name??''}}" height="60">
                                    </td>

                                    <td>


                                        <a href="{{route('identity.admin.disabilityIdentityCard.edit',$disabilityIdentityCard)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form action="{{route('identity.admin.disabilityIdentityCard.destroy',$disabilityIdentityCard)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $disabilityIdentityCards->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


