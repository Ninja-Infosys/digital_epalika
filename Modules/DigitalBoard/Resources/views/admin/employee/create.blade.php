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
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digitalBoard.employee.index')}}">कर्मचारी </a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ कर्मचारी थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">कर्मचारीहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कर्मचारी थप्नुहोस्</h4>
                        <a href="{{route('admin.digitalBoard.employee.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> कर्मचारी सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.digitalBoard.employee.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>कर्मचारी विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="form-label">नाम *</label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="नाम "
                                        required
                                    />
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="department" class="form-label">समूह </label>
                                    <input
                                        type="text"
                                        name="department"
                                        value="{{old('department')}}"
                                        class="form-control  @error('department') is-invalid @enderror"
                                        id="department"
                                        placeholder=" समूह"
                                    />
                                    @error('department')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="designation" class="form-label">पद </label>
                                    <input
                                        type="text"
                                        name="designation"
                                        value="{{old('designation')}}"
                                        class="form-control  @error('designation') is-invalid @enderror"
                                        id="designation"
                                        placeholder=" पद"
                                    />
                                    @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="email" class="form-label">इमेल </label>
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{old('email')}}"
                                        class="form-control  @error('email') is-invalid @enderror"
                                        id="email"
                                        placeholder=" इमेल"
                                    />
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="phone" class="form-label">फोन </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone')}}"
                                        class="form-control  @error('phone') is-invalid @enderror"
                                        id="phone"
                                        placeholder=" फोन"
                                    />
                                    @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="photo" class="form-label">फोटो </label>
                                    <input
                                        type="file"
                                        name="photo"
                                        class="form-control  @error('photo') is-invalid @enderror"
                                        id="photo"

                                    />
                                    @error('photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="position" class="form-label">मर्यादाक्रम </label>
                                    <input
                                        type="text"
                                        name="position"
                                        value="{{old('position')}}"
                                        class="form-control @error('position') is-invalid @enderror"
                                        id="position"
                                        placeholder=" स्थान"
                                    />
                                    @error('position')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="is_employee" class="form-label">प्रकार छान्नुहोस *</label>

                                    <select class="form-control @error('is_employee') is-invalid @enderror"
                                            name="is_employee" id="is_employee" required>
                                        <option value="1" {{old('is_employee') == 1 ? 'selected':''}}>कर्मचारी</option>
                                        <option value="0" {{old('is_employee')==0 ? 'selected':''}}>जनप्रतिनिधि
                                        </option>
                                    </select>
                                    @error('is_employee')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="show_to_index" class="form-label">गृहपृष्ठमा देखाउनुहोस् *</label>

                                    <select class="form-control @error('show_to_index') is-invalid @enderror"
                                            name="show_to_index" id="show_to_index" required>
                                        <option value="1" {{old('show_to_index') == 1 ? 'selected':''}}>देखाउने
                                        </option>
                                        <option value="0" {{old('show_to_index')==0 ? 'selected':''}}>नदेखाउने
                                        </option>
                                    </select>
                                    @error('show_to_index')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="show_to_mobile_app" class="form-label">मोबाइलमा देखाउनुहोस् *</label>

                                    <select class="form-control @error('show_to_mobile_app') is-invalid @enderror"
                                            name="show_to_mobile_app" id="show_to_mobile_app" required>
                                        <option value="1" {{old('show_to_mobile_app') == 1 ? 'selected':''}}>देखाउने
                                        </option>
                                        <option value="0" {{old('show_to_mobile_app')==0 ? 'selected':''}}>नदेखाउने
                                        </option>
                                    </select>
                                    @error('show_to_mobile_app')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

