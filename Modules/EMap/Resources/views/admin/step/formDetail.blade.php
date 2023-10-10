@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ $form->title }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $form->title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $form->title }}</h4>
            </div>
        </div>
    </div>
    @foreach ($form->formDataTypes as $formDataType)
        @if ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FILE)
            <x-admin.view.file-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form" />
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::FORM)
            <x-admin.view.form-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form" />
        @elseif ($formDataType->type == Modules\EMap\Enums\FormTypeEnum::PAYMENT)
            <x-admin.view.bill-component :form-data-type="$formDataType" :map-apply="$mapApply" :form="$form" />
        @endif
    @endforeach

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reject_model">
        Reject Model
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view_file">
        View File Model
    </button>


    <!-- reject model -->
    <div class="modal fade" id="reject_model" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectLabel">तपाईं यसलाई किन अस्वीकार गर्दै हुनुहुन्छ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द</button>
                    <button type="button" class="btn btn-primary">परिवर्तनहरू सुरक्षित गर्नुहोस</button>
                </div>
            </div>
        </div>
    </div>

    <!-- view file model pass url dynamically in the model-->
    <div class="modal fade" id="view_file" tabindex="-1" aria-labelledby="fileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" class="img-fluid"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(".printDetail").on("click", function(e) {
                // alert('dd');
                $.ajax({
                    method: "GET",
                    url: $(this).attr("route_action"),
                    success: function(resp) {
                        const print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    },
                    error: function() {
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush
@endsection
