<template>
    <label :for="id" class="form-label">{{ label }}</label>
    <input
        :type="inputType"
        :id="id"
        v-bind:class="[inputClass, { 'is-invalid': error.$error }]"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="label"
    />
    <div v-if="error.$error" class="invalid-feedback">
        {{ error.$errors[0].$message }}
    </div>
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
    error: {
        type: Object,
        default:{}
    },
    modelValue: {
        type: String,
        required: true,
    },
});
</script>
