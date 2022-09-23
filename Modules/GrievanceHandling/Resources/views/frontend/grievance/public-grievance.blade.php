@extends('frontend.layouts.master')
@section('content')
<section class="public-grievance">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>सार्वजनिक गरिएका गुनासोहरु</h3>
                        <hr>
                        <p>
                            <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" >
                                सार्वजनिक भएका गुनासो हरु को शीर्षक हरु क्रमश: यहा देखिनेछ्न
                            </button>
                        </p>
                        <div class="collapse" id="collapse">
                            <div class="card card-body">
                                <p><i class="fa fa-angle-double-right m-lg-1"></i>सार्वजनिक भएका गुनासो हरु को उतरहरु क्रमश: यहा देखिनेछ्न |</p>
                            </div>
                        </div>
                        <p>
                            <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" >
                                सार्वजनिक भएका गुनासो हरु को शीर्षक हरु क्रमश: यहा देखिनेछ्न
                            </button>
                        </p>
                        <div class="collapse" id="collapse">
                            <div class="card card-body">
                                <p><i class="fa fa-angle-double-right m-lg-1"></i>सार्वजनिक भएका गुनासो हरु को उतरहरु क्रमश: यहा देखिनेछ्न |</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/index.css')}}">
@endpush
@endsection
