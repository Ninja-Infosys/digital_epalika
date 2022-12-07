<template>
    <label :for="id" class="form-label">{{ label }}</label>
    <input
        :type="inputType"
        :id="id"
        :value="modelValue"
        v-bind:class="[inputClass]"
        :placeholder="label"
    />
</template>

<script>
import { onMounted } from "vue";

export default {
    props: {
        id: {
            type: String,
        },
        inputType: {
            type: String,
            default: "text",
        },
        inputClass: {
            type: String,
            default: "form-control",
        },
        label: {
            type: String,
        },
        modelValue: {
            type: String,
            default: "",
            required: true,
        },
        todayDate: {
            type: Boolean,
            default: false,
        },
    },
    setup(props, { emit }) {
        onMounted(() => {
            let data = document.querySelector("#" + props.id);
            // eslint-disable-next-line no-undef
            let todayDateValue = NepaliFunctions.ConvertDateFormat(
                // eslint-disable-next-line no-undef
                NepaliFunctions.GetCurrentBsDate(),
                "YYYY-MM-DD"
            );
            if (props.todayDate) {
                emit("update:modelValue", todayDateValue);
            }
            data.nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                onChange: function (e) {
                    emit("update:modelValue", e.bs);
                },
            });
        });
    },
};
</script>
