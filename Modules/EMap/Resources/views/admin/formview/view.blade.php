@extends('admin.layouts.master')
@section('content')
  <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">संगठन</li>
                    </ol>
                </div>
                <h4 class="page-title">संगठन </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="" class="rounded-circle avatar-lg img-thumbnail"
                         alt="profile-image">

                    <h4 class="mb-0"></h4>
                    {{--                    <p class="text-muted">@webdesigner</p>--}}

                    <div class="text-start mt-3">

                        <p class="text-muted mb-2 font-13"><strong>नाम :</strong> <span
                                class="ms-2"></span>
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>इमेल :</strong><span
                                class="ms-2"></span></p>

                        <p class="text-muted mb-2 font-13"><strong>फोन :</strong> <span
                                class="ms-2"></span></p>

                    </div>

                </div>
            </div> <!-- end card -->


        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                व्यक्तिगत विवरण
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                संगठनको विवरण
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                आवश्यक कागजात
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="aboutme">

                            <table class="table table-sm mb-0 table-striped table-hover">
                                <tr>
                                    <th>नाम :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>इमेल :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>फोन :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>लिङ्ग :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>इमेल :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>बुवाको नाम :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>हजुरबुवाको नाम :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>PAN नं :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>NEC नं :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>नागरिकता नं :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>नागरिकता जारि भएको जिल्ला :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>नागरिकता जारि भएको मिति :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>स्थाई ठेगाना :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>अस्थाई ठेगाना :</th>
                                    <td></td>

                                </tr>
                            </table>

                        </div>

                        <div class="tab-pane" id="timeline">
                            <table class="table table-sm mb-0 table-striped table-hover">
                                <tr>
                                    <th>नाम:</th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>इमेल :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>फोन :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>लिङ्ग :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>ठेगान :</th>
                                    <td></td>
                                </tr>

                            </table>
                        </div>

                        <div class="tab-pane" id="settings">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">नागरिकता (आगाडी)</div>
                                        <div class="card-body">
                                            <img src="...." alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">नागरिकता (पछाडी)</div>
                                        <div class="card-body">
                                            <img src="...." alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">NECको प्रमाणपत्र</div>
                                        <div class="card-body">
                                            <img src="...." alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">कम्पनी दर्ताको प्रमाणपत्र</div>
                                        <div class="card-body">
                                            <img
                                                src="...."
                                                alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">कम्पनी PANको प्रमाणपत्र</div>
                                        <div class="card-body">
                                            <img src="...."
                                                 alt="" style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">लोगो</div>
                                        <div class="card-body">
                                            <img src="...." alt=""
                                                 style="max-width: 100%;height: 200px;object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-sm mb-0 table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>क्र.सं</th>
                                            <th>वर्ष</th>
                                            <th>कागजात</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><img src="..." alt="" style="max-width: 100%;height: 200px;object-fit: contain;"></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


