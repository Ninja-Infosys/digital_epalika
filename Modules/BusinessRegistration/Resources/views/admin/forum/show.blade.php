@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.businessRegistration.registration.forum.index') }}">फर्म
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">फर्मको विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">फर्मको विवरण dfghjk</h4>
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
                                                फर्मको विवरण
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>नाम</th>
                                                            <td>{{ $forum->name ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>नाम अंग्रेजी</th>
                                                            <td>{{ $forum->name_en ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> ठेगाना</th>
                                                            <td>{{ $forum->address ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> ठेगाना अंग्रेजी</th>
                                                            <td>{{ $forum->address_en ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> फोन</th>
                                                            <td>{{ $forum->phone ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> इमेल</th>
                                                            <td>{{ $forum->email ?? '' }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th> फर्मको प्रकार</th>
                                                            <td>{{ $forum->type->label() ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> फर्मको प्रकार</th>
                                                            <td>{{ $forum->type ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> पूँजीगत लगनी </th>
                                                            <td>{{ $forum->amount ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> फर्म संचालन मिति</th>
                                                            <td>{{ $forum->establish_date ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>कारोबार विवरण</th>
                                                            <td>{{ $forum->product ?? '' }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>अन्या विवरण</th>
                                                            <td>{{ $forum->other ?? '' }}</td>
                                                        </tr>



                                                        <tr>
                                                            <th> उदेश्य</th>
                                                            <td>{{ $forum->purpose ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> ठेगाना</th>
                                                            <td>
                                                                {{ $forum->LocalBody->local_body ?? '' }}
                                                                -{{ $forum->ward_no ?? '' }}
                                                                , {{ $forum->tole ?? '' }}
                                                                , {{ $forum->District->district ?? '' }}
                                                                , {{ $forum->Province->province ?? '' }}
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
                                                <th scope="col">फोन नं</th>
                                                <th scope="col">स्थायी वतन</th>
                                                <th scope="col">नागरिकता नं.</th>
                                                <th scope="col">दस्तखत</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($forum->partners as $partner)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $partner->name ?? '' }}</td>
                                                    <td>{{ $partner->phone ?? '' }}</td>
                                                    <td>
                                                        <span>
                                                            {{ $partner->localBody->local_body ?? '' }}
                                                            - {{ $partner->ward_no ?? '' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $partner->citizenship_no ?? '' }}</td>

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
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="reg">
                            <form action="{{ route('admin.businessRegistration.store.customForumData', $forum) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="border p-2 mb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="taxpayer_number" class="form-label">करदाता नम्बर </label>
                                            <input type="text" name="taxpayer_number" placeholder="करदाता नम्बर "
                                                value="{{ old('taxpayer_number', $forum->taxpayer_number ?? '') }}"
                                                class="form-control @error('taxpayer_number') is-invalid @enderror"
                                                id="taxpayer_number" />
                                            @error('taxpayer_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="bill_no" class="form-label">बिल नं</label>
                                            <input type="text" name="bill_no"
                                                value="{{ old('bill_no', $forum->bill_no ?? '') }}" placeholder="बिल नं"
                                                class="form-control @error('bill_no') is-invalid @enderror"
                                                id="bill_no" />
                                            @error('bill_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <x-date-input-component get-today-date="{{ false }}"
                                                edit-date-ne="{{ $forum->bill_date_bs }}"
                                                edit-date-en="{{ $forum->bill_date_ad }}" name-ne="bill_date_bs"
                                                label-ne="बिल मिति (बि स.)" name-en="bill_date_ad" label-en="बिल मिति" />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amount" class="form-label">रकम </label>
                                            <input type="number" name="amount" step="0.01" placeholder="रकम"
                                                value="{{ old('amount', $forum->amount ?? '') }}"
                                                class="form-control @error('amount') is-invalid @enderror" id="amount" />
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if (!empty($forum->other_file))
                                            <a href="{{ $forum->other_file }}" download="{{ $forum->other_file }}">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        @endif
                                        <div class="col-md-12 mb-2">
                                            <label for="other_file" class="form-label"> फाईल </label>
                                            <input type="file" name="other_file"
                                                class="form-control @error('other_file') is-invalid @enderror"
                                                id="other_file" />
                                            @error('other_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
        <script src="{{ asset('assets/backend/editor/ckEditor/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/editor/ckEditor/js/print.js') }}"></script>


        <script>
            function print(editorName) {
                const editor = CKEDITOR.instances[editorName];
                editor.execCommand('print');
            }
        </script>
    @endpush
@endsection
