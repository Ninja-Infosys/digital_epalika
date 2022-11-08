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
            <div class="card-body p-3">
                <form action="" class="otp_verify_confirm">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="otp" name="otp">
                            <textarea class="form-control" name="" id="" cols="50" rows="10"></textarea>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-end pt-3">
                        <button type="submit" class="btn btn-sm btn-primary">पेश गर्नुहोस्</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $('.otp_verify_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();

                swal.fire({

                    title: "OTP कोड राख्नुहोस्",
                    input: 'text',
                    inputPlaceholder: '४ अंकको ओ.ती.पी. कोड राख्नुहोस्',
                    icon: "edit",
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    confirmButtonText: "पेश गर्नुहोस्",
                    cancelButtonText: "रद्द गर्नुहोस्",
                    dangerMode: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'कृपया ओ.ती.पी. कोड राख्नुहोस् !'
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
@endsection

