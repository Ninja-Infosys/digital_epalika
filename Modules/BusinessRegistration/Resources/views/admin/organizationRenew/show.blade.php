@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">व्यवसाय
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">प्रमाणपत्र प्रिन्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रमाणपत्र प्रिन्ट </h4>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रमाणपत्र प्रिन्ट</h4>
                        <x-print-button
                            target-element="print"
                            title="{{$organizationRegistration-> registration_no}}"
                        />
                    </div>
                </div>
                <section class="row justify-content-center my-4 ">
                    <div class="card col-md-8 border">
                        <div class="card-body">
                            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                            <x-print-button target-element="printData" title="{{ $organizationRegistration->name }}" />
                            <div id="printData">
                                <p>
                                    श्रीमान प्रमुख प्रशासकीय अधिकृत ज्यु, <br>
                                    {{ $officeSetting->localBody->local_body ?? '' }} <br>
                                    नगर कार्यपालिकाको कार्यालय <br>
                                    {{ $officeSetting->district->district ?? '' }}
                                </p>
                                <p class="text-center fw-bold my-4">बिषय : संस्था दर्ता गरि पाउँ</p>
                                <p>
                                    हामीले {{ $organizationRegistration->name }} नामक सामाजिक
                                    संस्था {{ $officeSetting->localBody->local_body ?? '' }}को स्थानिय संस्था दर्ता एन,
                                    २०७७
                                    बमोजिम दर्ता गर्न चाहेकोले प्रस्तावित विधानको २ (दुई) प्रति , पदाधिकारीहरुको नागरिताको प्रमाणित
                                    प्रतिलिपि १/१ प्रति समेत यसै साथ संलग्न गरि देहायको विवरण खुलाई निवेदन गरेका छौँ |
                                </p>

                                <p> १. संस्थाको नाम : <span class="dashed-bottom">{{ $organizationRegistration->name ?? '' }}</span>
                                </p>
                                <p> २. संस्थाको ठेगाना : <span
                                        class="dashed-bottom">{{ $organizationRegistration->district->district ?? '' }}</span>
                                    जिल्ला
                                    <span class="dashed-bottom">{{ $organizationRegistration->localBody->local_body ?? '' }}</span>
                                    गा.पा./न.पा. वडा नं <span
                                        class="dashed-bottom">{{ $organizationRegistration->ward_no ?? '' }}</span>
                                    <span class="dashed-bottom">{{ $organizationRegistration->way ?? '' }}</span> मार्ग

                                </p>
                                <p> ३. टेलिफोन नं : <span class="dashed-bottom">{{ $organizationRegistration->phone ?? '' }}</span>
                                    &nbsp;    इमेल : <span class="dashed-bottom">{{ $organizationRegistration->email ?? '' }}</span>
                                </p>
                                <p>४ . संस्थाको उदेश्य : <span
                                        class="dashed-bottom">{{ $organizationRegistration->purpose ?? '' }}</span></p>
                                <p> ५. संस्थाको आर्थिक श्रोत : <span
                                        class="dashed-bottom">{{ $organizationRegistration->financial_source ?? '' }}</span>

                                <p> ६. सम्पर्क फोन नं : <span
                                        class="dashed-bottom">{{ $organizationRegistration->committeeNames->first()?->phone ?? '' }}</span>
                                </p>
                                <table class="table table-bordered border-primary">
                                    <thead>
                                    <tr>
                                        <th scope="col">क्र.स</th>
                                        <th scope="col">नाम, थर</th>
                                        <th scope="col">सम्पर्क नं</th>
                                        <th scope="col">इमेल</th>
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
                                            <td>{{ $committeeName->phone ?? '' }}</td>
                                            <td>{{ $committeeName->email ?? '' }}</td>
                                            <td>{{ $committeeName->designation ?? '' }}</td>
                                            <td>
                                        <span>
                                            {{ $committeeName->localBody->local_body ?? '' }}
                                            - {{ $committeeName->ward_no ?? '' }}, {{ $committeeName->district->district ?? ''}}
                                        </span>
                                            </td>
                                            <td></td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="5">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection
