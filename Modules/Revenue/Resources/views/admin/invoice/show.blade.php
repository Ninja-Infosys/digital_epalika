@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">नगदी रसिद</li>
                    </ol>
                </div>
                <h4 class="page-title">नगदी रसिद</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नगदी रसिद</h4>
                        <div class="d-flex gap-2">
                            @can('revenueCategory_create')
                                <a href="{{route('admin.revenue.invoice.index')}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-list"></i>
                                    नगदी रसिदहरुको सूची
                                </a>
                            @endcan
                            <x-print-button
                                target-element="report-table"
                                title="आम्दानी रसिद"
                            />
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="report-table">
                        <div>
                            <div class="mb-2">
                                <style>
                                    .dashed {
                                        border-top: 2px dashed #999;
                                    }
                                </style>
                                <div class="container-fluid mb-1 d-lg-flex justify-content-between align-items-center">
                                    <span>
                                        <img alt="nepal-government-logo"
                                             class="logo img-responsive center-block d-block mx-auto"
                                             src="{{ asset('assets/frontend/image/logo.png') }}"/>
                                    </span>
                                    <x-header-component :has-clock="false"/>
                                    <span>
                                    सेवाग्राही प्रति <br>
                                    रसिद नं.: {{$invoice->invoice_no}}
                                </span>
                                </div>
                                <div style="margin-bottom: 20px; ">
                                    <h3 class="text-center">आम्दानी रसिद</h3>
                                    <div class="d-flex justify-content-between">
                                        <span>करदाताको नाम: {{$invoice->name}}</span>
                                        <span>ठेगाना: {{$invoice->address}}</span>
                                        <span>करदाताको नं: {{$invoice->taxPayer->registration_no}}</span>
                                        <span>मिति: <x-ad-to-bs id="payment_date_customer" :ad-date="$invoice->payment_date_ad"></x-ad-to-bs></span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-8">
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th>बिषय</th>
                                                    <th>परिमाण</th>
                                                    <th>दर</th>
                                                    <th>जरिवाना</th>
                                                    <th>जम्मा</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($invoice->invoiceParticulars as $key=>$particular)
                                                    <tr>
                                                        <td>{{$particular->revenue}}</td>
                                                        <td>
                                                            <x-convert-to-unicode id="total__customer_quantity{{$key}}"
                                                                                  number="{{$particular->quantity}}"/>
                                                        </td>
                                                        <td>
                                                            <x-convert-to-unicode id="total__customer_rate{{$key}}"
                                                                                  number="{{$particular->rate}}"/>
                                                        </td>
                                                        <td>
                                                            <x-convert-to-unicode id="total__customer_fine{{$key}}"
                                                                                  number="{{$particular->fine}}"/>
                                                        </td>
                                                        <td>
                                                            <x-convert-to-unicode id="total__customer_grand{{$key}}"
                                                                                  number="{{$particular->grand_total_amount}}"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-right">जम्मा</th>
                                                    <td>
                                                        <x-convert-to-unicode id="total__customer_sum"
                                                                              number="{{$invoice->invoice_particulars_sum_total}}"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"><b>अक्षरुपि</b>:
                                                        <x-number-into-unicode id="customer_word"
                                                                               number="{{$invoice->invoice_particulars_sum_total}}"/>
                                                        मात्र
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    कर तिरौ, सभ्य नागरिक बनौ ।
                                                </li>
                                                <li class="list-group-item">
                                                    समय मै कर तिरौ, जरिवानाबाट बचौ ।
                                                </li>
                                            </ul>
                                            कर सम्बन्धि बिस्तृत जानकारीको लागि राजस्व प्रशासन शाखामा सम्पर्क राख्नु होला । <strong>कर तिर्नु भएकोमा धन्यबाद ।</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="dashed">बुझाउनेको सहि</div>
                                    <div class="dashed">बुझिलिनेको सहि</div>
                                </div>
                                <p class="text-center">
                                    तयार गर्ने: {{$invoice->user->name}}  प्रिन्ट: <x-ad-to-bs id="print_cstomer" :ad-date="now()"></x-ad-to-bs> {{now()->format('h:i:s A')}}
                                    <br>
                                    पुनः राजस्व बुझुना आउदा यो रसिद लिएर आउनु होला धन्यवाद
                                </p>

                            </div>

                        </div>
                        <hr class="dashed">
                        <div>
                            <div class="container-fluid mb-1 d-lg-flex justify-content-between align-items-center">
                                <span>
                                    <img alt="nepal-government-logo"
                                         class="logo img-responsive center-block d-block mx-auto"
                                         src="{{ asset('assets/frontend/image/logo.png') }}"/>
                                </span>
                                <x-header-component :has-clock="false"/>
                                <span>
                                    कार्यालय प्रति <br>
                                    रसिद नं. : {{$invoice->invoice_no}}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-center">
                                    आम्दानी रसिद
                                </h3>
                                <div>
                                    <b>करदाताको नाम</b>: {{$invoice->name}} | <b>ठेगाना</b>: {{$invoice->address}} |
                                    <b>करदाताको नं</b>: {{$invoice->taxPayer->registration_no}} |
                                    <b>मिति</b>:
                                    <x-ad-to-bs id="payment_date_office"
                                                :ad-date="$invoice->payment_date_ad"></x-ad-to-bs>
                                </div>
                                <div>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                        <tr>
                                            <th>बिषय</th>
                                            <th>परिमाण</th>
                                            <th>दर</th>
                                            <th>जरिवाना</th>
                                            <th>जम्मा</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice->invoiceParticulars as $key=>$particular)
                                            <tr>
                                                <td>{{$particular->revenue}}</td>
                                                <td>
                                                    <x-convert-to-unicode id="total__office_quantity{{$key}}"
                                                                          number="{{$particular->quantity}}"/>
                                                </td>
                                                <td>रु.
                                                    <x-convert-to-unicode id="total__office_rate{{$key}}"
                                                                          number="{{$particular->rate}}"/>
                                                </td>
                                                <td>रु.
                                                    <x-convert-to-unicode id="total__office_fine{{$key}}"
                                                                          number="{{$particular->fine}}"/>
                                                </td>
                                                <td>रु.
                                                    <x-convert-to-unicode id="total__office_grand{{$key}}"
                                                                          number="{{$particular->grand_total_amount}}"/>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="4" class="text-right">जम्मा</th>
                                            <td>रु.
                                                <x-convert-to-unicode id="total__office_sum"
                                                                      number="{{$invoice->invoice_particulars_sum_total}}"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><b>अक्षरुपि</b>:
                                                <x-number-into-unicode id="office_word"
                                                                       number="{{$invoice->invoice_particulars_sum_total}}"/>
                                                मात्र
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <div class="d-flex justify-content-between mt-4">
                                        <div class="dashed">
                                            रकम बुझाउनेको सहि
                                        </div>
                                        <div class="dashed">
                                            रकम बुझिलिनेको सहि
                                        </div>
                                    </div>
                                    <p class="text-center">

                                        तयार गर्ने: {{$invoice->user->name}} | प्रिन्ट:
                                        <x-ad-to-bs id="print_office"
                                                    :ad-date="now()"></x-ad-to-bs> {{now()->format('h:i:s A')}}
                                        <br>
                                        पुनः राजस्व बुझुना आउदा यो रसिद लिएर आउनु होला
                                        धन्यवाद

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
