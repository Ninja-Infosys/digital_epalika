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
                            <a href=""> ई-कार्यपालिका</a>
                        </li>
                        <li class="breadcrumb-item active">पालिका बैठक रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">पालिका बैठक रिपोर्ट</h4>
            </div>
        </div>
    </div>
    @livewire('executive-meeting.meeting-details-report',['model_type'=>$model_type])

    <button class="btn btn-primary float-right" id="printBtn">
        <i class="fa fa-print"></i> Print
    </button>

    @push('scripts')
        <script>
            $("#printBtn").click(function (e) {
                var print_area = window.open();
                print_area.document.write(document.getElementsByClassName('printBtn')[0].innerHTML);
                print_area.document.close();
                print_area.focus();
                print_area.print();
                print_area.close();

            });
        </script>

    @endpush

@endsection
