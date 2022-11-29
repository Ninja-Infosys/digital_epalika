@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i>गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">कार्यालय सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">सुविधा सेटिंग सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">सुविधा सेटिंग</h4>
            </div>
        </div>
    </div>

    @foreach($featureActivations as $key=>$featureActivation)
        <div class="row">
            <h4 class="page-title">{{\App\Enums\FeatureTypeEnum::tryFrom($key)->label()}}</h4>

            @foreach($featureActivation as $data)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                {{$data->feature_name_ne}}
                            </h5>
                        </div>
                        <div class="card-body">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <p class="px-2">यो सुविधा सक्षम गर्नको लागि तपाईंले स्ट्राइपलाई सही रूपमा कन्फिगर गर्न आवश्यक छ।</p>
                            <p class="px-2 text-center my-2"><a href="{{$data->feature_type->settingUrl()}}">Click Here</a></p>

                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    @push('style')
      <style>
          .switch {
              position: relative;
              display: inline-block;
              width: 50px;
              height: 24px;
          }

          .switch input {
              opacity: 0;
              width: 0;
              height: 0;
          }

          .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
          }

          .slider::before {
              position: absolute;
              content: "";
              height: 16px;
              width: 18px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
          }

          input:checked + .slider {
              background-color: #2196F3;
          }

          input:focus + .slider {
              box-shadow: 0 0 1px #2196F3;
          }

          input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
          }

          /* Rounded sliders */
          .slider.round {
              border-radius: 34px;
          }

          .slider.round:before {
              border-radius: 50%;
          }
      </style>
    @endpush
@endsection
