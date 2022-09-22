@extends('frontend.layouts.master')
@section('content')
<section class="contact-section">
    <div class="container">
        <div class="heading mt-3">
            <h1>सम्पर्क</h1>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <form class="ng-invalid ng-touched ng-dirty">
                    <div class="contact-form">
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label>पुरा नाम *</label>
                                <input type="text" placeholder="पुरा नाम" formcontrolname="name" class="form-control ng-touched ng-dirty ng-valid">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label>फोन नं. *</label>
                                <input type="text" placeholder="+977" formcontrolname="phone" maxlength="10" class="form-control ng-touched ng-dirty ng-invalid">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label>ईमेल *</label>
                                <input type="email" placeholder="ईमेल" formcontrolname="email" class="form-control ng-dirty ng-valid ng-touched">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label>सम्पर्कको उद्देश्य *</label>
                                <select formcontrolname="contact_message_type_id" class="form-select ng-pristine ng-invalid ng-touched">
                                    <option selected="" disabled="" value="">-- सम्पर्कको उद्देश्य --</option>
                                    <option>test</option>
                                    <option>test</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>सन्देश *</label>
                                <textarea placeholder="सन्देश" rows="6" formcontrolname="message" class="form-control ng-pristine ng-invalid ng-touched"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-right"><button type="submit" class="btn btn-primary mt-2" disabled="">पठाउनुहोस्</button></div>
                </form>
            </div>
            <div class="col-lg-7 mt-3 mt-lg-0">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3521.249148730272!2d81.61191651448412!3d28.04741628265227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399867a9e458155b%3A0xb3a9de606a21f9a0!2sNinja%20Infosys%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1663497908563!5m2!1sen!2snp"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="address">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-3 mt-4 mt-md-0">
                    <div class="contact-item">
                        <mat-icon class="icon-size" [svgIcon]="'icon_solid:OfficeBuilding'"></mat-icon>
                        <div class="textbox"><small>कार्यालय</small>
                            <h6 class="heading-01">नेपालगन्ज उप-महानगरपालिका, नगरकार्यपालिकाको कार्यालय </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="contact-item">
                        <mat-icon class="icon-size" [svgIcon]="'icon_solid:location-marker'"></mat-icon>
                        <div class="textbox"><small>ठेगाना</small>
                            <h6 class="heading-01"> नेपालगन्ज,बाँके, नेपाल </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-3 mt-md-0">
                    <div class="contact-item">
                        <mat-icon class="icon-size" [svgIcon]="'icon_solid:mail'"></mat-icon>
                        <div class="textbox"><small>ईमेल</small>
                            <a href="#">
                                <h6 class="heading-01"> ninjainfosys@gmail.com</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-3 mt-md-0">
                    <div class="contact-item">
                        <mat-icon class="icon-size" [svgIcon]="'icon_solid:phone'"></mat-icon>
                        <div class="textbox"><small>फोन</small>
                            <h6 class="heading-01"> 082-5200012 </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/static/contact.css')}}">
@endpush
@endsection
