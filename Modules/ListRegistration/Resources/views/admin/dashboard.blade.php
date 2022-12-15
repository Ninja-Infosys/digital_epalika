@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                            5
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">शुरु नभएका योजनाहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
        <div class="col-md-4">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                           7
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">चालु योजनाहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
    </div>
@endsection

