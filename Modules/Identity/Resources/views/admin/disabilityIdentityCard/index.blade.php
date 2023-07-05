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
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">अपाङ्गता परिचय पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                                <a href="{{route('identity.admin.disabilityIdentityCard.searchCitizenshipNo')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th> फोटो</th>
                                <th>नाम</th>
                                <th>लिङ्ग</th>

                                <th>नागरिकता नं.</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($disabilityIdentityCards as $disabilityIdentityCard)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{$disabilityIdentityCard->photo_url}}" height="60" alt="{{$disabilityIdentityCard->name}}">
                                    </td>
                                    <td>{{$disabilityIdentityCard->name}}</td>
                                    <td>{{$disabilityIdentityCard->gender->label()??''}}</td>
                                    <td>
                                        {{$disabilityIdentityCard->citizenship_no}}
                                    </td>
                                    <td>
                                        @if($disabilityIdentityCard->can_edit_delete)
                                        <a data-bs-type="edit" href="{{route('identity.admin.disabilityIdentityCard.show',$disabilityIdentityCard)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a data-bs-type="edit" href="{{route('identity.admin.disabilityIdentityCard.edit',$disabilityIdentityCard)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>

{{--                                            <a href="javascript:void(0)"  route_action="{{route('identity.admin.disabilityIdentityCard.print',$disabilityIdentityCard)}}" class="btn btn-xs btn-outline-warning printDetail">--}}
{{--                                                <i class="fa fa-print"></i>--}}

{{--                                            </a>--}}
                                            <a href="{{route('identity.admin.disabilityIdentityCard.printDetail',$disabilityIdentityCard)}}"   class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-print"></i>
                                            </a>

                                        <form action="{{route('identity.admin.disabilityIdentityCard.destroy',$disabilityIdentityCard)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif

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

{{--    @push('scripts')--}}
{{--        <script>--}}
{{--            $(".printDetail").on("click",function(e){--}}
{{--                $.ajax({--}}
{{--                    method:"GET",--}}
{{--                    url:$(this).attr("route_action"),--}}
{{--                    success:function(resp){--}}
{{--                        const print_area = window.open();--}}
{{--                        print_area.document.write(resp.view);--}}
{{--                        print_area.document.close();--}}
{{--                        print_area.focus();--}}
{{--                        print_area.print();--}}
{{--                        print_area.close();--}}
{{--                    },error:function(){--}}
{{--                        alert("Something Went Wrong");--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endpush--}}
@endsection


