@extends('frontend.layouts.master')
@section('content')
    <section class="container-fluid mt-4">

        <div class="text-center">
            <h4 class="fw-bold text-decoration-underline">सेवा कालिन तालिम आवेदन फारम</h4>
        </div>

        @livewire('roaster::technical-trainee-livewire',['training'=>$training])

    </section>

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
