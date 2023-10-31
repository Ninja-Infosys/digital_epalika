@extends('admin.layouts.master')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.roaster.dashboard')}}">
                                    <i class="fa fa-home"></i> गृहपृष्ठ
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.roaster.training.index')}}">तालिम</a>
                            </li>
                            <li class="breadcrumb-item">
                                तालिम विवरण
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">तालिम विवरण</h4>
                </div>
            </div>
        </div>
        <div class="card-body card">
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

@endsection
