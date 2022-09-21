@extends('frontend.layouts.master')
@section('content')
<section class="inner-section mt-lg-5 ">
    <div class="container-fluid">
        <div class="row d-flex mt-5 ">
            <div class="col-md-10  mx-auto">
                <div class="breadcrumb d-flex">
                    <div>
                        <a class="whitespace-nowrap text-primary-500" [routerLink]="'/grievance'">गुनासो</a>
                    </div>
                    <div class="d-flex items-center ml-1 whitespace-nowrap">
                        <mat-icon class="icon-size-5 text-secondary" [svgIcon]="'icon_solid:chevron-right'"></mat-icon>
                        <a class="ml-1 text-primary-500">गुनासो दर्ता</a>
                    </div>
                </div>
                <h4 class="text-center">उजुरी दर्ता फर्म</h4>
                <p class="text-center">तल दिएको फर्म लाई २ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार गरी पठाउनुहोस् ।</p>
                <div class="bg-card shadow rounded overflow-hidden">
                    <form [formGroup]="horizontalStepperForm">
                        <mat-stepper [linear]="true" [orientation]="(stepperOrientation | async)!" #horizontalStepper>
                            <mat-step [formGroupName]="'step1'" [stepControl]="horizontalStepperForm.get('step1')" #horizontalStepperStep1>
                                <ng-template matStepLabel>उजुरी दर्ता</ng-template>
                                <div class="container-fluid">
                                    <div class="grievance-type mt-3">
                                        <label class="form-label mb-2"><h6>१. गुनासोको प्रकार *</h6></label>
                                        <select class="form-select form-select-sm" [formControlName]="'grievance_type'" aria-label="Default select example">
                                            <option selected>---कुनै एक छान्नुहोस्---</option>
                                            <option value="">One</option>
                                            <option value="">Two</option>
                                            <option value="">Three</option>
                                            <option value="">four</option>
                                            <option value="">five</option>
                                            <option value="">six</option>
                                            <option value="">seven</option>
                                        </select>
                                    </div>
                                    <div class="details mt-3">
                                        <label class="form-label"><h6>२. गुनासोको विवरण *</h6></label>
                                        <textarea [formControlName]="'details'" class="form-control" rows="4" placeholder="गुनासोको विवरण"></textarea>
                                    </div>
                                    <div class="grievance-file mt-3">
                                        <label class="form-label"><h6>३. गुनासो सम्बन्धी कागजपत्र अथवा अन्य फाइल छ भने अपलोड गर्नुहोस्
                                                *</h6></label>
                                        <p class="text-sm-start"><small>(तपाईले कुनै पनि कागजात, फोटो, भिडियो 10 MB सम्मको साइजको अपलोड गर्न
                                                सक्नुहुन्छ | )</small></p>
                                        <input [formControlName]="'file'" type="file" class="form-control form-control-sm mt-2" />
                                    </div>
                                    <div class="grievance-of-organization mt-3">
                                        <label class="form-label"><h6>४. गुनासो पठाउन चाहाने कार्यालय *</h6></label>
                                        <p class="text-sm-start "><small>(यदि तपाँइ लाई गुनासो सँग सम्बन्धित कार्यालय थाहा छ भने छनोट
                                                गर्नुहोस्,
                                                अन्यथा हामी गुनासोको प्रकृति हेरेर सम्बन्धित कार्यालय मा पाठाउने छौं) </small></p>
                                        <select [formControlName]="'grievance_of_organization'" class="form-select form-select-sm" aria-label="Default select example">
                                            <option selected>---कुनै एक छान्नुहोस्---</option>
                                            <option value="">One</option>
                                            <option value="">Two</option>
                                            <option value="">Three</option>
                                            <option value="">four</option>
                                            <option value="">five</option>
                                            <option value="">six</option>
                                            <option value="">seven</option>
                                        </select>
                                    </div>
                                    <div class="grievance-seriousness mt-3">
                                        <label class="form-label"><h6>५. गुनासो गम्भीरता *</h6></label>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1">
                                                <label class="form-check-label">साधारण</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                                                <label class="form-check-label">प्राथमिकता</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3">
                                                <label class="form-check-label"> उच्च प्राथमिकता</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grievance-password mt-3">
                                        <label class="form-label"><h6>६. के तपाईंलाई यो गुनासोको पासवर्ड चाहिन्छ ? *</h6></label>
                                        <p class="text-sm-start"><small>(यदि तपाईको गुनासोको नतिजा/स्थिती अझ सुरक्षित राख्नुछ भने
                                                मात्र)</small></p>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1">
                                                <label class="form-check-label">चाहिन्छ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                                                <label class="form-check-label">चाहिन्छ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="px-8" mat-flat-button [color]="'primary'" type="button" matStepperNext>
                                        अर्को
                                    </button>
                                </div>
                            </mat-step>
                            <mat-step [formGroupName]="'step2'" [stepControl]="horizontalStepperForm.get('step2')" #horizontalStepperStep2>
                                <ng-template matStepLabel>तपाईको व्यक्तिगत विवरण</ng-template>
                                <div class="personal-details mt-3">
                                    <h5>के तपाईं आफ्नो विवरण खुलाउन चाहनुहुन्छ ?</h5>
                                    <p><small>(यस् गुनासो/उजुरी सम्बन्धी कुनै जानकारी दिन परेमा यो विवरण चाहिने छ,
                                            तपाईंको विवरण हामी गोप्य राख्ने छौं र सम्बन्धित अधिकारीहरुले मात्र हेर्न पाउने छन्।)</small></p>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1">
                                            <label class="form-check-label">हुन्छ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                                            <label class="form-check-label">हुदैन</label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="">
                                            <label class="form-label">पुरा नाम *</label>
                                            <input class="form-control" [formControlName]="'name'" type="text" placeholder="नाम" name="name">
                                            <label class="form-label mt-3">ठेगाना *</label>
                                            <input class="form-control" [formControlName]="'address'" type="text" placeholder="ठेगाना" name="address">
                                            <label class="form-label mt-3">इमेल *</label>
                                            <input class="form-control" [formControlName]="'email'" type="text" placeholder="इमेल" name="email">
                                            <label class="form-label mt-3">सम्पर्क नम्बर *</label>
                                            <input class="form-control" [formControlName]="'contact'" type="text" placeholder="सम्पर्क नम्बर" name="contact">
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button class="px-8 mx-3" mat-flat-button [color]="'accent'" type="button" matStepperPrevious>
                                            पछाडी
                                        </button>
                                        <button class="px-8" mat-flat-button [color]="'primary'" type="button" matStepperNext>
                                            आर्को
                                        </button>
                                    </div>
                                </div>
                            </mat-step>
                            <mat-step [formGroupName]="'step3'" [stepControl]="horizontalStepperForm.get('step3')" #horizontalStepperStep3>
                                <ng-template matStepLabel>उजुरी पेश गर्नुहोस्</ng-template>
                                <h4 class="text-center mt-3 mb-3">तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस् । </h4>
                                <div class="">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>गुनासोको प्रकार:</td>
                                            <td>तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>विवरण</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>गुनासो गम्भीरता</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>गुनासो पठाउन चाहाने कार्यालय</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>के तपाईंलाई यो गुनासोको पासवर्ड चाहिन्छ ?</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>के तपाईं आफ्नो विवरण खुलाउन चाहनुहुन्छ ?</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>पुरा नाम</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>ईमेल</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        <tr>
                                            <td>फोन</td>
                                            <td>@तल दिएको विवरण ठीक छ छैन विचार गरी पठाउनुहोस्</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            सबै <a href="#">शर्तहरु</a> मञ्जुर छ ।
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex justify-content-end">
                                    <button class="px-8 mx-3" mat-flat-button [color]="'accent'" type="button" matStepperPrevious>
                                        back to step-1
                                    </button>
                                    <button class="px-8" mat-flat-button [color]="'accent'" type="button" matStepperPrevious>
                                        back to step-2
                                    </button>
                                    <button class="px-8 mx-3" mat-flat-button [color]="'primary'" type="submit">
                                        पठाउनुहोस |
                                    </button>
                                </div>
                            </mat-step>
                        </mat-stepper>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/register.css')}}">
@endpush
@endsection
