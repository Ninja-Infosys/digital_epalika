<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="B-Palika System"
        name="description"
    />
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>

    <!-- Bootstrap css -->
    <link
        href="{{asset('assets/backend/css/bootstrap.min.css')}}"
        rel="stylesheet"
        type="text/css"
    />
    <!-- App css -->
    <link
        href="{{asset('assets/backend/css/app.min.css')}}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />
    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body class="auth-page" style="background-image: url({{asset('images/mountain_photo.jpeg')}})">
<div class="mt-5 mb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 system_info">
                            <div class="logo">
                                <img src="{{asset('images/np.png')}}" height="100" alt="Logo">
                            </div>
                            <div class="title">
                                <h4>
                                    <b>{{$officeSetting->localBody->local_body??''}}</b> <br>
                                    <span class="text-light">
                                        {{$officeSetting->district->district??''}} <br>
                                        {{$officeSetting->province->province??''}}, नेपाल
                                    </span>
                                </h4>
                                <p>
                                    डिजिटल पालिका ब्यबस्थापन प्रणालि
                                    <br>
                                    (Digital Palika Management System)
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Register</h2>
                                    <form action="{{route('organization.register')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">नेपालीमा नाम</label>
                                                <input
                                                    name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    type="text"
                                                    value="{{old('name')}}"
                                                    id="name"
                                                    placeholder="नेपालीमा"
                                                />
                                                @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="engname" class="form-label">Name in English</label>
                                                <input
                                                    name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    type="text"
                                                    value="{{old('name')}}"
                                                    id="engname"
                                                    placeholder="English"
                                                />
                                                @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">इमेल</label>
                                                <input
                                                    name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    type="email"
                                                    value="{{old('email')}}"
                                                    id="email"
                                                    placeholder="इमेल"
                                                />
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="contact" class="form-label">सम्पर्क नम्बर</label>
                                                <input
                                                    name="contact"
                                                    class="form-control @error('contact') is-invalid @enderror"
                                                    type="text"
                                                    id="contact"
                                                    placeholder="सम्पर्क नम्बर"
                                                />
                                                @error('contact')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="gender" class="form-label">लिङ्ग</label>
                                                <select
                                                 class="form-select @error('gender') is-invalid @enderror" 
                                                id="gender">
                                                    <option value="">--- लिङ्ग छान्नुहोस् ---</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="marital" class="form-label">वैवाहिक स्थिति </label>
                                                <select 
                                                class="form-select @error('marital') is-invalid @enderror" 
                                                id="marital">
                                                  <option value="">--- वैवाहिक स्थिति ---</option>
                                                  <option value="Married">Married</option>
                                                  <option value="UnMarried">UnMarried</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="father_name" class="form-label">बुवाको नाम</label>
                                                <input
                                                    name="father_name"
                                                    class="form-control @error('father_name') is-invalid @enderror"
                                                    type="text"
                                                    id="father_name"
                                                    placeholder="बुवाको नाम"
                                                />
                                                @error('father_name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="grand_father_name" class="form-label">हजुर बुवाको नाम</label>
                                                <input
                                                    name="grand_father_name"
                                                    class="form-control @error('grand_father_name') is-invalid @enderror"
                                                    type="text"
                                                    id="grand_father_name"
                                                    placeholder=" हजुर बुवाको नाम"
                                                />
                                                @error('grand_father_name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Pan_no" class="form-label">प्यान न:</label>
                                                <input
                                                    name="Pan_no"
                                                    class="form-control @error('Pan_no') is-invalid @enderror"
                                                    type="text"
                                                    id="Pan_no"
                                                    placeholder="प्यान न:"
                                                />
                                                @error('Pan_no')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="nec" class="form-label">NEC</label>
                                                <input
                                                    name="nec"
                                                    class="form-control @error('nec') is-invalid @enderror"
                                                    type="text"
                                                    id="nec"
                                                    placeholder="NEC"
                                                />
                                                @error('nec')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="customFile" class="form-label">Upload NEC Certificate</label>
                                                <input type="file" class="form-control" id="customFile" />
                                                @error('upload_nec')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around mt-2">
                                            <button type="button" class="btn btn-primary">Next</button>
                                        </div>
                                    </form>


                                    {{-- citizenship --}}

                                     <form action="{{route('organization.register')}}" method="post">
                                        @csrf    
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="user_name" class="form-label">प्रयोगकार्तको नाम</label>
                                                <input
                                                    name="user_name"
                                                    class="form-control @error('user_name') is-invalid @enderror"
                                                    type="text"
                                                    id="user_name"
                                                    placeholder="प्रयोगकार्तको नाम"
                                                />
                                                @error('user_name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="form-label">पासवर्ड</label>
                                                <input
                                                    name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    type="text"
                                                    id="password"
                                                    placeholder="पासवर्ड"
                                                />
                                                @error('password')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="confirm_password" class="form-label">पासवर्ड सुनिश्चित गर्नुहोस</label>
                                                <input
                                                    name="confirm_password"
                                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                                    type="text"
                                                    id="confirm_password"
                                                    placeholder="पासवर्ड सुनिश्चित गर्नुहोस"
                                                />
                                                @error('confirm_password')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h4 class="title">नागरिकता बिबरण</h4>
                                            <div class="col-md-6 mb-3">
                                                <label for="nagrita_no" class="form-label">नागरिता न:</label>
                                                <input
                                                    name="nagrita_no"
                                                    class="form-control @error('nagrita_no') is-invalid @enderror"
                                                    type="text"
                                                    id="nagrita_no"
                                                    placeholder="नागरिता न:"
                                                />
                                                @error('nagrita_no')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="citizenship" class="form-label"> जारी जिल्ला</label>
                                                <select class="form-select @error('citizenship') is-invalid @enderror" id="citizenship">
                                                  <option selected>---जारि जिल्ला ----</option>
                                                  <option value="test">test</option>
                                                  <option value="test">test</option>
                                                  <option value="test">test</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date" class="form-label">जारी मिति</label>
                                                <input
                                                    name="date"
                                                    class="form-control @error('date') is-invalid @enderror"
                                                    type="text"
                                                    id="date"
                                                    placeholder="जारी मिति"
                                                />
                                                @error('date')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="custom" class="form-label">नागरिकता अपलोड गर्नुहोस्</label>
                                                <input type="file" class="form-control" id="custom" />
                                                @error('upload_citizenshipphoto')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around mt-2">
                                            <button type="button" class="btn btn-danger">Back</button>
                                            <button type="button" class="btn btn-primary">Next</button>
                                        </div>
                                    </form>

                                    {{------Address-------}}
                                       
                                    <form action="{{route('organization.register')}}" method="post">
                                        @csrf   
                                        <div class="address">
                                            <h4 class="title">स्थाहि ठेगाना</h4>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="provience" class="form-label">प्रदेश</label>
                                                    <select class="form-select @error('provience') is-invalid @enderror" id="provience">
                                                      <option selected>---प्रदेश छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="district" class="form-label">जिल्ला</label>
                                                    <select class="form-select @error('district') is-invalid @enderror" id="district">
                                                      <option selected>---जिल्ला छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="municipality" class="form-label">नगरपालिका</label>
                                                    <select class="form-select @error('municipality') is-invalid @enderror" id="municipality">
                                                      <option selected>---नगरपालिका छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="ward_no" class="form-label">वार्ड न:</label>
                                                    <select class="form-select @error('ward_no') is-invalid @enderror" id="ward_no">
                                                      <option selected>---वार्ड न: छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="village_tole" class="form-label">गाउ/टोल</label>
                                                    <input
                                                        name="village_tole"
                                                        class="form-control @error('village_tole') is-invalid @enderror"
                                                        type="text"
                                                        id="village_tole"
                                                        placeholder="गाउ/टोल"
                                                    />
                                                    @error('village_tole')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="address">
                                            <h4 class="title">अस्थाहि ठेगाना</h4>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="provien" class="form-label">प्रदेश</label>
                                                    <select class="form-select @error('provience') is-invalid @enderror" id="provien">
                                                      <option selected>---प्रदेश छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="dist" class="form-label">जिल्ला</label>
                                                    <select class="form-select @error('district') is-invalid @enderror" id="dist">
                                                      <option selected>---जिल्ला छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="municipa" class="form-label">नगरपालिका</label>
                                                    <select class="form-select @error('municipality') is-invalid @enderror" id="municipa">
                                                      <option selected>---नगरपालिका छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="wardno" class="form-label">वार्ड न:</label>
                                                    <select class="form-select @error('ward_no') is-invalid @enderror" id="wardno">
                                                      <option selected>---वार्ड न: छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="village" class="form-label">गाउ/टोल</label>
                                                    <input
                                                        name="village"
                                                        class="form-control @error('village') is-invalid @enderror"
                                                        type="text"
                                                        id="village"
                                                        placeholder="गाउ/टोल"
                                                    />
                                                    @error('village')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around mt-2">
                                            <button type="button" class="btn btn-danger">Back</button>
                                            <button type="button" class="btn btn-primary">Next</button>
                                        </div>
                                    </form>
                                    {{-- organiztion detail --}}
                                    <form action="{{route('organization.register')}}" method="post">
                                        @csrf
                                        <div class="org">
                                            <h5 class="title">संगठन विवरण</h5>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="nepaliname" class="form-label">संगठनको नाम *</label>
                                                <input
                                                    name="nepaliname"
                                                    class="form-control @error('nepaliname') is-invalid @enderror"
                                                    type="text"
                                                    id="nepaliname"
                                                    placeholder="संगठनको नाम नेपालीमा"
                                                />
                                                @error('nepaliname')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="orgname" class="form-label">Organization Name *</label>
                                                <input
                                                    name="orgname"
                                                    class="form-control @error('orgname') is-invalid @enderror"
                                                    type="text"
                                                    id="orgname"
                                                    placeholder="In English"
                                                />
                                                @error('nepaliname')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="orgemail" class="form-label">इमेल</label>
                                                <input
                                                    name="orgemail"
                                                    class="form-control @error('orgemail') is-invalid @enderror"
                                                    type="text"
                                                    id="orgemail"
                                                    placeholder="इमेल"
                                                />
                                                @error('orgemail')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">सम्पर्क नम्बर</label>
                                                <input
                                                    name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    type="text"
                                                    id="phone"
                                                    placeholder="सम्पर्क नम्बर"
                                                />
                                                @error('phone')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="company_reg_no" class="form-label">कम्पनी दर्ता न:</label>
                                                <input
                                                    name="company_reg_no"
                                                    class="form-control @error('company_reg_no') is-invalid @enderror"
                                                    type="text"
                                                    id="company_reg_no"
                                                    placeholder="कम्पनी दर्ता न:"
                                                />
                                                @error('company_reg_no')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="pan" class="form-label">प्यान न:</label>
                                                <input
                                                    name="pan"
                                                    class="form-control @error('pan') is-invalid @enderror"
                                                    type="text"
                                                    id="pan"
                                                    placeholder="प्यान न:"
                                                />
                                                @error('pan')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="orglogo" class="form-label">संगठनको लोगो राख्नुहोस</label>
                                                <input type="file" class="form-control" id="orglogo" />
                                                @error('upload_orglogo')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="company_certificate" class="form-label">कम्पनी प्रमाणपत्र:</label>
                                                <input type="file" class="form-control" id="company_certificate" />
                                                @error('company_certificate')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="pan_certificate" class="form-label">प्यान प्रमाणपत्र:</label>
                                                <input type="file" class="form-control" id="pan_certificate" />
                                                @error('pan_certificate')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="tax_clearance" class="form-label">कर चुक्ता:</label>
                                                <input type="file" class="form-control" id="tax_clearance" />
                                                @error('tax_clearance')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="address">
                                            <h4 class="title">स्थाहि ठेगाना</h4>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="prov" class="form-label">प्रदेश</label>
                                                    <select class="form-select @error('provience') is-invalid @enderror" id="prov">
                                                      <option selected>---प्रदेश छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="dis" class="form-label">जिल्ला</label>
                                                    <select class="form-select @error('district') is-invalid @enderror" id="dis">
                                                      <option selected>---जिल्ला छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="munici" class="form-label">नगरपालिका</label>
                                                    <select class="form-select @error('municipality') is-invalid @enderror" id="munici">
                                                      <option selected>---नगरपालिका छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="ward" class="form-label">वार्ड न:</label>
                                                    <select class="form-select @error('ward_no') is-invalid @enderror" id="ward">
                                                      <option selected>---वार्ड न: छान्नुहोस् ----</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                      <option value="test">test</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="villagetole" class="form-label">गाउ/टोल</label>
                                                    <input
                                                        name="villagetole"
                                                        class="form-control @error('villagetole') is-invalid @enderror"
                                                        type="text"
                                                        id="villagetole"
                                                        placeholder="गाउ/टोल"
                                                    />
                                                    @error('villagetole')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <button type="button" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                
                                </div>
                                    <div class="row technical-support">
                                        <p>
                                            <b>प्राविधिक सहायता कक्ष:</b>
                                            <br>
                                            सम्पर्क नम्बर: 081-520361/9858042433
                                            <br>
                                            इमेल: ninjainfosys@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>
                            <a href="auth-recoverpw.html" class="text-white-50 ms-1"
                            >Forgot your password?</a
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    2015 -
    <script>
        document.write(new Date().getFullYear());
    </script>
    &copy; Design & Developed By <a href="#" class="text-white-50">Ninja Infosys</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
</body>
</html>
