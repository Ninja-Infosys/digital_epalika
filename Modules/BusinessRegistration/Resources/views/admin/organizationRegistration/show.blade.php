@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.organizationRegistration.index')}}">संस्था
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">संस्थाको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">संस्थाको विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                विवरण
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#reg" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                दर्ता
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                संस्थाको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>नाम</th>
                                                        <td>{{$organizationRegistration->name ?? ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>नाम अंग्रेजी</th>
                                                        <td>{{$organizationRegistration->name_en??''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना</th>
                                                        <td>{{$organizationRegistration->address??''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना अंग्रेजी</th>
                                                        <td>{{$organizationRegistration->address_en??''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>आर्थिक स्रोत</th>
                                                        <td>{{$organizationRegistration->financial_source??''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> उदेश्य</th>
                                                        <td>{{$organizationRegistration->purpose ??''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> ठेगाना</th>
                                                        <td>
                                                            {{$organizationRegistration->LocalBody->local_body ?? ''}}
                                                            -{{$organizationRegistration->ward_no ?? ''}}
                                                            , {{$organizationRegistration->tole ?? ''}}
                                                            , {{$organizationRegistration->District->district ?? ''}}
                                                            , {{$organizationRegistration->Province->province ?? ''}}
                                                        </td>
                                                    </tr>


                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            प्रबन्ध समितिका पदाधिकारी को विवरण
                                        </h4>
                                    </div>
                                    <table class="table table-bordered border-primary">
                                        <thead>
                                        <tr>
                                            <th scope="col">क्र.स</th>
                                            <th scope="col">नाम, थर</th>
                                            <th scope="col">संस्थाको पद</th>
                                            <th scope="col">स्थायी वतन</th>
                                            <th scope="col">दस्तखत</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($organizationRegistration->committeeNames as $committeeName)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $committeeName->name ?? '' }}</td>
                                                <td>{{ $committeeName->designation ?? '' }}</td>
                                                <td>
                                        <span>
                                            {{ $committeeName->localBody->local_body ?? '' }}
                                            - {{ $committeeName->ward_no ?? '' }}
                                        </span>
                                                </td>
                                                <td></td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन !!!
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-around">
                                        <p> वार्ड सिफारिस </p>
                                        <a href="{{route('admin.file-url-download', ['file_url'=>$organizationRegistration->getRawOriginal('ward_recommendation')])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <img
                                            src="{{$organizationRegistration->ward_recommendation??''}}"
                                            alt=""
                                            style="max-width: 100%;height: 200px;object-fit: contain;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-around">
                                        <p> दर्ता प्रमाणपत्र </p>
                                        <a href="{{route('admin.file-url-download', ['file_url'=>$organizationRegistration->getRawOriginal('statue')])}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <img
                                            src="{{$organizationRegistration->statue??''}}"
                                            alt=""
                                            style="max-width: 100%;height: 200px;object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="reg">
                            <form action="{{route('admin.businessRegistration.store.custom',$organizationRegistration)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <fieldset class="border p-2 mb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="taxpayer_number" class="form-label">करदाता नम्बर </label>
                                            <input
                                                type="text"
                                                name="taxpayer_number"

                                                placeholder="करदाता नम्बर "
                                                value="{{old('taxpayer_number',$organizationRegistration->taxpayer_number??'')}}"
                                                class="form-control @error('taxpayer_number') is-invalid @enderror"
                                                id="taxpayer_number"
                                            />
                                            @error('taxpayer_number')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="bill_no" class="form-label">बिल नं</label>
                                            <input
                                                type="text"
                                                name="bill_no"
                                                value="{{old('bill_no',$organizationRegistration->bill_no??'')}}"
                                                placeholder="बिल नं"
                                                class="form-control @error('bill_no') is-invalid @enderror"
                                                id="bill_no"
                                            />
                                            @error('bill_no')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <x-date-input-component
                                                get-today-date="{{false}}"
                                                edit-date-ne="{{$organizationRegistration->bill_date_bs}}"
                                                edit-date-en="{{$organizationRegistration->bill_date_ad}}"
                                                name-ne="bill_date_bs" label-ne="बिल मिति (बि स.)"
                                                name-en="bill_date_ad" label-en="बिल मिति"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amount" class="form-label">रकम </label>
                                            <input
                                                type="number"
                                                name="amount"
                                                step="0.01"
                                                placeholder="रकम"
                                                value="{{old('amount',$organizationRegistration->amount??'')}}"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                id="amount"
                                            />
                                            @error('amount')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        @if(!empty($organizationRegistration->other_file))
                                            <a href="{{$organizationRegistration->other_file}}"
                                               download="{{$organizationRegistration->other_file}}">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        @endif
                                        <div class="col-md-12 mb-2">
                                            <label for="other_file" class="form-label"> फाईल </label>
                                            <input
                                                type="file"
                                                name="other_file"
                                                class="form-control @error('other_file') is-invalid @enderror"
                                                id="other_file"
                                            />
                                            @error('other_file')
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
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/print.js')}}"></script>


        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush

@endsection

