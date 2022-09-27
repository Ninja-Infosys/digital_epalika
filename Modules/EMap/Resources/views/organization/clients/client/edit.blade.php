@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राही सम्पादन</h3>
                        <a href="{{route('organization.admin.clients.client.index')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.clients.client.update',$client)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">नाम *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{old('name', $client->name)}}"
                                   placeholder="नाम हल्नुहोस">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">इमेल</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{old('email', $client->email)}}"
                                   placeholder="इमेल हल्नुहोस">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">फोन *</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{old('phone', $client->phone)}}"
                                   placeholder="फोन नं हल्नुहोस">
                            @error('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        @livewire('address', ['address'=>[
    'province_id'=>$client->province_id,
'district_id'=>$client->district_id,
'local_body_id'=>$client->local_body_id,
'ward_no'=>$client->ward_no,
]])
                        <div class="mb-3">
                            <label class="form-label" for="tole">गाउँ/टोल</label>
                            <input type="text" class="form-control @error('tole') is-invalid @enderror" id="phone"
                                   name="tole" value="{{old('tole', $client->tole)}}"
                                   placeholder="गाउँ/टोल">
                            @error('tole')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-4 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary    ">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
