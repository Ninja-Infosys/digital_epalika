@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">गृहपृष्ठ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    1
                                </h3>
                                <p class="text-muted mb-1 text-truncate">
                                    प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>
{{--                    <x-date-component--}}
{{--                        :data="[ 'name_ne'=>'xyz','label_ne'=>'xyz', 'name_en'=>'abc', 'label_en'=>'abc']"/>--}}
{{--                    <x-date-component--}}
{{--                        :data="[ 'name_ne'=>'sad','label_ne'=>'asdsa', 'name_en'=>'asfew', 'label_en'=>'ascassa']"/>--}}

                    @livewire('date-livewire')
                </div>
            </div>
        </div>
    </div>
@endsection
