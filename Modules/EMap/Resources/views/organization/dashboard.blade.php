@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap quick_activity_wrap">
                                <div class="single_quick_activity  d-flex">
                                    <div class="count_content count_content2">
                                        <h3><span class="counter blue_color">{{$mapApplyCount}}</span></h3>
                                        <p>कुल नक्सा</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
