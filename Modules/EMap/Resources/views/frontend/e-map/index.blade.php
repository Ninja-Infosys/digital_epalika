@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="breadcrumb d-flex pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500" href="{{ url('digital-service') }}">ई-पालिका</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <a class="ml-1 text-primary-500">घर नक्सा</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 login-card">
                            <div class="card-header-login">
                                <p class="login-text">संस्था लग-इन </a>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="user">
                                        <h5 class="card-title text-white my-4">संस्था लग-इन </h5>
                                        <form action="{{ route('organization.login') }}" method="post">
                                            @csrf
                                            <!-- User Login Form Fields -->
                                            <div class="mb-3 input-group input-group-icon">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-envelope" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                                    </svg></span>
                                                <label for="email" class="form-label visually-hidden">इमेल</label>
                                                <input name="email"
                                                    class="form-control @error('email') is-invalid @enderror" type="email"
                                                    value="{{ old('email') }}" id="email" placeholder="इमेल" />
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 input-group input-group-icon">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor" class="bi bi-lock"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                                    </svg></span>
                                                <label for="password" class="form-label visually-hidden">पासवर्ड</label>
                                                <input name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    type="password" id="password" placeholder="पासवर्ड" />
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="login-btn mt-4 d-block w-100 py-2">लग-इन</button>
                                            <div class="mt-1 text-center text-white">
                                                संस्था दर्ता गर्नु भएको छैन भने? &nbsp; <a
                                                    href="{{ route('organization.register.form') }}">संस्था दर्ता गर्नुहोस
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-8 p-2">
                            {{-- <div class="module-card text-center overflow-hidden p-3">
                                <div class="card-body d-flex gap-3 align-items-start justify-content-between">
                                    <img src="{{ asset('assets/frontend/image/new-icons/job.png') }}" width="50"
                                        height="50">
                                    <div class="d-flex flex-column align-items-start justify-content-start w-75">
                                        <h5 class="fw-semibold mb-1">नक्सा दरखास्त फारम</h5>

                                        <h6 class="text-muted">नयाँ नक्सा दरखास्त फारम भर्नुहोस ।</h6>
                                        <a href="{{ url('form') }}"
                                            class="btn btn-outline-primary btn-sm mt-3"><span>नक्सा दरखास्त</span>

                                        </a>
                                    </div>
                                </div>

                            </div> --}}
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-5 p-2">
                                                <div class="module-card text-center overflow-hidden p-3">
                                                    <div
                                                        class="card-body d-flex gap-3 align-items-start justify-content-between">
                                                        <img src="{{ asset('assets/frontend/image/new-icons/job.png') }}"
                                                            width="50" height="50">
                                                        <div
                                                            class="d-flex flex-column align-items-start justify-content-start w-75">
                                                            <h5 class="fw-semibold mb-1">नक्सा दरखास्त फारम</h5>

                                                            <h6 class="text-muted">नयाँ नक्सा दरखास्त फारम भर्नुहोस ।</h6>
                                                            <a href="{{ url('form') }}"
                                                                class="btn btn-outline-primary btn-sm mt-3"><span>नक्सा
                                                                    दरखास्त</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p style="font-size: 16px;">आवश्यक कागजातहरु</p>
                                        <div class="card-body px-0">
                                            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                                <table class="table table-sm table-custom">
                                                    <thead>
                                                        <tr>
                                                            <th>क्र.स</th>
                                                            <th>शीर्षक</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($necessaryDocuments as $key=>$necessaryDocument)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <th>{{ $necessaryDocument->title ?? '' }}</th>
                                                                <td class="d-flex">
                                                                    @foreach ($necessaryDocument->files as $file)
                                                                        <a href="{{ route('file.download', ['file' => $file->id]) }}"
                                                                            class="btn btn-xs btn-outline-primary">
                                                                            <i class="fa fa-download"></i>
                                                                        </a>
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                            <tr class="empty">
                                                                <td></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="text-center">तालिकामा कुनै डाटा
                                                                    उपलब्ध छैन !!!</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p style="font-size: 16px;">दरखस्त कागजातहरु</p>
                                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                            <table class="table table-sm table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>क्र.स</th>
                                                        <th>शीर्षक</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($registrationDocuments as $key=>$registrationDocument)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <th>{{ strip_tags($registrationDocument->description ?? '') }}
                                                            </th>


                                                        </tr>
                                                        <tr class="empty">
                                                            <td></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">तालिकामा कुनै डाटा
                                                                उपलब्ध छैन !!!</td>
                                                        </tr>
                                                    @endforelse
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
            {{-- <div class="col-md-12 mt-5">
                <h4>दरखास्त फारम साथ संलग्न कागजातहरु</h4>
                <h6 class="text-muted">तल दिएका कागजातहरु अनिवार्य राख्नु पर्नेछ । </h6>
                <div class="scroll card mt-4 border-0">
                    <div class="doc">
                        <table class="table table-custom px-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">नयाँ निर्माणको लागि नक्सा पास गर्न अनिवार्य पेश गर्नुपर्ने
                                        आवश्यक कागजातहरु</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4">१. जग्गा धनी प्रमाणपत्र प्रतिलिपि</td>
                                </tr>
                                <tr>
                                    <td class="px-4">२. चालु आर्थिक वर्षको मालपोत तिरेको रसिदको प्रतिलिपि </td>
                                </tr>
                                <tr>
                                    <td class="px-4">३. ज.ध. दर्ता प्रमाण पूर्जामा फोटो नभएको भए नागरिता प्रमाणपत्रको
                                        प्रतिलिपि</td>
                                </tr>
                                <tr>
                                    <td class="px-4">४. कि.न. स्पष्ट भएको नापी प्रमाणित नक्सा (ब्लु प्रिन्ट)</td>
                                </tr>
                                <tr>
                                    <td class="px-4">५. पास गरिने नक्साको फोटोकपी वा ब्लुप्रिन्ट (डिजाईनर र
                                        नक्सावालाको हस्ताक्षर सहित)</td>
                                </tr>
                                <tr>
                                    <td class="px-4">६. डिजाईनरको इजाजतपत्रको नवीकरण सहितको फोटोकपी (सरोकारवालाबाट
                                        प्रमाणित)</td>
                                </tr>
                                <tr>
                                    <td class="px-4">७. मन्जुरी लिई बनाउने भएमा नक्सा वालाको कानून शाखाको रोहवरमा भएको
                                        मन्जुरीनामाको सक्कल </td>
                                </tr>
                                <tr>
                                    <td class="px-4">८. वारेश राखी नक्सा पास गर्ने भए वरिसको प्रमाणितको प्रतिलिपि</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">पुन: निर्माण गर्न आवश्यक कागजातहरु</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4">१. नापी नक्सामा देखिएको तर नक्सा पास नभएको खण्डमा Existing
                                        Building को भुई तल्ला प्लान चार तिरको एलिभेसन र साइट पेश गर्नुपर्नेछ </td>
                                </tr>
                                <tr>
                                    <td class="px-4">२. कागजातको हकमा नयाँ नक्सा पास गर्दा आवश्यक पर्ने सबै कागजातहरु
                                        पेश गर्नुपर्नेछ</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">तल्ला थप गर्न आवश्यक कागजातहरु</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td class="px-4">१. पहिलो पास गरेको नक्सा र प्रमाणपत्रको फोटोकपी</td>
                                </tr>
                                <tr>
                                    <td class="px-4">२. चालु आर्थिक वर्षसम्मको एकिकृत सम्पति कर तिरेको रसिदको
                                        प्रतिलिपि</td>
                                </tr>
                                <tr>
                                    <td class="px-4">३. अरु कागजातको हकमा नयाँ नक्सा पास गर्दा आवश्यक पर्ने सबै
                                        कागजातहरु पेश गर्नुपर्नेछ</td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div> --}}

        </div>
        </div>
    </section>
@endsection
