@extends('admin.layouts.master')
@section('content')
    <div class="">
        <div class="page-title d-flex justify-content-between">
            <h5>तालिम</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a></li>
                    <li class="breadcrumb-item active" aria-current="page">तालिम विवरण</li>
                </ol>
            </nav>
        </div>
        <div class="card-body">
            <div class="x_content">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                           aria-controls="all" aria-selected="true">सबै तालिमहरु</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="type1-tab" data-toggle="tab"
                           href="#type1" role="tab"
                           aria-controls="type" aria-selected="false">छनोट भएका </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="type2-tab" data-toggle="tab"
                           href="#type2" role="tab"
                           aria-controls="type" aria-selected="false">छनोट नभयका </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                        @if($training->form_type=='technicalTrainee')
                            <x-technical-trainee-table :trainees="$trainees"/>
                        @else
                            <x-trainee-table :trainees="$trainees"/>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="type1" role="tabpanel" aria-labelledby="all-tab">
                        @if($training->form_type=='technicalTrainee')
                            <x-technical-trainee-table :trainees="$trainees->where('select',1)"/>
                        @else
                            <x-trainee-table :trainees="$trainees->where('select',1)"/>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="type2" role="tabpanel" aria-labelledby="all-tab">
                        @if($training->form_type=='technicalTrainee')
                            <x-technical-trainee-table :trainees="$trainees->where('select',0)"/>
                        @else
                            <x-trainee-table :trainees="$trainees->where('select',0)"/>
                        @endif
                    </div>
                </div>
                {{$trainees->links()}}
            </div>

        </div>

    </div>

@endsection
