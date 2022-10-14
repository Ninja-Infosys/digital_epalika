@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">सेटिङ</a></li>
                            <li class="breadcrumb-item active">मेरो प्रोफाइल</li>
                        </ol>
                    </div>
                    <h4 class="page-title">मेरो प्रोफाइल</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                             alt="profile-image">
                        <h4 class="mb-1">Geneva McKnight</h4>
                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">फोटो परिवर्तन गर्नुहोस्</button>
                        <div class="text-start mt-3">
                            <p class="text-muted mb-2 font-13"><strong>नाम :</strong> <span class="ms-2">Geneva D. McKnight</span></p>
                            <p class="text-muted mb-2 font-13"><strong>भूमिका :</strong> <span class="ms-2">Super Admin</span></p>
                            <p class="text-muted mb-2 font-13"><strong>इमेल :</strong><span class="ms-2">(123) 123 1234</span></p>
                            <p class="text-muted mb-2 font-13"><strong>सम्पर्क नं. :</strong> <span class="ms-2">user@email.domain</span></p>
                            <p class="text-muted mb-1 font-13"><strong>ठेगाना :</strong> <span class="ms-2">USA</span></p>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill navtab-bg">
                            <li class="nav-item">
                                <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    पासवर्ड परिवर्तन गर्नुहोस्
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    विवरण सम्पादन गर्नुहोस्
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="timeline">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="password" class="form-label">पुरानो पासवर्ड *</label>
                                            <input
                                                type="password"
                                                name="password"
                                                value="{{old('password')}}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password"
                                                placeholder="पुरानो पासवर्ड"
                                            />
                                            @error('password')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="password" class="form-label">पासवर्ड *</label>
                                            <input
                                                type="password"
                                                name="password"
                                                value="{{old('password')}}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password"
                                                placeholder="पासवर्ड"
                                            />
                                            @error('password')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="password_confirmation" class="form-label">पासवर्ड सुनिश्चित गर्नुहोस *</label>
                                            <input
                                                type="password"
                                                name="password_confirmation"
                                                value="{{old('password_confirmation')}}"
                                                class="form-control"
                                                id="password_confirmation"
                                                placeholder="पासवर्ड सुनिश्चित गर्नुहोस"
                                            />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="settings">
                                <form action="#" method="post">
                                    @csrf
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>व्यक्तिगत विवरण </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="name" class="form-label">नाम  *</label>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    value="{{old('name')}}"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name"
                                                    placeholder="नाम"
                                                />
                                                @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="email" class="form-label">इमेल  *</label>
                                                <input
                                                    type="text"
                                                    name="email"
                                                    value="{{old('email')}}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email"
                                                    placeholder="इमेल"
                                                />
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="phone" class="form-label">फोन नम्बर  *</label>
                                                <input
                                                    type="text"
                                                    name="phone"
                                                    value="{{old('phone')}}"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    id="phone"
                                                    placeholder="फोन नम्बर"
                                                />
                                                @error('phone')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="role_id" class="form-label">भूमिका *</label>
                                                <select name="role_id"
                                                        class="form-select @error('role_id') is-invalid @enderror"
                                                        id="role_id">
                                                    <option value="">भूमिका छान्नुहोस्</option>
{{--                                                    @foreach($roles as $role)--}}
{{--                                                        <option value="{{$role->id}}" {{$role->id==old('role_id') ? 'selected' : ''}}>--}}
{{--                                                            {{$role->title}}--}}
{{--                                                        </option>--}}
{{--                                                    @endforeach--}}
                                                </select>
                                                @error('role_id')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>ठेगाना</strong>
                                        </legend>
                                        @livewire('address')
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
