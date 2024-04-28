<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/icons.min.css') }}">
    <title>{{ $organizationRegistration->name }}को व्यवसाय दर्ता आवेदन</title>

</head>

<body class="container bg-white">
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
                    <p class="text-center">बिषय :संस्था दर्ता गरि पाउँ</p>
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
                    <p> ३. टेलिफोन नं : <span class="dashed-bottom">{{ $organizationRegistration->committeeNames->first()?->phone ?? '' }}</span>
                    &nbsp;    इमेल : <span class="dashed-bottom">{{ $organizationRegistration->committeeNames->first()?->email ?? '' }}</span>
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
                                    <td>{{ $committeeName->name ?? '' }}</td>
                                    <td>
                                        <span>
                                            {{ $committeeName->localBody->local_body ?? '' }}
                                            - {{ $committeeName->ward_no ?? '' }}
                                        </span>
                                    </td>

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
    <script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
