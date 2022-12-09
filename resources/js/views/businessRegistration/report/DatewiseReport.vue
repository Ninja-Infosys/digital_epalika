<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता रिपोर्ट</h4>
                        <button class="btn btn-primary btn-sm waves-effect waves-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatewiseReportForm" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i>
                        </button>
                    </div>
                    <div class="collapse" id="collapseDatewiseReportForm" style="">
                        <form>
                            <fieldset class="border p-2 mb-2">
                                <legend class="font-16 text-info">
                                    <strong>मिति </strong>
                                </legend>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        {{form.from_date}}
                                        <VDateInput
                                            id="from_date"
                                            v-model="form.from_date"
                                            label="देखि"
                                        />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <VDateInput
                                            id="to_date"
                                            v-model="form.to_date"
                                            label="सम्म"
                                        />
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">
                                Filter
                            </button>

                        </form>
                        {{form}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> व्यवसाय दर्ता रिपोर्ट</h4>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fa fa-print"></i>
                            Print</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>दर्ता नं</th>
                                <th>दर्ता मिति.</th>
                                <th>व्यवसाय ठेगाना</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useStore} from 'vuex'
import {reactive} from "vue";

export default {
    setup(){
        const store=useStore();

        const form=reactive({
            from_date:'',
            to_date:''
        })
        return {
            form
        }
    }
}
</script>
