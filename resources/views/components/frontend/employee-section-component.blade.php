<div class="row">
    <div class="col-md-6">
        {{-- <h2 class="jana text-white px-2 mt-1">जनप्रतिनिधि</h2> --}}
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($representatives as $representative)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="emp-section">
                            <div class="emp-card d-flex align-items-center p-1 rounded border">
                                <div class="flex-shrink-0">
                                    <h5 class="text-white mb-0 sub-head px-1" style="font-size: 15px;">{{ $representative->designation }}</h5>
                                    <img src="{{ $representative->photo_url }}" class="rounded" alt="{{ $representative->name }}"
                                         width="200" height="100">
                                    <h5 class="mb-0 fw-bolder sub-head text-white text-center px-1" style="font-size: 15px;">{{ $representative->name }}</h5>
                                    <span class="d-block text-white sub-head text-center px-1"><i class="fa fa-phone" ></i> {{ $representative->phone }} </span>
                                    {{-- <span class="d-block text-white sub-head  px-1"><i class="fa fa-envelope"></i> {{ $representative->email }} </span> --}}

                                </div>
                            </div>
                            <!-- <div class="bg-overlay"></div> -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="col-md-6">
        {{-- <h2 class="title text-white px-2 mt-1">कर्मचारी</h2> --}}
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($employees as $employee)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="emp-section">
                            <div class="emp-card d-flex align-items-center p-1 rounded border">
                                <div class="flex-shrink-0">
                                    <h5 class="text-white mb-0 sub-head px-1" style="font-size: 15px;">{{ $employee->designation }}</h5>
                                    <img src="{{ $employee->photo_url }}" class="rounded" alt="{{ $employee->name }}"
                                         width="200" height="100">
                                    <h5 class="mb-0 fw-bolder sub-head text-white text-center px-1"style="font-size: 15px;">{{ $employee->name }}</h5>
                                    <span class="d-block text-white sub-head text-center px-1"><i class="fa fa-phone"></i> {{ $employee->phone }} </span>
                                    {{-- <span class="d-block text-white sub-head px-1"><i class="fa fa-envelope"></i> {{ $employee->email }} </span> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
