@extends('installer.layouts.master')

@section('title', 'अनुमतिहरू')
@section('section')
    @if (isset($permissions['errors']))
        <div class="alert alert-danger">Please fix the below error and the click फेरि अनुमति जाँच गर्नुहोस्</div>
    @endif
    <ul class="list">
        @foreach($permissions['permissions'] as $permission)
            <li class="list__item list__item--permissions {{ $permission['isSet'] ? 'success' : 'error' }}">
                {{ $permission['folder'] }}<span>{{ $permission['permission'] }}</span>
            </li>
        @endforeach
    </ul>


    <div class="buttons">
        @if ( ! isset($permissions['errors']))
            <a class="button" href="{{ route('installer.database') }}">
                अर्को
            </a>
        @else
            <a class="button" href="javascript:window.location.href='';">
                फेरि अनुमति जाँच गर्नुहोस्
            </a>
        @endif
    </div>

@stop
