@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right text-white"></i>
                        <a href="{{route('mapTrack')}}" class=" text-primary-500 text-center">नक्सा ट्रयाक</a>
                        <i class="fa fa-angle-double-right text-white"></i>
                        <a href="{{route('formDetails')}}" class=" text-primary-500 text-center">नक्सा विवरण</a>
                        <i class="fa fa-angle-double-right text-white"></i>
                        <a class=" text-primary-500 text-center">विवरण भर्नुहोस्</a>
                    </div>
                </div>
                <h4 class="fw-semibold text-center">विवरण भर्नुहोस्</h4>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card-body p-3">
                <form id="show_popup" action="{{route('store-emap-template-data',[$mapApply,$noticeTypeEnum])}}"
                      method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="data">डाटा</label>
                            <textarea class="form-control ckEditor" placeholder="डाटा" name="data" id="data" cols="50"
                                      rows="10">{{old('data',($mapApply->applyMapNotices->first()?->data ?? $mapApply->getSpecificTemplateData($noticeTypeEnum) ?? ''))}}</textarea>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-end pt-3">
                        <button type="submit" class="btn btn-sm btn-primary ">पेश गर्नुहोस्</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $('#show_popup').submit(function (event) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var form = $(this).closest("form");
                event.preventDefault();

                $(document.body).delegate("#storeBankForm","submit",function(e){
                    e.preventDefault();
                    var form_data=new FormData(this);

                    $.ajax({
                        type:"post",
                        url:$(this).attr("route_action"),
                        data:form_data,
                        processData: false,
                        contentType: false,
                        beforeSend:function(){
                            $("#storeBankBtn").attr("disabled",true);
                        },
                        success:function(resp){
                            $("#yield-content").html(resp.view);
                            toastr.success(resp.alert_message);
                        },
                        error:function(XMLHttpRequest, textStatus, errorThrown){
                            $("#storeBankBtn").attr("disabled",false);
                            if(XMLHttpRequest.status==422){
                                $.each(XMLHttpRequest.responseJSON.errors,function(prefix,value){
                                    $('span.'+prefix+'-error').text(value);
                                });
                            }
                            else{
                                alert("Something Went Wrong");
                            }
                        },
                        complete:function(){
                            $("#storeBankBtn").attr("disabled",false);
                        },
                        timeout:10000
                    });
                });





                swal.fire({
                    title: "OTP कोड राख्नुहोस्",
                    input: 'text',
                    inputPlaceholder: '६ अंकको ओ.टि.पी. कोड राख्नुहोस्',
                    icon: "edit",
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    confirmButtonText: "पेश गर्नुहोस्",
                    cancelButtonText: "रद्द गर्नुहोस्",
                    dangerMode: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'कृपया ओ.टि.पी. कोड राख्नुहोस् !'
                        }
                    }

                })
                    .then((data) => {
                        if (data.value) {
                            $("#otp").val(data.value)
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush

    @push('style')
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
    @endpush
@endsection

