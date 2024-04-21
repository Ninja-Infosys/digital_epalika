<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card-body mt-3">
        <div class="row">
            <div class="col-md-8">
                <h4 class="font-bold">व्यतिगत विवरण</h4>
                <div class="table-responsive">
                    <table class="table table-sm mb-0 table-bordered table-striped">
                        <thead>
                            <th>पुरा नाम</th>
                            <th>लिङ्ग</th>
                            <th>सम्पर्क नं</th>
                            <th>ठेगाना</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    {{ $mobileUser->name }}
                                </td>

                                <td>
                                    {{ $mobileUser?->mobileUserDetail?->gender->label() }}

                                </td>
                                <td>
                                    {{ Auth::guard('mobile-user')->user()->phone ?? '' }}

                                </td>
                                <td>

                                    {{ $mobileUser?->mobileUserDetail?->province?->province }},
                                    {{ $mobileUser?->mobileUserDetail?->district?->district }}

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-sm mb-0 table-bordered table-striped">
                        <thead>
                            <th>शीर्षक</th>
                            <th>रकम</th>
                            <th>परिमाण</th>
                            <th>जम्मा
                            <th>
                        </thead>
                        <tbody>
                            {{-- <tr style="vertical-align: middle">
                                <td>{{ $recommendationCreate->recommendationDetail?->title ?? '' }}</td>

                            </tr> --}}
                            @foreach ($recommendationCreates?->recommendationDetail?->revenueHeaders as $revenueHeader)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $revenueHeader->title ?? '' }}</td>
                         
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
