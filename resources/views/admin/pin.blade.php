@extends('admin.layouts.master')
@section('content')
    <!-- Modal -->
    @if(is_null(auth()->user()->pin))
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-black text-center" id="staticBackdropLabel">कृपया प्रमाणीकरण
                            पिन {{auth()->user()->pin==null ?'सेट':'प्रविष्ट'}} गर्नुहोस्</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form data="{{route('admin.pin.store')}}" method="POST" id="pinData">
                            <div class="form-group">
                                <label for="pin">पिन </label>
                                <input type="password" class="form-control" placeholder="पिन" name="pin" id="pin">
                                <p class="text-danger" id="error_message"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary ">पेश गर्नुहोस</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @push('scripts')
        <script src="{{asset('assets/backend/js/checkPin.js')}}"></script>
    @endpush
@endsection
