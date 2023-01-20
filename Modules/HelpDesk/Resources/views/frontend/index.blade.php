@extends('frontend.layouts.master')
@section('content')
    <div class="content-section">
        <div class="breadcrumb d-flex">
            <div class="breadcrumb-item">
                <a class="whitespace-nowrap text-primary-500" href="{{route('welcome')}}">ई-पालिका</a>
                <i class="fa fa-angle-double-right text-light"></i>
                <a class="ml-1 text-primary-500">हेल्प डेस्क </a>
            </div>
        </div>
        <div class="text-center mt-5 text-decoration-underline m-4">
            <h5 class="fw-bold">तपशिल सेवा लिन सम्बन्धित ठाउँमा click गर्नुहोस्</h5>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card border-info p-2">
                    <div class="text-center">
                        <h5 class="fw-bold">शाखाहरु</h5>
                    </div>
                    @foreach($branches as $branch)
                        <div class="branch-title mb-2">
                            <button
                                class="btn fs-5 w-100 d-flex justify-content-between {{count($branch->branches) !== 0 ? '':'load_data'}}"
                                type="button"
                                data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="false"
                                data-bs-url="{{route('getServices',$branch)}}">
                                {{$branch->branch_name}}
                                @if(count($branch->branches)!==0)
                                    <i class="fs-5 pt-1 fa-solid fa-angles-down"></i>
                                @endif
                            </button>
                        </div>
                        @if(count($branch->branches)!==0)
                            <div class="collapse {{$loop->first ? 'show' :''}}" id="collapse{{$loop->iteration}}">
                                <div class="sub-branch ms-4">
                                    <ul class="list-group">
                                        @foreach($branch->branches as $subBranch)
                                            <li class="list-group-item my-2 d-flex justify-content-between load_data"
                                                data-bs-url="{{route('getServices',$subBranch)}}">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fa fa-angles-right"></i> {{$subBranch->branch_name}}
                                                </div>
                                                <button class="btn btn-info btn-sm text-white">सेवाहरु हेर्नुहोस्
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="accordion" id="branches">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#branches">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#branches">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#branches">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card branch-service border-info p-2">
                    <div class="text-center">
                        <h6 class="fw-bold fs-5">सेवाहरु</h6>
                    </div>
                    <ul class="list-group" id="data">

                    </ul>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            // on click .load_data send the ajax request to get the services and display in li inside #data
            $('.load_data').click(function () {
                let url = $(this).data('bs-url');
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        const printTo = $('#data');
                        // print data which is in array in #data
                        data.forEach(function (item) {
                            // clear #data
                            printTo.empty();
                            // pass item.id from js object to the route() in blade

                            let url = "{{route('service.view', ":id")}}".replace(':id', item.id);
                            printTo.append(`<a href="` + url + `">
                                <li class="p-2 bg-success text-white rounded mb-2 ps-4 d-flex justify-content-between">
<div class="d-flex align-items-center gap-2">
                                                    <i class="fa fa-angles-right"></i> ` + item.service_name + `
                            </div> <button class="btn btn-info btn-sm text-white">विवरण हेर्नुहोस्</button>
                            </li>
                        </a>`)
                        });
                    }
                });
            });
        </script>

    @endpush
@endsection
