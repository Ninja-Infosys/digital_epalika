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
                        <li class="breadcrumb-item active">जेष्ठ नागरिक</li>
                    </ol>
                </div>
                <h4 class="page-title">जेष्ठ नागरिक विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">जेष्ठ नागरिक सूची</h4>
                        <a href="{{route('identity.admin.seniorCitizenDetail.create')}}"
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
                                <th>कार्ड नं.</th>
                                <th>नाम</th>
                                <th>लिङ्ग</th>
                                <th>नागरिकता नं.</th>
                                <th> फोटो</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($seniorCitizenDetails as $seniorCitizenDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$seniorCitizenDetail->card_no}}</td>
                                    <td>{{$seniorCitizenDetail->name}}</td>
                                    <td>
                                        {{$seniorCitizenDetail->gender?->label()??''}}
                                    </td>
                                    <td>{{$seniorCitizenDetail->citizenship_no}}</td>
                                    <td>
                                        <img src="{{$seniorCitizenDetail->photo}}" alt="{{$seniorCitizenDetail->name??''}}" height="60">
                                    </td>

                                    <td>
                                        <a href="{{route('identity.admin.seniorCitizenDetail.edit',$seniorCitizenDetail)}}"
                                           class="btn btn-xs btn-outline-primary" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('identity.admin.seniorCitizenDetail.show',$seniorCitizenDetail)}}"
                                               class="btn btn-xs btn-outline-primary" title="हेर्नुहोस्">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{route('identity.admin.seniorCitizenDetail.destroy',$seniorCitizenDetail)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
{{--                                        <a href="javascript:void(0)"  route_action="{{route('identity.admin.disabilityIdentityCard.print',$disabilityIdentityCard)}}" class="btn btn-xs btn-outline-warning printDetail">--}}
{{--                                            <i class="fa fa-print"></i>--}}

{{--                                        </a>--}}
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
{{--                        {{ $seniorCitizenDetails->onEachSide(config('app.pagination_count'))->links() }}--}}
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


