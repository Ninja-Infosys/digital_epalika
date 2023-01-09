<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($services as $key=>$service)
            <div class="carousel-item {{$key==0 ? 'active':''}}">
                <div class="section-header mt-5">
                    <h3 class="section-title" style="color: #0DCAF0">सेवाहरु</h3>
                </div>
                <div class="d-flex justify-content-space bg-info">
                    <div class="col-md-2 px-2"
                         style="background-color: #0047AB;
                            padding: 10px;
                              padding-right: 10px;
                              padding-left: 10px;">
                        <img src="{{ asset('assets/frontend/image/help-desk1.png') }}" width="40" height="40">
                    </div>
                    <div class="col-md-6 mt-3 px-3">
                        <p class="text-white" style="font-size: 15px">{{$service->service_name}}</p>
                    </div>
                </div>
                <div class="scroll shadow">
                    <div class="doc">
                        <div class="title" style="color: #0047AB; font-size: 20px; padding: 0 15px;">
                            <i class="fa-solid fa-clock fa-xl" style="color: #0047AB; margin: 0 10px"></i>अनुमति लग्ने
                            समय
                            <p style="color: #828282; padding: 0 50px; font-size: 15px">{{$service->time_taken}}</p>
                        </div>

                        <div class="title" style="color: #0047AB; font-size: 20px; padding: 0 15px;">
                            <i class="fa-solid fa-user fa-xl" style="color: #0047AB; margin: 0 10px"></i>जिम्मेवार
                            अधिकारी
                            <p style="color: #828282; padding: 0 50px; font-size: 15px">{{$service->responsible_officer}}
                            </p>
                        </div>

                        <div class="title" style="color: #0047AB; font-size: 20px; padding: 0 15px;">
                            <i class="fa-solid fa-file-contract fa-xl" style="color: #0047AB; margin: 0 10px"></i>आवश्यक
                            कागजातहरु
                            @foreach($service->serviceDocuments as $document)
                            <p style="color: #828282; padding: 0 50px; font-size: 15px">  {{$document->description}} {{ !$loop->last ? ',':''}}
                                </p>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> --}}
</div>

@push('styles')
    <style>
        .doc {
            top: 45vh;
            position: relative;
            box-sizing: border-box;
            animation: marquee 50s linear infinite;
            margin: 0 auto;
            text-align: left !important;
            color: var(--mainColor);
        }

        .scroll {
            border-radius: 5px;
            width: 100%;
            height: 38vh;

            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }
        }
    </style>
@endpush

