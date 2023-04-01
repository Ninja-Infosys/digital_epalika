@extends('installer.layouts.master')

@section('title', 'वातावरण सेटिङहरू')
@push('style')
    <link href="{{ asset('assets/installer/css/helper.css') }}" rel="stylesheet"/>
    <style>
        .form-control {
            height: 14px;
            width: 100%;
        }

        .has-error {
            color: red;
        }

        .has-error input {
            color: black;
            border: 1px solid red;
        }
    </style>
@endpush
@section('section')
    <form method="post" action="{{ route('installer.environment.save') }}" id="env-form">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="hostname">Hostname</label>

            <div class="col-sm-10">
                <input type="text" name="hostname" class="form-control" id="hostname" value="{{old('hostname',config('database.connections.mysql.host','localhost'))}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="username">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="username" value="{{old('username',config('database.connections.mysql.username','root'))}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="password">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="{{old('password', config('database.connections.mysql.password'))}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="database">Database</label>
            <div class="col-sm-10">
                <input type="text" name="database" id="database" class="form-control" value="{{old('database',config('database.connections.mysql.database'))}}">
            </div>
        </div>
        <div class="modal-footer">
            <div class="buttons">
                <button class="button" onclick="checkEnv();return false">
                    अर्को
                </button>
            </div>
        </div>
    </form>
    <script>
        function checkEnv() {
            $.easyAjax({
                url: "{{route('installer.environment.save')}}",
                type: "GET",
                data: $("#env-form").serialize(),
                container: "#env-form",
                messagePosition: "inline"
            });
        }
    </script>
@stop
@push('scripts')
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/installer/js/helper.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
