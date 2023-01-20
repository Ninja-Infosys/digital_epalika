@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500"
                            href="{{ route('grievanceHandling.grievance') }}">गुनासो</a>
                        <i class="fa fa-angle-double-right ml-lg-1 text-light"></i><a class="ml-1 text-primary-500">गुनासो
                            ट्रयाक</a>
                    </div>
                </div>
                <div class="row bg-card shadow rounded overflow-hidden">
                    <div class="d-flex justify-content-start">
                        <h4 class="text-center mt-5">गुनासो विषय: {{ $grievanceDetail->subject }}</h4>
                    </div>
                    <div class="col-md-7">
                        <h6>गुनासो प्रकार: {{ $grievanceDetail->grievanceType->title ?? '' }}</h6>
                    </div>
                    <div class="col-md-5">
                        <h6>सम्वन्धित शाखा: {{ $grievanceDetail->grievanceOffice->title ?? '' }}</h6>
                    </div>
                    <div>
                        <h6>आवेदक नम्बर: {{ $grievanceDetail->grievanceUser->phone ?? '' }}</h6>
                    </div>
                    <div class=" row mt-4 border rounded mx-auto">
                        <div class="card" id="chat4">
                            <div class="card-body" data-mdb-perfect-scrollbar="true"
                                style="position: relative; height: 400px">
                                <div class="d-flex justify-content-between my-3">
                                    <p class="small mb-1">Timona Siera</p>
                                    <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                                </div>
                                <div class="d-flex flex-row justify-content-start">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                        alt="avatar 1" style="width: 45px; height: 100%;">
                                    <div>
                                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                            {{ $grievanceDetail->description }}</p>
                                        @foreach ($grievanceDetail->files as $file)
                                            <button class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;"
                                            onclick="openModel()">
                                                <img id="img{{ $file->id }}" src="{{ $file->file_url }}"
                                                    class="img-fluid rounded mb-2"style="width: 50px; height: 100%;"
                                                    alt="">
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="mt-2">
                                @foreach ($grievanceDetail->grievanceDetails as $details)
                                    <div class="row mt-4 mb-2  mx-auto">
                                        <div class="d-flex justify-content-between">
                                            <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                                            <p class="small mb-1">Johny Bullock</p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                            <div>
                                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                                    {{ $details->description }}</p>
                                                @foreach ($details->files as $detailFile)
                                                    <p class="small p-2 ms-3 mb-1 rounded-3"
                                                        style="background-color: #f5f6f7;">
                                                        <img id="myImg" src="{{ $detailFile->file_url }}"
                                                            class="img-fluid rounded mb-2"
                                                            style="width: 50px; height: 100%;" alt="">
                                                    </p>
                                                    <div id="myModal" class="modal">
                                                        <span class="close">&times;</span>
                                                        <img class="modal-content" id="img02">
                                                        <div id="caption"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                alt="avatar 1" style="width: 45px; height: 100%;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 3" style="width: 40px; height: 100%;">
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInput3"
                                placeholder="Type message">
                            <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                            <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                            <a class="ms-3 link-info" href="#!"><i class="fas fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
    </section>
@endsection

@push('styles')
    <style>
        #chat4 .form-control {
border-color: transparent;
}

#chat4 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}

.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        openModel = function() {
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("img1");
            console.log(img);
            var modalImg = document.getElementById("img01");

            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endpush
