@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">अनुदान विवरण</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form>
                    <fieldset>
                        <legend><h5><b>विवरण</b></h5></legend>
                        <div class="row">
                            <div class=" col-md-3">
                                <label for="fiscal_year">आर्थिक वर्ष</label>
                                <select id="fiscal_year" class="form-control">
                                    <option selected>---आर्थिक वर्ष---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="programme_name">कार्यक्रमको नाम</label>
                                <select id="programme_name" class="form-control">
                                    <option selected>---कार्यक्रमको नाम---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="name">अनुदानग्राहीको नाम</label>
                                <input type="text" class="form-control" id="name" placeholder="अनुदानग्राहीको नाम">
                            </div>
                            <div class="col-md-3">
                                <label for="grant_code">
                                    अनुदानग्राहीको कोड नं</label>
                                <input type="text" class="form-control" id="grant_code" placeholder="अनुदानग्राहीको कोड नं">
                            </div>
                        </div>
                    </fieldset>


                    <fieldset class="mt-2">
                        <legend><h5><b>ठेगाना</b></h5></legend>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="province">प्रदेश</label>
                                <select id="province" class="form-control">
                                    <option selected>---प्रदेश छानुहोस्---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class=" col-md-4">
                                <label for="district">जिल्ला</label>
                                <select id="district" class="form-control">
                                    <option selected>---जिल्ला छानुहोस्---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class=" col-md-4">
                                <label for="local_body">पालिका</label>
                                <select id="local_body" class="form-control">
                                    <option selected>---पालिका छानुहोस्---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="ward_no">वडा नं.</label>
                                <select id="ward_no" class="form-control">
                                    <option selected>---वडा नं छानुहोस्---</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tole">
                                    टोल</label>
                                <input type="text" class="form-control" id="tole" placeholder="टोल">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-2">
                        <legend><h5><b>अनुदान विवरण</b></h5></legend>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="grant_recipient_type">अनुदानग्राहीको प्रकार</label>
                                <select id="grant_recipient_type" class="form-control">
                                    <option selected>----अनुदानग्राहीको प्रकार छानुहोस्----</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="received_grant_type">प्राप्त अनुदानको प्रकार</label>
                                <select id="received_grant_type" class="form-control">
                                    <option selected>----प्राप्त अनुदानको प्रकार छानुहोस्----</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="grant_activity">अनुदानका कृयाकलाप</label>
                                <select id="grant_activity" class="form-control">
                                    <option selected>----अनुदानका कृयाकलाप छानुहोस्----</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="total_cost">जम्मा लागत रु.</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">रु</span>
                                        </div>
                                        <input type="text" id="total_cost" class="form-control" placeholder="जम्मा लागत">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="grant_amount">अनुदान रकम</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">रु</span>
                                        </div>
                                        <input type="text" id="grant_amount" class="form-control" placeholder="अनुदान रकम">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="grant_recipient_invest">अनुदानग्राहीको लगानी</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">रु</span>
                                        </div>
                                        <input type="text" id="grant_recipient_invest" class="form-control" placeholder="अनुदानग्राहीको लगानी">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="beneficial_area">
                                    लाभ पुग्ने क्षेत्रफल</label>
                                <input type="text" class="form-control" id="beneficial_area" placeholder="लाभ पुग्ने क्षेत्रफल">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="contact_person_name">
                                    सम्पर्क ब्यक्तिको नाम</label>
                                <input type="text" class="form-control" id="contact_person_name" placeholder="सम्पर्क ब्यक्तिको नाम">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="contact_person_no">
                                    सम्पर्क नम्बर</label>
                                <input type="text" class="form-control" id="contact_person_no" placeholder="सम्पर्क नम्बर">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-2">
                        <legend><h5><b>पहिले अनुदान प्राप्त गरे नगरेको</b></h5></legend>
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <label for="project_new_prev">आयोजना नयाँ वा पहिलेको अनुदानको निरन्तरता हो ?</label>
                                <select id="project_new_prev" class="form-control">
                                    <option selected>निरन्तर</option>
                                    <option>नयाँ</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="prev_received_year">
                                    पहिले पाएको आ. व.</label>
                                <select id="project_new_prev" class="form-control">
                                    <option selected>----पहिले पाएको आ. व.----</option>
                                    <option>078/079</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="prev_cost_amount">
                                        लागत रकम</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">रु</span>
                                        </div>
                                        <input type="text" id="prev_cost_amount" class="form-control" placeholder="लागत रकम">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="beneficial_places">लाभ पुग्ने स्थानहरु</label>
                                    <textarea id="beneficial_places" class="form-control" cols="30" rows="3" placeholder="लाभ पुग्ने स्थानहरु"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remarks">कैफियत</label>
                                    <textarea id="remarks" class="form-control" cols="30" rows="3" placeholder="कैफियत"></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-end mt-2">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
