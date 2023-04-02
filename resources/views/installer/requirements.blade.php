@extends('installer.layouts.master')

@section('title', 'Requirements')
@section('section')
    <ul class="list">
        <li class="list__item {{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">PHP Version
            >= {{ $phpSupportInfo['minimum'] }}</li>

        @foreach($requirements['requirements'] as $extension => $enabled)
            <li class="list__item {{ $extension ? 'success' : 'error' }}">{{ $extension }}</li>
        @endforeach
    </ul>

    @if ( ! isset($requirements['errors']) && $phpSupportInfo['supported'] == 'success')
        <div class="buttons">
            <a class="button" href="{{ route('installer.permissions') }}">
                अर्को
            </a>
        </div>
    @endif
@stop
