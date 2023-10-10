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


    <!-- reject model -->
    <div class="modal fade" id="status_model" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusLabel">तपाईं यसलाई किन अस्वीकार गर्दै हुनुहुन्छ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                            <div class="mb-3">
                                <label for="status_" class="form-label">स्थिति</label>
                                <select class="form-select form-select-sm" name="status_" id="status_" aria-label="status">
                                    <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                    <option value="Pending">प्रक्रियामा</option>
                                    <option value="Accept">स्वीकार</option>
                                    <option value="Reject">अस्वीकार</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">टिप्पणी</label>
                                <textarea class="form-control" id="comment" rows="3"></textarea>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द</button>
                    <button type="button" class="btn btn-primary">पेश गर्नुहोस्</button>
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
