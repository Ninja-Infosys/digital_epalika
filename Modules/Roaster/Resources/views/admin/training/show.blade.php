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




            <ul class="nav nav-pills nav-fill navtab-bg">
                <li class="nav-item">
                    <a href="#tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        सबै तालिमहरु
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#tab-type1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        छनोट भएका
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#tab-type2" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        छनोट नभयका
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="tab-all">
                    @if($training->form_type== \Modules\Roaster\Enums\TrainingTypeEnum::TECHNICAL_TRAINEE)
                        <x-technical-trainee-table :trainees="$trainees"/>
                    @else
                        <x-trainee-table :trainees="$trainees"/>
                    @endif
                </div>

                <div class="tab-pane" id="tab-type1">
                    @if($training->form_type === \Modules\Roaster\Enums\TrainingTypeEnum::TECHNICAL_TRAINEE)
                        <x-technical-trainee-table :trainees="$trainees->where('select',1)"/>
                    @else
                        <x-trainee-table :trainees="$trainees->where('select',1)"/>
                    @endif
                </div>

                <div class="tab-pane" id="tab-type2">
                    @if($training->form_type=== \Modules\Roaster\Enums\TrainingTypeEnum::TECHNICAL_TRAINEE)
                        <x-technical-trainee-table :trainees="$trainees->where('select',0)"/>
                    @else
                        <x-trainee-table :trainees="$trainees->where('select',0)"/>
                    @endif
                </div>

            </div>


        </div>

    </div>

@endsection
