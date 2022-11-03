@extends('admin.layouts.master')
@section('content')
    <div class="">
        <div class="page-title d-flex justify-content-between">
            <h5>प्रशिक्षक</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a></li>
                    <li class="breadcrumb-item active" aria-current="page">प्रशिक्षक विवरण</li>
                </ol>
            </nav>
        </div>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{$trainer->photoUrl ?? ''}}" alt="{{$trainer->name ?? ''}}"
                                 class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4> {{$trainer->name ?? ''}}</h4>
                                <p class="text-secondary mb-1"> {{$trainer->designation->title ?? ''}}
                                    ({{$trainer->level ?? ''}})</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>बिषय विज्ञता</h5>
                    </div>
                    <ul class="mt-2">
                        @foreach($trainer->subjects as $subject)
                            <li>{{$subject->title ?? ''}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">नाम</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->name ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">पद</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->designation->title ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">तह</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->level ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">फोन</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->phone ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">इमेल</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->email ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">स्थायी लेखा नम्बर</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->pan ?? ''}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">ठेगाना</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$trainer->localBody->local_body ?? ''}}-{{$trainer->ward ?? ''}}
                                , {{$trainer->district->district ?? ''}}, {{$trainer->province->province ?? ''}}
                            </div>
                        </div>

                        @if(config('trainer.status.compactForm'))
                            <hr>
                            @if(config('trainer.type.bankDetailForm') == 'compact')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">बैंक खाता</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$trainer->bank_detail ?? ''}}
                                    </div>
                                </div>
                                <hr>
                            @endif

                            @if(config('trainer.type.experienceForm') == 'compact')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">कार्य अनुभव (बर्ष)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$trainer->experience ?? ''}}
                                    </div>
                                </div>
                                <hr>
                            @endif

                            @if(config('trainer.type.qualificationForm') == 'compact')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">शैक्षिक योग्यता</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$trainer->qualification ?? ''}}
                                    </div>
                                </div>
                                <hr>
                            @endif

                            @if(config('trainer.type.experienceAsTraineeForm') == 'compact')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">संलग्न तालिमको विवरण </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$trainer->experience_as_trainee ?? ''}}
                                    </div>
                                </div>
                                <hr>
                            @endif

                            @if(config('trainer.type.experienceAsTrainerForm') == 'compact')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">तालिममा प्रशिक्षक भएको अनुभव</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$trainer->experience_as_trainer ?? ''}}
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                @if(config('trainer.status.bankDetailForm') && config('trainer.type.bankDetailForm') == 'extended')
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>१. बैंक खाता विवरण</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>क्र.सं.</th>
                                        <th>बैंकको नाम</th>
                                        <th>शाखा</th>
                                        <th>खाता नं.</th>
                                        <th>खाता वालाको नाम</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($trainer->trainerBankDetails as $trainerBankDetail)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$trainerBankDetail->bank_name ?? ''}}</td>
                                            <td>{{$trainerBankDetail->bank_branch ?? ''}}</td>
                                            <td>{{$trainerBankDetail->account_number ?? ''}}</td>
                                            <td>{{$trainerBankDetail->account_holder ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(config('trainer.status.experienceForm') && config('trainer.type.experienceForm') == 'extended')
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>२. कार्य अनुभव</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>क्र.सं.</th>
                                        <th>कार्यालय/संस्था</th>
                                        <th>पद</th>
                                        <th>मिति देखि</th>
                                        <th>मिति सम्म</th>
                                        <th>मुख्य जिम्मेवारी</th>
                                        <th>कैफियत</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($trainer->trainerExperiences as $workExperience)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$workExperience->office ?? ''}}</td>
                                            <td>{{$workExperience->designation->title ?? ''}}</td>
                                            <td>{{$workExperience->from ?? ''}}</td>
                                            <td>{{$workExperience->to ?? ''}}</td>
                                            <td>{{$workExperience->responsibility ?? ''}}</td>
                                            <td>{{$workExperience->remarks ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(config('trainer.status.qualificationForm') && config('trainer.type.qualificationForm') == 'extended')
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>३. शैक्षिक योग्यता</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-hover datatable">
                                    <thead>
                                    <tr>
                                        <th>क्र.सं.</th>
                                        <th>शैक्षिक तह</th>
                                        <th>विषय</th>
                                        <th>विश्वविद्यालय/शैक्षिक संस्था</th>
                                        <th>सम्पन्न वर्ष</th>
                                        <th>मुख्य विषय</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($trainer->trainerQualifications as $trainerQualification)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$trainerQualification->achievement ?? ''}}</td>
                                            <td>{{$trainerQualification->institute ?? ''}}</td>
                                            <td>{{$trainerQualification->passed_year ?? ''}}</td>
                                            <td>{{$trainerQualification->major_subjects ?? ''}}</td>
                                            <td>{{$trainerQualification->remarks ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(config('trainer.status.experienceAsTraineeForm') && config('trainer.type.experienceAsTraineeForm') == 'extended')
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>४. संलग्न तालिमको विवरण</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-hover datatable">
                                    <thead>
                                    <tr>
                                        <th>क्र.सं.</th>
                                        <th>तालिमको विषय</th>
                                        <th>तालिम दिने निकाय</th>
                                        <th>तालिमको अवधि</th>
                                        <th>सहभागीको स्तर</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($trainer->trainerExperienceAsTrainees as $trainerExperienceAsTrainee)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$trainerExperienceAsTrainee->subject ?? ''}}</td>
                                            <td>{{$trainerExperienceAsTrainee->provider ?? ''}}</td>
                                            <td>{{$trainerExperienceAsTrainee->duration ?? ''}}</td>
                                            <td>{{$trainerExperienceAsTrainee->venue ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(config('trainer.status.experienceAsTrainerForm') && config('trainer.type.experienceAsTrainerForm') == 'extended')
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>५. तालिममा प्रशिक्षक भएको अनुभव</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-hover datatable">
                                    <thead>
                                    <tr>
                                        <th>क्र.सं.</th>
                                        <th>प्रशिक्षणको विषय</th>
                                        <th>तालिम दिने निकाय</th>
                                        <th>तालिमको अवधि</th>
                                        <th>सहभागीको स्तर</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($trainer->trainerExperienceInTrainings as $trainerExperienceInTraining)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$trainerExperienceInTraining->sector ?? ''}}</td>
                                            <td>{{$trainerExperienceInTraining->subject ?? ''}}</td>
                                            <td>{{$trainerExperienceInTraining->organization ?? ''}}</td>
                                            <td>{{$trainerExperienceInTraining->training_level ?? ''}}</td>
                                            <td>{{$trainerExperienceInTraining->training_time ?? ''}}</td>
                                            <td>{{$trainerExperienceInTraining->remarks ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
@endsection
