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
                                <th>अपाङ्गता परिचयपत्र नं.</th>
                                <th>परिचयपत्रको प्रकार</th>
                                <th>नाम</th>
                                <th>लिङ्ग</th>
                                <th> फोटो</th>
                                <th>नागरिकता नं.</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($disabilityIdentityCards as $disabilityIdentityCard)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$disabilityIdentityCard->card_no}}</td>
                                    <td>{{$disabilityIdentityCard->governmentalDisabilityType?->category->label()??''}}</td>
                                    <td>{{$disabilityIdentityCard->name}}</td>
                                    <td>{{$disabilityIdentityCard->gender->label()??''}}</td>
                                    <td>
                                        <img src="{{$disabilityIdentityCard->photo_url}}" alt="{{$disabilityIdentityCard->name??''}}" height="60">
                                    </td>
                                    <td>
                                        {{$disabilityIdentityCard->citizenship_no}}
                                    </td>

                                    <td>
                                        <a href="{{route('identity.admin.disabilityIdentityCard.show',$disabilityIdentityCard)}}"
                                           class="btn btn-xs btn-outline-primary" title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('identity.admin.disabilityIdentityCard.edit',$disabilityIdentityCard)}}"
                                           class="btn btn-xs btn-outline-primary" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('identity.admin.disabilityIdentityCard.destroy',$disabilityIdentityCard)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="javascript:void(0)"  route_action="{{route('identity.admin.disabilityIdentityCard.print',$disabilityIdentityCard)}}" class="btn btn-xs btn-outline-warning printDetail">
                                            <i class="fa fa-print"></i>

                                        </a>
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

    @push('scripts')
        <script>
            $(".printDetail").on("click",function(e){
                $.ajax({
                    method:"GET",
                    url:$(this).attr("route_action"),
                    success:function(resp){
                        var print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    },error:function(){
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush
@endsection


