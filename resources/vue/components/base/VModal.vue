<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: rgba(0, 0, 0, 0.5);
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: flex;
    align-items: center;
    min-height: calc(100% - 1.75rem * 2);
    /*margin: 1.5rem;*/
}

.modal-container {
    margin: 0 auto;
    padding:0;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
}

.v-modal-header{
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #eee;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
}

.v-modal-title{
    margin-bottom: 0;
    line-height: 1.5;
}

.v-modal-body{
    position: relative;
    flex: 1 1 auto;
    padding: 1rem;
}

.small-modal{
    width: 450px;
}

.extra-medium-modal{
    width: 750px;
}

.medium-modal{
    width: 600px;
}

.large-modal{
    width: 900px;
}

.extra-large-modal{
    width: 1140px;
}

.full-screen-modal{
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
}

.modal-default-button {
    float: right;
}

.modal-enter-from {
    opacity: 0;
}

.modal-leave-to {
    opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>

<template>
    <Transition name="modal">
        <div v-if="showModal" class="modal-mask" role="document">
            <div v-bind:class="{'modal-wrapper':modalClass!=='full-screen-modal'}">
                <div class="modal-container" v-bind:class="[modalClass]">
                    <div class="v-modal-header">
                        <template v-if="$slots.header">
                            <slot name="header"/>
                        </template>
                        <template v-else>
                            <h5 class="v-modal-title">
                                {{ title }}
                            </h5>
                            <button
                                class="btn btn-close"
                                type="button"
                                @click.prevent="$emit('closeClick')"
                                aria-label="Close"
                            ></button>
                        </template>
                    </div>
                    <div class="v-modal-body">
                        <slot name="body"/>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
defineProps({
    showModal: Boolean,
    title: {
        type: String,
        required: true
    },
    modalClass:{
        type:String,
        default:'medium-modal'
    }
});
</script>
