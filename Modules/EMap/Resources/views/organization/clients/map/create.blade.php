@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा दरखास्त फारम</h3>
                        <a href="{{route('organization.admin.clients.client.show', $client)}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="font-black">
                        <p>{{config('applicationDetail.to_office.to')}}</p>
                        <p>{{config('applicationDetail.to_office.address')}}</p>
                        <p>{{config('applicationDetail.to_office.office')}}</p>
                        <p>{{config('applicationDetail.to_office.office_address')}}</p>
                        <p class="text-center"><b>बिषय: भवन निर्माणको लागि नक्सापास सम्बन्धमा</b></p>
                    </div>
                    <livewire:emap::map-apply-livewire :client="$client"/>
                </div>

            </div>
        </div>
    </div>
    @push('style')
        <style>
            .font-black p {
                color: black;
            }

            .building-construction-application input[type="text"],
            .building-construction-application input[type="file"],
            .building-construction-application select,
            .building-construction-application input[type="date"] {
                border-bottom: dotted 3px black;
                border-top: none;
                border-right: none;
                border-left: none;
                margin: 0 5px;
                /*width: 60%;*/
            }

            td > input[type="text"],
            td > input[type="file"],
            td > select,
            td > input[type="date"] {
                width: 100%;
            }


        </style>
    @endpush

    @push('scripts')
        {{--listener for toastr--}}
        <script>
            window.addEventListener('alert_message', event => {
                swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });
        </script>
    @endpush
@endsection
