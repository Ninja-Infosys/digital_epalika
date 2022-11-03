@extends('frontend.layouts.master')
@section('content')

<livewire:roaster::trainer-livewire />
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
