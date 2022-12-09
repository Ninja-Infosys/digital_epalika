<template>
    <label :for="id" class="form-label">{{ label }}</label>
    <input
        :type="inputType"
        :id="id"
        v-bind:class="[inputClass]"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="label"
    />
</template>

<script setup>
// eslint-disable-next-line no-undef
defineProps({
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
});
</script>
