@extends('frontend.layouts.master')
@section('content')
<h1 class="text-center">प्रशिक्षक दर्ता फारम</h1>
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
